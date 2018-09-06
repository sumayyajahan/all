<?php
  $con=mysql_connect("localhost","root","");
if(!$con)
 {
   die("Database can not be connected because:".mysql_error());
 
 }


// Selecting data from database

mysql_select_db("gratification",$con);
mysql_query("CREATE TABLE `gratification`.`faculty` (
`faculty_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`faculty_name` VARCHAR( 100 ) NOT NULL ,
`university_id` INT NOT NULL ,
INDEX ( `university_id` ) ,
UNIQUE (
`faculty_name`
)
) ENGINE = InnoDB;");
?>
