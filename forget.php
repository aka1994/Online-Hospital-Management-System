<?php 
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
 header( "location: index.php" );
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['fname'];
    $last_name = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/form.css">
</head>

<body>
	<form>
		<h1>Login</h1>
		<span>please fill the form</span>
		<ul>
			    <li>	
			        <input type="text" name="id" placeholder="Enter your Email">
				</li>
			
		   		
		   		<br><input type="submit" name="" value="restore">
		</ul>
	
	</form>

</body>
</html>