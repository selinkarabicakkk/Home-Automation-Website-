
<?php

session_start(); //Start new or resume existing session 

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

  <div>
  <button>
    <?php
    echo "<a href='consumerlogout.php' style='color:black; background-color:#b1cbbb; border:1px solid red; padding:5px 5px;'> LOG OUT</a>";  //kullanıcı çıkış yapmak isteyince bu butona basacak
    ?>
  </button>
  </div>
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
        </div>
        <div id="weather">
            <iframe src="//www.hava.one/widget/widget_frame?id=323777&days=4&bcolor=2196F3&hbkcolor=2196F3&w=310" scrolling="no" frameborder="0" style="border: 3px solid black;overflow:hidden;height:200px;width:310px;" allowTransparency="true"></iframe>
            <noscript><a href="http://www.hava.one">hava.one</a></noscript>
        </div>
    </div>  
    <h1 style="font-size: 3rem;">WELCOME! HOME SWEET HOME</h1>
    <div class="wrap" style="margin-top:+30px">
        <div class="search">
           <input type="text" class="searchTerm" placeholder="What are you looking for?">
           <button type="submit" class="searchButton">
             <i class="fa fa-search"></i>
          </button>
        </div>
     </div>
   <div id="rooms">
    <div id="con1" >
        <h1>Lighting</h1>
        <p>You can control the lighting system.</p>
        <div id="rooms">
            <h2>Kitchen</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
        <div id="rooms">
            <h2>Living Room</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
        <div id="rooms">
            <h2>Bathroom</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
        <div id="rooms">
            <h2>Bedroom</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
    </div>
    <div id="con2">
        <h1>Air Conditioner</h1>
        <p style="margin-bottom: 10px;">You can decrease or increase the temperature of the house by controlling the air conditioner from here.</p>
        <div class="frame">
            <div id="slider" class="rslider"></div>
            <div class="thermostat">
                <div class="ring">
                    <div class="bottom_overlay"></div>
                </div>
                <div class="control">
                    <div class="temp_outside">23°</div>
                    <div class="temp_room"><span>°</span></div>
                    <div class="room">Home</div>
                </div>
            </div>
        </div>
    </div>
   </div>
   <div style="display: flex;">
    <div id="con1" >
        <h1>Electronic Devices</h1>
        <p>You can control all electronic devices in the house from here.</p>
        <div id="devices">
            <h2>Television</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
        <div id="devices">
            <h2>Kettle</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
        <div id="devices">
            <h2>Dishwasher</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
        <div id="devices">
            <h2>Oven</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
        <div id="devices">
            <h2>Dishwasher</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
        <div id="devices">
            <h2>Robotic Vacuum Cleaner</h2>
            <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>

    </div>
    <div id="con2">
        <h1>Music</h1>
        <p>You can load the playlist you want and listen to the song in the mode you want.</p>
        <h2 style="text-align: left;margin-top: 1rem;">Playlist:</h2>
        <div class='file-input'>
            <input type='file'>
            <span class='button'>Choose</span>
            <span class='label' data-js-label>No file selected</label>
          </div>
        <div>
            <h2 style="text-align: left;margin-top: 1rem;">Choose Music Mode:</h2>
            <form>
                <div style="display: flex;margin: 1rem; font-weight: bold;justify-content: space-between;">
                    <label for="normal">Normal</label>
                    <input type="radio" id="modes" name="musicmodes" value="Normal" style="box-shadow: none ;">
                </div>
                <div style="display: flex;margin: 1rem; font-weight: bold;justify-content: space-between;">
                    <label for="bassboosted">Bass Boosted</label>
                    <input type="radio" id="modes" name="musicmodes" value="Bass Boosted" style="box-shadow: none ;">
                </div>
                <div style="display: flex; margin: 1rem; font-weight: bold;justify-content: space-between;">
                    <label for="chill">Chill</label>
                    <input type="radio" id="modes" name="musicmodes" value="Chill" style="box-shadow: none ;">
                </div>
                <div style="display: flex; margin: 1rem; font-weight: bold;justify-content: space-between;">
                    <label for="party">Party</label>
                    <input type="radio" id="modes" name="musicmodes" value="Party" style="box-shadow: none ;">
                </div>
              </form>
        </div>  
    </div>
   </div>
   <div style="display: flex;">
    <div id="con1" >
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
    <div id="con2" >
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
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                                    
<script src="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.js"></script>
    <script src="consumerhome.js"></script>
</body>
</html>







