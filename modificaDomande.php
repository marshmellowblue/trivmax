<html>
<head><title>page</title><link rel="stylesheet" href="home.css"/></head>
<body>
</br>
    <ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="./site1/Home.html">contatti</a></li>
		<li><a href="contact.asp">Progetto Giudice</a></li>
		<li><a href="partita.php">Play a Match</a></li>
	</ul>
	<br>
	<br>

	<br>

<?php
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
	echo "Connessione effettuata";
	
    $domanda=$_GET["domanda"];
    $risposta1=$_GET["risposta1"];
    $risposta2=$_GET["risposta2"];
    $risposta3=$_GET["risposta3"];
    $risposta4=$_GET["risposta4"];
    $difficoltà=$_GET["difficoltà"];

	//conto quante tuple devo cancellare per poter impostare il ciclo di cancellazione
	//si poteva fare in modo più intelligente gli echo mi servono solo come debug
	echo sizeof($_GET['scelta']) . "<br>";
	
	
	if(!empty($_GET['scelta'])) {
	
		//scorro col foreach tutti gli oggetti nell'array $_GET che contiene l'array scelta[]
		foreach($_GET['scelta'] as $spunta) {
			echo "change " . $spunta . " --> ";
			
			//creo la query parametrica
			$todelete = "UPDATE `lobby` SET domanda='$domanda',risposta1 ='$risposta1',risposta2 ='$risposta2',risposta3 ='$risposta3',risposta4 ='$risposta4',difficoltà ='$difficoltà' 
			WHERE domanda='$spunta' ";
			
			//la eseguo
			if (mysqli_query($conn, $todelete)) {
				echo "Tupla cambiata con successo <br>";
			} 
			else {
				echo "Errore riportato dal DB: " . $sql . "<br>" . mysqli_error($conn);
			}
		} 
	}
	
	$conn->close();

?>


</body>
</html>