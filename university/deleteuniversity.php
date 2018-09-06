<?php
  include('databaseConnection.php');
    if(isset($_POST['adib'])=='Yes'){
    
      $univid=$_POST['universityname'];
  mysql_query("delete from university where university_id='$univid'");
  header("Location:university.php");      
        
    }
      if(isset($_POST['asif'])=='No'){
      
      header("Location:university.php");        
          
      }

?>
