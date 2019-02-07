<?php
    @session_start();
    $page = isset($_GET['page'])?$_GET['page']:"";
    $page = base64_decode($page);
    switch($page){
        case "user-message":
            include_once ("includes/user-message.php");
            break;
        case "international":
            $_SESSION['news'] = "International";
            include_once ("includes/news.php");
            break;
        case "national":
            $_SESSION['news'] = "National";
            include_once ("includes/news.php");
            break;
        case "sports":
            $_SESSION['news'] = "Sports";
            include_once ("includes/news.php");
            break;
        case "entertainment":
            $_SESSION['news'] = "Entertainment";
            include_once ("includes/news.php");
            break;
        case "popular":
            $_SESSION['news'] = "Popular";
            include_once ("includes/news.php");
            break;
        case "politics":
            $_SESSION['news'] = "Politics";
            include_once ("includes/news.php");
            break;
        case "others":
            $_SESSION['news'] = "Others";
            include_once ("includes/news.php");
            break;
        case "photography":
            include_once ("includes/photography.php");
            break;
        case "youtube_video":
            include_once ("includes/youtube_video.php");
            break;
        case "credentials":
            include_once ("includes/change_credentials.php");
            break;
        case "subscribers":
            include_once ("includes/subscribers.php");
            break;
        default:
            include_once ("includes/body.php");
    }
?>