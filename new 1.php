<?php

    $autori = isset($_POST['autori']) ? $_POST['autori'] : array(); //isset ti dice se la variabile è stata definita
    if (!count($autori)) echo 'HAI SBAGLIATO BABBO! NON NE HAI SELEZIONATO NEANCHE UNO!!!'; //!count ti dice se non se nell'array ci sono o meno valori
    elseif (count($autori) >= 2) echo 'HAI SBAGLIATOOOOO BABBO NE HAI SELEZIONATI TROPPI';//same
    else{
        foreach($autori as $autore) {
            echo $autore . '<br/>';  
            if($autore =='George Orwell'){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }
            else if($autore =='1945'){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }
            else if($autore =='mattarella'){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";

            }else if($autore ==  'un modo per occultare dati'){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }else if($autore ==  '3' ){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            
            }else if($autore ==  '206' ){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }else if($autore ==  '365' ){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }else if($autore == '4' ){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }else if($autore == 'Una Repubblica parlamentare' ){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }
            else if($autore == 'Se avessi giocato meglio, tu ed io avremmo vinto' ){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }
            else if($autore == 'poliuretano' ){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }
            else if($autore == 'seta' ){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }
            else if($autore == 'Un sistema elettorale che attribuisce diritto di voto a tutt' ){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }
             else{
                echo "HAI PERSO POLLO <br><br>";
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
   
    echo"<br><br>aspetta il tuo turno per poter caricare la prossima domanda<br><br><a href=\"partita.php\">torna alla partita<a>";


	
?>