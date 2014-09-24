<html>
	<head>
		<title>
			LOGIN | FORUM
		</title>
		<link href="css/index.css" rel="stylesheet" type="text/css" />
		<script src="js/forum.js" type="text/javascript" ></script>
		<script src="js/prefixfree.js" type="text/javascript" ></script>
	</head>
	<body>
		<div id="header">
			<div id="header_text">|| VIT FORUM ||</div>
		</div>

		<div id ="login_outbox">
			<div id="login_inbox">
				<div id="login_fields">
					
						<form name="login_form" method="POST" action="process/login.php" >
								<table >
								<tr style="font-size:20px"><td>Username:</td> <td><input type="text" name="username" id="name" autocomplete="off" /></td></tr>
								<tr style="font-size:20px;"><td>Password:</td> <td><input type="password" name="password" id="pass" /></td></tr>
								</table>
								<input type="submit" name="submit" onclick="return check_login()" value="Login" >
						</form>
					
				</div>
			</div>
			<div id="register"><a href="register.php">Not a User? Register Here ..</a></div>
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
					if($error=="fail")
					{
						echo "<script>
						              alert('Failed To Login. Try Again..');
						      </script>";
						      //header("location:index.php");		
					}
				}

				if(isset($_GET['msg']))
				{
					$error = $_GET['msg'];
					if($error=="success")
					{

						echo "<script>
						              alert('You have successfully registered!!');
						      </script>";
						//header("location:index.php");	
					}
				}

		?>