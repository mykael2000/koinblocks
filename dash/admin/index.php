<?php

include('../user-area/includes/connection.php');
session_start();
if(!isset($_SESSION['email'])){
    header('location:auth/login.php');
}
$sql = "SELECT * FROM clients";
$query = mysqli_query($con, $sql);

$sqlDe = "SELECT * FROM deposits";
$queryDe = mysqli_query($con, $sqlDe);

$sqlWi = "SELECT * FROM withdrawals";
$queryWi = mysqli_query($con, $sqlWi);

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
                   <div class="brand-logo"><a class="mini-logo" href="index-2.html"><img src="images/logoi.png" alt="" width="40"></a></div>
                   <div class="search">
                      <a href="user.php" class="btn btn-primary pl-5 pm-5">View all user details</a>
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
                         <a class="dropdown-item" href="#"><span><i class="ri-user-line"></i></span>Profile</a>
                         <a class="dropdown-item" href="#"><span><i class="ri-wallet-line"></i></span>Balance</a>
                         <a class="dropdown-item" href="#"><span><i class="ri-settings-3-line"></i></span>Settings</a>
                         <a class="dropdown-item" href="#"><span><i class="ri-time-line"></i></span>Activity</a>
                         <a class="dropdown-item" href="#"><span><i class="ri-lock-line"></i></span>Lock</a>
                         <a class="dropdown-item logout" href="#"><i class="ri-logout-circle-line"></i>Logout</a>
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
            <li><a href="#">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">Wallet</span>
                </a>
            </li>
           
            <li class="auth/login.php"><a href="#">
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
                        <div class="breadcrumbs"><a href="#">Home </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Dashboard</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Stats</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="stat-widget d-flex align-items-center">
                                        <div class="widget-icon me-3 bg-primary"><span><i
                                                    class="ri-wallet-line"></i></span></div>
                                        <div class="widget-content">
                                           <?php 
                                             $getsum = "SELECT SUM(total_deposits) AS total from clients";
                                             $queryy = mysqli_query($con, $getsum);
                                             $summer = mysqli_fetch_array($queryy);  
                                          ?>
                                            <h3>$<?php echo $summer['total']; ?></h3>
                                            <p>Total Deposits</p>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Users</h4>
                     </div>
                     <div class="card-body">
                        <div class="payments-content">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>
                                          <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                       </th>
                                       <th>Name</th>
                                       <th>Email</th>
                                      
                                       <th>Account Status</th>
                                       <th>Edit</th>
                                      <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <?php   while($getdetails = mysqli_fetch_assoc($query)){?>
                                 <tbody>
                                    <tr>
                                       <td>
                                          <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                       </td>
                                       <td><?php echo $getdetails['first_name'].' '; echo $getdetails['last_name'];  ?></td>
                                       <td><?php echo $getdetails['email'];  ?></td>
                                       
                                       <td><span class="badge px-3 py-2 bg-success">Active</span></td>
                                       <td><a href="edit.php?id=<?php echo $getdetails['id'];?>" style="color:red;">Edit</a></td>
                                       <td><a href="userdelete.php?id=<?php echo $getdetails['id'];?>" style="color:red;">Delete</a></td>
                                    </tr>
                                    
                                 </tbody>
                                 <?php } ?>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Deposits</h4>
                     </div>
                     <div class="card-body">
                        <div class="payments-content">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>
                                          <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                       </th>
                                       <th>Username</th>
                                       <th>Tranx ID</th>
                                       <th>Amount</th>
                                       
                                       <th>Status</th>
                                       <th>Edit</th>
                                       <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <?php   while($getdetailsDe = mysqli_fetch_assoc($queryDe)){?>
                                 <tbody>
                                    <tr>
                                       <td>
                                          <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                       </td>
                                       <td><?php echo $getdetailsDe['username'];  ?></td>
                                       <td>#<?php echo $getdetailsDe['tranx_id'];  ?></td>
                                       <td><?php echo $getdetailsDe['amount'];  ?></td>
                                       <td><?php echo $getdetailsDe['status']; ?></td>
                                       <td><a href="depositedit.php?id=<?php echo $getdetailsDe['id'];?>" style="color:red;">Edit</a></td>
                                       <td><a href="depodelete.php?id=<?php echo $getdetailsDe['id'];?>" style="color:red;">Delete</a></td>
                                    </tr>
                                    
                                 </tbody>
                                 <?php } ?>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Withdrawal</h4>
                     </div>
                     <div class="card-body">
                        <div class="payments-content">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>
                                          <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                       </th>
                                       <th>Username</th>
                                       <th>Tranx ID</th>
                                       <th>Amount</th>
                                       
                                       <th>Status</th>
                                       <th>Edit</th>
                                      <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <?php   while($getdetailsWi = mysqli_fetch_assoc($queryWi)){?>
                                 <tbody>
                                    <tr>
                                       <td>
                                          <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                       </td>
                                       <td><?php echo $getdetailsWi['username'];  ?></td>
                                       <td>#<?php echo $getdetailsWi['tranx_id'];  ?></td>
                                       <td><?php echo $getdetailsWi['amount'];  ?></td>
                                       <td><?php echo $getdetailsWi['status']; ?></td>
                                       <td><a href="withdrawalEdit.php?id=<?php echo $getdetailsWi['id'];?>&userid=<?php echo $getdetailsWi['client_id']; ?>" style="color:red;">Edit</a></td>
                                       <td><a href="withdelete.php?id=<?php echo $getdetailsWi['id']; ?>" style="color:red;">Delete</a></td>
                                    </tr>
                                    
                                 </tbody>
                                 <?php } ?>
                              </table>
                           </div>
                        </div>
                     </div>
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