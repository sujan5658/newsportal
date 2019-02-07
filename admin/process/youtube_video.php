<?php
    if(isset($_POST['video'])) {
        @session_start();
        require_once("../class/youtube_video.php");
        $you = new youtube_video();
        $location = $_SERVER['HTTP_REFERER'];
        $link = mysqli_real_escape_string(connection::$conn, $_POST['link']);
        if(filter_var($link, FILTER_VALIDATE_URL) !== FALSE){
            if($you->check_link($link)){
                if ($you->upload_link($link)) {
                    $_SESSION['video']="लिङ्क सफलतापूर्वक अपलोड भयो।";
                    header("location:$location");
                }
                else{
                    $_SESSION['video']="आन्तरिक त्रुटि।!!!!!!!!!";
                    header("location:$location");
                }
            }
            else{
                $_SESSION['video']="लिङ्क पहिले नै अपलोड गरिएको थियो।.!!!";
                header("location:$location");
            }
        }
        else{
            $_SESSION['video']="अमान्य लिङ्क।!!!!!!!!!";
            header("location:$location");
        }
    }
    else{
        header("location:$location");
    }
?>