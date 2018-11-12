<?php 
// Functions 
include("server.php");
function isadmin()
{
  if (isset($_SESSION['user']) && $_SESSION['user']['admin'] == '1' )
  {
    return true;
  }
  else 
  {
    return false;
  }
}
?>