<?php
include('databaseConnection.php');     
if(isset($_POST['adib'])=='Yes'){
  $id=$_POST['departmentname'];
  $query= mysql_query("delete FROM department where department_id ='$id'");
  header('Location:http:department.php');    
}

if(isset($_POST['asif'])=='No'){
  header('Location:http:department.php');  
}
  

  
?>
