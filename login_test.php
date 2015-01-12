<?php
	ob_start();
	require_once("includes/functions.php");
	require_once("includes/sessions.php");
	require_once 'db_login.php';

	if(logged_in())
	{
		redirect_to("student.php");
	}

	$db_server = connect_to_database($db_hostname, $db_username, $db_password);

	mysql_select_db($db_database ) or die(mysql_error());

	if($_SERVER['REQUIST_METHOD']=="POST")// The form has been submited.
	{

		echo "posted.";

		die();

		if(isset($_POST['username']) && isset($_POST['password']))// read username and password.
		{

			$temp_username = clean_input($_POST['username']);
			$temp_password = clean_input($_POST['password']);

			// hash the password.
			$password = md5($temp_password);

			// search for username and password in the db.

			$query = "SELECT username, password, FROM student, instructor WHERE username = '$temp_username'
					AND password = '$temp_password'";


			$result = mysql_query($query) ;

			echo $result;
			die();

			if(!$result)
			{
				$message = "Invalid username / password";
			}

			if(mysql_num_rows($result) == 1)
			{
				$_SESSION['username'] = $temp_username;

				redirect_to("student.php");	

			}
			else
			{
				$message = "Invalid username / password";
			}

		}
	}
	else
		die("This is the else.");

	mysql_close($db_server);
	ob_end_flush();


?>


<html>
<head>
	<title>The login page.</title>
</head>
<body>

	<form action = "login_test.php" method = "post">
<pre>
	<label>Username: <input type = "text" name = "username" value = "<?php echo $temp_username;?> "  /></label>
	<label>Password: <input type = "password" name = "password" value = "" /></label>
		  <input type = "submit" value = "login" />
</pre>

</form>

	
</body>
</html>