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

$item_name="";
$item_price="";
$item_description="";



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
	
  $point_check_query = "SELECT * FROM system_settings";
  $resultpoint = mysqli_query($db, $point_check_query);
  $userpoint = mysqli_fetch_assoc($resultpoint);
  $adv_access_point = $userpoint['adv_access_point'];
  
  echo $adv_access_point;
	
	
	
}


if (isset($_GET['upload_item'])) {
	
    $item_name='ipad';
    $item_descrption='bbb ';
    $item_price='100';	
    $username='bblinux1';	
    	
    $query = "INSERT INTO item_shop (customer_id, item_id, item_name,item_description, item_price, item_redeem_code,adv_id,item_status, item_photo_path, item_kind_id)  VALUES('',NEXTVAL('itemSeq'),'$item_name','$item_description','item_price',NEXTVAL('itemSeq')+10,'$username','N','','$item_name')";
				
	
	
}






?>
