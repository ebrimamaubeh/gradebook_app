<?php
	
	session_start();

	require_once("functions.php");



	function destroySession()
	{
		$_SESSION = array();

		if(session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(), '', time() - 2592000, '/');

		session_destroy();
	}

	function logged_in()
	{
		return isset($_SESSION['username']) && $_SESSION['username'] != '';
	}

	function confirm_logged_in()
	{
		 if(!logged_in())
       {
       	  redirect_to("../utgcm.com/registration.php");
       }
	}

	function bypass_login()
	{
		redirect_to_page($_SESSION['username']);
	}

?>