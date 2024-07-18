<?php


include('../user-area/includes/connection.php');
$cuserid = $_GET['userid'];
$userid = $_GET['id'];
$sql = "DELETE FROM deposits WHERE id = '$userid'";
$query = mysqli_query($con, $sql);

header("location:deposit.php?id=$cuserid");

?>