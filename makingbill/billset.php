<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/Billset</title>
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
echo "<a href = \"$self?id=$id\">Select</a>"; ?></h6></th></tr>  
<?php }

?>

</table>
</div> <br/>
<div align="center">
<?php if(isset($_GET['id'])){
    $ids=$_GET['id']; ?>



<table align="center" bgcolor="#4C7D7E"><form method="post" action="billinsert.php">

<tr><th align="left"><p>Select event:</p></th><td>
<select name="event">
<?php 
$ev=mysql_query("select *from honorarium_info order by event_name asc");
while($event=mysql_fetch_array($ev)){?>
  <option value="<?php echo $event['honorarium_id'];?>"><?php echo $event['event_name'];?></option>  
<?php }




?>
</select>
</td></tr>
<tr><th align="left"><p>Select course:</p></th><td>
<select name="course">
<option value=" "></option>
<?php 
$co=mysql_query("select *from existingcourse order by session asc,course_code asc");
while($course=mysql_fetch_array($co)){?>

<option value="<?php echo $course['excourse_id'];?>"><?php echo "Session:".$course['session']." "."Course code:".$course['course_code']; ?></option>

<?php }
?>
</select>

</td></tr>
<tr><th align="left"><p>Select class test no:</p></th><td>
<select name="classtest">
<option value="">Select class test if necessary</option>
<option value="Classtest no: 01">Classtest no: 01</option>
<option value="Classtest no: 02">Classtest no: 02</option>
<option value="Classtest no: 03">Classtest no: 03</option>
<option value="Classtest no: 04">Classtest no: 04</option>
<option value="Classtest no: 05">Classtest no: 05</option>
<option value="Classtest no: 06">Classtest no: 06</option>
<option value="Classtest no: 07">Classtest no: 07</option>
</select>

</td></tr>
<tr><th align="left"><p>Total examinee:</p></th><td><input type="text" name="examinee"></td></tr>
<tr><th align="left"><p>Select teacher type:</p></th><td>
<select name="type">
<option value="">Select teacher type if necessary</option>
<option value="Internal">Internal</option>
<option value="External">External</option>
</select>

</td></tr>
<tr><th align="left"><p>Total internal</p></th><td><input type="text" name="internal"></td></tr>
<tr><th align="left"><p>Total external:</p></th><td><input type="text" name="external"></td></tr>
<tr><th align="left"><p>Demerage amount:</p></th><td><input type="text" name="demerage"></td></tr>
<tr><th align="left"><p>Cause for demerage:</p></th><td><input type="text" name="demcause"></td></tr>
<tr><th align="left"><p>Insidental charge:</p></th><td><input type="text" name="incidentalcharge"></td></tr>
<tr><th align="left"><p>Vowcher no:</p></th><td><input type="text" name="vowcher"></td></tr>
<input type="hidden" name="examinerid" value="<?php echo "$ids";?>"></td></tr>
<tr><th align="left"><input type="submit" name="adib" value="Save"/><input type="submit" name="asif" value="Cancel"/></th></tr> </form>
</table> <?php } ?>
</div> <br/>
<div align="center">
<table bgcolor="#CFECEC" align="center">
<tr><th style="background-color:#383838 ;"><p>Teacher name</p></th><th style="background-color:#383838 ;"><p>Address</p></th><th style="background-color:#383838 ;"><p>Designation</p></th><th style="background-color:#383838 ;"><p>Department name</p></th><th style="background-color:#383838 ;"><p>Exam name</p></th><th style="background-color:#383838 ;"><p>Session</p></th><th style="background-color:#383838 ;"><p>Course code</p></th><th style="background-color:#383838 ;"><p>Click to</p></th></tr>
<?php 
 $result=mysql_query("select *from generatebill");
while($rows=mysql_fetch_array($result)){
    $idm=$rows['bill_id'];
    $courseid=$rows['excourse_id'];
    $examinerid=$rows['examiner_id'];
    $sem=$_SERVER['PHP_SELF'];
    /* Department */
    $depat=mysql_query("select *from examiner where examiner_id='$examinerid'");
    $department=mysql_fetch_array($depat);
    $departmentid=$department['department_id'];
    $departmentname=mysql_fetch_array(mysql_query("select *from department where department_id='$departmentid'"));
    
    /* Teacher name*/
    $teacherid=$department['teacher_id']; 
    $teachername=mysql_fetch_array(mysql_query("select *from teacher where teacher_id='$teacherid'"));
    /*Course id*/
    $coursecode=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseid'"));
    /*Exam name session*/
    $examid=$department['exam_id'];
    $examination=mysql_fetch_array(mysql_query("select *from examname where exam_id='$examid'")); 
    
     
       ?>
    
   <tr>
   <th align="left" style="background-color:#5E767E;"><h6><?php echo $teachername['teacher_name'];?></h6></th>
   <th align="left" style="background-color:#5E767E;"><h6><?php echo $teachername['address'];?></h6></th>
   <th align="left" style="background-color:#5E767E;"><h6><?php echo $teachername['designation'];?></h6></th>
   <th align="left" style="background-color:#5E767E;"><h6><?php echo $departmentname['department_name'];?></h6></th>
   <th align="left" style="background-color:#5E767E;"><h6><?php echo $examination['year']." ".$examination['semester']." ".$examination['category']."examination".$examination['examyear'];?></h6></th>
   <th align="left" style="background-color:#5E767E;"><h6><?php echo $examination['session'];?></h6></th>
   <th align="left" style="background-color:#5E767E;"><h6><?php echo $coursecode['course_code'];?></h6></th>
   <th align="left" style="background-color:#5E767E;"><h6><?php 
echo "<a href = \"$sem?day=$idm\">Update</a>"." "."/"." ";
echo "<a href = \"$sem?may=$idm\">Delete</a>"; ?></h6></th>
   </tr>  
<?php }
if(isset($_GET['may'])){
$del=$_GET['may'];
mysql_query("delete from generatebill where bill_id='$del'");
header("Location:billset.php");}

