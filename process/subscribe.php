<?php
    $location = $_SERVER['HTTP_REFERER'];
    if(isset($_POST['subscribe'])) {
        @session_start();
        require_once("../admin/class/subscribe.php");
        require_once("../admin/class/mailer.php");
        $sub = new subscribe();
        $mail = new mailer();

        $email = mysqli_real_escape_string(connection::$conn, $_POST['email']);
        $category = mysqli_real_escape_string(connection::$conn,$_POST['category']);

        switch($category){
            case "अन्त्रास्त्र्य":
                $category="International";
                break;
            case "रास्तृय":
                $category="National";
                break;
            case "राज्निती":
                $category="Politics";
                break;
            case "मनोरन्जन":
                $category="Entertainment";
                break;
            case "खेल्कुद":
                $category="Sports";
                break;
            case "अर्थ":
                $category="Others";
                break;
        }
        $subject = "Email Confirmation.";
        $message = rand(10000,99999);
        if($mail->confirm_email($email,$subject,$message)){
            $_SESSION['confirm_code'] = $message;
            $_SESSION['subscribe_email'] = $email;
            $_SESSION['subscribe_category']=$category;
            header("location:../index.php");
        }
        else{
            $_SESSION['subs_fail']="आन्तरिक त्रुटि..!!!! पछि फेरि प्रयास गर्नुहोस् ।";
            header("location:$location");
        }
    }
    else if(isset($_POST['subs'])){
        @session_start();
        require_once("../admin/class/subscribe.php");
        $sub = new subscribe();
        $code = mysqli_real_escape_string(connection::$conn,$_POST['confirm_code']);
        if($_SESSION['confirm_code']==$code){
            unset($_SESSION['confirm_code']);
            $email = $_SESSION['subscribe_email'];
            unset($_SESSION['subscribe_email']);
            $category = $_SESSION['subscribe_category'];
            unset($_SESSION['subscribe_category']);

            if ($sub->subscribe($email, $category)==0) {
                $_SESSION['subscribe']="ई-मेल कोटीमा पहिले नै सब्सक्राइब गरिएको छ ।";
                header("location:$location");
            }
            else if($sub->subscribe($email, $category)==1){
                $_SESSION['subscribe']="आन्तरिक त्रुटि ..!!!!";
                header("location:$location");
            }
            else{
                $_SESSION['subscribe']="सब्सक्रिप्शन सफल भयो।";
                header("location:$location");
            }
        }
        else{
            unset($_SESSION['confirm_code']);
            unset($_SESSION['subscribe_email']);
            unset($_SESSION['subscribe_category']);
            $_SESSION['subscribe']="अमान्य कोड.!! सदस्यता असफल भयो.!!!!";
            header("location:../index.php");
        }
    }
    else{
        header("location:$location");
    }
?>