<?php ob_start(); ?>
<?php
include('databaseConnection.php'); 
if(isset($_POST['adib'])=='Save'){
    
 if($_POST['universityname']==null)
  { 
      header('Location: http:university.php'); }
 else {
 $univselectedname=strtoupper($_POST['universityname']);
 mysql_select_db("gratification",$con); 
// Inserting Data into table employee
$sql1="SELECT * FROM university WHERE university_name='$univselectedname'";
$result1=mysql_query($sql1);
$count1=mysql_num_rows($result1);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
                header('Location: http:university.php');        
                      
        }

else {                         
             mysql_query("INSERT INTO university(university_name)
                          VALUES('$univselectedname')");  
                          header('Location:university.php');
                          
 
                             
                  
 } }  

    
}
if(isset($_POST['asif'])=='Cancel'){
    
   header('Location:university.php');  
}

mysql_close($con);
?>
<?php ob_flush(); ?>

            


