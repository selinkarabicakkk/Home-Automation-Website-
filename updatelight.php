<?php
// Get the room name and lights switch value from the AJAX request
$roomName = $_POST['room'];
$lightsSwitch = $_POST['lightsSwitch'];

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

// Update the isLightsOn value in the database
$stmt = $connection->prepare("UPDATE rooms SET Light = ? WHERE Room_Name = ?");
$stmt->bind_param("is", $lightsSwitch, $roomName);

if ($stmt->execute()) {
    $response = array('status' => 'success', 'message' => "Lights in $roomName switched successfully");
    echo json_encode($response);
} else {
    $response = array('status' => 'error', 'message' => "Error updating lights: " . $stmt->error);
    echo json_encode($response);
}

// // Close the database connection
// $stmt->close();
// $connection->close();
?>