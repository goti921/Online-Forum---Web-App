<?php
include "config.php";
$qid = $_GET['id'];
$del = oci_parse($con,"DELETE FROM forum_question where QID=$qid") or die(oci_error());
oci_execute($del);
oci_commit($con);
$del = oci_parse($con,"DELETE FROM forum_answer where QUESID=$qid") or die(oci_error());
oci_execute($del);
oci_commit($con);
header("location:../browse.php");
?>