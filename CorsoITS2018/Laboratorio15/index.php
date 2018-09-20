<?php include 'Connessione.php' ?>

<h1>Studenti db</h1>


<?php 
	$querySQL = "SELECT * from studenti";

	$risultato = mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error());

//	var_dump($risultato);
	while ($record = mysqli_fetch_array($risultato)) {
		echo($record['cognome']);
		echo " <a href='dettaglio.php?id_studente=".$record['id']."'>dettaglio</a>";
		echo "<hr>";
	}

 ?>

