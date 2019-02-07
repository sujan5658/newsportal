<?php
        session_start();
        require_once("../class/upload_news.php");
        $up = new upload_news();

        $category = mysqli_real_escape_string(connection::$conn, $_POST['category']);
        if($category=="Economy"){
            $category = "Others";
        }
        $body = mysqli_real_escape_string(connection::$conn, $_POST['body']);
        if($category=='Breaking'){
            if($up->upload_breaking($category,$body)){
                $_SESSION['upload_news'] = "समाचार सफलतापूर्वक अपलोड गरियो। ";
                header("location:../index.php");
            }
            else{
                $_SESSION['upload_news'] = "आन्तरिक त्रुटि समाचार अपलोड असफल भयो।...!!!";
                header("location:../index.php");
            }
        }
        else{
            $title = mysqli_real_escape_string(connection::$conn, $_POST['title']);
            $media = $_FILES['media']['name'];
            $tmp_media = $_FILES['media']['tmp_name'];
            $media = rand(100000, 999999) . rand(1000, 9999) . rand(10000, 99999) . $media;
            $destination = "../uploads/" . $media;
            if (move_uploaded_file($tmp_media,$destination)) {
                if ($up->upload($category, $title, $body, $media)) {
                     $up->notify();
                    if($category=="Others"){$category = "Economy";}
                    $_SESSION['upload_news'] = "समाचार सफलतापूर्वक अपलोड गरियो।  ";
                    header("location:../index.php");
                }
                else {
                    $_SESSION['upload_news'] = "आन्तरिक त्रुटि समाचार अपलोड असफल भयो।...!!!";
                    header("location:../index.php");
                }
            }
            else {
                $_SESSION['upload_news'] = "समाचार अपलोड असफल भयो।...!!!";
                header("location:../index.php");
            }
        }
?>