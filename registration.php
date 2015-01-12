<?php 
	require_once("../web_app/includes/functions.php");
	require_once("../web_app/includes/sessions.php");
	require_once("../web_app/db_login.php");

	session_start();
	
	if(logged_in())
	{
		redirect_to_page($_SESSION['username']);
	}	

 ?>


<!DOCTYPE html>
<hlml>
<head>
	<meta charset="utf-8">
	<meta http-equiv ="X-UA-Compatible" content= "IE-edge"/>
	<title>Registration</title>

	<!-- meta -->
	<meta name="author" content="Ebrima Jallow" />
	<meta name="description" content= ""/>
	<meta name="viewpoint" content= "weith=device-widrh, initial-scale=1"/>
		

	<link rel="stylesheet" type="text/css" href="css/combine.css">

</head>	
<body>

		<div class="container">

			<h1>UNIVERSITY OF THE GAMBIA
			<p1>	
				<div class="login">
		<form action="../web_app/login.php" method="post">
			<input type="text" class="goIn" name = "username" placeholder="User name">
				
			<input type="password" class="goIn" name = "password" placeholder="Password">
			<input type="submit" value="login">
			
		</form>
	</div>
			</p1>

			</h1>

			<div class="logo">
				<p2><img src="images/UTG.jpg" alt="picture"></p2>

			</div>
			<aside class="sidebar">
				<div class="fillIn">

					<div class="signup">
					<label>SIGN UP HERE</label><br>
					</div>
					<form action="" method="post">
					<input type="text" name="firstname" id="name" placeholder="First Name" class="mytext" ><br><br>


					<input type="text" name="lastName" id="lastname"placeholder="Last Name" class="mytext" ><br><br>

					<input type="text" mat="matNumber" id="matnumber" placeholder="Mat Number" class="mytext"><br><br>

					<input type="text" mail="email" id="email" placeholder="Email"class="mytext"><br><br>

					<input type="text" mail="email" id="password" placeholder="Password" class="mytext"><br><br>

					<input type="text" mail="email" id="verify" placeholder="Repeat password" class="mytext"><br><br>

					Major<br>
					<select class="mytext">
						
						<option value="cs">Computer Science</option>
						<option value="is">Information System</option>
						<option value="phy">Physics</option>
						<option value="che">Chemistry</option>
						<option value="bio">Biology</option>
					</select><br><br>
					

						<input type="radio" name="sex" id="male" value="male">Male
					<input type="radio" name="sex" id="male" value="female">female<br><br>
						<a href ="#"><input type="submit" value="sign up"></a>

					</form>

				</div>
				</aside>
		</div>

		<hr><!-- The horizontal line-->

		<footer class="footer">
			<small>
				<p>&copy copyright 2014 || All rights reserved by <a href="about_us.html">UTGCM</a></p>
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

	
</body>


<?php 
ob_end_flush(); // end the output buffer.

?>

</hlml>