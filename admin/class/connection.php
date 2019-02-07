<?php
    class connection{
        private $host;
        private $user;
        private $pwd;
        private $db_name;
        public static $conn;
        protected $sql;
        protected $result;
        protected $query;
        public function __construct($h="localhost",$u="root",$p="",$db="newsportal"){
            $this->host = $h;
            $this->user = $u;
            $this->pwd = $p;
            $this->db_name = $db;
        }
        public function db_connect(){
            self::$conn = mysqli_connect($this->host,$this->user,$this->pwd,$this->db_name);
            if(!self::$conn){
                die("Connection failed...!!!");
            }
        }
        public function db_close(){
            mysqli_close(self::$conn);
        }
    }
?>