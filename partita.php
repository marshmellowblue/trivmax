<html>
<head>
	
	
</head>
<body>

	

<?php
   /* $cookie_name = $_POST['nickname'];
	$cookie_value =  $_POST['nomeLobby'];

	//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	setcookie($cookie_name, $cookie_value, strtotime("+1 year"));

    if(!isset($_COOKIE[$cookie_name])) {
		echo "<br>Cookie named '" . $cookie_name . "' is not set! <br> probably your session is over or you have probably did a mistake <br>";
	} else {
		//echo "Cookie '" . $cookie_name . "' is set!<br>";
		echo ""."i've setted all "."<br><br>";
		//echo "Value is: " . $_COOKIE[$cookie_name]."<br>";
		//echo "so anche che il tuo id è :".$row["ID"]."<br>";
	}
		*/

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
    
			$numericasuali= rand(1,8) ; //controllo se il numero è gia stato preso per non farlo ripetere due volte di fila.
			$controllo=0;
			//controllo per non farlo ripetere piu diu una volta 
			//e infine mettere la possibilkità di mandare avanti le domande
			
			if($numericasuali==$controllo){
				$numericasuali= rand(1,8) ;
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

	<script>
		
		/*
		var difficoltaDomanda=Math.floor(Math.random() * 2) + 0;
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
					document.getElementById("countdown").innerHTML = "hai perso ora devi avere una punizione adeguata";
				}
				if(timeLeft<=0){
					clearInterval(countDownInterval);
				}
				
			},1000);
			*/

	</script>
</body>

</html>
