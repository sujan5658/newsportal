<?php
    session_start();
    require_once ("../class/upload_photograph.php");
    $photo = new upload_photograph();

    $file = $_FILES['photo']['name'];
    $tmp_file = $_FILES['photo']['tmp_name'];
    $unique =rand(1000,9999).rand(10000,99999).rand(100000,999999).$file;
    $destination = "../photography/".$unique;
    if(move_uploaded_file($tmp_file,$destination)){
        if($photo->upload($unique)){
            $_SESSION['photo']="तस्बिर सफलतापूर्वक अपलोड गरियो।";
            header("location:../index.php?page=cGhvdG9ncmFwaHk=");
        }
        else{
            $_SESSION['photo']="आन्तरिक त्रुटि अपलोड असफल भयो।..!!";
            header("location:../index.php?page=cGhvdG9ncmFwaHk=");
        }
    }
    else{
        $_SESSION['photo']="फोटो अपलोड असफल भयो।..!!";
        header("location:../index.php?page=cGhvdG9ncmFwaHk=");
    }
?>