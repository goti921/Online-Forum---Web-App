<?php
session_start();
include "config.php";

$username = $_SESSION['username'];
$qid = $_POST['qid'];
$datetime = date("Y-m-d H:i:s");
$answer = nl2br($_POST['answer']);

$user = oci_parse($con,"SELECT * FROM forum_question where QID=$qid") or die(oci_error());
oci_execute($user);
while($res = oci_fetch_assoc($user))
{
	$email = $res['EMAIL'];
}

$stid = oci_parse($con,"SELECT * FROM forum_answer ") or die(oci_error());
oci_execute($stid);
	while($row = oci_fetch_assoc($stid))
	{
		//echo $row['USERNAME']."<br />";
		//echo $row['PASSWORD'];
	}
$n = oci_num_rows($stid);

if($n == 0)
{
	$stid = oci_parse($con,"DROP sequence hr.temp_answer") or die(oci_error());
	oci_execute($stid);
	oci_commit($con);
	$stid = oci_parse($con,"CREATE sequence hr.temp_answer") or die(oci_error());
	oci_execute($stid);
	oci_commit($con);
}


$ans = oci_parse($con,"INSERT INTO forum_answer (QUESID,NAME,DATETIME,ANSWER,EMAIL) values 
	                   ($qid,'$username','$datetime','$answer','$email')") 
					or die(oci_error());
oci_execute($ans);
oci_commit($con);
header("location:../browse.php");
?>