<?php
$servername = $_GET["serverip"];
$username = $_GET["username"];
$password = $_GET["userpass"];
$dbname = $_GET["dbname"];

$appusagenum = $_GET['appusagenum'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$insertsql = "UPDATE `usage` SET dmt = '".$dmtstr."' ,appusage = ".$numberOfUsage." where email = '".$row["email"]."'";
    

$sql = "SELECT email, appkey, appsecret, appusage,dmt FROM `usage` order by  dmt asc ,appusage desc  limit 1";
$updatesql = "";

$result = $conn->query($sql);
$numberOfUsage = 0 ;

$email = "";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {    
    
    $numberOfUsage  = intval($row["appusage"]) -  intval($appusagenum);
    
    
$dmtstr= $new.date('Y-m-d H:i:s');
    
    $updatesql = "UPDATE `usage` SET dmt = '".$dmtstr."' ,appusage = ".$numberOfUsage." where email = '".$row["email"]."'";
    
         echo $row["appkey"]. "," . $row["appsecret"];
         echo "\n";
    
        //echo "appkey: " . $row["appkey"]. " - appsecret: " . $row["appsecret"]. " " . $row["appusage"]. " ". $row["email"]."  ".$row["dmt"]. "<br>";
    }
} else {
    echo "error";
}

//echo $updatesql ;

$result2 = $conn->query( $updatesql);

if (!$result2) {
 // echo "Update record failed: (" . $conn->errno . ") " . $conn->error;
} 



$conn->close();
?>