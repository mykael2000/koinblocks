<?php
include '../user-area/includes/connection.php';
session_start();
ob_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM clients WHERE email='$email' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];

        echo '<div class="alert alert-success">
                        login authenticated! Redirecting Now....
                </div>';
        if (empty($row['kyc'])) {
            header("location: verify-kyc.php");

        } else {
            header("location: ../user-area/dashboard.php");
        }
    } else {
        echo "<script>alert('whoops! Email or Password is incorrect')</script>";
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

<body class="bg-gradient-login" style="background-image:url('../../peter-hulce-yGvXBNQ54jk-unsplash.jpg');">
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
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>


                                    <form class="user" method="POST" action="">

                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                name="email" autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                    name="remember">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn text-white btn-block"
                                                style="background-color:#151c2b;">Login</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="d-flex content-justify">
                                        <div class="text-left w-75">
                                            Don't have an account? <a class="font-weight-bold small" href="register.php"
                                                style="color:#151c2b;">Create an Account!</a>
                                        </div>
                                        <div class="text-right w-25">
                                            <a class="font-weight-bold small" href="forgot.php"
                                                style="color:#151c2b;">Forgot
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