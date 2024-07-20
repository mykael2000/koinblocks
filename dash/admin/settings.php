<?php

include('../user-area/includes/connection.php');
session_start();

$settingsID = 1;

$sqlUser = "SELECT * FROM settings WHERE id = '$settingsID'";
$queryUser = mysqli_query($con, $sqlUser);
$getdetails = mysqli_fetch_assoc($queryUser);



if(isset($_POST['save'])){
    
    $btcaddress = $_POST['btcaddress'];
    $ethaddress = $_POST['ethaddress'];
    $usdtaddress = $_POST['usdtaddress'];
    
        $btcqr = $_FILES["btcqr"]["name"];
        $ethqr = $_FILES["ethqr"]["name"];
        $usdtqr = $_FILES["usdtqr"]["name"];
        
        $btc_tmp = $_FILES["btcqr"]["tmp_name"];
        $eth_tmp = $_FILES["ethqr"]["tmp_name"];
        $usdt_tmp = $_FILES["usdtqr"]["tmp_name"];

        // Specify upload directory
        $upload_dir = "../dash/user-area/address/";

        // Move the uploaded file to the specified directory
        move_uploaded_file($btc_tmp, $upload_dir . $btcqr);
        move_uploaded_file($eth_tmp, $upload_dir . $ethqr);
        move_uploaded_file($usdt_tmp, $upload_dir . $usdtqr);

        $update = "UPDATE settings set btcwallet = '$btcaddress', ethwallet = '$ethaddress', usdtwallet = '$usdtaddress', btcqr = '$btcqr', ethqr = '$ethqr', usdtqr = '$usdtqr' WHERE id = '$settingsID'";
        $updateQuery = mysqli_query($con,$update);

        header("location:settings.php");
        
}
if(isset($_POST['savelivechat'])){
    $livechat = $_POST['livechat'];

    $update = "UPDATE settings set livechat = '$livechat' WHERE id = '$settingsID'";
    $updateQuery = mysqli_query($con,$update);
    header("location:settings.php");
}

?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from intez-html.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Feb 2022 10:59:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dashboard">


<div id="main-wrapper">


    <div class="header">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12">
             <div class="header-content">
                <div class="header-left">
                   <div class="brand-logo"><a class="mini-logo" href="index.php"><img src="images/logoi.png" alt="" width="40"></a></div>
                   <div class="search">
                      <a href="deposit.php?id=<?php echo $userid; ?>" class="btn btn-primary pl-5 pm-5">Check deposit history</a>
                   </div>
                   <div class="search">
                      <a href="withdrawal.php?id=<?php echo $userid; ?>" class="btn btn-primary pl-5 pm-5">Check withdrawal history</a>
                   </div>
                </div>
                <div class="header-right">
                   <div class="dark-light-toggle"><span class="dark"><i class="ri-moon-line"></i></span><span class="light"><i class="ri-sun-line"></i></span></div>
                   <div class="nav-item dropdown notification dropdown">
                      <div data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                         <div class="notify-bell icon-menu"><span><i class="ri-notification-2-line"></i></span></div>
                      </div>
                      <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu notification-list dropdown-menu dropdown-menu-right">
                         <h4>Recent Notification</h4>
                         <div class="lists">
                            <a class="" href="index-2.html#">
                               <div class="d-flex align-items-center">
                                  <span class="me-3 icon success"><i class="ri-check-line"></i></span>
                                  <div>
                                     <p>Account created successfully</p>
                                     <span>2020-11-04 12:00:23</span>
                                  </div>
                               </div>
                            </a>
                            <a class="" href="index-2.html#">
                               <div class="d-flex align-items-center">
                                  <span class="me-3 icon fail"><i class="ri-close-line"></i></span>
                                  <div>
                                     <p>2FA verification failed</p>
                                     <span>2020-11-04 12:00:23</span>
                                  </div>
                               </div>
                            </a>
                            <a class="" href="index-2.html#">
                               <div class="d-flex align-items-center">
                                  <span class="me-3 icon success"><i class="ri-check-line"></i></span>
                                  <div>
                                     <p>Device confirmation completed</p>
                                     <span>2020-11-04 12:00:23</span>
                                  </div>
                               </div>
                            </a>
                            <a class="" href="index-2.html#">
                               <div class="d-flex align-items-center">
                                  <span class="me-3 icon pending"><i class="ri-question-mark"></i></span>
                                  <div>
                                     <p>Phone verification pending</p>
                                     <span>2020-11-04 12:00:23</span>
                                  </div>
                               </div>
                            </a>
                            <a href="notification.html">More<i class="ri-arrow-right-s-line"></i></a>
                         </div>
                      </div>
                   </div>
                   <div class="dropdown profile_log dropdown">
                      <div data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                         <div class="user icon-menu active"><span><i class="ri-user-line"></i></span></div>
                      </div>
                      <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu dropdown-menu-right">
                         <div class="user-email">
                            <div class="user">
                               <span class="thumb"><img src="images/profile/3.png" alt=""></span>
                               <div class="user-info">
                                  <h5>Jannatul Maowa</h5>
                                  <span>Intez.inc@gmail.com</span>
                               </div>
                            </div>
                         </div>
                         <a class="dropdown-item" href="profile.html"><span><i class="ri-user-line"></i></span>Profile</a>
                         <a class="dropdown-item" href="balance.html"><span><i class="ri-wallet-line"></i></span>Balance</a>
                         <a class="dropdown-item" href="settings-profile.html"><span><i class="ri-settings-3-line"></i></span>Settings</a>
                         <a class="dropdown-item" href="settings-activity.html"><span><i class="ri-time-line"></i></span>Activity</a>
                         <a class="dropdown-item" href="lock.html"><span><i class="ri-lock-line"></i></span>Lock</a>
                         <a class="dropdown-item logout" href="signin.html"><i class="ri-logout-circle-line"></i>Logout</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

    <div class="sidebar">
    <div class="brand-logo"><a class="full-logo" href="index-2.html"><img src="images/logoi.png" alt="" width="30"></a></div>
    <div class="menu">
        <ul>
            <li><a href="index.php">
                    <span><i class="ri-home-5-line"></i></span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="index.php">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">Wallet</span>
                </a>
            </li>
            <li><a href="index.php">
                    <span><i class="ri-secure-payment-line"></i></span>
                    <span class="nav-text">Payment</span>
                </a>
            </li>
           
            <li class="auth/login.php"><a href="signin.html">
                    <span><i class="ri-logout-circle-line"></i></span>
                    <span class="nav-text">Signout</span>
                </a>
            </li>
        </ul>
    </div>
