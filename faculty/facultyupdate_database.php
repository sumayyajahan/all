<?php ob_start(); ?> 
<?php
include('databaseConnection.php');
if(isset($_POST['adib'])=='Save'){
    
   if($_POST['facultynewname']==null)
  {header('Location: http:faculty.php');}
  else{
// username and password sent from form 
$universitynewname=$_POST['elect']; 
$facultynewname=strtoupper($_POST['facultynewname']);
$ids=$_POST['facultyno'];
$sql1="SELECT * FROM faculty WHERE university_id='$universitynewname' and faculty_name='$facultynewname'";
$result1=mysql_query($sql1);
$count1=mysql_num_rows($result1);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
header('Location: http:faculty.php');
}
else {
mysql_query("update faculty set university_id='$universitynewname',faculty_name='$facultynewname' where faculty_id='$ids'") ; header('Location: http:faculty.php');
}  
  
}   
    
    
    
    
}
if(isset($_POST['asif'])=='Cancel'){
    
    
    header('Location: http:faculty.php');
    
}

mysql_close() ; 
?>
<?php ob_flush(); ?>