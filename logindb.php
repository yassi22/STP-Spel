<?php 
$error = ""; 
if (isset($_POST ['submit'])) { 
    if (!empty($_POST['username']))  { 
       
       require('dbconnect.php'); 
      $sql = "SELECT * FROM Gebruikers WHERE username = '". $_POST['username'] . "'";  
      

      if ($result = $conn->query($sql)) { 

        $aantal = $result->num_rows;  
        if ($aantal == 1) { 
           session_start(); 
           $_SESSION['ingelogd'] = true; 
           $_SESSION['username'] = $_POST['username'];  
           header("Location: ingelogd.php");
    } else {
        $error = "niet de juiste gegevens ingevuld";
    }
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
	<title>Login pagina</title>
	<link rel="stylesheet" type="text/css" href="css/logindbstyle.css">
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

    <h1>Welkom op de login pagina</h1> 

    </header>   


<main>  
 

<section class="formulier">  
<form method="POST">  
<?php echo $error; ?> <br> 
<p class="loginhier">Login hier: </p>
<p>Gebruikersnaam</p><br> 
<input type="text" name="username" class="gebruikersnaaminput" placeholder="vul hier je gebruikersnaam in"></input> <br><br> 

<button type="submit" name="submit" class="inlogknop" value="Inloggen">Login</button>   <br><br> 

<p class="noregister"> Nog Geen account ? </a> <br><br>  

<p> Registeer hier  </p> <br> 
 
<button class="knopregister"><a href="logindbregister.php">Registeer</a></button> 

</form>  

</section>   
<article>
 <img src="img/userlogin.png" class="plaatje" alt="gebruiker login"> 
</article>

	</main>

</body>

</html>


 