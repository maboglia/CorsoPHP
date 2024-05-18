### Scheda Informativa: Array in PHP
#### Introduzione
Un array in PHP è una struttura dati che può contenere più valori sotto un unico nome. Gli elementi di un array possono essere di diversi tipi, come numeri, stringhe, altri array o anche oggetti.
#### Codice di Esempio
```html
<html lang="en">
	<head>
		<title>Arrays</title>
	</head>
	<body>
		<?php

$numbers = array(4,8,15,16,23,42);
echo $numbers[0];
?>
		<br />
		<?php $mixed = array(6, "fox", "dog", array("x", "y", "z"));
?>
		<?php echo $mixed[2];
?><br />
		<?php //echo $mixed[3];
?><br />
		<?php //echo $mixed ?><br />
		<?php echo $mixed[3][1];
?><br />
		<?php $mixed[2] = "cat";
?>
		<?php $mixed[4] = "mouse";
?>
		<?php $mixed[] = "horse";
?>
		<pre>
		<?php echo print_r($mixed);
?>
		</pre>
		<?php 
			//PHP 5.4 added the short array syntax.
			$array = [1,2,3];
?>
	</body>
</html>
```
#### Spiegazione del Codice
1. **Creazione di un Array Numerico**
```php
<?php
	$numbers = array(4,8,15,16,23,42);
echo $numbers[0];
?>
```
- `$numbers = array(4,8,15,16,23,42);`: Crea un array numerico contenente i numeri specificati.
- `echo $numbers[0];`: Stampa il primo elemento dell'array, che ha indice 0.
2. **Creazione di un Array Misto**
```php
<?php
	$mixed = array(6, "fox", "dog", array("x", "y", "z"));
echo $mixed[2];
// Stampa "dog"
	echo $mixed[3][1];
// Stampa "y"
?>
```
- `$mixed = array(6, "fox", "dog", array("x", "y", "z"));`: Crea un array misto contenente un numero, due stringhe, e un altro array.
- `echo $mixed[2];`: Stampa il terzo elemento dell'array, che è la stringa "dog".
- `echo $mixed[3][1];`: Accede all'elemento [3] dell'array `$mixed`, che è un array, e quindi accede al secondo elemento (indice 1) di questo array interno, che è la stringa "y".
3. **Modifica di Elementi dell'Array e Aggiunta di Nuovi Elementi**
```php
<?php
	$mixed[2] = "cat";
// Modifica il valore "dog" con "cat"
	$mixed[4] = "mouse";
// Aggiunge un nuovo elemento all'array con chiave 4
	$mixed[] = "horse"; // Aggiunge un nuovo elemento all'array, l'indice viene assegnato automaticamente
?>
```
- `$mixed[2] = "cat";`: Modifica il valore "dog" con "cat" nella posizione 2 dell'array.
- `$mixed[4] = "mouse";`: Aggiunge il valore "mouse" alla posizione 4 dell'array.
- `$mixed[] = "horse";`: Aggiunge il valore "horse" alla fine dell'array, e PHP assegna automaticamente l'indice appropriato.
4. **Stampa dell'Array con print_r()**
```php
<pre>
<?php echo print_r($mixed);
?>
</pre>
```
- `print_r($mixed);`: Stampa una rappresentazione strutturata dell'array `$mixed`, inclusi i suoi valori e le loro chiavi.
#### Concetti Chiave
- **Array Numerico**: Contiene una serie di valori indicizzati numericamente.
- **Array Associativo**: Contiene coppie chiave-valore, dove ogni valore è associato a una chiave univoca.
- **Array Multidimensionale**: Un array che contiene altri array.
- **Indice degli Array**: La posizione di un elemento all'interno di un array, che può essere un numero o una stringa.
#### Esempio di Output
Quando il codice viene eseguito, l'output sarà:
```
4
dog
y
Array
(
    [0] => 6
    [1] => fox
    [2] => cat
    [3] => Array
        (
            [0] => x
            [1] => y
            [2] => z
        )
    [4] => mouse
    [5] => horse
)
```
#### Conclusione
Gli array sono una caratteristica fondamentale in PHP e sono utilizzati per memorizzare e manipolare insiemi di dati in modo efficiente. È possibile creare array numerici, array associativi e array multidimensionali per gestire una vasta gamma di dati. La comprensione dell'uso degli array e delle loro operazioni è cruciale per diventare proficienti nello sviluppo con PHP.