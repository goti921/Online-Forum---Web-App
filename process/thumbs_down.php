<?php
	include "config.php";
	$aid = $_GET['aid'];
	$ans = oci_parse($con,"SELECT * FROM forum_answer where AID = $aid") or die(oci_error());
	oci_execute($ans);
	while($res = oci_fetch_assoc($ans))
	{
		$dislike = $res['DISLIKES'];
	}
	$dislike = $dislike + 1;
	$mod = oci_parse($con,"UPDATE forum_answer set DISLIKES=$dislike where AID=$aid") or die(oci_error());
	oci_execute($mod);
	oci_commit($con);
	echo $dislike;
?>