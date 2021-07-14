<?php   
session_start(); 
if ($_SESSION['ingelogd'] != true) { 
    header("Location: logindb.php");  
}     

$servername = "localhost";
$username = "root";
$password = "";
$database = "rpsgame";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    
  
    if (isset($_POST['submit'])) {  
        $usernaam = $_SESSION['username'];   
        $query = "SELECT ID,username  
        FROM gebruikers  
        WHERE username = '$usernaam'";      
    if($result = $conn->query($query)) { 
      while($row = $result->fetch_array()) {    
          
    
        if (empty($_POST['naam'])) {  
         echo "je moet wel iets invullen"; 

        } else  { 

            $naam = ($_POST['naam']);  
            $email = ($_POST['email']); 
            $leeftijd = ($_POST['leeftijd']); 
            $geberuikerid = $row['ID'];
 
                $sql  = "UPDATE Profiel SET Naam = '$naam', Email = '$email', Leeftijd = '$leeftijd' 
                WHERE ID = '$geberuikerid'";
               
            
            if ($conn->query($sql)) { 
                echo "Het is gelukt"; 
            }  
        }
    
        $conn->query($query);  
    } 
    
    $result->close(); 
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
	<title>Wijzig pagina</title>
	<link rel="stylesheet" type="text/css" href="css/Wijzigpagina.css">
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
 <div> <img src="img/golf.png" class="golf" alt="golf aan de rechter kant">   </div> 
</section>   

<section> 
		<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> 
            <a href="ingelogd.php">Het spel</a> 
            <hr>
            <a href="GastenBoeklogin.php">Gastenboek</a> 
            <hr>
            <a href="resulst.php">Resultaten</a>  
            <hr>   
            <a href="uitloggen.php">Uitloggen</a>  
            <hr>    
            <a href="ProfielPagina.php">ProfielPagina</a>  
            <hr>  
        
            <img src="img/menuplaatje.png" class="menuplaatje" alt="menu plaatje">
		  </div>  
      <span class="menuknop" onclick="openNav()">&#9776;</span> 
      </section> 
      

<h1>Welkom op de wijzig pagina</h1>   

</header>   


<main>    
<div class="wrapper"> 
<div class="Formulueren">
<section class="formulier"> 
<form  method="POST">   
<p class="profielwijzig"> Wijzig je profiel gegevens<p>
<p class="naam">Naam:</p><br> 
 <input type="text" name="naam" class="gebruikersnaaminput" placeholder="Naam">  </input> <br> <br>
 
 <p>Email:</p><br> 
 <input type="text" name="email" class="gebruikersnaaminput" placeholder="E-mailadres"> </input> <br> <br> 

 <p>Leeftijd:</p><br> 
 <input type="text" name="leeftijd" class="gebruikersnaaminput" placeholder="leeftijd"> </input>   <br> <br> 

 <button type="submit" class="inlogknop" name="submit"  value="sla op"> Wijzig </button> <br> <br> 
 
 </form>
 </section>   
</div>


 <div class="Plaat">
 <img src="img/updatepagina.png" class="plaatje" alt="persoon die zijn gegevens wijzigd"> 
</div>
</div>  
</div>
</main>

</body>

</html>











