<html>
<head>

<link rel="stylesheet" href="home.css"/><title>HOME</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	
	
 

<?php
	session_start();
	$_SESSION['nome'] = $_POST['nome'];
	$_SESSION['nomeLobby']   = $_POST['nomeLobby'];
	$_SESSION['nickname']=$_POST['nickname'];
	$_SESSION['cognome'] = $_POST['cognome'];


	
		echo '<br />
        <ul>
        				<li><a href="index.html">login</a></li>
						<li><a href="home.php">home</a></li>
						<li><a href="./site1/home.html">contatti</a></li>
						<li><a href="./progetto/progetto.html">Progetto Giudice</a></li>
						
			</ul>';
	
	

	

	

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
	//echo "Connessione effettuata";

	//query per il confronto per evitare di registrare cose gia dette
	


	// recupero i valori di NOME e INDIRIZZO e li assegno alle variabili $name e $address
	$nome = $_SESSION['nome'];
	$cognome = $_SESSION['cognome'];
	$nickname = $_SESSION['nickname'];
	$nomeLobby =$_SESSION['nomeLobby'];

	$query= "SELECT * FROM server1 where `nomeLobby`='$nomeLobby' AND `nickname`='$nickname' ";
	$resultprova=$conn->query($query);
	$confronto = mysqli_num_rows($resultprova);


	//controllo campi vuoti

	//controllo campi con campi strani.. ci si prova!

	if($confronto>=1){
		echo "<br><p>nickname gia scelto per la lobby mi disp cambia nome</p><br>";
	}else{
		echo"<br>SEI PERFETTO<br>";
	

		echo "BENVENUTO GIOCATORE ".$nome ." ".$cognome."<br>";
		//controllo del cookie
		
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
            echo "<h1>sei dentro, vai nella fotocamera e punta il qrcode nel tabellone per fare una partita</h1><br>
				<p>altrimenti vai a fare il sign-in premendo su home</p>";
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		$conn->close();
	}
	
?>
<style>
body {
  background: url(partita_image.jpg);
  background-repeat: no-repeat;
  background-size: 100% 100%;
  text-align:center;
  line-height: 3.4;
   font-size: 130%;
   color: white;
}

h1 {
  font-family: "Times New Roman", Times, serif;
  color: white;
  text-align: center;
}

p {
  font-family: "Times New Roman", Times, serif;
  color: white;
  text-align: center;
}
</style>

<br>
</body>


</html>