<html>
<?php
	session_start();
	$_SESSION['nickname'];
	 $_SESSION['nomeLobby'];
	 
	 if(!isset($_SESSION['nickname'])){
		session_start();
		$_SESSION['nickname']=$_POST['nickname'];
		$_SESSION['nomeLobby']=$_POST['nomeLobby'];
	 }
	 

	echo' <ul>
		<li><a href="\\">Home</a></li>
		<li><a href="./site1/Home.html">contatti</a></li>
		<li><a href="./progetto/progetto.html">Progetto Giudice</a></li>
		<li><a href="partita.php">Play a Match</a></li>
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
	//echo "Connessione effettuata";
?>
<head>
    <link rel="stylesheet" href="home.css"/>
	<title>TRIVIAMAX</title>
</head>
<body>

	<h1>Home Progetto</h1>
	<br>
	<h2>Forza che aspetti, clicca Play a match</h2>
	<br>
	
	






<?php
	
	$nomeLobby=$_SESSION['nomeLobby'];
	$nickname=$_SESSION['nickname'];
	echo $nomeLobby."<br>";
	echo $nickname."<br>";
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
		$getGiocatori= "SELECT nickname  FROM server1 where nomeLobby='$nomeLobby' "; //ti dice con chi sei in team
		$prendiGiocatori=$conn->query($getGiocatori);
		echo "in lobby ci sono: <br>";
			while ($tupla = $prendiGiocatori -> fetch_assoc()) {
				echo"".$tupla["nickname"]."<br>";
			}
			
	}		

	 $conn->close();
?>


</table>
</form>
</body>
</html>
