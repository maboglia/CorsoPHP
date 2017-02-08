<!DOCTYPE html>
<html>
<head>
	<title>array associativi</title>
</head>
<body>

<?php 

	$studenti = 
	array(

		array(
			"nome"=>"mauro", 
			"cognome"=>"bogliaccino"
			),
		array(
			"nome"=>"paolo", 
			"cognome"=>"bogliaccino"
			)

	);

	echo $studenti[0]["nome"];
	echo $studenti[0]["cognome"];
	echo "<br/>";
	echo $studenti[1]["nome"];
	echo $studenti[1]["cognome"];

	$numeri=array(10,20,15);
	echo count($numeri);
	echo min($numeri);
	echo max($numeri);
	

 ?>



</body>
</html>