<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/Examiner</title>
<link rel="stylesheet" type="text/css" href="http://localhost/adib/style/style.css" />
<!--[if IE 6]>
        <link rel="stylesheet" type="text/css" href="ie6.css" />
    <![endif]-->
<script type='text/javascript'> 
function hideDiv() { 
if (document.getElementById) { 
document.getElementById('div').style.visibility = 'hidden';
}  
} 
function showDiv() { 
if (document.getElementById) { 
document.getElementById('div').style.visibility = 'visible';

} 
} 
</script>

</head>
<body onload="javascript:hideDiv()" >
    <div id="page">
      <div id="header">
        <div id="section">
          <div><img src="http://localhost/adib/images/Movie2.gif" alt="Logo" width="602" /></div>      <img src="http://localhost/adib/images/Movie3.gif" /> 
          <span><br />
          <br />
        </span> </div>
        <ul>          <li><a href="http://localhost/adib/home1.php">Home</a></li>
          <li><a href="http://localhost/adib/university/university.php">University</a></li>
          <li><a href="http://localhost/adib/faculty/faculty.php">Faculty</a></li>
          <li><a href="http://localhost/adib/department/department.php">Department</a></li>
          <li><a href="http://localhost/adib/teacher/teacher.php">Teacher</a></li>
          <li><a href="http://localhost/adib/examiner/examiner.php">Examiner</a></li>
          <li><a href="http://localhost/adib/president/president.php">President</a></li>
          <li><a href="http://localhost/adib/honorium/honorium.php">Honorarium</a></li>
          <li><a href="http://localhost/adib/courseinfo/courseinfo.php">Courses</a></li>
          <li><a href="http://localhost/adib/existingcourse/existingcourse.php">Current courses</a></li>
          <li><a href="http://localhost/adib/makingbill/billset.php">Make a bill</a></li>
          <li><a href="http://localhost/adib/examiner/examinerbill.php">Print bill</a></li> 
          <li><a href="http://localhost/adib/logout.php">Logout</a></li>
        </ul>

      </div>
<?php include('databaseConnection.php');?>
 <br/>


<div align="center">

<table table bgcolor="#4C7D7E" align="center">
<form method="post" action="mainbill.php" target="_blank">
<tr><th align="left" style="background-color:#5E767E;">Department name</th><th align="left" style="background-color:#5E767E;">Examiner name</th><th align="left" style="background-color:#5E767E;">Exam name</th><th align="left" style="background-color:#5E767E;">Click to</th></tr>
<?php    $examinerids=mysql_query("select *from examiner");  
while($examinid=mysql_fetch_array($examinerids)){
$departmentid=$examinerids['examiner_id'];
$departmentid=$examinerids['department_id'];
$departmentid=$examinerids['exam_id'];
$departmentid=$examinerids['teacher_id'];  ?>
<tr>
<th align="left" style="background-color:#5E767E;"><?php $dep=mysql_fetch_array(mysql_query("select *from department where department_id='$departmentid'"));
echo $dep['department_name'];?></th>
<th align="left" style="background-color:#5E767E;"></th><th align="left" style="background-color:#5E767E;"><?php $te=mysql_fetch_array(mysql_query("select *from teacher where teacher_id='$departmentid'"));
echo $te['teacher_name'];?></th><th align="left" style="background-color:#5E767E;">Click to</th></tr>
<?php }

?>
</form>
</table>
<div>


p>&nbsp;</p>
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