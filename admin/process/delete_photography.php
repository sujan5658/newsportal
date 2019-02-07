<?php
    if(isset($_POST['del_photo'])) {
        @session_start();
        require_once("../class/upload_photograph.php");
        $del = new upload_photograph();
        $i=0;
        $photo = array();
        if (!empty($_POST['del'])) {
            foreach ($_POST['del'] as $d){
                $photo[$i] = $d;
                $i++;
            }
            if($del->del_photo($photo)){
                $_SESSION['del_photo'] = "**** चयनित तस्बिर मेटाईयो। ****";
                header("location:../index.php?page=cGhvdG9ncmFwaHk=");
            }
            else{
                $_SESSION['del_photo'] = " <small style='color: red'>****** आन्तरिक त्रुटि..!!!! ******</small>";
                header("location:../index.php?page=cGhvdG9ncmFwaHk=");
            }
        }
        else{
            header("location:../index.php?page=cGhvdG9ncmFwaHk=");
        }
    }

?>