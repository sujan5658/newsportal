<?php
    require_once ("connection.php");
    class youtube_video extends connection{
        private $link;
        public function __construct(){
            $con = new connection();
            $con->db_connect();
        }
        public function check_link($l){
            $this->sql = "SELECT * FROM Youtube_video WHERE Link='$l'";
            $this->result = mysqli_query(parent::$conn,$this->sql);
            if(mysqli_num_rows($this->result)>0){
                return false;
            }
            else{
                return true;
            }
        }
        private function upload(){
            $this->sql = "INSERT INTO Youtube_video(Link) VALUES ('$this->link')";
            if(mysqli_query(parent::$conn,$this->sql)){
                return true;
            }
            else{
                return false;
            }
        }
        public function upload_link($l){
            $this->link = $l;
            return $this->upload();
        }
        public function remove_video($vid){
            foreach($vid as $v){
                $this->sql= "DELETE FROM Youtube_video WHERE Link='$v'";
                if(!mysqli_query(parent::$conn,$this->sql)){
                    return false;
                    break;
                }
            }
            return true;
        }
    }
?>