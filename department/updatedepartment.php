<?php ob_start(); ?>
<?php
include('databaseConnection.php');
 $facultyid=$_POST['faculty'];
$departmentid=$_POST['deptid'];
$departmentname=strtoupper($_POST['departmentname']);

//echo "$facultyid".""."$departmentname".""."$departmentid";
if(isset($_POST['adib'])=='Update'){
     $re=mysql_query("select *from department where department_name='$departmentname' and faculty_id=' $facultyid'");
     $count=mysql_num_rows($re);
     if($count==1){
                 header("Location:department.php");
     }
     else{
         
         mysql_query("update department set department_name='$departmentname',faculty_id='$facultyid' where department_id='$departmentid'");
         header("Location:department.php"); 
         
     }
    
}
if(isset($_POST['asif'])=='Cancel'){
    
    header("Location:department.php");
}  


      
     

?>
<?php ob_flush(); ?>
