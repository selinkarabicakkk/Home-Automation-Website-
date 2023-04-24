<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Producer Login</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title">Producer Login <br> Page</div>
      <form action="#">
        <div class="field">
          <input type="text" required>
          <label>Username</label>
        </div>
        <div class="field">
          <input type="password" required>
          <label>Password</label>
        </div>
       
        <div class="field">  
          <input type="submit" onclick="window.location.href='./producerprofile.html';" value="Login">
        </div>
      </form>
    </div>
  </body>
</html>
