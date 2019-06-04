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
  $username = mysqli_real_escape_string($db, $_GET['username']);  
  $password = mysqli_real_escape_string($db, $_GET['password']);
  $cpassword = mysqli_real_escape_string($db, $_GET['cpassword']);    
  $email = mysqli_real_escape_string($db, $_GET['email']);    
  $age = mysqli_real_escape_string($db, $_GET['age']);   
  $title = mysqli_real_escape_string($db, $_GET['title']);   
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($age)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  

  
  
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

  	$query = "INSERT INTO customers (username, password,area_code, telephone, point, email, title, age) 
  			  VALUES('$username','$password', '$area_code', '$phone', 0 ,'$email','$title','$age' )";
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





if (isset($_GET['reg_phone'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_GET['username']);    
  $phone = mysqli_real_escape_string($db, $_GET['phone']);  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }  
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "UPDATE customers set telephone ='$phone' , area_code = '852' WHERE username = '$username' ";
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


if (isset($_GET['qrcode_customer'])) {
  $customer_username = mysqli_real_escape_string($db, $_GET['customer_name']);
  $password = mysqli_real_escape_string($db, $_GET['password']);
  $store_username = mysqli_real_escape_string($db, $_GET['store_username']);
  $serial_number = mysqli_real_escape_string($db, $_GET['serial_number']);
  $adv_user = mysqli_real_escape_string($db, $_GET['adv_user']);
  
// http://157.230.145.40/ops/restap.php?qrcode_customer=qrcode_customer&store_username=storeusr&serial_number=sr-156&adv_user=linux&customer_name=ronald&password=60503176

   echo "test"; 

  if (empty($customer_username)) {
  	array_push($errors, "Username is required");
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
  
  echo "test2222"; 
  if (count($errors) == 0) {
  	//$password = md5($password);
	
	//http://157.230.145.40/ops/restap.php?qrcode_customer=qrcode_customer&store_username=storeusr&serial_number=sr-156&adv_user=linux&customer_name=ronald&cpassword=60503176
	
  	$query = "SELECT POINT FROM customers WHERE username='$customer_username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	
	$earnpoint = "UPDATE customers  SET point = point + 1  WHERE username='$username' AND password='$password'";  
	
	if ($db->query($earnpoint) === TRUE) {		
	
		$query2 = "SELECT * FROM customer_access WHERE customerid='$customer_username' AND storeid='$store_username' AND displayid='$serial_number' AND advid='$adv_user'";
		
		$results2 = mysqli_query($db, $query2);
		if (mysqli_num_rows($results2) > 0) {	
	
			$updateCount = "UPDATE customer_access  SET count = count + 1  WHERE customerid='$customer_username' AND storeid='$store_username' AND displayid='$serial_number' AND advid='$adv_user'";
			
			if ($db->query($updateCount) === TRUE) 
			{
				
			   echo "<p>SUCCESS</p>";        
			}else{
				
		foreach ($errors as $error) {
		echo "<p>".$error ."</p>";  
	  } 
  	  		
				
			}			
		   
		}else{
	
			
			$insertCustomerAccess = "INSERT INTO customer_access (customerid, storeid, displayid,advid, count) VALUES('$customer_username', '$store_username', '$serial_number', '$adv_user', 1)";
			
			if ($db->query($insertCustomerAccess) === TRUE) 
			{
				echo "<p>SUCCESS</p>";        
			}else{
				foreach ($errors as $error) {
		echo "<p>".$error ."</p>";  
		
	
	  } 
  	  
				
				
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
  }
}

if (isset($_GET['customer_check_point'])) {
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
		
	 echo $results;
  	 	
  	 /* 
	$earnpoint = "UPDATE customers  SET point = point + 1  WHERE username='$username' AND password='$password'";  
	if ($db->query($earnpoint) === TRUE) {		
	   
 		echo "<p>SUCCESS</p>";        
	} else {
		
	    
	}	  
	  */
  	}else {
  		array_push($errors, "Wrong username/password combination");
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
