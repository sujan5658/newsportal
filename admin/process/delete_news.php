<?php
    if(isset($_POST['del'])) {
        @session_start();
        require_once("../class/delete_news.php");
        $del = new delete_news();
        $del_arr = array();
        $i=0;
        $prev = $_SERVER['HTTP_REFERER'];
        $catagory = mysqli_real_escape_string(connection::$conn,$_POST['category']);
        if(!empty($_POST['del_news'])){
            foreach($_POST['del_news'] as $delete){
                $del_arr[$i] = $delete;
                $i++;
            }
            if($del->del_news($del_arr,$catagory)) {
                $_SESSION['del_news'] = "चयन गरिएका समाचारहरू सफलतापूर्वक मेटाईयो।";
                header("location:$prev");
            }
            else{
                $_SESSION['del_news'] = "आन्तरिक त्रुटि भयो।..!!!";
                header("location:$prev");
            }
        }
        else{
            $_SESSION['del_news'] = "कुनै वस्तु चयन गरिएको छैन।..!!!";
            header("location:$prev");
        }
    }
?>