<?php
    require_once ("connection.php");
    class subscribe extends connection{
        private $email;
        private $category;
        public function __construct(){
            $con = new connection();
            $con->db_connect();
        }
        private function check_email_in_db(){
            $this->sql = "SELECT * FROM Subscribe WHERE Email='$this->email' AND Category='$this->category'";
            $this->result = mysqli_query(parent::$conn,$this->sql);
            if(mysqli_num_rows($this->result)>0){
                return false;
            }
            else{
                return true;
            }
        }
        private function upload_email(){
            $this->sql = "INSERT INTO Subscribe(Email,Category) VALUES('$this->email','$this->category')";
            if(mysqli_query(parent::$conn,$this->sql)){
                return true;
            }
            else{
                return false;
            }
        }
        public function subscribe($e,$c){
            $this->email = $e;
            $this->category = $c;
            if($this->check_email_in_db()){
                if($this->upload_email()){
                    return 2;
                }
                else{
                    return 1;
                }
            }
            else{
                return 0;
            }
        }
        private function delete_subscription(){
            $this->sql = "DELETE FROM Subscribe WHERE Email='$this->email' AND Category='$this->category'";
            if(mysqli_query(parent::$conn,$this->sql)){
                return true;
            }
            else{
                return false;
            }
        }
        public function unsubscribe($e,$c){
            $this->email = $e;
            $this->category = $c;
            if($this->check_email_in_db()){
                return 0;
            }
            else{
                if($this->delete_subscription()){
                    return 2;
                }
                else{
                    return 1;
                }
            }
        }
    }
?>