<html>

<head>
<style> 
body {
 
  
 
  background: url(partita_image.jpg);
  background-repeat: no-repeat;
  background-size: 100% 100%;
  text-align:center;
  line-height: 3.4;
   font-size: 130%;
   color:white;
 
}
h1{
 	line-height: 1.4;
	font-size: 80%;
    text-align:left;
    color:white;
}
input{
	font-size:90%;
}
input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  transform: scale(2);
   padding: 10px;
   
}
p{
 
 color:grey;
  
}
#countdown{
 
 color:grey;
  
}



</style>
<meta charset="utf-8">
<link rel="stylesheet" href="home.css"/>
	
</head>
<body>

	

<?php
  session_start();
  	$_SESSION['nickname'] ;
  	$_SESSION['nomeLobby']  ;
	echo "<h1> nickname: ".$_SESSION['nickname'] ."</h1>";
    echo "<h1> nome lobby: ".$_SESSION['nomeLobby'] ."</h1>";
	
	if(!isset($_SESSION['nickname'])){
		echo "<script>window.location = 'http://websitemassimo.altervista.org'</script>";		
	}

  /*$cookie_name = "utente";
  $cookie_value = "codice_univoco";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day*/
 

  

  $servername = "localhost";
	$username = "websitemassimo";
	$password = "";
	$dbname = "my_websitemassimo";
	// Crea connessione
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Verifica connessione
	if ($conn->connect_error) {
	    die("Connessione fallita: " . $conn->connect_error);
	} 
?>

<?php
    
			$numericasuali= rand(1,13) ; //controllo se il numero è gia stato preso per non farlo ripetere due volte di fila.
			$controllo=0;
			//controllo per non farlo ripetere piu diu una volta 
			//e infine mettere la possibilkità di mandare avanti le domande
			
			if($numericasuali==$controllo){
				$numericasuali= rand(1,13) ;
			}else{
				$controllo=$numericasuali;
			}

			// comincio gioco con domanda , in base al numero randomico messo prende una domanda e la stampa e fa tutto quello che deve fare   
			$getDomanda= "SELECT domanda FROM lobby where ID='$numericasuali' "; 
			$getrisposta= "SELECT risposta1 FROM lobby where ID='$numericasuali' ";  
			$getrisposta2= "SELECT risposta2 FROM lobby where ID='$numericasuali' ";  
			$getrisposta3= "SELECT risposta3 FROM lobby where ID='$numericasuali'";  
			$getrisposta4= "SELECT risposta4 FROM lobby where ID='$numericasuali'";   
	   
			$prendiDomanda=$conn->query($getDomanda);
			$prendirisposta=$conn->query($getrisposta);
			$prendirisposta2=$conn->query($getrisposta2);
			$prendirisposta3=$conn->query($getrisposta3);
			$prendirisposta4=$conn->query($getrisposta4);
			
			$scriviDomanda = $prendiDomanda -> fetch_assoc();
			$scrivirisposta= $prendirisposta -> fetch_assoc();
			$scrivirisposta2 = $prendirisposta2 -> fetch_assoc();
			$scrivirisposta3 = $prendirisposta3 -> fetch_assoc();
			$scrivirisposta4 = $prendirisposta4 -> fetch_assoc();
	   
			
			//echo"".$prendiDomanda."<br>";
			//$tupla = $prendiDomanda->fetch_assoc();
			
			/*echo"<br>".$scrivirisposta["risposta1"];
			echo"<br>".$scrivirisposta2["risposta2"];
			echo"<br>".$scrivirisposta3["risposta3"];
			echo"<br>".$scrivirisposta4["risposta4"];	*/		
			
			//serve per gestire le risposte

			echo "<br><form action=\"new 1.php\" method=\"POST\">";
			echo"<br> <input type=\"text\" name =\"domanda\"  size=\"80\" value=\"".$scriviDomanda["domanda"]."\">";
				echo "<br> <input type=\"checkbox\" name=\"autori[]\"  value=\"".$scrivirisposta["risposta1"]."\">";
				echo"  &ensp;&ensp;".$scrivirisposta["risposta1"]."";
				echo "<br> <input  type=\"checkbox\" name=\"autori[]\" value=\"".$scrivirisposta2["risposta2"]."\">";
				echo"  &ensp;&ensp;    ".$scrivirisposta2["risposta2"];
				echo "<br> <input type=\"checkbox\" name=\"autori[]\" value=\"".$scrivirisposta3["risposta3"]."\">";
				echo"   &ensp;&ensp;   ".$scrivirisposta3["risposta3"];
				echo "<br> <input   type=\"checkbox\" name=\"autori[]\" value=\"".$scrivirisposta4["risposta4"]."\">";
				echo"   &ensp;&ensp;   ".$scrivirisposta4["risposta4"];
				echo "<br> <input type=\"Submit\" value=\"Invio\"/>";

	

	
	
