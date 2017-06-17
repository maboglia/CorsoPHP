<?php 

class Studente {
	public $id;
	public $nome;
	public $cognome;
	public $matricola;
	public $email;

	public function firma(){
		return strtoupper($this->nome." ".$this->cognome);
	}

	public function __toString(){
		return $this->firma();
	}
}