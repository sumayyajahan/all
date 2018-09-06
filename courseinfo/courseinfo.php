<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/Courses</title>
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
 <ul>
          <li><a href="http://localhost/adib/home1.php">Home</a></li>
          <li><a href="http://localhost/adib/university/university.php">University</a></li>
          <li><a href="http://localhost/adib/faculty/faculty.php">Faculty</a></li>
          <li><a href="http://localhost/adib/department/department.php">Department</a></li>
          <li><a href="http://localhost/adib/examname/examname.php">Exam name</a></li> 
          <li><a href="http://localhost/adib/teacher/teacher.php">Teacher</a></li>
          <li><a href="http://localhost/adib/examiner/examiner.php">Examiner</a></li>
          <li><a href="http://localhost/adib/president/president.php">President</a></li>
          <li><a href="http://localhost/adib/honorium/honorium.php">Honorarium</a></li>
          <li><a href="http://localhost/adib/courseinfo/courseinfo.php">Courses</a></li>
          <li><a href="http://localhost/adib/existingcourse/existingcourse.php">Current courses</a></li>
          <li><a href="http://localhost/adib/makingbill/billset.php">Make a bill</a></li>
          <li><a href="http://localhost/adib/billprint/billprint.php">Print bill</a></li>
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
<tr><th style="background-color:#383838 ;"><p>Year</p></th><th style="background-color:#383838 ;"><p>Semester</p></th><th style="background-color:#383838 ;"><p>Course title</p></th><th style="background-color:#383838 ;"><p>Course code</p></th><th style="background-color:#383838 ;"><p>Credit hour</p></th><th style="background-color:#383838 ;"><button onclick="javascript:showDiv()">Add new</button></th></tr>
<?php
$re=mysql_query("select *from course_info where department_id='$sid'");
while($row=mysql_fetch_array($re))
{
    $id = $row["course_id"];
     $self = $_SERVER['PHP_SELF'];
    ?>
<tr><td align="left" style="background-color:#5E767E;"><p><?php echo $row['year'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['semester'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['course_title'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['course_code'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['credit_hour'];?></p></td><td style="background-color:#B38481;"><?php 
echo "<a href = \"$self?di=$id\">Update</a>"."/"; 
echo "<a href = \"$self?id=$id\">Delete</a>";}
?></td></tr> <?php }
 

if(isset ($_GET['id']))
{

$id = $_GET['id'];

// --------- here code to connect to mysql and select database -----------

$query= mysql_query("delete FROM course_info where course_id ='$id'");
header('Location:http:courseinfo.php');
}
 ?>
</table>
</p></div>  

<div align="center" id="div">
<p><table border="1"><tr><td><table bgcolor="#4C7D7E" align="center">
<tr><th align="left"><?php echo "$dept"; ?></th></tr>
<form method="post" action="courseinsert.php"><input type="hidden" name="department" value="<?php echo "$dept";?>">
<tr><th align="left"><p>Course title:</p></th><td><input type="text" name="coursetitle" maxlength="100" size="55"></td></tr>
<tr><th align="left"><p>Course code:</p></th><td><input type="text" name="coursecode" maxlength="100" size="55"></td></tr>

<tr><th align="left"><p>Select year:</p></th><td><select name="year">
<option value="1st Year">1st Year</option>
<option value="2nd Year">2nd Year</option>
<option value="3rd Year">3rd Year</option>
<option value="4th Year">4th Year</option>
</select></td></tr>

<tr><th align="left"><p>Select semester:</p></th><td>
<select name="semester">
<option value="1st Semester">1st Semester</option>
<option value="2nd Semester">2nd Semester</option>
</select>
</td></tr>
<tr><th align="left"><p>Credit hour:</p></th><td><input type="text" name="credithour" maxlength="100" size="55">
</td></tr>
<tr><th align="left"><input type="submit" name="adib" value="Save"><?php echo " "; ?><input type="submit" name="asif" value="Cancel"></th></tr></form>
</table></td></tr></table></p>
</div>

<?php 

if(isset ($_GET['di'])){
  $di = $_GET['di'];  
  $tulip=mysql_query("select *from course_info where course_id='$di'");
  $lily=mysql_fetch_array($tulip);
  $coursetitle=$lily['course_title'];
  $coursecode=$lily['course_code'];
  $credithour=$lily['credit_hour'];
  $year=$lily['year'];
  $semester=$lily['semester'];
  
  ?>
  
  <div align="center" id="vid"><p>
<table border="1"><tr><td>
<table align="center" bgcolor="#4C7D7E">
<form method="post" action="update_course.php">
<input type="hidden" name="sino" value="<?php echo "$di";?>">
<tr><th align="left"><p>Course title:</p></th><td><input type="text" name="coursetitle" maxlength="100" size="55" value="<?php echo "$coursetitle";?>"></td></tr>
<tr><th align="left"><p>Course code:</p></th><td><input type="text" name="coursecode" maxlength="100" size="55" value="<?php echo "$coursecode";?>"></td></tr>
<tr><th align="left"><p>Credit hour:</p></th><td><input type="text" name="credithour" maxlength="100" size="55" value="<?php echo "$credithour";?>"></td></tr>
<tr><th align="left"><p>Year:</p></th><td><select name="years">
<option value="<?php  echo "$year"; ?>"><?php echo "$year"; ?></option>
<option value="1st Year">1st Year</option>
<option value="2nd Year">2nd Year</option>
<option value="3rd Year">3rd Year</option>
<option value="4th Year">4th Year</option>
</select>
</td></tr>
<tr><th align="left"><p>Semester:</p></th><td>
<select name="semesters">
<option value="<?php  echo "$semester"; ?>"><?php echo "$semester"; ?></option> 
<option value="1st Semester">1st Semester</option>
<option value="2nd Semester">2nd Semester</option>

</select>

</td></tr>
<tr><th align="left"><input type="submit" name="adib" value="Update"><input type="submit" name="asif" value="Cancel"></th></tr>
</form>
</table></td></tr></table></p>
</div>
    
<?php }
?>

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