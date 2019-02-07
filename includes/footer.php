<script type="text/javascript">
    function confirmation(x){
        if(x==1){
            var category = document.getElementById("category").value;

            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value)==true)
            {
                return confirm(category+"मा सदस्यता पुष्टि गर्नुहोस्  ? ");
            }
            else {
                alert("तपाईले अमान्य ईमेल ठेगाना प्रविष्टि गर्नुभएको छ!");
                myForm.email.focus();
                return false;
            }
        }
        else{
            var category = document.getElementById("categoryy").value;
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(unsub.unemail.value)==true)
            {
                return confirm(category+"मा सदस्यता रद्द गर्नुहोस् ? ");
            }
            else {
                alert("तपाईले अमान्य ईमेल ठेगाना प्रविष्टि गर्नुभएको छ!");
                myForm.email.focus();
                return false;
            }
        }
    }
</script>
<footer id="footer">
    <div class="footer_top">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInLeftBig">
                    <h2>तपाईंको मनपर्ने श्रेणीमा सदस्यता लिनुहोस्।</h2>
                    <form method="post" name="myForm" onsubmit="return confirmation(1)" action="process/subscribe.php">
                        <div class="form-group">
                            <label>इमेल :&nbsp;</label>
                            <input type="email" name="email" class="form-control" placeholder="तपाईंको वैध ईमेल" required>
                        </div>
                        <div class="form-group">
                            <label>समाचार कोटी :</label>
                            <select class="form-control" name="category" id="category" required>
                                <option>अन्त्रास्त्र्य</option>
                                <option>रास्तृय</option>
                                <option>राज्निती</option>
                                <option>मनोरन्जन</option>
                                <option>खेल्कुद</option>
                                <option>अर्थ</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" name="subscribe" style="border-radius: 5px" type="submit">सदस्यता लिनुहोस्</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInDown">
                    <h2>सदस्यता विवरण।</h2>
                    <p>
                        सब्सक्राइब गर्न केवल बायाँ छेउमा फारम भर्नुहोस्।<br>
                        जाब तपाईंले आफ्नो सही श्रेनी मा सदस्यता लिनु हुन्छ तब एत नयाँ समाचार अप्लोद गर्ने बेला तपाईंले मेल पाउनु हुने छ ।
                    </p>
                    <p>
                        सदस्यता रद्द गर्न दाहिने तिर दिइएको फारम भर्नुहोस्। त्यसपछि अधिसूचना तपाईंको इमेलमा पठाइने छैन।
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInRightBig">
                    <h2>तपाईंको कोटी सदस्यता रद्द गर्नुहोस्।</h2>
                    <form method="post" name="unsub" onsubmit="return confirmation(0);" action="process/remove_subscribe.php">
                        <div class="form-group">
                            <label>इमेल :&nbsp;</label>
                            <input type="email" name="unemail" class="form-control" placeholder="तपाईंको वैध ईमेल" required>
                        </div>
                        <div class="form-group">
                            <label>समाचार कोटी :</label>
                            <select class="form-control" name="categoryy" id="categoryy" required>
                                <option>अन्त्रास्त्र्य</option>
                                <option>रास्तृय</option>
                                <option>राज्निती</option>
                                <option>मनोरन्जन</option>
                                <option>खेल्कुद</option>
                                <option>अर्थ</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" name="unsubscribe" style="border-radius: 5px" type="submit">सदस्यता रद्द गर्नुहोस्</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

