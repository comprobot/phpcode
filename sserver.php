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

$errors = array(); 



// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'registration');

$db = new mysqli($servername, $dbusername, $dbpassword, $dbname);

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
  $industry = mysqli_real_escape_string($db, $_POST['industry']);
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $package = mysqli_real_escape_string($db, $_POST['package']);
  
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($first_name)) { array_push($errors, "First name is required"); }
  if (empty($last_name)) { array_push($errors, "Last name is required"); }
  if (empty($area_code)) { array_push($errors, "Area code is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($title)) { array_push($errors, "Title is required"); }
  if (empty($package)) { array_push($errors, "Title is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }  
  if (empty($industry)) { array_push($errors, "Industry is required"); }  
  if (empty($cpassword)) { array_push($errors, "Confirm password is required"); }  
  if ($password != $cpassword) {
	array_push($errors, "The two passwords do not match");
  }
  
  //header('location: check.php?username=ronald');
  
  
  
  
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM adv_users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO adv_users (username, email, password,first_name, last_name,area_code, phone, title,package,industry) 
  			  VALUES('$username', '$email', '$password', '$first_name', '$last_name', '$area_code', '$phone', '$title', '$package', '$industry')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: home.php');
  }
  
}


if (isset($_POST['add_media_player'])) {
	
	$serial_number = mysqli_real_escape_string($db, $_POST['serial_number']);
	$info = mysqli_real_escape_string($db, $_POST['info']);
	$username = mysqli_real_escape_string($db, $_SESSION['username'] );
	
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($serial_number)) { array_push($errors, "Serial number is required"); }
	if (empty($info)) { array_push($errors, "Information is required"); }
	
	$query = "INSERT INTO store_display (username, serial_number , info)  VALUES('$username', '$serial_number', '$info')";
	if ($db->query($query) === TRUE) {
		header('location: storeuserhome.php');
		
 	} else {
	   array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
	}
	
}




if (isset($_GET['delete_media_player'])) {
	
	$id = mysqli_real_escape_string($db, $_GET['storeid']);	
	$username = mysqli_real_escape_string($db, $_GET['user'] );
	
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($id)) { array_push($errors, "Serial number is required"); }
	
	
	$query = "DELETE FROM store_display  WHERE ( username='$username' AND  id='$id')";
	if ($db->query($query) === TRUE) {
		header('location: storeuserhome.php');
		
 	} else {
	   array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
	}
	
}




