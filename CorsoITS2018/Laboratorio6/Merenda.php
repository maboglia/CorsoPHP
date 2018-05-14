<?php 

/**
 * 
 */
class Merenda
{
	
	public $nome;
	public $prezzo;

	function __construct($n, $p)
	{
		$this->nome = $n;
		$this->prezzo = $p;
	}

	function stampaMerenda(){
		return "hai preso:". $this->nome;
	}
}

$merenda = new Merenda("focaccia", 1.00);

echo $merenda->nome;
echo $merenda->prezzo;
echo $merenda->stampaMerenda();
