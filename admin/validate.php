<?php
    session_start();
    if(!isset($_SESSION['validate_code'])){
        header("location:login.php");
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
            <div class="panel-heading">Enter the verification code sent to email</div>
            <div class="panel-body">
                <center><img src="image/admin.png"></center>
                <form role="form" method="post" action="process/check_code.php">
                    <fieldset>
                        <div class="form-group">
                            <label>Code :</label>
                            <input class="form-control" placeholder="Code" name="code" type="text" required>
                        </div>
                        <button style="float: right;" type="submit" name="login" class="btn btn-primary">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
