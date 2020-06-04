<?php  
/* Displays user information and some useful messages */
session_start();
include "db.php";

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
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
</head>

<body>

  <nav>
    <ul>
      <li  style="border: none;"><a href="adminprofile.php">Brand</a> </li>
      <li  style="border: none;"><a href="update.php">profile</a> </li>
      <li  style="border: none;"><a href="allappointments.php">appointments</a> </li>
      <li  style="border: none;"><a href="patients.php">patients</a> </li>
      <li  style="border: none;"><a href="doctors.php">doctors</a> </li>
      <li  style="border: none;"><a href="adminregister.php">register</a> </li>
      <li  style="border: none;"><a href="logs.php">logs</a> </li>
      <li  style="border: none;"><a href="logout.php">logout</a> </li>

    </ul>
  </nav>
	<div class="title">
		<h3>Get Register</h3>
		<span>Please fill the form as required</span>
	</div>
	
<form method="post" action="regestersql.php">
	<table>
		<tr>
			<td>Select type</td>
			<td colspan="2">
				<li>
    	


			<select name="type">
				<option >Select account type...</option>
				<option value="patient">Patient</option>
				<option value="doctor">Doctor</option>
				<option value="admin">Admin</option>
			</select>
			    </li>
			</td>
		</tr>
		<tr>
			<td>Patient's Name</td>
			<td>
              <li>
				<input type="text" name="fname" placeholder="First" required="">
			</li>	
			</td>
			<td><li><input type="text" name="lname" placeholder="Last" required=""></li></td>
		</tr>


		<tr>
			<td>Gender</td>
			<td><input type="radio" name="gender" value="mole" required=""> Male</td>
			<td><input type="radio" name="gender" value="female" required=""> Female</td>
		</tr>

<tr>
	<td>Email</td>
	<td><li><input type="text" placeholder="example@gmail.com" name="email" required=""></li></td>
</tr>
		<tr>
			<td>Phone </td>
			<td><li><input type="text" name="phone" placeholder="### ### #####" required=""></li></td>
		</tr>
		<tr>
			<td>Date of Birth</td>
			<td><li><input type="date" name="dob"></li></td>
		</tr>

		<tr>
		<td>Patient's Address</td>
		<td><li><input type="text" name="street" placeholder="Street Address" required=""></li>
		</td>

		</tr>

		<tr>
			<td></td>
			<td><li><input type="text" placeholder="City" name="city" required=""></li></td>

			<td><li><input type="text" placeholder="State" name="state" required=""></li></td>
		</tr>

		<tr>
			<td></td>
			<td><li><input type="text" placeholder="Postal/Zip Code" name="zipcode" required=""></li></td>

			<td><li><input type="text" placeholder="Country" name="country" required=""></li></td>
		</tr>

   <tr>
   	<td>Select (only for doctors)</td>
   	<td><li>
   		<select name="dtype">
   			<option>Select Doctor type...</option>
   			<option value="General doctor">General doctor</option>
   			<option value="cardiologist">cardiologist [heart]</option>
   			<option value="Otolaryngologist">Otolaryngologist [ear]</option>
   			<option value="ophthalmologist">ophthalmologist [eye]</option>
   		</select>

   	</li></td>
   </tr>
		
		
	<tr>
			<td>password</td>
			<td><li><input type="password" placeholder="password" name="password" required=""></li></td>

		</tr>






	</table>
	<div class="submitin">
			<input type="submit" placeholder="register" name="">
	</div>


</form>
</body>
</html>