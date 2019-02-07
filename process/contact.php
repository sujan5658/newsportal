<?php
    if(isset($_POST['submit-contact'])) {
        require_once("../admin/class/contact.php");
        require_once ("../admin/class/stripping.php");
        $strip = new stripping();
        $cont = new contact();
        $location = $_SERVER['HTTP_REFERER'];
        $name = mysqli_real_escape_string(connection::$conn, $_POST['name']);
        $email = mysqli_real_escape_string(connection::$conn, $_POST['email']);
        $message = mysqli_real_escape_string(connection::$conn, $_POST['message']);

        $name = $strip->strip($name);
        $email = $strip->strip($email);
        $message = $strip->strip($message);
        if ($cont->upload_contact($name, $email, $message)) {
            @session_start();
            $_SESSION['contact'] = "Your Message is send to the Office";
            header("location:$location");
        }
        else {
            $_SESSION['contact'] = "Internal Error...!!!!";
            header("location:$location");
        }
    }
    else{
        header("location:$location");
    }
?>