# pagina di accesso che include anche la validazione dei campi dello username e della password. 

Quando l'utente invia il modulo di accesso, i dati vengono verificati per assicurarsi che i campi non siano vuoti e che rispettino le lunghezze massime consentite. Se i dati inseriti superano la validazione, vengono verificate le credenziali. Se le credenziali sono corrette, l'utente viene reindirizzato a una pagina chiamata "basic.html"; altrimenti, viene visualizzato un messaggio di errore.


---

## Commenti al codice:


```php
<?php
	require_once("included_functions.php");
// Include un file di funzioni esterne
	require_once("validation_functions.php");
// Include un file di funzioni di validazione

$errors = array();
// Array per memorizzare gli errori di validazione
	$message = "";
// Messaggio da visualizzare all'utente
	if (isset($_POST['submit'])) { // Verifica se il modulo è stato inviato
		// Il modulo è stato inviato
		$username = trim($_POST["username"]); // Pulisce e memorizza lo username
		$password = trim($_POST["password"]); // Pulisce e memorizza la password
		// Validazioni
		$fields_required = array("username", "password");
		foreach($fields_required as $field) {
			$value = trim($_POST[$field]);
			if (!has_presence($value)) {
				$errors[$field] = ucfirst($field) . " can't be blank";
			}
		}
		$fields_with_max_lengths = array("username" => 30, "password" => 8);
		validate_max_lengths($fields_with_max_lengths); // Validazione lunghezza massima
		if (empty($errors)) {
			// Tentativo di accesso
			if ($username == "mario" && $password == "secret") {
				// Accesso riuscito: reindirizza a "basic.html"
				redirect_to("basic.html");
			} else {
				$message = "Username/password do not match."; // Messaggio di errore
			}
		}
	} else {
		$username = "";
		$message = "Please log in."; // Messaggio di invito al login
	}
?>
<html lang="en">
	<head>
		<title>Form</title>
	</head>
	<body>
		<?php echo $message;
?><br /> <!-- Visualizza il messaggio -->
		<?php echo form_errors($errors);
?> <!-- Visualizza gli errori di validazione -->
		<!-- Modulo di accesso -->
		<form action="form_with_validation.php" method="post">
		  Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username);
?>" /><br />
		  Password: <input type="password" name="password" value="" /><br />
			<br />
		  <input type="submit" name="submit" value="Submit" />
		</form>
	</body>
</html>
```
Questo codice PHP gestisce la verifica dell'accesso e include la validazione dei campi del modulo. Se i dati inseriti dall'utente non superano la validazione, vengono visualizzati gli errori corrispondenti.