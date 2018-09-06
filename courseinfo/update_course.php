<?php ob_start(); ?>
<?php 
include('databaseConnection.php');

    if(isset($_POST['adib'])=='Update'){
        
            $dept=$_POST['sino'];
    $coursetitle=strtoupper($_POST['coursetitle']);
    $coursecode=strtoupper($_POST['coursecode']);
    $years=$_POST['years'];
    $semesters=$_POST['semesters'];
    $credithour=$_POST['credithour'];
    $rows=mysql_query("select *from course_info where course_id='$dept'");
    $rose=mysql_fetch_array($rows);

    
    if($coursetitle==null||$coursecode==null||$credithour==null){
        header('Location: http:courseinfo.php'); 
    }
    else{  $res=mysql_query("select *from course_info where course_title='$coursetitle',course_code='$coursecode',year='$years',semester='$semesters',credit_hour='$credithour',course_id='$dept'");
           $rows=mysql_fetch_array($res);
           $count1=mysql_num_rows($rows);
           if($count1==1){
               header('Location: http:courseinfo.php'); 
           }
           else{$result=mysql_query("update course_info set course_title='$coursetitle',course_code='$coursecode',year='$years',semester='$semesters',credit_hour='$credithour' where course_id='$dept'");
          header('Location: http:courseinfo.php');}
              
    }
        
    }
    if(isset($_POST['asif'])=='Cancel'){
     header('Location: http:courseinfo.php');   
        
    }





?>
<?php ob_flush(); ?>
