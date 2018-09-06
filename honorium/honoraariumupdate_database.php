<?php ob_start(); ?>
<?php
include('databaseConnection.php');
if(isset($_POST['adib'])=='Update'){
    
    if($_POST['amount']==null)
  {header('Location: http:honorium.php');}
  else{
// username and password sent from form 
$newname=$_POST['elect'];
$amount=$_POST['amount'];
$ids=$_POST['honorno'];
$sql1="SELECT * FROM honorarium_info WHERE event_name='$newname'and amount='$amount'";
$result1=mysql_query($sql1);
$count1=mysql_num_rows($result1);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
header('Location: http:honorium.php');
}
else {
mysql_query("update honorarium_info set event_name='$newname',amount='$amount' where honorarium_id='$ids'") ; 
header('Location: http:honorium.php');
}  
  
}
    
    
}
if(isset($_POST['asif'])=='Cancel'){
    
    header('Location: http:honorium.php');
    
} 
  

mysql_close() ; 

?>
<?php ob_flush(); ?>
