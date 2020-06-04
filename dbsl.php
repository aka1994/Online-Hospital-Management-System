<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// drop

$sql = "DROP DATABASE hospital";
if (mysqli_query($conn, $sql)) {
    echo "Database htest was successfully dropped\n";
} else {
    echo 'Error dropping database: ' . mysql_error() . "\n";
}





// Create database
$sql = "CREATE DATABASE  hospital";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


mysqli_select_db($conn,"hospital");






// sql to create table
$createaccounts = "CREATE TABLE accounts (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,				
active	int(11)	        NOT NULL,			
type	varchar(100) NOT NULL,				
fname	varchar(100) NOT NULL,				
lname	varchar(100) NOT NULL,				
gender	varchar(100) NOT NULL,				
email	varchar(100) NOT NULL,				
phone	int(11) NOT NULL,				
dob	    varchar(200) NOT NULL,				
cdate	varchar(100) NOT NULL,				
street	varchar(100) NOT NULL,				
city	varchar(100) NOT NULL,				
state	varchar(100) NOT NULL,				
zipcode	int(11) NOT NULL,				
country	varchar(100) NOT NULL,				
password	varchar(100) NOT NULL,				
dtype	varchar(200) NOT NULL
)";


$autopassword = "password100";
$password = $conn->escape_string(password_hash($autopassword, PASSWORD_BCRYPT));
if ($conn->query($createaccounts) === TRUE) {
    echo "Table MyGuests created successfully";
    $admininstert  = "INSERT INTO `accounts`(`id`, `active`, `type`, `fname`, `lname`, `gender`, `email`, `phone`, `dob`, `cdate`, `street`, `city`, `state`, `zipcode`, `country`, `password`, `dtype`)
     VALUES ('100','1','admin','Leonard','HABIMANA','male','mainadmin@gmail.com','878922226','2018-11-22','2018/11/22','kg622','kigali','east','6434','rwanda','$password','0')";

     if ( $conn->query($admininstert) ){
     	echo "admin added";
     	echo "your password will be <b>".$autopassword."</b>";
     }
     else{
     	   echo "Error inserting admin: " . $conn->error;
     }

} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$createappointments = "CREATE TABLE appointments (
number INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,					
id	varchar(200) NOT NULL,				
fname	varchar(200) NOT NULL,				
lname	varchar(200) NOT NULL,				
email	varchar(200) NOT NULL,				
date	varchar(200) NOT NULL,				
type	varchar(200) NOT NULL,				
dtype	varchar(200) NOT NULL
)";

if ($conn->query($createappointments) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$createlogs = "CREATE TABLE logs (
id	varchar(200) NOT NULL,				
fname	varchar(200) NOT NULL,				
lname	varchar(200) NOT NULL,				
type	varchar(200) NOT NULL,				
email	varchar(200) NOT NULL,				
time	varchar(200) NOT NULL,				
status	varchar(200) NOT NULL
)";

if ($conn->query($createlogs) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
 header( "location: index.php" );
$conn->close();
?>