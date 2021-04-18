<html>
<head>
<link rel="stylesheet" href="home.css"/>
	
</head>
<body>

	

<?php
  session_start();
  echo	$_SESSION['nickname'] ;
  echo '<br>'.$_SESSION['nomeLobby']  ; 
 

  echo' <ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="./site1/Home.html">contatti</a></li>
		<li><a href="./progetto/progetto.html">Progetto Giudice</a></li>
		
	   </ul>';

    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "trvimax";

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
			echo"<br>".$scriviDomanda["domanda"];
			/*echo"<br>".$scrivirisposta["risposta1"];
			echo"<br>".$scrivirisposta2["risposta2"];
			echo"<br>".$scrivirisposta3["risposta3"];
			echo"<br>".$scrivirisposta4["risposta4"];	*/		
			
			//serve per gestire le risposte

			echo "<br><form action=\"new 1.php\" method=\"POST\">";
				echo "<br> <input type=\"checkbox\" name=\"autori[]\" value=\"".$scrivirisposta["risposta1"]."\">";
				echo"".$scrivirisposta["risposta1"];
				echo "<br> <input type=\"checkbox\" name=\"autori[]\" value=\"".$scrivirisposta2["risposta2"]."\">";
				echo"".$scrivirisposta2["risposta2"];
				echo "<br> <input type=\"checkbox\" name=\"autori[]\" value=\"".$scrivirisposta3["risposta3"]."\">";
				echo"".$scrivirisposta3["risposta3"];
				echo "<br> <input type=\"checkbox\" name=\"autori[]\" value=\"".$scrivirisposta4["risposta4"]."\">";
				echo"".$scrivirisposta4["risposta4"];
				echo "<br> <input type=\"Submit\" value=\"Invio\"/>";

	

	
	
?>


</table>
</form>
	<p>secondi rimasri : </p><div id="countdown"></div>
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
					document.getElementById("countdown").innerHTML = "hai perso ora devi avere una punizione adeguata <br> <input type=\"button\" value=\"NEXT QUESTION\" onclick=\"window.location.reload()\"><br>aspetta il tuo turno per ricaricare la pagina con la prossima domanda</input><br><br>";
					if(punizione==0){
						document.getElementById("punizione").innerHTML = "la tua punizione sarà di tornare indietro di 2 caselle";
					}
					if(punizione==1){
						document.getElementById("punizione").innerHTML = "la tua punizione sarà di andare in prigione per un turno";
					}
					if(punizione==2){
						document.getElementById("punizione").innerHTML = "la tua punizione sarà di andare infilarti un dito nel naso per i prossimi due turni";
					}
					if(punizione==3){
						document.getElementById("punizione").innerHTML = "la tua punizione sarà diretrocedere di ben 3 caselle";
					}
					if(punizione==4){
						document.getElementById("punizione").innerHTML = "la tua punizione sarà di saltellare su un piede per 4 volte";
					}
					if(punizione==5){
						document.getElementById("punizione").innerHTML = "la tua punizione sarà di effettuare quattro piegamenti sulle braccia";
					}
					if(punizione==6){
						document.getElementById("punizione").innerHTML = "la tua punizione sarà di andare in prigione per due turni";
					}
					if(punizione==7){
						document.getElementById("punizione").innerHTML = "la tua punizione sarà di fare due giri in torno a te e i tuoi compagni dovranno prenderti in giro";
					}
					
					if(punizione==8){
						document.getElementById("punizione").innerHTML = "la tua punizione sarà di dover effettuare un prova fisica a tua scelta";	
					}
				}
						if(timeLeft<=0){
							clearInterval(countDownInterval);
						}
				
			},1000);
			
			
	</script>
</body>

</html>
