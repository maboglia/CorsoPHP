<?php 
error_reporting(0);

include "Connessione.php";

echo "<h3>Elenco Squadre:</h3>";
$query = "SELECT `nome` as 'nome squadra' from squadre";
	$result = mysql_query($query);
	// controllo l'esito
	if (!$result) {
		die("Errore nella query $query: " . mysql_error());
	}

	while ($row = mysql_fetch_assoc($result)) {
	echo "<li>";
	echo $row['nome squadra'];
	echo "<br>";
	echo "</li>";
	}

 ?>