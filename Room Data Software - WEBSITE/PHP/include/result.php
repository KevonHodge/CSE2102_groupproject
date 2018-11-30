<?php 
include('../server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href=" ../css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
  <?php 
    $result;
if (isset($_POST['search'])) 
{

  $searchq = $_POST['search'];
  $rseat = $_POST['No_of_seats'];
  $rtype = $_POST['rtype'];



 
      $room_check_query = "SELECT * FROM room WHERE rseat = '$rseat' ";
      $result = mysqli_query($db, $room_check_query);
      $resultcheck = mysqli_num_rows($result);

      if ($resultcheck > 0)  
      { // if result exist
         while($row =mysqli_fetch_assoc($result))
         {
            echo "<div class='table-bordered'> <table class='table'>
                      <thead>
                          <tr>
                            <th>Results</th>
                            <th>Seats</th>
                            <th>Room type</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Results found:".$resultcheck."</td>
                          <td> Number of seats: ".$row['rseat']."</td>
                          <td> Room type:".$row['rtype']."</td>
                        </tr>
                        </tbody>
                  </table>
                  </div>";
         }
      }
      else{

                    echo "<br><br><br>No Results found";
      }

}

 ?>
</div> 
      <div class="Profile_Image">
            <!--<img src="css/Image/avatar.png">-->
            <img src=" ../css/Image/avatar.png"> 
            <button class="Profile_button"><p><?php echo $_SESSION['username']; ?></p></button>
            <span class="glyphicon glyphicon-bell"></span>
            <button class="Profile_logoutbtn"><?php  if (isset($_SESSION['username'])) : ?><p> <a href="../index.php?logout='1'" style="color: red;">logout</a> </p><?php endif ?></button>

        
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