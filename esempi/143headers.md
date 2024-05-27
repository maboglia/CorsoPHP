# intestazioni HTTP in PHP 

per controllare il comportamento del server web e comunicare informazioni aggiuntive al client. Le intestazioni HTTP sono utilizzate per trasmettere metadati tra il client e il server durante una richiesta e una risposta HTTP.

---

## Commenti al codice:


```php
<?php
	// Imposta l'intestazione HTTP per indicare che la risorsa richiesta non è stata trovata (404)
	header("HTTP/1.1 404 Not Found");
	// Imposta un'intestazione personalizzata per indicare il software che alimenta il server web
	header("X-Powered-By: none of your business");
?>
<html lang="en">
	<head>
		<title>Headers</title>
	</head>
	<body>
		<?php
			// Questo non funzionerà... a meno che tu non abbia attivato il buffering dell'output.
			// header("HTTP/1.1 404 Not Found");
		?>
		<!-- Stampa delle intestazioni HTTP attualmente impostate -->
		<pre>
			<?php
				print_r(headers_list());
?>
		</pre>
	</body>
</html>
```
Questo codice imposta due intestazioni HTTP utilizzando la funzione `header()`. La prima imposta lo stato della risposta a "404 Not Found", mentre la seconda imposta un'intestazione personalizzata "X-Powered-By". Successivamente, viene stampata una lista di tutte le intestazioni attualmente impostate utilizzando `headers_list()`. È importante notare che l'intestazione HTTP deve essere impostata prima di qualsiasi output al client, altrimenti potrebbero verificarsi errori.