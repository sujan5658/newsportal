<?php
if(isset($_POST['pass1'])) {
    @session_start();
    require_once("../class/change_credentials.php");
    $change = new  change_credentials();

    $pass = mysqli_real_escape_string(connection::$conn, $_POST['pass1']);

    if ($change->change_only_pass($pass)) {
        $_SESSION['admin'] = "पासवर्ड परिवर्तन भयो।";
        header("location:../login.php");
    }
}
else{
    header("location:../login.php");
}
?>