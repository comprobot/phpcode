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
$adminuser="";
$action="";
$servername = 'localhost';
$dbusername = 'ops';
$dbpassword = '60503176';
$dbname = 'ops';
$adv_username="";
$errors = array(); 
$checkpayment="";
$qrcode_str="";
$adv_access_point="";
$adv_pool_ratio="";


// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'registration');
$db = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if (isset($_GET['update_system_info'])) {
  $adv_pool_ratio = mysqli_real_escape_string($db, $_GET['adv_pool_ratio']);
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $adv_access_point = mysqli_real_escape_string($db, $_GET['adv_access_point']);

	echo $username;
	echo '<br/>';
	echo $adv_pool_ratio;
	echo '<br/>';
	echo $adv_access_point;
	echo '<br/>';
	/*
  if (empty($username)) {
  	header('location: sadminlogin.php');
  }
  
  if (empty($adv_pool_ratio)) {
  	header('location: sadminlogin.php');
  }
  
  if (empty($adv_access_point)) {
  	header('location: sadminlogin.php');
  }
  
  
  */
  	$query = "SELECT * FROM admin_users WHERE username='$username'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
		
		$query2 = "UPDATE system_settings SET adv_pool_ratio = $adv_pool_ratio ,adv_access_point = $adv_access_point";
		
		if ($db->query($query2) === TRUE) {
      echo 'done';
			//header('location: all_function.php?tag=systemsetting');
 				        
		} else {
      echo 'erro2';
		 // header('location: sadminlogin.php');
		}
		
  	  
  	}else {
      echo 'erroa';
  		//header('location: sadminlogin.php');
  	}
  
}

if (isset($_GET['customer_qrcode'])) {
	
  $user_check_query = "SELECT * FROM system_settings";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  $adv_access_point = $user['adv_access_point'];
  echo $adv_access_point;
	
	
	
}







?>
