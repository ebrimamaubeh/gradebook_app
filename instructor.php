<?php
	

	require_once("includes/functions.php");
	require_once("includes/sessions.php");
	require_once("db_login.php");

	session_start();

	confirm_logged_in();



	mkdir_if_not_exist();

?>