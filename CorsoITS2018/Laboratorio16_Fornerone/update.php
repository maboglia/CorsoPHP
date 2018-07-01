<?php include 'Connessione.php' ?>

<h1>Studenti db</h1>


<?php 

	if (isset($_POST['cognome'])){

		$id= $_POST['studente_id'];
		$nome= $_POST['nome'];
		$cognome= $_POST['cognome'];
		$data= $_POST['data'];
		$foto= $_POST['foto'];
		$querySQL = "UPDATE studenti set nome='$nome', cognome='$cognome', data = '$data', foto='$foto' WHERE id = $id";
		$risultato = mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error());

		echo $risultato . " record modificati";

	}





 ?>


