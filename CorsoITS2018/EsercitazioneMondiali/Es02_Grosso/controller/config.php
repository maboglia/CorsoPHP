<?php

//inizializzo la sessione
session_start();



function controllaLogin($username,$password)
{
	
	
	$querySQL = "SELECT password FROM studenti WHERE nome='"
				.$username."'";
			//eseguo la query, passando anche l'oggetto connessione
			$result = mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error($mysqlConnessione));
			

			$pwd = mysqli_fetch_array($result);
			
	if($password == $pwd)
		return true;
	return false;
}

function caricaSquadre()
{
	$querySQL = "SELECT * FROM squadre";
			//eseguo la query, passando anche l'oggetto connessione
			$result = mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error($mysqlConnessione));
			

			return $squadre = mysqli_fetch_array($result,MYSQLI_NUM);

}

function vota($id_studente, $id_squadra, $voto)
{
	$querySQL = "INSERT INTO voti (id_studente, id_squadra, posizione) VALUES ('"
					.$id_studente."', '"
					.$id_squadra."', '"
					.$voto."')";
			//eseguo la query, passando anche l'oggetto connessione
			$result = mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error($mysqlConnessione));
			
	if ($result == true)
		return true;
	return false;

			
}


 ?>

