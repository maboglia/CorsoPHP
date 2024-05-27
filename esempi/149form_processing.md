# elabora i dati inviati da un modulo HTML tramite il metodo POST. 

Visualizza i dati ricevuti dal modulo e quindi li elabora, assegnandoli a variabili. Utilizza anche l'operatore ternario per impostare valori predefiniti se le variabili non sono impostate nel modulo.



---

## Commenti al codice:


```php
<html lang="en">
	<head>
		<title>Form Processing</title>
	</head>
	<body>
		<pre>
		<?php
			print_r($_POST);
// Visualizza i dati inviati tramite il modulo
		?>
		</pre>
		<br />
		<?php
			// Rileva l'invio del modulo
			if (isset($_POST['submit'])) {
				echo "form was submitted<br />"; // Messaggio di conferma invio modulo
				// Imposta valori predefiniti
				$username = isset($_POST["username"]) ? $_POST["username"] : "";
				$password = isset($_POST["password"]) ? $_POST["password"] : "";
			} else {
				$username = "";
				$password = "";
			}
		?>
		<?php
			echo "{$username}: {$password}";
// Visualizza i valori di username e password
		?>
	</body>
</html>
```
Questo codice PHP elabora i dati inviati da un modulo HTML tramite il metodo POST. Visualizza i dati inviati tramite il modulo, conferma l'invio del modulo e quindi visualizza i valori di username e password. Utilizza l'operatore ternario per impostare valori predefiniti se le variabili non sono impostate nel modulo.