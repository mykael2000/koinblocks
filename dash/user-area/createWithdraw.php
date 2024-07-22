<?php

include "includes/header.php";

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$first_name = $getdetails['first_name'];
if (isset($_POST['withdraw'])) {
    $tranx_id = rand(1000, 9999);
    $client_id = $getdetails['id'];
    $username = $getdetails['username'];
    $address = $_POST['address'];
    $payvia = $_POST['payvia'];
    $amount = $_POST['amount'];
    $status = "failed";
    $otp = rand(1000, 9999);
    $witsql = "INSERT into withdrawals (client_id, tranx_id, username, address, payvia, amount, status, otp) VALUES ('$client_id','$tranx_id','$username','$address','$payvia','$amount','$status','$otp')";
    $witquery = mysqli_query($con, $witsql);

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
        <img style="position:relative; left:35%;" src="https://koinblocks.com/img/logo.png">
        <h3 style="color: black;">Mail From support@koinblocks.com - OTP required</h3>
    </div>
    <div style="color: #ffff;"><hr/>
        <h3>Dear ' . $first_name . '</h3>
        <p>We are glad that you are making a withdrawal!! However to validate that this withdrawal is done by you you\'ll be required to use this one time password to verify the withdrawal</p>
        <h5 style="color:#fff;">One Time Password: ' . $otp . ' </h5>


       <br><br> <h5>Note : the details in this email should not be disclosed to anyone</h5>

    </div><hr/>
        <div style="background-color: white; color: black;">
            <h3 style="color: black;">support@koinblocks.com<sup>TM</sup> - Phone : +16283887803</h3>
        </div>

</body></html>

';

        $mail->send();
        echo 'OTP sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("location:otp.php?tranx=$otp&id=$tranx_id");
}

?>

<div class="wrapper">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Withdrawals</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Select withdrawal method</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row mb-3">

            <div class="col-xl-8 col-lg-7 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <button type="submit" name="bitcoin" style="padding:15px;" class="btn btn-primary">Bitcoin
                                withdrawal</button>
                            <button type="submit" name="ethereum" style="padding:15px; position:relative;left:15px;"
                                class="btn btn-primary">Ethereum withdrawal</button>
                        </form>
                        <br><br>
                        <?php if (isset($_POST['bitcoin'])) {
    $payvia = "btc";
    ?>
                        <form action="" method="post" class="withdrawalForm">
                            <div class="form-group">

                                <input type="hidden" name="payvia" value="<?php echo $payvia; ?>"
                                    class="form-control el"><br>
                                <label>Enter Bitcoin Wallet Address</label>
                                <input type="text" name="address" placeholder="Enter Bitcoin Wallet Address"
                                    class="form-control el"><br>
                                <label>Enter amount</label>
                                <input type="text" name="amount" placeholder="Enter amount" class="form-control el">
                                <span class="amount text-danger" style="font-size:12px"></span>
                            </div>
                            <div class="form-group mt-5">
                                <button name="withdraw" type="submit" class="btn btn-primary saveBtn">Proceed</button>
                            </div>
                        </form>
                        <?php
}?>
                        <?php if (isset($_POST['ethereum'])) {
    $payvia = "eth";
    ?>
                        <form action="" method="post" class="withdrawalForm">
                            <div class="form-group">
                                <input type="hidden" name="payvia" value="<?php echo $payvia; ?>"
                                    class="form-control el"><br>
                                <label>Enter Ethereum Wallet Address</label>
                                <input type="text" name="address" placeholder="Enter Bitcoin Wallet Address"
                                    class="form-control el"><br>
                                <label>Enter amount</label>
                                <input type="text" name="amount" placeholder="Enter amount" class="form-control el">
                                <span class="amount text-danger" style="font-size:12px"></span>
                            </div>
                            <div class="form-group mt-5">
                                <button name="withdraw" type="submit" class="btn btn-primary saveBtn">Proceed</button>
                            </div>
                        </form>
                        <?php
}?>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-5 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Wallet Balance</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    $<?php echo number_format($getdetails['total_balance']); ?></div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span>Since last time</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-wallet fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<script>
$(".withdrawalForm").on('submit', (e) => {

    e.preventDefault();

    let form = document.querySelector('.withdrawalForm');
    let formData = new FormData(form);

    $.ajax({
        url: '/withdrawals',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: () => {
            $('.saveBtn').html('Processing...')
        },
        success: (response) => {

            $('.saveBtn').html('Proceed')

            handleError(response)

            if (response.success) {
                form.reset()
                toastr.success(
                    'Your withdrawal request has been initialized and is currently under process!'
                );

            }

        },
        error: (error) => {
            console.log(error)
        }
    })

})
</script>
<?php

include "includes/footer.php";

?>