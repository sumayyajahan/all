<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/University</title>
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
          <div><img src="http://localhost/adib/images/Movie2.gif" alt="Logo" width="602" /></div><img src="http://localhost/adib/images/Movie3.gif" />
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
<tr><th style="background-color:#383838 ;"><p>University name</p></th><th style="background-color:#383838 ;">
<button onclick="javascript:showDiv()">Add new</button>
</th></tr>
<?php
include("databaseConnection.php");
 $re=mysql_query("SELECT *FROM university order by university_name asc"); 
 while($row=mysql_fetch_array($re)){
     $id = $row["university_id"];
     $self = $_SERVER['PHP_SELF'];
     ?>
     <tr><td align="left" style="background-color:#5E767E;"><p><?php echo $row['university_name'];?></p></td>
     <td style="background-color:#B38481;">
<?php
echo "<a href = \"$self?di=$id\">Update</a>"."/"; 
echo "<a href = \"$self?id=$id\">Delete</a>";} ?>

</td></tr>
</table></p>
</div><br/>
<div align="center" id="div">
   <form method="post" action="universityInsert.php">
   <table align="center" border="1"> 
   <tr><td style="background-color:#4C7D7E;">
 <table bgcolor="#4C7D7E"><br>
  <tr><td><p>University name:</p></td><td>
  <input type="text" name="universityname" maxlength="100" size="55"></td></tr>
  <tr><td><br><input type="submit" name="adib" value="Save "><?php echo " "; ?><input type="submit" name="asif" value="Cancel">
  </form>
  </td></tr>
 </table></td></tr></table>
</div>
<?php 
if(isset ($_GET['id']))
{
$id = $_GET['id']; 
  $university=mysql_query("select university_name from university where university_id='$id'");
$row3=mysql_fetch_array($university);
   $unive= $row3["university_name"];
?>
<div align="center" id="marufa"><table align="center" bgcolor="#4C7D7E"><tr><th>
<h4>Want to delete</h4>
<p><?php echo "$unive"." "."?"; ?></p> 
<form method="post" action="deleteuniversity.php">
<input type="hidden" name="universityname" value="<?php echo "$id"; ?>"/></th></tr>
<tr><th align="left">
<input type="submit" align="left" name="adib" value="Yes"/> <?php  echo " "; ?>
<input type="submit" align="left" name="asif" value="No"/>
</form></th></tr></table>

<?php }?> </div>
<?php
if(isset ($_GET['di']))
{  $di=$_GET['di'];
   $uni=mysql_query("select university_name from university where university_id='$di'");
$row2=mysql_fetch_array($uni);
   $universityoldname = $row2["university_name"];
    ?>
<div align="center" id="vid">
<p>
<table border="1">
<th></td>
           <table align="center" bgcolor="#4C7D7E"><tr><td>  
          <form method="post" action="universityupdate_database.php">
          <input type="hidden" name="elect" value="<?php echo "$universityoldname";?>"/><br/>
           </td></tr><tr><td><p>Edited university name:</p></td> <td>
          <input type="text" name="universitynewname" maxlength="100" size="70" value="<?php echo "$universityoldname";?>" /></td></tr>
          <tr><td>
          <input type="submit" name="adib" value="Update"><?php echo " ";?><input type="submit" name="asif" value="Cancel"><td></tr>
          </form></table>
</td></tr></table></div>
   
   
 </p>   
<?php }


?>    <p>&nbsp;</p>
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