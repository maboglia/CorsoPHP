### Scheda Informativa: Stringhe in PHP
#### Introduzione
Le stringhe sono sequenze di caratteri, come lettere, numeri, simboli e spazi, che vengono trattate come dati da manipolare o visualizzare all'interno di un programma PHP.
#### Codice di Esempio
```html
<html lang="en">
	<head>
		<title>Strings</title>
	</head>
	<body>
	<?php

echo "Hello World<br />";
echo 'Hello World<br />';

$greeting = "Hello";
$target = "World";
$phrase = $greeting . " " . $target;
echo $phrase;
?>
	<br />
	<?php

echo "$phrase Again<br />";
echo '$phrase Again<br />';
echo "{$phrase}Again<br />";

?>
	</body>
</html>
```
#### Spiegazione del Codice
1. **Stampa delle Stringhe**
```php
<?php
	echo "Hello World<br />";
echo 'Hello World<br />';
?>
```
- `echo "Hello World<br />";`: Stampa la stringa "Hello World" seguita da un salto di riga usando il doppio apice.
- `echo 'Hello World<br />';`: Stampa la stessa stringa utilizzando il singolo apice.
2. **Concatenazione di Stringhe**
```php
<?php
	$greeting = "Hello";
$target = "World";
$phrase = $greeting . " " . $target;
echo $phrase;
?>
```
- `$greeting = "Hello";` e `$target = "World";`: Dichiarano due variabili contenenti le stringhe "Hello" e "World" rispettivamente.
- `$phrase = $greeting . " " . $target;`: Concatena le variabili `$greeting` e `$target` con uno spazio tra di esse e assegna il risultato alla variabile `$phrase`.
- `echo $phrase;`: Stampa la stringa risultante "Hello World".
3. **Interpolazione di Stringhe**
```php
<?php
	echo "$phrase Again<br />";
echo '$phrase Again<br />';
echo "{$phrase}Again<br />";
?>
```
- `echo "$phrase Again<br />";`: Stampa il valore della variabile `$phrase` seguito dalla parola "Again" e da un salto di riga. In questo caso, la variabile viene interpolata all'interno delle doppie virgolette e il suo valore viene stampato.
- `echo '$phrase Again<br />';`: Stampa la stringa '$phrase Again<br />' letteralmente, poiché le variabili non vengono interpretate all'interno dei singoli apici.
- `echo "{$phrase}Again<br />";`: Utilizza le parentesi graffe per racchiudere la variabile `$phrase`, rendendo esplicita l'interpolazione della variabile all'interno della stringa.
#### Concetti Chiave
- **Stringhe delimitate da Apici Singoli e Doppi**: Le stringhe possono essere delimitate sia da apici singoli (`'`) che da apici doppi (`"`). Le stringhe delimitate da apici doppi consentono l'interpolazione delle variabili.
- **Concatenazione di Stringhe**: La concatenazione di stringhe avviene utilizzando l'operatore di concatenazione `.`.
- **Interpolazione di Stringhe**: Le variabili possono essere interpolate all'interno delle stringhe delimitate da apici doppi, consentendo di visualizzare il loro valore.
#### Esempio di Output
Quando il codice viene eseguito, l'output sarà:
```
Hello World
Hello World
Hello World
Hello World Again
$phrase Again
Hello WorldAgain
```
#### Conclusione
Le stringhe sono un aspetto fondamentale della programmazione PHP e vengono utilizzate per rappresentare testo e dati all'interno di un programma. Capire come manipolare e concatenare le stringhe, oltre all'uso corretto della sintassi per l'interpolazione delle variabili, è essenziale per la scrittura di codice PHP efficace e comprensibile.