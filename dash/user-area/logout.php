<?php

include("includes/connection.php");
session_start();
ob_start();
if(!isset($_SESSION['username'])){
   header('location: ../login.php');
   
};
$email = $_SESSION['email'];
$sql = "SELECT * FROM clients WHERE username = '$client_id'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($query);




session_destroy();
header("location: ../auth/login.php");


?>