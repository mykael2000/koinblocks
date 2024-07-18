<?php
include '../user-area/includes/connection.php';
session_start();
ob_start();

@$username = $_SESSION['username'];
$sql = "SELECT * FROM clients WHERE username = '$username'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($query);

$shopid = $user['id'];
if (!empty($user['kyc'])) {
    header("location:../user-area/dashboard.php");
}

if (isset($_POST['submit'])) {

    // --- 1. Image Validation (for both files) ---
    // ... for fileToUpload ...
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('Identity document is not an image.')</script>";
        $uploadOk = 0;
    }

    // ... for address_document ... (repeat the validation steps)
    $target_dirAdd = "../uploads/";
    $target_fileAdd = $target_dirAdd . basename($_FILES["address_document"]["name"]);
    $uploadOkAdd = 1;
    $imageFileTypeAdd = strtolower(pathinfo($target_fileAdd, PATHINFO_EXTENSION));

    $checkAdd = getimagesize($_FILES["address_document"]["tmp_name"]);
    if ($checkAdd !== false) {
        $uploadOkAdd = 1;
    } else {
        echo "<script>alert('Address document is not an image.')</script>";
        $uploadOkAdd = 0;
    }

    // --- 2. File Type Restriction (for both files) --- 
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed for identity document.')</script>";
        $uploadOk = 0;
    }

    if (!in_array($imageFileTypeAdd, $allowedTypes)) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed for address document.')</script>";
        $uploadOkAdd = 0;
    }

    // --- 3. Security Enhancements ---
    // a. Generate unique filenames (for both files)
    $kyc = uniqid() . "." . $imageFileType;
    $target_file = $target_dir . $kyc;

    $address_doc = uniqid() . "." . $imageFileTypeAdd;
    $target_fileAdd = $target_dirAdd . $address_doc;

    // b. Sanitize inputs to prevent SQL injection
    $shopid = mysqli_real_escape_string($con, $shopid);
    $identity_doc = mysqli_real_escape_string($con, $_POST["identity_type"]);
    $address_doc_type = mysqli_real_escape_string($con, $_POST["address_doc_type"]);


    // --- 4. Update Database and Move Files (if both uploads are successful) ---
    if ($uploadOk == 1 && $uploadOkAdd == 1) {
        $kycsql = "UPDATE clients SET kyc = '$kyc', address_doc = '$address_doc', identity = '$identity_doc', address_doc_type = '$address_doc_type' WHERE id = '$shopid'";

        if (mysqli_query($con, $kycsql)) { 
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            move_uploaded_file($_FILES["address_document"]["tmp_name"], $target_fileAdd);
            header("location:../user-area/dashboard.php");
        } else {
            echo "<script>alert('Error updating database.')</script>";
        }
    } else {
        echo "<script>alert('Sorry, your files were not uploaded.')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="With Koinblocks your money works for you!">
    <meta name="keywords"
        content="Koinblocks, koinblocks.com, ethereum invesment, bitcoin investment, stock investment, Koinblocks">
    <link href="../storage/logos/N6PlpwsHVj4wa0MfeGD1iOzwj9fxwGzOjdHd9LhW.png" rel="icon">
    <title>Koinblocks Investment | Verify KYC</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login" style="background:#151c2b;">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">KYC Verification</h1>
                                        <p class="text-info text-center">Please verify your account by pressing proceed
                                            below. You can skip this page and return back later when you want to
                                            complete the form</p>
                                    </div>
                                    <!-- Session Status -->

                                    <!-- Validation Errors -->
                                    <form class="user" method="POST" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="_token"
                                            value="UUgTSLdlNWrlZr2zoQsfdXtqdTdSMRaHMC805dUI">
                                        <div class="form-group border-bottom">
                                            <h4>Identification Document</h4>
                                        </div>

                                        <div class="form-group">
                                            <label>Please select the identification document that you want to
                                                upload</label>
                                            <select class="form-control" id="exampleInputFirstName" name="identity_type"
                                                required>
                                                <option value="">-- Select --</option>
                                                <option>National ID</option>
                                                <option>International Passport</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Please upload a file with clear images of your ID/passport</label>
                                            <input type="file" class="form-control" id="exampleInputLastName"
                                                name="fileToUpload" required>
                                        </div>

                                        <div class="form-group border-bottom">
                                            <h4>Address Document</h4>
                                        </div>

                                        <div class="form-group">
                                            <label>Please select a valid address document for our KYC review
                                                process</label>
                                            <select class="form-control" id="exampleInputFirstName"
                                                name="address_doc_type" required>
                                                <option value="">-- Select --</option>
                                                <option>Utility Bill</option>
                                                <option>Bank Reference</option>
                                                <option>Proof of residence</option>
                                                <option>Driver or residence permit</option>
                                                <option>Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Please upload a file with clear images of your ID/passport</label>
                                            <input type="file" class="form-control" id="exampleInputLastName"
                                                name="address_document" required>
                                        </div>


                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn text-white btn-block"
                                                style="background:#151c2b;">Submit</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Skip to <a class="font-weight-bold small" href="../user-area/dashboard.php"
                                            style="color:#151c2b;">dashboard</a>
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
</body>

</html>