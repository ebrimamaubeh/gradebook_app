<?php  
    require_once("includes/functions.php");
    require_once("includes/sessions.php");

   confirm_logged_in();   // if not logged_in then log them out.

       
    
?>

<html>
<head>
    <title>The Student Page.</title>
</head>
<body>
    <p>Welcome , <?php echo $_SESSION['username']; ?></p>

    <p><a href= "logout.php">Logout</a></p>
</body>

</html>
