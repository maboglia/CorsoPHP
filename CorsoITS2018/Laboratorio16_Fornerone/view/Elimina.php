<?php 


	$sd = new SerieDao();
	if(isset($_GET['id_serie_tv'])) {
		$sd->eliminaSerie($_GET['id_serie_tv']);
	}

	$risultato = $sd->getAll();
//	var_dump($risultato);
	while ($record = $risultato->fetch_object("Serie")){
		echo($record->nome);
		echo " <a href='?pagina=elimina&id_serie_tv=".$record->id_serie_tv."'>elimina</a>";
		echo "<hr>";
	}

 ?>