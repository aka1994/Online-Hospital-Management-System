<?php
/* Displays user information and some useful messages */
session_start();
include "db.php";

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['fname'];
    $last_name = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");
			$user = $result->fetch_assoc();



if (isset($_POST['submit'])) {
	# code...

	$type = $mysqli->escape_string($_POST['appointment']);
	if ($type == "Cervix checkup") {
		# code...
		$dtype ="General doctor";
	}
		else if ($type == "Heart checkup") {
		# code...
		$dtype ="cardiologist";
	}
		else if ($type == "Hearing Test") {
		# code...
		$dtype ="Otolaryngologist";
	}
		else if ($type == "Eye checkup") {
		# code...
		$dtype ="ophthalmologist";
	}
	else{
		$dtype ="zero";
	}
	$length = 8;
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $id = substr( str_shuffle( $chars ), 0, $length );
    $date =  date('Y-m-d', strtotime(' + 3 days'));

	$sql = "INSERT INTO appointments (id,fname,lname,email,date,type,dtype)
VALUES ('$id','$first_name','$last_name','$email','$date','$type','$dtype')";
  // Add user to the database
    if ( $mysqli->query($sql) ){

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( hospital leonard)';
        $message_body = '
    
    
        Thank you for getting your appointment!

        you appointment date will be '.$date.' ';

        $email = mail( $to, $subject, $message_body );
    }
    else{
    	    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
</head>

<body>
		<nav>
		<ul>
			<li  style="border: none;"><a href="patientprofile.php">Brand</a> </li>
			<li  style="border: none;"><a href="update.php">profile</a> </li>
			<li  style="border: none;"><a href="appointments.php">appointments</a> </li>
			<li  style="border: none;"><a href="book.php">book</a> </li>
			<li  style="border: none;"><a href="logout.php">logout</a> </li>

		</ul>
	</nav>
	<div class="title">
		<h3>Doctor Appointment Form</h3>
		<span>Please fill the form as required</span>
	</div>
	
<form method="post" action="book.php">
	<table>

		<tr>
			<td style="text-transform: uppercase; font-weight: bold;"> Appointment Type</td>
		</tr>
		<tr>
			<td>Select which appointment type(s) you require</td>
			<td><li><input type="radio" name="appointment" value="Cervix checkup" required=""> Cervix checkup</li></td>
			<td><li><input type="radio" name="appointment" value="Heart checkup" required=""> Heart checkup</li></td>
		</tr>
		<tr>
			<td></td>
			<td><li><input type="radio" name="appointment" value="Eye checkup" required=""> Eye checkup</li></td>
			<td><li><input type="radio" name="appointment" value="Hearing Test" required=""> Hearing Test</li></td>
		</tr>






	</table>
	<div class="submitin">
			<input type="submit" value="register" name="submit">
	</div>


</form>
</body>
</html>