<section id="contentSection" style="padding-left: 47px">
<?php
require_once ("admin/class/connection.php");
$con=new connection();
$con->db_connect();
$sql = "SELECT * FROM Youtube_video ORDER BY SN DESC";
$result = mysqli_query(connection::$conn,$sql);
$i=0;
if(mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if($i%3==0)echo "<hr>";
        ?>
        <iframe width="31%" height="250" src="<?php echo $row['Link']?>" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        &emsp;
        <?php
        $i++;
    }
}
?>
</section>
