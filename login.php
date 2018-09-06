<?php session_start(); ?>
<?php



// Connect to server and select databse.
mysql_connect("localhost", "root", "")or die("cannot connect"); 
mysql_select_db("gratification")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['adminname']; 
$mypassword=$_POST['adminpassword']; 

$sql="SELECT * FROM admin WHERE e_mail='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// store session data
$row = mysql_fetch_array($result);
//echo $row['name'];
$_SESSION['maru']= $row['admin_name'] ;
//print $row['name'] . "Thanks, Redirecting";
header("location:adminsessionstart.php");
}
else {
    
    
    $sql1="SELECT * FROM teacher WHERE user='$myusername' and password='$mypassword'";
$result1=mysql_query($sql1);
$count1=mysql_num_rows($result1);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count1==1){
// store session data
$row1 = mysql_fetch_array($result1);
//echo $row['name'];
$_SESSION['adib']= $row1['teacher_name'] ;
//print $row['name'] . "Thanks, Redirecting";
header("location:adminsessionstart.php");


} 
else{
    header("location:index.php");
}
}
?>