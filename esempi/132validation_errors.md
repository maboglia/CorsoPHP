# errori di validazione 

nei dati inseriti dall'utente in un modulo HTML. La validazione dei dati è cruciale per garantire che solo dati corretti vengano elaborati e memorizzati. In questo caso, vengono eseguite diverse forme di validazione, come presenza, lunghezza della stringa, tipo di dato, inclusione in un set e formato. Gli errori di validazione vengono quindi visualizzati all'utente per consentire correzioni.

---

## Commenti al codice:


```php
<html lang="en">
	<head>
		<title>Validation Errors</title>
	</head>
	<body>
		<?php

$errors = array();

// * presence
		// Utilizza trim() per evitare che gli spazi vuoti vengano conteggiati
		// Utilizza === per evitare falsi positivi
		// empty() considererebbe "0" come vuoto
		$value = trim("");
if (!isset($value) || $value === "") {
	$errors['value'] = "Value can't be blank";
}

// * string length
		// Lunghezza minima
		$value = "abcd";
$min = 3;
if (strlen($value) < $min) {
	echo "Validation failed.<br />";
}
// Lunghezza massima
		$max = 6;
if (strlen($value) > $max) {
	echo "Validation failed.<br />";
}

// * type
		$value = "1";
if (!is_string($value)) {
	echo "Validation failed.<br />";
}

// * inclusion in a set
		$value = "1";
$set = array("1", "2", "3", "4");
if (!in_array($value, $set)) {
	echo "Validation failed.<br />";
}

// * uniqueness
		// Utilizza un database per verificare l'unicità
		// * format
		$value = "nobody@nowhere.com";
		// preg_match è più flessibile
		if (!preg_match("/@/", $value)) {
			echo "Validation failed.<br />";
		}
		// strpos è più veloce di preg_match
		// Utilizza === per fare una corrispondenza esatta con false
		if (strpos($value, "@") === false) {
		  echo "Validation failed.<br />";
		}
		?>
		<?php
			//if (!empty($errors)) {
	// 	redirect_to("first_page.php");
	// 	include("form.php");
	//
}
else {
	// 	include("success.php");
	//
}

// Funzione per visualizzare gli errori del modulo
			function form_errors($errors=array()) {
	$output = "";
	if (!empty($errors)) {
		$output .= "<div class=\"error\">";
		$output .= "Please fix the following errors:";
		$output .= "<ul>";
		foreach ($errors as $key => $error) {
			$output .= "<li>{$error}</li>";
		}
		$output .= "</ul>";
		$output .= "</div>";
	}
	return $output;
}
?>
		<?php echo form_errors($errors);
?>
	</body>
</html>
```
Questi commenti forniscono una spiegazione dettagliata delle diverse forme di validazione eseguite nel codice e come vengono gestiti gli errori di validazione.