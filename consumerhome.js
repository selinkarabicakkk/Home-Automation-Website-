function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
  }
  function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
  }
  startTime();
  
  $("#slider").roundSlider({
      radius: 72,
      circleShape: "half-top",
    sliderType: "min-range",
      mouseScrollAction: true,
    value: 19,
      handleSize: "+5",
      min: 10,
      max: 50
  });
  var inputs = document.querySelectorAll('.file-input')
  
  for (var i = 0, len = inputs.length; i < len; i++) {
    customInput(inputs[i])
  }
  
  function customInput (el) {
    const fileInput = el.querySelector('[type="file"]')
    const label = el.querySelector('[data-js-label]')
    
    fileInput.onchange =
    fileInput.onmouseout = function () {
      if (!fileInput.value) return
      
      var value = fileInput.value.replace(/^.*[\\\/]/, '')
      el.className += ' -chosen'
      label.innerText = value
    }
  }