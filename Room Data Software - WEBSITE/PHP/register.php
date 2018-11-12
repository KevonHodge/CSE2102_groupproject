<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
      <div class="header">
        <h2>Register</h2>
      </div>
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p class="signup-question">
  		Already a member? <a class="login_signin_text" href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>