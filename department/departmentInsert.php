<?php ob_start(); ?>
<?php 
include('databaseConnection.php');
if(isset($_POST['adib'])=='Save'){
    
    $sino=$_POST['select']; 
    $departmentname=strtoupper($_POST['departmentname']);
    if($departmentname==null){
        header('Location: http:department.php'); 
    }
    else{  
           $re=mysql_query("select *from department where department_name='$departmentname' and  faculty_id='$sino'");
           $count1=mysql_num_rows($re);
           if($count1==1){
               header('Location: http:department.php'); 
           }
           else{$result=mysql_query("INSERT INTO department(department_name,faculty_id)
                          VALUES('$departmentname','$sino')");
          header('Location: http:department.php');}
              
    }
    
    
}
if(isset($_POST['asif'])=='Cancel'){
         header('Location: http:department.php');
    
}







?>
<?php ob_flush(); ?>
