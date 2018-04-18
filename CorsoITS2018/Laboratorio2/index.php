<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<style type="text/css">


</style>
</head>
<body>
<div class="container">
	
<h1>Hello, World!</h1>

<?php 

include 'studenti_db_2.php';

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
	//estraggo l'anno
	$anno = substr($studenti[$i], -4);
	//calcolo l'età
	$eta = date("Y") - $anno;

	//esplodo la string e ne ricavo un array lungo 3: cognome, nome, anno

	$studenteCorrente = 
	explode(", ", $studenti[$i]);
	

	//stampo a video la riga dello studente
	echo "<tr>";

	echo "<td class='cella'>".  $studenteCorrente[1] . "</td>";
	echo "<td class='cella'>".  $studenteCorrente[0] . "</td>";
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



