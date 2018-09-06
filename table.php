<?php 
 $con=mysql_connect("localhost","root","");
if(!$con)
 {
   die("Database can not be connected because:".mysql_error());
 
 }


// Selecting data from database
mysql_select_db("gratification",$con);
/*
$re1="create TABLE `gratification1`.`university` (
`university_id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`university_name` VARCHAR( 100 ) NOT NULL
) ENGINE = InnoDB";
mysql_query($re1,$con);    */

 /*
$re2="CREATE TABLE `gratification`.`faculty` (
`faculty_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`faculty_name` VARCHAR( 100 ) NOT NULL ,
`university_id` INT NOT NULL ,
INDEX ( `university_id` ) ,
UNIQUE (
`faculty_name`
)
) ENGINE = InnoDB";
mysql_query($re2,$con);  */

 /*  
$re3="CREATE TABLE `gratification`.`department` (
`department_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`department_name` VARCHAR( 100 ) NOT NULL ,
`faculty_id` INT NOT NULL ,
INDEX ( `faculty_id` ) ,
UNIQUE (
`department_name`
)
) ENGINE = InnoDB";
mysql_query($re3,$con);    */

     /*
$re4="CREATE TABLE `gratification`.`teacher` (
`teacher_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`teacher_name` VARCHAR( 100 ) NOT NULL ,
`teacher_type` VARCHAR( 100 ) NOT NULL ,
`designation` VARCHAR( 100 ) NOT NULL ,
`address` VARCHAR( 300 ) NOT NULL ,
`mobile_no` VARCHAR( 20 ) NOT NULL ,
`e_mail` VARCHAR( 100 ) NOT NULL ,
`department_id` INT NOT NULL ,
`password` VARCHAR(50) NOT NULL ,
`user` VARCHAR( 100 ) NOT NULL,
INDEX ( `department_id` ) ,
UNIQUE (
`teacher_name` ,
`address` ,
`e_mail`
)
) ENGINE = InnoDB";
mysql_query($re4,$con);   */   /*

$re5="CREATE TABLE `gratification`.`honorarium_info` (
`honorarium_id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`event_name` VARCHAR( 100 ) NOT NULL ,
`amount` DOUBLE NOT NULL,
UNIQUE (
`event_name`
)
) ENGINE = InnoDB";
mysql_query($re5,$con);   */
   /*

$re6="CREATE TABLE `gratification`.`course_info` (
`course_id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`university_name` VARCHAR( 100 ) NOT NULL ,
`faculty_name` VARCHAR( 100 ) NOT NULL ,
`department_name` VARCHAR( 100 ) NOT NULL ,
`course_title` VARCHAR( 100 ) NOT NULL ,
`course_code` VARCHAR( 10 ) NOT NULL ,
`session` VARCHAR(20) NOT NULL ,
`syllabus` VARCHAR( 2000 ),
`credit_hour` double NOT NULL ,
UNIQUE (
`course_title`,`course_code`,`session`
)
) ENGINE = InnoDB;";
mysql_query($re6,$con);     */


/*

$re7="CREATE TABLE `gratification`.`examname` (
`exam_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`year` VARCHAR( 20 ) NOT NULL ,
`semester` VARCHAR( 20 ) NOT NULL ,
`category` VARCHAR( 20 ) NOT NULL ,
`session` VARCHAR( 20 ) NOT NULL ,
`examyear` VARCHAR( 20 ) NOT NULL ,
UNIQUE (
`year` ,
`semester` ,
`category` ,
`session` ,
`examyear`
)
) ENGINE = InnoDB";
mysql_query($re7,$con);   */  
  /*
$re8="
CREATE TABLE `gratification`.`examiner` (
`examiner_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`department_id` INT NOT NULL ,
`exam_id` INT NOT NULL ,
`teacher_id` INT NOT NULL ,
UNIQUE (
`department_id` ,
`exam_id` ,
`teacher_id`
)
) ENGINE = InnoDB;";
mysql_query($re8,$con); */
/*
$re9="CREATE TABLE `gratification`.`president` (
`president_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`department_id` INT NOT NULL ,
`exam_id` INT NOT NULL ,
`teacher_id` INT NOT NULL ,
UNIQUE (
`department_id` ,
`exam_id` ,
`teacher_id`
)
) ENGINE = InnoDB";
*/
/*
$re10="CREATE TABLE `gratification`.`course_info` (
`course_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`department_name` VARCHAR( 100 ) NOT NULL ,
`course_title` VARCHAR( 100 ) NOT NULL ,
`course_code` VARCHAR( 100 ) NOT NULL ,
`year` VARCHAR( 100 ) NOT NULL ,
`semester` VARCHAR( 100 ) NOT NULL ,
`credit_hour` DOUBLE NOT NULL ,
`department_id` INT NOT NULL ,
INDEX ( `department_id` ) ,
UNIQUE (
`course_title` ,
`course_code` ,
`year` ,
`semester`
)
) ENGINE = InnoDB;";
mysql_query($re10,$con);   */
/*
$re11="CREATE TABLE `gratification`.`existingcourse` (
`excourse_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`department_id` INT NOT NULL ,
`session` VARCHAR( 20 ) NOT NULL ,
`course_code` VARCHAR( 20 ) NOT NULL ,
`course_id` INT NOT NULL ,
`credit_hour` DOUBLE NOT NULL ,
UNIQUE (
`session` ,
`department_id`,
`course_id`
)
) ENGINE = InnoDB;";
mysql_query($re11,$con); 
*/
$re12="CREATE TABLE `gratification`.`generatebill` (
`bill_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`type` VARCHAR( 20 ),
`honorarium_id` INT NOT NULL ,
`excourse_id` INT NOT NULL ,
`classtest_no` VARCHAR( 20 ),
`examinee` INT( 5 ) ,
`internal` INT( 5 ),
`external` INT( 5 ) ,
`demerage` DOUBLE ,
`demerage_cause` VARCHAR( 200 ),
`incidental_charge` DOUBLE,
`vowcher_no` VARCHAR( 10 ) ,
`examiner_id` INT NOT NULL
) ENGINE = InnoDB;";
mysql_query($re12,$con); 
mysql_close($con);
?>