<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <center>
                <?php
                require_once ("admin/class/connection.php");
                $con = new connection();
                $con->db_connect();
                $sql = "SELECT Media,Title FROM Sports ORDER BY SN DESC";
                $result = mysqli_query(connection::$conn,$sql);
                if(mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="news">
                            <img src="admin/uploads/<?php echo $row['Media'];?>" style="border-radius: 5px" width="650px"><br>
                            <form method="post" action="single_news.php">
                                <input type="hidden" value="<?php echo $row['Media'];?>" name="media">
                                <input type="hidden" value="Sports" name="category">
                                <button type="submit" class="submit-btn">
                                    <h3><?php echo $row['Title'];?></h3>
                                </button>
                            </form>
                        </div>
                        <br>
                        <?php
                    }
                }
                ?>
            </center>
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