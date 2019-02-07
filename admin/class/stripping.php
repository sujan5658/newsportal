<?php
    class stripping {
        private $value;
        private function filter(){
            $this->value = stripcslashes($this->value);
            $this->value = strip_tags($this->value);
            $this->value = htmlspecialchars($this->value);
            $this->value = htmlentities($this->value);
        }
        public function strip($v){
            $this->value = $v;
            $this->filter($this->value);
            return $this->value;
        }
    }
?>