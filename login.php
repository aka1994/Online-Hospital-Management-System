<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<?php 
include 'db.php';
if (isset($_POST['submit'])) {
	/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    $message = '<b style="color: red;">User with that email doesn t exist!</b';
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {


        session_start();
        $_SESSION['email'] = $user['email'];
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];
        $_SESSION['active'] = $user['active'];
         $_SESSION['type']  = $user['type'];

$length = 8;
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
$logid = substr( str_shuffle( $chars ), 0, $length );
$timestamp = time(); 
$time = date("F d, Y h:i:s A", $timestamp); 
$type = $user['type'];
$fname = $user['fname'];
$lname = $user['lname'];
$email = $user['email'];



         $sql = "INSERT INTO logs (id,type,fname,lname,email,time,status) VALUES ('$logid','$type','$fname','$lname','$email','$time','login')";
   if ( $mysqli->query($sql) ){

   	echo "done";
   }
   else{
   	echo "sorry";
   }
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
if ($_SESSION['type'] == "patient") {
	# code...
	  header("location: patientprofile.php");
}
else if ($_SESSION['type'] == "admin") {
	  header("location: adminprofile.php");
}
else if ($_SESSION['type'] == "doctor") {
	 $_SESSION['dtype']  = $user['dtype'];
	 header("location: doctorprofile.php");
}
else{
	 header("location: index.php");
}
     
     
    }
    else {
    
       $message = '<b style="color: red;">You have entered wrong password, try again!</b>';
    }
}

}
else
{
	$message = "please fill the form";
	}
	//iTxvu4eX
 ?>

<style type="text/css">

</style>
<body>
	<form action="login.php" method="post">
		<h1>Login</h1>
		<span><?php echo $message;  ?></span>
		<ul>
			    <li>	
			        <input type="text" name="email" placeholder="Account Id" required="\">
				</li>
				<li>
		        	<input type="password" name="password" placeholder="Password" required="">
		   		</li>
		   			<br><a href="forget.php">Forget Password</a><br>
		   		<br><input type="submit" name="submit" value="login">
		</ul>
	
	</form>

</body>
</html>