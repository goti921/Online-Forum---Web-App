<?php
session_start();
include "process/config.php";
$username = $_SESSION['username'];
$logout_date = date("Y-m-d");
$logout_time = date("H:i:s");
$status = 0;
$user = oci_parse($con,"UPDATE users set status=$status,logout_date='$logout_date',logout_time='$logout_time' where username='$username'") or die(oci_error());
oci_execute($user);
oci_commit($con);
session_destroy();
header("location:index.php");
?>