<?php
$con = mysqli_connect("lim115.truehost.cloud", "alhfchvs_koinblocks", "Koin125@6st!", "alhfchvs_koinblocks");


$settingsID = 1;

$sqlUser = "SELECT * FROM settings WHERE id = '$settingsID'";
$queryUser = mysqli_query($con, $sqlUser);
$getde = mysqli_fetch_assoc($queryUser);

echo htmlspecialchars_decode($getde['livechat']);