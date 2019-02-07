<?php
    @session_start();
    $category = $_SESSION['news'];
    $categoryy = $category;
    unset($_SESSION['news']);
    switch($category){
        case "Popular":
            $category = "लोकप्रिय";
            break;
        case "International":
            $category="अन्त्रास्त्र्य";
            break;
        case "National":
            $category="रास्तृय";
            break;
        case "Sports":
            $category="खेल्कुद";
            break;
        case "Politics":
            $category="राज्नितीक";
            break;
        case "Entertainment":
            $category="मनोरन्जन";
            break;
        case "Others":
            $category="अर्थ";
            break;
    }
?>
<form method="post" action="process/delete_news.php" enctype="multipart/form-data" onsubmit="return confirm('चयन गरिएको समाचार मेट्ने हो?');">
<div class="row" style="height: 55px">
    <ol class="breadcrumb" style="height: 50px">
        <li>
            <em class="fa fa-newspaper-o"></em>
        </li>
        <li class="active"><?php echo $category;?></li>
        <small>
            <?php
                if(isset($_SESSION['del_news'])){
                    echo $_SESSION['del_news'];
                    unset($_SESSION['del_news']);
                }
            ?>
        </small>
        <button style="float: right;" type="submit" name="del" class="btn btn-danger">चयन गरिएको समाचार मेटाउनुहोस्।&emsp;<span class="fa fa-trash"></span></button>
    </ol>
</div>
    <?php
        require_once ("class/connection.php");
        $con = new connection();
        $con->db_connect();
        $sql = "SELECT * FROM $categoryy ORDER BY SN DESC";
        $result = mysqli_query(connection::$conn,$sql);
        if(mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        अपलोड मिति : <?php echo $row['Upload_date']; ?>
                        <span class="badge" style="background-color: red;color:white;float: right;height: 32px">
                            <input type="hidden" name="category" value="<?php echo $categoryy?>">
                            <input type="checkbox" name="del_news[]" value="<?php echo $row['Media']; ?>">&emsp;मेटाउनको लागी चयन गर्नुहोस्।
                            <span class="fa fa-trash"></span>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4><b>समाचार शीर्षक :</b> <?php echo $row['Title'] ?></h4>
                        <p>
                        <center><img src="uploads/<?php echo $row['Media']; ?>" style="border-radius: 10px;" alt="Image Error" height="400px" width="auto"></center>
                        <?php echo $row['Body']; ?>
                        </p>
                    </div>
                </div>
                <?php
            }
        }
    ?>
</form>