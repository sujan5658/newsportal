<script>
    function validate_form() {
        var pass1 = document.getElementById("new_pass").value;
        var pass2 = document.getElementById("new_rpass").value;
        if(pass1!=pass2){
            document.getElementById("display").innerHTML = "पासवर्ड पुनः मेल खाएन।.!!!";
            document.getElementById("display").style.color = "red";
        }
        else{
            document.getElementById("display").innerHTML = "पासवर्ड मिल्दो।";
            document.getElementById("display").style.color = "green";
        }
    }
</script>
<div class="row">
    <ol class="breadcrumb">
        <li>
            <em class="fa fa-user-circle"></em>
        </li>
        <li class="active">प्रमाण परिवर्तन गर्नुहोस्।</li>
    </ol>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        तपाइँको प्रमाण परिवर्तन गर्नुहोस्।
    </div>
    <div class="panel-body">
        <form method="post" name="myform" action="process/change_credentials.php" onsubmit="return confirm('Confirm Making Changes ?');">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>पुरानो प्रयोगकर्ता :</label>
                    <input style="width: 400px;" type="text" id="old_user" name="old_user" required placeholder="पुराना प्रयोगकर्ताको नाम" class="form-control">
                </div>
                <div class="form-group">
                    <label>पुरानो पासवर्ड :</label>
                    <input style="width: 400px;" type="password" id="old_pass" name="old_pass" required placeholder="पुरानो प्रयोगकर्ताको पासवर्ड" class="form-control">
                </div>
                <div class="form-group">
                    <label>नयाँ इमेल :</label>
                    <input style="width: 400px;" type="email" id="new_email" name="new_email" required placeholder="नयाँ इमेल" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>नयाँ प्रयोगकर्ता :</label>
                    <input style="width: 400px;" type="text" id="new_user" name="new_user" required placeholder="नयाँ प्रयोगकर्ताको नाम" class="form-control">
                </div>
                <div class="form-group">
                    <label>नयाँ पासवर्ड : &emsp;<small><i id="display"></i></small></label>
                    <input style="width: 400px;" type="password" oninput="validate_form()" id="new_pass" name="new_pass" required placeholder="नयाँ प्रयोगकर्ताको पासवर्ड" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>पासवर्ड पुन: लेख्नुहोस :</label>
                    <input style="width: 400px;" type="password" id="new_rpass" oninput="validate_form()" name="new_rpass" required placeholder="पासवर्ड पुन: लेख्नुहोस" class="form-control">
                </div>
                <input type="submit" name="change_credit" class="btn btn-primary" value="परिवर्तन गर्नुहोस्।">
            </div>
        </form>
    </div>
</div>
<?php
    @session_start();
    if(isset($_SESSION['change'])){
        echo "<script> alert('".$_SESSION['change']."');</script>";
        unset($_SESSION['change']);
    }
?>