?>


</table>
</form>
	<p>secondi rimasti : </p><div id="countdown"></div>
	<div id="punizione">
		
	</div>

	<script>
		
		
		var difficoltaDomanda=Math.floor(Math.random() * 3); 
		var punizione=Math.floor(Math.random() * 9); 
		var lunghezzaTimer=0;
		
		
		if(difficoltaDomanda==0){ //random che ogni volta che il livello di difficoltà aumenta, diminuisce il tempo.
			lunghezzaTimer=30;
			
		}
		else if(difficoltaDomanda==1){
			lunghezzaTimer=20;
			
		}
		else if(difficoltaDomanda==2){
			lunghezzaTimer=15;
			
		}

				//timer
				function printData(data){
				document.getElementById("countdown").innerText=data;
			}
			
			var timeInSecs = Date.now()/(1000*60);
			var howLong = lunghezzaTimer;
			var untilTimeInSecs = timeInSecs+howLong;
			var countDownInterval = setInterval(function(){
				var timeLeft = untilTimeInSecs-timeInSecs;    
				printData(timeLeft);
				untilTimeInSecs--;
				if(timeLeft==5){
					alert('5 seconds left');
				}
				if(timeLeft==0){
					alert('Tempo scaduto!!!');
                    
					document.getElementById("countdown").innerHTML = "<p>hai perso ora devi avere una punizione adeguata aspetta il tuo turno per puntare il qr code di nuovo  con la prossima domanda</p<br>";
					if(punizione==0){
						document.getElementById("punizione").innerHTML = "<p>la tua punizione sarà di tornare indietro di 2 caselle</p>";
					}
					if(punizione==1){
						document.getElementById("punizione").innerHTML = "<p>la tua punizione sarà di andare in prigione per un turno</p>";
					}
					if(punizione==2){
						document.getElementById("punizione").innerHTML = "<p>la tua punizione sarà di andare infilarti un dito nel naso per i prossimi due turni</p>";
					}
					if(punizione==3){
						document.getElementById("punizione").innerHTML = "<p>la tua punizione sarà di retrocedere di ben 3 caselle</p>";
					}
					if(punizione==4){
						document.getElementById("punizione").innerHTML = "<p>la tua punizione sarà di saltellare su un piede per 4 volte</p>";
					}
					if(punizione==5){
						document.getElementById("punizione").innerHTML = "<p>la tua punizione sarà di effettuare quattro piegamenti sulle braccia</p>";
					}
					if(punizione==6){
						document.getElementById("punizione").innerHTML = "<p>la tua punizione sarà di andare in prigione per due turni</p>";
					}
					if(punizione==7){
						document.getElementById("punizione").innerHTML = "<p>la tua punizione sarà di fare due giri in torno a te e i tuoi compagni dovranno prenderti in giro</p>";
					}
					
					if(punizione==8){
						document.getElementById("punizione").innerHTML = "<p>la tua punizione sarà di dover effettuare un prova fisica a tua scelta</p>";	
					}
				}
						if(timeLeft<=0){
							clearInterval(countDownInterval);
						}
				
			},1000);
			
			
	</script>
</body>

</html>
