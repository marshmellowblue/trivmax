<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<?php

	session_start();
	//$_SESSION['nickname'];
	//$_SESSION['nomeLobby'];
	 
	if(!isset($_SESSION['nickname'])){
	//	session_start();
		if(isset($_POST['nickname'])) {
			$_SESSION['nickname'] = $_POST['nickname'];
			$_SESSION['nomeLobby'] = $_POST['nomeLobby'];
			echo "<script>console.log({$_POST['nickname']})</script>";
		}
		else {
			echo "<script>window.location = 'http://websitemassimo.altervista.org'</script>";
		}
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
	//echo "Connessione effettuata";
?>
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

h1 {
  font-family: "Times New Roman", Times, serif;
  color: white;
  text-align: center;
}

h2 {
  font-family: "Times New Roman", Times, serif;
  color: white;
  text-align: center;
}
.container {
 
  position: left;
   color: black;
}
h3{
   font-family: "Lucida Console", "Courier New", monospace;
   line-height: 2.4;
   font-size: 100%;
   color: white;
   text-align: left;
}
h4{
  font-family: "Times New Roman", Times, serif;
  color: white;
  text-align: center; 
}

</style>
    <link rel="stylesheet" href="home.css"/>
	<title>TRIVIAMAX</title>
</head>
<body>


	






<?php
	
	$nomeLobby=$_SESSION['nomeLobby'];
	$nickname=$_SESSION['nickname'];
	//echo $nomeLobby."<br>";
	//echo $nickname."<br>";
	// creo la query di lettura
	$queryconfronto= "SELECT * FROM server1 where `nomeLobby`='$nomeLobby' AND `nickname`='$nickname' ";
	$query= "SELECT ID FROM server1 where `nomeLobby`='$nomeLobby' AND `nickname`='$nickname' ";

	
	$resultprova=$conn->query($queryconfronto);
	$resultprovas=$conn->query($query);
	//$number2=mysql_num_rows($resultprova);

	$num_righe = mysqli_num_rows($resultprova);
	
	$row = $resultprovas -> fetch_assoc();

	if($num_righe<1  ){
		echo"<br><h4>mi dispiace non trovo nessuno con questo nickname e questa lobby :(</h4><br>";
		
		
	}else{
		
		if($_SESSION['nickname']=="admin"){
			if($_SESSION['nomeLobby']=="admin"){
				echo ' <ul>
				<li><a href="\\">home</a></li>
				<li><a href="./site1/home.html">contatti</a></li>
				<li><a href="./progetto/progetto.html">Progetto Giudice</a></li>
				<li><a href="sceltamodifica.php">modifica una domanda</a></li>
			   </ul>';
			}
		}else {
			echo '<br /><ul>
						<li><a href="\\">home</a></li>
						<li><a href="./site1/home.html">contatti</a></li>
						<li><a href="./progetto/progetto.html">Progetto Giudice</a></li>
						
			</ul>';
		}
		
		echo "<h3>giocatore: ".$_SESSION['nickname']."<br>";
		//echo "benvenuto giocatore ".$nickname."<br>";
		$getGiocatori= "SELECT nickname  FROM server1 where nomeLobby='$nomeLobby' "; //ti dice con chi sei in team
		$prendiGiocatori=$conn->query($getGiocatori);
		echo "<h3>sei in lobby con: ";
			while ($tupla = $prendiGiocatori -> fetch_assoc()) {
				echo" ".$tupla["nickname"]."<br>";
				
			}
            echo "</h3>";
            echo"<h2>ora che sei dentro, con la telecamera punta il tabellone, piu' precisamente il codice qr per iniziare a giocare</h2>";
			
	}	
    	
       

	 $conn->close();
?>
	<h1>Home Progetto</h1>
	<br>
    
	
	<br>
	

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
</table>
</form>
</body>
</html>
