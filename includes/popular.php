<h2><span><b>लोकप्रिय</b></span></h2>
<ul class="spost_nav">
    <?php
        require_once ("admin/class/connection.php");
        $con = new connection();
        $con->db_connect();
        $sql = "SELECT Media,Title FROM Popular ORDER BY SN DESC";
        $result = mysqli_query(connection::$conn,$sql);
        $count = 0;
        if(mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if($count>=5)break;
                $count++;
                ?>
                <li>
                    <div class="media wow fadeInDown">
                        <div class="media-left">
                            <img alt="Img Error" src="admin/uploads/<?php echo $row['Media'];?>">
                        </div>
                        <div class="media-body">
                            <form method="post" action="single_news.php">
                                <input type="hidden" value="<?php echo $row['Media'];?>" name="media">
                                <input type="hidden" value="Popular" name="category">
                                <button class="submit-btn catg_title"><?php echo $row['Title'];?></button>
                            </form>
                        </div>
                    </div>
                </li>
                <?php
            }
        }
    ?>
</ul>
<br>
<center><b>केही भिडियो हरु । </b></center>
<?php
require_once ("admin/class/connection.php");
$con=new connection();
$con->db_connect();
$sql = "SELECT * FROM Youtube_video";
$result = mysqli_query(connection::$conn,$sql);
if(mysqli_num_rows($result)>0){
    $video_arr = array();
    $i=0;
    while($row = mysqli_fetch_assoc($result)){
        $video_arr[$i] = $row['Link'];
        $i++;
    }
}
?>
<div role="tabpanel" class="tab-pane" id="video">
    <div class="vide_area">
        <iframe width="100%" height="250" src="<?php $index = array_rand($video_arr); echo $video_arr[$index]; unset($video_arr[$index]);?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="video">
    <div class="vide_area">
        <iframe width="100%" height="250" src="<?php $index = array_rand($video_arr); echo $video_arr[$index]; unset($video_arr[$index]);?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="video">
    <div class="vide_area">
        <iframe width="100%" height="250" src="<?php $index = array_rand($video_arr); echo $video_arr[$index];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
