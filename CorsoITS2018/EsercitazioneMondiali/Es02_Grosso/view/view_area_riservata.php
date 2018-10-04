<?php 
//controllo la varibile di Login
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false) {
	die("area riservata, fai il login per accedere!");
}

$squadre = caricaSquadre();

echo "<h2> Squadre in gara</h2>";







 ?>



