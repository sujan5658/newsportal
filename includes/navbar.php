<header id="header">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header_bottom" style="border-top: 15px solid black;">
                <div class="logo_area" style="padding-top: 2px;"><a href="index.php" class="logo headtitle"><img src="images/sampurna.png" alt="Sampurna Khabar" title="Sampurna Khabar" /></a></div>
                <div class="header_top_right" style="font-family: 'Comic Sans MS';float: right; padding-top: 30px">
                    <?php
                        @session_start();
                        if(isset($_SESSION['subscribe'])){
                            echo "<script>alert('".$_SESSION['subscribe']."');</script>";
                            unset($_SESSION['subscribe']);
                        }
                        else if(isset($_SESSION['contact'])){
                            echo "<script>alert('".$_SESSION['contact']."');</script>";
                            unset($_SESSION['contact']);
                        }
                        else{
                            echo date("l-M-Y");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>
<br>
<section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav main_nav">
                <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                <li <?php if(isset($_GET['page']) && base64_decode($_GET['page'])=='international'){echo 'class="active"';}?>><a href="index.php?page=<?php echo base64_encode('international')?>"><b>अन्त्रास्त्र्य&emsp;</b></a></li>
                <li <?php if(isset($_GET['page']) && base64_decode($_GET['page'])=='national'){echo 'class="active"';}?>><a href="index.php?page=<?php echo base64_encode('national')?>"><b>रास्तृय&emsp;</b></a></li>
                <li <?php if(isset($_GET['page']) && base64_decode($_GET['page'])=='politics'){echo 'class="active"';}?>><a href="index.php?page=<?php echo base64_encode('politics')?>"><b>राज्नितीक &emsp;</b></a></li>
                <li <?php if(isset($_GET['page']) && base64_decode($_GET['page'])=='entertainment'){echo 'class="active"';}?>><a href="index.php?page=<?php echo base64_encode('entertainment')?>"><b>मनोरन्जन&emsp;</b></a></li>
                <li <?php if(isset($_GET['page']) && base64_decode($_GET['page'])=='sports'){echo 'class="active"';}?>><a href="index.php?page=<?php echo base64_encode('sports')?>"><b>खेल्कुद&emsp;</b></a></li>
                <li <?php if(isset($_GET['page']) && base64_decode($_GET['page'])=='others'){echo 'class="active"';}?>><a href="index.php?page=<?php echo base64_encode('others')?>"><b>अर्थ&emsp;</b></a></li>
                <li <?php if(isset($_GET['page']) && base64_decode($_GET['page'])=='photography'){echo 'class="active"';}?>><a href="index.php?page=<?php echo base64_encode('photography')?>"><b>फोटोग्राफी&emsp;</b></a></li>
                <li <?php if(isset($_GET['page']) && base64_decode($_GET['page'])=='videos'){echo 'class="active"';}?>><a href="index.php?page=<?php echo base64_encode('videos')?>"><b>भिडियो&emsp;</b></a></li>
                <li <?php if(isset($_GET['page']) && base64_decode($_GET['page'])=='contact'){echo 'class="active"';}?>><a href="index.php?page=<?php echo base64_encode('contact')?>"><b>सम्पर्क&emsp;</b></a></li>
            </ul>
        </div>
    </nav>
</section>
<section id="newsSection">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="latest_newsarea" style="color: white;height: 30px;"> <span><b>ब्रेकिङ न्युज</b></span>
                <marquee onmouseover="stop()" onmouseout="start()" style="color: white;padding-top: 5px; font-family: 'Comic Sans MS'">
                    <?php
                    require_once ("admin/class/connection.php");
                    $con = new connection();
                    $con->db_connect();
                    $sql = "SELECT * FROM Breaking ORDER BY SN DESC";
                    $result = mysqli_query(connection::$conn,$sql);
                    if(mysqli_num_rows($result)>0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $date = $row['Breaking_date'];
                            if($date<date('Y-m-d')){
                                $sql = "DELETE FROM Breaking WHERE Breaking_date='$date'";
                                mysqli_query(connection::$conn,$sql);
                            }
                            echo $row['Body']."&emsp;&emsp;";
                        }
                    }
                    ?>
                </marquee>
                <div class="social_area">
                    <ul class="social_nav">
                        <li class="facebook"><a href="#"></a></li>
                        <li class="twitter"><a href="#"></a></li>
                        <li class="youtube"><a href="#"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>