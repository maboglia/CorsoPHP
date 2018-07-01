<?php 

include_once "model/SerieDao.php";

	$sd = new SerieDao();

	if(isset($_POST['nome'])) {
		$sd->modificaSerie($_GET['id_serie_tv'], $_POST['nome']);
	}

	if(isset($_GET['id_serie_tv'])) {
		if(!isset($_POST['nome'])) {

			?>

		<form method="POST">
			<input type="text" name="nome">
			<input type="submit" value="Modifica">
		</form>

		<?php 
		}
	}

		$risultato = $sd->getAll();
		while ($record = $risultato->fetch_object("Serie")){
		echo($record->nome);
		echo "<a href='?pagina=modifica&id_serie_tv=".$record->id_serie_tv."'> modifica</a>";
		echo "<hr>";
	}

?>