<form method="post" action="process/delete_message.php" enctype="multipart/form-data" onsubmit="return confirm('चयन गरिएका सन्देशहरू मेट्ने हो?');">
<div class="row" style="height: 55px">
    <ol class="breadcrumb" style="height: 50px">
        <li>
            <em class="fa fa-envelope-open"></em>
        </li>
        <li class="active">प्रयोगकर्ताको सन्देश</li>
        <small>
            <?php
            if(isset($_SESSION['del_message'])){
                echo $_SESSION['del_message'];
                unset($_SESSION['del_message']);
            }
            ?>
        </small>
        <button style="float: right;" type="submit" name="del" class="btn btn-danger">चयन गरिएको समाचार मेटाउनुहोस्। &emsp;<span class="fa fa-trash"></span></button>
    </ol>
</div>
    <?php
        require_once ("class/connection.php");
        $con = new connection();
        $con->db_connect();
        $sql = "UPDATE Contact SET Status=0";
        mysqli_query(connection::$conn,$sql);
        $sql = "SELECT * FROM Contact ORDER BY SN DESC";
        $result = mysqli_query(connection::$conn,$sql);
        if(mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        नाम : <?php echo $row['Name'];?>
                        <span class="badge" style="background-color: red;color:white;float: right;height: 32px">
                            <input type="checkbox" name="del_message[]" value="<?php echo $row['Code']; ?>">&emsp;मेटाउनको लागी चयन गर्नुहोस्।
                            <span class="fa fa-trash"></span>
                        </span>
                    </div>
                    <div class="panel-body">
                        <p>
                            <b>
                                ठेगाना : <?php echo $row['Email'];?><br>
                                मिति : <?php echo $row['Contact_date'];?><br>
                            </b>
                            <?php echo $row['Message'];?>
                        </p>
                    </div>
                </div>
                <?php
            }
        }
    ?>
</form>