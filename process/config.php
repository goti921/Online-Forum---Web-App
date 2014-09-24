<?php
$db_user = "hr";
$db_pass = "hr";
$db_server = "localhost";
$con = oci_connect($db_user,$db_pass,$db_server) or die(oci_error());
?>