Introduzione:
Questo codice illustra l'utilizzo delle funzioni `urlencode` e `rawurlencode` in PHP per la creazione di URL sicuri e compatibili con gli standard. Queste funzioni sono utilizzate per codificare correttamente i caratteri speciali all'interno degli URL, garantendo che i parametri passati siano interpretati correttamente dai server web e dai browser.
Commenti al codice:
```php
<html lang="en">
	<head>
		<title>urlencode</title>
	</head>
	<body>
		<?php
			$page = "William Shakespeare";
$quote = "To be or not to be";
$link1 =  "/bio/" . rawurlencode($page) . "?quote=" . urlencode($quote);
$link2 =  "/bio/" . urlencode($page) . "?quote=" . rawurlencode($quote);

// Utilizza rawurlencode per codificare il nome della pagina nell'URL
			// e urlencode per codificare la citazione
			$link1 =  "/bio/" . rawurlencode($page) . "?quote=" . urlencode($quote);
			// Utilizza urlencode per codificare il nome della pagina nell'URL
			// e rawurlencode per codificare la citazione
			$link2 =  "/bio/" . urlencode($page) . "?quote=" . rawurlencode($quote);

echo $link1 . "<br />";
echo $link2 . "<br />";
?>
	</body>
</html>
```
Questi commenti spiegano come le funzioni `urlencode` e `rawurlencode` sono utilizzate per generare due URL differenti, garantendo la corretta codifica dei caratteri speciali nei parametri dell'URL.