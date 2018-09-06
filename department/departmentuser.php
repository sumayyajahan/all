<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/Department</title>
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
<div align="genter">
<p>
<table bgcolor="#CFECEC" align="center">
<tr><th style="background-color:#383838 ;"><p>University name</p></th><th style="background-color:#383838 ;"><p>Faculty name</p></th><th style="background-color:#383838 ;"><p>Department name</p></th>
</tr>
<?php
include("databaseConnection.php");
 $re=mysql_query("SELECT *FROM department order by faculty_id asc, department_name asc"); 
 while($row=mysql_fetch_array($re)){
     $id = $row["department_id"];
     $facultyid=$row['faculty_id'];
     $universit=mysql_fetch_array(mysql_query("select *from faculty where faculty_id='$facultyid'"));
     $universityid=$universit['university_id'];
     $rown=mysql_fetch_array(mysql_query("select *from university where university_id='$universityid'"));
     $uni=$rown['university_name'];
     $self = $_SERVER['PHP_SELF'];
     $str1=str_replace("AND","","$uni"); 
     $str=str_replace("&","","$str1");
     $words = explode(" ", $str);
     $letters = "";
foreach ($words as $value) {
    $letters .= substr($value, 0, 1);
}

     
     ?><tr><td align="left" style="background-color:#5E767E;"><p><?php echo "$letters";?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $universit['faculty_name'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['department_name'];?></p></td>

<?php
}
?>
</tr>

</table></p>
</div><br/>
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