<?php

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$adminlevel = 0;
$output = '';
$success = '';

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password, admin) 
  			  VALUES('$username', '$email', '$password', '0')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: user.index.php');
  }
}

// ... 

// LOGIN USER
$logged_in_user_id = mysqli_insert_id($db);

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {

      $logged_in_user = mysqli_fetch_assoc($results);
      if ($logged_in_user['admin'] == 1) {

          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: admin.index.php');
      }else {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: user.index.php');
      }
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
 $previous = "javascript:history.go(-1)";
  if(isset($_SERVER['HTTP_REFERER'])) {
  $previous = $_SERVER['HTTP_REFERER'];
}


if (isset($_POST['create'])) {
  // receive all input values from the form
  $ac = mysqli_real_escape_string($db, $_POST['ac']);
  $rseat = mysqli_real_escape_string($db, $_POST['rseat']);
  $faculty = mysqli_real_escape_string($db, $_POST['faculty']);
  $rtype = mysqli_real_escape_string($db, $_POST['rtype']);
  $requipment = mysqli_real_escape_string($db, $_POST['equip']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($rtype)&&empty($faculty)&&empty($rseat)&&empty($ac)&&empty($rid)) { array_push($errors, "YOu need to enter a field"); }
else{

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  // Finally, register user if there are no errors in the form
  

    $query = "INSERT INTO room  (equip, rseat, ac,rtype,fid) 
          VALUES('$requipment', '$rseat', '$ac', '$faculty')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Success!";
}
  }


/*
if (isset($_POST['search'])) {
  // receive all input values from the form
  $searchq = $_POST['search'];
  $rseat = $_POST['rseat']);
  $ac = $_POST['ac']);
  $rtype = $_POST['rtype']);
   $fid = $_POST['fid']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  $user_check_query = "SELECT * FROM rooms WHERE rseat='$rseat'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if (!empty($fid) && !empty($rseat) && !empty($rtype) && !empty($ac) ) { // if user exists
    $user_check_query = "SELECT * FROM rooms WHERE rseat = '$rseat' AND fid = '$fid' AND ac = '$ac' AND rtype= '$rtype'";
    print($user_check_query);
  }
  elseif (empty($fid) && !empty($rseat) && !empty($rtype) && !empty($ac)) {
   $user_check_query = "SELECT * FROM rooms WHERE rseat = '$rseat' AND ac = '$ac' AND rtype= '$rtype'";
  print($user_check_query);
  }
  elseif (!empty($fid) && empty($rseat) && !empty($rtype) && !empty($ac) ) { // if user exists
    $user_check_query = "SELECT * FROM rooms WHERE fid = '$fid' AND ac = '$ac' AND rtype= '$rtype'";
  }
elseif (!empty($fid) && !empty($rseat) && empty($rtype) && !empty($ac) ) { // if user exists
    $user_check_query = "SELECT * FROM rooms WHERE rseat = '$rseat' AND fid = '$fid' AND ac = '$ac'";
  }
  elseif (!empty($fid) && !empty($rseat) && !empty($rtype) && empty($ac) ) { // if user exists
    $user_check_query = "SELECT * FROM rooms WHERE rseat = '$rseat' AND fid = '$fid' AND rtype= '$rtype'";
  }
  elseif (empty($fid) && empty($rseat) && empty($rtype) && !empty($ac) ) { // if user exists
    $user_check_query = "SELECT * FROM rooms WHERE ac = '$ac'";
  }
  elseif (empty($fid) && empty($rseat) && !empty($rtype) && empty($ac) ) { // if user exists
    $user_check_query = "SELECT * FROM rooms WHERE rtype= '$rtype'";
  }
  elseif (empty($fid) && !empty($rseat) && empty($rtype) && empty($ac) ) { // if user exists
    $user_check_query = "SELECT * FROM rooms WHERE rseat = '$rseat'";
  }
  elseif (!empty($fid) && empty($rseat) && empty($rtype) && empty($ac) ) { // if user exists
    $user_check_query = "SELECT * FROM fid = '$fid'";
  }
    elseif ($rseat>0) { // if user exists
    $user_check_query = "SELECT * FROM fid = '$fid'";
  }
else{
  echo "This is not catered for";
}
if(mysqli_num_rows($user_check_query)<1){print($user_check_query);
}
}
*/

?>
