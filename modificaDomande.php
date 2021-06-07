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
   color: white;
}
</style>
<title>page</title><link rel="stylesheet" href="home.css"/></head>
<body>

<ul>
		<li><a href="home.php" >Home</a></li>
		<li><a href="./site1/home.html">contatti</a></li>
		<li><a href="./progetto/progetto.html">Progetto Giudice</a></li>
		<li><a href="partita.php">Play a Match</a></li>
	</ul>
    
	<br>
	<br>
	
	<br>

<?php
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
	echo "Connessione effettuata";
	
    $domanda=$_GET["domanda"];
    $risposta1=$_GET["risposta1"];
    $risposta2=$_GET["risposta2"];
    $risposta3=$_GET["risposta3"];
    $risposta4=$_GET["risposta4"];
    $risposta_corretta=$_GET["risposta_corretta"];

	$replace=str_replace("'","\'","$domanda");
	//conto quante tuple devo cancellare per poter impostare il ciclo di cancellazione
	//si poteva fare in modo più intelligente gli echo mi servono solo come debug
	echo sizeof($_GET['scelta']) . "<br>";
	
	
	if(!empty($_GET['scelta'])) {
	
		//scorro col foreach tutti gli oggetti nell'array $_GET che contiene l'array scelta[]
		foreach($_GET['scelta'] as $spunta) {
			echo "change " . $spunta . " --> ";
			$spuntaa=str_replace("'","\'","$spunta");
			//creo la query parametrica
			$change = "UPDATE `lobby` SET domanda='$replace',risposta1 ='$risposta1',risposta2 ='$risposta2',risposta3 ='$risposta3',risposta4 ='$risposta4',risposta_corretta ='$risposta_corretta' 
			WHERE domanda='$spuntaa' ";
			
			
			//$mettirisposta="INSERT INTO lobby (domanda,risposta1,risposta2,risposta3,risposta4,risposta_corretta) VALUES ('domanda','risposta1','risposta2','risposta3','risposta4','risposta_corretta')"
			//la eseguo
			if (mysqli_query($conn, $change)) {
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