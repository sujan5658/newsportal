<?php
    if(isset($_POST['code'])) {
        session_start();
        require_once("../class/connection.php");
        $con = new connection();
        $con->db_connect();

        $code = mysqli_real_escape_string(connection::$conn, $_POST['code']);
        if ($code == $_SESSION['validate_code']) {
            header("location:../change.php");
        } else {
            $_SESSION['admin'] = "अमान्य कोड....!!!";
            header("location:../login.php");
        }
    }
    else{
        header("location:../login.php");
    }
?>