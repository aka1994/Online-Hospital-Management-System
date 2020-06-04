

<?php 
include "db.php";
$_SESSION['email'] = $_POST['email'];
$_SESSION['fname'] = $_POST['fname'];
$_SESSION['lname'] = $_POST['lname'];



$type = $mysqli->escape_string($_POST['type']);
$fname = $mysqli->escape_string($_POST['fname']);
$lname = $mysqli->escape_string($_POST['lname']);
$gender = $mysqli->escape_string($_POST['gender']);
$email = $mysqli->escape_string($_POST['email']);
$phone = $mysqli->escape_string($_POST['phone']);
$dob = $mysqli->escape_string($_POST['dob']);
$cdate=date("Y/m/d");
$street = $mysqli->escape_string($_POST['street']);
$city = $mysqli->escape_string($_POST['city']);
$state = $mysqli->escape_string($_POST['state']);
$zipcode = $mysqli->escape_string($_POST['zipcode']);
$country = $mysqli->escape_string($_POST['country']);

$length = 8;
$tpassword = $mysqli->escape_string($_POST['password']);
$password = $mysqli->escape_string(password_hash($tpassword, PASSWORD_BCRYPT));








// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
//    $_SESSION['message'] = 'User with this email already exists!';
// header("location: error.php");

    echo "User with this email already exists!";
    
}
else{

if ($type == "doctor") {
    # code...
    $dtype = $mysqli->escape_string($_POST['dtype']);

$sql = "INSERT INTO accounts (type,fname,lname,gender,email,phone,dob,cdate,street,city,state,zipcode,country,password,dtype)
VALUES ('$type','$fname','$lname','$gender','$email','$phone','$dob','$cdate','$street','$city','$state','$zipcode','$country','$password','$dtype')";

}
else{
  $sql = "INSERT INTO accounts (type,fname,lname,gender,email,phone,dob,cdate,street,city,state,zipcode,country,password)
VALUES ('$type','$fname','$lname','$gender','$email','$phone','$dob','$cdate','$street','$city','$state','$zipcode','$country','$password')";  
}

  // Add user to the database
    if ( $mysqli->query($sql) ){
session_start();
        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in

        if ($_POST['type']=="doctor") {
            # code...
               header( "location: adminprofile.php" );
        }
        else{
               header( "location: patientprofile.php" );
        }
      
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( hospital leonard)';
        $message_body = '
        Hello '.$fname.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$password;  

        $email = mail( $to, $subject, $message_body );
        if ($email) {
            # code...
            echo "email sent ";
        }
        else
        {
            echo "email not sent";
        }


}
else{
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
}
 ?>








 
 
