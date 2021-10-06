<?php   
session_start(); 
if ($_SESSION['ingelogd'] != true) { 
    header("Location: logindb.php");  
}   

//var_dump($_SESSION['username']); 
//var_dump($_SESSION['password']);  

 
$servername = "localhost";
$username = "root";
$password = "";
$database = "rpsgame";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}     
//to do 
//feature maken dat als de naam als bestaat bij update page 
// dat moet je iets anders invullen <= misschien maken ? en alleen bij email en naam
  
if (isset($_POST['submit'])) {   

    $usernaam = $_SESSION['username'];    

    $query = "SELECT username,password,ID 
    FROM gasten  
    WHERE username = '$usernaam'";      
if($result = $conn->query($query)) { 
  while($row = $result->fetch_array()) {    
      

    if (empty($_POST['username'])) {   

     echo "je moet wel iets invullen"; 

    } else  { 

        $naam = ($_POST['username']);   
        $password = ($_POST['password']);   
        $geberuikerid = $row['ID'];

            $sql  = "UPDATE gasten SET username = '$naam', password = '$password'
            WHERE ID = '$geberuikerid'";
           
        
        if ($conn->query($sql)) { 
            echo "Je gevegens zijn aangepast"; 
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
	<title>Wijzig je gastenboek gegevens</title>
	<link rel="stylesheet" type="text/css" href="css/updategastenboek.css">
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
 <div> <img src="img/golf.png" class="golf" alt="golf">   </div>
</section>    

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
            <a href="ProfielPagina.php">ProfielPagina</a>  
            <img src="img/menuplaatje.png" class="menuplaatje" alt="menu plaatje">
		  </div>  
      <span class="menuknop" onclick="openNav()">&#9776;</span> 
      </section> 

<h1>Wijzig je gastenboek gegevens</h1> 

    </header>   


<main>  
<div class="wrapper"> 
<div class="Formulueren">
<section class="formulier">  
   
<form  method="POST">  
<p class="naam">Wijzig hier je gastenboek gegevens</p> <br>
<p>Gebruikersnaam:</p><br> 
 <input type="text" name="username" class="gebruikersnaaminput" placeholder="Vul hier je gebruikersnaam in"> </input>  <br>
 <br>  
 <p>Wachtwoord:</p> <br> 
 <input type="password" name="password" class="wachtwoordinput"  placeholder="Vul hier je wachtwoord in"> </input> <br>
 <br> 
 <button type="submit" class="knopregister" name="submit"  value="sla op"> Wijzig </button> <br> <br> 
 
 
 </form> 
 
 
</section>   
</div>
<div class="Plaat">
 <img src="img/updategastenboek.png" class="plaatje" alt="Wijzeging van het gastenboek"> 
</div> 
</div>
	</main>

</body>

</html>















