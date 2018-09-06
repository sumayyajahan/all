<?php ob_start(); ?>
<?php 
include('databaseConnection.php');


    $dept=$_POST['department'];
    $coursetitle=strtoupper($_POST['coursetitle']);
    $coursecode=strtoupper($_POST['coursecode']);
    $year=$_POST['year'];
    $semester=$_POST['semester'];
    $credithour=strtoupper($_POST['credithour']);
    $rows=mysql_query("select *from department where department_name='$dept'");
    $rose=mysql_fetch_array($rows);
    $departmentid=$rose['department_id'];
    
    if(isset($_POST['adib'])=='Save'){
        
            if($coursetitle==null||$coursecode==null||$credithour==null){
        header('Location: http:courseinfo.php'); 
    }
    else{  $res=mysql_query("select *from course_info where department_name='$dept' and course_title='$coursetitle'and course_code='$coursecode' and year='$year' and semester='$semester' and credit_hour='$credithour' and department_id='$departmentid'");
           $rows=mysql_fetch_array($res);
           $count1=mysql_num_rows($rows);
           if($count1==1){
               header('Location: http:courseinfo.php'); 
           }
           else{$result=mysql_query("INSERT INTO course_info(department_name,course_title,course_code,year,semester,credit_hour,department_id)
                          VALUES('$dept','$coursetitle','$coursecode','$year','$semester','$credithour','$departmentid')");
          header('Location: http:courseinfo.php');}
              
    }
        
        
    }
    if(isset($_POST['asif'])=='Cancel'){
        
        header('Location: http:courseinfo.php');
        
        
        
    }
    
    





?>
<?php ob_flush(); ?>
