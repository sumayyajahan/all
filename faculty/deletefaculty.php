<?php
  include('databaseConnection.php');
  if(isset($_POST['adib'])=='Yes'){
      
    $facultyid=$_POST['facultyname'];
  mysql_query("delete from faculty where faculty_id='$facultyid'");
  header("Location:faculty.php");  
  }
  if(isset($_POST['asif'])=='No'){
      
      header("Location:faculty.php");
      
  }
  
?>
