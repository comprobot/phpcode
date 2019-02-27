<?php
session_start();
$servername = 'localhost';
$username = 'ops';
$password = '60503176';
$dbname = 'ops';
// Create connection
if(isset($_GET['username'])){
echo '1';
$username1 = mysqli_real_escape_string($db, $_GET['username']);
echo '2';

$conn = new mysqli($servername, $username, $password, $dbname);
echo '3';    
    
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo '4';    
        
 $sql = "SELECT * FROM adv_users WHERE username='$username'";

    
echo '5';        
    
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo " 1 results"
} else {
    echo "0 results";
}
    
echo '7';        
    
    
$conn->close();
}
?>
