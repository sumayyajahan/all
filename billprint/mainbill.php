<html>
  <head>
<link rel="stylesheet" type="text/css" href="adi.css" />

  
  
  </head>

<body>
<?php 
include('databaseConnection.php');
$id=$_POST['teacher']; 
$am=mysql_fetch_array(mysql_query("select *from examiner where examiner_id='$id'"));
$ami=$am['exam_id'];
$ja=mysql_query("select *from examname where exam_id='$ami' and category like '%msc%'");
$caa=mysql_num_rows($ja);
   
    $ad1=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%question setting%'"));
$hid=$ad1['honorarium_id']; 
$ad2=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%question writing%'"));
$whid=$ad2['honorarium_id'];
$ad3=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%ANSWER SHEET JUSTIFICATION%'")); 
$jasid=$ad3['honorarium_id'];
$ad4=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%VIVA VOCE%'"));
$invi=$ad4['honorarium_id']; 
$ad5=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%VIVA VOCE%' and event_name like '%FINAL%'"));
$exvi=$ad5['honorarium_id']; 
$ad6=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%TABULATION%'"));
$tebu=$ad6['honorarium_id']; 
$ad7=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%PRESIDENT STIPEN%'"));
$pres=$ad7['honorarium_id']; 
$ad8=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%CLASS TEST%'"));
$ct=$ad8['honorarium_id']; 
$ad9=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%QUESTION MODERATION%'"));
$moder=$ad9['honorarium_id']; 
$ad10=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%SESSIONAL EXAM%' and event_name not like '%FINAL%'")); 
$insess=$ad10['honorarium_id']; 
$ad11=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%SESSIONAL EXAM%' and event_name like '%FINAL%'"));
$exsess=$ad11['honorarium_id']; 
$ad12=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%THESIS OR PROJECT%' and event_name like '%internal%'")); 
$inp=$ad12['honorarium_id']; 
$ad13=mysql_fetch_array(mysql_query("select *from honorarium_info where event_name like '%THESIS OR PROJECT%' and event_name like '%FINAL%'"));   
$exp=$ad13['honorarium_id']; 
 
  $te=mysql_fetch_array(mysql_query("select *from examiner where examiner_id='$id'"));
$teacher=$te['teacher_id'];
$examid=$te['exam_id'];
$de=$te['department_id'];
$examname=mysql_fetch_array(mysql_query("select *from examname where exam_id='$examid'"));
$teacherinfo=mysql_fetch_array(mysql_query("select *from teacher where teacher_id='$teacher'"));
$department=mysql_query("select *from department where department_id='$de'");
$genbill=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$hid'");

    



?>
<p>
<table>
<tr>
<td>Bill no:</td>
<td><?php echo "$id"."$teacher"."$examid";?></td>
</tr>
<tr>
<td>Examiner name:</td>
<td><?php echo $teacherinfo['teacher_name'];?></td>
</tr>
<tr>
<td>Examiner designation:</td>
<td><?php echo $teacherinfo['designation'];?></td>
</tr>
<tr>
<td>Examiner address :</td>
<td><?php echo $teacherinfo['address']; ?></td>
</tr>
</table>   

<table border="1">
<tr>
  <th>Serial no</th>
  <th>Work's name</th>
  <th>Exam name</th>
  <th>Year</th>
  <th>Department</th>
  <th>Course code</th>
  <th>Khata/Exam number</th>
  <th>Total day/member </th>
  <th>Credit hour</th>
  <th>Number of class test</th>
  <th>Issued money</th>
 </tr>
 
 
 
 
 
 <?php //Question setting ?>
 
 
     
<tr>
  <th>1</th>
  <th>Question setting</th>
  <td align="left"><?php echo $examname['year']." ".$examname['semester']." ".$examname['category']."examination"; ?></td>
  <td align="center"><?php echo $examname['examyear'];?></td>
  <td align="left"><?php  $departmentname=mysql_fetch_array($department);
  echo $departmentname['department_name'];?></td>
  <td align="center"><?php  
  $count=0;
  while($result=mysql_fetch_array($genbill)){
      $course=$result['excourse_id'];
      $coursecode=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$course' "));
      echo $coursecode['course_code']."<br/>"; 
       $count=$count+1;       
      }       
  ?></td>
  <td align="center">Total question set:<?php echo "$count"; ?></td>
  <td>&nbsp;</td>
