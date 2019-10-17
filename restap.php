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
$age="";
$parameter="";

$servername = 'localhost';
$dbusername = 'ops';
$dbpassword = '60503176';
$dbname = 'ops';

$errors = array(); 



// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'registration');

$db = new mysqli($servername, $dbusername, $dbpassword, $dbname);


if (isset($_GET['reg_customer'])) {
  // receive all input values from the form
  $first_name = mysqli_real_escape_string($db, $_GET['first_name']);  	
  $last_name = mysqli_real_escape_string($db, $_GET['last_name']);  	
  $username = mysqli_real_escape_string($db, $_GET['username']);  
  $password = mysqli_real_escape_string($db, $_GET['password']);
  $cpassword = mysqli_real_escape_string($db, $_GET['cpassword']);    
  $email = mysqli_real_escape_string($db, $_GET['email']);    
  $age = mysqli_real_escape_string($db, $_GET['age']);   
  $title = mysqli_real_escape_string($db, $_GET['title']);   
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($last_name)) { array_push($errors, "姓氏是必須輸入的"); }
  if (empty($first_name)) { array_push($errors, "名字是必須輸入的"); }
  if (empty($username)) { //array_push($errors, "電郵是必須輸入的"); 
  }
  if (empty($age)) { array_push($errors, "年齡是必須輸入的"); }
  if (empty($email)) { array_push($errors, "電郵是必須輸入的"); }
  

  
  
  if (empty($password)) { array_push($errors, "密碼是必須輸入的"); }  
  if (empty($cpassword)) { array_push($errors, "再次輸入密碼是必須輸入的"); }  
  if ($password != $cpassword) {
	array_push($errors, "密碼與再次輸入密碼相同");
  }
  
  
  
  
  
  $user_check_query = "SELECT * FROM customers WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      //array_push($errors, "請用另一個電郵");
    }
  }

	  
  $user_check_query = "SELECT * FROM customers WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "請用另一個電郵");
    }
  }
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

	echo "<p>SUCCESS</p>";
	/*
  	$query = "INSERT INTO customers (username, lname, fname, password,area_code, telephone, point, email, title, age, first_reg) 
  			  VALUES('$username','$last_name','$first_name','$password', '$area_code', '$phone', 25 ,'$email','$title','$age',NOW())";
  	
	if ($db->query($query) === TRUE) {
		echo "<p>SUCCESS</p>";
 		        
	} else {
		
	       array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
		   
		   
		   
	}
	*/
	
  }else{	  
	  
	  foreach ($errors as $error) {
		echo "".$error.PHP_EOL;

	  } 
  	    
  }
}



if (isset($_GET['update_customer'])) {
  // receive all input values from the form
  $first_name = mysqli_real_escape_string($db, $_GET['given_name']);  	
  $last_name = mysqli_real_escape_string($db, $_GET['family_name']);  	
  $username = mysqli_real_escape_string($db, $_GET['username']);  
  $password = mysqli_real_escape_string($db, $_GET['password']);
  $cpassword = mysqli_real_escape_string($db, $_GET['password_retype']);      
  $age = mysqli_real_escape_string($db, $_GET['registration_age']);   
  $title = mysqli_real_escape_string($db, $_GET['salutation']);   
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($last_name)) { array_push($errors, "姓氏是必須輸入的"); }
  if (empty($first_name)) { array_push($errors, "名字是必須輸入的"); }
  if (empty($username)) { array_push($errors, "電郵是必須輸入的"); }
  if (empty($age)) { array_push($errors, "年齡是必須輸入的"); }
  if (empty($password)) { array_push($errors, "密碼是必須輸入的"); }  
  if (empty($cpassword)) { array_push($errors, "再次輸入密碼是必須輸入的"); }  
  if ($password != $cpassword) {
	array_push($errors, "密碼與再次輸入密碼相同");
  }
  
  
  $user_check_query = "SELECT * FROM customers WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
  /*
    if ($user['username'] === $username) {
      array_push($errors, "請用另一個電郵");
    }
	*/
  }else{
	  
	   array_push($errors, "沒有這個用戶");
  }

  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

	$query = "UPDATE customers SET lname='$last_name' , fname='$first_name', password='$password' , age='$age' , title='$title' WHERE username = '$username'";
	
	
  	//$query = "INSERT INTO customers (username, lname, fname, password,area_code, telephone, point, email, title, age)  VALUES('$username','$last_name','$first_name','$password', '$area_code', '$phone', 25 ,'$email','$title','$age' )";
			  
			  
			  
  	//mysqli_query($db, $query);
	
	if ($db->query($query) === TRUE) {
		echo "<p>SUCCESS</p>";
 		header('location: account_details.php');        
	} else {		
	       array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
		   
	}
	
  }else{	  
	  
	  foreach ($errors as $error) {
		echo "".$error.PHP_EOL;

	  } 
  	    
  }
}






