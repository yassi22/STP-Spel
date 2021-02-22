<?php  
 $error = ""; 
 if (isset($_POST ['submit'])) { 
     if (!empty($_POST['username'])) {  

   if (!empty($_POST['username']) && !empty($_POST['password'])) {  
       $username = "admin"; 
       $password = "admin"; 
       if ($username == $_POST['password'] && $password == $_POST['password']) { 
       session_start(); 
       $_SESSION['admin'] = true;    
       header("Location: Adminpaneel.php"); 
   }
    }     
    
        require('dbconnect.php'); 
       $sql = "SELECT * FROM Gasten WHERE username = '". $_POST['username'] . "'  
       AND password = '" . $_POST['password'] ."'";  

       if ($result = $conn->query($sql)) { 
       
         $aantal = $result->num_rows;  
         if ($aantal == 1) { 
            session_start(); 
            $_SESSION['ingelogd'] = true; 
            $_SESSION['username'] = $_POST['username'];   
            $_SESSION['password'] = $_POST['password'];  
            header("Location: Gastenboek.php");      
    
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
	<title>Gastenboek Login</title>
	<link rel="stylesheet" type="text/css" href="css/Gastenboeklogin.css">
</head>  
<style> 
 .sidenav {
  height: 100%;
  width: 0;
  position: absolute;
  z-index: 1;
  top: 0;
  background-color: #FFD40C;
  overflow-x: hidden;
  transition: 0.5s; 
  right:0px;
}

.sidenav a {
  padding: 10px 10px 10px 30px;
  text-decoration: none;
  font-size: 26px;
  color: #2070BF;
  display: block;
  transition: 0.3s;  
  font-family: Arial, Helvetica, sans-serif; 
  text-align: center; 
   
}

.sidenav a:hover {
  color: #6cc6d2;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 15px;
  font-size: 36px;
  margin-left: 50px;
}
.sidenav {padding-top: 15px;}
.sidenav a {font-size: 26px;}
.menuknop { 
 float:right;
 font-size:45px; 
  cursor:pointer;
  color:#2070BF;   
  margin-right:2vw; 
 
}

hr { 

border:1px solid #2070BF;
}  

.menuplaatje { 
height: 255px;
width: 255px;
margin: 0 auto; 
text-align: center; 
display: block; 
padding-top:50px;
}  

  
</style>
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
            <img src="img/menuplaatje.png" class="menuplaatje" alt="menu plaatje">
		  </div>  
      <span class="menuknop" onclick="openNav()">&#9776;</span> 
      </section> 

<h1>Welkom op het Gastenboek login</h1> 

    </header>   


<main>  

<section class="formulier">  
    
<form method="POST"> 
<?php echo $error; ?> <br> 
<p class="loginhier">Login hier: </p> 

<p>Gebruikersnaam</p><br><input type="text"  class="gebruikersnaaminput"  placeholder="vul hier je gebruikersnaam in "name="username" /></input><br><br>  

<p>Wachtwoord</p><br><input type="password" class="wachtwoordinput" placeholder="vul hier je wachtwoord in" name="password" /></input><br><br>    

<button type="submit" name="submit" class="inlogknop"  value="Inloggen">Login</button> <br><br> 

<p class="noregister"> Nog Geen account ? </a>  <br><br> 
<p> Registeer hier  </p> <br>  
<button class="knopregister" ><a href = "gastenboekregister.php"   >Registreer  </a> </button> <br> <br>

</form>
 

</section>   

<article>
 <img src="img/logingastenboek.png" class="plaatje" alt="gastenboek login"> 
</article>
	</main>

</body>

</html>


 























