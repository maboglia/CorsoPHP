### Scheda Informativa: Lo Statement Switch in PHP
#### Introduzione
Lo statement `switch` in PHP è una struttura di controllo di flusso che consente di eseguire un blocco di codice diverso in base al valore di una variabile o di un'espressione. È spesso utilizzato come alternativa a una serie di istruzioni `if...elseif...else` quando si devono confrontare più valori con la stessa variabile.
#### Codice di Esempio
```html
<html lang="en">
	<head>
		<title>Switch</title>
	</head>
	<body>
		<?php
			$a = 2;

switch ($a) {
	case 0:
						echo "a equals 0<br />";
	break;
	case 1:
						echo "a equals 1<br />";
	break;
	case 2:
						echo "a equals 2<br />";
	break;
	case 3:
						echo "a equals 3<br />";
	break;
	default:
						echo "a is not 0, 1, 2, or 3<br />";
	break;
}
?>
		<?php
		// ChineseZodiac
		// whitespace doesn't matter
		// colons, semicolons and breaks do
		$year = 2013;
		switch (($year - 4) % 12) {
			case  0: $zodiac = 'Rat'; 		break;
			case  1: $zodiac = 'Ox'; 			break;
			case  2: $zodiac = 'Tiger'; 	break;
			case  3: $zodiac = 'Rabbit'; 	break;
			case  4: $zodiac = 'Dragon'; 	break;
			case  5: $zodiac = 'Snake'; 	break;
			case  6: $zodiac = 'Horse'; 	break;
			case  7: $zodiac = 'Goat'; 		break;
			case  8: $zodiac = 'Monkey';  break;
			case  9: $zodiac = 'Rooster'; break;
			case 10: $zodiac = 'Dog'; 		break;
			case 11: $zodiac = 'Pig'; 		break;
		}
		echo "{$year} is the year of the {$zodiac}.<br />";
		?>
		<?php // case with multiple values

$user_type = 'customer';

switch ($user_type) {
	case 'student':
						echo "Welcome!";
	break;
	case 'press':
					case 'customer':
					case 'admin':
						echo "Hello!";
	break;
}
?>
	</body>
</html>
```
#### Spiegazione del Codice
1. **Esempio Base**
```php
<?php
    $a = 2;

switch ($a) {
	case 0:
	            echo "a equals 0<br />";
	break;
	case 1:
	            echo "a equals 1<br />";
	break;
	case 2:
	            echo "a equals 2<br />";
	break;
	case 3:
	            echo "a equals 3<br />";
	break;
	default:
	            echo "a is not 0, 1, 2, or 3<br />";
	break;
}
?>
```
- `$a = 2;`: Definisce una variabile `$a` con valore 2.
- `switch ($a) { ... }`: Inizia lo statement switch, confrontando il valore di `$a` con i casi specificati.
- `case 0: ... case 1: ... case 2: ... case 3: ...`: Specifica i possibili valori di `$a`.
- `default: ...`: Fornisce un'opzione predefinita da eseguire se nessun caso corrisponde al valore di `$a`.
- `break;`: Termina il caso corrente e passa al codice successivo fuori dallo switch.
2. **Utilizzo con Espressioni Complesse**
```php
<?php
    $year = 2013;
switch (($year - 4) % 12) {
	// 	Cases per il calcolo degli anni del calendario cinese
}
?>
```
- Utilizza un'espressione complessa all'interno dello switch per calcolare il segno zodiacale cinese per un dato anno.
3. **Caso con Valori Multipli**
```php
<?php
    $user_type = 'customer';

switch ($user_type) {
	case 'student':
	            echo "Welcome!";
	break;
	case 'press':
	        case 'customer':
	        case 'admin':
	            echo "Hello!";
	break;
}
?>
```
- In questo caso, se `$user_type` è uguale a 'press', 'customer', o 'admin', verrà stampato "Hello!".
#### Concetti Chiave
- **Valutazione di un'espressione**: Lo statement switch valuta un'espressione una volta e quindi confronta il suo valore con i casi specificati.
- **Casi e Default**: È possibile specificare più casi per un'unica azione, come nel secondo esempio, e un'opzione predefinita nel caso in cui nessun caso corrisponda al valore dell'espressione.
- **Break**: È importante includere istruzioni `break` alla fine di ogni caso per evitare che il codice continui a eseguire inavvertitamente i casi successivi.
#### Esempio di Output
Quando il codice viene eseguito, l'output sarà:
```
a equals 2
2013 is the year of the Snake.
Hello!
```
#### Conclusione
Lo statement switch è uno strumento utile per eseguire differenti blocchi di codice in base al valore di una variabile o di un'espressione. È particolarmente utile quando si desidera confrontare più valori con la stessa variabile. Comprendere la sintassi e l'utilizzo dello switch è essenziale per la programmazione efficace in PHP.