<?php


include('../user-area/includes/connection.php');
$cuserid = $_GET['userid'];
$userid = $_GET['id'];
$sql = "DELETE FROM withdrawals WHERE id = '$userid'";
$query = mysqli_query($con, $sql);

header("location:withdrawal.php?id=$cuserid");

?>