<?php 

include 'connessione.php';
include 'Studente.php';

try {
	$query="delete from studenti WHERE cognome =:cognome";
	
	$risultati = $conn->prepare($query);
	$cognome = 'gino';

	$risultati->bindParam(":cognome", $cognome, PDO::PARAM_STR);

	if($risultati->execute()){
		echo "".$risultati->rowCount(). " record  eliminati";
	}

		 

} catch (PDOException $e) {
	echo $e->getMessage();
}



 ?>