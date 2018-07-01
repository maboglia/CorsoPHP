<?php 
include_once "conn.php";

public function verifica(){
	

	$querySQL = "SELECT * from studenti where nome = $user, password = $passw";

	$risultato = $this->connessione->query($querySQL) or die("errore nella query:" . $conn->error);
			if($risultato!=NULL) {
				return $risultato;
			}
?>