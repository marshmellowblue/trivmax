<style> 
body {
 
  
 
  background: url(partita_image.jpg);
  background-repeat: no-repeat;
  background-size: 100% 100%;
  text-align:center;
  line-height: 3.4;
  font-size: 130%;
  color:white;
 
}
h1{
 	line-height: 1.4;
	font-size: 80%;
    text-align:left;
}
</style>

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
    $question=str_replace("'","''","$domanda");
    //SELECT Name FROM Customers WHERE Name LIKE '\%AAA%' {escape '\'}
    $getrisposta_corretta= "SELECT risposta_corretta FROM lobby where domanda = '$question '  "; 
    $risp_corretta=$conn->query($getrisposta_corretta);
    
    $scrivirisposta= $risp_corretta -> fetch_assoc();
   
    $risposta=str_replace("Array","","$scrivirisposta");
    
    

    

    $autori = isset($_POST['autori']) ? $_POST['autori'] : array(); //isset ti dice se la variabile è stata definita
    if (!count($autori)){
    	echo 'HAI SBAGLIATO BABBO! NON NE HAI SELEZIONATO NEANCHE UNO!!!<br> solo perche\' sei un po\' imbecille ti lascio la nel poslto in cui ti trovi';
    } //!count ti dice se non se nell'array ci sono o meno valori
    
    elseif (count($autori) >= 2) echo 'HAI SBAGLIATOOOOO BABBO NE HAI SELEZIONATI TROPPI<br> ti meriti degli insulti ma solo quelli, niente punizione';//same
    else{
        foreach($autori as $autore) {
            echo $autore . '<br/>';  
            if($autore == $scrivirisposta['risposta_corretta']){
                echo "HAI RISPOSTO CORRETTAMENTE<br> ";
                $corretta= rand(0,2) ;
                if($corretta==0){
                     echo"Vai avanti di 2 caselle";
                }
                if($corretta==1){
                     echo"Vai avanti di 1 casella";
                }
                if($corretta==2){
                     echo"Vai avanti di 3 caselle";
                }
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
   
    echo"<br><br>aspetta il tuo turno per poter puntare la tua fotocamera al qr code con la prossima  domanda<br><br>";

?>