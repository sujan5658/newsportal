<?php
    if(isset($_POST['media'])) {
        require_once("admin/class/connection.php");
        $con = new connection();
        $con->db_connect();
        @$media = mysqli_real_escape_string(connection::$conn, $_POST['media']);
        @$category = mysqli_real_escape_string(connection::$conn, $_POST['category']);
        $sql = "UPDATE Single_news SET Media='$media',Category='$category'";
        mysqli_query(connection::$conn,$sql);
        $location = "index.php?page=".base64_encode('inner-news');
        header("location:$location");
    }
    else{
        $location = "index.php?page=".base64_encode('inner-news');
        header("location:$location");
    }
    ?>