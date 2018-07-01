<?php session_start() ?>

<?php 
error_reporting(0);
//include "formlogin.php";
include "Connessione.php";



if($_POST) {
	effettua_login();
} else {
include "formlogin.php"; 
}

function effettua_login()
{
	$user = trim($_POST['nome']);
	$pass = trim($_POST['password']);
	// recupero il nome e la password inseriti dall'utente
	$nome      = trim($_POST['nome']);
	$password  = trim($_POST['password']);
	// verifico se devo eliminare gli slash inseriti automaticamente da PHP
	if(get_magic_quotes_gpc()) {
		$nome      = stripslashes($nome);
		$password  = stripslashes($password);
	}

	// verifico la presenza dei campi obbligatori
	if(!$nome || !$password) {
		$messaggio = urlencode("Non hai inserito il nome o la password");
		header("location: $_SERVER[PHP_SELF]?msg=$messaggio");
		exit;
	}
	// effettuo l'escape dei caratteri speciali per inserirli all'interno della query
	$nome     = mysql_real_escape_string($nome);
	$password = mysql_real_escape_string($password);	

	// preparo ed invio la query
	$query = "SELECT id_studente FROM studenti WHERE nome = '$nome' AND password = '$password'";
	$result = mysql_query($query);
	// controllo l'esito
	if (!$result) {
		die("Errore nella query $query: " . mysql_error());
	}

	$record = mysql_fetch_array($result);

	if(!$record) {
		$messaggio ='Nome utente o password errati';
		echo $messaggio;

	} else {
		session_start();
		$_SESSION['user_id'] = $record['id'];
		$messaggio = 'Login avvenuto con successo';
		echo $messaggio;
		header("Location:formVota.html");
	}
}
?>


