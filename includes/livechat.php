<?php
include("../dash/user-area/includes/connection.php");

$settingsID = 1;

$sqlUser = "SELECT * FROM settings WHERE id = '$settingsID'";
$queryUser = mysqli_query($con, $sqlUser);
$getde = mysqli_fetch_assoc($queryUser);

echo $getde['livechat'];