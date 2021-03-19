<html>
<head><title>HOME</title></head>
<body>
 </br>

<?php
	$cookie_name = $_POST['nome'];
	$cookie_value =  $_POST['nomeLobby'];
	setcookie($cookie_name, $cookie_value, strtotime("+1 year"));

	//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

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

	//query per il confronto per evitare di registrare cose gia dette
	


	// recupero i valori di NOME e INDIRIZZO e li assegno alle variabili $name e $address
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$nickname = $_POST['nickname'];
	$nomeLobby = $_POST['nomeLobby'];

	$query= "SELECT * FROM server1 where `nomeLobby`='$nomeLobby' AND `nickname`='$nickname' ";
	$resultprova=$conn->query($query);
	$confronto = mysqli_num_rows($resultprova);


	//controllo campi vuoti

	//controllo campi con campi strani.. ci si prova!

	if($confronto>=1){
		echo "<br>nickname gia scelto per la lobby mi disp cambia nome<br>";
	}else{
		echo"<br>SEI PERFETTO<br>";
		

		echo "BENVENUTO GIOCATORE ".$nome ." ".$cognome."<br>";
		//controllo del cookie
		if(!isset($_COOKIE[$cookie_name])) {
			echo "<br>Cookie named '" . $cookie_name . "' is not set! <br> probably your session is over or you have probably did a mistake <br>";
		  } else {
			//echo "Cookie '" . $cookie_name . "' is set!<br>";
			echo "i've setted all "."<br><br><br>";
			//echo "Value is: " . $_COOKIE[$cookie_name]."<br>";
			//echo "so anche che il tuo id è :".$row["ID"]."<br>";
		  }

		//inserting data order
		$toinsert = "INSERT INTO server1
			(nome, cognome, nickname, nomeLobby)
			VALUES
			('$nome',
			'$cognome',
			'$nickname',
			'$nomeLobby')";

	
		// eseguo la query sull'oggetto $conn come se fosse un socket
		// il comando mysqli_query restiruisce un valore boolean, percio'
		//lo uso direttamente in un if per gestire un eventuale errore
		if (mysqli_query($conn, $toinsert)) {
			//echo "New record created successfully";
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		$conn->close();
	}
	
?>


</body>

<a href="index.html">Home</a>
</html>