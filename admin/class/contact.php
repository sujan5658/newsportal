<?php
    require_once ("connection.php");
    class contact extends connection{
        private $name;
        private $email;
        private $message;
        private $date;
        private $code;
        public function __construct(){
            $con = new connection();
            $con->db_connect();
        }
        private function upload(){
            $this->date = date("Y-m-d");
            $this->sql = "INSERT INTO Contact(Name,Email,Message,Contact_date,Status,Code) VALUES('$this->name','$this->email','$this->message','$this->date','1','$this->code')";
            if(mysqli_query(parent::$conn,$this->sql)){
                return true;
            }
            else{
                return false;
            }
        }
        public function upload_contact($n,$e,$m){
            $this->name = $n;
            $this->email = $e;
            $this->message = $m;
            $this->code = rand(1000,9999).rand(10000,99999).rand(100000,999999);
            return $this->upload();
        }
        public function delete_message($c){
            foreach($c as $code_arr){
                $this->sql = "DELETE FROM Contact WHERE Code='$code_arr'";
                if(!mysqli_query(parent::$conn,$this->sql)){
                    return false;
                    break;
                }
            }
            return true;
        }
    }
?>