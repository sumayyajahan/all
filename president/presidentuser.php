<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/President</title>
<link rel="stylesheet" type="text/css" href="http://localhost/adib/style/style.css" />
<!--[if IE 6]>
        <link rel="stylesheet" type="text/css" href="ie6.css" />
    <![endif]-->
</head>
<body onload="javascript:hideDiv()" >
    <div id="page">
      <div id="header">
        <div id="section">
           <div><img src="http://localhost/adib/images/Movie2.gif" alt="Logo" width="602" /></div><img src="http://localhost/adib/images/Movie3.gif" /> 
          <span><br />
          <br />
        </span> </div>
        <ul>           <li><a href="http://localhost/adib/home2.php">Home</a></li>
          <li><a href="http://localhost/adib/university/universityuser.php">University</a></li>
          <li><a href="http://localhost/adib/faculty/facultyuser.php">Faculty</a></li>
          <li><a href="http://localhost/adib/department/departmentuser.php">Department</a></li>
          <li><a href="http://localhost/adib/teacher/teacheruser.php">Teacher</a></li>
          <li><a href="http://localhost/adib/examiner/examineruser.php">Examiner</a></li>
          <li><a href="http://localhost/adib/president/presidentuser.php">President</a></li>
          <li><a href="http://localhost/adib/honorium/honoriumuser.php">Honorarium</a></li>
          <li><a href="http://localhost/adib/courseinfo/courseinfouser.php">Courses</a></li>
          <li><a href="http://localhost/adib/existingcourse/existingcourseuser.php">Current courses</a></li>
          <li><a href="http://localhost/adib/university/university.php">Print bill</a></li>
                    <li><a href="http://localhost/adib/logout.php">Logout</a></li>
        </ul>

      </div>
<?php include('databaseConnection.php');?>






<div align="center">
<table bgcolor="#CFECEC" align="center">
<tr><th style="background-color:#383838 ;"><p>Department name</p></th><th style="background-color:#383838 ;"><p>Exam name</p></th><th style="background-color:#383838 ;"><p>Session</p></th><th style="background-color:#383838 ;"><p>Teacher name</p></th><th style="background-color:#383838 ;"><p>Address</p></th></tr>
<?php  
$re=mysql_query("select *from president");
while($row=mysql_fetch_array($re)){
    $id=$row['president_id'];
    $deptid=$row['department_id'];
    $exmid=$row['exam_id'];
    $teacherid=$row['teacher_id']; 
    $self=$_SERVER['PHP_SELF'];   ?>
    
   <tr><th align="left" style="background-color:#5E767E;"><?php 
   $dept=mysql_query("select department_name from department where department_id='$deptid'");
   $deptm=mysql_fetch_array($dept);
   echo $deptm['department_name'];
   
   
   ?></th><th align="left" style="background-color:#5E767E;"><?php
   
    $exam=mysql_query("select *from examname where exam_id='$exmid'");
    $examname=mysql_fetch_array($exam);
    echo $examname['year']." ".$examname['semester']." ".$examname['category']." ".$examname['examyear'];
   
   ?></th><th align="left" style="background-color:#5E767E;"><?php echo $examname['session'];  ?></th><th align="left" style="background-color:#5E767E;"><?php     $teac=mysql_query("select *from teacher where teacher_id='$teacherid'");
    $teacher=mysql_fetch_array($teac);
    echo $teacher['teacher_name']; ?></th><th align="left" style="background-color:#5E767E;"><?php 
    echo $teacher['address'];
   
      ?></th></tr>  
<?php }

?>

</table>
</div> <p>&nbsp;</p>
<p>&nbsp;</p>
 <p>&nbsp;</p>
<p>&nbsp;</p>
 <p>&nbsp;</p>
<p>&nbsp;</p>
 <p>&nbsp;</p>
<p>&nbsp;</p>


      <div id="footer">
            <div>
                <div id="connect">
                    <a href="http://facebook.com/freewebsitetemplates" target="_blank"><img src="http://localhost/adib/images/facebook.jpg" alt="Facebook" /></a>
                    <a href="http://twitter.com/fwtemplates" target="_blank"></a>
                    <a href="http://www.youtube.com/fwtemplates" target="_blank"></a>                </div>
                <div class="section">
                  <p>Developed by:Md. Adib hasan, Marufa Khanam, Summaya Jahan, Shapla Rani Goash. &copy; Copyrght   Reserved for MBSTU.</p>
              </div>
            </div>
      </div>
</body>
</html>
<?php ob_flush(); ?>