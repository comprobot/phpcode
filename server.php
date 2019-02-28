<?php
session_start();
header('location: home.php');
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
$servername = 'localhost';
$username = 'ops';
$dbpassword = '60503176';
$dbname = 'ops';

$errors = array(); 



// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'registration');

$db = new mysqli($servername, $username, $dbpassword, $dbname);

// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);  
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $area_code = mysqli_real_escape_string($db, $_POST['area_code']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $title = mysqli_real_escape_string($db, $_POST['title']);
  
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($first_name)) { array_push($errors, "First name is required"); }
  if (empty($last_name)) { array_push($errors, "Last name is required"); }
  if (empty($area_code)) { array_push($errors, "Area code is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($title1)) { array_push($errors, "Title is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }  
  if (empty($cpassword)) { array_push($errors, "Confirm password is required"); }  
  if ($password != $cpassword) {
	array_push($errors, "The two passwords do not match");
  }
  
  
  
  
  
  
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM adv_users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] == $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] == $email) {
      array_push($errors, "email already exists");
    }
  }

  /*
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
  */
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
