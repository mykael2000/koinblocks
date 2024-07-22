<?php 
include("includes/header.php"); 


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader

require 'dash/PHPMailer-master/src/PHPMailer.php';
require 'dash/PHPMailer-master/src/Exception.php';
require 'dash/PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['send'])) {
    $firstname = $_POST['name'];
    $email = $_POST['email'];
   
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        //Server settings
        $mail->SMTPDebug = 0; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'mail.koinblocks.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'support@koinblocks.com'; //SMTP username
        $mail->Password = 'floW125@6st'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('support@koinblocks.com', 'Koinblocks');
        $mail->addAddress($email); //Add a recipient               //Name is optional

        $mail->addCC('support@koinblocks.com');

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Message Confirmation';
        $mail->Body = '<html><head></head></head>
        <body style="background-color: #474d80; padding: 45px;">
            <div>
                <img style="position:relative; left:35%;" src="https://koinblocks.com/images/logo.png">
                <h3 style="color: black;">Mail From ' . $email . ' - ' . $subject . '</h3>
            </div>
            <div style="color: #ffff;"><hr/>
                <h5>Name: ' . $firstname . '</h5>
               
                <h5>Email: ' . $email . '</h5>
                <h5>Subject: ' . $subject . '</h5>
                <h5>Message: ' . $message . '</h5>
            </div><hr/>

        </body></html>

        ';

        $mail->send();
        echo '<script>alert("Email has been sent to Koinblocks and a copy has been sent to your email")</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
?>
<!-- inner hero start -->
<section class="inner-hero bg_img" data-background="assets/images/bg/patrycja-chociej-ridmdLS6QbY-unsplash.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page-title">Contact Us</h2>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- inner hero end -->


<!-- contact section start -->
<section class="pt-120 pb-120">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-lg-6 contact-thumb bg_img" data-background="assets/images/bg/patrycja-chociej-ridmdLS6QbY-unsplash.jpg"></div>
                <div class="col-lg-6 contact-form-wrapper">
                    <h2 class="font-weight-bold">Contact.</h2>
                    <h2 class="font-weight-bold">Get in touch.</h2>
                    <span>Leave us a message</span>
                    <form class="contact-form mt-4">
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="contact-name" placeholder="Full Name" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" name="contact-name" placeholder="Email Address"
                                    class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <textarea class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="cmn-btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- contact-wrapper end -->
    </div>
    <div class="container pt-120">
        <div class="row justify-content-center">
            <div class="col-lg-10 mb-50">
                <h2 class="font-weight-bold">Quick</h2>
                <h2 class="font-weight-bold">Support.</h2>
                <span>You can get all information</span>
            </div>
            <div class="col-lg-10">
                <div class="row mb-none-30">
                    <div class="col-md-4 col-sm-6 mb-30">
                        <div class="contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <h5 class="mt-2">Call Us</h5>
                            <div class="mt-4">
                                <p><a href="tel:+16283887803">+16283887803</a></p>

                            </div>
                        </div><!-- contact-item end -->
                    </div>
                    <div class="col-md-4 col-sm-6 mb-30">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <h5 class="mt-2">Mail Us</h5>
                            <div class="mt-4">
                                <p><a href="mailto:support@koinblocks.com"><span class="__cf_email__"
                                            data-cfemail="86e2e3ebe9c6f5f3f6f6e9f4f2a8e5e9eb">support@koinblocks.com</span></a>
                                </p>
                            </div>
                        </div><!-- contact-item end -->
                    </div>
                    <div class="col-md-4 col-sm-6 mb-30">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <h5 class="mt-2">Visit Us</h5>
                            <div class="mt-4">
                                <p>80 Fremont St, San Francisco CA 94104, USA</p>
                            </div>
                        </div><!-- contact-item end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact section end -->
<?php
include("includes/livechat.php");
include("includes/footer.php"); ?>