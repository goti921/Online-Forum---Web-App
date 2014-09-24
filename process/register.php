<?php
include "config.php";
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

if($password!=$repassword)
{
	header("location:../register.php?error=match");
}
else
{
$reg = oci_parse($con,"INSERT INTO users (USERNAME,PASSWORD) values ('$username','$password')") or die(oci_error());
oci_execute($reg);
oci_commit($con);
header("location:../index.php?msg=success");
}
?>