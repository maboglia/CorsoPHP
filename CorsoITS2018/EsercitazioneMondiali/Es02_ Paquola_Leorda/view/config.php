<?php
	session_start();
	define('TITOLO', 'vinciimondiali');

	$_GET['pagina'] = 'home';
	/*function controllaLogin($username,$password) {
		$querySQL = "SELECT password FROM studenti WHERE nome='"
					.$username."'";
				//eseguo la query, passando anche l'oggetto connessione
				$result = mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error());


				$pwd = mysqli_fetch_array($result);

		if($password == $pwd)
			return true;
		return false;
	}*/
//stabilendo connessione con database per estrarre elenco squadre
	$server = "localhost";
	$admin = "root";

	$mySQLconn = new mysqli($server, $admin, "", "esercitazionePhp");
	if (mysqli_connect_errno()){
 	echo "c'è stato un problema con la connessione:" . mysqli_connect_error();
 }
	#$_SESSION['isLogged'] = true;
 ?>
