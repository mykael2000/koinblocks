<?php

include('../user-area/includes/connection.php');
session_start();

$userid = $_GET['id'];
$sqlUser = "SELECT * FROM clients WHERE id = '$userid'";
$queryUser = mysqli_query($con, $sqlUser);
$getdetails = mysqli_fetch_assoc($queryUser);


if(isset($_POST['delete'])){
    $sql = "DELETE FROM clients WHERE id = '$userid'";
    $delquery = mysqli_query($con, $sql);
    echo "<script>alert('User deleted')</script>";
    header("refresh:1;url=index.php");
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
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


<form action="" method="post" style="padding:15px;">
  <div class="form-row">
    <div class="form-group col-md-6">
        <?php if($sql){echo "<h6>redirecting now......</h6>";} ?>
      <h4>Are you sure you want to delete user <?php echo $getdetails['email']; ?>?????</h4>
    </div>
    
  <a href="index.php" style="margin: 10px;" type="submit" class="btn btn-primary">Go back</a>
  <br><br>
  <button style="margin: 10px;" type="submit" name="delete" class="btn btn-primary">Delete user</button>
</form>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>








</body>


<!-- Mirrored from intez-html.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Feb 2022 10:59:47 GMT -->
</html>