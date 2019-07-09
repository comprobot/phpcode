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
// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'registration');
$db = new mysqli($servername, $dbusername, $dbpassword, $dbname);
$query2 = "SELECT * FROM  system_settings";
$results = mysqli_query($db, $query2);
$row = mysqli_fetch_array($results) ;

echo  intval($row[0]['adv_pool_radio']);
echo '<br/>';
echo   intval($row[0]['adv_access_point']);






?>
