<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/Teacher</title>
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
<div align="center"><p>
<table bgcolor="#CFECEC" align="center">
<tr><th style="background-color:#383838 ;"><p>Department name</p></th><th style="background-color:#383838 ;"><p>Teacher name</p></th><th style="background-color:#383838 ;"><p>Address</p></th><th style="background-color:#383838 ;"><p>Teacher type</p></th><th style="background-color:#383838 ;"><p>Designation</p></th><th style="background-color:#383838 ;"><p>E-Mail</p></th><th style="background-color:#383838 ;"><p>Mobile no</p></th><th style="background-color:#383838 ;"><button onclick="javascript:showDiv()">Add new</button></th></tr>
<?php
 $re=mysql_query("SELECT *FROM teacher order by department_id asc,teacher_name asc,teacher_type asc,designation asc"); 
 while($row=mysql_fetch_array($re)){
     $id = $row["teacher_id"];
     $did=$row["department_id"];
     $as=mysql_query("select *from department where department_id='$did'");
     $asd=mysql_fetch_array($as);
     

     
     $self = $_SERVER['PHP_SELF'];
     
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
     <td style="background-color:#B38481;">
<?php
echo "<a href = \"$self?di=$id\">Update</a>"."/"; 
echo "<a href = \"$self?id=$id\">Delete</a>"; ?>
</td></tr>
 <?php }

if(isset ($_GET['id']))
{

$id = $_GET['id'];

// --------- here code to connect to mysql and select database -----------

$query= mysql_query("delete FROM teacher where teacher_id ='$id'");
header('Location:http:teacher.php');
}
?>

</table> </p>
</div>

<div align="center" id="div"><p><table border="1"><tr><td>
<table bgcolor="#4C7D7E"> <form method="post" action="teacherinsert.php">
<tr><th align="left"><p>Teacher name:</p></th><td><input type="text" name="teachername" maxlength="100" size="55"></td></tr>
<tr><th align="left"><p>Address:</p></th><td><input type="text" name="address" size="55"></td></tr>
<tr><th align="left"><p>Mobile no:</p></th><td><input type="text" name="mobile" maxlength="100" size="55"></td></tr>
<tr><th align="left"><p>E-mail:</p></th><td><input type="text" name="email" maxlength="100" size="55"></td></tr>
<tr><th align="left"><p>Department name:</p></th><td>
<select name="select1">
<?php 
 $result1=mysql_query("select *from department order by faculty_id asc,department_name asc");
 while($row1=mysql_fetch_array($result1)){?>
     <option value="<?php echo $row1['department_id']; ?>"><?php  $facultyid=$row1['faculty_id'];
     $ut=mysql_fetch_array(mysql_query("select *from faculty where faculty_id='$facultyid'"));
     $universityid=$ut['university_id'];
     $universityname=mysql_fetch_array(mysql_query("select *from university where university_id='$universityid'"));
     $str1=$universityname['university_name'];
     $str2=str_replace("AND","","$str1");
     $str3=str_replace("&","","$str2");
          $words = explode(" ", $str3);
     $letters = "";
foreach ($words as $value) {
    $letters .= substr($value, 0, 1);
}
     echo "$letters";
     echo "<<---->>";
     echo $row1['department_name']; ?></option>
 <?php }
 
 ?>

</select>
</td></tr>



<tr><th align="left"><p>Teacher type:</p></th>
<td><select name="elect">
<option value="Permanent">Permanent</option> 
<option value="Guest">Guest</option> 
<option value="Other">Other</option> 
</select> </td></tr>
<tr><th align="left"><p>Designation:<p></th>
<td>  <select name="lect">
<option value="Lecturer">Lecturer</option> 
<option value="Assistant Professor">Assistant Professor</option> 
<option value="Associate Professor">Associate Professor</option>
<option value="Professor">Professor</option>
<option value="Other">Other</option> 
</select>