<td align="center"><?php  
    $crh=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$hid'");
    while($crhour=mysql_fetch_array($crh)){
        $courseit=$crhour['excourse_id'];
        $credithour=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseit'"));
        $credithour['credit_hour'];
        echo $credithour['credit_hour']."<br/>";
        }
   ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php  
  $qset=0; 
  $mo=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$hid'");
  $mono=mysql_num_rows($mo);
  if($mono>0){
      while($ho=mysql_fetch_array($mo)){
      $hono=$ho['honorarium_id'];
      $am=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$hono'"));
      $qsetamount=$am['amount'];
      //adding element......................................................................
      $qset=$qset+$qsetamount;
      
  }
  echo "$qset"."/=";}
 
  
  ?></td>
</tr>



<?php // Question moderation ?>





 <tr>
  <th>2</th>
  <th>Question moderation</th>
  <td align="left">&nbsp;</td> 
  <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  <td align="center"><?php 
    
  $count111=0;
  $moder111=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$moder'"); 
  while($result111=mysql_fetch_array($moder111)){
      $course111=$result111['excourse_id'];
      $coursecode111=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$course111' "));
      echo $coursecode111['course_code']."<br/>"; 
       $count111=$count111+1;
      }       
  ?></td>
  <td align="center">Total question moderate:<?php echo "$count111"; ?></td> 
    <td align="center"><?php 
    $moder123=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$moder'"); 
  while($result123=mysql_fetch_array($moder123)){
      $course123=$result123['internal'];
      $course1234=$result123['external']; 
      echo "Internal"."$course123"."&nbsp;";
      echo "External:"."$course1234"."<br/>";
       }       
  ?></td>
  <td align="center"><?php  
    $crhmod=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$moder'");
    while($crhourmod=mysql_fetch_array($crhmod)){
        $courseitmod=$crhourmod['excourse_id'];
        $credithourmod=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitmod'"));
        $credithourmod['credit_hour'];
        echo $credithourmod['credit_hour']."<br/>";
        }
  ?></td>
  <td>&nbsp;</td>
    <td align="center"><?php 
    $totmod=0; 
  $momod=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$moder'");
  while($homod=mysql_fetch_array($momod)){
      $honomod=$homod['honorarium_id'];
      $intern=$homod['internal'];
      $extern=$homod['external'];
      $ammod=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honomod'"));
      $person=$intern+$extern;
      if($person!=0){
                        $qsetamountmod=$ammod['amount']/($person);
      }
      
      //adding element......................................................................
      $totmod=$totmod+$qsetamountmod;
      }
   echo "$totmod"."/=";  
  ?></td>
 </tr>
  
  
  
  
 <?php // Justification ans sheet ?> 
  
  
  
  <tr>
  <th>3</th>
  <th>Justify ans sheet</th>
  <td align="left">&nbsp;</td> 
  <td align="center">&nbsp;</td>
  <td align="left">&nbsp;</td>
    <td align="center"><?php 
    $countjasid=0;  
    $genbilljasid=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$jasid'"); 
    while($resultjasid=mysql_fetch_array($genbilljasid)){
      $coursejasid=$resultjasid['excourse_id'];
      $coursecodejasid=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$course' "));
      echo $coursecodejasid['course_code']."<br/>"; 
       $countjasid=$countjasid+1;
      }       
  ?></td>
   <td align="center"><?php 
   $countjasid1=0; 
    $crhjasid=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$jasid'");
    while($resultjasid1=mysql_fetch_array($crhjasid)){
      $coursejasid1=$resultjasid1['examinee'];
       echo "$coursejasid1"."<br/>"; 
       $countjasid1=$countjasid1+$coursejasid1;
    }
  ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php  
    $crhjasid=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$jasid'");
    while($crhourjasid=mysql_fetch_array($crhjasid)){
        $courseitjasid=$crhourjasid['excourse_id'];
        $credithourjasid=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitjasid'"));
        $credithourjasid['credit_hour'];
        echo $credithourjasid['credit_hour']."<br/>";
        }
 ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php  
  $mojasid=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$jasid'");
  $co=mysql_num_rows($mojasid);
  if($co>0){while($hojasid=mysql_fetch_array($mojasid)){
      $honojasid=$hojasid['honorarium_id'];
      $amjasid=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honojasid'"));
      $qsetamountjasid=$amjasid['amount'];
      //adding element......................................................................
      }
  $tot=$qsetamountjasid*$countjasid1;
  echo "$tot"."/="; }
  else{
      $tot=0;
  }
   
 ?></td>
 </tr>
 
 
 
 
 
 
