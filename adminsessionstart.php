<?php

session_start();

if(isset($_SESSION['maru'])) {
 header("location:home1.php");        
}

if(isset($_SESSION['adib'])) {
 header("location:home2.php");        
}




//else
// header("location:adminlogin.php");
  
  ?>
