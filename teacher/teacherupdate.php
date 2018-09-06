<?php ob_start(); ?>
<?php 
include('databaseConnection.php');
          $si=$_POST['si'];
          $teachername=strtoupper($_POST['teachername']);  
          $address=strtoupper($_POST['address']);  
          $mobile=strtoupper($_POST['mobile']);   
          $email=$_POST['email'];
          
          $departmentids=$_POST['select1']; 
          $type=$_POST['elect'];
          $designation=$_POST['lect'];
if(isset($_POST['adib'])=='Update'){
    
                 
     if($teachername==null||$address==null){
        header('Location: http:teacher.php'); 
    }
    else{  $re=mysql_query("select *from teacher where teacher_name='$teachername' and teacher_type='$type' and designation='$designation' and address='$address' and mobile_no='$mobile' and e_mail='$email' and department_id='$departmentids'");
           $count1=mysql_num_rows($re);
           if($count1==1){
               header('Location: http:teacher.php'); 
           }
           else{
               mysql_query("update teacher set teacher_name='$teachername',teacher_type='$type',designation='$designation',address='$address',mobile_no='$mobile',e_mail='$email',department_id='$departmentids' where teacher_id='$si'");
          header('Location: http:teacher.php');
           }
              
    }

}
if(isset($_POST['asif'])=='Cancel'){
    
    
         header('Location: http:teacher.php');
    
}





?>
<?php ob_flush(); ?>

