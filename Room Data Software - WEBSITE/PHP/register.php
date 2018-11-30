<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>

  <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

	
  <form class="log-reg" method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
      <div class="header">
        <h2>Register</h2><br>
      </div>
  	  <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username"><br>
  	  <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email"><br>
  	  <input type="password" name="password_1" placeholder="Password"><br>
  	  <input type="password" name="password_2" placeholder="Confirm Password"><br>
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p class="signup-question">
  		Already a member? <a class="login_signin_text" href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>