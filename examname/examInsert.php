<?php ob_start(); ?> 
<?php 
include('databaseConnection.php');
$year=$_POST['year'];
$semester=$_POST['semester'];
$category=$_POST['category'];
$session=$_POST['session'];
$examyear=$_POST['examyear'];

if($examyear==null||$session==null){
    header("Location:examname.php");
}
else{
    
    $sql1="SELECT * FROM examname WHERE year='$year',semester='$semester',category='$category',session='$session',examyear='$examyear'";
$result1=mysql_query($sql1);
$count1=mysql_num_rows($result1);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
                header('Location:examname.php');        
                      
        }
        
 else {
     mysql_query("INSERT INTO examname(year,semester,category,session,examyear)
                          VALUES('$year','$semester','$category','$session','$examyear')");  
                          header('Location:examname.php');                                   
 }       
}


?>
<?php ob_flush(); ?>  