<?php
    require_once ("connection.php");
    class upload_photograph extends  connection{
        private $photo;
        public function __construct(){
            $con = new connection();
            $con->db_connect();
        }
        private function upload_photo(){
            $this->sql = "INSERT INTO Photograph(Photo) VALUES('$this->photo')";
            if(mysqli_query(parent::$conn,$this->sql)){
                return true;
            }
            else{
                return false;
            }
        }
        public function upload($p){
            $this->photo = $p;
            return $this->upload_photo();
        }
        public function del_photo($d){
            foreach($d as $del){
                $this->sql = "DELETE FROM Photograph WHERE Photo = '$del'";
                $file = "../photography/".$del;
                unlink($file);
                if(!mysqli_query(parent::$conn,$this->sql)){
                    return false;
                    break;
                }
            }
            return true;
        }
    }
?>