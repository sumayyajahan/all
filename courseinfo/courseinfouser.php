<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/Courses</title>
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
<div><p>
<table bgcolor="#CFECEC" align="center">
<tr><th style="background-color:#383838 ;"><p>Department name</p></th><th style="background-color:#383838 ;"><p>For course info</p></th></tr>
<?php $fac=mysql_query("select *from department order by faculty_id asc, department_name asc");
while($rosa=mysql_fetch_array($fac)){
    $my=$rosa['department_id'];
    $selfish=$_SERVER['PHP_SELF'];?>
    <tr><td align="left" style="background-color:#5E767E;">
    <p><?php echo $rosa['department_name'];?></p></td><th style="background-color:#B38481;"><?php echo "<a href = \"$selfish?sid=$my\">Click here</a>";?></th></tr>
<?php }?>
</table>
</p></div>
<?php if(isset ($_GET['sid'])){
    $sid=$_GET['sid'];
   $raw=mysql_query("select *from department where department_id='$sid'");
   $rawn=mysql_fetch_array($raw);
   $dept=$rawn["department_name"];
?><div><p>
<table bgcolor="#CFECEC" align="center">
<tr><th style="background-color:#383838 ;"><p>Year</p></th><th style="background-color:#383838 ;"><p>Semester</p></th><th style="background-color:#383838 ;"><p>Course title</p></th><th style="background-color:#383838 ;"><p>Course code</p></th><th style="background-color:#383838 ;"><p>Credit hour</p></th></tr>
<?php
$re=mysql_query("select *from course_info where department_id='$sid'");
while($row=mysql_fetch_array($re))
{
    $id = $row["course_id"];
 ?>
<tr><td align="left" style="background-color:#5E767E;"><p><?php echo $row['year'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['semester'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['course_title'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['course_code'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['credit_hour'];?></p></td>
<?php 
}
?></tr> <?php }
 


 ?>
</table>
</p></div>  

 



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