<?php
    if(isset($_POST['femail'])) {
        session_start();
        require_once("../class/change_credentials.php");
        $credit = new change_credentials();

        $email = mysqli_real_escape_string(connection::$conn, $_POST['femail']);

        if ($credit->check_email($email)) {
            header("location:../validate.php");
        } else {
            $_SESSION['email_invalid'] = "इमेल अमान्य छ।.!!!!";
            header("location:../forget_pass.php");
        }
    }
    else{
        header("location:../login.php");
    }
?>