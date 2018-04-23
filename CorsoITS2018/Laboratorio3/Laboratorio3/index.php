<!DOCTYPE html>
<html>
<head>
	<title>Sito web del coraso Php Programming 2018</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<style type="text/css">


</style>
</head>
<body>
<div class="container">
	
<h1>Hello, World!</h1>
<h2><?php echo  date("d/m/Y H:i:s") ?></h2>
<?php 

include 'studenti_db_3.php';

//qui apro la tabella
echo "<table class='table table-striped'>";
	echo "<tr>";

	echo "<th class='cella_intestazione'>nome</th>";
	echo "<th class='cella_intestazione'>cognome</th>";
	echo "<th class='cella_intestazione'>anno</th>";
	echo "<th class='cella_intestazione'>età</th>";


	//qui chiudo la riga dello studente
	echo "</tr>";
//echo "Hello, World!" 
for ($i=0; $i < count($studenti); $i++) { 


	//per ogni studente
	//mi ritorna un array di 3 posizioni:
	// $studenti[$i] rappresenta lo studente corrente dell'array $studenti
	// $studenti[$i][0] ritorna il cognome
	// $studenti[$i][1] ritorna il nome
	// $studenti[$i][2] ritorna l'anno

	//estraggo l'anno (è il terzo valore dell'array)
	$anno = $studenti[$i][2];
	//calcolo l'età
	$eta = date("Y") - $anno;

	//stampo a video la riga dello studente
	echo "<tr>";

	$cognome= $studenti[$i][0];
	$nome= $studenti[$i][1];


	echo "<td class='cella'>".  $cognome . "</td>";
	echo "<td class='cella'>".  $nome . "</td>";
	echo "<td class='cella'>" . $anno . "</td>";
	echo "<td class='cella'>". $eta . "</td>";


	//qui chiudo la riga dello studente
	echo "</tr>";
}
//qui chiudo la tabella
echo "</table>";

?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>



