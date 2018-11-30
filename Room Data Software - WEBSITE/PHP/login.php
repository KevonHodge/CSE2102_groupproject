<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <form class="log-reg" method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <div class="header">
          <h2>Login</h2><br>
        </div>
      <!--<label>Username</label>-->
      <input type="text" name="username" placeholder="username"><br>
      <!--<label>Password</label>-->
      <input type="password" name="password" placeholder="password"><br>
      <button type="submit" class="btn" name="login_user">Login</button><br>
    </div>
    <p class="signup-question">
      Not yet a member? <a class="login_signin_text" href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>