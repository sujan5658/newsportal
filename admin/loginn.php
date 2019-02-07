<?php
    @session_start();
    if(!isset($_SESSION['multiple_invalid'])){
        header("location:login.php");
    }
    else{
        unset($_SESSION['multiple_invalid']);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Pannel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: #a6e1ec">
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">व्यवस्थापक
                <?php
                        @session_start();
                        if(isset($_SESSION['admin'])){
                            echo "<small><i style='color: red'>".$_SESSION['admin']."</i></small><br>";
                            unset($_SESSION['admin']);
                        }
                        ?>
            </div>
            <div class="panel-body">
                <center><img src="image/admin.png"></center>
                <h5>एकाधिक अमान्य पहुँचको कारण व्यवस्थापक खाता लक गरियो।</h5>
                <a href="forget_pass.php" style="text-decoration: none"><i>पासवर्ड बिर्सनुभयो?</i></a>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
