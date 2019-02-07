<?php
    require_once ("connection.php");
    class delete_news extends connection{
        private $media;
        private $category;
        public function __construct(){
            $con = new connection();
            $con->db_connect();
            $this->media = array();
        }
        private function delete(){
           foreach($this->media as $m){
               $this->sql = "DELETE FROM $this->category WHERE Media='$m'";
               if(mysqli_query(parent::$conn,$this->sql)){
                   $m = "../uploads/".$m;
                   unlink($m);
               }
               else{
                   return false;
                   break;
               }
           }
           return true;
        }
        public function del_news($m,$c){
            $this->media = $m;
            $this->category = $c;
            return $this->delete();
        }
    }
?>