<?php
    @session_start();
    require_once ("connection.php");
    require_once ("mailer/src/PHPMailer.php");
    require_once ("mailer/src/SMTP.php");
    require_once ("mailer/src/Exception.php");
    class change_credentials extends connection{
        private $email;
        private $user;
        private $pass;
        private function send_mail(){
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSmtp();
            $mail->SMTPAuth = "true";
            $mail->SMTPSecure = "tls";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->Username = "computer2073.2016@gmail.com";
            $mail->Password = "Dangerous@#$5658";
            $mail->setFrom("computer2073.2016@gmail.com");
            $mail->Subject = "Verification Code";
            $mail->Body = " Your email verification code is ".$_SESSION['validate_code'];
            $mail->addAddress($this->email);
            $mail->send();
        }
        public function __construct(){
            $credit = new connection();
            $credit->db_connect();
        }
        public function check_email($e){
            $this->email = $e;
            $this->sql = "SELECT * FROM admin WHERE Email='$this->email'";
            $this->result = mysqli_query(parent::$conn,$this->sql);
            if(mysqli_num_rows($this->result)>0){
                $_SESSION['validate_code'] = rand(10000,99999);
                $this->send_mail();
                return true;
            }
            else{
                return false;
            }
        }
        public function change_only_pass($p){
            $this->pass = md5($p);
            $this->sql = "UPDATE admin SET Pass='$this->pass',Status=0";
            if(mysqli_query(parent::$conn,$this->sql)){
                return true;
            }
            else{
                return false;
            }
        }
        private function check_old_credentials(){
            $this->sql = "SELECT * FROM admin WHERE User_name='$this->user' AND Pass='$this->pass'";
            $this->result = mysqli_query(parent::$conn,$this->sql);
            if(mysqli_num_rows($this->result)>0){
                return true;
            }else{
                return false;
            }
        }
        public function check_old($ou,$op){
           $this->user = $ou;
           $this->pass = md5($op);
           return $this->check_old_credentials();
        }
        public function make_change($nu,$np,$ne){
            $np = md5($np);
            $this->sql = "UPDATE admin SET Email='$ne',User_name='$nu',Pass='$np'";
            if(mysqli_query(parent::$conn,$this->sql)){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>