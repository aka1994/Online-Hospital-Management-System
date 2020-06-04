<!DOCTYPE html>
<html>
<head>
	<title>
		appointments
	</title>
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
$select =  "doctor";
$sql = "SELECT * FROM accounts WHERE type='$select'";
$result = $mysqli->query($sql);


 ?>
 <?php


if (isset($_GET['demail'])) {
   # code...
  $demail=$_GET['demail'];
 
$delete="DELETE FROM accounts WHERE email='".$demail."'";
if ($mysqli->query($delete)===true) {
  ?>
  <script type="text/javascript">
    alert('deleting success');
  </script>
  <?php
}else{
   ?>
  <script type="text/javascript">
    alert('deleting failed <pp ');
  </script>
  <?php
}
 } 
 ?>
<style type="text/css">
  body{
  padding: 0;
  margin: 0;

    font-family: 'Trebuchet MS', sans-serif;
  text-align: center;
}
	/* DivTable.com */

.divTable{
	display: table;
	width: 100%;
}
.divTableRow {
	display: table-row;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
}
a{
	text-decoration: none
}
.divTableCell, .divTableHead {
	border: 1px solid #999999;
	display: table-cell;
	padding: 3px 10px;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
	font-weight: bold;
}
.divTableFoot {
	background-color: #EEE;
	display: table-footer-group;
	font-weight: bold;
}
.divTableBody {
	display: table-row-group;
}
.bb{
	font-weight: bold;
}
.wrap{
	width: 80%;
	margin-left: auto;
	margin-right: auto;
}
</style>
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
<div class="wrap">
	<div class="divTable">
<div class="divTableBody">
<div class="divTableRow bb">

<div class="divTableCell">ID</div>
<div class="divTableCell">FIRST NAME</div>
<div class="divTableCell">LAST NAME</div>
<div class="divTableCell">EMAIL</div>
<div class="divTableCell">PHONE</div>
<div class="divTableCell">DATE</div>
<div class="divTableCell">COUNTRY</div>
<div class="divTableCell">CITY</div>
<div class="divTableCell">STATE</div>
<div class="divTableCell">ZIPCODE</div>
<div class="divTableCell">DELETE</div>
<div class="divTableCell">UPDATE</div>
</div>

<?php 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 ?>
<div class="divTableRow">
<div class="divTableCell"><?php  echo $row["id"] ?></div>
<div class="divTableCell"><?php  echo $row["fname"] ?></div>
<div class="divTableCell"><?php  echo $row["lname"] ?></div>
<div class="divTableCell"><?php  echo $row["email"] ?></div>
<div class="divTableCell"><?php  echo $row["phone"] ?></div>
<div class="divTableCell"><?php  echo $row["cdate"] ?></div>
<div class="divTableCell"><?php  echo $row["country"] ?></div>
<div class="divTableCell"><?php  echo $row["city"] ?></div>
<div class="divTableCell"><?php  echo $row["state"] ?></div>
<div class="divTableCell"><?php  echo $row["zipcode"] ?></div>
<div class="divTableCell"><a href="patients.php?demail=<?php echo $row['email'] ;  ?> " onclick="return confirm('are you sure you want to delete this account <?php echo "".$row['email'].""; ?>')"><b style="color: red">X</b></a>  </div>
<div class="divTableCell"><a href="adminupdate.php?uemail=<?php echo $row['email'] ;  ?> "><b style="color: #22978d">U</b></a>  </div>
</div>

<?php 
}
}
 ?>

</div>
</div>
</div>
</body>
</html>