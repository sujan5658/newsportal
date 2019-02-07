<?php
    @session_start();
    require_once ("../class/youtube_video.php");
    $you = new youtube_video();
    $vid = array();
    $i=0;
    $location = $_SERVER['HTTP_REFERER'];
    if(!empty($_POST['y-video'])){
        foreach($_POST['y-video'] as $v){
            $vid[$i] = $v;
            $i++;
        }
        if($you->remove_video($vid)){
            $_SESSION['delete_video'] = "  चयन गरिएका भिडियोहरू मेटाईयो।";
            header("location:$location");
        }
        else{
            $_SESSION['delete_video'] = "आन्तरिक त्रुटि..!!!!";
            header("location:$location");
        }
    }
    else{
        $_SESSION['delete_video'] = "कुनै वस्तु चयन गरिएको छैन।..!!!!";
        header("location:$location");
    }
?>