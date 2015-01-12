<?php
	
	function connect_to_database($host, $user, $pass)
	{
		$db_server = mysql_connect($host, $user, $pass);

		if(!$db_server) die("Database connection Failed: ".mysql_error());

		return $db_server;
	}

	function select_database($db_name)
	{
		mysql_select_db($db_name) or die("Could not select database: ".mysql_error());
	}

	function clean_input($string)
	{
		if(get_magic_quotes_gpc()) $string = stripslashes($string);
		$string = mysql_real_escape_string($string);
		$string = htmlentities($string);
		$string = strip_tags($string);
		return trim($string);
	}

	function redirect_to($string)
	{
		header("Location: $string");
		exit;
	}

	// this function finds a user in the databse.
	function find_user($user, $pass)
	{
		// hash the password.
		$pass = md5($pass);

		$query = "SELECT 1 from dual where EXISTS(
		    SELECT 1 FROM `instructor` WHERE `username` = '$user' AND password = '$pass'
		    UNION
		    SELECT 1 FROM `student` WHERE `username` = '$user'
					) ";

		$result = mysql_query($query) ;
		
		return $result;
	}

	// this function takes a user name and takes the user to the correct page. ie instructor or student.
	function redirect_to_page($user)
	{
		$query = "SELECT id FROM instructor WHERE username = '$user' ";

		$result = mysql_query($query);

		if(mysql_num_rows($result) === 1)// user is an instructor.
		{
			redirect_to("../utgcm.com/lecturer.php");
		}	
		else
		{
			redirect_to("../utgcm.com/students.php");// user is a student.
		}
	}

	// this function takes a path relative to the currnet directry.
	function mkdir_if_not_exist($path )
	{
		// select every thing from  the instructor table to use later 
		$query = "SELECT ins.first_name, ins.last_name, crs.course_name
			FROM instructor AS ins
			LEFT JOIN instructor_courses AS ic ON ins.id = ic.instructor_id
			LEFT JOIN courses AS crs ON crs.id = ic.course_id
			WHERE ins.username = '{$_SESSION['username']}'";

		$result = mysql_query($query);

		while($row = mysql_fetch_array($result))
		{
			$course = $row["course_name"];
			$instructor_first_name = $row["first_name"];

			$location = $path.$instructor_first_name."_".$course;

			if(!is_dir($location))// if it does not have a folder .
			{
				mkdir($location, 0777, true); // then make a folder.
			}

		}

	}// function

	// this function takes a button name and a path and uploads it to the path specified.
	function upload_file($button_name, $location)
	{
		// always pass the name directly without quoats when using the multi d array.
		$file_name = $_FILES[$button_name]['name'];	
		$tmp_name = $_FILES[$button_name]['tmp_name'];

		if(isset($file_name) && !empty($file_name))
		{
			if(move_uploaded_file($tmp_name, $location."/".$file_name))
			{
				die("uploaded in folder '$location' ");
			}
			else
				{
					echo "Not uploaded.";
					return false;
				}
			
		}
	}


	// this function takes a file and a course name , uploads it to the course directry.
	function upload_to_course_dir($path , $button_name, $course_name)
	{
		//$uploads_dir = "uploads/";

		// 


		// when giving the method a path , give give it a path wihch opends the uploads dir.
		$handle = opendir($uploads_dir);

		if($handle)	// directry opened.
		{
			// check for the end of file.
			while(false !== ($folder_name = readdir($handle)))
			{

				if($folder_name !== "." && $folder_name !== "..")
				{
					$folder_end_name = end(explode('_', $folder_name));
	
					if($folder_end_name === $course_name)
					{
						upload_file($button_name, $uploads_dir.$folder_name);
					}
				}
			}
		}


	}

	// This mehtod goes to the correct directry and adds all files to the array to return.
	function get_lecture_notes($instructor_name, $course_name)
	{
		$directry = $instructor_name."_".$course_name;

		//open uploads dir to find lecture folder.
		$uploads_dir = "uploads/";
		// what hapends if not upload file. handle this error.
		$handle = opendir($uploads_dir) or die("Could not open file.");

		$lecture_list = array();

		if($handle)
		{
			while(false !== ($folder_name = readdir($handle)))
			{
				if($folder_name === $directry)// found the course dir.
				{
					$handle  = opendir($uploads_dir.$folder_name) or die("could not open '$folder_name' ");

					while(false !== ($slide = readdir($handle)))
					{
						if($slide !=="." && $slide !== "..")
						{
							// Store all lecture notes in array.
							$lecture_list[] = $slide;// append at the end of array.
						}
					}
					// return an array of lecture notes.
					return $lecture_list;
						
				}
			}
		}

	}


	function list_instructor_courses()
	{
		$course_query = "SELECT crs.course_name
				FROM instructor AS ins
				LEFT JOIN instructor_courses AS ic ON ins.id = ic.instructor_id
				LEFT JOIN courses AS crs ON crs.id = ic.course_id
				WHERE ins.username =  '{$_SESSION['username']}'";

			$course_result = mysql_query($course_query);

			$course_array = array();// an array to hold the list of courses.

			while($row = mysql_fetch_array($course_result))
			{

				$course = $row["course_name"];

				$course_array[] = $course;// store in array 
				
			}
				
			return $course_array;

	}

	

?>