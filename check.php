<?php
session_start();
$servername = 'localhost';
$username = 'ops';
$password = '60503176';
$dbname = 'ops';
// Create connection
if(isset($_GET['username'])){
$username1 = mysqli_real_escape_string($db, $_POST['username']);


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `adb_users` WHERE = '$username1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo " 1 results"
} else {
    echo "0 results";
}
$conn->close();
}
?>
