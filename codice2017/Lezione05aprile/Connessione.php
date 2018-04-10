<?php 


//apro la connessione al database
$mysqliConnection = new mysqli("localhost", "root", "", "ITS2017");
    
	//è andato tutto a buon fine? altrimenti mostra l'errore
    if (mysqli_connect_errno()) {
        printf("Oops, abbiamo problemi con la connessione al db: %s\n", mysqli_connect_error());
        exit();
    }


//chiudo la connessione col database
//$mysqliConnection->close();

?>
