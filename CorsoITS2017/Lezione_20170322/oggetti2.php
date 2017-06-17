<?php 
// phpinfo();
class Automobile{

	//stato interno, proprietà della classe

	private $marca = "BMW";
	private $modello = "X5";
	private $cilindrata = "3000";
	private $colore = "Rossa";
	//define("NUM_RUOTE", 4);
	const NUM_RUOTE= 4;


	public function __construct($marca,$modello,$cilindrata,$colore)
	{
		//echo "ho costruito un oggetto ";
	 $this->marca = $marca ;
	 $this->modello = $modello ;
	 $this->cilindrata = $cilindrata ;
	 $this->colore = $colore ;		

	}

	public function stampaOggetto()
	{
		return "marca ".$this->marca."<br/>".
		"modello ".$this->modello."<br/>".
		"cilindrata ".$this->cilindrata."<br/>".
		"colore ".$this->colore."<br/>".
		"numRuote ".Automobile::NUM_RUOTE."<br/>";	
	}

	public function setMarca($value) {$this->marca=$value;}
	public function setModello($value) {$this->modello=$value;}
	public function setCilindrata($value) {$this->cilindrata=$value;}
	public function setColore($value) {$this->colore=$value;}

}



	$marca="BMW";
	$modello="X5";
	$cilindrata=3000;
	$colore="Nera";

$miaAuto = new Automobile($marca, $modello,$cilindrata,$colore);
$miaAuto2 = new Automobile("Ferrari", "GTQSA",6000,"Leopardata");


// echo strtoupper(    $miaAuto->stampaOggetto()    );
// echo strtoupper(    $miaAuto2->stampaOggetto()    );

// $arrayDiOggetti= array($miaAuto, $miaAuto2);

// echo count($arrayDiOggetti);
// echo "<pre>";
// print_r($arrayDiOggetti);
// echo "</pre>";

// for ($i=0; $i < count($arrayDiOggetti); $i++) { 
// 	echo $arrayDiOggetti[$i]->stampaOggetto();
// }


 ?>