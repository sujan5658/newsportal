<?php
    require_once ("admin/class/connection.php");
    $con = new connection();
    $con->db_connect();
    $sql = "SELECT * FROM Single_news";
    $result = mysqli_query(connection::$conn,$sql);
    if(mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_assoc($result)){
            $category = $row['Category'];
            $media = $row['Media'];
            break;
        }
    }
    ?>
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <?php
                    $sql = "SELECT * FROM $category WHERE Media='$media'";
                    $result = mysqli_query(connection::$conn,$sql);
                    if(mysqli_num_rows($result)>0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="single_page">
                                <h1><?php echo $row['Title'];?></h1>
                                <div class="single_page_content">
                                    <img class="img-center" src="admin/uploads/<?php echo $row['Media'];?>" alt="Image Error">
                                    <p style="text-align: justify"><?php echo $row['Body'];?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">
                <div class="single_sidebar">
                    <?php
                    require_once ("includes/popular.php");
                    ?>
                </div>
            </aside>
        </div>
    </div>
</section>




