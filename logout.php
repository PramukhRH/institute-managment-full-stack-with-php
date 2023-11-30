<?php 
session_start();
session_unset();
session_destroy();
if(empty($_SESSION['user_type']))
{
    header("Location: http://localhost:8002/institute-managment/login.php");
}
else
{
  echo 333;
}
