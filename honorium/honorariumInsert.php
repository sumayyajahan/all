<?php ob_start(); ?>
<?php 
include('databaseConnection.php');


        //$sino=$_POST['select']; 
    $eventname=strtoupper($_POST['event']);
    $amount=$_POST['amount'];
    
    if(isset($_POST['adib'])=='Save'){
         if(($eventname==null)||($amount==null)){
        header('Location: http:honorium.php'); 
    }
    else{
           $re=mysql_query("select *from honorarium_info where event_name='$eventname'");
           $count1=mysql_num_rows($re);
           if($count1==1){
               header('Location: http:honorium.php'); 
           }
           else{$result=mysql_query("INSERT INTO honorarium_info(event_name,amount)
                          VALUES('$eventname','$amount')");
              header('Location: http:honorium.php');}
              
    }     
           
        
    }
    if(isset($_POST['asif'])=='Cancel'){
        
                 header('Location: http:honorium.php');
        
    }





?>
<?php ob_flush(); ?>
