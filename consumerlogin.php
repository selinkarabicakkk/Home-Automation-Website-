<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Consumer Login</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="wrapper">
    <div class="title">Consumer Login Page</div>
    <form action="#">
      <div class="field">
        <input type="text" required>
        <label>Email Address</label>
      </div>
      <div class="field">
        <input type="password" required>
        <label>Password</label>
      </div>
      <div class="field">
        <input type="submit" onclick="window.location.href='./consumerprofile.php';" value="Login"
          style="background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);color: #fff;">
      </div>
      <div class="signup-link">Not a member? <a href="consumersignup.php">Signup now</a></div>
    </form>
  </div>
</body>

</html>