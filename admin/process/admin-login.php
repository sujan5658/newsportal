<?php
    session_start();
    if(isset($_POST['login'])){
        require_once ("../class/admin_validate.php");
        $admin = new admin_validate();

        $email_user = mysqli_real_escape_string(connection::$conn,$_POST['email']);
        $pass = mysqli_real_escape_string(connection::$conn,$_POST['pass']);
        if($admin->validate($email_user,$pass)){
            $_SESSION['admin'] = "valid";
            $admin->reset_invalid_num();
            $admin->db_close();
            header("location:../index.php");
        }
        else{
            $_SESSION['admin'] = "अमान्य इ-मेल / प्रयोगकर्ता वा पासवर्ड।..!!!";
            $admin->increase_invalid_num();
            $admin->db_close();
            header("location:../login.php");
        }
    }
    else{
        header("location:../login.php");
    }
?>