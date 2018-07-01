<?php
include 'Connessione.php';
session_start();



if (isset( $_POST['username']) && isset($_POST['password'])) {
  	$username = $_POST['username'];
  	$password = $_POST['password'];
  }
  	$querySQL = "SELECT idStudente from studenti WHERE nome = '" . $username ."' AND password = '" .$password . "'";
  	$risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);
    $id = $querySQL


	$ris = mysqli_num_rows($risultato);
  	if ($ris == 0)
  	{
  		session_destroy();
 		header('Location: login.php');
 		exit;
  	}
  	else
  	{
  		$_SESSION['nome'] = $username;
      $_SESSION['id'] = $id;
  	    echo "LOGIN EFFETTUATO";
        header('Location: Elenco_Squadre.php');
        exit;
  	}

?>
