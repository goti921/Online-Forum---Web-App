<?php
session_start();
$username = $_SESSION['username'];
include "process/config.php";
?>
<html>
	<head>
		<title>
			VIEW | FORUM
		</title>
		<link href="css/browse.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/forum.js" type="text/javascript"></script> 
		<script src="js/prefixfree.js" type="text/javascript" ></script>
	</head>
		<body onload="highlight()">
			<div id="header">
				<div id="header_text">|| VIT FORUM ||</div>
			</div>
			<div id="topnav">
				<div id="topnav_inner">
					<b>Explore:</b>
					<a id="link0" href="home.php">HOME</a>
					<a id="link1" href="browse.php">BROWSE QUESTIONS</a>
					<a id="link2" href="create.php">POST QUESTION</a>
					<a id="link3" href="logout.php">LOGOUT</a>
				</div>
			</div>
			<div id="below_topnav">
				<div id="main">
					<div id="inside_main">
						<?php
							$ques = oci_parse($con,"SELECT * FROM forum_question") or die(oci_error());
							oci_execute($ques);
							$i = 0;
							while($res = oci_fetch_assoc($ques))
							{
								$n = strlen($res['QUESTION']);
								$i++;
								echo "<div class='question'>".$i.". ".substr($res['QUESTION'],0,100);
								if($n>100)
									echo "...";
								echo "</div>";
								echo "<div class='links'>";
									echo "<a href='view.php?id=".$res['QID']."'>VIEW</a>";
									$pos = oci_parse($con,"SELECT POSITION FROM users where USERNAME='$username'") or die(oci_error());
									oci_execute($pos);
									while($row = oci_fetch_assoc($pos))
									{
										$position = $row['POSITION'];
									}
									if($position == 5)
									echo "<a href='process/del_question.php?id=".$res['QID']."' style='float:right;'>DELETE</a>";									
								echo "</div>";

								
							}
						?>	
					</div>	
				</div>
			</div>
			<footer>
			@VF 2013 All Rights Reserved
		</footer>
		</body>
</html>