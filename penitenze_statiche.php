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
    text-align:center;
}
</style>

<?php 
             echo"<h1>BECCATI QUESTA PUNIZIONE: <br></h1>";
                $punizione= rand(0,8) ;
                if($punizione==0){
                     echo"la tua punizione sarà di tornare indietro di 2 caselle";
                }
                if($punizione==1){
                    echo"la tua punizione sarà di andare in prigione per un turno e dopo quel turno tornare indietro di una casella";
                }
                if($punizione==2){
                    echo"la tua punizione sarà di andare infilarti un dito nel naso per i prossimi due turni e retrocedi di due caselle";
                }
                if($punizione==3){
                    echo "la tua punizione sarà diretrocedere di ben 3 caselle";
                }
                if($punizione==4){
                    echo "la tua punizione sarà di saltellare su un piede per 4 volte e vai dritto alla casella numero 2";
                }
                if($punizione==5){
                    echo "la tua punizione sarà di effettuare quattro piegamenti sulle braccia, mi dispiace torna al via!";
                }
                if($punizione==6){
                    echo "la tua punizione sarà di andare in prigione per due turni e poi vai in dietro di una casella brutto pirla!";
                }
                if($punizione==7){
                    echo"la tua punizione sarà di fare due giri in torno a te e i tuoi compagni dovranno prenderti in giro e sai che c'e'? vai in dietro di 3 caselle";
                }
                
                if($punizione==8){
                    echo "la tua punizione sarà di dover effettuare un prova fisica a tua scelta e poi boh torna al via!";	
                }
                echo"<br> <br> aspetta il tuo turno e poi punta di nuovo la telecamera sul qrcode se non vuoi un altra punizione! "
            
          
    
   
    

?>