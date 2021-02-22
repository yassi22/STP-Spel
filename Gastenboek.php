<?php 
session_start(); 
if ($_SESSION['ingelogd'] != true) { 
    header("Location: Gastenboeklogin.php");  
}        


$servername = "localhost";
$username = "root";
$password = "";
$database = "rpsgame";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    

var_dump($_SESSION['username']);
var_dump($_SESSION['password']);
 // dit verstuurd alles
 
 
  if (isset($_POST['versturen'])) { 
  
    if (empty($_POST['bericht'])) {  

      echo "je moet eerst wel een bericht schrijven"; 
      echo "<br><br>";

  } else { 

    // hier worden de variabelen gezet
      $name = $_FILES['file']['name'];
      $target_dir = "paatsplaatje/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);

      // hier wordt een bestand type geselecteerd
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // een array om te kijken welke bestand type het is 
      $extensions_arr = array("jpg","jpeg","png","gif"); 
    
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
    }   
    
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);


 
// hier check ik of de $name leeg is of niet 


  if (empty($_FILES)) {

    $bericht = ($_POST['bericht']); 
    $sql = "INSERT INTO berichten (Berichten,Tijd) 
    VALUES ( '$bericht',CURRENT_TIMESTAMP() )";    
    
 
}  else {

      $bericht = ($_POST['bericht']); 
      $sql = "INSERT INTO berichten (Berichten,Tijd,name) 
      
      VALUES ('$bericht',CURRENT_TIMESTAMP(),'".$name."')";   
        $conn->query($sql);     
         
}   

}

} 

    if (isset($_POST['opslaan'])) {  

      if (empty(($_POST['reactie']))){    
      
      
      } else { 
      
    $id = ($_POST['ID']);     
    $reactie = ($_POST['reactie']);      
    $sql = "INSERT INTO Reactie (React) 
    VALUES ($reactie)
    WHERE id = '$id'"; 
      
      $conn->query($sql);
      
        }   
      }   


 // bericht ophalen en er door heen lopen
  $sql = "SELECT berichten,tijd,name,ID
  FROM berichten";   
  if($result = $conn->query($sql)) { 
  while($row = $result->fetch_array()) {        
    
    echo "<p>Geplaast op  ".$row['tijd'] ."<br>"."</br>";   
    echo "<p>Bericht:</p>".$row['berichten']."<br>"."</br>";    
    echo '<input type="hidden" name="bericht"> </input>'."<br>"."</br>";     

 
 
    echo' <form action="reactie.php" method="GET"> 
    <input type="text" name="reactie" placeholder="schrijf hier je reactie"> </input> <br> <br> 
   <input type="hidden" name="ID" value ="'.$row['ID'].'"> </input>  <br>  
    <button type="submit" name="opslaan"> Reageer </button>  <br> <br> 
    </form> '."<br>";     
    
    if(empty($row['name'])) { 
    }else { 
     echo "<img src='paatsplaatje/".$row['name']."'class='plaatje' alt=''/>";
    } 


      $eyedi =  $row['ID'];
  
      $sql2 = "SELECT reactie.react
      FROM Reactie
      WHERE connectie =  $eyedi";
      if($result2 = $conn->query($sql2)) { 
      while($row2 = $result2->fetch_array()) {  
      echo "<p>Reactie:</p>".$row2['react']."<br>"."</br>";       

      echo "<hr/>"."<br>"."</br>";   


    
  

    $conn->query($sql2);  
    } 

    $result2->close(); 
    } 

  $conn->query($sql);  
  } 

  $result->close(); 
  }



 
?> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek</title>
</head> 
<style> 
.linkje{ 
color:black; 
text-decoration:none; 
font-size:20px;
font-family: 'Open Sans', sans-serif;  

} 
.knop { 
    border:2px solid black; 
	width:140px; 
	height:24px;
	font-size:16px; 
    font-family: 'Open Sans', sans-serif; 
    border-radius:10px;  
    margin:0 auto; 
}  
.knopvoorreactie { 
  border:2px solid black; 
	width:140px; 
	height:24px;
	font-size:16px; 
    font-family: 'Open Sans', sans-serif; 
    border-radius:10px;  
    margin:0 auto; 
    cursor: pointer;
} 

 a { 
   color:black; 
   font-size:18px; 
   font-family: 'Open Sans', sans-serif;  
   text-decoration:none; 
 }

.textbericht{ 
 
text-align:center; 
font-family: 'Open Sans', sans-serif;
font-size:14px;  
width:400px; 
height:200px; 
border-radius:10px;
border:1px solid black; 

} 

.inputvoorreacite { 
  text-align:center; 
font-family: 'Open Sans', sans-serif;
font-size:14px;  
width:150px; 
height:40px; 
border-radius:10px;
border:1px solid black; 
} 

.plaatje { 
 height:300px;
 
}  

img { 
  border:1px solid white !important;
}
 

</style>
<body> 
<section> 
  <form method='POST' enctype='multipart/form-data'> 
  <input type="text" name="bericht" class="textbericht" placholder="type hier je bericht"> </input>  <br><br>
  
  <input type="hidden" name="reactie"> </input>  

    <input type='file' name='file'> </input>
  
  <button type="submit" name="versturen" class="knop">Plaats bericht</button> <br><br> 
  <a href="Uitloggengastenboek.php" class="linkje" >Uitloggen </a>  <br>
  <a href="ProfielPagina.php" class="linkje" >Naar de profiel pagina </a>  
  </form> 
  </section>   

 

</body>
</html>