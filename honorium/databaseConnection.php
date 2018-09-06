<?php
  $con=mysql_connect("localhost","root","");
if(!$con)
 {
   die("Database can not be connected because:".mysql_error());
 
 }


// Selecting data from database

mysql_select_db("gratification",$con);
?>