<?php //Viva voce ?> 
 
 
 
  <tr>
  <th>4</th>
  <th>Viva voce</th>
  <td align="left">&nbsp;</td> 
  <td align="center">&nbsp;</td>
   <td align="left">&nbsp;</td>
  <td align="center"><?php 
    $countinvi=0;  
    $genbillinvi=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$invi'"); 
    while($resultinvi=mysql_fetch_array($genbillinvi)){
      $courseinvi=$resultinvi['excourse_id'];
      $coursecodeinvi=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseinvi' "));
      echo $coursecodeinvi['course_code']."<br/>"; 
      $countinvi=$countinvi+1;
      }     
  $countexvi=0;  
  $genbillexvi=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$exvi'"); 
   while($resultexvi=mysql_fetch_array($genbillexvi)){
      $courseexvi=$resultexvi['excourse_id'];
      $coursecodeexvi=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseexvi' "));
      echo $coursecodeexvi['course_code']."<br/>"; 
       $countexvi=$countexvi+1;
      }   
  ?></td>
 <td align="center"><?php 
   $countinvi1=0; 
    $crhinvi1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$invi'");
    while($resultinvi1=mysql_fetch_array($crhinvi1)){
      $courseinvi1=$resultinvi1['examinee'];
       echo "$courseinvi1"."<br/>"; 
       $countinvi1=$countinvi1+$courseinvi1;
      }
    $countexvi1=0; 
    $crhexvi1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exvi'");
    while($resultexvi1=mysql_fetch_array($crhexvi1)){
      $courseexvi1=$resultexvi1['examinee'];
       echo "$courseexvi1"."<br/>"; 
       $countexvi1=$countexvi1+$courseexvi1;
      
  }  
