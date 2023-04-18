<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producer Menu</title>
    <link rel="stylesheet" href="consumerhome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.css" rel="stylesheet" />
 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
<div>
  <button>
    <?php
    echo "<a href='consumerlogout.php' style='color:black; background-color:#b1cbbb; border:1px solid red; padding:5px 5px;'> LOG OUT</a>";  //kullanıcı çıkış yapmak isteyince bu butona basacak
    ?>
  </button>
    <div id = "headbar">
        <div id="clockdate">
            <div class="clockdate-wrapper">
                <div id="clock"></div>
                <div id="date"></div>
            </div>
        </div>
        <div>
            <img src="./images/profilephoto.png">
            <h2>ProducerName</h2>
        </div>
        <div id="weather">
            <iframe src="//www.hava.one/widget/widget_frame?id=323777&days=4&bcolor=2196F3&hbkcolor=2196F3&w=310" scrolling="no" frameborder="0" style="border: 3px solid black;overflow:hidden;height:200px;width:310px;" allowTransparency="true"></iframe>
            <noscript><a href="http://www.hava.one">hava.one</a></noscript>
        </div>
    </div>  
    <div style="display: flex;">
        <div id="con1">
            <h1>Lighting</h1>
            <div id="rooms" style="justify-content: space-between;">
                <h2 style="margin-top: 1rem;margin-bottom: 1rem;">Kitchen</h2>
                <label class="switch" style="margin-left: 3.5rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">ON</h2>
            </div>
            <div id="rooms" style="justify-content: space-between;">
                <h2 style="margin-top: 1rem;margin-bottom: 1rem;">Living Room</h2>
                <label class="switch"style="margin-left: 0.5rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">OFF</h2>
            </div>
            <div id="rooms" style="justify-content: space-between;">
                <h2 style="margin-top: 1rem;margin-bottom: 1rem;">Bathroom</h2>
                <label class="switch" style="margin-left: 1.5rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">ON</h2>
            </div>
            <div id="rooms" style="justify-content: space-between;">
                <h2 style="margin-top: 1rem;margin-bottom: 1rem;">Bedroom</h2>
                <label class="switch" style="margin-left: 2.75rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">OFF</h2>
            </div>
            <h2 style="text-decoration-line: underline;margin-top: 4rem;">Time the lights are turned off: </h2>
            <h3 style="text-align: center;">
                Living Room: 18.04.2023 || 01.11
            </h3>
            <h3 style="text-align: center;">
                Bedroom: 18.04.2023 || 00.57
            </h3>
        </div>
        <div id="con1" >
            <h1>Electronic Devices</h1>
            <div id="devices">
                <h2>Television</h2>
                <label class="switch" style="margin-left: 9rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">ON</h2>
            </div>
            <div id="devices">
                <h2>Kettle</h2>
                <label class="switch" style="margin-left: 12.75rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">OFF</h2>
            </div>
            <div id="devices">
                <h2>Dishwasher</h2>
                <label class="switch" style="margin-left: 8.5rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">OFF</h2>
            </div>
            <div id="devices">
                <h2>Oven</h2>
                <label class="switch" style="margin-left: 12.25rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">ON</h2>
            </div>
            <div id="devices">
                <h2>Washing Machine</h2>
                <label class="switch" style="margin-left: 4rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">OFF</h2>
            </div>
            <div id="devices">
                <h2>Vacuum Cleaner</h2>
                <label class="switch"  style="margin-left: 4.25rem;">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  <h2 style="padding-top: 1.25rem;">ON</h2>
            </div>
            <h2 style="text-decoration-line: underline;margin-top: 0.5rem;">Time the electronic devices are turned off: </h2>
            <h3 style="text-align: center;">
                Kettle: 17.04.2023 || 12.11
            </h3>
            <h3 style="text-align: center;">
                Dishwasher: 17.04.2023 || 23.42
            </h3>
            <h3 style="text-align: center;">
                Washing Machine: 17.04.2023 || 21.04
            </h3>
        </div>
    </div>
    <div style="display: flex;">
        <div id="con1" >
            <h1>Electricity Consumption</h1>
            <h2>This month you have consumed an average of 65 kWh of electricity per day.</h2>
        </div>
        <div id="con1" >
            <h1>Water Consumption</h1>
            <h2>This month you have spent an average of 144 liters of water per day</h2>
        </div>
    </div>
    <div style="display: flex;">
        <div id="con1" >
            <h1>Music</h1>
            <div style="display: flex;">
                <h2 style="text-align: left;">Playlist: </h2>
                <h3 style="margin-top: 1rem;">playlist3.mp4</h3>
            </div>
            <div style="display: flex;">
                <h2 style="text-align: left;">Music Mode: </h2>
                <h3 style="margin-top: 1rem;">Bass Boosted</h3>
            </div>
        </div>
        <div id="con1" >
            <h1>Temperature</h1>
            <div style="display: flex;">
                <h2 style="text-align: left;margin-top: 3rem;">Temperature of the house:</h2>
                <h2 style="margin-top: 3rem;">23Â°C</h2>
            </div>
        </div>
    </div>
    <div style="display: flex;">
        <div id="con1">
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
                <i class='fa fa-video-camera'style="margin-top: 1.25rem;margin-left: 1rem;color: #969696;"></i>
            </div>
        </div>
        <div id="con2">
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