<?php ob_start(); ?> 
<?php 
 include('databaseConnection.php');
if(isset($_POST['asif'])=='Cancel'){
 header('Location:billset.php');

}
 if(isset($_POST['adib'])=='Save'){
     $type=$_POST['type'];
     $honorarium_id=$_POST['event'];
     $excourse_id=$_POST['course'];
     $classtest_no=$_POST['classtest'];
     $examinee=$_POST['examinee'];
     $internal=$_POST['internal'];
     $external=$_POST['external'];
     $demerage=$_POST['demerage'];
     $demerege_cause=$_POST['demcause'];
     $incidental_charge=$_POST['incidentalcharge'];
     $vowcher_no=$_POST['vowcher'];
     $examiner_id=$_POST['examinerid'];
     
     
    
     
     $re=mysql_query("select *from generatebill where type='$type'and honorarium_id='$honorarium_id' and excourse_id='$excourse_id' and classtest_no='$classtest_no' and examinee='$examinee' and internal='$internal' and external='$external' and demerage='$demerage' and demerage_cause='$demerege_cause' and incidental_charge='$incidental_charge' and vowcher_no='$vowcher_no' and examiner_id='$examiner_id'");
     $count1=mysql_num_rows($re);
           if($count1==1){
               header('Location:billset.php'); 
           }
     else{
            
           mysql_query("insert into generatebill(type,honorarium_id,excourse_id,classtest_no,examinee,internal,external,demerage,demerage_cause,incidental_charge,vowcher_no,examiner_id)
                       values('$type','$honorarium_id','$excourse_id','$classtest_no','$examinee','$internal','$external','$demerage','$demerege_cause','$incidental_charge','$vowcher_no','$examiner_id') ");
                       header('Location:billset.php');
                       
   

     }


}



?>


<?php ob_flush(); ?>

