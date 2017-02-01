<?php 

	//funzione: ha una keyword -> function
	//ha un nome seguita da una coppia di parentesi ()
	//tra le () posso indicare un numero variabile di argomenti e anche inizializzarli, oppure nessun argomento 
	function saluta($nome="ospite")
	{
		//nel corpo della funzione, delimitato dalle parenteesi graffe, inserisco le istruzioni della funzione
		if($nome=="ospite")
			echo "benvenuti, oggi è il: ";
		else
			echo "benvenuto $nome, oggi è il: ";
			
		echo date("d-m-Y H:i:s W");
		

	}

	saluta("mauro");

	function somma($uno, $due)
	{
		//la funzione può ritornare informazioni al chiamante
		return $uno + $due;

	}

	$somma = somma(2,3);
	echo $somma;
	echo "<br/>";
	echo (somma(35,55));

 ?>