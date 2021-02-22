<?php 


session_start(); 
if ($_SESSION['ingelogd'] != true) { 
    header("Location: logindb.php"); 
}     

require 'dbconnect.php';   


        $id = $_GET['ID']; 

        $sql = "DELETE FROM Berichten 
        WHERE ID = '$id'";   


    if($conn->query($sql)){ 
        echo "het is gelukt";
    }  

    header('location:Adminpaneel.php');
    die;
        
        

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete score</title>
</head>
<body> 
    
</body>
</html>
 