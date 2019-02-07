<?php
    @session_start();
    if(!isset($_SESSION['confirm_code']))
        header("location:index.php");
    else{
        if(isset($_SESSION['unsubscribe_email'])){
            $page = "remove_subscribe.php";
        }
        else{
            $page="subscribe.php";
        }
    }
?>
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <h5>प्रक्रिया पूरा गर्नको लागि, तपाईंको ईमेलमा पठाईएको कोड प्रविष्ट गर्नुहोस्।</h5>
            <small><i>तपाईंको पुष्टि गर्नको लागी ।</i></small>
            <center>
            <form method="post" action="process/<?php echo $page;?>">
                <div class="form-group">
                    <label>पुष्टिकरण कोड :</label>
                    <input type="text" name="confirm_code" placeholder="Confirmation" required style="width:400px;" class="form-control">
                    <br>
                    <button type="submit" name="subs" class="btn btn-success">निश्चित गर्नुहोस्</button>
                </div>
            </form>
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