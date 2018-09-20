<?php 

include 'connessione.php';
include 'Studente.php';

try {
	$query="insert into studenti  (nome, cognome) VALUES (:nome,:cognome)";
	
	$risultati = $conn->prepare($query);
	$nome = $_GET['nome'];
	$cognome = $_GET['cognome'];

	$risultati->bindParam(":nome", $nome, PDO::PARAM_STR);
	$risultati->bindParam(":cognome", $cognome, PDO::PARAM_STR);

	if($risultati->execute()){
		echo "record: ".$conn->lastInsertId(). " inserito";
	}

		 

} catch (PDOException $e) {
	echo $e->getMessage();
}



 ?>