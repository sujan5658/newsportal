<?php
session_start();
if(!isset($_SESSION['validate_code'])){
    header("location:login.php");
}
else{
    unset($_SESSION['validate_code']);
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
            <div class="panel-heading">Choose the strong password</div>
            <div class="panel-body">
                <center><img src="image/admin.png"></center>
                <form role="form" method="post" action="process/set_new_pass.php">
                    <h6 id="pas"></h6>
                    <fieldset>
                        <div class="form-group">
                            <label>New Password :</label>
                            <input class="form-control" oninput="check()" placeholder="********" id="pass1" name="pass1" type="password" required>
                        </div>
                        <div class="form-group">
                            <label>Retype Password :</label>
                            <input class="form-control" oninput="check()" placeholder="********" id="pass2" name="pass2" type="password" required>
                        </div>
                        <button style="float: right;" type="submit" name="change" class="btn btn-primary">Change</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
<script type="text/javascript">
    function check() {
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;
        if(pass1!=pass2){
            document.getElementById("pas").innerHTML = "Password not matched";
            document.getElementById("pas").style.color = "red";
        }
        else{
            document.getElementById("pas").innerHTML = "Password matched";
            document.getElementById("pas").style.color = "green";
        }
    }
</script>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
