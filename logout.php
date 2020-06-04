<?php
/* Log out process, unsets and destroys session variables */
include "db.php"; 
session_start();

$length = 8;
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
$logid = substr( str_shuffle( $chars ), 0, $length );
$timestamp = time(); 
$time = date("F d, Y h:i:s A", $timestamp); 
$type = $_SESSION['type'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];



         $sql = "INSERT INTO logs (id,type,fname,lname,email,time,status) VALUES ('$logid','$type','$fname','$lname','$email','$time','logout')";
   if ( $mysqli->query($sql) ){

   	echo "done";
   }
   else{
   	echo "sorry";
   }



session_unset();
session_destroy(); 
 header( "location: index.php" );
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
</head>

<body>

</body>
</html>
