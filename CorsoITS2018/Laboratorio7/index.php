<?php 	error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>

<style>
	.studente{  width: 150px; 
				height: 150px; 
				border: 1px solid #ccc; 
				padding: 5px;
				margin: 5px;
				float: left;
	 }
	 .clear{ clear:left; }


</style>

</head>
<body>
<a href="?pagina=elenco">elenco</a> 
<a href="?pagina=schema">schema</a> 

<?php 	
include 'model/StudentiProvider.php';
include 'model/gradi.php';
$elencoStudenti = new StudentiProvider();

$pagina = isset($_GET[pagina])?$_GET[pagina]:'home';

switch ($pagina) {
	case 'schema':

	for ($i=30; $i >=1 ; $i--) { 

			$studente = ($elencoStudenti->trovaPosizione($i)!=null)?
			$elencoStudenti->trovaPosizione($i) : 
			'';

		if ($i%5==0)
		echo "<div class='clear'></div>";

			$stileCSS = "style='background-color:".$gradi[$studente->grado]."'";
		echo "<div $stileCSS class='studente'>$studente</div>";
	}
		break;
	
	case 'elenco':
		$variable = $elencoStudenti->trovaTutti();
		foreach ($variable as $studente) {
			echo "<h2>{$studente->cognome}</h2>";
		}

		break;
	
	default:
		# code...
		break;
}
?>
</body>
</html>