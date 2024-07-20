<?php

$settingsID = 1;

$sqlUser = "SELECT * FROM settings WHERE id = '$settingsID'";
$queryUser = mysqli_query($con, $sqlUser);
$getaddress = mysqli_fetch_assoc($queryUser);
