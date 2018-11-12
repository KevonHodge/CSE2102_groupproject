<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <div class="header">
    <h2>Login</h2>
  </div>
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p class="signup-question">
      Not yet a member? <a class="login_signin_text" href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>