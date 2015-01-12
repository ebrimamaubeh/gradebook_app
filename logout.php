<?php
	require_once("includes/sessions.php");
	require_once("includes/functions.php");
	// you need to confirm loggedin in every student.

	confirm_logged_in();

	if (logged_in())
	{
		destroySession();
		redirect_to("../utgcm.com/registration.php");
	}
	


?>