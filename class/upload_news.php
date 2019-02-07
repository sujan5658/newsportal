<?php
    require_once ("connection.php");
    class upload_news extends connection{
        private $category;
        private $title;
        private $body;
        private $media;
        private $date;

        private function upload_news(){
            $this->sql = "INSERT INTO $this->category(Title,Body,Media,Upload_date) VALUES('$this->title','$this->body','$this->media','$this->date')";
            if(mysqli_query(parent::$conn,$this->sql)){
                return true;
            }
            else{
                return false;
            }
        }
        private function send_notification_mail(){
            $this->sql = "SELECT Email FROM Subscribe WHERE Category='$this->category'";
            $this->result = mysqli_query(parent::$conn,$this->sql);
            require_once ("mailer/src/PHPMailer.php");
            require_once ("mailer/src/SMTP.php");
            require_once ("mailer/src/Exception.php");
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSmtp();
            $mail->SMTPAuth = "true";
            $mail->SMTPSecure = "tls";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->Username = "computer2073.2016@gmail.com";
            $mail->Password = "Dangerous@#$5658";
            $mail->setFrom("computer2073.2016@gmail.com");
            $mail->Subject = "News Uploaded";
            $mail->Body = "News on your subscribed category ".$this->category." is uploaded recently on news title ".$this->title;
            if(mysqli_num_rows($this->result)>0) {
                while ($row = mysqli_fetch_assoc($this->result)) {
                    $mail->addAddress($row['Email']);
                }
            }
            if($mail->send()){
                return true;
            }
            else{
                return false;
            }
        }
        public function __construct(){
            $con = new connection();
            $con->db_connect();
        }
        public function upload($c,$t,$b,$m){
            $this->category = $c;
            $this->title = $t;
            $this->body = $b;
            $this->media = $m;
            $this->date = date("Y-m-d");
            return $this->upload_news();
        }
        private function upload_breakingg(){
            $this->sql = "INSERT INTO $this->category(Body,Breaking_date) VALUES('$this->body','$this->date')";
            if(mysqli_query(parent::$conn,$this->sql)){
                return true;
            }
            else{
                return false;
            }
        }
        public function upload_breaking($c,$b){
            $this->category = $c;
            $this->body = $b;
            $this->date = date("Y-m-d");
            return $this->upload_breakingg();
        }
        public function notify(){
            return $this->send_notification_mail();
        }
    }
?>