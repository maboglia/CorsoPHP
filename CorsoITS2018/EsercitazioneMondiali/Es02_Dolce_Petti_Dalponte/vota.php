<?php  
	include 'Connessione2.php'
?>

<?php

	$queryAumentaPtgSQL = "UPDATE squadre SET vota = vota + 1
	where nome in ("
	."'".$_GET['prima']."'"
	." ,'" .$_GET['seconda']."'"
	." ,'" .$_GET['terza']."'"
	." ,'" .$_GET['quarta']."')";

	$risultato = $conn->query($queryAumentaPtgSQL) or die("errore nella query:" . $conn->error);
		
	/*
	//	var_dump($risultato);
		while ($record = $risultato->fetch_assoc()){
			echo($record['cognome']);
			echo " <a href='dettaglio.php?id_studente=".$record['id']."'>dettaglio</a>";
			echo "<hr>";
		}
	*/

	$sql = "SELECT * from squadre where nome in( "
	."'".$_GET['prima']."'"
	." ,'" .$_GET['seconda']."'"
	." ,'" .$_GET['terza']."'"
	." ,'" .$_GET['quarta']."')";

	$risultato2 = $conn->query($sql) or die("errore nella query:" . $conn->error);

	if ($risultato2->num_rows > 0) {
	    // output data of each row
	    while($row = $risultato2->fetch_assoc()) {
	        echo "Squadra: " . $row["nome"]. " - vota: " . $row["vota"]. "<br>";
	    }
	} else {
	    echo "0 results";
	}	

?>