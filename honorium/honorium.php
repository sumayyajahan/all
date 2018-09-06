<?php ob_start(); ?>
<html>
<head>
<title>Examinational gratification bill/Honorarium</title>
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
<tr><th style="background-color:#383838 ;"><p>Event name</p></th><th style="background-color:#383838 ;"><p>Amount</p></th>
<th style="background-color:#383838 ;">
<button onclick="javascript:showDiv()">Add new</button>
</th></tr>
<?php
include("databaseConnection.php");
 $re=mysql_query("SELECT *FROM honorarium_info order by event_name asc"); 
 while($row=mysql_fetch_array($re)){
     $id = $row["honorarium_id"];
     $self = $_SERVER['PHP_SELF'];
     
     ?><tr><td align="left" style="background-color:#5E767E;"><p><?php echo $row['event_name'];?></p></td><td align="left" style="background-color:#5E767E;"><p><?php echo $row['amount'];?></p></td>
     <td style="background-color:#B38481;">
<?php
echo "<a href = \"$self?di=$id\">Update</a>"."/"; 
echo "<a href = \"$self?id=$id\">Delete</a>";}

if(isset ($_GET['id']))
{

$id = $_GET['id'];

// --------- here code to connect to mysql and select database -----------

$query= mysql_query("delete FROM honorarium_info where honorarium_id ='$id'");
header('Location:http:honorium.php');
}
?>
</td></tr>

</table></p>
</div><br/>
<div align="center" id="div">
   <?php $result=mysql_query("SELECT *FROM honorarium_info order by event_name asc");?>
      <form method="post" action="honorariumInsert.php">

   <table align="center" border="1"> 
   <tr><td style="background-color:#4C7D7E;">
 <table bgcolor="#4C7D7E"><br>
 <tr><th><p>Enter event:</p></th>
 <td><input type="text" name="event" maxlength="100" size="55"></td>
 </tr>
  <tr><td><p>Enter amount:</p></td><td>
  <input type="text" name="amount" maxlength="55" size="55"></td></tr>
  <tr><td><br><input type="submit" name="adib" value="Save "><?php echo " ";?><input type="submit" name="asif" value="Cancel">
  </form>
  
  </td></tr>
 </table></td></tr></table>
</div>

<?php 
if(isset ($_GET['di']))
{  $di=$_GET['di'];
   $uni=mysql_query("select *from honorarium_info where honorarium_id='$di'");
   $row2=mysql_fetch_array($uni);
   $oldname = $row2["event_name"];
    ?>

   
   
      
<div align="center" id="vid">
<p>
<table border="1" align="center" bgcolor="#4C7D7E">
<th></td>  <?php $result2=mysql_query("SELECT *FROM honorarium_info where event_name!='$oldname'");?>
<form method="post" action="honoraariumupdate_database.php">
           <table align="center" bgcolor="#4C7D7E"><tr><td><p>Selected event:</p></td><td>  
          
   <select name="elect" >
   <option value="<?php echo "$oldname"; ?>"><?php echo "$oldname"; ?></option>
   <?php
 while($row2=mysql_fetch_array($result2))
 {
   ?> 
   <option value="<?php echo $row2['event_name']; ?>"><?php echo $row2['event_name']; ?></option>
 

    <?php }?>

</select> </td></tr>




<tr>          <td><p>Edited amount:</p></td> <td>
          <input type="hidden" name="honorno" value="<?php echo "$di"; ?>">
          <input type="text" name="amount" maxlength="100" size="55"></td></tr>
          <tr><td>
          <input type="submit" name="adib" value="Update"><input type="submit" name="asif" value="Cancel"><td></tr>
          </form></table>
</td></tr></table></div>
   
 
   
 </p>   
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