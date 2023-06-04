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
$sql = "UPDATE rooms SET Light = $lightStatus WHERE Room_Name = '$room'";

if ($connection->query($sql) === TRUE) {
    echo "Light status updated successfully.";
} else {
    echo "Error updating light status: " . $connection->error;
}

// Log the event to a text file
$logMessage = "$room's Light is " . ($lightStatus == 1 ? "on" : "off") . " at " . date("d.m.y H:i") . PHP_EOL;
$logFile = "log.txt";

file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
?>