<?php
// Get the selected room and light status from the form submission
$room = $_POST['room'];
$lightStatus = $_POST['light'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeautomationsystem";

$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Update the light status in the database
$sql = "UPDATE electronicdevices SET status = $lightStatus WHERE elecdevices = '$room'";

if ($connection->query($sql) === TRUE) {
    echo "Device status updated successfully.";
} else {
    echo "Error updating device status: " . $connection->error;
}

// Log the event to a text file
$logMessage = "$room is " . ($lightStatus == 1 ? "on" : "off") . " at " . date("d.m.y H:i") . PHP_EOL;
$logFile = "logdevice.txt";

file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
header("Location: consumerprofile.php");
exit;

?>