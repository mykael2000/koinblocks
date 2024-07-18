<?php

include 'includes/connection.php';
session_start();
ob_start();
if (!isset($_SESSION['username'])) {
    header('location: ../auth/login.php');

}
;
$tranx_id = $_GET['tranx'];
$clientid = $_SESSION['username'];
$sql = "SELECT * FROM clients WHERE username ='$clientid' ";
$query = mysqli_query($con, $sql);
$getdetails = mysqli_fetch_assoc($query);
$shopid = $getdetails['id'];
$curtranx_id = $_GET['id'];
$otp = rand(1000, 9999);

$email = $getdetails['email'];

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if (isset($_POST['resend'])) {
    try {
        //Server settings
        $mail->SMTPDebug = 0; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'mail.koinblocks.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'support@koinblocks.com'; //SMTP username
        $mail->Password = 'Koin125@6st!'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('support@koinblocks.com', 'Support');
        $mail->addAddress($email); //Add a recipient               //Name is optional

        $mail->addCC('support@koinblocks.com');

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Withdrawal OTP';
        $mail->Body = '<html><head></head></head>
<body style="background-color: #474d80; padding: 45px;">
    <div>
        <img style="position:relative; left:35%;" src="https://koinblocks.com/images/logo.png">
        <h3 style="color: black;">Mail From support@koinblocks.com - OTP required</h3>
    </div>
    <div style="color: #ffff;"><hr/>
        <h3>Dear ' . $first_name . '</h3>
        <p>We are glad that you are making a withdrawal!! However to validate that this withdrawal is done by you you\'ll be required to use this one time password to verify the withdrawal</p>
        <h5>One Time Password: </h5>' . $otp . '


       <br><br> <h5>Note : the details in this email should not be disclosed to anyone</h5>

    </div><hr/>
        <div style="background-color: white; color: black;">
            <h3 style="color: black;">support@koinblocks.com<sup>TM</sup> - Phone : +13524965199</h3>
        </div>

</body></html>

';

        $mail->send();
        echo 'OTP has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("refresh:1;url=otp.php?tranx=$otp");
}
if (isset($_POST['withdraw'])) {
    $otpone = $_POST['one'];
    $otptwo = $_POST['two'];
    $otpthree = $_POST['three'];
    $otpfour = $_POST['four'];

    $otpfield = $otpone . $otptwo . $otpthree . $otpfour;

    if ($tranx_id == $otpfield) {
        $status = "pending";
        $newsql = "UPDATE withdrawals set status = '$status' WHERE otp = '$tranx_id'";
        $newquery = mysqli_query($con, $newsql);

        echo "<script>alert('withdrawal has successfully been placed')</script>";
        header("refresh:1;url=dashboard.php");
    } else {
        echo "<script>alert('OTP is incorrect')</script>";
        header("refresh:1;url=withdrawal.php");
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .card {
        width: 350px;
        padding: 10px;
        border-radius: 20px;
        background: #fff;
        border: none;
        height: 350px;
        position: relative;
    }

    .container {
        height: 100vh;
    }

    body {
        background: #eee;
    }

    .mobile-text {
        color: #989696b8;
        font-size: 15px;
    }

    .form-control {
        margin-right: 12px;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #ff8880;
        outline: 0;
        box-shadow: none;
    }

    .cursor {
        cursor: pointer;
    }
    </style>

</head>

<body>
    <div class="d-flex justify-content-center align-items-center container">
        <div class="card py-5 px-3">
            <h5 class="m-0">OTP verification</h5><span class="mobile-text">Enter the code we just sent to your email
                address <b class="text-danger"><?php echo $getdetails['email']; ?></b></span>
            <form action="" method="post">
                <div class="d-flex flex-row mt-5"><input name="one" type="text" class="form-control" autofocus=""><input
                        name="two" type="text" class="form-control"><input name="three" type="text"
                        class="form-control"><input name="four" type="text" class="form-control"></div>
                <button style="position:relative; top:3px;" name="withdraw" type="submit"
                    class="btn btn-primary">Continue withdrawal</button>
                <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span><span
                        class="font-weight-bold text-danger cursor"><button type="submit"
                            name="resend">Resend</button></span></div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>