### Scheda Informativa: L'istruzione Continue in PHP
#### Introduzione
In PHP, l'istruzione `continue` viene utilizzata all'interno di loop per saltare l'iterazione corrente e passare alla successiva. Ciò consente di evitare l'esecuzione di determinate istruzioni all'interno di un ciclo e di proseguire con le successive.
#### Codice di Esempio
```html
<html lang="en">
	<head>
		<title>Continue</title>
	</head>
	<body>
		<?php
			for ($count=0; $count <= 10; $count++) {
	if ($count % 2 == 0) {
		continue;
	}
	echo $count . ", ";
}
?>
		<?php // what's wrong with this?
			$count = 0;
			while ($count <= 10) {
				if ($count == 5) {
					$count++;
					continue;
				}
				echo $count . ", ";
				$count++;
			}
		?>
		<br />
		<?php // loop inside a loop with continue

for ($i=0; $i<=5; $i++) {
	if ($i % 2 == 0) {
		continue(1);
	}
	for ($k=0; $k<=5; $k++) {
		if ($k == 3) {
			continue(2);
		}
		echo $i . "-" . $k . "<br />";
	}
}

?>
	</body>
</html>
```
#### Spiegazione del Codice
1. **Esempio di Utilizzo in un Loop For**
```php
<?php
    for ($count=0; $count <= 10; $count++) {
	if ($count % 2 == 0) {
		continue;
	}
	echo $count . ", ";
}
?>
```
- Questo codice esegue un loop da 0 a 10.
- Se `$count` è un numero pari, l'istruzione `continue` fa saltare l'iterazione corrente e passare alla successiva, evitando così di stampare numeri pari.
2. **Problema con l'Utilizzo di `continue` in un Loop While**
```php
<?php
    $count = 0;
while ($count <= 10) {
	if ($count == 5) {
		$count++;
		continue;
	}
	echo $count . ", ";
	$count++;
}
?>
```
- In questo caso, `$count` viene incrementato prima dell'istruzione `continue`, il che causa un'iterazione infinita quando `$count` diventa uguale a 5. Per risolvere questo problema, l'istruzione `continue` dovrebbe essere posizionata prima dell'incremento di `$count`.
3. **Utilizzo di `continue` con un Loop Annidato**
```php
<?php
    for ($i=0; $i<=5; $i++) {
	if ($i % 2 == 0) {
		continue(1);
	}
	for ($k=0; $k<=5; $k++) {
		if ($k == 3) {
			continue(2);
		}
		echo $i . "-" . $k . "<br />";
	}
}
?>
```
- In questo esempio, l'istruzione `continue(1)` fa saltare l'iterazione del primo loop quando `$i` è un numero pari.
- L'istruzione `continue(2)` fa saltare l'iterazione del secondo loop quando `$k` diventa uguale a 3.
#### Concetti Chiave
- **Saltare l'Iterazione**: L'istruzione `continue` fa saltare l'iterazione corrente di un loop e passa alla successiva.
- **Posizione di `continue`**: È importante posizionare `continue` in modo appropriato all'interno del loop per evitare comportamenti indesiderati, come l'iterazione infinita.
- **Numero di Loop**: È possibile specificare un numero opzionale all'interno delle parentesi di `continue` per specificare quanti loop saltare quando si lavora con loop annidati.
#### Esempio di Output
Quando il codice viene eseguito, l'output sarà:
```
1, 3, 5, 7, 9, 1-0
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
L'istruzione `continue` è uno strumento utile per controllare il flusso di esecuzione dei loop in PHP. È spesso utilizzata per saltare iterazioni non necessarie e migliorare l'efficienza del codice