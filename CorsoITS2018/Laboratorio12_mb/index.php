<?php 
//verifico se utente è già entrato
if (isset($_COOKIE['visite'])){
	$saluto = "Bentornato";
	$visite = 1 + $_COOKIE['counter'];
} 
//setto l'orario della visita
setcookie("visite", time());
//setto il numero di visite
setcookie("counter", $visite);

//stampo in output data e ora dell'ultima visita

echo $saluto." la tua ultima visita: ".
	date("d/m/Y",$_COOKIE['visite']);

echo " alle ore ".date("H:i:s",$_COOKIE['visite']);

echo " hai visitato il nostro sito: ".$_COOKIE['counter']. " volte";
	echo "<br>";
	echo "<br>";


foreach ($_COOKIE as $key => $value) {
	echo $key." ".$value;
	echo "<br>";
}

 ?>