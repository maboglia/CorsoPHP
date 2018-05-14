<?php 

	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	$nani = ['pisolo', 'gongolo', 'mammolo'];
	echo count($nani);
	//sort($nani);
	foreach ($nani as $nano) {
		echo $nano;
	}
	$docenti = [
		"PHP" => [
			'nome'=>'mauro',
			'cognome'=>'BOGLIACCINO',
		],
		"JAVA" =>[
			'nome'=>'rocco',
			'cognome'=>'CATALANO',
		],

	];
	asort($docenti);
	$cognome = "bogliaccino";

	print $docenti['JAVA']['nome'];


	echo "<pre>";
	var_dump($docenti);
	echo "</pre>";

	foreach ($docenti as $key => $value) {
		echo "<h1>materia: {$key}</h1>";
		foreach ($value as $chiave => $valore) {
			echo "<h2>".$chiave.": ".$valore."</h2>";
		}
	}


 ?>