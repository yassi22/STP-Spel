<?php   
 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "rpsgame";
 $conn = new mysqli($servername, $username, $password,$database); 
 if($conn->connect_error) { 
     die("Connection failed : " . $conn->connect_error); 
 }     
  
    if (isset($_POST['submit'])) {    
  
        $usernaam =  ($_POST['username']); 

        $query = "SELECT  username,password
        FROM gasten  
        WHERE username = '$usernaam'";   

        $result = $conn->query($query); 
        $row = $result->fetch_array(); 

        $ingevuld = $row['username'];
        
              if (empty(($_POST['username']))) {  
              echo "je moet wel iets invullen";      
     
       
           // hier moet iets komen om te vergelijk of iets al in de db staat;
              } else if( $ingevuld == $usernaam )  {        
               
              echo "je hebt al je gegevens ingevuld";      
    
    
    
              } else {   
              //verstuur als de beiden condities false zijn
              $naam = ($_POST['username']);    
              $wachtwoord = ($_POST['password']);    

              $sql  = "INSERT INTO gasten (username,password)  
              VALUES ('$naam','$wachtwoord')";     
              var_dump($sql);
                
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
	<title>Registeer Gastenboek</title>
	<link rel="stylesheet" type="text/css" href="css/gastenboekregsiter.css">
</head> 
<script>  
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
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

<h1>Welkom op de Registratie pagina van het Gastenboek</h1>  

   </header>   


<main>  

<section class="formulier">  

<form  method="POST">    
<p class="registeerhier">Registeer hier: </p> 
  <p class="naamgebruiker">Gebruikersnaam:</p> <br>
  <input type="text" name="username"  class="gebruikersnaaminput" placeholder="Vul hier je gebruikersnaam in"></input>  <br><br>

  <p class="wwgasten">Wachtwoord:</p> <br>
  <input type="password" name="password"  class="wachtwoordinput" placeholder="Vul hier je wachtwoord in"  /></input><br>  <br>

  <button type="submit" name="submit" class="inlogknop"  value="sla op"> Toevoegen </button> <br> <br> 

 <button class="knopterug" ><a href="logindb.php" class="linklogout"> Terug naar de inlog pagina </a> </button> <br>   <br>
 <button class="knopterug"><a href="Gastenboeklogin.php" class="linklogout">Terug naar het spel</a> </button>  
  </form>

</section>   

<article>
 <img src="img/gastenboekregister.png" class="plaatje" alt="gastenboek registratie"> 
</article>
</main>

</body>

</html>
  


 





















 