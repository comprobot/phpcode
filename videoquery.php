<?php
$servername = 'localhost';
$username = 'ops'
$passwordc = '60503176';
$dbname = 'ops';
// Create connection
$conn = new mysqli($servername, $username, $passwordc, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT filename, qrcode FROM advs_video";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["filename"].','. $row["qrcode"].'\n';
    }
} else {
    echo "0 results";
}
$conn->close();
?>
