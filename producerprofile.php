<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Producer Menu</title>
  <link rel="stylesheet" href="consumerhome.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.css" rel="stylesheet" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
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
    <div>
      <img src="./images/profilephoto.png">
      <h2>ProducerName</h2>
      <input type="submit" onclick="window.location.href='./producerlogin.php';" value="Log Out"
        style="margin: auto; background-color: #2196F3;color: white;border: 2px solid black;cursor: pointer;">
    </div>
    <div id="weather">
      <iframe src="//www.hava.one/widget/widget_frame?id=323777&days=4&bcolor=2196F3&hbkcolor=2196F3&w=310"
        scrolling="no" frameborder="0" style="border: 3px solid black;overflow:hidden;height:200px;width:310px;"
        allowTransparency="true"></iframe>
      <noscript><a href="http://www.hava.one">hava.one</a></noscript>
    </div>
  </div>
  <div style="display: flex; ">
    <div id="lightingcon1">
      <h1>Lighting</h1>
      <div style="margin-top: 10%;">
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
            $sql = "SELECT Room_Name, Light FROM rooms";
            $result = $conn->query($sql);

            // Display the temperature dashboard
            if ($result && $result->num_rows > 0) {
              echo '<div class="table-responsive">';
              echo '<table class="table room-temperature-table">';
              echo '<thead>';
              echo '</thead>';
              echo '<tbody>';

              // Iterate over the rows and display the data
              while ($row = $result->fetch_assoc()) {
                $roomName = $row['Room_Name'];
                $currentLight = $row['Light'];
                $lightStatus = ($currentLight == 1) ? 'On' : 'Off';

                echo '<tr>';
                echo '<th>' . $roomName . '</th>';
                echo '<th>' . $lightStatus . '</th>';
                echo '</tr>';
              }

              echo '</tbody>';
              echo '</table>';
              echo '</div>';
            } else {
              echo '<div class="text-center">No data available</div>';
            }

            ?>

          </div>
      </div>
      <h2 style="text-decoration-line: underline;margin-top: 4rem;">Time the lights are switched: </h2>
      <div style="justify-content: space-between;">
        <h3 style=" text-align: center;">
          <h5>
            <?php echo file_get_contents('log.txt'); ?>
          </h5>
        </h3>
      </div>
    </div>
    <div id="eleccon1">
      <h1>Electronic Devices</h1>
      <div style="margin-top: 10%;">
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
            $sql = "SELECT elecdevices, status FROM electronicdevices";
            $result = $conn->query($sql);

            // Display the temperature dashboard
            if ($result && $result->num_rows > 0) {
              echo '<div class="table-responsive">';
              echo '<table class="table room-temperature-table">';
              echo '<thead>';
              echo '</thead>';
              echo '<tbody>';

              // Iterate over the rows and display the data
              while ($row = $result->fetch_assoc()) {
                $roomName = $row['elecdevices'];
                $currentLight = $row['status'];
                $lightStatus = ($currentLight == 1) ? 'On' : 'Off';

                echo '<tr>';
                echo '<th>' . $roomName . '</th>';
                echo '<th>' . $lightStatus . '</th>';
                echo '</tr>';
              }

              echo '</tbody>';
              echo '</table>';
              echo '</div>';
            } else {
              echo '<div class="text-center">No data available</div>';
            }

            ?>

          </div>
      </div>
      <h2 style="text-decoration-line: underline;margin-top: 4rem;">Time the devices' status are switched: </h2>
      <div style="justify-content: space-between;">
        <h3 style=" text-align: center;">
          <h4>
            <?php echo file_get_contents('logdevice.txt'); ?>
          </h4>
        </h3>
      </div>
    </div>
  </div>
  <div style="display: flex;">
    <div id="watercon2">
      <h1 style="margin-top: -1rem;margin-bottom: 1rem;">
        Water Consumption
      </h1>
      <div id="consumption-container">
        <div class="year-stats">
          <div class="month-group">
            <div class="bar h-25"></div>
            <p class="month">Jan</p>
          </div>
          <div class="month-group">
            <div class="bar h-50"></div>
            <p class="month">Feb</p>
          </div>
          <div class="month-group">
            <div class="bar h-25"></div>
            <p class="month">Mar</p>
          </div>
          <div class="month-group">
            <div class="bar h-100"></div>
            <p class="month">Apr</p>
          </div>
          <div class="month-group selected">
            <div class="bar h-75"></div>
            <p class="month">May</p>
          </div>
          <div class="month-group">
            <div class="bar h-25"></div>
            <p class="month">Jun</p>
          </div>
          <div class="month-group">
            <div class="bar h-100"></div>
            <p class="month">Jul</p>
          </div>
        </div>
        <div class="info">
          <p>Most consumed months <br /><span>April&July</span></p>
          <p>Total amount of electricity consumed <span><br />122 kWh</span></p>
          <p>Monthly bill <span>$92</span></p>
        </div>
      </div>
    </div>
    <div id="ecocon1">
      <h1 style="margin-top: -1rem;margin-bottom: 1rem;">
        Electricity Consumption
      </h1>
      <div id="consumption-container">
        <div class="year-stats">
          <div class="month-group">
            <div class="bar h-100"></div>
            <p class="month">Jan</p>
          </div>
          <div class="month-group">
            <div class="bar h-50"></div>
            <p class="month">Feb</p>
          </div>
          <div class="month-group">
            <div class="bar h-75"></div>
            <p class="month">Mar</p>
          </div>
          <div class="month-group">
            <div class="bar h-25"></div>
            <p class="month">Apr</p>
          </div>
          <div class="month-group selected">
            <div class="bar h-100"></div>
            <p class="month">May</p>
          </div>
          <div class="month-group">
            <div class="bar h-50"></div>
            <p class="month">Jun</p>
          </div>
          <div class="month-group">
            <div class="bar h-75"></div>
            <p class="month">Jul</p>
          </div>
        </div>
        <div class="info">
          <p>Most consumed months <br /><span>January&May</span></p>
          <p>Total amount of electricity consumed <span><br />26m³</span></p>
          <p>Monthly bill <span>$102</span></p>
        </div>
      </div>
    </div>

  </div>
  <div style="display: flex;">
    <div id="musiccon2">
      <h1>Music</h1>
      <div class="mb-3">

        <label for="formFileSm" class="form-label" style="font-size: large;font-weight: bolder;">Change
          Playlist:</label>
        <input style="width: 100%;" class="form-control form-control-sm" id="formFileSm" type="file">
      </div>
      <label for="musicDataList" class="form-label" style="font-size: large;font-weight: bolder;">Music Mode:</label>
      <input class="form-control" list="musicOptions" id="musicDataList" placeholder="Modes">
      <datalist id="musicOptions">
        <option value="Normal">
        <option value="Bass Boosted">
        <option value="Chill">
        <option value="Party">
      </datalist>
      <div style="display: flex;margin-bottom: 5%;">
        <h2 style="text-align: left;">Volume:</h2>
        <input type="range" value="0">
      </div>
      <h3>Recently opened playlist: playlist5.mp3 <br>Recently selected music mode: Chill</h3>
    </div>
    <div id="aircon2">
      <h1>Air Conditioner</h1>
      <div style="margin-top: 10%;">
        <h2 style="text-align: center;">Current Air Conditioner Settings</h2>
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
            $sql = "SELECT Room_Name, airCon FROM rooms";
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
                $currentTemperature = $row['airCon'];

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
    </div>
  </div>
  <div style="display: flex;">
    <div id="cctvcon1">
      <h1>Camera States</h1>
      <div style="display: flex;margin-top: 5%;margin-bottom: 5%;">
        <h2>CAM1:</h2>
        <h3 style="margin-top: 1rem;">Recording</h3>
        <i class='fa fa-video-camera' style="margin-top: 1.25rem;margin-left: 1rem;color: red;"></i>
      </div>
      <div style="display: flex;margin-top: 5%;margin-bottom: 5%;">
        <h2>CAM2:</h2>
        <h3 style="margin-top: 1rem;">Recording</h3>
        <i class='fa fa-video-camera' style="margin-top: 1.25rem;margin-left: 1rem;color: red;"></i>
      </div>
      <div style="display: flex;margin-top: 5%;margin-bottom: 5%;">
        <h2>CAM3:</h2>
        <h3 style="margin-top: 1rem;">Recording</h3>
        <i class='fa fa-video-camera' style="margin-top: 1.25rem;margin-left: 1rem;color: red;"></i>
      </div>
      <div style="display: flex;margin-top: 5%;margin-bottom: 5%;">
        <h2>CAM4:</h2>
        <h3 style="margin-top: 1rem;">Not recording</h3>
        <i class='fa fa-video-camera' style="margin-top: 1.25rem;margin-left: 1rem;color: #dark grey;"></i>
      </div>
    </div>
    <div id="doorcon2">
      <h1>Door</h1>
      <div>
        <h2>Time when the door was last knocked:</h2>
        <h3 style="margin-top: 1rem; text-align: center;">17.04.2023 || 23.31</h3>
      </div>
      <div>
        <h2>Last time the door was opened:</h2>
        <h3 style="margin-top: 1rem;text-align: center;">17.04.2023 || 19.57</h3>
      </div>
      <div>
        <h2>Last time the door was locked:</h2>
        <h3 style="margin-top: 1rem;text-align: center;">17.04.2023 || 20.34</h3>
      </div>
      <div style="display: flex;margin-left: 10%;margin-top: 5%;">
        <h2>Camera Status</h2>
        <h3 style="margin-top: 1rem;text-align: center;">Recording</h3>
        <i class='fa fa-video-camera' style="margin-top: 1.25rem;margin-left: 1rem;text-align: center;color: red;"></i>
      </div>
    </div>
  </div>
  <script src="consumerhome.js"></script>
</body>

</html>