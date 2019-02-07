<?php
    @session_start();
    $location = $_SERVER['HTTP_REFERER'];
    if(isset($_POST['change_credit'])) {
        require_once("../class/change_credentials.php");
        $change = new change_credentials();

        $old_user = mysqli_real_escape_string(connection::$conn, $_POST['old_user']);
        $old_pass = mysqli_real_escape_string(connection::$conn, $_POST['old_pass']);
        $new_user = mysqli_real_escape_string(connection::$conn, $_POST['new_user']);
        $new_pass = mysqli_real_escape_string(connection::$conn, $_POST['new_pass']);
        $new_email = mysqli_real_escape_string(connection::$conn, $_POST['new_email']);
        if ($change->check_old($old_user, $old_pass)) {
            if($change->make_change($new_user,$new_pass,$new_email)){
                $_SESSION['change']= " नयाँ प्रमाणहरू सफलतापूर्वक अद्यावधिक गरियो।";
                header("location:$location");
            }
            else{
                $_SESSION['change']= "आन्तरिक त्रुटि...!!!";
                header("location:$location");
            }
        }
        else{
            $_SESSION['change']= "पुरानो प्रयोगकर्ता वा पासवर्ड अमान्य छ।...!!!";
            header("location:$location");
        }
    }
    else{
        header("location:$location");
    }
?>