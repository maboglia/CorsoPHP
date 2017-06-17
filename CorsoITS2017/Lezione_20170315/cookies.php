<?php 

	$nome = "test";
	$valore = "valore del cookie";
	$scadenza = time() + (60 * 60 * 24 * 7);
	setcookie($nome, $valore, $scadenza);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>cookies</title>
</head>
<body>
<h1>test cookie</h1>
	<pre>
		
	<?php //print_r($_COOKIE) ?>
	</pre>

	<?php 

/*		if (isset($_COOKIE['test']))
		echo $test = $_COOKIE['test'];
*/
	$test = isset($_COOKIE['test']) ? $_COOKIE['test'] : "";


	 ?>
	 <h1><?= $test ?></h1>
</body>
</html>