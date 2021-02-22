<?php 
session_start(); 
session_destroy();
header("Location: Gastenboeklogin.php"); 
die;

?>