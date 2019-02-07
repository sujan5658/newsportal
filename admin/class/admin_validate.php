<?php
    require_once ("connection.php");
    class admin_validate extends connection{
        private $email_user;
        private $pass;
        public function __construct(){
            $con = new connection();
            $con->db_connect();
        }
        public function validate($email,$p){
            $this->email_user = $email;
            $this->pass = md5($p);

            $this->sql = "SELECT * FROM admin WHERE Email='$this->email_user' AND Pass='$this->pass'";
            $this->result = mysqli_query(parent::$conn,$this->sql);
            if(mysqli_num_rows($this->result)>0){
                return true;
            }
            else{
                $this->sql = "SELECT * FROM admin WHERE User_name='$this->email_user' AND Pass='$this->pass'";
                $this->result = mysqli_query(parent::$conn,$this->sql);
                if(mysqli_num_rows($this->result)>0){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        public function increase_invalid_num(){
            $this->sql = "SELECT * FROM admin";
            $this->result = mysqli_query(parent::$conn,$this->sql);
            if(mysqli_num_rows($this->result)>0){
                while($row=mysqli_fetch_assoc($this->result)){
                    $status = $row['Status'];
                    break;
                }
            }
            if($status<5){
                $status=$status+1;
            }
            $this->sql = "UPDATE admin SET Status='$status'";
            mysqli_query(parent::$conn,$this->sql);
        }
        public function reset_invalid_num(){
            $this->sql = "UPDATE admin SET Status=0";
            mysqli_query(parent::$conn,$this->sql);
        }
    }
?>