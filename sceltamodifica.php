<html>
<head>
    <link rel="stylesheet" href="home.css"/>
	<title>Lettura dal DB</title>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <ul>
		<li><a href="home.php" onclick="self.status=document.referrer;return true">Home</a></li>
		<li><a href="./site1/Home.html">contatti</a></li>
		<li><a href="./progetto/progetto.html">Progetto Giudice</a></li>
		<li><a href="partita.php">Play a Match</a></li>
	</ul>
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
?>

<form action="modificaDomande.php" method="get">
<table border=1>
<tr><th>Domanda</th><th>risposta1</th><th>risposta2</th><th>risposta3</th><th>risposta4</th><th>difficoltà</th><th>Seleziona</th></tr>

<?php
	// creo la query di lettura
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
            print ('<td>' . $tupla['difficoltà'] . '</td>');
			//ATTENZIONE: il nome delle checkbox è un ARRAY poichè non so quante checkbox avrò e se uso un nome unico
			//non riesco a risalire a quante e quali sono state spuntate
    			print ('<td> <input type="checkbox" name="scelta[]" value="' . $tupla['domanda'] . '" > </td>');
			print ('</tr>');
		}
	}
	else {
		echo "0 results";
	}
	
	$conn->close();
?>

    
    <input type="text" name="domanda">domanda
    <br>
    <input type="text" name="risposta1">risposta1
    <br>
    <input type="text" name="risposta2">risposta2
    <br>
    <input type="text" name="risposta3">risposta3
    <br>
    <input type="text" name="risposta4">risposta4
    <br>
    <input type="number" name="difficoltà">difficoltà
    <br>
    
  

<br>
<br>

<form action="new1.php" method="post">
	<input type="text" name="rispostagiusta">risposta che vuoi che sia quella giusta
	<br>

	
</form>
<input type="submit" value="modifica">

</table>
</form>
</body>
</html>