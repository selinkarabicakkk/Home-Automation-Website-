<?php
$host = 'localhost'; // Hostname of the MySQL server
$dbname = 'homeautomationsystem'; // Name of your MySQL database
$username = 'root'; // MySQL username
$password = ''; // MySQL password

// Create a connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Set character set to UTF-8 (optional)
$connection->set_charset("utf8");

$query = "SELECT * FROM `rooms`;";
$result = $connection->query($query);



// Check for query errors
if (!$result) {
    die("Query failed: " . $connection->error);
}
// Fetch and display the data
while ($row = $result->fetch_assoc()) {
    // Access individual columns by their names
    $roomName = $row['Room_Name'];
    $roomTemperature = $row['Temperature'];
    $roomLight = $row['Light'];
    $roomCamera = $row['Camera'];
    $aircon = $row['airCon'];

    // Echo the data or use it as desired
    echo "Room Name: " . $roomName . "<br>";
    echo "Room Temperature: " . $roomTemperature . "<br>";
    echo "Room Light: " . $roomLight . "<br>";
    echo "Room Camera: " . $roomCamera . "<br>";
    echo "Room Camera: " . $aircon . "<br>";
}

function getRoomTemperature($roomName) {
    global $connection; // Assuming you have the database connection variable defined globally

    // Query to retrieve the kitchen's room temperature
    $query = "SELECT room_temperature FROM rooms WHERE room_name = $roomName";
    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['room_temperature'];
    } else {
        return "N/A"; // Return a default value if the temperature is not available or the query fails
    }
}
// Close the database connection
$connection->close();

?>