?>

</table>
</div> <br/>
<div align="center">
<?php if(isset($_GET['day'])){
    $idms=$_GET['day'];
    $ron=mysql_query("select *from generatebill where bill_id='$idms'");
    $POST=mysql_fetch_array($ron);
    
     $type=$POST['type'];
     $honorariumid=$POST['honorarium_id'];  
     $honorarium=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honorariumid' "));
     $excourse_id=$POST['excourse_id'];
     $coursename=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$excourse_id'")); 
     $classtest_no=$POST['classtest_no'];
     $examinee=$POST['examinee'];
     $internal=$POST['internal'];
     $external=$POST['external'];
     $demerage=$POST['demerage'];
     $demerege_cause=$POST['demerage_cause'];
     $incidental_charge=$POST['incidental_charge'];
     $vowcher_no=$POST['vowcher_no'];
     $examiner_id=$POST['examiner_id'];
     ?>
    


<table align="center" bgcolor="#4C7D7E"><form method="post" action="billupdate.php">

<tr><th align="left"><p>Select event:</p></th><td>
<select name="event">
<option value="<?php echo $honorarium['honorarium_id'];?>"><?php echo $honorarium['event_name'];?></option>
<?php
 
$ev=mysql_query("select *from honorarium_info order by event_name asc");
while($event=mysql_fetch_array($ev)){?>
  <option value="<?php echo $event['honorarium_id'];?>"><?php echo $event['event_name'];?></option>  
<?php }




?>
</select>
</td></tr>
<tr><th align="left"><p>Select course:</p></th><td>
<select name="course">
<option value="<?php echo $coursename['excourse_id'];?>"><?php echo "Session:".$coursename['session']." "."Course code:".$coursename['course_code']; ?></option>
<?php 
$co=mysql_query("select *from existingcourse order by session asc,course_code asc");
while($course=mysql_fetch_array($co)){?>

<option value="<?php echo $course['excourse_id'];?>"><?php echo "Session:".$course['session']." "."Course code:".$course['course_code']; ?></option>

<?php }
?>
</select>

</td></tr>
<tr><th align="left"><p>Select class test no:</p></th><td>
<select name="classtest">
<option value="<?php echo "$classtest_no";?>"><?php echo "$classtest_no";?></option>
<option value="Classtest no: 01">Classtest no: 01</option>
<option value="Classtest no: 02">Classtest no: 02</option>
<option value="Classtest no: 03">Classtest no: 03</option>
<option value="Classtest no: 04">Classtest no: 04</option>
<option value="Classtest no: 05">Classtest no: 05</option>
<option value="Classtest no: 06">Classtest no: 06</option>
<option value="Classtest no: 07">Classtest no: 07</option>
</select>

</td></tr>
<tr><th align="left"><p>Total examinee:</p></th><td><input type="text" name="examinee" value="<?php echo "$examinee"; ?>"></td></tr>
<tr><th align="left"><p>Select teacher type:</p></th><td>
<select name="type">
<option value="<?php echo "$type";?>"><?php echo "$type";?></option>
<option value="Internal">Internal</option>
<option value="External">External</option>
</select>

</td></tr>
<tr><th align="left"><p>Total internal</p></th><td><input type="text" name="internal" value="<?php echo "$internal";?>"></td></tr>
<tr><th align="left"><p>Total external:</p></th><td><input type="text" name="external" value="<?php echo "$external";?>"></td></tr>
<tr><th align="left"><p>Demerage amount:</p></th><td><input type="text" name="demerage" value="<?php echo "$demerage";?>"></td></tr>
<tr><th align="left"><p>Cause for demerage:</p></th><td><input type="text" name="demcause" value="<?php echo "$demerege_cause";?>"></td></tr>
<tr><th align="left"><p>Insidental charge:</p></th><td><input type="text" name="incidentalcharge" value="<?php echo "$incidental_charge";?>"></td></tr>
<tr><th align="left"><p>Vowcher no:</p></th><td><input type="text" name="vowcher" value="<?php echo "$vowcher_no";?>"></td></tr>
<input type="hidden" name="billid" value="<?php echo "$idms";?>"></td></tr>
<tr><th align="left"><input type="submit" name="adib" value="Update"/><input type="submit" name="asif" value="Cancel"/></th></tr> </form>
</table> <?php } ?>
</div>  
?>    <p>&nbsp;</p>
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