<?php
include '../user-area/includes/connection.php';
session_start();
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM clients WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $first_name = $row['first_name'];
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
            $mail->setFrom('support@koinblocks.com', 'Support');
            $mail->addAddress($email); //Add a recipient               //Name is optional

            $mail->addCC('support@koinblocks.com');

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Reset Password';
            $mail->Body = '<html><head></head></head>
        <body style="background-color: #474d80; padding: 45px;">
            <div>
                <img style="position:relative; left:35%;" src="https://koinblocks.com/img/logo.png">
                <h3 style="color: black;">Mail From support@koinblocks.com - Reset Password</h3>
            </div>
            <div style="color: #ffff;"><hr/>
                <h3>Dear ' . $first_name . '</h3>
                <p>You just requested for a reset password link, if you do not recognize this reset attempt then kindly ignore.</p>
                <h5>Kindly click the button below to reset your password</h5>
                <p></p
                <a style="background-color:#060c39;color:#ffff; padding:15px; text-decoration:none;border-radius: 10px;font-size: 20px;" href="https://koinblocks.com/dash/auth/reset-password.php?email=' . $email . '" class="btn btn primary">Reset password</a>

                <h5>Note : the details in this email should not be disclosed to anyone</h5>

            </div><hr/>
                <div style="background-color: white; color: black;">
                    <h3 style="color: black;">support@koinblocks.com<sup>TM</sup> - Phone : +13524965199</h3>
                </div>

        </body></html>

        ';

            $mail->send();
            echo 'Email has been sent to ' . $email;
            echo "<script>alert('please check your email')</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } else {
        echo "<script>alert('Email not registered with us')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $website->description }}">
    <meta name="keywords" content="{{ $website->keywords }}">
    <link href="{{ asset('storage/'.str_replace('public/', '', $company->favicon))}}" rel="icon">
    <title>Koinblocks | Forgot</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login" style="background-color:#151c2b;">
    <!-- Login Content -->
    <div class="container-login" id="home">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Request password reset link</h1>
                                        <p>If your account is registered with us you'll receive a reset link</p>
                                    </div>


                                    <form class="user" method="POST" action="">

                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                name="email" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn text-white btn-block"
                                                style="background-color:#151c2b;">Request Link</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="d-flex content-justify">
                                        <div class="text-left w-75">
                                            Don't have an account? <a class="font-weight-bold small" href="register.php"
                                                style="color:#151c2b;">Create an Account!</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        Return to <a class="font-weight-bold small" href="../../index.php"
                                            style="color:#151c2b;">Home</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <?php include '../../includes/livechat.php';?>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/ruang-admin.min.js"></script>
    <!-- particles -->
    <script src="../asset/js/particles.min.js"></script>
    <script src="../asset/js/app.js"></script>
    <!-- scripts js -->
    <script src="../asset/js/scripts.js"></script>
</body>

</html>