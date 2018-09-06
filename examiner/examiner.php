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
<?php include('databaseConnection.php');?>
<div><table bgcolor="#4C7D7E" align="center">
<form method="post" action="examinerinsert.php">
<tr><th align="left"><p>Select only assigned department:</p></th><td>
<select name="department">
<option value="no"></option>
<?php
$de=mysql_query("select *from department order by faculty_id asc, department_name asc");
while($drow=mysql_fetch_array($de)){ ?>
    
    
 <option value="<?php echo $drow['department_id'];?>"><?php echo $drow['department_name'];?></option>   
    
<?php }
 ?>
</select>

</td></tr>
<tr><th align="left"><p>Select exam:</p></th><td>
<select name="examname">
<option value="no"></option>
<?php 
$ex=mysql_query("select *from examname order by year asc,semester asc,category asc,session asc,examyear asc");
while($exrow=mysql_fetch_array($ex)){?>
    
  <option value="<?php echo $exrow['exam_id']; ?>"><?php  echo $exrow['year']." ".$exrow['semester']." ".$exrow['category']." "."examination"." ".$exrow['examyear']."<-->"."Session:".$exrow['session']; ?></option>
    
    <?php }

?>

</select>

</td></tr>
<tr><th align="left"><p>Select teacher:</p></th><td>
<select name="teacher">
<option value="no"></option>
<?php
$te=mysql_query("select *from teacher order by teacher_name asc,designation asc,address asc");
while($terow=mysql_fetch_array($te)){?>
 
<option value="<?php echo $terow['teacher_id']; ?>"><?php echo $terow['teacher_name']."<<-->>"."Address:".$terow['address']."<<-->> "."E_Mail:".$terow['e_mail']; ?></option>  
    
<?php }

 ?>
</select>
</td></tr>
<tr><th align="left"><input type="submit" name="adib" value="Save"></th></tr>
</form> </table>

</div>
<br/>





<div align="center">
<table bgcolor="#CFECEC" align="center">
<tr><th style="background-color:#383838 ;"><p>Department name</p></th><th style="background-color:#383838 ;"><p>Exam name</p></th><th style="background-color:#383838 ;"><p>Session</p></th><th style="background-color:#383838 ;"><p>Teacher name</p></th><th style="background-color:#383838 ;"><p>Address</p></th><th style="background-color:#383838 ;"><p>Click to</p></th></tr>
<?php  
$re=mysql_query("select *from examiner");
while($row=mysql_fetch_array($re)){
    $id=$row['examiner_id'];
    $deptid=$row['department_id'];
    $exmid=$row['exam_id'];
    $teacherid=$row['teacher_id']; 
    $self=$_SERVER['PHP_SELF'];   ?>
    
   <tr><th align="left" style="background-color:#5E767E;"><h6><?php 
   $dept=mysql_query("select department_name from department where department_id='$deptid'");
   $deptm=mysql_fetch_array($dept);
   echo $deptm['department_name'];
   
   
   ?></h6></th><th align="left" style="background-color:#5E767E;"><h6><?php
   
    $exam=mysql_query("select *from examname where exam_id='$exmid'");
    $examname=mysql_fetch_array($exam);
    echo $examname['year']." ".$examname['semester']." ".$examname['category']." ".$examname['examyear'];
   
   ?></h6></th><th align="left" style="background-color:#5E767E;"><h6><?php echo $examname['session'];  ?></h6></th><th align="left" style="background-color:#5E767E;"><h6><?php     $teac=mysql_query("select *from teacher where teacher_id='$teacherid'");
    $teacher=mysql_fetch_array($teac);
    echo $teacher['teacher_name']; ?></h6></th><th align="left" style="background-color:#5E767E;"><h6><?php 
   

   
       echo $teacher['address'];
   
      ?></h6></th><th align="center" style="background-color:#B38481;"><h6><?php 
echo "<a href = \"$self?id=$id\">Delete</a>"; ?></h6></th></tr>  
<?php }
if(isset($_GET['id'])){
    $ids=$_GET['id'];
    mysql_query("delete from examiner where examiner_id ='$ids'");
    header("Location:examiner.php");
}
?>

</table>
</div> <p>&nbsp;</p>
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