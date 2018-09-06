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
<div align="center">
<p>
<table bgcolor="#CFECEC" align="center">
<tr><th style="background-color:#383838 ;"><p>Exam name</p></th><th style="background-color:#383838 ;"><p>Session</p></th><th style="background-color:#383838 ;">
<button onclick="javascript:showDiv()">Add new</button>
</th></tr>
<?php
include("databaseConnection.php");
 $re=mysql_query("SELECT *FROM examname order by year asc,semester asc, category asc, examyear asc"); 
 while($row=mysql_fetch_array($re)){
     $id = $row["exam_id"];
     $self = $_SERVER['PHP_SELF'];
     ?>
     <tr><td align="left" style="background-color:#5E767E;"><p><?php echo $row['year']." ".$row['semester']." ".$row['category']." "."examination"." ".$row['examyear'];?></p></td>
     <td align="left" style="background-color:#5E767E;"><p><?php echo $row['session']; ?></p></td>
     <td style="background-color:#B38481;">
<?php 
echo "<a href = \"$self?id=$id\">Delete</a>";} ?>

</td></tr>
</table></p>
</div><br/>
<div align="center" id="div">
   <form method="post" action="examInsert.php">
   <table align="center" border="1"> 
   <tr><td style="background-color:#4C7D7E;">
 <table bgcolor="#4C7D7E"><br>
 <tr><th align="left"><p>Select year:</p></th><td>
 <select name="year">
 <option value="1st Year">1st Year</option>
 <option value="2nd Year">2nd Year</option>  
 <option value="3rd Year">3rd Year</option>  
 <option value="4th Year">4th Year</option>  
 </select>
 
 </td></tr>
 <tr><th align="left"><p>Select semester:</p></th><td>
  <select name="semester">
 <option value="1st semester">1st semester</option>
 <option value="2nd semester">2nd semester</option>  
  
 </select>
 
 </td></tr> 
 <tr><th align="left"><p>Select category:</p></th><td>
  <select name="category">
 <option value="BSc. Engg.">BSc. Engg.</option>
 <option value="BSc. Hons.">BSc. Hons.</option>  
 <option value="MSc.">MSc.</option>    
 </select>
 
 
 </td></tr> 
 <tr><th align="left"><p>Enter exam year:</p></th><td><input type="text" name="examyear"></td></tr>  
 <tr><th align="left"><p>Enter session:</p></th><td><input type="text" name="session"></td></tr>    
 <tr><td align="left"><input type="submit" value="Save"/></td></tr>   
</table> </form>
</div>
<?php 
if(isset ($_GET['id']))
{
$id = $_GET['id']; 
mysql_query("delete from examname where exam_id='$id'");
header("Location:examname.php"); 

}
?>



   
   
 <p>&nbsp;</p>
<p>&nbsp;</p>


      <div id="footer">
            <div>
                <div id="connect">
                    <a href="http://facebook.com/freewebsitetemplates" target="_blank"><img src="http://localhost/adib/images/facebook.jpg" alt="Facebook" /></a>
                </div>
                <div class="section">
                  <p>Developed by:Md. Adib hasan, Marufa Khanam, Summaya Jahan, Shapla Rani Goash. &copy; Copyrght   Reserved for MBSTU.</p>
              </div>
            </div>
      </div>
</body>
</html>
<?php ob_flush(); ?>