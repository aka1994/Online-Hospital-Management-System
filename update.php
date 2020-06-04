<?php
/* Displays user information and some useful messages */
session_start();
include "db.php";
 $_SESSION['message']= "change for updates";
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: index.php");
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
				$fname = $mysqli->escape_string($_POST['fname']);
$lname = $mysqli->escape_string($_POST['lname']);
$email = $mysqli->escape_string($_POST['email']);
$phone = $mysqli->escape_string($_POST['phone']);
$dob = $mysqli->escape_string($_POST['dob']);
$street = $mysqli->escape_string($_POST['street']);
$city = $mysqli->escape_string($_POST['city']);
$state = $mysqli->escape_string($_POST['state']);
$zipcode = $mysqli->escape_string($_POST['zipcode']);
$country = $mysqli->escape_string($_POST['country']);
$tpassword = $mysqli->escape_string($_POST['tpassword']);
$cpassword = $mysqli->escape_string($_POST['cpassword']);
$password = $mysqli->escape_string(password_hash($tpassword, PASSWORD_BCRYPT));





if (empty($tpassword)) {
	echo "empty";
	$sql="UPDATE accounts SET fname='$fname',lname='$lname',email='$email',phone='$phone',dob='$dob',street='$street',city='$city', state='$state',zipcode='$zipcode',country='$country' WHERE email = '$email'";

  if ( $mysqli->query($sql) ){
         $_SESSION['message'] = " <b style='color:green;'>Update complete </b>";
          header("location: update.php");
    }
    else
    {
    	  $_SESSION['message'] = " <b style='color:red;'>update failed!</b>";
          header("location: update.php");
    	
    }
	# code...
}
else
{
	    if ( password_verify($_POST['ccpassword'], $user['password']) ) {
	if ($tpassword == $cpassword) {
		# code...

		$sql="UPDATE accounts
   SET fname='$fname',lname='$lname',email='$email',phone='$phone',dob='$dob',street='$street',city='$city', state='$state',zipcode='$zipcode',country='$country', password='$password' WHERE email = '$email'";

  if ( $mysqli->query($sql) ){
     
        $_SESSION['message'] = " <b style='color:green;'>update complete!</b>";
          header("location: update.php");
    }
    else
    {
  
    	  $_SESSION['message'] = " <b style='color:red;'>update failed!</b>";
          header("location: update.php");
    }
	}

	else{
	
	 $_SESSION['message'] = " <b style='color:red;'>passwords not match</b>";
          header("location: update.php");
}
}
else{

 $_SESSION['message'] = " <b style='color:red;'>wrong password</b>";
          header("location: update.php");
}
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
	<?php 
if ($user['type'] == "patient" ) {
	# code...
	 ?>
	 <nav>
		<ul>
			<li  style="border: none;"><a href="patientprofile.php">Brand</a> </li>
			<li  style="border: none;"><a href="update.php">profile</a> </li>
			<li  style="border: none;"><a href="appointments.php">appointments</a> </li>
			<li  style="border: none;"><a href="book.php">book</a> </li>
			<li  style="border: none;"><a href="logout.php">logout</a> </li>

		</ul>
	</nav>
	<?php 
	}
	else if ($user['type'] == "doctor" ) {
		# code..
	 ?>
 <nav>
		<ul>
			<li  style="border: none;"><a href="patientprofile.php">Brand</a> </li>
			<li  style="border: none;"><a href="update.php">profile</a> </li>
			<li  style="border: none;"><a href="appointments.php">appointments</a> </li>
			<li  style="border: none;"><a href="book.php">book</a> </li>
			<li  style="border: none;"><a href="logout.php">logout</a> </li>

		</ul>
	</nav>
	<?php 
}
else{


	 ?>
	 <nav>
		<ul>
			<li  style="border: none;"><a href="adminprofile.php">Brand</a> </li>
			<li  style="border: none;"><a href="update.php">profile</a> </li>
			<li  style="border: none;"><a href="allappointments.php">appointments</a> </li>
			<li  style="border: none;"><a href="patients.php">patients</a> </li>
			<li  style="border: none;"><a href="doctors.php">doctors</a> </li>
			<li  style="border: none;"><a href="logs.php">logs</a> </li>
			<li  style="border: none;"><a href="logout">logout</a> </li>

		</ul>
	</nav>
	 <?php 
}
	  ?>




		
	<div class="title">
		<h3>update</h3>
		<span><?php  echo $_SESSION['message']; ?> </span>
	</div>
	
<form method="post" action="update.php">
	<table>
		<tr>
			<td>Patient's Name</td>
			<input type="hidden" name="type" value="patient">
			<td>
              <li>
				<input type="text" name="fname" placeholder="First" value="<?php echo $user['fname'];  ?>">
			</li>	
			</td>
			<td><li><input type="text" name="lname" placeholder="Last" value="<?php echo $user['lname'];  ?>"></li></td>
		</tr>


		

<tr>
	<td>Email</td>
	<td><li><input type="text" placeholder="example@gmail.com" name="email" value="<?php echo $user['email'];  ?>"></li></td>
</tr>
		<tr>
			<td>Phone </td>
			<td><li><input type="text" name="phone" placeholder="### ### #####" value="<?php echo $user['phone'];  ?>"></li></td>
		</tr>
		<tr>
			<td>Date of Birth</td>
			<td><li><input type="date" name="dob" value="<?php echo $user['dob'];  ?>"></li></td>
		</tr>

		<tr>
		<td>Patient's Address</td>
		<td><li><input type="text" name="street" placeholder="Street Address" value="<?php echo $user['street'];  ?>"></li>
		</td>

		</tr>

		<tr>
			<td></td>
			<td><li><input type="text" placeholder="City" name="city" value="<?php echo $user['city'];  ?>"></li></td>

			<td><li><input type="text" placeholder="State" name="state" value="<?php echo $user['state'];  ?>"></li></td>
		</tr>

		<tr>
			<td></td>
			<td><li><input type="text" placeholder="Postal/Zip Code" name="zipcode" value="<?php echo $user['zipcode'];  ?>"></li></td>

			<td><li><input type="text" placeholder="Country" name="country" value="<?php echo $user['country'];  ?>"></li></td>
		</tr>

		
			<tr>

			<td>Change Password</td>
			<td><li><input type="password" placeholder="current Password" name="ccpassword"></li></td>
            </tr>
            <tr>
            	<td></td>
			<td><li><input type="password" placeholder="New Password" name="tpassword"></li></td>

			<td><li><input type="password" placeholder="Confrim" name="cpassword" ></li></td>
		</tr>
		







	</table>
	<div class="submitin">
			<input type="submit" placeholder="update" name="submit" value="update">
	</div>


</form>
</body>
</html>