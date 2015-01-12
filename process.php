<?php

	ob_start();	// start output buffers due to hearders.

	require_once("includes/functions.php");	// altanative to include.
	require_once 'db_login.php';


	$db_server = connect_to_database($db_hostname, $db_username, $db_password);

	mysql_select_db($db_database) or die("Unable to seletc Database ".mysql_error());

	if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) )
	{
		$temp_user = clean_input($_POST['username']);
		$temp_pass = clean_input($_POST['password']);

		$query = "SELECT username, password FROM student WHERE username = '$temp_user'";
		$result = mysql_query($query);

		if(!$result) die("Database access Failde.".mysql_error());

		$rows = mysql_num_rows($result);	// returns the num rows returned by the query.

		if($rows >= 1)
		{
			for ($i=0; $i < $rows; $i++) // if the for loop is false then zero was returned.
			{ 
				$db_username = mysql_result($result, $i, 'username');
				$db_password = mysql_result($result, $i, 'password');


				$temp_pass= md5("$temp_pass");	// hass user entered password.

				if($temp_pass== $db_password && $temp_user == $db_username)	// password match.
				{
					redirect_to("student.php");
				}
				else // password mismatch.
					redirect_to("login.php");


			}	
		}
		else
		{
			redirect_to("login.php");
		}


	}
	else // password field is empty.
			redirect_to("login.php");

	ob_end_flush();	

?>