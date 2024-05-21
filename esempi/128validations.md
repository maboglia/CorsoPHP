# Validazione<?php
```php
<html lang="en">
	<head>
		<title>Validations</title>
	</head>
	<body>

<?php

// * presence
		// use trim() so empty spaces don't count
		// use === to avoid false positives
		// empty() would consider "0" to be empty
		$value = trim("0");
		if (!isset($value) || $value === "") {
			echo "Validation failed.<br />";
		}
		// * string length
		// minimum length
		$value = "abcd";
		$min = 3;
		if (strlen($value) < $min) {
			echo "Validation failed.<br />";
		}
		// max length
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
		// uses a database to check uniqueness
		// * format
		// use a regex on a string
		// preg_match($regex, $subject)
		if (preg_match("/PHP/", "PHP is fun.")) {
			echo "A match was found.";
		} else {
		  echo "A match was not found.";
		}
		$value = "nobody@nowhere.com";
		// preg_match is most flexible
		if (!preg_match("/@/", $value)) {
			echo "Validation failed.<br />";
		}
		// strpos is faster than preg_match
		// use === to make exact match with false
		if (strpos($value, "@") === false) {
		  echo "Validation failed.<br />";
		}
		?>
	</body>
</html>
````
Ecco i commenti per ogni parte del codice:
```php
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
?>
```
Questi commenti forniscono una guida chiara e comprensibile su cosa fa ogni parte del codice.