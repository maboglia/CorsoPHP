Introduzione:
In questo codice, stiamo affrontando l'argomento delle validazioni dei dati in PHP. Le validazioni sono un aspetto fondamentale nella creazione di applicazioni web sicure e funzionali. Garantiscono che i dati inseriti dagli utenti siano conformi alle regole specificate prima di essere utilizzati o memorizzati nel database. Le funzioni qui presenti sono progettate per verificare la presenza, la lunghezza della stringa e l'inclusione in un set di valori.
Commenti al codice:
```php
<?php

// * presence
// Utilizza trim() per evitare che gli spazi vuoti vengano conteggiati
// Utilizza === per evitare falsi positivi
// empty() considererebbe "0" come vuoto
function has_presence($value) {
	return isset($value) && $value !== "";
}

// * string length
// Lunghezza massima
function has_max_length($value, $max) {
	return strlen($value) <= $max;
}

// * inclusion in a set
function has_inclusion_in($value, $set) {
	return in_array($value, $set);
}

// Funzione per validare le lunghezze massime dei campi
function validate_max_lengths($fields_with_max_lengths) {
	global $errors;
	// 	Si aspetta un array associativo
		foreach($fields_with_max_lengths as $field => $max) {
		$value = trim($_POST[$field]);
		if (!has_max_length($value, $max)) {
			$errors[$field] = ucfirst($field) . " is too long";
		}
	}
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
```
Questi commenti forniscono una panoramica chiara delle funzioni e dei loro obiettivi nel contesto della validazione dei dati in PHP.