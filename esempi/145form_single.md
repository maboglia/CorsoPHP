# pagina di accesso basica. 

Quando l'utente invia il modulo di accesso, i dati vengono verificati per accertare se lo username e la password corrispondono a valori predefiniti. Se le credenziali sono corrette, l'utente viene reindirizzato a una pagina chiamata "basic.html"; in caso contrario, viene visualizzato un messaggio di errore.

---

## Commenti al codice:


```php
<?php
	require_once("included_functions.php");
// Include un file di funzioni esterne

if (isset($_POST['submit'])) {
	// 	Verifica se il modulo è stato inviato
			// 	Il modulo è stato inviato
			$username = $_POST["username"];
	$password = $_POST["password"];
	
	if ($username == "mario" && $password == "secret") {
		// 		Accesso riuscito: reindirizza a "basic.html"
					redirect_to("basic.html");
	}
	else {
		// 		Credenziali non valide: visualizza un messaggio di errore
					$message = "There were some errors.";
	}
}
else {
	// 	Il modulo non è stato inviato
			$username = "";
	$message = "Please log in.";
	// 	Messaggio di invito al login
}
?>
<html lang="en">
	<head>
		<title>Form</title>
	</head>
	<body>
		<?php echo $message;
?><br />
		<!-- Modulo di accesso -->
		<form action="form_single.php" method="post">
		  Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username);
?>" /><br />
		  Password: <input type="password" name="password" value="" /><br />
			<br />
		  <input type="submit" name="submit" value="Submit" />
		</form>
	</body>
</html>
```
Questo codice PHP gestisce la verifica dell'accesso e visualizza un messaggio appropriato in base alla situazione. Il modulo HTML consente all'utente di inserire lo username e la password.