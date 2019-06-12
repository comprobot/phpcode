<?php


// initializing variables
$username = "";
$email    = "";
$first_name ="";
$last_name="";
$area_code="";
$phone="";
$password="";
$cpassword="";
$title="";
$industry="";
$package="";
$store_name="";
$store_address="";
$target_user="";
$serial_number="";
$info="";
$id="";

$servername = 'localhost';
$dbusername = 'ops';
$dbpassword = '60503176';
$dbname = 'ops';

$errors = array(); 



// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'registration');

$db = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if (isset($_GET['add_payment'])) {
	

	$username = mysqli_real_escape_string($db, $_SESSION['username'] );
	
	if (empty($username)) { array_push($errors, "Username is required"); }

	$query = "INSERT INTO customer_payment (customerid, paid , verified)  VALUES('$username', 'T', 'F')";
	if ($db->query($query) === TRUE) {
		
		echo "<h1>The advertisement plan you have sccessfully purcharsed. </h1>";
		
 	} else {
	   //array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
	}
	
}

?>