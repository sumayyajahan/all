
<?php

// Connect with database
$con=mysql_connect("localhost","root","");
if(!$con)
 {
   die("Database can not be connected because:".mysql_error());
 
 }

 

// Connect to server and select databse.

mysql_select_db("gratification")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['adminname']; 
$mypassword=$_POST['adminpassword']; 
$myusernewname=$_POST['adminnewname']; 
$mynewpassword=$_POST['adminnewpassword']; 

$sql="SELECT * FROM admin WHERE e_mail='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
mysql_query("update admin set e_mail='$myusernewname', password='$mynewpassword' where password='$mypassword'") ;
echo "Database Updated Successfully.";
}
else {    $sql1="SELECT * FROM teacher WHERE user='$myusername' and password='$mypassword'";
$result1=mysql_query($sql1);
$count1=mysql_num_rows($result1);
if($count1==1){
mysql_query("update teacher set user='$myusernewname', password='$mynewpassword' where password='$mypassword'") ;
echo "Database Updated Successfully.";
}
else{
      echo "Database Updated failed.";
}
  

}
mysql_close() ; 
?>