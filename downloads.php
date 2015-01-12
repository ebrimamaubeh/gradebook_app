<?php   
	
	ob_start();
	// NB! headers have three parameters, namely , string, boolean , http responce code.



	// used to figure out the http responce code,, or status code to send.
	//header("HTTP/1.0 404 Not found!");// case not sensitive.

	// content disposition header is used to prompt users to save a file.


	// get the file name.
	if(isset($_GET['filename']))
	{
		$filename = $_GET['filename'];
		header("Content-type: application/pdf");// used to output a pdf file.
		header("Content-Disposition: attachment; filename=\"".basename($filename)."\"");
		// source of pdf file.
		readfile($filename);	
	}
	


	ob_end_flush();
?>