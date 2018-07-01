<?php 

	//Credenziali d'accesso che dovranno essere salvate diversamente
	$mysqlConnessione = new mysqli("localhost", "Albert2", "k123","mondiali");

	 if (mysqli_connect_errno()){
	 	echo "c'è stato un problema con la connessione:" . mysqli_connect_error();
	 }
?>