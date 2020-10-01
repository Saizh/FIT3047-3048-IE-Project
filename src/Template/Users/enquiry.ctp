<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<head>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    CONTACT US
                </h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-7">
                    We are eager to discuss your needs, and answer any questions you may have
                    <p>Enter your details and we'll get back to your shortly!</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <div data-form-alert="" hidden="">Thanks for filling out the form!</div>
    <div class="wrong-message"><?= $this->Flash->render() ?></div>
                   <?php
                       // Checks if form has been submitted
                       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                           function post_captcha($user_response) {
                               $fields_string = '';
                               $fields = array(
                                   'secret' => '6LccwX0UAAAAACubm0I2CaPdzyC-3_2Il5CAwmWc',
                                   'response' => $user_response
                               );
                               foreach($fields as $key=>$value)
                               $fields_string .= $key . '=' . $value . '&';
                               $fields_string = rtrim($fields_string, '&');

                               $ch = curl_init();
                               curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
                               curl_setopt($ch, CURLOPT_POST, count($fields));
                               curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                               curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

                               $result = curl_exec($ch);
                               curl_close($ch);

                               return json_decode($result, true);
                           }

                           // Call the function post_captcha
                           $res = post_captcha($_POST['g-recaptcha-response']);

                           if (!$res['success']) {
                               // What happens when the CAPTCHA wasn't checked
                               echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
                           } else {
                               // If CAPTCHA is successfully completed...

                               // Paste mail function or whatever else you want to happen here!
                               echo '<br><p>CAPTCHA was completed successfully!</p><br>';
                           }
                       } else { ?>

                       <!-- FORM GOES HERE -->
                     <?= $this->Form->create($enquiry) ?>


                                                     <div class="form-group">
                                                         <label class="form-control-label mbr-fonts-style display-7" for="name-form1-0">Name</label>
                                                         <input type="text" class="form-control" placeholder ="Your Full Name" name="name" id="name" required>
                                                     </div>


                                                     <div class="form-group">
                                                         <label class="form-control-label mbr-fonts-style display-7" for="email">Email</label>
                                                         <input type="text" class="form-control" placeholder ="Your School Email Address" name="email" id="email" required >
                                                     </div>


                                                     <div class="form-group">
                                                     <label class="form-control-label mbr-fonts-style display-7" for="phone_number">Phone</label>


                                                         <input type="text" class="form-control" placeholder ="Your Phone Number with Country Code" name="phone_number" id="phone_number" required>
                                                     </div>


                                             <div class="form-group" data-for="message">
                                                 <label class="form-control-label mbr-fonts-style display-7" for="message">Message</label>
                                                 <textarea type="text" class="form-control" name="message" id="message" required></textarea>
                                             </div>

                                       <div class="g-recaptcha" data-sitekey="6LccwX0UAAAAAOCu9dgeusFVJxWw5FrA5twhSmt9"></div>

                                             <?= $this->Form->button(__('Send Form'), ['class' => 'login100-form-btn']); ?>

                                         </form>

                       <?php } ?>
                       <script>
                       window.onload = function() {
                           var $recaptcha = document.querySelector('#g-recaptcha-response');

                           if($recaptcha) {
                               $recaptcha.setAttribute("required", "required");
                           }
                       };
                       </script>
                       <style>
                       #g-recaptcha-response {
                           display: block !important;
                           position: absolute;
                           margin: -78px 0 0 0 !important;
                           width: 302px !important;
                           height: 76px !important;
                           z-index: -999999;
                           opacity: 0;
                       }
                       </style>

            </div>
        </div>
    </div>
</section>
</body>
