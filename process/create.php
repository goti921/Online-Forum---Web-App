<?php
session_start();
include "config.php";

$name = $_SESSION['username'];
//echo $name."<br />";
$question = $_POST['question'];
$category = $_POST['category'];
$email = $_POST['email'];
$datetime = date("Y-m-d H:i:s");
	if(empty($name))
	{
		header("location:../create.php?error=name");
	}
	if(empty($question))
	{
		header("location:../create.php?error=question");
	} 
	if(empty($category))
	{
		header("location:../create.php?error=category");
	} 
	if(!isset($_POST['email'])||empty($$_POST['email']))
	{
		header("location:../create.php?error=email");
	}
	$stid = oci_parse($con,"SELECT * FROM forum_question ") or die(oci_error());
	oci_execute($stid);
		while($row = oci_fetch_assoc($stid))
		{
			//echo $row['USERNAME']."<br />";
			//echo $row['PASSWORD'];
		}
	$n = oci_num_rows($stid);
	
	if($n == 0)
	{
		$stid = oci_parse($con,"DROP sequence hr.temp_question") or die(oci_error());
		oci_execute($stid);
		oci_commit($con);
		$stid = oci_parse($con,"CREATE sequence hr.temp_question") or die(oci_error());
		oci_execute($stid);
		oci_commit($con);
	}

	$stid = oci_parse($con,"INSERT into forum_question (NAME,QUESTION,CATEGORY,EMAIL,DATETIME) 
							values ('$name','$question','$category','$email','$datetime')") 
			or die(oci_error());

	oci_execute($stid);  
	oci_commit($con);
	header("location:../browse.php");
?>