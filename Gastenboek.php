<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="language" content="NL">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Steen Papier Schaar spel">
	<meta name="author" content="Yassin Chamlal">
	<meta name="keywords" content="Steen Papier Schaar spel rps game">
	<title> Gastenboek </title>
	<link rel="stylesheet" type="text/css" href="css/Gastenboek.css"> 

  <script src="JS/ButtonToTop.js"></script> 
</head>  
 
<script>  
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}  


</script> 
 
 
<body>   
<header>   

  

<section> 
		<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> 
            <a href="Index.html">Het Spel</a> 
             <hr>
            <a href="Over Mij.html">Profiel Pagina</a> 
            <hr>
            <a href="Portfolio.html">Gastenboek</a> 
            <hr>
            <a href="Contact.html">Resultaten</a>  
            <hr>   
            <a href="Gastenboeklogin.php">Uitloggen</a>  
            <hr>  
            <img src="img/menuplaatje.png" class="menuplaatje" alt="menu plaatje">
		  </div>  
      <span class="menuknop" onclick="openNav()">&#9776;</span> 
      </section>  

<h1>Welkom op het Gastenboek</h1>  
    </header>    

    <body>  
    <div class="plaatsbericht">
<section> 
  <form method='POST' enctype='multipart/form-data'> 
  <input type="text" name="bericht" class="textbericht" placeholder="type hier je bericht"> </input>  <br><br>
  
  <input type="hidden" name="reactie"> </input>  

    <input type='file' name='file'> </input> <br><br>
  <p >Selecteer hieronder een foto</p>
  <button type="submit" name="versturen" class="knopplaats">Plaats bericht</button> <br><br> 
  </form> 
  </section>   
</div>
 

</body>
</html>
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

//var_dump($_SESSION['username']);
//var_dump($_SESSION['password']);
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
    $sql = "INSERT INTO berichten (Berichten,Tijd,auteur) 
    VALUES ( '$bericht',CURRENT_TIMESTAMP(),'".$_SESSION['username']."')";    
    
 
}  else {

      $bericht = ($_POST['bericht']);  
      $sql = "INSERT INTO berichten (Berichten,Tijd,name,auteur) 
      
      VALUES ('$bericht',CURRENT_TIMESTAMP(),'".$name."','".$_SESSION['username']."')";   
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
  $sql = "SELECT berichten,tijd,name,ID,auteur
  FROM berichten";   
  if($result = $conn->query($sql)) { 
  while($row = $result->fetch_array()) {        
    echo"<div class='Berichten'>";  
    echo "<p class='tijd'>Gebruiker:".$row['auteur'] ."<br>" ;   
    echo "<p class='tijd'>Geplaast op:  ".$row['tijd'] ."<br>" ;   
    echo "<p class='bericht' >Bericht:</p>".$row['berichten']."<br>" ;    
    echo '<input type="hidden" name="bericht"> </input>'."<br>";     

 
 
    echo' <form action="reactie.php" method="GET"> 
    <input type="text" class="inputreactie" name="reactie" placeholder="schrijf hier je reactie"> </input>  
   <input type="hidden" name="ID" value ="'.$row['ID'].'"> </input>  <br>  
    <button type="submit"  class="reageerknop"  name="opslaan"> Reageer </button>   
    </form> ';   

    echo"<br>";
    
    if(empty($row['name'])) { 
    }else { 
     echo "<img src='paatsplaatje/".$row['name']."'class='plaatjegastenboek' alt=''/>";
    } 


      $eyedi =  $row['ID'];
  
      $sql2 = "SELECT reactie.react
      FROM Reactie
      WHERE connectie =  $eyedi";
      if($result2 = $conn->query($sql2)) { 
      while($row2 = $result2->fetch_array()) {  
      echo "<p class='reactie' >Reactie:</p>".$row2['react'];  

   

    
  

    $conn->query($sql2);  
    } 

    $result2->close(); 
    }  
     echo "</div>";
  $conn->query($sql);  
  } 

  $result->close(); 
  }



 
?> 
 <button onclick="topFunction()" id="myBtn" class="scrollToTopBtn" title="Go to top">☝️</button>

 