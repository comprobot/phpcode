<?php
header('Content-Type: text/plain');
$servername = 'localhost';
$dbusername = 'ops';
$dbpassword = '60503176';
$dbname = 'ops';
// Create connection
$db = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT filename, qrcode FROM advs_video where approved = 'T' ";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["filename"].','. $row["qrcode"]." \n ";
    }
} else {
    echo "0 results";
}
$db->close();
?>
