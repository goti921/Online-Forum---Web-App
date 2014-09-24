<?php
session_start();
$username = $_SESSION['username'];
include "process/config.php";
?>

<html>
	<head>
		<title>
			POST QUESTION
		</title>
		<link href="css/create.css" rel="stylesheet" type="text/css" />
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
						<form action="process/create.php" method="POST" >
							
							Name:<br /><input type="text" name="name" value=<?php echo "$username" ?> disabled /><br/><br />
							Question:<br /><textarea name="question" id="ques" cols="60" rows="5" placeholder="Post your Question .."></textarea><br/><br />
							Category:<br /><select name="category" id="cat" >
											<option>Business Management</option>
											<option>Computers</option>
											<option>Commerce</option>
											<option>Designing</option>
											<option>Entertainment</option>
											<option>Interview</option>
											<option>Mobile App Dev</option>
											<option>Psychology</option>
											<option>Web Development</option>
											<option>Web Designing</option>
											<option>Others</option>
										   </select><br /><br/>
							Email Id:<br /><input type="text" name="email" id="mail" /><br /><br /> 
							<input type="submit" value="POST" onclick="return check_create()" style="margin-left:250px;"/>
						</form>
					</div>
				</div>
			</div>
			<footer>
			@VF 2013 All Rights Reserved
		</footer>
		</body>
</html>