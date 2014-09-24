<html>
	<head>
		<title>
			REGISTER
		</title>
		<link href="css/register.css" rel="stylesheet" type="text/css" />
		<script src="js/forum.js" type="text/javascript" ></script>
		<script src="js/prefixfree.js" type="text/javascript" ></script>
	</head>
	<body>
		<div id="header">
			<div id="header_text">|| VIT FORUM ||</div>
		</div>

			<div id ="login_outbox">
				<div id="login_fields">
						<form name="register_form" method="POST" action="process/register.php" >
								Username:<br /><input type="text" name="username" id="name" autocomplete="off" /><br />
								Password:<br /><input type="password" name="password" id="pass" /><br />
								Confirm Password:<br /><input type="password" name="repassword" id="repass" /><br />
								<input type="submit" name="submit" value="Register" onclick="return check_reg()" >
						</form>
				</div>		
			</div>
		<footer>
			@VF 2013 All Rights Reserved
		</footer>
	</body>
</html>
	<?php
				if(isset($_GET['error']))
				{
					$error = $_GET['error'];
					if($error=="match")
					{
						echo "<script>
						              alert('Passwords do not match..');
						      </script>";
					}
					//header("location:register.php");
				}
		?>