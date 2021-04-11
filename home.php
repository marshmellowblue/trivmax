<html>
<head>
    <link rel="stylesheet" href="home.css"/>
	<title>TRIVIAMAX</title>
</head>
<body>

	<h1>Home Progetto</h1>
	<br>
	<h2>Forza che aspetti, clicca Play a match</h2>
	<br>
	<ul>
		<li><a href="\\">Home</a></li>
		<li><a href="./site1/Home.html">contatti</a></li>
		<li><a href="contact.asp">Progetto Giudice</a></li>
		<li><a href="partita.php">Play a Match</a></li>
	</ul>
	


<?php
	$cookie_name = $_POST['nickname'];
	$cookie_value =  $_POST['nomeLobby'];
	 
	

	//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	setcookie($cookie_name, $cookie_value, strtotime("+1 year"));


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
	//echo "Connessione effettuata";
?>



<?php
	if(!isset($_COOKIE[$cookie_name])) {
		echo "<br>Cookie named '" . $cookie_name . "' is not set! <br> probably your session is over or you have probably did a mistake <br>";
	} else {
		//echo "Cookie '" . $cookie_name . "' is set!<br>";
		echo ""."i've setted all "."<br><br>";
		//echo "Value is: " . $_COOKIE[$cookie_name]."<br>";
		//echo "so anche che il tuo id è :".$row["ID"]."<br>";
	}
	$nomeLobby=$_POST['nomeLobby'];
	$nickname=$_POST['nickname'];
	
	// creo la query di lettura
	$queryconfronto= "SELECT * FROM server1 where `nomeLobby`='$nomeLobby' AND `nickname`='$nickname' ";
	$query= "SELECT ID FROM server1 where `nomeLobby`='$nomeLobby' AND `nickname`='$nickname' ";

	
	$resultprova=$conn->query($queryconfronto);
	$resultprovas=$conn->query($query);
	//$number2=mysql_num_rows($resultprova);

	$num_righe = mysqli_num_rows($resultprova);
	
	$row = $resultprovas -> fetch_assoc();

	if($num_righe<1  ){
		echo"<br>mi dispiace non trovo nessuno con questo nickname e questa lobby :(<br>";
		
		
	}else{
		echo "benvenuto giocatore ".$nickname."<br>";

			/*$getGiocatori= "SELECT nickname  FROM server1 where nomeLobby='$nomeLobby' "; //ti dice con chi sei in team
			$prendiGiocatori=$conn->query($getGiocatori);
			echo "in lobby ci sono: <br>";
			while ($tupla = $prendiGiocatori -> fetch_assoc()) {
				echo"".$tupla["nickname"]."<br>";
			}

			$numericasuali= rand(1,3) ;
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
			/*
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
			*/
	}		

	 $conn->close();
?>


</table>
</form>
</body>
</html>
