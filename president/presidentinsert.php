<?php ob_start(); ?> 
<?php
include('databaseConnection.php'); 

if(isset($_POST['adib'])=='Save'){
    
    $departmentid=$_POST['department'];
    $examid=$_POST['examname'];
    $teacherid=$_POST['teacher'];      
    
    if($departmentid=='no' || $examid=='no' || $teacherid=='no'){
    
        header("Location:president.php");
        
    }
    else {
            $re=mysql_affected_rows("select * from president where department_id='$departmentid' and exam_id='$examid' and teacher_id='$teacherid'");
           $count1=mysql_num_rows($re);
           if($count1==1){
               header('Location:president.php'); 
           }
           else{
               mysql_query("insert into president(department_id,exam_id,teacher_id)
               values('$departmentid','$examid','$teacherid')");
               header('Location:president.php');
           }
        
    }
} 
?>
<?php ob_flush(); ?>
