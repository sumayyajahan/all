<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/Teacher</title>
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
<?php include("databaseConnection.php"); ?> 
<div align="center"><p>
<table bgcolor="#CFECEC" align="center">
<tr><th style="background-color:#383838 ;"><p>Department name</p></th><th style="background-color:#383838 ;"><p>Teacher name</p></th><th style="background-color:#383838 ;"><p>Address</p></th><th style="background-color:#383838 ;"><p>Teacher type</p></th><th style="background-color:#383838 ;"><p>Designation</p></th><th style="background-color:#383838 ;"><p>E-Mail</p></th><th style="background-color:#383838 ;"><p>Mobile no</p></th></tr>
<?php
 $re=mysql_query("SELECT *FROM teacher order by department_id asc,teacher_name asc,teacher_type asc,designation asc"); 
 while($row=mysql_fetch_array($re)){
     $id = $row["teacher_id"];
     $did=$row["department_id"];
     $as=mysql_query("select *from department where department_id='$did'");
     $asd=mysql_fetch_array($as);
     ?><tr><td align="left" style="background-color:#5E767E;"><p>
     <?php 
     $st1=$asd['department_name'];
     $st2=str_replace("AND","","$st1");
     $st3=str_replace("&","","$st2");
         $words = explode(" ", $st3);
     $lett = "";
foreach ($words as $value) {
    $lett .= substr($value, 0, 1);
}
      
    echo "$lett"; ?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['teacher_name'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['address'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['teacher_type'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['designation'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['e_mail'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['mobile_no'];?></p></td> 

 <?php }?>



</table> </p>
</div>

 


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