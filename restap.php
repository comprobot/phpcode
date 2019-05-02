<?php
session_start();

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
if (isset($_GET['register_customer'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_GET['username']);  
  $password = mysqli_real_escape_string($db, $_GET['password']);
  $cpassword = mysqli_real_escape_string($db, $_GET['cpassword']);    
  $area_code = mysqli_real_escape_string($db, $_GET['area_code']);
  $phone = mysqli_real_escape_string($db, $_GET['phone']);
  
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($area_code)) { array_push($errors, "Area code is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }  
  if (empty($cpassword)) { array_push($errors, "Confirm password is required"); }  
  if ($password != $cpassword) {
	array_push($errors, "The two passwords do not match");
  }
  
  $user_check_query = "SELECT * FROM customers WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO customers (username, password,area_code, telephone, point) 
  			  VALUES('$username','$password', '$area_code', '$phone', 0 )";
  	//mysqli_query($db, $query);
	
	if ($db->query($query) === TRUE) {
		echo "<p>SUCCESS</p>";
 		        
	} else {
		
	       array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
		   
		   
		   
	}
	
  }else{	  
	  
	  foreach ($errors as $error) {
		echo "<p>".$error ."</p>";  
	  } 
  	    
  }
  
}


if (isset($_GET['customer_earn_point'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
	
	
	
  	$query = "SELECT POINT FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  
	$earnpoint = "UPDATE customers  SET point = point + 1  WHERE username='$username' AND password='$password'";  
	if ($db->query($earnpoint) === TRUE) {		
	   
 		echo "<p>SUCCESS</p>";        
	} else {
		
	    
	}	  
	  
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}























?>
