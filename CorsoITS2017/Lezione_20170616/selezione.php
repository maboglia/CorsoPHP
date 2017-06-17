<?php 

include 'connessione.php';
include 'Studente.php';

try {
	
	$query="select * from studenti";
	$risultati = $conn->query($query);

	//1) uso fetch nel while
	// while ($riga = $risultati->fetch()) {
	// 	echo $riga['cognome'];
	// 	echo "<br/>";
	// }
		echo "<br/>";

	//2) uso fetchAll
	//$studenti = $risultati->fetchAll();
/*
	$i=0;
	foreach ($studenti as $studente) {
		echo ++$i;
		echo $studente['cognome'];
		echo "<br/>";
	}
*/
//		$risultati->setFetchMode(PDO::FETCH_OBJ);
		$risultati->setFetchMode(PDO::FETCH_CLASS, "Studente");
		while ($studente = $risultati->fetch()) {
				echo $studente;
				echo "<br>";
			}


} catch (PDOException $e) {
	echo $e->getMessage();
}



 ?>