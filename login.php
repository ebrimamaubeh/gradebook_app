<?php
	ob_start();
	require_once("includes/functions.php");
	require_once("includes/sessions.php");
	require_once 'db_login.php';


	$db_server = connect_to_database($db_hostname, $db_username, $db_password);

	select_database($db_database);	// select the correct database.

	
	

	if(isset($_POST['username']) && isset($_POST['password']))// read username and password.
	{

		$temp_username = clean_input($_POST['username']);
		$temp_password = clean_input($_POST['password']);

		// check for empty string.
		if(empty($temp_username) || empty($temp_password))
		{
			redirect_to("../utgcm.com/trial.php");
		}

		// find user in the database.
		$result = find_user($temp_username, $temp_password);// encript and find user.
		
		if(!$result)
		{	
			die("This is the if , there was no result.");
			
			redirect_to("../utgcm.com/trial.php");
		}

		if(mysql_num_rows($result) === 1)
		{
			$_SESSION['username'] = $temp_username;// create session.

			redirect_to_page($temp_username);	// take to correct page.
		}
		else
		{	
			redirect_to("../utgcm.com/trial.php");	
		}

	}
	

	mysql_close($db_server);
	ob_end_flush();

?>