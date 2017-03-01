<!DOCTYPE html>
<html>
<head>
	<title>Calcolatrice</title>
</head>
<body>

<h1>Calcolatrice</h1>

	<form action="" method="post">
	  	<fieldset>
	    <legend>Calcolatrice:</legend>
		    <label for="valore1">Valore</label>
			<input type="text" name="valore1" placeholder="Inserisci un valore qui" />

			<label for="operazione">Operazioni</label>
			+ <input type="radio" name="operazione" value="addizione" checked="checked" />

			- <input type="radio" name="operazione" value="sottrazione" />

			* <input type="radio" name="operazione" value="moltiplicazione" />

			/ <input type="radio" name="operazione" value="divisione" />

			<label for="valore2">Valore</label>
			<input type="text" name="valore2" placeholder="Inserisci un valore qui" />


		</fieldset>

		<input type="submit" value="calcola">

	</form>


<?php 

	error_reporting(E_ALL);

	$val1 = (isset($_POST['valore1']))?$_POST['valore1']:0;
	$val2 = (isset($_POST['valore2']))?$_POST['valore2']:0;
	$operazione = (isset($_POST['operazione']))?$_POST['operazione']:'';

	include '../inc/config.php';

	$calcolo = calcolaValori($val1, $val2, $operazione);

	if (is_numeric($calcolo)) 
		echo "<h2>il risultato è ".$calcolo."</h2>";

 ?>	



</body>
</html>