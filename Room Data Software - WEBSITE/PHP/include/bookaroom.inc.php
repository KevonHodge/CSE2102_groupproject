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
  <link rel="stylesheet" type="text/css" href=" ../css/style.css">
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
      <input class="back-btn"type="button" value="Back" onClick="history.go(-1);">
      <button class="Big-button">Book Room</button>
         <div class="AC">
           <label class="R_id">Room ID:<input type="text" name="Room_ID" placeholder="Input Room ID Number"></label>
           <label class="R_W_days">Reserve Week Days:<input  type="text" name="Weekday" placeholder="weekDay1, weekDay2"></label>

         </div>
         <div class="AC-left">
           <label class="C_code">Course Code:<input  type="text" name="Course_Code" placeholder="Input Course Code "></label>
           <label class="L_name">Lecturer's Name:<input type="text" name="Lecture_name" placeholder="Input your Name"></label>
          </div>
              <label class="S_Time">Reserve Time:<input  size="50" type="text" name="Reservedtime" placeholder="WeekDay1:- 00:00-00:00, WeekDay2:- 00:00-00:00"></label>
     
    </div> 
      <div class="Profile_Image">
            <!--<img src="css/Image/avatar.png">-->
            <img src=" ../css/Image/avatar.png"> 
            <button class="Profile_button"><p><?php echo $_SESSION['username']; ?></p></button>
            <span class="glyphicon glyphicon-bell"></span>
            <a href=" ../login.php?logout='1'" style="color: red;"><button class="Profile_logoutbtn"><?php  if (isset($_SESSION['username'])) : ?><p> Logout </p><?php endif ?></button></a>

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