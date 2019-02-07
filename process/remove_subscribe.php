<?php
$location = $_SERVER['HTTP_REFERER'];
if(isset($_POST['unsubscribe'])) {
    @session_start();
    require_once("../admin/class/subscribe.php");
    require_once("../admin/class/mailer.php");
    $sub = new subscribe();
    $mail = new mailer();

    $email = mysqli_real_escape_string(connection::$conn, $_POST['unemail']);
    $category = mysqli_real_escape_string(connection::$conn, $_POST['categoryy']);
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
        $_SESSION['unsubscribe_email'] = $email;
        $_SESSION['unsubscribe_category']=$category;
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
        $email = $_SESSION['unsubscribe_email'];
        unset($_SESSION['unsubscribe_email']);
        $category = $_SESSION['unsubscribe_category'];
        unset($_SESSION['unsubscribe_category']);
        if ($sub->unsubscribe($email, $category)==0) {
            $_SESSION['subscribe']="कोटिको लागि इमेल सदस्यता छैन । त्यसैले कुनै हटाउन छैन ।";
            header("location:$location");
        }
        else if($sub->unsubscribe($email, $category)==1){
            $_SESSION['subscribe']="आन्तरिक त्रुटि..!!!!";
            header("location:$location");
        }
        else{
            $_SESSION['subscribe']="सदस्यता सफलतापूर्वक रद्द भयो ।";
            header("location:$location");
        }
    }
    else{
        unset($_SESSION['confirm_code']);
        unset($_SESSION['subscribe_email']);
        unset($_SESSION['subscribe_category']);
        $_SESSION['subscribe']="अमान्य कोड। !! सदस्यता रद्द भएन .!!!!";
        header("location:../index.php");
    }
}
else{
    header("location:$location");
}
?>