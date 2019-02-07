<script>
    function validate_email(){
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(contact_form.email.value)==true)
            {
                return confirm("Confirm Sending Message ? ");
            }
            else {
                alert("You have entered an invalid email address!");
                myForm.email.focus();
                return false;
            }
        }
</script>
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <p style="text-align: justify">
                    यदि तपाईं आफ्नो घटना वा लेख पोस्ट गर्न चाहनुहुन्छ भने कृपया दिएका जानकारी मार्फत हामीलाई सम्पर्क गर्नुहोस्। दिइएको फारम मार्फत तपाईंको घटना वा लेख स्पष्ट गर्नुहोस्। यदि तपाईंलाई दिइएको फारमको बारेमा समस्या छ भने तल दिइएको फोन नम्बर मार्फत हामीलाई सम्पर्क गर्नुहोस्।
                <hr>
                यदि घटना शांत महत्वपूर्ण छ भने हामी इन्तर्भ्यू लिन सक्छौं। यदि घटना नक्कली छ भने तपाई जिम्मेवार हुनुहुनेछ।
                </p>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <p style="text-align: justify">
                    साइटमा सम्बन्धित श्रेणीमा रहेको समाचार समावेश छ। र यदि तपाईं अफिसलाई सम्पर्क गर्न चाहानुहुन्छ भने तल दिइएको सम्पर्कहरू प्रयोग गर्नुहोस्। हजुर को दिन राम्रो होस्।
                </p>
                <address>
                    सम्पूर्ण खबर , गोल्मधी  <br> फोन: ०१६६१०५९०  <br> मोबाईल : ९८४९६७५६५८  <br> फ्याक्स: १२३-५४६-५६७
                </address>
            </div>
            <div class="left_content">
                    <form method="post" action="process/contact.php" name="contact_form" class="contact_form" enctype="multipart/form-data" onsubmit="return validate_email();">
                        <input class="form-control" name="name" type="text" placeholder="तपाईंको नाम" required>
                        <input class="form-control" name="email" type="email" placeholder="तपाईंको इमेल" required>
                        <textarea class="form-control" name="message" cols="30" rows="10" placeholder="तपाईंको सन्देश" required></textarea>
                        <input type="submit"  name="submit-contact" value="सन्देश पठाउनुहोस्">
                    </form>
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




