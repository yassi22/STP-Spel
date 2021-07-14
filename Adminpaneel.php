
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="language" content="NL">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Steen Papier Schaar spel">
	<meta name="author" content="Yassin Chamlal">
	<meta name="keywords" content="Steen Papier Schaar spel rps game">
	<title> Adminpaneel </title>
	<link rel="stylesheet" type="text/css" href="css/Adminpaneel.css">
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

<h1>Welkom op het admin paneel</h1>  
<h2> Hier kan je berichten verwijderen </h2>
    </header>   


<main>  

	</main>

</body>
</html>



<?php 
session_start(); 
if ($_SESSION['admin'] != true) { 
    header("Location: Adminpaneel.php"); 
}      

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "rpsgame";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }    
        
// hier gaan we door de berichten heen lopen   

        $sql = "SELECT berichten,tijd,name,ID
        FROM berichten";   
        if($result = $conn->query($sql)) { 
        while($row = $result->fetch_array()) {        
           
        
          echo"<section class = 'Berichten'>"; 
          echo "<p class='tijd '>Gebruiker ".$row['tijd'] ."<br>"."</br>";   
          echo "<p class='tijd '>Geplaast op  ".$row['tijd'] ."<br>"."</br>";   
          echo "<p class='bericht'>Bericht:</p>".$row['berichten']."<br>"."</br>";    
          echo '<input type="hidden" name="bericht"> </input>'."<br>"."</br>";     
       
         
          echo' <form action="reactie.php" method="GET"> 
          <input type="text" class="inputreactie" name="reactie" placeholder="schrijf hier je reactie"> </input> <br> <br> 
          <input type="hidden" name="ID" value ="'.$row['ID'].'"> </input>  <br>  
          <button type="submit" class="reageerknop"  name="opslaan"> Reageer </button>  <br> <br> 
          </form> '."<br>";      
          ?> <button class="knopregister"><a href="Deleteadmin.php?ID=<?php echo $row["ID"]; ?>">Delete</a></button> <br> <br> <?php  
          

          
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
            echo "<p class='reactie'>Reactie:</p>".$row2['react']."<br>"."</br>";       
         
          
           
 
            echo "</section>";
        
         
       

        
      
          $conn->query($sql2);  
          } 
      
          $result2->close(); 
          } 
      
        $conn->query($sql);  
        } 
      
        $result->close();  
             }
      
 
 

?> 

  

