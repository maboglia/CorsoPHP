### Scheda Informativa: Valori di Ritorno Multipli nelle Funzioni PHP
#### Introduzione
Le funzioni PHP possono restituire più di un valore utilizzando array o la funzione `list()`. Questo consente di raggruppare più valori e restituirli in una singola chiamata di funzione.
#### Codice di Esempio
```html
<html lang="en">
	<head>
		<title>Functions: Multiple Returns</title>
	</head>
	<body>
		<?php

function add_subt($val1, $val2) {
	$add = $val1 + $val2;
	$subt = $val1 - $val2;
	return array($add, $subt);
}

$result_array = add_subt(10,5);
echo "Add: " . $result_array[0] . "<br />";
echo "Subt: " . $result_array[1] . "<br />";

list($add_result, $subt_result) = add_subt(20,7);
echo "Add: " . $add_result . "<br />";
echo "Subt: " . $subt_result . "<br />";

?>
	</body>
</html>
```
#### Spiegazione del Codice
1. **Definizione della Funzione `add_subt()` con Valori di Ritorno Multipli**
```php
<?php
    function add_subt($val1, $val2) {
	$add = $val1 + $val2;
	$subt = $val1 - $val2;
	return array($add, $subt);
}
?>
```
- La funzione `add_subt()` accetta due argomenti, calcola sia l'addizione che la sottrazione e le restituisce come un array.
2. **Utilizzo dei Valori di Ritorno Multipli**
```php
<?php
    $result_array = add_subt(10,5);
// Restituisce un array contenente il risultato dell'addizione e della sottrazione
    echo "Add: " . $result_array[0] . "<br />";   // Stampa il risultato dell'addizione
    echo "Subt: " . $result_array[1] . "<br />";
// Stampa il risultato della sottrazione

list($add_result, $subt_result) = add_subt(20,7);
// Utilizza la funzione list() per assegnare i valori di ritorno alle variabili
    echo "Add: " . $add_result . "<br />";
// Stampa il risultato dell'addizione
    echo "Subt: " . $subt_result . "<br />";   // Stampa il risultato della sottrazione
?>
```
#### Concetto Chiave
- **Valori di Ritorno Multipli**: Le funzioni PHP possono restituire più valori raggruppandoli in un array e restituendo l'array. In alternativa, è possibile utilizzare la funzione `list()` per assegnare i valori di ritorno a variabili separate.
#### Considerazioni Finali
I valori di ritorno multipli sono utili quando una funzione deve restituire più risultati correlati. Assicurarsi di gestire correttamente gli array restituiti o le variabili assegnate con la funzione `list()` per accedere ai valori di ritorno desiderati.