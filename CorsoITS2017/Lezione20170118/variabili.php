<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php 
	$saluto = "ciao";
	$nome = "mauro";

 ?>

<?php 
	//questo è un commento su una linea $nome = 15; 
?>

<h1>
	<?php 
		echo ucfirst(
			$saluto
			.' caro '
			.strtoupper($nome)
		); 
	?>
</h1>

<?php 

	$frase1 = "   sempre caro mi fu       ";

	$frase2 = "    ei fu siccome immobile dato il mortal sospiro   ";
	$frase3 =  trim($frase1);
	echo "la frase 1 conta "  .  strlen($frase1) . " caratteri";
	echo "<br/>";
	
	echo "la frase 3 conta "  .  strlen($frase3) . " caratteri";
	echo "<br/>";
	$differenza_caratteri = strlen($frase1) - strlen($frase3);
	echo "la differenza è di "  .  $differenza_caratteri . " caratteri";
	//echo strlen($frase3);
	$email  = 'name[at]example[dot]com';
	$domain = strstr($email, '@');
	echo $domain; /* prints @example.com */

	$frase4  = $frase1.$frase2;

	echo "<br/>";
	echo "la frase 4 conta "  .  strlen($frase4) . " caratteri";

	echo "<br/>";echo "<br/>";
	echo str_replace("o", "1", $frase4);

	$frase5 = "44 gatti in fila per 6 col resto di 2";
	echo "la frase 5 conta "  .  strlen($frase5) . " caratteri";	
	echo $frase5=str_replace("44", "quarantaquattro", $frase5);
	echo "la frase 5 conta "  .  strlen($frase5) . " caratteri";
	echo substr($frase5, 20,50);
	echo strpos($frase5,"6");



 ?>


</body>
</html>