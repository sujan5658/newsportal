<?php
    require_once ("connection.php");
    require_once ("mailer.php");
    class lock_admin extends connection{
        private $email;
        private $subject;
        private $message;
        public function __construct(){
            $con = new connection();
            $con->db_connect();
        }
        private function check_s(){
            $this->sql = "SELECT * FROM admin WHERE Status>=5";
            $this->result = mysqli_query(parent::$conn,$this->sql);
            if(mysqli_num_rows($this->result)>0){
                return true;
            }
            else{
                return false;
            }
        }
        public function check_status(){
            return $this->check_s();
        }
        private function send_alert_mail(){
            $this->sql = "SELECT * FROM admin";
            $this->result = mysqli_query(parent::$conn,$this->sql);
            if(mysqli_num_rows($this->result)>0){
                while($row = mysqli_fetch_assoc($this->result)){
                    $this->email = $row['Email'];
                    break;
                }
            }
            $mail = new mailer();
            $this->subject = "Unknown Login..!!!";
            $this->message = "Unknown People tried login the admin page. Please secure your page by selecting strong password with different special characters. Go through forget password process.";
            $mail->confirm_email($this->email,$this->subject,$this->message);
        }
        private function protect_adminn(){
            $this->sql = "UPDATE admin SET Status='1'";
            mysqli_query(parent::$conn,$this->sql);
            $this->send_alert_mail();
        }
        public function protect_admin(){
            $this->protect_adminn();
        }
    }
?>