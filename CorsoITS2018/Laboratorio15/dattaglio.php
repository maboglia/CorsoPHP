<?php include 'Connessione.php' ?>

<h1>Dettaglio studente</h1>


<?php 
	$id = isset($_REQUEST['id_studente'])?$_REQUEST['id_studente']:0;
	$querySQL = "SELECT * from studenti where id = {$id}";

	$risultato = mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error());

//	var_dump($risultato);
	while ($record = mysqli_fetch_array($risultato)) {
		
		echo "<h1>".$record['cognome']."</h1>";
		echo "<h2>".$record['nome']."</h2>";
		echo "<h3>".$record['anno']."</h3>";
		echo "<img src='".$record['foto']."'>";
		
	}

 ?>

