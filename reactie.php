<?php 

session_start(); 
if ($_SESSION['ingelogd'] != true) { 
    header("Location: logindb.php"); 
}     
 


require 'dbconnect.php';     

  

        if(empty($_GET['reactie'])) { 
        echo "<p>je moet eerst een reactie schrijven</p>";  
        header("refresh:1;url=Gastenboek.php"); 
        exit;

        }  else  {
        
    
    $id = ($_GET['ID']);      
    $reactie = ($_GET['reactie']);      

    $sql = "INSERT INTO Reactie (React,Connectie) 
    VALUES ('$reactie','$id')";  

 
    $conn->query($sql);
  
        echo "je reactie is verstuurt";
        header("refresh:1;url=Gastenboek.php"); 
        exit;

}    

 

 
 


 
 
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reactie check </title>
</head> 
<style>
a { 
color:black; 
text-decoration:none; 
font-size:22px; 
font-family: 'Roboto', sans-serif;
} 

p { 
font-size:20px;
font-family: 'Roboto', sans-serif;
}
</style>
<body>
    
</body>
</html>
