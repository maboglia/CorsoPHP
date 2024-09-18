# Validazione

```php

<html lang="en">
	<head>
		<title>Validations</title>
	</head>
	<body>

<?php
// * presenza
// Usa trim() per evitare che gli spazi vuoti vengano conteggiati
// Usa === per evitare falsi positivi
// empty() considererebbe "0" come vuoto
$value = trim("0");
if (!isset($value) || $value === "") {
	echo "Validation failed.<br />";
}

// * lunghezza stringa
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

// * tipo
$value = "1";
if (!is_string($value)) {
	echo "Validation failed.<br />";
}

// * inclusione in un set
$value = "1";
$set = array("1", "2", "3", "4");
if (!in_array($value, $set)) {
	echo "Validation failed.<br />";
}

// * unicità
// Utilizza un database per controllare l'unicità
// * formato
// Utilizza una regex su una stringa
// preg_match($regex, $subject)
if (preg_match("/PHP/", "PHP is fun.")) {
    echo "A match was found.";
} else {
    echo "A match was not found.";
}
$value = "nobody@nowhere.com";
// preg_match è più flessibile
if (!preg_match("/@/", $value)) {
    echo "Validation failed.<br />";
}
// strpos è più veloce di preg_match
// Usa === per fare un match esatto con false
if (strpos($value, "@") === false) {
    echo "Validation failed.<br />";
}
	</body>
</html>
```
