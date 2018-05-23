<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php 

$divina = file("C:\\Users\\m.bogliaccino\\divina_commedia.txt");

$i=0;

$nome_file = "prova.txt";
$file = fopen($nome_file, 'a');


foreach ($divina as $value) {

	$i++;
	if($i%3==0)
fwrite($file, $value);
}

 ?>

</body>
</html>