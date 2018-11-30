<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body>

<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
</div>
    <!-- logged in user information -->

    <?php  if (isset($_SESSION['username'])) : ?>
      <style>
        .content
        {
          visibility: hidden;
        }
      </style>
<div class="Test">
    <?php endif ?>
    <a href="include/search.inc.php"><button type="button" class="block">SEARCH</button></a>
    <a href="include/create.inc.php"><button type="button" class="block">CREATE</button></a>
    <a href="include/pending.inc.php"><button type="button" class="block2">PENDING BOOKINGS</button></a>
    <a href="include/edit.inc.php"><button type="button" class="block2">EDIT</button></a>
</div> 
      <div class="Profile_Image">
            <!--<img src="css/Image/avatar.png">-->
            <img src="css/Image/avatar.png"> 
            <button class="Profile_button"><p><?php echo $_SESSION['username']; ?></p></button>
            <span class="glyphicon glyphicon-bell"></span>
            <a href="../index.php?logout='1'" style="color: red;"><button class="Profile_logoutbtn"><?php  if (isset($_SESSION['username'])) : ?><p> Logout </p><?php endif ?></button></a>

        
      </div>
      <div class="navholder">
          <ul class="nav_bar">
      
            <li><a href="#news">About</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="#about">Q & A</a></li>
          </ul>
      </div>
        
</body>
</html>