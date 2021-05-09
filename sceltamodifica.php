<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css"/>
	<title>Lettura dal DB</title>
</head>
<body>
    
    <ul>
		<li><a href="home.php" >Home</a></li>
		<li><a href="./site1/home.html">contatti</a></li>
		<li><a href="./progetto/progetto.html">Progetto Giudice</a></li>
		<li><a href="partita.php">Play a Match</a></li>
	</ul>
<?php
	session_start();
	/*$_SESSION['nickname'];
 	$_SESSION['nomeLobby'];
	*/
	
	if(!isset($_SESSION['nickname'])){
		echo "<script>window.location = 'http://websitemassimo.altervista.org'</script>";
			
	}

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
?>

<form action="modificaDomande.php" method="get">
<table border=1 class="table table-dark table-striped">
<tr><th>Domanda</th><th>risposta1</th><th>risposta2</th><th>risposta3</th><th>risposta4</th><th>risposta corretta</th><th>Seleziona</th></tr>

<?php
	if($_SESSION['nickname']=="admin"){
		if($_SESSION['nomeLobby']=="admin"){
			echo "ok<br>";

			$query = "SELECT * FROM lobby";

				// eseguo la query sull'oggetto $conn come se fosse un socket
				// e salvo il risultato nella variabile $result
				$result = $conn->query($query);
			
					if ($result->num_rows > 0) {
				while ($tupla = $result->fetch_assoc()) {
					print ('<tr>');
					print ('<td>' . $tupla['domanda'] . '</td>');
					print ('<td>' . $tupla['risposta1'] . '</td>');
					print ('<td>' . $tupla['risposta2'] . '</td>');
					print ('<td>' . $tupla['risposta3'] . '</td>');
					print ('<td>' . $tupla['risposta4'] . '</td>');
					print ('<td>' . $tupla['risposta_corretta'] . '</td>');
					//ATTENZIONE: il nome delle checkbox è un ARRAY poichè non so quante checkbox avrò e se uso un nome unico
					//non riesco a risalire a quante e quali sono state spuntate
						print ('<td> <input class=\"bi bi-pencil\" type="checkbox" name="scelta[]" value="' . $tupla['domanda'] . '" > </td>');
					print ('</tr>');
					}
				}
				else {
					echo "0 results";
				}
		}
	} else{
		echo "no";
	}
		// creo la query di lettura
	
	
	$conn->close();
?>

 <form action="new1.php" method="post">
    
 	<div class="input-group mb-3">
		<span class="input-group-text" id="inputGroup-sizing-default">Domanda</span>
		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="domanda">
	</div>
    <br>
    <div class="input-group mb-3">
		<span class="input-group-text" id="inputGroup-sizing-default">Risposta 1</span>
		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="risposta1">
	</div>
    <br>
	<div class="input-group mb-3">
		<span class="input-group-text" id="inputGroup-sizing-default">Risposta 2</span>
		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="risposta2">
	</div>
    <br>
	<div class="input-group mb-3">
		<span class="input-group-text" id="inputGroup-sizing-default">Risposta 3</span>
		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="risposta3">
	</div>
    <br>
	<div class="input-group mb-3">
		<span class="input-group-text" id="inputGroup-sizing-default">Risposta 4</span>
		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="risposta4">
	</div>
    <br>
    <div class="input-group mb-3">
		<span class="input-group-text" id="inputGroup-sizing-default">Risposta corretta</span>
		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="risposta_corretta">
	</div>
   
	<br>


	
	<br>
	
	
</form>
<div class="input-group mb-3">
  
  <input type="submit" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" value="Dopo aver selzionato la riga da modificare clicca qui per la Modifica">
</div>

</table>
</form>
</body>
</html>