<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>

<body>
	<div class="title">
		<h3>Get Register</h3>
		<span>Please fill the form as required</span>
	</div>
	
<form method="post" action="regestersql.php">
	<table>
		<tr>
			<td>Patient's Name</td>
			<input type="hidden" name="type" value="patient">
			<td>
              <li>
				<input type="text" name="fname" placeholder="First">
			</li>	
			</td>
			<td><li><input type="text" name="lname" placeholder="Last"></li></td>
		</tr>


		<tr>
			<td>Gender</td>
			<td><input type="radio" name="gender" value="male"> Male</td>
			<td><input type="radio" name="gender" value="female"> Female</td>
		</tr>

<tr>
	<td>Email</td>
	<td><li><input type="text" placeholder="example@gmail.com" name="email"></li></td>
</tr>
		<tr>
			<td>Phone </td>
			<td><li><input type="text" name="phone" placeholder="### ### #####"></li></td>
		</tr>
		<tr>
			<td>Date of Birth</td>
			<td><li><input type="date" name="dob"></li></td>
		</tr>

		<tr>
		<td>Patient's Address</td>
		<td><li><input type="text" name="street" placeholder="Street Address"></li>
		</td>

		</tr>

		<tr>
			<td></td>
			<td><li><input type="text" placeholder="City" name="city"></li></td>

			<td><li><input type="text" placeholder="State" name="state"></li></td>
		</tr>

		<tr>
			<td></td>
			<td><li><input type="text" placeholder="Postal/Zip Code" name="zipcode"></li></td>

			<td><li><input type="text" placeholder="Country" name="country"></li></td>
		</tr>

		<tr>
			
			<td>password</td>

			<td><li><input type="text" placeholder="password" name="password"></li></td>
		</tr>
		







	</table>
	<div class="submitin">
			<input type="submit" placeholder="register" name="">
	</div>


</form>
</body>
</html>