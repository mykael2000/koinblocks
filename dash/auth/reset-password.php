<?php
include '../user-area/includes/connection.php';
session_start();
$message = "";
$email = $_GET['email'];
$sql = "SELECT * FROM clients WHERE email='$email'";
$result = mysqli_query($con, $sql);
if (isset($_POST['submit'])) {

    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password == $cpassword) {
        $update = "UPDATE clients set password = '$password' WHERE email = '$email'";
        $upquery = mysqli_query($con, $update);
        $message = "<p class='badge badge-success'>Password has successfully been changed, kindly login <a href='login.php'>here</a></p>";
    } else {
        echo "<script>alert('Passwords do not match')</script>";
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
    <title>Koinblocks | Login</title>
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
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                        <?php echo $message; ?>
                                    </div>


                                    <form class="user" method="POST" action="">

                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                name="email" value="<?php echo $email; ?>" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="cpassword" class="form-control"
                                                id="exampleInputPassword" placeholder="Re-enter Password">
                                        </div>

                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn text-white btn-block"
                                                style="background-color:#151c2b;">Save</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="d-flex content-justify">
                                        <div class="text-left w-75">
                                            Don't have an account? <a class="font-weight-bold small" href="register.php"
                                                style="color:#151c2b;">Create an Account!</a>
                                        </div>
                                        <div class="text-right w-25">
                                            <a class="font-weight-bold small" href="#" style="color:#151c2b;">Forgot
                                                password?</a>
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