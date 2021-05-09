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

    $domanda=$_POST['domanda'];  
    $getrisposta_corretta= "SELECT risposta_corretta FROM lobby where domanda='$domanda' "; 
    $risp_corretta=$conn->query($getrisposta_corretta);
    
   
    
	
    

    $autori = isset($_POST['autori']) ? $_POST['autori'] : array(); //isset ti dice se la variabile è stata definita
    if (!count($autori)) echo 'HAI SBAGLIATO BABBO! NON NE HAI SELEZIONATO NEANCHE UNO!!!'; //!count ti dice se non se nell'array ci sono o meno valori
    elseif (count($autori) >= 2) echo 'HAI SBAGLIATOOOOO BABBO NE HAI SELEZIONATI TROPPI';//same
    else{
    	
        
   		 $scrivirisposta = $risp_corretta->fetch_assoc();
        foreach($autori as $autore){
            
            if($autore == $scrivirisposta['risposta_corretta']){
                echo "HAI RISPOSTO CORRETTAMENTE PASSA PURE AL PROSSIMO LIVELLO";
            }
            
             else{
                echo "HAI RISPOSTO IN MODO ERRATO POLLO <br><br>";
                $punizione= rand(0,8) ;
                if($punizione==0){
                     echo"la tua punizione sarà di tornare indietro di 2 caselle";
                }
                if($punizione==1){
                    echo"la tua punizione sarà di andare in prigione per un turno";
                }
                if($punizione==2){
                    echo"la tua punizione sarà di andare infilarti un dito nel naso per i prossimi due turni";
                }
                if($punizione==3){
                    echo "la tua punizione sarà diretrocedere di ben 3 caselle";
                }
                if($punizione==4){
                    echo "la tua punizione sarà di saltellare su un piede per 4 volte";
                }
                if($punizione==5){
                    echo "la tua punizione sarà di effettuare quattro piegamenti sulle braccia";
                }
                if($punizione==6){
                    echo "la tua punizione sarà di andare in prigione per due turni";
                }
                if($punizione==7){
                    echo"la tua punizione sarà di fare due giri in torno a te e i tuoi compagni dovranno prenderti in giro";
                }
                
                if($punizione==8){
                    echo "la tua punizione sarà di dover effettuare un prova fisica a tua scelta";	
                }
            }
          }
    }
   
    echo"<br><br>aspetta il tuo turno per poter puntare la tua fotocamera al qr code con la prossima  domanda<br><br><a href=\"partita.php\">torna alla partita<a>";


	
?>