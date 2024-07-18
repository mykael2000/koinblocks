<?php

include('../user-area/includes/connection.php');
session_start();
ob_start();
if(!isset($_SESSION['email'])){
   header('location: ../login.php');
   
};
$username = $_SESSION['username'];
$sql = "SELECT * FROM clients WHERE username = '$username'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($query);




session_destroy();
header("location: login.php");


?>