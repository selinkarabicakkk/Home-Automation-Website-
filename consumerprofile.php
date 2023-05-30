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
    // echo "Room Name: " . $roomName . "<br>";
    // echo "Room Temperature: " . $roomTemperature . "<br>";
    // echo "Room Light: " . $roomLight . "<br>";
    // echo "Room Camera: " . $roomCamera . "<br>";
    // echo "Room Camera: " . $aircon . "<br>";
    // echo "<script>console.log('Debug Objects: " . $roomName . "' );</script>";
}


// // Step 2: Retrieve user input
// $roomName = $_POST['roomName'];
// // Step 3: Validate and sanitize user input (example)
// $roomName = mysqli_real_escape_string($connection, $roomName);
// // Step 4: Prepare SQL statement
// $sql = "INSERT INTO rooms (room_name) VALUES ('$roomName')";
// // Step 5: Execute SQL statement
// if (mysqli_query($connection, $sql)) {
//   echo "Data stored successfully!";
// } else {
//   echo "Error: " . mysqli_error($connection);
// }


 // DATAYI CEKTIGIN VE GOSTERDIGIN YER
function getRoomTemperature($roomName) {
    global $connection; // Assuming you have the database connection variable defined globally

    // Query to retrieve the kitchen's room temperature

    
    $query = "SELECT Temperature FROM rooms WHERE Room_Name = '$roomName' ";   //
    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Temperature'];
    } else {
        return "N/A"; // Return a default value if the temperature is not available or the query fails
    }
}


function setRoomTemperature($roomName, $newTemp) { 
  global $connection; // Assuming you have the database connection variable defined globally

  // Query to update the kitchen's room temperature
  
  $query = "UPDATE rooms SET Temperature = '$newTemp' WHERE Room_Name = '$roomName' ";   
  $result = $connection->query($query);

  if ($result && $result->num_rows > 0) {
      echo "Success";
      //$row = $result->fetch_assoc();
      //return $row['Temperature'];
  } else {
      //return "N/A"; // Return a default value if the temperature is not available or the query fails
  }
}

function setLighting($roomName) {
  global $connection; // Assuming you have the database connection variable defined globally
  
  $query ="UPDATE rooms SET Light = CASE WHEN Light = '1' THEN '0' WHEN Light = '0' THEN '1' END WHERE Room_Name = '$roomName'";   //
  $result = $connection->query($query);

}
?>

    <!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Home Automation</title>
    <link rel="stylesheet" href="consumerhome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.css" rel="stylesheet" />


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>

    <div id = "headbar">
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
            <input type="submit" onclick="window.location.href='./consumerlogin.php';" value="Log Out" style="margin: auto; background-color: #2196F3;color: white;border: 2px solid black;cursor: pointer;">
        </div>
        <div id="weather">
            <iframe src="//www.hava.one/widget/widget_frame?id=323777&days=4&bcolor=2196F3&hbkcolor=2196F3&w=310" scrolling="no" frameborder="0" style="border: 3px solid black;overflow:hidden;height:200px;width:310px;" allowTransparency="true"></iframe>
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
        <div style="display: flex;justify-content: space-between;margin-top: 1rem;margin-bottom: 1rem;" >
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
    <div id="lightingcon1" >
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
            <h2 style="margin-top: 1rem;">Living Room</h2>
            <main>
            <input class="l" type="checkbox" id="lightCheckbox" type="checkbox" onchange="<?php echo setLighting("LivingRoom"); ?>"> 

              <!-- <span></span> -->
            </main>
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
        <p style="margin-bottom: 10px;">You can decrease or increase the temperature of the house by controlling the air conditioner from here.</p>
        <div class="frame" style="margin-left: 1rem;margin-top: 1rem;margin-bottom: 1rem;">
        
            <div id="slider" class="rslider"></div>
            <div class="thermostat">
              
                <div class="ring">
                  
                    <div class="bottom_overlay">
                      
                    </div>
                </div>
                <div class="control">
                  
                    <div class="temp_outside"><span><?php echo getRoomTemperature("Kitchen"); ?></span> </div>
                    
                    <div class="temp_room"><span>°</span></div>
                    <div class="room">Home</div>
                </div>
                
            </div>
        </div>
    </div>
   </div>
   <div style="display: flex;">
    <div id="eleccon1" >
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
    <div id="cctvcon1" >
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
    <div id="doorcon2" >
        <h1>Door</h1>
        <p>You can control the door lock and watch the recording of the last door knock.</p>
        <div id="rooms" style="margin-bottom: 30px;margin-top: 10px;">
            <h2>Lock</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
        <p style="border: 3px solid black;">Date and time when the door was last knocked: <br> 18/04/2023 <i style="font-size:24px" class="fa">&#xf073;</i> &nbsp; &nbsp; &nbsp;&nbsp; 04:23 <i style="font-size:24px" class="fa">&#xf017;</i></p>
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
      <figure class="pie-chart" style="border: 3px solid black;" >
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
    <ul class="wrapper" style="margin-left: 40%;margin-bottom: 2%;" >
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
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                                    
<script src="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.js"></script>
    <script src="consumerhome.js"></script>
</body>
</html>


