<?php
	
	require_once("../web_app/includes/functions.php");
	require_once("../web_app/includes/sessions.php");
	require_once("../web_app/db_login.php");

	session_start();

	confirm_logged_in();

	$db_server = connect_to_database($db_hostname, $db_username, $db_password);

	select_database($db_database);	// select the correct database.

	
	// if the lecturer does not have a folder, then make it for them.
	$path = "../web_app/uploads/";
	mkdir_if_not_exist($path);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv ="X-UA-Compatible" content= "IE-edge"/>
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
				<a href="../web_app/logout.php"><span><input type="submit" value="Logout"></span></a>
				<p>Knowledge Truth Development</p>
			<nav class="nav">
				<ul>
					<li>
						<a href="lecturer.html">Home</a>
					</li>
					<li>
						<a href="course_materials.html">My Courses</a>
					</li>
					<li>
						<a href="grades.html">View Students</a>
					</li>
					<li>
						<a href="update_course.html">Update Course</a>
					</li>
					<li>
						<a href="settings.html">Settings</a>
					</li>
				</ul>
			</nav>
		</header><!-- end of header -->
	

		<div class="main">

			<div class="content">
			<h2>LECTURER</h2>

			<form>
				<p>Upload Lecture Materials</p>
				<input type="file" name="lecture_mterials"/>
				<input type="submit" name="upload" value="Upload"/>
			</form>
			</div><!-- end of content -->

			<!--<aside class="sidebar">
				<img src="images/class.jpg" alt="image">

				<hr>

				<ul>
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


		<?php // output lecturers courses.
				$course_array = list_instructor_courses();

					echo" <ul id  = \"show_courses\">";
				echo "Courses <br/>";

				foreach($course_array as $course)
				{
					echo	"<li>$course</li>";// re
				}
				
				echo "</ul>";

			 ?>

		</div><!-- end of main -->
		
		<?php // output lecturers courses.
				$course_array = list_instructor_courses();

					echo" <ul id  = \"show_courses\">";
				echo "Courses <br/>";

				foreach($course_array as $course)
				{
					echo	"<li>$course</li>";// re
				}
				
				echo "</ul>";

			 ?>


		<hr>

		<footer class="footer">
			<small>
				<p id="copyright">&copy copyright 2014 || All rights reserved by <a href="about_us.html">UTGCM</a></p>
				<p id="nav">
					<ul>
					<li><a href="authors.html">Authors</a></li>
					<li><a href="about_us.html">About us</a></li>
					<li><a href="help.html">Help</a></li>
					<li><a href="contact_us.html">Contact us</a></li>
				</ul>
				</p>
			</small>
		</footer><!-- end of footer -->

	</div><!-- /end of container -->
</body>
<?php ob_end_flush(); ?>
</html>