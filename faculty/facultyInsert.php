<?php ob_start(); ?> 
<?php 
include('databaseConnection.php');

  if(isset($_POST['adib'])=='Save'){


    $universityid=$_POST['select']; 
    $facultyname=strtoupper($_POST['facultyname']);
    if($facultyname==null){
        header('Location: http:faculty.php'); 
    }
    else{
           $re=mysql_query("select *from faculty where university_id='$universityid' and faculty_name='$facultyname'");
           $count1=mysql_num_rows($re);
           if($count1==1){
               header('Location: http:faculty.php'); 
           }
           else{$result=mysql_query("INSERT INTO faculty(faculty_name,university_id)
                          VALUES('$facultyname','$universityid')");
          header('Location: http:faculty.php');}
              
    }



}
 if(isset($_POST['asif'])=='Cancel'){
  
header('Location: http:faculty.php');

}


?>
<?php ob_flush(); ?>
