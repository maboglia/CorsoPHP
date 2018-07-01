<?php include 'model/Serie.php'; ?>
<?php include_once 'model/SerieDao.php'; ?>


<h1>Studenti db</h1>
<a href="?pagina=home">Home</a> | 
<a href="?pagina=crea">Inserisci</a> | 
<a href="?pagina=modifica">Modifica</a> | 
<a href="?pagina=elimina">Elimina</a>
<hr>

<?php 

	$pagina = isset($_GET['pagina'])?$_GET['pagina']:"Home";
	switch ($pagina) {
		case 'crea':
			include "view/Inserisci.php";
		break;

		case 'elimina':
			include "view/Elimina.php";
		break;

		case 'modifica':
			include "view/Modifica.php";
		break;
		
		default:
			
			$sd = new SerieDao();
			$risultato = $sd->getAll();
			echo "<b>Serie tv sul database:</b> <br><br>";

			while ($record = $risultato->fetch_object("Serie")){
			echo($record->nome);
			echo "<hr>";
			}
		
		break;
	}

 ?>