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
      <button class="Big-button">Edit</button>
      <div class="AC">
        <label class="A_C">Air Conditioned: Yes<input type="checkbox" name="AC-unit-yes"> No<input type="checkbox" name="AC-unit-no"></label>
        <label class="Room_id">Room ID:<input type="text" name="Room_ID" placeholder="Input Room ID Number"></label>
        <label class="S_numb">Room Seat:<input type="Number" name="Room_ID" placeholder="Input Seat quantity"></label>
      </div>
<!--This is the search Engine's equipment Dropdown list tab-->
  <dl class="dropdown"> 

    <dt>
     <label>Room's equipment:</label><br>
    <button><a href="#">
      <span class="hida">--Select--</span>    
      <p class="multiSel"></p>  
    </a></button>
    </dt>
  
    <dd>
        <div class="mutliSelect">
            <ul>
                <li>
                    <input type="checkbox" value="Projector" />Projector</li>
                <li>
                    <input type="checkbox" value="Smart White-Board" />Smart White-Board</li>
                <li>
                    <input type="checkbox" value="Chalk Board" />Chalk Board</li>
                <li>
                    <input type="checkbox" value="Piano" />Piano</li>
                <li>
                    <input type="checkbox" value="Computer" />Computer</li>
                <li>
                    <input type="checkbox" value="Xray Machine" />Xray Machine</li>

            </ul>

        </div>
    </dd>
</dl>
<!--This is the search Engine's equipment R_type_dropdown list tab-->
  <dl class="R_type_dropdown"> 
    <dt>
     <label>Room Type:</label><br>
    <button><a href="#">
      <span class="R_type_hida">--Select--</span>    
      <p class="R_type_multiSel"></p>  
    </a></button>
    </dt>
  
    <dd>
        <div class="R_type_mutliSelect">
            <ul>
                <li>
                    <input type="checkbox" value="Computer Labatory" />Computer Labatory</li>
                <li>
                    <input type="checkbox" value="Lecture Hall" />Lecture Hall</li>
                <li>
                    <input type="checkbox" value="Chemical Labatory" />Chemical Labatory</li>
                <li>
                    <input type="checkbox" value="Doctor Labatory" />Doctor Labatory</li>
                <li>
                    <input type="checkbox" value="Musical Room" />Musical Room</li>
                <li>
                    <input type="checkbox" value="Art Room" />Art Room</li>

            </ul>

        </div>
    </dd>
</dl>
<LABEL>Faculty:</LABEL>
<select class="Faculty">
    <option value="Selectfac">--Select--</option>
    <option value="FNS">Faculty of Natural Science</option>
    <option value="FSS">Faculty of Social Science</option>
    <option value="FEH">Faculty of Education and Humanities</option>
    <option value="FET">Faculty of Engineering and Technology</option>
    <option value="FEES">Faculty of Earth and Environmental Sciences</option>
    <option value="FHS">Faculty of Health Sciences</option>
    <option value="SEBI">School of Entrepreneurship and Business Innovation</option>
    <option value="FAF">Faculty of Agriculture and Forestry</option>
</select>
<script type="text/javascript">/*
  Dropdown with Multiple checkbox select with jQuery - May 27, 2013
  (c) 2013 @ElmahdiMahmoud
  license: https://www.opensource.org/licenses/mit-license.php
*/


$(".R_type_dropdown dt a").on('click', function() {
  $(".R_type_dropdown dd ul").slideToggle('fast');
});

$(".R_type_dropdown dd ul li a").on('click', function() {
  $(".R_type_dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("R_type_dropdown")) $(".R_type_dropdown dd ul").hide();
});

$('.R_type_mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.R_type_mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.R_type_multiSel').append(html);
    $(".R_type_hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".R_type_hida");
    $('.R_type_dropdown dt a').append(ret);

  }
});

/**/

$(".dropdown dt a").on('click', function() {
  $(".dropdown dd ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function() {
  $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdown dt a').append(ret);

  }
});</script>
  <!--end of the Dropbox-checkbox-->
    </div> 
      <div class="Profile_Image">
            <!--<img src="css/Image/avatar.png">-->
            <img src=" ../css/Image/avatar.png"> 
            <button class="Profile_button"><p><?php echo $_SESSION['username']; ?></p></button>
            <span class="glyphicon glyphicon-bell"></span>
            <a href=" ../index.user.php?logout='1'" style="color: red;"><button class="Profile_logoutbtn"><?php  if (isset($_SESSION['username'])) : ?><p> Logout </p><?php endif ?></button></a>

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