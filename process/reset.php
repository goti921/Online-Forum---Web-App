<?php
include "config.php";
		$stid = oci_parse($con,"CREATE sequence temp_question") or die(oci_error());
		oci_execute($stid);
		oci_commit($con);
		$stid = oci_parse($con,"CREATE OR REPLACE trigger temp1 before INSERT on forum_question for each row
			                    begin 
			                    SELECT temp_question.NEXTVAL
			                    INTO :new.qid 
			                    from dual;
			                    end;
			                    /") or die(oci_error());
		


		$stid = oci_parse($con,"CREATE sequence temp_answer") or die(oci_error());
		oci_execute($stid);
		oci_commit($con);
		$stid = oci_parse($con,"CREATE OR REPLACE trigger temp2 before INSERT on forum_answer for each row
			                    begin 
			                    SELECT temp_answer.NEXTVAL
			                    INTO :new.aid 
			                    from dual;
			                    end;
			                    /") or die(oci_error());


		oci_execute($stid);
		oci_commit($con);
?>