<form method="POST">
	<input type="text" name="nome">
	<input type="submit" value="Salva">

</form>

<?php 

include_once "model/SerieDao.php";

if(isset($_POST['nome'])) {
	$sd = new SerieDao();
	if($sd->inserisciSerie($_POST['nome'])) {
		echo "Inserimento effetuato!";
	}

}

?>