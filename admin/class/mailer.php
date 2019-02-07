<?php
    require_once ("connection.php");
    require_once ("mailer/src/PHPMailer.php");
    require_once ("mailer/src/SMTP.php");
    require_once ("mailer/src/Exception.php");
    class mailer extends connection{
        private $email;
        private $message;
        private $from;
        private $password;
        private $subject;
        public function __construct(){
            $con = new connection();
            $con ->db_connect();
            $this->from = "computer2073.2016@gmail.com";
            $this->password = "Dangerous@#$5658";
        }
        private function send_mail(){
            $mail = new \PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSmtp();
            $mail->SMTPAuth = "true";
            $mail->SMTPSecure = "tls";
            $mail->Host = "smtp.gmail.com";
            $mail->port = 587;
            $mail->From = $this->from;
            $mail->Username = $this->from;
            $mail->Password = $this->password;
            $mail->setFrom($this->from);
            $mail->Subject = $this->subject;
            $mail->Body = $this->message;
            $mail->addAddress($this->email);
            if($mail->send()){
                return true;
            }
            else{
                return false;
            }
        }
        public function confirm_email($e,$s,$m){
            $this->email = $e;
            $this->subject = $s;
            $this->message = $m;
            return $this->send_mail();
        }
    }
?>