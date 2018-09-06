<?php ob_start(); ?> 
<?php 
include('databaseConnection.php');

$courseid=$_POST['courseid'];
$session=$_POST['session']; 
$res=mysql_query("select *from course_info where course_id='$courseid'");
$rowse=mysql_fetch_array($res);
$dept=$rowse['department_id'];
$coursecode=$rowse['course_code'];
$credithour=$rowse['credit_hour'];
$sql1="SELECT * FROM existingcourse WHERE deparetment_name='$dept',session='$session',course_code='$coursecode',credit_hour='$credithour'";
$result1=mysql_query($sql1);
$count1=mysql_num_rows($result1);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
                header("Location:existingcourse.php");           
                      
        }
        
else{
    
    mysql_query("INSERT INTO `gratification`.`existingcourse` (
`department_id` ,
`session` ,
`course_code` ,
`course_id` ,
`credit_hour`
)
VALUES (
'$dept', '$session', '$coursecode', '$courseid', '$credithour'
);");
header("Location:existingcourse.php"); 
}

?>
<?php ob_flush(); ?>
