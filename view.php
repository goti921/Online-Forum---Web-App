<?php
session_start();
$username = $_SESSION['username'];
$qid = $_GET['id'];
include "process/config.php";
?>
<html>
	<head>
		<title>
			VIEW | FORUM
		</title>
		<link href="css/view.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/forum.js" type="text/javascript"></script> 
		<script src="js/prefixfree.js" type="text/javascript" ></script>
	</head>
		<body onload="highlight()">
			<div id="header">
				<div id="header_text"> || VIT FORUM ||</div>
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
 							$ques = oci_parse($con,"SELECT * FROM forum_question where QID=$qid") or die(oci_error());
 							oci_execute($ques);
 							while($res = oci_fetch_assoc($ques))
 							{
 								echo "<div class='question'>";
 								echo $res['QUESTION'];
 								echo "</div>";
 							}
 							$ans = oci_parse($con,"SELECT * FROM forum_answer where QUESID=$qid") or die(oci_error());
 							oci_execute($ans);
 							$i = 0;
 							while($res = oci_fetch_assoc($ans))
 							{
 								$i++;
 								echo "<div class='answer'>";
 								echo "<span style='font-size:20px;color:black;'>".$res['NAME'].": </span>".$res['ANSWER'];
 								$aid = $res['AID'];
 								echo "<br />";
 								if($res['LIKES'])
 								{
	 								echo "<div style='width:100px; color:black;'><img src='images/thumbs_up.png' style='cursor:pointer;' width='30px' height='30px' onclick='thumbs_up(".$aid.",".$i.")' alt='like'></img>
	 								      <span id='up".$i."'>".$res['LIKES']."</span></div>";
 								}
 								else
 								{
 									echo "<div style='width:100px; color:black;'><img src='images/thumbs_up.png' style='cursor:pointer;' width='30px' height='30px' onclick='thumbs_up(".$aid.",".$i.")' alt='like'></img>
	 								      <span id='up".$i."'>0</span></div>";	
 								}
 								if($res['DISLIKES'])
 								{
 									echo "<div style='width:100px;margin-top:-35px;margin-left:85px;color:black;'><img src='images/thumbs_down.png' width='30px' height='30px' style='cursor:pointer;'  onclick='thumbs_down(".$aid.",".$i.")' alt='like'></img>
 								      <span id='down".$i."' >".$res['DISLIKES']."</span></div>";
 								}
 								else
 								{
 									echo "<div style='width:100px;margin-top:-35px;margin-left:85px;color:black;'><img src='images/thumbs_down.png' width='30px' height='30px' style='cursor:pointer;' onclick='thumbs_down(".$aid.",".$i.")' alt='like'></img>
 								      <span id='down".$i."'>0</span></div>";
 								}
 									$pos = oci_parse($con,"SELECT POSITION FROM users where USERNAME='$username'") or die(oci_error());
									oci_execute($pos);
									while($row = oci_fetch_assoc($pos))
									{
										$position = $row['POSITION'];
									}
									if($position == 5)
									echo "<a href='process/del_answer.php?id=".$res['AID']."' style='float:right;margin-top:-20px;color:black;text-decoration:none;'>DELETE</a>";	
 								echo "</div>";
 							}
 							$n = oci_num_rows($ans);
 							if($n==0)
 							{
 								echo "<div class='answer'>";
 								echo "No Answers Yet ...";
 								echo "</div>";	
 							}			
						?>
						<div id="post_answer">
							<form action="process/post_answer.php" method="POST">
								<textarea name="answer" id="ans" cols="60" rows="5" placeholder="Post your answer.."></textarea><br/>
								<input type="hidden" name="qid" value="<?php echo $qid ?>" />
								<input type="submit" value="POST" onclick="return check_ans()" style="margin-top:10px;" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<footer>
			@VF 2013 All Rights Reserved
		</footer>
		</body>
</html>