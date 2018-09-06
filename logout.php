<?php ob_start(); ?>
<?php
session_start();
session_destroy();
header("Location:http://localhost/adib/index.php");
?>
<?php ob_flush(); ?>