</div>

    <div class="content-body">
        <div class="container">
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>Dashboard</h3>
                            <p class="mb-2">Welcome Intez Dashboard</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs"><a href="index.php">Home </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Dashboard</a></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Settings</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action = "" name="myform" class="personal_validate" novalidate="novalidate" enctype="multipart/form-data">
                                        <div class="row g-4">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <label class="form-label">BTC Address</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $getdetails['btcwallet']; ?>"
                                                    name="btcaddress">
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <label class="form-label">BTC QR</label>
                                                <input type="file" class="form-control"
                                                    name="btcqr">
                                                    <img height="100px" width="100px" src="../user-area/address/<?php echo $getdetails['btcqr']; ?>" alt="">
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <label class="form-label">ETH Address</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $getdetails['ethwallet']; ?>"
                                                    name="ethaddress">
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <label class="form-label">ETH QR</label>
                                                <input type="file" class="form-control"
                                                    name="ethqr">
                                                    <img height="100px" width="100px" src="../user-area/address/<?php echo $getdetails['ethqr']; ?>" alt="">
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <label class="form-label">USDT Address</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $getdetails['usdtwallet']; ?>"
                                                    name="usdtaddress">
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <label class="form-label">USDT QR</label>
                                                <input type="file" class="form-control"
                                                    name="usdtqr">
                                                    <img height="100px" width="100px" src="../user-area/address/<?php echo $getdetails['usdtqr']; ?>" alt="">
                                            </div>
                                           
                                            <div class="col-12">
                                                <button name = "save" class="btn btn-primary pl-5 pr-5">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Settings</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action = "" name="myform" class="personal_validate">
                                        <div class="row g-4">
                                            
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <label class="form-label">Livechat</label>
                                                <input type="text" class="form-control" placeholder="" value="<?php echo $getdetails['livechat']; ?>"
                                                    name="livechat">
                                            </div>
                                            
                                            <div class="col-12">
                                                <button name = "savelivechat" class="btn btn-primary pl-5 pr-5">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>



</div>




<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="vendor/chartjs/chartjs.js"></script>



<script src="js/plugins/chartjs-line-init.js"></script>




<script src="js/plugins/chartjs-donut.js"></script>






<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="js/plugins/perfect-scrollbar-init.js"></script>



<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="js/plugins/circle-progress-init.js"></script>







<script src="js/scripts.js"></script>


</body>


<!-- Mirrored from intez-html.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Feb 2022 10:59:47 GMT -->
</html>