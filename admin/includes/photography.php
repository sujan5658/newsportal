<div class="row">
    <ol class="breadcrumb">
        <li>
            <em class="fa fa-photo"></em>
        </li>
        <li class="active">फोटोग्राफी</li>
    </ol>
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-up').attr('src', e.target.result);
                var img = document.getElementById("image-up");
                img.style.display ='block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<div class="panel panel-primary">
    <div class="panel-heading">
        फोटोहरू अपलोड गर्नुहोस्।
        <?php
        @session_start();
        if(isset($_SESSION['photo'])){
            echo "  /  ".$_SESSION["photo"];
            unset($_SESSION['photo']);
        }
        ?>
    </div>
    <div class="panel-body">
        <form method="post" action="process/upload_photograph.php" enctype="multipart/form-data">
            <div class="form-group">
                <img src="#" id="image-up" style="display: none" height="250px" width="auto">
                <input type="file" required class="form-control" name="photo" onchange="readURL(this)";>
                <button type="submit" class="btn btn-primary">अपलोड गर्नुहोस्।</button>
            </div>
        </form>
    </div>
</div>

<form method="post" action="process/delete_photography.php" enctype="multipart/form-data" onsubmit="return confirm('छानिएका तस्बिरहरू मेट्ने हो?');">
<div class="panel panel-primary">
    <div class="panel-heading">
        अपलोड गरिएका तस्बिरहरू।
        <?php
            @session_start();
            if(isset($_SESSION['del_photo'])){
                echo $_SESSION['del_photo'];
                unset($_SESSION['del_photo']);
            }
        ?>
        <button style="float: right;" class="btn btn-danger" type="submit" name="del_photo">चयन गरिएको फाइल मेटाउनुहोस्। </button>
    </div>
    <div class="panel-body">

            <?php
                require_once ("class/connection.php");
                $con = new connection();
                $con->db_connect();
                $sql = "SELECT * FROM Photograph";
                $result = mysqli_query(connection::$conn,$sql);
                if(mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <a href="photography/<?php echo $row['Photo'];?>" target="_blank"><img src="photography/<?php echo $row['Photo'];?>" class="photograph"></a>
                        <input type="checkbox" name="del[]" value="<?php echo $row['Photo'];?>">
                        <?php
                    }
                }
            ?>
    </div>
</div>
</form>