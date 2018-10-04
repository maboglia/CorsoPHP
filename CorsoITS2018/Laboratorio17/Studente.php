<?php

class Studente {
	
	public $nome;
    public $cognome;
    private static $matricola=0;
    public $matricolaUtente;
    

	public function __construct($nome, $cognome)
    {
        $this->nome=$nome;
        $this->cognome=$cognome;
        self::immatricola();
        $this->matricolaUtente=self::$matricola;
        echo "oggetto di tipo studente costruito!";

    }
    
    public static function immatricola(){
        self::$matricola++;
    }

	public function __toString()
    {
        return $this->nome. " " 
        . $this->cognome
        . " matricola: "
        .$this->matricolaUtente;
    }
	
	
	
}


echo $studente1 = new Studente("mauro", "bogliaccino");
echo "<br>";
//è un oggetto, per accedere uso la freccia sul riferimento all'oggetto
$studente1->nome="giovanni";
echo $studente1;
//immatricola è un metodo statco, accedo dalla classe con ::
Studente::immatricola();
Studente::immatricola();
Studente::immatricola();
Studente::immatricola();
echo $studente2 = new Studente("peppino", "bogliaccino");

