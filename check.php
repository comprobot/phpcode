<?php
session_start();
$servername = 'localhost';
$username = 'ops';
$password = '60503176';
$dbname = 'ops';
// Create connection
if(isset($_GET['username'])){




$conn = new mysqli($servername, $username, $password, $dbname);
$username1 = mysqli_real_escape_string($conn, $_GET['username']);    
    
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
        
 $sql = "SELECT * FROM adv_users WHERE username='".$username1."'";
echo $sql;
    
echo '\n';        
    
$result = $conn->query($sql);
if ($result->num_rows > 0) {    
    echo '1 results';
} else {
    echo '0 results';
}
    
echo '7';        
    
    
$conn->close();
}
?>
