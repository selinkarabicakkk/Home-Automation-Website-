<?php

session_start(); //Start new or resume existing session 
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

if (isset($_POST['submit'])) {
  // Get the selected room and temperature values from the form
  $room = $_POST['room'];
  $temperature = $_POST['temperature'];
  // Update the temperature value in the database
  $sql = "UPDATE rooms SET airCon = $temperature WHERE Room_Name = '$room'";
  if ($connection->query($sql) === true) {
    echo '<div class="container mt-3"><div class="alert alert-success">Temperature updated successfully!</div></div>';
  } else {
    echo '<div class="container mt-3"><div class="alert alert-danger">Error updating temperature: ' . $connection->error . '</div></div>';
  }
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Get the room name and temperature value from the form
  $roomName = $_POST['room'];
  $temperature = $_POST['temperature'];

  // Prepare and execute the SQL query to update the temperature
  $sqllight = "SELECT Light FROM rooms WHERE Room_Name = '$roomName'";
  $sqltemp = "UPDATE rooms SET Temperature = $temperature WHERE Room_Name = '$roomName'";

  if ($connection->query($sql) === TRUE) {
    echo "Temperature updated successfully";
  } else {
    echo "Error updating temperature: " . $connection->error;
  }

}

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

}


// DATAYI CEKTIGIN VE GOSTERDIGIN YER
function getRoomTemperature($roomName)
{
  global $connection; // Assuming you have the database connection variable defined globally

  // Query to retrieve the kitchen's room temperature


  $query = "SELECT Temperature FROM rooms WHERE Room_Name = '$roomName' "; //
  $result = $connection->query($query);

  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row['Temperature'];
  } else {
    return "N/A"; // Return a default value if the temperature is not available or the query fails
  }
}


