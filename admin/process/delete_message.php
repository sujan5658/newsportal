<?php
    @session_start();
    require_once ("../class/contact.php");
    $con = new contact();
    $location = $_SERVER['HTTP_REFERER'];
    $code = array();
    if(!empty($_POST['del_message'])){
        $i=0;
        foreach($_POST['del_message'] as $d){
            $code[$i] = $d;
            $i++;
        }
        if($con->delete_message($code)){
            $_SESSION['del_message'] = "सन्देश मेटाईयो।";
            header("location:$location");
        }
        else{
            $_SESSION['del_message'] = " आन्तरिक त्रुटि...!!!";
            header("location:$location");
        }
    }
    else{
        $_SESSION['del_message'] = " कुनै वस्तु चयन गरिएको छैन।";
        header("location:$location");
    }
?>