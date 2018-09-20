<?php include 'Connessione.php'; ?>
<?php include 'array_studenti.php'; ?>

<h1>Carica Studenti su db</h1>


<?php 
	//scorro l'array di studenti
	mysqli_query($mysqlConnessione, "TRUNCATE `studenti`");
	foreach ($studenti as $studente) {
			
			//per ogni studente preparo una query per inserimento in tabella
			$querySQL = "INSERT into studenti (cognome, nome, data) values ('"
				.$studente['cognome']."', '"
				.$studente['nome']."',   '"
				.$studente['anno']."-00-00'  )";
			//eseguo la query, passando anche l'oggetto connessione
			mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error());
			//se è andato tutto bene, stampo il risultato a video
			echo $studente['cognome']. $studente['nome']. " correttamente inserito"."<br>";
	}
 ?>


