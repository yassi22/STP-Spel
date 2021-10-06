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

    $query = "SELECT ID,username  
    FROM gebruikers  
    WHERE username = '$usernaam'";       
    $result = $conn->query($query); 
    $row =  $result->fetch_array();
    $ingevuld = $row['username'];
    
          if (empty(($_POST['username']))) {  
          echo "je moet wel iets invullen";      
 
   
       // hier moet iets komen om te vergelijk of iets al in de db staat;
          } else if( $ingevuld == $usernaam )  {        
           
          echo "je hebt al je gegevens ingevuld";      



          } else {   
          //verstuur als de beiden condities false zijn
          $naam = ($_POST['username']);    

          $sql  = "INSERT INTO Gebruikers (username)  
          VALUES ('$naam')";     
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
	<title>Registeer voor de Login</title>
	<link rel="stylesheet" type="text/css" href="css/loginregister.css">
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

<h1>Welkom op de Registratie pagin van de login</h1>  

   </header>   


<main>  

<div class="wrapper"> 
  <div class="Formulueren">
<section class="formulier">  
<form  method="POST">  
<p class="registeerhier">Registeer hier: </p> 
  <p class="naamgebruiker">Gebruikersnaam:</p> <br>
 <input type="text" name="username" class="gebruikersnaaminput" placeholder="vul hier je gebruikersnaam in"></input> <br>
 <br> 
 <button type="submit" name="submit"  class="knopregister"  value="sla op"> Toevoegen </button> <br> <br>  
<button class="knopterug">  <a href="logindb.php" > Terug naar de inlog pagina</a> </button> <br> <br>
 </form>
</section>   
</div>
<div class="Plaat">
 <img src="img/gastenboekregister.png" class="plaatje" alt="gastenboek registratie"> 
</div> 
</div>
</main>

</body>

</html>

  











