<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="single_post_content">
                <h2><span>फोटोग्राफी</span></h2>
                <ul class="photograph_nav  wow fadeInDown">
                    <?php
                        require_once ("admin/class/connection.php");
                        $con = new connection();
                        $con->db_connect();
                        $sql = "SELECT * FROM Photograph ORDER BY SN DESC";
                        $result = mysqli_query(connection::$conn,$sql);
                        if(mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <li>
                                    <div class="photo_grid">
                                        <figure class="effect-layla">
                                            <a class="fancybox-buttons" data-fancybox-group="button" href="admin/photography/<?php echo $row['Photo']?>"> <img src="admin/photography/<?php echo $row['Photo']?>" alt="Img error"/></a>
                                        </figure>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                    ?>
                </ul>
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