?></td>
   <td align="left"><?php 
   $countinvi11=0; 
    $crhinvi11=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$invi'");
    while($resultinvi11=mysql_fetch_array($crhinvi11)){
      $courseinvi11=$resultinvi11['internal'];
       echo "Total internal:"." "."$courseinvi11"."<br/>"; 
       $countinvi11=$countinvi11+$courseinvi11;
    
    } 
    $countexvi11=0; 
    $crhexvi11=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exvi'");
    while($resultexvi11=mysql_fetch_array($crhexvi11)){
      $courseexvi11=$resultexvi11['external'];
      $courseexvi11internal=$resultexvi11['internal'];
       echo "External:"."$courseexvi11"."Internal:"."$courseexvi11internal"."<br/>"; 
       $countexvi11=$countexvi11+$courseexvi11;
      }
  ?></td>
    <td align="center"><?php  
    $crhinvi1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$invi'");
    while($crhourinvi1=mysql_fetch_array($crhinvi1)){
        $courseitinvi1=$crhourinvi1['excourse_id'];
        $credithourinvi1=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitinvi1'"));
        $credithourinvi1['credit_hour'];
        echo $credithourinvi1['credit_hour']."<br/>";
        }
    $crhexvi1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exvi'");
    while($crhourexvi1=mysql_fetch_array($crhexvi1)){
        $courseitexvi1=$crhourexvi1['excourse_id'];
        $credithourexvi1=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitexvi1'"));
        $credithourexvi1['credit_hour'];
        echo $credithourexvi1['credit_hour']."<br/>";
        }
        ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php  
  if($category=='internal')
  {
      
      
  $qsetwrqbinvi1=0; 
  $mowrqbinvi1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$invi'");
  $go=mysql_num_rows($mowrqbinvi1);
  if($go>0){  while($howrqbinvi1=mysql_fetch_array($mowrqbinvi1)){
      $honowrqbinvi1=$howrqbinvi1['honorarium_id'];
      $amwrqbinvi1=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honowrqbinvi1'"));
      $qsetamountwrqbinvi1=$amwrqbinvi1['amount'];
      $totinvi1=$qsetamountwrqbinvi1*$countinvi1;
      //adding element......................................................................
      $qsetwrqbinvi1=$qsetwrqbinvi1+$totinvi1;  
      }  
      if($countinvi11!=0){$finalinternalbill1=$qsetwrqbinvi1/$countinvi11;}
  echo "$finalinternalbill1"."/="."<br/>"; }
  else
  {$finalinternalbill1=0;}
  
    
 
  
    $qsetwrqbexvi1=0; 
  $mowrqbexvi1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exvi'");
  $so=mysql_num_rows($mowrqbexvi1);
  if($so>0){  while($howrqbexvi1=mysql_fetch_array($mowrqbexvi1)){
      $honowrqbexvi1=$howrqbexvi1['honorarium_id'];
      $amwrqbexvi1=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honowrqbexvi1'"));
      $qsetamountwrqbexvi1=$amwrqbexvi1['amount'];
      $totexvi1=$qsetamountwrqbexvi1*$countexvi1;
      //adding element......................................................................
      $qsetwrqbexvi1=$qsetwrqbexvi1+($totexvi1*.5);
      
  }  if($courseexvi11internal!=0){$finalexternalbill1=$qsetwrqbexvi1/$courseexvi11internal;}
  echo "$finalexternalbill1"."/=";}
  else {$finalexternalbill1=0; }
  
   

  }   
  else{
  $qsetwrqbexvi1=0; 
  $mowrqbexvi1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exvi'");
  while($howrqbexvi1=mysql_fetch_array($mowrqbexvi1)){
      $honowrqbexvi1=$howrqbexvi1['honorarium_id'];
      $amwrqbexvi1=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honowrqbexvi1'"));
      $qsetamountwrqbexvi1=$amwrqbexvi1['amount'];
      $totexvi1=$qsetamountwrqbexvi1*$countexvi1;
      //adding element......................................................................
      $qsetwrqbexvi1=$qsetwrqbexvi1+($totexvi1*.5);
      
  }if($courseexvi11internal!=0){$finalexternalbill1=$qsetwrqbexvi1/$courseexvi11internal;}        
  echo "$finalexternalbill1"."/=";
      
      
  }                             
  //$finalexternalbill1guest=$qsetwrqbexvi1/$courseexvi11;
  //echo "$finalexternalbill1guest"."/=";
  ?></td>
 </tr>
 
 
 
 
 
 
 
  <tr>
  <th>5</th>
  <th>Sessional exam</th>
 <td align="left">&nbsp;</td> 
  <td align="center">&nbsp;</td>
   <td align="left">&nbsp;</td>
  <td align="center"><?php 
    $countinsess=0;  
    $genbillinsess=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$insess'"); 
  
  while($resultinsess=mysql_fetch_array($genbillinsess)){
      $courseinsess=$resultinsess['excourse_id'];
      $coursecodeinsess=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseinsess' "));
      echo $coursecodeinsess['course_code']."<br/>"; 
       
      $countinsess=$countinsess+1;
      
  }     
  
  
  $countexsess=0;  
    $genbillexsess=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$exsess'"); 
  
  while($resultexsess=mysql_fetch_array($genbillexsess)){
      $courseexsess=$resultexsess['excourse_id'];
      $coursecodeexsess=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseexsess' "));
      echo $coursecodeexsess['course_code']."<br/>"; 
       
      $countexsess=$countexsess+1;
      
  }   
  
  
  ?></td>
 <td align="center"><?php 
   $countinsess1=0; 
    $crhinsess1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$insess'");
    while($resultinsess1=mysql_fetch_array($crhinsess1)){
      $courseinsess1=$resultinsess1['examinee'];
       echo "$courseinsess1"."<br/>"; 
       
      $countinsess1=$countinsess1+$courseinsess1;
      
  }
  
   $countexsess1=0; 
    $crhexsess1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exsess'");
    while($resultexsess1=mysql_fetch_array($crhexsess1)){
      $courseexsess1=$resultexsess1['examinee'];
       echo "$courseexsess1"."<br/>"; 
       
      $countexsess1=$countexsess1+$courseexsess1;
      
  }  

     
  
  ?></td>
   <td align="center"><?php 
   $countinsess11=0; 
    $crhinsess11=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$insess'");
    while($resultinsess11=mysql_fetch_array($crhinsess11)){
      $courseinsess11=$resultinsess11['internal'];
       echo "Total internal:"." "."$courseinsess11"."<br/>"; 
       
      $countinsess11=$countinsess11+$courseinsess11;
      
  } 
  
     $countexsess11=0; 
    $crhexsess11=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exsess'");
    while($resultexsess11=mysql_fetch_array($crhexsess11)){
      $courseexsess11=$resultexsess11['external'];
      $courseexsess11internal=$resultexsess11['internal'];
       echo "External:"."$courseexsess11"." Internal:"."$courseexsess11internal"."<br/>"; 
       
      $countexsess11=$countexsess11+$courseexsess11;
      
  } 

     
  
  ?></td>
    <td align="center"><?php  
    $crhinsess1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$insess'");
    while($crhourinsess1=mysql_fetch_array($crhinsess1)){
        $courseitinsess1=$crhourinsess1['excourse_id'];
        $credithourinsess1=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitinsess1'"));
        $credithourinsess1['credit_hour'];
        echo $credithourinsess1['credit_hour']."<br/>";
        
        
    }
    
    $crhexsess1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exsess'");
    while($crhourexsess1=mysql_fetch_array($crhexsess1)){
        $courseitexsess1=$crhourexsess1['excourse_id'];
        $credithourexsess1=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitexsess1'"));
        $credithourexsess1['credit_hour'];
        echo $credithourexsess1['credit_hour']."<br/>";
        
        
    }

     
  
  ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php  
  $qsetwrqbinsess1=0; 
  $mowrqbinsess1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$insess'");
  $to=mysql_num_rows($mowrqbinsess1);
  if($to>0){
  while($howrqbinsess1=mysql_fetch_array($mowrqbinsess1)){
      $honowrqbinsess1=$howrqbinsess1['honorarium_id'];
      $amwrqbinsess1=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honowrqbinsess1'"));
      $qsetamountwrqbinsess1=$amwrqbinsess1['amount'];
      $totinsess1=$qsetamountwrqbinsess1*$countinsess1;
      //adding element......................................................................
      $qsetwrqbinsess1=$qsetwrqbinsess1+$totinsess1;
      
  } if($countinsess11!=0){$finalinternalbill2=$qsetwrqbinsess1/$countinsess11;} 
  echo "$finalinternalbill2"."/="."<br/>";}  
  else{$finalinternalbill2=0;}                            
  
    $qsetwrqbexsess1=0; 
  $mowrqbexsess1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exsess'");
  $no=mysql_num_rows($mowrqbexsess1);
  if($no>0){  while($howrqbexsess1=mysql_fetch_array($mowrqbexsess1)){
      $honowrqbexsess1=$howrqbexsess1['honorarium_id'];
      $amwrqbexsess1=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honowrqbexsess1'"));
      $qsetamountwrqbexsess1=$amwrqbexsess1['amount'];
      $totexsess1=$qsetamountwrqbexsess1*$countexsess1;
      //adding element......................................................................
      $qsetwrqbexsess1=$qsetwrqbexsess1+($totexsess1*.5);
      
  } if($courseexsess11internal!=0){$finalexternalbill2=$qsetwrqbexsess1/$courseexsess11internal;} 
  echo "$finalexternalbill2"."/="; }
  else
  {$finalexternalbill2=0;} 

 // $finalexternalbill2guest=$qsetwrqbexsess1/$courseexsess11;
  //echo "$finalexternalbill2guest"."/=";
  
  
  
  
  ?></td>
 </tr>
  <tr>
  <th>6</th>
  <th>Tabulation</th>
  <td align="left">&nbsp;</td> 
  <td align="center">&nbsp;</td>
   <td align="left">&nbsp;</td>
  <td>&nbsp;</td>
  <td align="center"><?php   
    $crhtabulation=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$tebu'");
    $tab=mysql_fetch_array($crhtabulation);
    $examineetabulation=$tab['examinee'];
    echo "$examineetabulation";
    ?> </td>
  <td align="center"><?php   
    $crhtabulation1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$tebu'");
    $tab1=mysql_fetch_array($crhtabulation1);
    $examineetabulation1=$tab1['internal'];
    echo "$examineetabulation1";
    ?> </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td align="center"><?php   
  $motabu=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$tebu'");
  $hotabu=mysql_fetch_array($motabu);
      $honotabu=$hotabu['honorarium_id'];
      $amtabu=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honotabu'"));
      $qsetamounttabu=$amtabu['amount'];
      if($examineetabulation1==0)
      {
          $tabulationamount= $qsetamounttabu* $examineetabulation;
          echo "$tabulationamount"."/=";
      }
      else{
                $tabulationamount= ($qsetamounttabu* $examineetabulation)/$examineetabulation1; 
                echo "$tabulationamount"."/="; 
      }
      
  
  
  
  
  ?></td>
 </tr>
  <tr>
  <th>7</th>
  <th>President stipen</th>
  <td align="left">&nbsp;</td> 
  <td align="center">&nbsp;</td>
   <td align="left">&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td align="center"><?php  $mopre=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$pres'");
  $hotpre=mysql_fetch_array($mopre);
      $honopre=$hotpre['honorarium_id'];
      $ampre=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honopre'"));
      $qsetamountpre=$ampre['amount'];
      echo "$qsetamountpre"."/=";?></td>
 </tr>
  <tr>
  <th>8</th>
  <th>Writing question</th>
  <td align="left">&nbsp;</td>
  <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  <td align="center"><?php  
  $countwrqb=0;
  $wrqb=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$whid'");
  while($resultwrqb=mysql_fetch_array($wrqb)){
      $coursewrqb=$resultwrqb['excourse_id'];
      $coursecodewrqb=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$coursewrqb' "));
      echo $coursecodewrqb['course_code']."<br/>"; 
       
      $countwrqb=$countwrqb+1;
      
  }       
  
  
  ?></td>
  <td align="center">Total question set:<?php echo "$countwrqb"; ?></td> 
  <td>&nbsp;</td>
  <td align="center"><?php  
    $crhwrqb=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$whid'");
    while($crhourwrqb=mysql_fetch_array($crhwrqb)){
        $courseitwrqb=$crhourwrqb['excourse_id'];
        $credithourwrqb=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitwrqb'"));
        $credithourwrqb['credit_hour'];
        echo $credithourwrqb['credit_hour']."<br/>";
        
        
    }

     
  
  ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php  
  $qsetwrqb=0; 
  $mowrqb=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$whid'");
  while($howrqb=mysql_fetch_array($mowrqb)){
      $honowrqb=$howrqb['honorarium_id'];
      $amwrqb=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honowrqb'"));
      $qsetamountwrqb=$amwrqb['amount'];
      //adding element......................................................................
      $qsetwrqb=$qsetwrqb+$qsetamountwrqb;
      
  }
  echo "$qsetwrqb"."/=";  
  
  
  
  
  ?></td>
 </tr>
  <tr>
  <th>9</th>
  <th>Thesis/Project</th>
  <td align="left">&nbsp;</td> 
  <td align="center">&nbsp;</td>
   <td align="left">&nbsp;</td>
  <td align="center"><?php 
    $countinp=0;  
    $genbillinp=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$inp'"); 
  
  while($resultinp=mysql_fetch_array($genbillinp)){
      $courseinp=$resultinp['excourse_id'];
      $coursecodeinp=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseinp' "));
      echo $coursecodeinp['course_code']."<br/>"; 
       
      $countinp=$countinp+1;
      
  }     
  
  
  $countexp=0;  
    $genbillexp=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$exp'"); 
  
  while($resultexp=mysql_fetch_array($genbillexp)){
      $courseexp=$resultexp['excourse_id'];
      $coursecodeexp=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseexp' "));
      echo $coursecodeexp['course_code']."<br/>"; 
       
      $countexp=$countexp+1;
      
  }   
  
  
  ?></td>
 <td align="center"><?php 
   $countinp1=0; 
    $crhinp1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$inp'");
    while($resultinp1=mysql_fetch_array($crhinp1)){
      $courseinp1=$resultinp1['examinee'];
       echo "$courseinp1"."<br/>"; 
       
      $countinp1=$countinp1+$courseinp1;
      
  }
  
   $countexp1=0; 
    $crhexp1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exp'");
    while($resultexp1=mysql_fetch_array($crhexp1)){
      $courseexp1=$resultexp1['examinee'];
       echo "$courseexp1"."<br/>"; 
       
      $countexp1=$countexp1+$courseexp1;
      
  }  

     
  
  ?></td>
   <td align="center"><?php 
   $countinp11=0; 
    $crhinp11=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$inp'");
    while($resultinp11=mysql_fetch_array($crhinp11)){
      $courseinp11=$resultinp11['internal'];
       echo "Total internal:"." "."$courseinp11"."<br/>"; 
       
      $countinp11=$countinp11+$courseinp11;
      
  } ;
  
     $countexp11=0; 
    $crhexp11=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exp'");
    while($resultexp11=mysql_fetch_array($crhexp11)){
      $courseexp11=$resultexp11['external'];
      $courseexp11internal=$resultexp11['internal'];
       echo "External:"."$courseexp11"." Internal:"."$courseexp11internal"."<br/>"; 
       
      $countexp11=$countexp11+$courseexp11;
      
  } ;

     
  
  ?></td>
    <td align="center"><?php  
    $crhinp1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$inp'");
    while($crhourinp1=mysql_fetch_array($crhinp1)){
        $courseitinp1=$crhourinp1['excourse_id'];
        $credithourinp1=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitinp1'"));
        $credithourinp1['credit_hour'];
        echo $credithourinp1['credit_hour']."<br/>";
        
        
    }
    
    $crhexp1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exp'");
    while($crhourexp1=mysql_fetch_array($crhexp1)){
        $courseitexp1=$crhourexp1['excourse_id'];
        $credithourexp1=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitexp1'"));
        $credithourexp1['credit_hour'];
        echo $credithourexp1['credit_hour']."<br/>";
        
        
    }

     
  
  ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php  
  $qsetwrqbinp1=0; 
  $mowrqbinp1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$inp'");
  $mo=mysql_num_rows($mowrqbinp1);
  if($mo>0){  while($howrqbinp1=mysql_fetch_array($mowrqbinp1)){
      $honowrqbinp1=$howrqbinp1['honorarium_id'];
      $amwrqbinp1=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honowrqbinp1'"));
      $qsetamountwrqbinp1=$amwrqbinp1['amount'];
      $totinp1=$qsetamountwrqbinp1*$countinp1;
      //adding element......................................................................
      $qsetwrqbinp1=$qsetwrqbinp1+$totinp1;
      
  } if($countinp11!=0){$finalinternalbill3=$qsetwrqbinp1/$countinp11;} 
  echo "$finalinternalbill3"."/="."<br/>";  }
  else
  {$finalinternalbill3=0;}

  
    $qsetwrqbexp1=0; 
  $mowrqbexp1=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$exp'");
  $tono=mysql_num_rows($mowrqbexp1);
  if($tono>0){  while($howrqbexp1=mysql_fetch_array($mowrqbexp1)){
      $honowrqbexp1=$howrqbexp1['honorarium_id'];
      $amwrqbexp1=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honowrqbexp1'"));
      $qsetamountwrqbexp1=$amwrqbexp1['amount'];
      $totexp1=$qsetamountwrqbexp1*$countexp1;
      //adding element......................................................................
      $qsetwrqbexp1=$qsetwrqbexp1+($totexp1*.5);
      
  } if($courseexp11internal!=0){$finalexternalbill3=$qsetwrqbexp1/$courseexp11internal;} 
  echo "$finalexternalbill3"."/="; }
  else
  {$finalexternalbill3=0;}

  //$finalexternalbill3guest=$qsetwrqbexp1/$courseexp11;
  //echo "$finalexternalbill3guest"."/=";
  
  
  
  
  ?></td>
 </tr>
  <tr>
  <th>10</th>
  <th>Class test</th>
  <td align="left">&nbsp;</td> 
  <td align="center">&nbsp;</td>
   <td align="left">&nbsp;</td>
      <td align="center"><?php 
    $countct=0;  
    $genbillct=mysql_query("select *from generatebill where examiner_id='$id' and honorarium_id='$ct'"); 
  
  while($resultct=mysql_fetch_array($genbillct)){
      $coursect=$resultct['excourse_id'];
      $coursecodect=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$coursect' "));
      echo $coursecodect['course_code']."<br/>"; 
       
      $countct=$countct+1;
      
  }       
  
  
  ?></td>
    <td align="center"><?php 
   $countct1=0; 
    $crhct=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$ct'");
    while($resultct1=mysql_fetch_array($crhct)){
      $coursect1=$resultct1['examinee'];
       echo "$coursect1"."<br/>"; 
       
      $countct1=$countct1+$coursect1;
      
  }

     
  
  ?></td>
      <td>&nbsp;</td>
  <td align="center"><?php  
    $crhct=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$ct'");
    while($crhourct=mysql_fetch_array($crhct)){
        $courseitct=$crhourct['excourse_id'];
        $credithourct=mysql_fetch_array(mysql_query("select *from existingcourse where excourse_id='$courseitct'"));
        $credithourct['credit_hour'];
        echo $credithourct['credit_hour']."<br/>";
        
        
    }

     
  
  ?></td>
  <td align="center"><?php 
   $countct11=0; 
    $crhct11=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$ct'");
    while($resultct11=mysql_fetch_array($crhct11)){
      $coursect11=$resultct11['classtest_no'];
       echo "$coursect11"."<br/>"; 
       
      $countct11=$countct11+1;
      
  }

     
  
  ?></td>
  <td align="center"><?php  
  $moct=mysql_query("select *from generatebill where examiner_id='$id'  and honorarium_id='$ct'");
  $dolo=mysql_num_rows($moct);
  if($dolo==1){  while($hoct=mysql_fetch_array($moct)){
      $honoct=$hoct['honorarium_id'];
      $amct=mysql_fetch_array(mysql_query("select *from honorarium_info where honorarium_id='$honoct'"));
      $qsetamountct=$amct['amount'];
      //adding element......................................................................
      
      
  }
  $totct=$qsetamountct*$countct1;
  echo "$totct"."/=";}
  else
  {$totct=0;}
  
  
  
  
  
  ?></td>
 </tr>
  <tr>
  <th>11</th>
  <th>Incidental charge</th>
  <td>Attested vowcher no:<?php 
  $cou=0;
    $inci=mysql_query("select *from generatebill where examiner_id='$id' and incidental_charge!='0' ");
    while($resu=mysql_fetch_array($inci)){
      $vow=$resu['vowcher_no'];
      $incidental=$resu['incidental_charge'];
       echo "Vowcher no:"."$vow"."="."$incidental"."/="."<br/>"; 
       
      $cou=$cou+$incidental;
      
  }
  
  
  ?></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td align="center"><?php echo "$cou"."/=";?></td>
 </tr>
  <tr>
  <th>12</th>
  <th>Demerage</th>
  <td align="left"><?php 
  $co=0;
    $dem=mysql_query("select *from generatebill where examiner_id='$id' and demerage!='0' ");
    while($res=mysql_fetch_array($dem)){
      $vo=$res['demerage_cause'];
      $in=$res['demerage'];
       echo "Cause:"."$vo"."="."$in"."/="."<br/>"; 
       
      $co=$co+$in;
      
  }
  
  
  ?></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td align="center"><?php echo "$co"."/=";?></td>
 </tr>
 

 

