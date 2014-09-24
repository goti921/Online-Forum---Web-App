<?php
	session_start();
	include "config.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	//echo $username."\n";
	//echo $password;

	if(empty($username) || empty($password))
	{
		header("location:../index.php");
	}
	else
	{
		$stid = oci_parse($con,"SELECT * FROM users where USERNAME='$username' and PASSWORD='$password'") or die(oci_error());
		oci_execute($stid);
		while($row = oci_fetch_assoc($stid))
		{
			//echo $row['USERNAME']."<br />";
			//echo $row['PASSWORD'];
		}
		
		$n = oci_num_rows($stid);
		echo $n;
		
		if($n==1)
		{
			$_SESSION['username'] = $username;
			$login_date = date("Y-m-d");
			$login_time = date("H:i:s");
			//echo "Date: ".$login_date."<br/>time: ".$login_time;
			$stid = oci_parse($con,"UPDATE users set LOGIN_DATE='$login_date',LOGIN_TIME='$login_time',STATUS=1 where USERNAME='$username'") or die(oci_error());
			oci_execute($stid);
			oci_commit($con);
			header("location:../home.php");
		}
		else
		{
			header("location:../index.php?error=fail");
		}
	}

?>