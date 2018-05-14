<?php 	

class Studente{

//dichiarazione di proprietà

public $nome;
public $cognome;
public $anno_nascita;
public $posizione;
public $grado;

//metodo costruttore dell'oggetto
public function __construct($nome, $cognome, $anno=0, $posizione=0, $grado=0)
{
	$this->nome=$nome;
	$this->cognome=$cognome;
	$this->anno_nascita=$anno;
	$this->posizione=$posizione;
	$this->grado=$grado;
}

// dichiarazione di metodi

public function __toString()
{
	$eta = $this->calcolaEta();
	return $this->nome.' '.$this->cognome.' '.$eta.' anni';

}

public function calcolaEta()
{
	return date("Y") - $this->anno_nascita;
}

}
 ?>