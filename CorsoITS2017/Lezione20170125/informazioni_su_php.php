<div id="menu">
	<a href="?">Home Page</a> 
	<a href="?pagina=uno">PhpInfo</a> 
	<a href="?pagina=due">Corso Php</a> 
	<a href="?pagina=tre">About me</a> 

	<!-- link assoluto  -->
	<a href="http://www.php.net" target="_blank">Php.net</a> 

</div>


<?php 
error_reporting(0);

	$saluto = "ciao";

	echo "il mio saluto è $saluto";
	echo 'il mio saluto è {$saluto}';

	//echo $_GET['pagina'];

	//$a = $_GET['pagina'];

	if($_GET['pagina']){

		if ($_GET['pagina'] == "uno"){
			phpinfo();		
		}
		else if ($_GET['pagina'] == "due"){
			echo "<h1>benvenuto nel corso php</h1>";
			echo "<ul>";
			echo "<li><a href='variabili.php'>variabili</a></li>";	
			echo "<li><a href=\"array.php\">array</a></li>";	
			echo "</ul>";	
		}
		else{
			echo "mi dispiace non posso mostrarti queste informazioni segretissime";
		}

	}


 ?>