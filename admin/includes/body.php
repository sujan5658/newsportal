<div class="row">
    <ol class="breadcrumb">
        <li>
            <em class="fa fa-home"></em>
        </li>
        <li class="active">व्यवस्थापक</li>
    </ol>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">समाचार अपलोड गर्नुहोस्।</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <?php
                    @session_start();
                    if(isset($_SESSION['upload_news'])){
                        echo $_SESSION['upload_news'];
                        unset($_SESSION['upload_news']);
                    }
                ?>
                <form method="post" action="process/upload_news.php" enctype="multipart/form-data" onsubmit="return confirm('अपलोड गर्ने निश्चित छ ?')">
                    <div class="form-group">
                        <label>कोटि :</label>
                        <select class="form-control" name="category">
                            <option value="Popular">लोकप्रिय</option>
                            <option value="International">अन्त्रास्त्र्य</option>
                            <option value="National">रास्तृय</option>
                            <option value="Politics">राज्नितीक</option>
                            <option value="Sports">खेल्कुद</option>
                            <option value="Entertainment">मनोरन्जन</option>
                            <option value="Others">अर्थ</option>
                        </select>
                    </div>
                    <script type="text/javascript">
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#up-image').attr('src', e.target.result);
                                    var img = document.getElementById("up-image");
                                    img.style.display ='block';
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>

                    <div class="form-group">
                        <label>मिडिया :</label><br>
                        <img src="#" id="up-image" style="display: none" height="250px" width="auto">
                        <input type="file" name="media" class="form-control" onchange="readURL(this);">
                    </div>
                    <div class="form-group">
                        <label>समाचार शीर्षक :</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>पुरा समाचार :</label>
                        <textarea class="form-control" name="body" style="height: 191px"></textarea>
                    </div>
                    <button type="submit" name="upload" class="btn btn-primary">अपलोड गर्नुहोस्। </button>
                </form>
            </div>
            <div class="col-sm-6">
                <form method="post" action="process/upload_news.php" enctype="multipart/form-data" onsubmit="return confirm('अपलोड गर्ने निश्चित छ ?');">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <center>यहाँ बाट ब्रेक्इङ समाचार अपलोड गर्नुहोस्।</center>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>पुरा समाचार :</label>
                            <input type="hidden" name="category" value="Breaking">
                            <textarea class="form-control" name="body" style="height: 191px"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">अपलोड गर्नुहोस्।</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>