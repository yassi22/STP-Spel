<?php   
session_start(); 
if ($_SESSION['ingelogd'] != true) { 
    header("Location: logindb.php"); 
}    
$servername = "localhost";
$username = "root";
$password = "";
$database = "rpsgame";
$conn = new mysqli($servername, $username, $password,$database); 
if($conn->connect_error) { 
    die("Connection failed : " . $conn->connect_error); 
}     
 

 
   if (isset($_POST['submit'])) {    
 // de username en id ophalen van gebruiker om later te checken of de id overeenkomt met de id 
 // van de table profiel

        $usernaam = $_SESSION['username']; 

        $query = "SELECT ID,username  
        FROM gebruikers  
        WHERE username = '$usernaam'";       
       $result = $conn->query($query); 
       $row =  $result->fetch_array();
        $userid = $row['ID'];    
            

        $sql2 = "SELECT *  
        FROM Profiel 
        WHERE ID  =  $userid";       
              $result2 = $conn->query($sql2); 
              $row2 =  $result2->fetch_array();
        $idprofiel = $row2['ID'];  
 
        
 

          if (empty(($_POST['naam']))) {  
          echo "je moet wel iets invullen";      
 
   
       
          } else if( $userid == $idprofiel )  {        
           
          echo "je hebt al je gegevens ingevuld";      



          } else {   
          //verstuur als de beiden condities false zijn
            $gebruikerid = $row['ID'];
            $naam = ($_POST['naam']);  
            $email = ($_POST['email']); 
            $leeftijd = ($_POST['leeftijd']);      

          $sql  = "INSERT INTO Profiel (ID,naam,email,leeftijd)  
          VALUES ($gebruikerid,'$naam','$email','$leeftijd')";     

            
        if ($conn->query($sql)) { 
          echo "Je gevens zijn toegevoegd"; 
      }     



    }  


 

} 

 
 

?> 


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="language" content="NL">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Steen Papier Schaar spel">
	<meta name="author" content="Yassin Chamlal">
	<meta name="keywords" content="Steen Papier Schaar spel rps game">
	<title>Profiel Pagina</title>
	<link rel="stylesheet" type="text/css" href="css/Profiepagina.css">
</head>  


<script>  
function openNav() {
  document.getElementById("mySidenav").style.width = "360px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
  

 
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>   


<body>   
<header>   

 

    <h1>Welkom op de Profiel Pagina</h1> 
 


    <section> 
		<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> 
            <a href="ProfielPagina.php">Profiel Pagina</a> 
             <hr>
            <a href="ingelogd.php">Het spel</a> 
            <hr>
            <a href="GastenBoeklogin.php">Gastenboek</a> 
            <hr>
            <a href="resulst.php">Resultaten</a>  
            <hr>  
            <img src="img/menuplaatje.png" class="menuplaatje" alt="menu plaatje">
		  </div>  
      <span class="menuknop" onclick="openNav()">&#9776;</span> 
      </section> 
      
    </header>   


<main>  

<section class="formulier"> 
<form  method="POST">   
<p> Vul hier je Profiel gevens in:
  <p> Naam: </p>
 <input type="text" name="naam" class="gebruikersnaaminput"  placeholder="Naam"></input> <br> 
 <br> 
 <p> Email: </p>
 <input type="text" name="email"  class="gebruikersnaaminput" placeholder="E-mailadres"> </input> <br> 
 <br> 
 <p> Leeftijd: </p>
 <input type="text" name="leeftijd" class="gebruikersnaaminput"  placeholder="leeftijd"></input> <br> 
 <br>   
 <button type="submit" class="inlogknop" name="submit"  value="sla op"> Toevoegen </button> <br>  <br> 
 </form> 
 <section>

</section>    

<div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Wijzig gegevens</button>
        <div id="myDropdown" class="dropdown-content">
          <a href="updatepage.php">Wijzig je profiel gegevens</a>
          <a href="registerupdate.php">Wijzig je username</a>
          <a href="updategastenboek.php">Wijzig je gastenboek gegevens </a>
        </div>
      </div>   
</section>  
  

<article>
 <img src="img/userlogin.png" class="plaatje" alt="gebruiker login"> 
</article>  




<br>

<section class="Scorenboard">  
<article class="Score">
<?php  
    

$sql = "SELECT COUNT(win) as 'Gewonnen'
FROM Resultaten";   
if($result = $conn->query($sql)) { 
    while($row = $result->fetch_array()) { 
        echo '<p class="score">Scoren</p>';
    echo "<p>Gewonnen:</p>".$row['Gewonnen'];
  }       
}
 
$sql = "SELECT COUNT(lose) as 'Verloren'
FROM Resultaten";   
if($result = $conn->query($sql)) { 
    while($row = $result->fetch_array()) { 
    echo "<p>Verloren:</p>".$row['Verloren'];
  }      
} 

$sql = "SELECT COUNT(draw) as 'Gelijkspel'
FROM Resultaten";   
if($result = $conn->query($sql)) { 
    while($row = $result->fetch_array()) { 
    echo "<p>Gelijk:</p>".$row['Gelijkspel']; 
 
  }         
}     


echo "<br><br>"; 
echo "<br><br>"; 
echo "<br><br>"; 


$sql = "SELECT * FROM Resultaten"; 
if($result = $conn->query($sql)) { 
  while($row = $result->fetch_array()) { 
    echo "<p>Resultaat:PC</p>".$row['PC']."</br>"."</br>"; 
    echo "<p>Resultaat:Speler</p>".$row['Speler']."<br>"."</br>";     
    echo "<p>  </p>".$row['win'];
    echo "<p>  </p>".$row['lose'];
    echo "<p>  </p>".$row['draw']; 
  
 
  
    echo "<hr/>"; 
  }      

  $result->close();
} 
 
$conn->close();  

  

?>  
</article>
</section> 





  
	</main>

</body>

</html>








