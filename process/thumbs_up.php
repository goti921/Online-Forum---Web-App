<?php
	include "config.php";
	$aid = $_GET['aid'];
	$ans = oci_parse($con,"SELECT * FROM forum_answer where AID = $aid") or die(oci_error());
	oci_execute($ans);
	while($res = oci_fetch_assoc($ans))
	{
		$like = $res['LIKES'];
	}
	$like = $like + 1;
	$mod = oci_parse($con,"UPDATE forum_answer set LIKES=$like where AID=$aid") or die(oci_error());
	oci_execute($mod);
	oci_commit($con);
	
	echo $like;
?>