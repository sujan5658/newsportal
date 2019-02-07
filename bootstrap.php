<?php
    @session_start();
    if(isset($_SESSION['confirm_code'])){
        require_once ("includes/confirm_email.php");
    }
    else{
        $page =isset($_GET['page'])?$_GET['page']: "";
        $page = base64_decode($page);
        switch($page){
            case 'international':
                require_once ("includes/international.php");
                break;
            case 'national':
                require_once ("includes/national.php");
                break;
            case 'politics':
                require_once ("includes/politics.php");
                break;
            case 'entertainment':
                require_once ("includes/entertainment.php");
                break;
            case 'others':
                require_once ("includes/others.php");
                break;
            case 'sports':
                require_once ("includes/sports.php");
                break;
            case 'photography':
                require_once ("includes/photography.php");
                break;
            case 'videos':
                require_once ("includes/videos.php");
                break;
            case 'inner-news':
                require_once ("includes/inner-news.php");
                break;
            case 'contact':
                require_once ("includes/contact.php");
                break;
            default :
                require_once ("includes/body.php");
        }
    }
?>