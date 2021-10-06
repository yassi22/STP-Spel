<?php 

session_start(); 
if ($_SESSION['ingelogd'] != true) { 
    header("Location: logindb.php"); 
}    

include 'dbconnect.php'; 
 


if(isset($_POST['submit'])){ 
  
    
    if (empty($_POST['spel'])) { 
        echo  "je moet eerst wel een keuze maken";  
        header("refresh:1;url=ingelogd.php");  

    } else { 
     
        $keuzes = array('rock','paper','sciccors');  

        if(isset($_POST['spel'])) {  

    
            $speler =  $_POST['spel']; 
            $x      = $keuzes[rand(0,2)];   
            $win = "Gewonnen"; 
            $lose = "Verloren"; 
            $draw = "Gelijkspel"; 
            $qweryUserId = "SELECT ID FROM gebruikers where username = '".$_SESSION['username']."'";
            $resultaat = $conn->query($qweryUserId); 
            $getUserId  =  $resultaat->fetch_array();   
            $opgehaald = $getUserId['ID'];


        // Hier gaan we de magie uitvoeren =D 

        // $speler = 'Rock';
        // $x      = 'Scissors'; 
       
        echo 'Keuze speler: ' . $speler;
        echo '<br/>';
        echo 'Keuze computer: ' . $x;
        echo '<br/>'; 
      
    
 
        
        if( $speler == 'rock' ){

            if($x == 'sciccors'){
                $sql = "INSERT INTO Resultaten (PC,Speler,win,userID)
                VALUES ('$x','$speler','$win','$opgehaald')";    
                $conn->query($sql);  
              
            }elseif($x == 'paper'){
                $sql = "INSERT INTO Resultaten (PC,Speler,lose,userID)
                VALUES ('$x ','$speler','$lose','$opgehaald')";   
                $conn->query($sql);  
                 
            }elseif($x == 'rock'){
                $sql = "INSERT INTO Resultaten (PC,Speler,draw,userID)
                VALUES ('$x','$speler','$draw','$opgehaald')";   
                $conn->query($sql);  
            
            }

        }elseif($speler == 'paper'){  

            if($x == 'rock'){

                $sql = "INSERT INTO Resultaten (PC,Speler,win)
                VALUES ('$x','$speler','$win')";  
              $conn->query($sql);  

            }elseif($x == 'sciccors'){

                $sql = "INSERT INTO Resultaten (PC,Speler,lose)
                VALUES ('$x','$speler','$lose')";  
            $conn->query($sql);  

            }elseif($x == 'paper'){

                $sql = "INSERT INTO Resultaten (PC,Speler,draw)
                VALUES ('$x','$speler','$draw')";  
            $conn->query($sql);  

            } 

        }elseif($speler == 'scissors'){   

            if($x == 'paper'){

                $sql = "INSERT INTO Resultaten (PC,Speler,win)
                VALUES ('$x','$speler','$win')";  
                 $conn->query($sql);  

            }elseif($x == 'rock'){

                $sql = "INSERT INTO Resultaten (PC,Speler,lose )
                VALUES ('$x','$speler','$lose')";  
              $conn->query($sql);  

            }elseif($x == 'sciccors'){ 

                $sql = "INSERT INTO Resultaten (PC,Speler,draw)
                VALUES ('$x','$speler','$draw')";
              $conn->query($sql);  
            } 
      } 
    }    

 
header('location:resulst.php');
die;

 
}   

    
}

 

 ?> 






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Steen Papier Schaar</title>
</head> 
<style> 
h1 { 
 text-align:center; 
 font-size:20px;
 color:black; 
 font-family: 'Open Sans', sans-serif;
} 

input { 
margin: 0 auto; 
text-align:center; 
font-family: 'Open Sans', sans-serif;
font-size:14px;
} 

 form { 
	 text-align:center;  
	 font-size:18px; 
	 font-family: 'Open Sans', sans-serif;
 }

button { 
	border:2px solid black; 
	width:80px; 
	height:30px;
	margin-top:2vh; 
	font-size:14px; 
    font-family: 'Open Sans', sans-serif; 
    border-radius:10px;
} 
 
 
 



</style> 
<body>  
<main> 
<form action="resulst.php" method="POST"> 
<form> 
 
	</main>
    </body>
    </html>

 

