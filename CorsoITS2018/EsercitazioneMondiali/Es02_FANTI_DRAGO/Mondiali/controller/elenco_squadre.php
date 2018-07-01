<?php 
include 'connectionDB.php';

$querySQL = "SELECT squadre.nome as 'nome', squadre.id_squadra as 'id' FROM `squadre`";

$risultato = mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:".mysqli_error());
$elenco = array();
$elencoID = array();
while ($record=mysqli_fetch_array($risultato)) {
	$elenco[]= $record['nome'];
	$elencoID[]= $record['id'];
}

 // var_dump($elenco);
 ?>

