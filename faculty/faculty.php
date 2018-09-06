<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/Faculty</title>
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
<tr><th style="background-color:#383838 ;"><p>University name</p></th><th style="background-color:#383838 ;"><p>Faculty name</p></th>
<th style="background-color:#383838 ;">
<button onclick="javascript:showDiv()">Add new</button>
</th></tr>
<?php
include("databaseConnection.php");
 $re=mysql_query("SELECT *FROM faculty order by university_id asc,faculty_id asc"); 
 while($row=mysql_fetch_array($re)){
     $id = $row["faculty_id"];
     $universityid=$row["university_id"];
     $univ=mysql_query("select *from university where university_id='$universityid'");
     $university=mysql_fetch_array($univ);
     $self = $_SERVER['PHP_SELF'];
     
     ?><tr><td align="left" style="background-color:#5E767E;"><p><?php echo $university['university_name'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['faculty_name'];?></p></td>
     <td style="background-color:#B38481;">
<?php
echo "<a href = \"$self?di=$id\">Update</a>"."/"; 
echo "<a href = \"$self?id=$id\">Delete</a>";}
?>
</td></tr>
</table></p>
</div><br/>
<div align="center" id="div">
   <?php $result=mysql_query("SELECT *FROM university");?>
      <form method="post" action="facultyInsert.php">

   <table align="center" border="1"> 
   <tr><td style="background-color:#4C7D7E;">
 <table bgcolor="#4C7D7E"><br>
 <tr><th>Select university:</th>
 <td>   <select name="select" ><?php
 while($row=mysql_fetch_array($result))
 {
   ?> 
   <option value="<?php echo $row['university_id']; ?>"><?php echo $row['university_name']; ?></option>
 

    <?php }?>

</select></td>
 </tr>
  <tr><td><p>Faculty name:</p></td><td>
  <input type="text" name="facultyname" maxlength="100" size="55"></td></tr>
  <tr><td><br><input type="submit" name="adib" value="Save "/><?php echo " ";?><input type="submit" name="asif" value="Cancel"/>
  </form>
  
  </td></tr>
 </table></td></tr></table>
</div>

<?php 
if(isset ($_GET['id']))
{
$id = $_GET['id']; 
  $faculty=mysql_query("select faculty_name from faculty where faculty_id='$id'");
$row3=mysql_fetch_array($faculty);
   $facult= $row3["faculty_name"];
?>
<div align="center" id="marufa"><table align="center" bgcolor="#4C7D7E"><tr><th>
<h4>Want to delete</h4>
<p><?php echo "$facult"." "."?"; ?></p> 
<form method="post" action="deletefaculty.php">
<input type="hidden" name="facultyname" value="<?php echo "$id"; ?>"/></th></tr>
<tr><th align="left">
<input type="submit" align="left" name="adib" value="Yes"/><?php echo " ";?><input type="submit" align="left" name="asif" value="No"/>

</form></th></tr></table>

<?php }?> </div>

<?php 
if(isset ($_GET['di']))
{  $di=$_GET['di'];
   $uni=mysql_query("select *from faculty where faculty_id='$di'");

   $row2=mysql_fetch_array($uni);
   $universityoldname = $row2["university_id"];
   $facultyoldname=$row2['faculty_name'];
    ?>

   
   
      
<div align="center" id="vid">
<p>
<table border="1">
<th></td>  <?php $result2=mysql_query("SELECT *FROM university where university_id!='$universityoldname'");?>
           <table align="center" bgcolor="#4C7D7E"><tr><td><p>Selected university:</p></td><td>  
          <form method="post" action="facultyupdate_database.php"><br/>
   <select name="elect" >
   <option value="<?php $a=mysql_fetch_array(mysql_query("select *from university where university_id='$universityoldname'"));
   echo $a['university_id']; ?>"><?php echo $a['university_name']; ?></option>
   <?php
 while($row2=mysql_fetch_array($result2))
 {
   ?> 
   <option value="<?php echo $row2['university_id']; ?>"><?php echo $row2['university_name']; ?></option>
 

    <?php }?>

</select> </td></tr><tr>          <td><p>Edited faculty name:</p></td> <td>
          <input type="hidden" name="facultyno" value="<?php echo "$di"; ?>">
          <input type="text" name="facultynewname" maxlength="100" size="55" value="<?php echo "$facultyoldname"; ?>" ></td></tr>
          <tr><td>
          <input type="submit" name="adib" value="Update"><?php echo " ";?><input type="submit" name="asif" value="Cancel"><td></tr>
          </form></table>
</td></tr></table></div>
   
 
   
 </p>   
<?php }
?>



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