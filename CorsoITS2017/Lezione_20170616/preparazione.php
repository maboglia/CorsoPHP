<?php 

include 'connessione.php';
include 'Studente.php';

try {
	$query="select * from studenti where id = :id";
	
	$risultati = $conn->prepare($query);
	$id = $_GET['id'];

	$risultati->bindParam(":id", $id, PDO::PARAM_INT);

	$risultati->execute();

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