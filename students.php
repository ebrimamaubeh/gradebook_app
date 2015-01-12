<?php
	
	require_once("../web_app/includes/functions.php");
	require_once("../web_app/includes/sessions.php");
	require_once("../web_app/db_login.php");

	session_start();

	confirm_logged_in();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv ="X-UA-Compatible" content= "IE-edge"/>
	<meta name="viewport" content="width=device-width"/>
	<title>UTG Course Management</title>

	<!-- meta -->
	<meta name="author" content="Ebrima Jallow" />
	<meta name="description" content= ""/>
	<meta name="viewpoint" content= "weith=device-widrh, initial-scale=1"/>
		

	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="container">

		<header class="header">
			<h1>University of The Gambia</h1>
				<a class="logo" href="index.html"><img src="images/UTG.jpg" alt="UTG" height="100px" /></a>
				<a href="#"><span><input type="submit" value="Logout"></span></a>
				<p>Knowledge Truth Development</p>

			<nav class="nav">
				<ul>
					<li>
						<a href="students.html">Home</a>
					</li>
					<li>
						<a href="course_materials.html">Course Materials</a>
					</li>
					<li>
						<a href="grades.html">View Grades</a>
					</li>
					<li>
						<a href="course_update.html">Update Course</a>
					</li>
					<li>
						<a href="settings.html">Settings</a>
					</li>
				</ul>
			</nav>
		</header><!-- end of header -->
	

		<div class="main">

			<div class="content">
				<h2>STUDENT</h2>

				<p>These are your current courses for this semester</p>
				<ol id="current_courses">
					<li>Linear Algebra 1[MTH 203]</li>
					<li>Calculus 2[MTH 102]</li>
					<li>General Science[SCI 101]</li>
					<li>Use of English 2[GEL 102]</li>
					<li>Programming 1(Java)[CPS 101]</li>
					<li>Biology 1[BIO 101]</li>
				</ol>
			</div><!-- end of content -->

		</div><!-- end of main -->

		<!--<aside class="sidebar">
				<h1>School of I.C.T</h1>
				<img src="UTG_images/Arts and Sciences.jpg" alt="image">
				
				<hr><!-- The horizontal line-->

				<!--<ul>
					<li>
					<a href="#">Home</a>
					</li>
					<li>
					<a href="#">About</a>
					</li>
					<li>
					<a href="#">Service</a>
					</li>
					<li>
					<a href="contact.html">Contact</a>
					</li>
				</ul>
			</aside>-->

		<hr>

		<footer class="footer">
				<p>&copy copyright 2014 || All rights reserved by <a href="about_us.html">UTGCM</a></p>
				<p id="nav">
				<ul>
					<li><a href="authors.html">Authors</a></li>
					<li><a href="about_us.html">About us</a></li>
					<li><a href="help.html">Help</a></li>
					<li><a href="contact_us.html">Contact us</a></li>
				</ul>
				</p>
		</footer><!-- end of footer -->

	</div><!-- /end of container -->
</body>
<?php 
ob_end_flush(); // end the output buffer.
?>
</html>