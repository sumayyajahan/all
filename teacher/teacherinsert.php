<?php ob_start(); ?>
<?php 
include('databaseConnection.php');

          $teachername=strtoupper($_POST['teachername']);  
          $address=strtoupper($_POST['address']);  
          $mobile=strtoupper($_POST['mobile']);   
          $email=$_POST['email'];
          $departmentids=$_POST['select1'];
          $type=$_POST['elect'];
          $designation=$_POST['lect'];

          
          if(isset($_POST['adib'])=='Save'){
              
                if($teachername==null||$address==null||$mobile==null||$email==null){
        header('Location: http:teacher.php'); 
    }
    else{  $re=mysql_query("select *from teacher where teacher_name='$teachername' and mobile_no='$mobile' and e_mail='$email' and department_id='$departmentids'");
           $count1=mysql_num_rows($re);
           if($count1==1){
               header('Location: http:teacher.php'); 
           }
           else{$result=mysql_query("INSERT INTO teacher(teacher_name,teacher_type,designation,address,mobile_no,e_mail,department_id,password,user)
                          VALUES('$teachername','$type','$designation','$address','$mobile','$email','$departmentids','$mobile','$email')");
          header('Location: http:teacher.php');}
              
    }  
              
              
              
              
          }
          if(isset($_POST['asif'])=='Cancel'){
              
              
              header('Location: http:teacher.php');
          }
          
          





?>
<?php ob_flush(); ?>

