<?php include 'Connessione.php' ?>

<h1>Dettaglio studente</h1>


<?php 
	$id = isset($_REQUEST['id_studente'])?$_REQUEST['id_studente']:0;
	$querySQL = "SELECT * from studenti where id = {$id}";

	$risultato = mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error());

//	var_dump($risultato);
	while ($record = mysqli_fetch_array($risultato)) {
		echo "<form method='post' action='update.php'>";
		echo "<input type='text' name='cognome' value='".$record['cognome']."'><br>";
		echo "<input type='text' name='nome' value='".$record['nome']."'><br>";
		echo "<input type='text' name='data' value='".$record['data']."'><br>";
		echo "<input type='text' name='foto' value='".$record['foto']."'><br>";
		echo "<input type='hidden' name='studente_id' value='".$record['id']."'><br>";
		echo "<input type='submit' value='modifica'>";
		echo "</form>";
		
	}

 ?>

