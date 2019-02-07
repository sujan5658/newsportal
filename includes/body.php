<section id="sliderSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="slick_slider">
                <?php
                    require_once ("admin/class/connection.php");
                    $con = new connection();

                    $sql = "SELECT * FROM Popular ORDER BY SN DESC";
                    $result=mysqli_query(connection::$conn,$sql);
                    if(mysqli_num_rows($result)>0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="single_iteam">
                                <form method="post" action="single_news.php">
                                    <input type="hidden" value="<?php echo $row['Media'];?>" name="media">
                                    <input type="hidden" value="Popular" name="category">
                                    <button class="submit-btn" type="submit">
                                        <img src="admin/uploads/<?php echo $row['Media'];?>" alt="Img error">
                                    </button>
                                </form>
                                <div class="slider_article">
                                    <h2><a class="slider_tittle"><?php echo $row['Title'];?></a></h2>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="latest_post">
                <h2><span><b>ताजा खबर</b></span></h2>
                <div class="latest_post_container" style="overflow: hidden">
                    <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                    <ul class="latest_postnav">
                        <?php
                        $sql = "SELECT * FROM International ORDER BY SN DESC";
                        $result=mysqli_query(connection::$conn,$sql);
                        if(mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img alt="Img error" src="admin/uploads/<?php echo $row['Media'];?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="catg_title">
                                                        <form method="post" action="single_news.php">
                                                            <input type="hidden" value="<?php echo $row['Media'];?>" name="media">
                                                            <input type="hidden" value="International" name="category">
                                                            <button class="submit-btn catg_title">
                                                                <?php echo $row['Title']; ?>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                break;
                            }
                        }
                        $sql = "SELECT * FROM National ORDER BY SN DESC";
                        $result=mysqli_query(connection::$conn,$sql);
                        if(mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img alt="Img error"
                                                         src="admin/uploads/<?php echo $row['Media']; ?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="catg_title">
                                                        <form method="post" action="single_news.php">
                                                            <input type="hidden" value="<?php echo $row['Media']; ?>" name="media">
                                                            <input type="hidden" value="National" name="category">
                                                            <button class="submit-btn catg_title">
                                                                <?php echo $row['Title']; ?>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                break;
                            }
                        }
                        $sql = "SELECT * FROM Politics ORDER BY SN DESC";
                        $result=mysqli_query(connection::$conn,$sql);
                        if(mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img alt="Img error"
                                                         src="admin/uploads/<?php echo $row['Media']; ?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="catg_title">
                                                        <form method="post" action="single_news.php">
                                                            <input type="hidden" value="<?php echo $row['Media']; ?>" name="media">
                                                            <input type="hidden" value="Politics" name="category">
                                                            <button class="submit-btn catg_title">
                                                                <?php echo $row['Title']; ?>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                break;
                            }
                        }
                        $sql = "SELECT * FROM Entertainment ORDER BY SN DESC";
                        $result=mysqli_query(connection::$conn,$sql);
                        if(mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img alt="Img error"
                                                         src="admin/uploads/<?php echo $row['Media']; ?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="catg_title">
                                                        <form method="post" action="single_news.php">
                                                            <input type="hidden" value="<?php echo $row['Media']; ?>" name="media">
                                                            <input type="hidden" value="Entertainment" name="category">
                                                            <button class="submit-btn catg_title">
                                                                <?php echo $row['Title']; ?>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                break;
                            }
                        }
                        $sql = "SELECT * FROM Sports ORDER BY SN DESC";
                        $result=mysqli_query(connection::$conn,$sql);
                        if(mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img alt="Img error"
                                                         src="admin/uploads/<?php echo $row['Media']; ?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="catg_title">
                                                        <form method="post" action="single_news.php">
                                                            <input type="hidden" value="<?php echo $row['Media']; ?>" name="media">
                                                            <input type="hidden" value="Sports" name="category">
                                                            <button class="submit-btn catg_title">
                                                                <?php echo $row['Title']; ?>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                break;
                            }
                        }
                        $sql = "SELECT * FROM Others ORDER BY SN DESC";
                        $result=mysqli_query(connection::$conn,$sql);
                        if(mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img alt="Img error"
                                                         src="admin/uploads/<?php echo $row['Media']; ?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="catg_title">
                                                        <form method="post" action="single_news.php">
                                                            <input type="hidden" value="<?php echo $row['Media']; ?>" name="media">
                                                            <input type="hidden" value="Others" name="category">
                                                            <button class="submit-btn catg_title">
                                                                <?php echo $row['Title']; ?>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                break;
                            }
                        }
                        ?>
                    </ul>
                    <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                </div>
            </div>
        </div>
</section>
