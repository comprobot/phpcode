<?php

//$_GET["name"]


$servername = $_GET["serverip"];
$username = $_GET["username"];
$password = $_GET["userpass"];
$dbname = $_GET["dbname"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `usage` SET `appusage`=5000";
$result = $conn->query($sql);

if (!$result ) {
  echo "Update record failed: (" . $conn->errno . ") " . $conn->error;
} 
$conn->close();
?>