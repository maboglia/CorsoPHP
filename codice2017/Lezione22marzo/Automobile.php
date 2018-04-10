<?php 

class Automobile{

	//stato interno, proprietà della classe

	public $marca = "BMW";
	public $modello = "X5";
	public $cilindrata = "3000";
	public $colore = "Rossa";
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


 ?>