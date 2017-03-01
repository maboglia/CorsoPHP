<!DOCTYPE html>
<html>
<head>
	<title>floating point numbers</title>
</head>
<body>

<?php 

	echo $float = 3.14;
//	dichiaro una costante
	define('PIGRECO', 3.14);
	
	echo "<br>";
	echo $float + 7;
	echo "<br>";

	echo 5/3;
	echo "<br>";

	//echo 5/0;

	echo round($float);
	echo "<br>";
	echo ceil($float);
	echo "<br>";
	echo floor($float);

	$intero = 12;

	echo "è intero il numero " . is_int($intero);
	echo "<br>";
	echo "è float il numero " . is_float($intero);
	echo "<br>";
	echo "è float il numero " . gettype($float);
	echo "<br>";
	echo "Faccio il casting " ; 
		$float= (string) $float;
	echo "$float<br>";
	echo "è float il numero " . gettype($float);
	$raggio=5;
	echo "<br>";
	echo "<br>";
	echo "Larea del ceerchio di raggio 5 è uguale a : " .PIGRECO * $raggio * $raggio;

	$string = "prova";
	echo $string[0];
	if($string) echo "vuoto";

 ?>



</body>
</html>