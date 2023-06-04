<?php
// Get the room name from the AJAX request
$roomName = $_GET['room'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeautomationsystem";

// Create a connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch the isLightsOn value from the database
$sql = "SELECT Light FROM rooms WHERE Room_Name = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $roomName);

if ($stmt->execute()) {
    $stmt->bind_result($isLightsOn);
    $stmt->fetch();
    echo $isLightsOn;
} else {
    echo "Error fetching lights: " . $stmt->error;
}


// Close the database connection
// $stmt->close();
// $connection->close();
?>