</td></tr>
<tr><th align="left"><input type="submit" name="adib" value="Save "><?php echo " ";?><input type="submit" name="asif" value="Cancel"></th></tr></form>
</table></td></tr></table></p>
</div>

<?php if(isset ($_GET['di']))
{
   $di = $_GET['di'];  
   $marufa=mysql_query("select * from teacher where teacher_id='$di'");
   $khanam=mysql_fetch_array($marufa);
   $teachername=$khanam['teacher_name'];
   $address=$khanam['address'];
   $mobile=$khanam['mobile_no'];
   $teachertype=$khanam['teacher_type'];
   $designation=$khanam['designation'];
   $email=$khanam['e_mail'];
   $departmentid=$khanam['department_id'];
   $uk=mysql_fetch_array(mysql_query("select *from department where department_id='$departmentid'"));

?>
<div align="center" id="vid"><p><table border="1"><tr><td>
<table bgcolor="#4C7D7E"> <form method="post" action="teacherupdate.php"> <input type="hidden" name="si" value="<?php echo "$di"; ?>">
<tr><th align="left"><p>Teacher name*:</p></th><td><input type="text" name="teachername" maxlength="100" size="55" value="<?php echo "$teachername";?>"></td></tr>
<tr><th align="left"><p>Address*:</p></th><td><input type="text" name="address" size="55" value="<?php echo "$address";?>"></td></tr>
<tr><th align="left"><p>Mobile no:</p></th><td><input type="text" name="mobile" maxlength="100" size="55" value="<?php echo "$mobile";?>"></td></tr>
<tr><th align="left"><p>E-mail:</p></th><td><input type="text" name="email" maxlength="100" size="55" value="<?php echo "$email";?>"></td></tr>
</td></tr> 
<tr><th align="left"><p>Department name:</p></th><td>
<select name="select1">
<option value="<?php

  echo "$departmentid";



 ?>"><?php 
 

     echo $uk['department_name'];
 
 
  ?></option>
<?php 
 $result1=mysql_query("select *from department order by faculty_id asc,department_name asc");
 while($row1=mysql_fetch_array($result1)){?>
     <option value="<?php echo $row1['department_id']; ?>"><?php  $facultyid=$row1['faculty_id'];
     $ut=mysql_fetch_array(mysql_query("select *from faculty where faculty_id='$facultyid'"));
     $universityid=$ut['university_id'];
     $universityname=mysql_fetch_array(mysql_query("select *from university where university_id='$universityid'"));
     $str1=$universityname['university_name'];
     $str2=str_replace("AND","","$str1");
     $str3=str_replace("&","","$str2");
          $words = explode(" ", $str3);
     $letters = "";
foreach ($words as $value) {
    $letters .= substr($value, 0, 1);
}
     echo "$letters";
     echo "<<---->>";
     echo $row1['department_name']; ?></option>
 <?php }
 
 ?>

</select>
</td></tr>
<tr><th align="left"><p>Teacher type*:</p></th>
<td><select name="elect">
<option value="<?php echo "$teachertype";?>" selected="selected"><?php echo "$teachertype"; ?></option> 
<option value="Permanent">Permanent</option> 
<option value="Guest">Guest</option> 
<option value="Other">Other</option> 
</select> </td></tr>
<tr><th align="left"><p>Designation* :</p></th>
<td>  <select name="lect">
<option value="<?php echo "$designation";?>" selected="selected"><?php echo "$designation"; ?></option> 
<option value="Lecturer">Lecturer</option> 
<option value="Assistant Professor">Assistant Professor</option> 
<option value="Associate Professor">Associate Professor</option>
<option value="Professor">Professor</option>
<option value="Other">Other</option> 
</select>

</td></tr>
<tr><th align="left">
<input type="submit" name="adib" value="Update"><?php echo " ";?><input type="submit" name="asif" value="Cancel"></th></tr></form>
</table></td></tr></table></p>
</div> <?php }?> 

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