if (isset($_POST['upload_video'])) {
	header("Pragma:no-cache");
    header("Cache-control:no-cache"); 
	
	$qrcode_str = mysqli_real_escape_string($db, $_POST['qrcode_str']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	
	if (empty($username)) { array_push($errors, "Username is required"); }
	
	
	 $target_dir = dirname(__FILE__) ."/video/";
    echo $target_dir;
    $target_file = $target_dir . basename($_FILES["myvideo"]["name"]);
	$filename = $_FILES["myvideo"]["name"];	
	
	$qrcode_str = mysqli_real_escape_string($db, $_POST['qrcode_str']);
	
	if (empty($qrcode_str)) { array_push($errors, "qrcode_str is required"); }
	
	if(isset($_POST['qrcode_str']) AND !empty($qrcode_str) AND !empty($username)){
	
		if(isset($_FILES['myvideo']) AND $_FILES['myvideo']['error'] == 0) {
        // Check size
			if($_FILES['myvideo']['size'] <= 1000000000000) {
            // Get extension name
				$fileInfo = pathinfo($_FILES['myvideo']['name']);
				$upload_extension = $fileInfo['extension'];
				$allowed_extensions = array('mp4','avi');
				
				$query2 = "SELECT * FROM advs_video WHERE username='$username'";
				$results = mysqli_query($db, $query2);
				if (mysqli_num_rows($results) == 1) {
					$query = "UPDATE advs_video SET filename= '$filename' , qrcode ='$qrcode_str', approved ='P' WHERE username='$username'";
					if ($db->query($query) === TRUE) {
 				        
					} else {
				        array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
					}
					
				}else {
					$query = "INSERT INTO advs_video (username, filename , qrcode, approved )  VALUES('$username', '$filename', '$qrcode_str','P')";
					if ($db->query($query) === TRUE) {
 				        
					} else {
				        array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
					}
					
				}
				
				
				
				
				
				
            // Check if the file has a correct, expected extension
				if(in_array($upload_extension, $allowed_extensions)) {
					if(move_uploaded_file($_FILES['myvideo']['tmp_name'], $target_file)) {
									
									
						header('location: uploadComplete.php');
					}
				}
				else
					array_push($errors, "The file format is not correct, only allow mp4 and avi");
			}
			else
				array_push($errors, "Video is over size");
		}
		else
			array_push($errors, "The video dont have size");
    
		
		
	}
	
	
	
	
	
	
}






// REGISTER USER
if (isset($_POST['register_store'])) {
	
	
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);  
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $area_code = mysqli_real_escape_string($db, $_POST['area_code']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $industry = mysqli_real_escape_string($db, $_POST['industry']);
  
  $store_name = mysqli_real_escape_string($db, $_POST['store_name']);
  $store_address = mysqli_real_escape_string($db, $_POST['store_address']);
  $target_user = mysqli_real_escape_string($db, $_POST['target_user']);
  
  
  $title = mysqli_real_escape_string($db, $_POST['title']);
  
  /*
  
  $store_name="";
$store_address="";
$target_user="";

  
  */
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($first_name)) { array_push($errors, "First name is required"); }
  if (empty($last_name)) { array_push($errors, "Last name is required"); }
  if (empty($area_code)) { array_push($errors, "Area code is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($title)) { array_push($errors, "Title is required"); }  
  if (empty($password)) { array_push($errors, "Password is required"); }  
  if (empty($industry)) { array_push($errors, "Industry is required"); }  
  if (empty($store_name)) { array_push($errors, "Store name is required"); }  
  if (empty($store_address)) { array_push($errors, "Store address is required"); }  
  if (empty($target_user)) { array_push($errors, "Target user is required"); }  
  
  
  if (empty($cpassword)) { array_push($errors, "Confirm password is required"); }  
  if ($password != $cpassword) {
	array_push($errors, "The two passwords do not match");
  }
  
  //header('location: check.php?username=ronald');
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM store_users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO store_users (username, email, password,first_name, last_name,area_code, phone, title,industry, store_name, store_address, target_user) 
  			  VALUES('$username', '$email', '$password', '$first_name', '$last_name', '$area_code', '$phone', '$title', '$industry', '$store_name', '$store_address', '$target_user')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: storeuserhome.php');
  }
  
}


// SYSTEM LOGIN USER
if (isset($_POST['store_login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM store_users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: storeuserhome.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


if (isset($_GET['approvel'])) {
  $username = mysqli_real_escape_string($db, $_GET['adminuser']);
  $videoid = mysqli_real_escape_string($db, $_GET['videoid']);
  $approvel = mysqli_real_escape_string($db, $_GET['approvel']);

  if (empty($username)) {
  	header('location: adminlogin.php');
  }
  
  if (empty($videoid)) {
  	header('location: adminlogin.php');
  }
  
  if (empty($approvel)) {
  	header('location: adminlogin.php');
  }
  
  
  
  	$query = "SELECT * FROM admin_users WHERE username='$username'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
		
		$query2 = "UPDATE advs_video SET approved = '$approvel' WHERE id='$videoid'";
		if ($db->query($query2) === TRUE) {
			header('location: syshome.php');
 				        
		} else {
		  header('location: adminlogin.php');
		}
		
		
		
		
		
  	  
  	}else {
  		header('location: adminlogin.php');
  	}
  
}







if (isset($_GET['delete_adv_users'])) {
  $adminuser = mysqli_real_escape_string($db, $_GET['adminuser']);
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $action = mysqli_real_escape_string($db, $_GET['delete_adv_users']);

  if (empty($username)) {
  	header('location: sadminlogin.php');
  }
  
  if (empty($adminuser)) {
  	header('location: sadminlogin.php');
  }
  
  if (empty($action)) {
  	header('location: sadminlogin.php');
  }
  
  
  
  	$query = "SELECT * FROM admin_users WHERE username='$adminuser'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
		
		$query2 = "DELETE FROM adv_users  WHERE username='$username'";
		if ($db->query($query2) === TRUE) {
			header('location: all_function.php?tag=advuser');
 				        
		} else {
		  header('location: sadminlogin.php');
		}
		
  	  
  	}else {
  		header('location: sadminlogin.php');
  	}
  
}


if (isset($_GET['delete_store_users'])) {
  $adminuser = mysqli_real_escape_string($db, $_GET['adminuser']);
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $action = mysqli_real_escape_string($db, $_GET['delete_store_users']);

  if (empty($username)) {
  	header('location: sadminlogin.php');
  }
  
  if (empty($adminuser)) {
  	header('location: sadminlogin.php');
  }
  
  if (empty($action)) {
  	header('location: sadminlogin.php');
  }
  
  
  
  	$query = "SELECT * FROM admin_users WHERE username='$adminuser'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
		
		$query2 = "DELETE FROM store_users  WHERE username='$username'";
		if ($db->query($query2) === TRUE) {
			header('location: all_function.php?tag=storeuser');
 				        
		} else {
		  header('location: sadminlogin.php');
		}
		
  	  
  	}else {
  		header('location: sadminlogin.php');
  	}
  
}





if (isset($_POST['register_customer'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);  
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);    
  $area_code = mysqli_real_escape_string($db, $_POST['area_code']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  
  
  

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
  	
  	
	if ($db->query($query) === TRUE) {
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";	
		header('location: customerhome.php');
 		        
	} else {
	       array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
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
  	
  	
	if ($db->query($query) === TRUE) {
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";	
		header('location: customerhome.php');
 		        
	} else {
	       array_push($errors, "Error: " . $query . "<br>" . $db->error);    					
	}
	
  }
  
}



if (isset($_GET['customer_login_user'])) {
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
  	$query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: customerhome.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


if (isset($_POST['customer_login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
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
  	  header('location: customerhome.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}





// ... 

// SYSTEM LOGIN USER
if (isset($_POST['sys_login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: syshome.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//S admin login
if (isset($_POST['sadmin_login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: all_function.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
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
  	//$password = md5($password);
  	$query = "SELECT * FROM adv_users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