</table>
<br/><h3>Total Money :<?php $intotalmoney=$qset+$totmod+$tot+$finalinternalbill1+$finalexternalbill1+$finalinternalbill2+$finalexternalbill2+$tabulationamount+$qsetamountpre+$qsetwrqb+$finalexternalbill3+$totct+$cou+$finalinternalbill3-$co;
echo "$intotalmoney"." "."taka."  ;?></h3><br/> <br/>
<table align="left" bgcolor="">
<tr><td><img src="http://localhost/adib/images/line.gif"><br/>President Signature</td></tr>
</table>
<table align="right">
<tr><td><img src="http://localhost/adib/images/line.gif"><br/>Examiner Signature</td></tr>
</table><br/>
<p>Department:<?php echo "&nbsp;".$departmentname['department_name']."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;";?>
Examination:&nbsp;<?php echo $examname['year']." ".$examname['semester']." ".$examname['category']."&nbsp;"."examination"."&nbsp;".$examname['examyear'].".&nbsp;"."&nbsp;"."&nbsp;";?>
Session:&nbsp;<?php echo $examname['session'];?></p>
<p>Pay&nbsp;


      <?php
  function number_to_words($number)
{
    if ($number > 999999999)
    {
       throw new Exception("Number is out of range");
    }

    $Gn = floor($number / 1000000);  /* Millions (giga) */
    $number -= $Gn * 1000000;
    $kn = floor($number / 1000);     /* Thousands (kilo) */
    $number -= $kn * 1000;
    $Hn = floor($number / 100);      /* Hundreds (hecto) */
    $number -= $Hn * 100;
    $Dn = floor($number / 10);       /* Tens (deca) */
    $n = $number % 10;               /* Ones */
    $cn = round(($number-floor($number))*100); /* Cents */
    $result = ""; 

    if ($Gn)
    {  $result .= number_to_words($Gn) . " Million";  } 

    if ($kn)
    {  $result .= (empty($result) ? "" : " ") . number_to_words($kn) . " Thousand"; } 

    if ($Hn)
    {  $result .= (empty($result) ? "" : " ") . number_to_words($Hn) . " Hundred";  } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
        "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n)
    {
       if (!empty($result))
       {  $result .= " ";
       } 

       if ($Dn < 2)
       {  $result .= $ones[$Dn * 10 + $n];
       }
       else
       {  $result .= $tens[$Dn];
          if ($n)
          {  $result .= "-" . $ones[$n];
          }
       }
    }

    if ($cn)
    {
       if (!empty($result))
       {  $result .= ' taka ';
       }
       $title = $cn==1 ? 'cent ': 'paisa';
       $result .= strtolower(number_to_words($cn)).' '.$title;
    }

    if (empty($result))
    {  $result = "zero"; } 

    return $result;
}
echo number_to_words($intotalmoney); 
?>





&nbsp;&nbsp; taka only to Professor/Dr./Sir &nbsp;&nbsp;&nbsp; <?php echo $teacherinfo['teacher_name'].".";?></p>
<table border="1">
<tr><td height="60">Revenue Stamp</td></tr>
</table> 
</br></br>
<table align="left">
<tr><td width="200"><img src="http://localhost/adib/images/line.gif"><br/>Bill assistant Signature</td>
<td width="200"><img src="http://localhost/adib/images/line.gif"><br/>Section officer Signature</td>
<td width="200"><img src="http://localhost/adib/images/line.gif"><br/>Exam Controller Signature</td>
<td width="200"><A HREF="javascript:window.print()">Print This Page</A> </td> 
</table> <br/>  


</body>
</html>
