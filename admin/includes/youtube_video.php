<div class="row">
    <ol class="breadcrumb">
        <li>
            <em class="fa fa-video-camera"></em>
        </li>
        <li class="active">यूट्यूब भिडियो</li>
    </ol>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        यूट्यूब भिडियोको लिङ्क अपलोड गर्नुहोस्।
        <?php
            @session_start();
            if(isset($_SESSION['video'])){
                echo "&emsp;".$_SESSION['video'];
                unset($_SESSION['video']);
            }
        ?>
    </div>
    <div class="panel-body">
        <form method="post" action="process/youtube_video.php" onsubmit="return confirm('लिङ्क अपलोड गर्नु निश्चित छ?');">
            <div class="form-group">
                <input type="text" required class="form-control" name="link" placeholder="यहाँ यूट्यूब भिडियोको साझेदारी-स्रोत-लिङ्क राख्नुहोस्">
                <br>
                <button type="submit" name="video" class="btn btn-primary">अपलोड गर्नुहोस्।</button>
            </div>
        </form>
    </div>
</div>
<form method="post" action="process/delete_youtube_video.php" onsubmit="return confirm('मेटाउने निश्चित गर्नुहोस्?');">
<div class="panel panel-primary">
    <div class="panel-heading">
        केहि लिङ्क गरिएका भिडियोहरू।
        <?php
        if(isset($_SESSION['delete_video'])){
            echo "&emsp;".$_SESSION['delete_video'];
            unset($_SESSION['delete_video']);
        }
        ?>
        <button style="float: right;" type="submit" name="del" class="btn btn-danger">चयन गरिएका भिडियोहरू मेट्नुहोस्। &emsp;<span class="fa fa-trash"></span></button>
    </div>
    <div class="panel-body">
        <hr>
            <?php
                require_once ("class/connection.php");
                $con=new connection();
                $con->db_connect();
                $sql = "SELECT * FROM Youtube_video ORDER BY SN DESC";
                $result = mysqli_query(connection::$conn,$sql);
                $i=0;
                if(mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if($i%3==0)echo "<hr>";
                        ?>
                        <iframe width="30%" height="250" src="<?php echo $row['Link']?>" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        <input type="checkbox" value="<?php echo $row['Link']?>" name="y-video[]">
                        &emsp;
                        <?php
                        $i++;
                    }
                }
            ?>
    </div>
</div>
</form>