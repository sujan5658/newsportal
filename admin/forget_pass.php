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
            <div class="panel-heading">Enter the registered email address</div>
            <div class="panel-body">
                <center><img src="image/admin.png"></center>
                <form role="form" method="post" action="process/forget_pass.php">
                    <fieldset>
                        <div class="form-group">
                            <label>Email :</label>
                            <input class="form-control" placeholder="E-mail" name="femail" type="email" required>
                        </div>
                        <?php
                        @session_start();
                        if(isset($_SESSION['email_invalid'])){
                            echo $_SESSION['email_invalid']."<br>";
                            unset($_SESSION['email_invalid']);
                        }
                        ?>
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
