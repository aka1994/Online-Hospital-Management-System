<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="css/nav.css">
  </head>
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

  <style type="text/css">
body{
  padding: 0;
  margin: 0;
  background-image: url(../images/bg.jpg);
  background-color: #262626;
  background-size: 100%;
  opacity: 0.7;

  color: white;
  	font-family: 'Trebuchet MS', sans-serif;
}
.head{
width: 100%;
text-align: center;
margin-top: 100px;
}
.head h4{
  text-transform: uppercase;
}
a{
  color: white;
  text-decoration: none;
}
a:hover{
  font-weight: bold;
  animation: space 5s infinite;
}
@keyframes space {
  0%{
    font-weight: bold;
  }
50%{
    letter-spacing: 20px;
  }
  100%{

  }
}
.wrap{
width: 80%;
height: auto;
display: flex;
margin-left: 10%;
margin-top: 50px;
}
.logtext{
  float: right;
  margin-right: 15px;
}

.logbox{
  width: 420px;
  height: 120px;
float: left;
margin-right: 30px;
  border-radius: 4px;
  margin-top: 30px;
  padding: 5px;
  position: relative;
}
p,h1{
  padding: 0;
  margin: 0;
}
.title{
  font-size: 30px;
  background-color: none;
}
.sub{
  font-size: 17px;
}
span{
  position: absolute;
  bottom: 0;

  padding: 3px;
  text-transform: uppercase;
  font-size: 12px;
}
.wrap div:first-child span{
  background-color: #2790d8;
}
.wrap div:nth-child(2) span{
  background-color: #22978d;
}
.wrap div:nth-child(3) span{
  background-color: #4a85b9;
}
.wrap div:first-child{
    background-color: #3598dc;
}
.wrap div:nth-child(2){
  background-color: #239a90;
}
.wrap div:nth-child(3){
  background-color: #4d87ba;
}

  </style>
  <body>

  <nav>
    <ul>
      <li><a href="patientprofile.php">Brand</a> </li>
      <li><a href="update.php">profile</a> </li>
      <li><a href="appointments.php">appointments</a> </li>
      <li><a href="book.php">book</a> </li>
      <li><a href="logout.php">logout</a> </li>

    </ul>
  </nav>

  <div class="head">
    <h1> Online Hospital Management System</h1>
    <h4><?php echo $_SESSION['fname']; ?></h4>

  </div>


<div class="wrap">
  <div class="logbox">
    <div class="logtext">
      <p class="title">My Profile</p>

    </div>


  <span><a href="update.php">update profile</a></span>
  </div>





  <div class="logbox">
      <div class="logtext" style="  background-color: #239a90;">
    <p class="title">My Appointments</p>
</div>
    <span><a href="appointments.php">view Appointments</a></span>
  </div>
  <div class="logbox">
    <div class="logtext" style="  background-color: #4d87ba;">

    <p class="title">Book my Appointments</p>
</div>
    <span><a href="book.php">book Appointments</a></span>
  </div>
</div>
  </body>
</html>
