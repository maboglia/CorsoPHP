### Scheda Informativa: L'istruzione Break in PHP
#### Introduzione
In PHP, l'istruzione `break` viene utilizzata per interrompere l'esecuzione di un loop o di uno switch statement. Quando viene eseguita, l'istruzione `break` fa uscire immediatamente dal loop più interno in cui è stata chiamata.
#### Codice di Esempio
```html
<html lang="en">
	<head>
		<title>Break</title>
	</head>
	<body>
		<?php
			for ($count=0; $count <= 10; $count++) {
	if ($count == 5) {
		break;
	}
	echo $count . ", ";
}
?>
		<br />
		<?php // loop inside a loop with break

for ($i=0; $i<=5; $i++) {
	if ($i % 2 == 0) {
		continue(1);
	}
	for ($k=0; $k<=5; $k++) {
		if ($k == 3) {
			break(2);
		}
		echo $i . "-" . $k . "<br />";
	}
}

?>
	</body>
</html>
```
#### Spiegazione del Codice
1. **Esempio di Break in un Loop**
```php
<?php
    for ($count=0; $count <= 10; $count++) {
	if ($count == 5) {
		break;
	}
	echo $count . ", ";
}
?>
```
- Questo codice esegue un loop da 0 a 10.
- Quando `$count` diventa uguale a 5, l'istruzione `break` interrompe immediatamente il loop, portando alla fine dell'esecuzione dello script.
2. **Esempio di Break in un Loop annidato**
```php
<?php
    for ($i=0; $i<=5; $i++) {
	if ($i % 2 == 0) {
		continue(1);
	}
	for ($k=0; $k<=5; $k++) {
		if ($k == 3) {
			break(2);
		}
		echo $i . "-" . $k . "<br />";
	}
}
?>
```
- In questo caso, ci sono due loop annidati.
- Se `$i` è un numero pari, l'istruzione `continue(1)` fa saltare il loop più interno.
- Se `$k` diventa uguale a 3, l'istruzione `break(2)` interrompe entrambi i loop, portando alla fine dell'esecuzione dello script.
#### Concetti Chiave
- **Interrompere un Loop**: L'istruzione `break` interrompe immediatamente l'esecuzione di un loop quando viene eseguita.
- **Specifica del Numero di Loop**: È possibile specificare un numero opzionale all'interno delle parentesi di `break` per specificare quanti loop interrompere.
- **Utilizzo in Loop Annidati**: `break` è particolarmente utile quando si lavora con loop annidati, consentendo di uscire da più di un loop simultaneamente.
#### Esempio di Output
Quando il codice viene eseguito, l'output sarà:
```
0, 1, 2, 3, 4, 
1-0
1-1
1-2
3-0
3-1
3-2
5-0
5-1
5-2
```
#### Conclusione
L'istruzione `break` è una parte fondamentale della programmazione in PHP. Utilizzata all'interno di loop, consente di controllare il flusso del programma e interrompere l'esecuzione quando necessario. Comprendere come e quando utilizzare `break` è essenziale per scrivere codice efficiente e funzionale.