if (isset($_GET['reg_phone'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_GET['username']);    
  $username = mysqli_real_escape_string($db, $_GET['username']);    
  $phone = mysqli_real_escape_string($db, $_GET['phone']);  
  $area_code = mysqli_real_escape_string($db, $_GET['area_phone']);  
  
  $first_name = mysqli_real_escape_string($db, $_GET['first_name']);  	
  $last_name = mysqli_real_escape_string($db, $_GET['last_name']);  	
  
  $password = mysqli_real_escape_string($db, $_GET['password']);
  $cpassword = mysqli_real_escape_string($db, $_GET['cpassword']);      
  $age = mysqli_real_escape_string($db, $_GET['age']);   
  $title = mysqli_real_escape_string($db, $_GET['title']);   
  
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($last_name)) { array_push($errors, "姓氏是必須輸入的"); }
  if (empty($first_name)) { array_push($errors, "名字是必須輸入的"); }
  if (empty($username)) { array_push($errors, "電郵是必須輸入的"); }
  if (empty($age)) { array_push($errors, "年齡是必須輸入的"); }
  if (empty($password)) { array_push($errors, "密碼是必須輸入的"); }  
  if (empty($cpassword)) { array_push($errors, "再次輸入密碼是必須輸入的"); }  
  if ($password != $cpassword) {
	array_push($errors, "密碼與再次輸入密碼相同");
  }  
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "電郵是必須輸入的"); }  
  if (empty($phone)) { array_push($errors, "電話是必須輸入的"); }
  if (empty($area_code)) { array_push($errors, "區碼是必須輸入的"); }
  

	  
  $user_check_query = "SELECT * FROM customers WHERE telephone='$phone' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['telephone'] === $phone) {
      array_push($errors, "請用另一個電話");
    }
  }
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	//$query = "UPDATE customers set telephone ='$phone' , area_code = '$area_code' WHERE username = '$username' ";
	
	
	$query = "INSERT INTO customers (username, lname, fname, password,area_code, telephone, point, email, title, age, first_reg) 
  			  VALUES('$username','$last_name','$first_name','$password', '$area_code', '$phone', 25 ,'$email','$title','$age',NOW())";
  	
	
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





if (isset($_GET['register_customer'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_GET['username']);  
  $password = mysqli_real_escape_string($db, $_GET['password']);
  $cpassword = mysqli_real_escape_string($db, $_GET['cpassword']);    
  $area_code = mysqli_real_escape_string($db, $_GET['area_code']);
  $phone = mysqli_real_escape_string($db, $_GET['phone']);
  
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "電郵是必須輸入的"); }
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
  			  VALUES('$username','$password', '$area_code', '$phone', 25 )";
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


