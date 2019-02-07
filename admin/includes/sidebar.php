<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="image/logo.jpg" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">व्यवस्थापक</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> ड्याशबोर्ड</a></li>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-newspaper-o">&nbsp;</em> समाचार <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a href="index.php?page=<?php echo base64_encode('popular');?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> लोकप्रिय
                    </a></li>
                <li><a href="index.php?page=<?php echo base64_encode('international');?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> अन्त्रास्त्र्य
                    </a></li>
                <li><a href="index.php?page=<?php echo base64_encode('national');?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> रास्तृय
                    </a></li>
                <li><a href="index.php?page=<?php echo base64_encode('politics');?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> राज्नितीक
                    </a></li>
                <li><a href="index.php?page=<?php echo base64_encode('entertainment');?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> मनोरन्जन
                    </a></li>
                <li><a href="index.php?page=<?php echo base64_encode('sports');?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> खेल्कुद
                    </a></li>
                <li><a href="index.php?page=<?php echo base64_encode('others');?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> अर्थ
                    </a></li>
            </ul>
        </li>
        <li><a href="index.php?page=<?php echo base64_encode('photography')?>"><em class="fa fa-photo">&nbsp;</em> फोटोग्राफी</a></li>
        <li><a href="index.php?page=<?php echo base64_encode('subscribers')?>"><em class="fa fa-user">&nbsp;</em> सदस्यहरू</a></li>
        <li><a href="index.php?page=<?php echo base64_encode('user-message')?>"><em class="fa fa-envelope">&nbsp;</em> प्रयोगकर्ताको सन्देश</a></li>
        <li><a href="index.php?page=<?php echo base64_encode('youtube_video')?>"><em class="fa fa-video-camera">&nbsp;</em> युत्युब भिडियो</a></li>
        <li><a href="index.php?page=<?php echo base64_encode('credentials')?>"><em class="fa fa-user-circle">&nbsp;</em> प्रमाण परिवर्तन गर्नुहोस्</a></li>
        <li><a href="process/logout.php" onclick="return confirm('लगआउट पुष्टि गर्नुहोस्?');"><em class="fa fa-power-off">&nbsp;</em> बाहिर निस्कनु</a></li>
    </ul>
</div><!--/.sidebar-->