if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  // $currentValue = $row["light"];

  // // Toggle the value of light
  // $newLightsValue = !$currentValue;

  // Update the light value in the database
  $updateSql = "UPDATE rooms SET light = 1 WHERE Room_Name = 'LivingRoom'";
  if ($connection->query($updateSql) === TRUE) {
    echo "Lights in $roomName switched successfully";
  } else {
    echo "Error updating lights: " . $connection->error;
  }
}


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    function updateLights(roomName) {
      var lightsSwitch = $('#lightsSwitch');
      var newLightsValue = lightsSwitch.is(':checked') ? 0 : 1;

      $.ajax({
        url: 'updatelight.php',
        type: 'POST',
        data: { room: roomName, lightsSwitch: newLightsValue },
        success: function (response) {
          console.log(response);
          // Update the UI if necessary
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    }

    $('.slider').on('click', function () {
      var room = 'Kitchen'; // Change this to the appropriate room
      updateLights(room);
    });

    // Fetch the initial isLightsOn value and update the checkbox state
    $.ajax({
      url: 'setlight.php',
      type: 'GET',
      data: { room: 'Kitchen' }, // Change this to the appropriate room
      success: function (response) {
        var isLightsOn = parseInt(response);
        var lightsSwitch = $('#lightsSwitch');
        lightsSwitch.prop('checked', isLightsOn == 1); // Set checkbox state
        lightsSwitch.on('change', function () {
          updateLights('Kitchen');
        });
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  });
</script>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Home Automation</title>
  <link rel="stylesheet" href="consumerhome.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.css" rel="stylesheet" />


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>

  <div id="headbar">
    <div id="clockdate">
      <div class="clockdate-wrapper">
        <div id="clock"></div>
        <div id="date"></div>
      </div>
    </div>
    <div style="text-align: center">
      <img src="./images/profilephoto.png">
      <h2>
        Username
      </h2>
      <input type="submit" onclick="window.location.href='./consumerlogin.php';" value="Log Out"
        style="margin: auto; background-color: #2196F3;color: white;border: 2px solid black;cursor: pointer;">
    </div>
    <div id="weather">
      <iframe src="//www.hava.one/widget/widget_frame?id=323777&days=4&bcolor=2196F3&hbkcolor=2196F3&w=310"
        scrolling="no" frameborder="0" style="border: 3px solid black;overflow:hidden;height:200px;width:310px;"
        allowTransparency="true"></iframe>
      <noscript><a href="http://www.hava.one">hava.one</a></noscript>
    </div>
  </div>
  <h1 style="font-size: 3rem;text-decoration: none;">WELCOME! HOME SWEET HOME</h1>
  <div style="display: flex;">
    <div id="emergencycon1">
      <h1>Emergency Calls</h1>
      <p>You can make emergency calls.</p>
      <div style="display: flex;justify-content: space-between;margin-top: 1rem;">
        <h2 style="margin-left: 3rem;">Police</h2>
        <button class="button-82-pushable" role="button">
          <span class="button-82-shadow"></span>
          <span class="button-82-edge"></span>
          <span class="button-82-front text">
            Call
          </span>
        </button>

      </div>
      <div style="display: flex;justify-content: space-between;margin-top: 1rem;margin-bottom: 1rem;">
        <h2 style="margin-left: 3rem;">Ambulance</h2>
        <button class="button-82-pushable" role="button">
          <span class="button-82-shadow"></span>
          <span class="button-82-edge"></span>
          <span class="button-82-front text">
            Call
          </span>
        </button>

      </div>
      <div style="display: flex;justify-content: space-between;">
        <h2 style="margin-left: 3rem;">Fire Station</h2>
        <button class="button-82-pushable" role="button">
          <span class="button-82-shadow"></span>
          <span class="button-82-edge"></span>
          <span class="button-82-front text">
            Call
          </span>
        </button>

      </div>
    </div>
    <div id="gascon2">
      <h1>Gas Cooker</h1>
      <p>You can turn gas cookers on or off.</p>
      <div style="display: flex;">
        <h2 style="text-align: left;">Gas Cooker 1</h2>
        <input type="range" value="0">
      </div>
      <div style="display: flex;">
        <h2 style="text-align: left;">Gas Cooker 2</h2>
        <input type="range" value="0">
      </div>
      <div style="display: flex;">
        <h2 style="text-align: left;">Gas Cooker 3</h2>
        <input type="range" value="0">
      </div>
      <div style="display: flex;">
        <h2 style="text-align: left;">Gas Cooker 4</h2>
        <input type="range" value="0">
      </div>
    </div>

  </div>

  </div>
  <div style="display: flex;">
    <div id="lightingcon1">
      <h1>Lighting</h1>
      <p>You can control the lighting system.</p>
      <div id="rooms">
        <h2 style="margin-top: 1rem;">Kitchen</h2>
        <main>
          <input class="l" type="checkbox">

        </main>
      </div>
      <form id="lightForm" action="consumerprofile.php" method="POST">

        <div id="rooms">
          <h2>Toggle Lights</h2>
          <div class="switch">
            <input type="checkbox" id="lightsSwitch" name="lightsSwitch">
            <label class="slider round" for="lightsSwitch"></label>
          </div>
          <!-- <h2 style="margin-top: 1rem;">Living Room</h2>
            <form method="POST" action="">
            <input type="checkbox" id="lightsSwitch" name="lightsSwitch">
            <label class="slider round" for="lightsSwitch"></label> -->
          <!-- <input type="hidden" name="room" value="Kitchen">
            <input type="checkbox" id="lightsSwitch" name="lightsSwitch" onchange="this.form.submit()"> -->
          <!-- <label class="slider round" for="lightsSwitch"></label> -->
      </form>
    </div>
    <div id="rooms">
      <h2 style="margin-top: 1rem;">Bathroom</h2>
      <main>
        <input class="l" type="checkbox">
      </main>
    </div>
    <div id="rooms">
      <h2 style="margin-top: 1rem;">Bedroom</h2>
      <main>
        <input class="l" type="checkbox">
      </main>
    </div>
    </form>
  </div>
  <div id="aircon2">
    <h1>Air Conditioner</h1>
    <p style="margin-bottom: 10px;">You can decrease or increase the temperature of the house by controlling the air
      conditioner from here.</p>
    <title>Update Room Temperature</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
      <div class="container">
        <form method="POST" action="">
          <div class="form-group">
            <label for="room">Select Room:</label>
            <select class="form-control" name="room" id="room">
              <option value="Kitchen">Kitchen</option>
              <option value="Livingroom">Livingroom</option>
              <option value="Bedroom">Bedroom</option>
            </select>
          </div>
          <div class="form-group">
            <label for="temperature">Enter Temperature:</label>
            <input type="number" class="form-control" name="temperature" id="temperature">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

      </div>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <style>
        .room-temperature-table {
          width: 100%;
          background-color: rgba(255, 255, 255, 0.7);
          /* Transparent white background */
          margin-top: 5%;
        }

        .room-temperature-table td {
          text-align: center;
          vertical-align: middle;
        }
      </style>
      </head>

      <body>
        <div class="container">


          <?php
          // Fetch the current temperature for all rooms from the database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "homeautomationsystem";

          // Create a connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Fetch the current temperature for all rooms
          $sql = "SELECT Room_Name, Temperature FROM rooms";
          $result = $conn->query($sql);

          // Display the temperature dashboard
          if ($result && $result->num_rows > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table room-temperature-table">';
            echo '<thead>';
            // echo '<tr>';
            // echo '<th>Room</th>';
            // echo '<th>Current Temperature</th>';
            // echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Iterate over the rows and display the data
            while ($row = $result->fetch_assoc()) {
              $roomName = $row['Room_Name'];
              $currentTemperature = $row['Temperature'];

              echo '<tr>';
              echo '<th>' . $roomName . '</th>';
              echo '<th>' . $currentTemperature . '°C</th>';
              echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
          } else {
            echo '<div class="text-center">No data available</div>';
          }

          // Close the database connection
          $conn->close();
          ?>

        </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</div>
</div>
<div style="display: flex;">
  <div id="eleccon1">
    <h1>Electronic Devices</h1>
    <p>You can control all electronic devices in the house from here.</p>
    <div id="devices" style="margin-bottom: 3%;">
      <h2>Television</h2>
      <label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
      </label>
    </div>
    <div id="devices" style="margin-bottom: 3%;">
      <h2>Kettle</h2>
      <label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
      </label>
    </div>
    <div id="devices" style="margin-bottom: 3%;">
      <h2>Dishwasher</h2>
      <label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
      </label>
    </div>
    <div id="devices" style="margin-bottom: 3%;">
      <h2>Oven</h2>
      <label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
      </label>
    </div>
    <div id="devices" style="margin-bottom: 3%;">
      <h2>Dishwasher</h2>
      <label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
      </label>
    </div>
    <div id="devices" style="margin-bottom: 3%;">
      <h2>Robotic Vacuum Cleaner</h2>
      <label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
      </label>
    </div>

  </div>
  <div id="musiccon2">
    <h1>Music</h1>
    <p>You can load the playlist you want and listen to the song in the mode you want.</p>
    <h2 style="text-align: left;margin-top: 1rem;text-decoration: underline;">Playlist:</h2>
    <div class='file-input'>
      <input type='file'>
      <span class='button'>Choose</span>
      <span class='label' data-js-label>No file selected</label>
    </div>
    <div style="display: flex;margin-top: 5%;">
      <h2 style="text-align: left;text-decoration: underline;">Volume:</h2>
      <input type="range" value="0">
    </div>
    <div>
      <h2 style="text-align: left;margin-top: 1rem;text-decoration: underline;">Choose Music Mode:</h2>
      <form>
        <div style="display: flex; font-weight: bold;justify-content: space-between;">
          <label for="normal" style="margin-left: 1rem;">Normal</label>
          <input type="radio" id="modes" name="musicmodes" value="Normal" style="box-shadow: none ;">
        </div>
        <div style="display: flex; font-weight: bold;justify-content: space-between;">
          <label for="bassboosted" style="margin-left: 1rem;">Bass Boosted</label>
          <input type="radio" id="modes" name="musicmodes" value="Bass Boosted" style="box-shadow: none ;">
        </div>
        <div style="display: flex;font-weight: bold;justify-content: space-between;">
          <label for="chill" style="margin-left: 1rem;">Chill</label>
          <input type="radio" id="modes" name="musicmodes" value="Chill" style="box-shadow: none ;">
        </div>
        <div style="display: flex; font-weight: bold;justify-content: space-between;">
          <label for="party" style="margin-left: 1rem;">Party</label>
          <input type="radio" id="modes" name="musicmodes" value="Party" style="box-shadow: none ;">
        </div>
      </form>
    </div>
  </div>
</div>
<div style="display: flex;">
  <div id="cctvcon1">
    <h1>CCTV</h1>
    <p style="margin: 10px;">You can watch the camera recordings here.</p>
    <div style="margin-bottom: 30px;">
      <label for="recordingdate">Select a date:</label>
      <input type="date" name="recordingdate" id="recordingdate">
    </div>
    <form style="margin-bottom: 30px;">
      <label for="appt">Select a time:</label>
      <input type="time" id="appt" name="appt">
    </form>

    <video id="videos" controls autoplay="autoplay" loop="true">
      <source src="./videos/cctv.mp4">
    </video>
  </div>
  <div id="doorcon2">
    <h1>Door</h1>
    <p>You can control the door lock and watch the recording of the last door knock.</p>
    <div id="rooms" style="margin-bottom: 30px;margin-top: 10px;">
      <h2>Lock</h2>
      <label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
      </label>
    </div>
    <p style="border: 3px solid black;">Date and time when the door was last knocked: <br> 18/04/2023 <i
        style="font-size:24px" class="fa">&#xf073;</i> &nbsp; &nbsp; &nbsp;&nbsp; 04:23 <i style="font-size:24px"
        class="fa">&#xf017;</i></p>
    <video id="videos" controls autoplay="autoplay" loop="true" style="border: 3px solid black;">
      <source src="./videos/door.mp4">
    </video>
  </div>
</div>
<div style="display: flex;width: 90%;">
  <div id="ecocon1">
    <h1>
      Electricity Consumption
    </h1>
    <p>You can see the total electricity consumed per month and how much is consumed in which rooms.</p>
    <figure class="pie-chart" style="border: 3px solid black;">
      <h2 style="font-size:medium;">Monthly electricity consumption by room</h2>
      <figcaption>
        Kitchen 38 kWh<span style="color:#4e79a7"></span><br>
        Bedroom 23 kWh<span style="color:#f28e2c"></span><br>
        Bathroom 16 kWh<span style="color:#e15759"></span><br>
        Living Room 45 kWh<span style="color:#76b7b2"></span>
      </figcaption>
    </figure>
    <p>You consumed 122 kWh electricity in total this month.</p>
  </div>
  <div id="watercon2">
    <h1>
      Water Consumption
    </h1>
    <p>You can see the total water consumed per month and how much is consumed in which rooms.</p>
    <figure class="pie-chart" style="background:
      radial-gradient(
        circle closest-side,
        transparent 66%,
        white 0
      ),
      conic-gradient(
        #4e79a7 0,
        #4e79a7 38.5%,
        #e15759 0,
        #e15759 100%
    );border: 3px solid black;">
      <h2 style="font-size:medium;">Monthly water consumption by room</h2>
      <figcaption>
        Kitchen 10m³<span style="color:#4e79a7"></span><br>
        Bathroom 16m³<span style="color:#e15759"></span>
      </figcaption>
    </figure>
    <p>You consumed 26m³ water in total this month.</p>
  </div>
</div>
<h1 style="text-decoration: none;">Contact Us</h1>
<ul class="wrapper" style="margin-left: 40%;margin-bottom: 2%;">
  <li class="icon facebook">
    <span class="tooltip">Facebook</span>
    <span><i class="fab fa-facebook-f"></i></span>
  </li>
  <li class="icon twitter">
    <span class="tooltip">Twitter</span>
    <span><i class="fab fa-twitter"></i></span>
  </li>
  <li class="icon instagram">
    <span class="tooltip">Instagram</span>
    <span><i class="fab fa-instagram"></i></span>
  </li>
  <li class="icon youtube">
    <span class="tooltip">Youtube</span>
    <span><i class="fab fa-youtube"></i></span>
  </li>
</ul>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.js"></script>
<script src="consumerhome.js"></script>
</body>

</html>