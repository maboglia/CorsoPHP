# encoding HTML e la differenza tra le funzioni `htmlspecialchars` ed `htmlentities` in PHP. 

L'encoding HTML è essenziale per evitare attacchi di tipo cross-site scripting (XSS) e per garantire che i caratteri speciali vengano visualizzati correttamente all'interno di una pagina web.

---

## Commenti al codice:


```php
<html lang="en">
	<head>
		<title>HTML encoding</title>
	</head>
	<body>
		<?php
			// Definizione del testo del link con caratteri speciali
			$linktext = "<Click> & learn more";
?>
		<!-- Utilizzo di htmlspecialchars per codificare il testo del link -->
		<a href="">
			<?php echo htmlspecialchars($linktext);
?>
		</a>
		<br />
		<?php

// Definizione di una stringa con caratteri speciali
			$text = "™£•“—é";
// Utilizzo di htmlentities per codificare la stringa
			echo htmlentities($text);

?>
		<br />
		<?php // What to use when

// Definizione di variabili per costruire un URL con parametri
		$url_page = "php/created/page/url.php";
$param1 = "This is a string with < >";
$param2 = "&#?*$[]+ are bad characters";
$linktext = "<Click> & learn more";

$url = "http://localhost/";
$url .= rawurlencode($url_page);
$url .= "?" . "param1=" . urlencode($param1);
$url .= "&" . "param2=" . urlencode($param2);
?>
		<!-- Utilizzo di htmlspecialchars per codificare l'URL e il testo del link -->
		<a href="<?php echo htmlspecialchars($url);
?>">
		  <?php echo htmlspecialchars($linktext);
?>
		</a>
	</body>
</html>
```
Questi commenti spiegano come e quando utilizzare le funzioni `htmlspecialchars` ed `htmlentities` per evitare problemi di sicurezza e garantire una corretta visualizzazione dei caratteri speciali all'interno delle pagine web.