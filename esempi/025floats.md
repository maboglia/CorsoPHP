### Scheda Informativa: Numeri a Virgola Mobile in PHP
#### Introduzione
I numeri a virgola mobile (floating point) sono numeri che hanno una parte decimale. PHP offre diverse funzioni per lavorare con questi numeri, comprese operazioni matematiche e verifiche di tipo.
#### Codice di Esempio
```html
<html lang="en">
	<head>
		<title>Floating Point Numbers</title>
	</head>
	<body>
		<?php echo $float = 3.14;
?><br />
		<?php echo $float + 7;
?><br />
		<?php echo 4/3;
?><br />
		<?php echo 4/0;
?><br />
		<br />
		Round: 		<?php echo round($float, 1);
?><br />
		Ceiling: 	<?php echo ceil($float);
?><br />
		Floor: 		<?php echo floor($float);
?><br />
		<br />
		<?php $integer = 3;
?>
		<?php echo "Is {$integer} integer? " . is_int($integer);
?><br />
		<?php echo "Is {$float} integer? " . is_int($float);
?><br />
		<br />
		<?php echo "Is {$integer} float? " . is_float($integer);
?><br />
		<?php echo "Is {$float} float? " . is_float($float);
?><br />
		<br />
		<?php echo "Is {$integer} numeric? " . is_numeric($integer);
?><br />
		<?php echo "Is {$float} numeric? " . is_numeric($float);
?><br />
		<br />
	</body>
</html>
```
#### Spiegazione del Codice
1. **Numeri a Virgola Mobile e Operazioni**
```php
<?php echo $float = 3.14;
?><br />
<?php echo $float + 7;
?><br />
<?php echo 4/3;
?><br />
```
- `$float = 3.14`: Assegna il valore `3.14` alla variabile `$float`.
- `echo $float + 7;`: Somma `7` a `$float` e stampa il risultato (`10.14`).
- `echo 4/3;`: Esegue la divisione `4/3` e stampa il risultato (`1.3333333333333`).
2. **Divisione per Zero**
```php
<?php echo 4/0;
?><br />
```
- `4/0`: In PHP, la divisione per zero genera un errore di tipo `Division by zero`.
3. **Funzioni di Arrotondamento**
```php
Round: <?php echo round($float, 1);
?><br />
Ceiling: <?php echo ceil($float);
?><br />
Floor: <?php echo floor($float);
?><br />
```
- `round($float, 1)`: Arrotonda `$float` a 1 cifra decimale (`3.1`).
- `ceil($float)`: Arrotonda `$float` per eccesso al numero intero più vicino (`4`).
- `floor($float)`: Arrotonda `$float` per difetto al numero intero più vicino (`3`).
4. **Verifiche di Tipo**
```php
<?php $integer = 3;
?>
<?php echo "Is {$integer} integer? " . is_int($integer);
?><br />
<?php echo "Is {$float} integer? " . is_int($float);
?><br />
<?php echo "Is {$integer} float? " . is_float($integer);
?><br />
<?php echo "Is {$float} float? " . is_float($float);
?><br />
<?php echo "Is {$integer} numeric? " . is_numeric($integer);
?><br />
<?php echo "Is {$float} numeric? " . is_numeric($float);
?><br />
```
- `is_int($integer)`: Verifica se `$integer` è un numero intero. Restituisce `1` (vero).
- `is_int($float)`: Verifica se `$float` è un numero intero. Restituisce ` ` (falso).
- `is_float($integer)`: Verifica se `$integer` è un numero a virgola mobile. Restituisce ` ` (falso).
- `is_float($float)`: Verifica se `$float` è un numero a virgola mobile. Restituisce `1` (vero).
- `is_numeric($integer)`: Verifica se `$integer` è numerico. Restituisce `1` (vero).
- `is_numeric($float)`: Verifica se `$float` è numerico. Restituisce `1` (vero).
#### Concetti Chiave
- **Numeri a Virgola Mobile**: Numeri che hanno una parte decimale, ad esempio `3.14`.
- **Funzioni di Arrotondamento**:
  - `round()`: Arrotonda un numero a un certo numero di cifre decimali.
  - `ceil()`: Arrotonda per eccesso.
  - `floor()`: Arrotonda per difetto.
- **Verifiche di Tipo**:
  - `is_int()`: Verifica se una variabile è un intero.
  - `is_float()`: Verifica se una variabile è un numero a virgola mobile.
  - `is_numeric()`: Verifica se una variabile è numerica (intero o float).
#### Esempio di Output
Quando il codice viene eseguito, l'output sarà:
```
3.14
10.14
1.3333333333333
Warning: Division by zero in [file path] on line [line number]
Round: 3.1
Ceiling: 4
Floor: 3
Is 3 integer? 1
Is 3.14 integer? 
Is 3 float? 
Is 3.14 float? 1
Is 3 numeric? 1
Is 3.14 numeric? 1
```
#### Conclusione
I numeri a virgola mobile in PHP sono strumenti potenti per gestire operazioni matematiche che coinvolgono frazioni. PHP fornisce diverse funzioni per arrotondare e verificare il tipo di variabili numeriche. Comprendere come utilizzare queste funzioni è essenziale per scrivere codice preciso e affidabile. Evitare operazioni che causano errori, come la divisione per zero, è cruciale per mantenere il codice robusto.