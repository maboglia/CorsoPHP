<?php 	

include 'model/Studente.php';
include 'model/studenti_db_4.php';
//creo l'array da riempire i oggetti di tipo studente,
//scorrendo l'aaray di studenti db_4

/**
* 
*/
class StudentiProvider
{
    public $studentiAdOggetti=[];


	function __construct()
	{
			global $studenti;
		//scorro l'array $studenti del file db_4
		foreach ($studenti as $studente) {
				$this->studentiAdOggetti[] = 
				new Studente($studente['nome'], $studente['cognome'], $studente['anno'], $studente['posizione'], $studente['grado'] );
		}
	}

	public function trovaTutti()
	{
		return $this->studentiAdOggetti;
	}
	public function trovaPosizione($posizione)
	{
		foreach ($this->studentiAdOggetti as $studente) {
			if ($studente->posizione == $posizione)
				return $studente;
		}
		return '';
	}
}



/*
//$studente1->nome = 'nome';
//$studente1->cognome = 'cognome';
//echo count($studentiAdOggetti);
	//ad ogni posizione trovo un array di 3 posizioni, lo scorro con un foreach innestato
	foreach ($studentiAdOggetti as $oggettoStudente) {
			//echo '<pre>';
			//var_dump($oggettoStudente);
			//echo '</pre>';
			$rand = rand(1,6);
//			echo "<h$rand>";
//			echo $oggettoStudente->stampaScheda();
//			echo "</h$rand>";
	}

*/


 ?>