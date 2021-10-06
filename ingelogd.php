<?php 
session_start(); 
if ($_SESSION['ingelogd'] != true) { 
    header("Location: logindb.php"); 
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
	<title>Keuzes</title>
	<link rel="stylesheet" type="text/css" href="css/ingelogd.css">
</head> 
<script>  
function openNav() {
  document.getElementById("mySidenav").style.width = "360px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>  
<body>   
<header>    



<section>
 <div class="golftje"> <img src="img/golf.png" class="golf" alt="golf aan de rechter kant">   </div> 
 <div> <img src="img/golf.png" class="golf2" alt="golf aan de linker kant">   </div>
</section>   

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
            <a href="uitloggen.php">Uitloggen</a>  
            <hr>  
            <img src="img/menuplaatje.png" class="menuplaatje" alt="menu plaatje">
		  </div>  
      <span class="menuknop" onclick="openNav()">&#9776;</span> 
      </section> 
      

<h1>Welkom op het spel</h1>   
<h2> Maak je keuze</h2>  

</header>   


<main>   

 
  
<form name="spel" action="verwerking.php"  method="POST">  
    
<section class="moving"> 
<label class="container"> 
  <input type="radio" name="spel"   value="rock">   
  <span class="checkmark"> <p class="steen">   ✊ </p> </span>
</label> 
 
<label class="container"> 
  <input type="radio" name="spel"  value="paper">    
  <span class="checkmark"> <p class="papier"> ✋   </p> </span>
</label> 

<label class="container">   
  <input type="radio" name="spel" value = "scissors">  
  <span class="checkmark">  <p class="schaar">  ✌️</p> </span>
</label>  
</section>
<br> <br> 
<button type="submit"  class="inlogknop" name="submit" value="Submit"> Speel </button> <br> <br>  
</form>
</main>

</body>

</html>













