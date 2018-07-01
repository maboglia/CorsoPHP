<?php
include 'Connessione.php';
session_start();



if (isset( $_POST['username']) && isset($_POST['password'])) {
  	$username = $_POST['username'];
  	$password = $_POST['password'];
  }
  	$querySQL = "SELECT idStudente from studenti WHERE nome = '" . $username ."' AND password = '" .$password . "'";
  	$risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);
    $id = $risultato;

    if ($risultato->num_rows > 0) {
    	    while($row = $risultato->fetch_assoc()) {
    	         $id = $row["idStudente"];
    	    }
        }

	$ris = mysqli_num_rows($risultato);
  	if ($ris == 0)
  	{
  		session_destroy();
 		header('Location: index.php');
 		exit;
  	}
  	else
  	{
  		$_SESSION['nome'] = $username;
      $_SESSION['id'] = $id;
      header('Location: Elenco_Squadre.php');
      exit;
  	}

?>
