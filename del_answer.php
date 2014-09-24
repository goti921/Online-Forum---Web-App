<?php
include "config.php";
$aid = $_GET['id'];
$ques = oci_parse($con,"SELECT QID FROM forum_answer where AID=$aid") or die(oci_error());
oci_execute($ques);
while($res = oci_fetch_assoc($ques))
{
	$qid = $res['QUESID'];
}
$del = oci_parse($con,"DELETE FROM forum_answer where AID=$aid") or die(oci_error());
oci_execute($del);
oci_commit($con);
header("location:../browse.php");
?>