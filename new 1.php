<?php

    $rispostagiusta=$_POST["rispostagiusta"];
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

            }else if($autore == '4' or '365' or '206' or '3' or 'un modo per occultare dati'){
                echo "HAI VINTO PASSA PURE AL PROSSIMO LIVELLO";
            }else{
                echo "HAI PERSO POLLO";
            }
          }
    }
   
    echo"<br><br><a href=\"partita.php\">torna alla partita<a>";


	
?>