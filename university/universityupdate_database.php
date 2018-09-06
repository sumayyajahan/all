<?php ob_start(); ?>
<?php
include('databaseConnection.php');
  if(isset($_POST['adib'])=='Update'){
      
        if($_POST['universitynewname']==null)
  {header('Location: http:university.php');}
  else{
// username and password sent from form 
$universityname=$_POST['elect']; 
$universitynewname=strtoupper($_POST['universitynewname']); 
$sql1="SELECT * FROM university WHERE university_name='$universityname'";
$sql2="SELECT * FROM university WHERE university_name='$universitynewname'";
$result1=mysql_query($sql1);
$count1=mysql_num_rows($result1);
$result2=mysql_query($sql2);
$count2=mysql_num_rows($result2);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count1==1&&$count2!=1){
mysql_query("update university set university_name='$universitynewname' where university_name='$universityname'") ; 
header('Location: http:university.php');?>



<?php }
else {
  echo "<h1>"."Database update failed."."</h1>";

}  }
  }
    if(isset($_POST['asif'])=='Cancel'){
        
         header('Location: http:university.php');
    }


mysql_close() ; 
?>
<?php ob_flush(); ?>