if (isset($_GET['qrcode_customer'])) {
  $customer_username = mysqli_real_escape_string($db, $_GET['customer_name']);
  $password = mysqli_real_escape_string($db, $_GET['password']);
  $store_username = mysqli_real_escape_string($db, $_GET['store_username']);
  $serial_number = mysqli_real_escape_string($db, $_GET['serial_number']);
  $adv_user = mysqli_real_escape_string($db, $_GET['adv_user']);
  
// http://157.230.145.40/ops/restap.php?qrcode_customer=qrcode_customer&store_username=storeusr&serial_number=sr-156&adv_user=linux&customer_name=ronald&password=60503176

   echo "test"; 

  if (empty($customer_username)) {
  	array_push($errors, "電郵是必須輸入的");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (empty($store_username)) {
  	array_push($errors, "store_username is required");
  }
  if (empty($serial_number)) {
  	array_push($errors, "serial_number is required");
  }
  if (empty($adv_user)) {
  	array_push($errors, "adv_user is required");
  }  
  
  
  if (count($errors) == 0) {
  	//$password = md5($password);
	
	//http://157.230.145.40/ops/restap.php?qrcode_customer=qrcode_customer&store_username=storeusr&serial_number=sr-156&adv_user=linux&customer_name=ronald&cpassword=60503176
	
  	$query = "SELECT POINT FROM customers WHERE username='$customer_username' AND password='$password'";
  	$results = mysqli_query($db, $query);
	
     $point_check_query = "SELECT * FROM system_settings";
 	 $resultpoint = mysqli_query($db, $point_check_query);
     $userpoint = mysqli_fetch_assoc($resultpoint);
     $adv_access_point = $userpoint['adv_access_point'];
	 
	 
	 $checkLastScan = "SELECT * FROM customer_access where customerid='$customer_username' and storeid='$store_username' and displayid='$serial_number' and advid='$adv_user' and (now() - tm) < 1000000";
	 $checkLastScanResult = mysqli_query($db, $checkLastScan);
	 
	 
	 $pointAdvUserCheck = "SELECT * FROM point_db where username='$adv_user' and point > $adv_access_point";
	 $checkPointAdvUserResult = mysqli_query($db, $pointAdvUserCheck);
	 
	 if (mysqli_num_rows($checkPointAdvUserResult) > 0 ) {
		 
	 if (mysqli_num_rows($checkLastScanResult) == 0 ) {
	 
	
		if (mysqli_num_rows($results) == 1) {
  	
			$earnpoint = "UPDATE customers  SET point = point + $adv_access_point  WHERE username='$customer_username' AND password='$password'"; 
            $lostpoint = "UPDATE point_db  SET point = point - $adv_access_point  WHERE username='$adv_user' "; 

			
			if ($db->query($earnpoint) === TRUE) {
		
				$insertCustomerAccess = "INSERT INTO customer_access (customerid, storeid, displayid,advid, count) VALUES('$customer_username', '$store_username', '$serial_number', '$adv_user', $adv_access_point)";
				
			
				if ($db->query($insertCustomerAccess) === TRUE) 
				{
					
					
					
					
					
					
					
					if ($db->query($lostpoint) === TRUE) 
					{	
						echo "<p>SUCCESS</p>";        
						
					}else{
						foreach ($errors as $error) {
							echo "<p>".$error ."</p>";  
						} 
					}
					
				}else{
					foreach ($errors as $error) {
						echo "<p>".$error ."</p>";  
					} 
				}	
			} else {
	
				foreach ($errors as $error) {
					echo "<p>".$error ."</p>";  
				} 
			}	  
		}else {
			foreach ($errors as $error) {
				echo "<p>".$error ."</p>";  
			} 
  	  
		}
	 }else{
		 
		echo "請不要太密去 SCAN Code";  
	 }
	 
	 }else{
		 
		echo "積分已換完畢";  
	 }
	
  }
}

if (isset($_GET['customer_login_app_shop_api'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($username)) {
  	array_push($errors, "電郵是必須輸入的");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
	
	
	
  	$query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
          
	   $_SESSION['username'] = $username;
  	   $_SESSION['success'] = "You are now logged in";
  	   header('location: redemption_user.php');
           echo "<p>SUCCESS</p>";        
	
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}  

if (isset($_GET['customer_record_app_api'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($username)) {
  	array_push($errors, "電郵是必須輸入的");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
	
	
	
  	$query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
          
	   $_SESSION['username'] = $username;
  	   $_SESSION['success'] = "You are now logged in";
  	   header('location: records.php');
           echo "<p>SUCCESS</p>";        
	
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
} 


if (isset($_GET['customer_account_app_api'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($username)) {
  	array_push($errors, "電郵是必須輸入的");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
	
	
	
  	$query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
          
	   $_SESSION['username'] = $username;
  	   $_SESSION['success'] = "You are now logged in";
  	   header('location: account.php');
           echo "<p>SUCCESS</p>";        
	
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}  


if (isset($_GET['customer_login_app_api'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($username)) {
  	array_push($errors, "電郵是必須輸入的");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
	
	
	
  	$query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
          
	   $_SESSION['username'] = $username;
  	   $_SESSION['success'] = "You are now logged in";
  	   header('location: home.php');
           echo "<p>SUCCESS</p>";        
	
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}  



if (isset($_GET['customer_login_app_phone_api'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($username)) {
  	array_push($errors, "電郵是必須輸入的");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
	
	
	
  	$query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
	
	  
  	if (mysqli_num_rows($results) == 1) {
           $user = mysqli_fetch_assoc($result);  
	   $_SESSION['username'] = $username;
  	   $_SESSION['success'] = "You are now logged in";
  	   //header('location: home.php');
           echo "SUCCESS,".$user['telephone'];        
	
  	}else {
  		array_push($errors, "Wrong username/password combination");
		echo "電郵和密碼不正確";
  	}
  }
}  

if (isset($_GET['customer_login_app_telephone_api'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);
  $area = mysqli_real_escape_string($db, $_GET['area']);
	

  if (empty($username)) {
  	array_push($errors, "電話是必須輸入的");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
	
	
	
  	$query = "SELECT * FROM customers WHERE telephone='$username' AND password='$password'  AND area_code='$area' ";
  	$results = mysqli_query($db, $query);
	
	  
  	if (mysqli_num_rows($results) == 1) {
           $user = mysqli_fetch_assoc($results);  
	   $_SESSION['username'] =$user['username'];
  	   $_SESSION['success'] = "You are now logged in";
  	   //header('location: home.php');
           echo "SUCCESS,".$user['username'];        
	
  	}else {
  		array_push($errors, "Wrong username/password combination");
		echo "電話和密碼不正確";
  	}
  }
}  





if (isset($_GET['customer_login_api'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($username)) {
  	array_push($errors, "電郵是必須輸入的");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
	
	
	
  	$query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
          
	   
 		echo "<p>SUCCESS</p>";        
	
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}



if (isset($_GET['customer_check_point'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($username)) {
  	array_push($errors, "電郵是必須輸入的");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
	
	
	
  	$query = "SELECT POINT FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
	   while($row = mysqli_fetch_array($results))
	   {
	     echo $row['POINT'];	   
	   }
	
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


if (isset($_GET['customer_earn_point'])) {
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($username)) {
  	array_push($errors, "電郵是必須輸入的");
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
