### Scheda Informativa: Valori NULL in PHP
#### Introduzione
In PHP, `NULL` rappresenta una variabile senza valore. Una variabile è considerata `NULL` se le è stato assegnato il valore `NULL`, se non è stata definita, o se è stata disattivata con `unset()`.
#### Codice di Esempio
```html
<html lang="en">
	<head>
		<title>NULL</title>
	</head>
	<body>
		<?php
			$var1 = null;
$var2 = "";
?>
		var1 null? <?php echo is_null($var1);
?><br />
		var2 null? <?php echo is_null($var2);
?><br />
		var3 null? <?php echo is_null($var3);
?><br />
		<br />
		var1 is set? <?php echo isset($var1);
?><br />
		var2 is set? <?php echo isset($var2);
?><br />
		var3 is set? <?php echo isset($var3);
?><br />
		<br />
		<?php // empty: "", null, 0, 0.0, "0", false, array() ?>
		<?php $var3 = "0";
?>
		var1 empty? <?php echo empty($var1);
?><br />
		var2 empty? <?php echo empty($var2);
?><br />
		var3 empty? <?php echo empty($var3);
?><br />
	</body>
</html>
```
#### Spiegazione del Codice
1. **Dichiarazione e Assegnazione di Variabili**
```php
<?php
	$var1 = null;
$var2 = "";
?>
```
- `$var1 = null;`: Assegna il valore `NULL` alla variabile `$var1`.
- `$var2 = "";`: Assegna una stringa vuota alla variabile `$var2`.
2. **Verifica se le Variabili sono NULL**
```php
var1 null? <?php echo is_null($var1);
?><br />
var2 null? <?php echo is_null($var2);
?><br />
var3 null? <?php echo is_null($var3);
?><br />
```
- `is_null($var1)`: Verifica se `$var1` è `NULL`. Restituisce `1` (vero).
- `is_null($var2)`: Verifica se `$var2` è `NULL`. Restituisce ` ` (falso).
- `is_null($var3)`: Verifica se `$var3` è `NULL`. Poiché `$var3` non è stata definita, restituisce `1` (vero).
3. **Verifica se le Variabili sono Definite**
```php
var1 is set? <?php echo isset($var1);
?><br />
var2 is set? <?php echo isset($var2);
?><br />
var3 is set? <?php echo isset($var3);
?><br />
```
- `isset($var1)`: Verifica se `$var1` è definita e non è `NULL`. Restituisce ` ` (falso).
- `isset($var2)`: Verifica se `$var2` è definita e non è `NULL`. Restituisce `1` (vero).
- `isset($var3)`: Verifica se `$var3` è definita. Poiché `$var3` non è stata definita, restituisce ` ` (falso).
4. **Verifica se le Variabili sono Vuote**
```php
<?php $var3 = "0";
?>
var1 empty? <?php echo empty($var1);
?><br />
var2 empty? <?php echo empty($var2);
?><br />
var3 empty? <?php echo empty($var3);
?><br />
```
- `empty($var1)`: Verifica se `$var1` è vuota. Restituisce `1` (vero) perché è `NULL`.
- `empty($var2)`: Verifica se `$var2` è vuota. Restituisce `1` (vero) perché è una stringa vuota.
- `empty($var3)`: Verifica se `$var3` è vuota. Restituisce `1` (vero) perché contiene la stringa `"0"`, che è considerata vuota in PHP.
#### Concetti Chiave
- **NULL**: Una variabile è `NULL` se le è stato assegnato il valore `NULL` o se non è stata definita.
- **is_null()**: Funzione che verifica se una variabile è `NULL`.
- **isset()**: Funzione che verifica se una variabile è definita e non è `NULL`.
- **empty()**: Funzione che verifica se una variabile è vuota. Considera vuoti i seguenti valori: `""`, `NULL`, `0`, `0.0`, `"0"`, `false`, `array()`.
#### Esempio di Output
Quando il codice viene eseguito, l'output sarà:
```
var1 null? 1
var2 null? 
var3 null? 1
var1 is set? 
var2 is set? 1
var3 is set? 
var1 empty? 1
var2 empty? 1
var3 empty? 1
```
#### Conclusione
Capire come gestire i valori `NULL` è essenziale per evitare errori nel codice PHP. Le funzioni `is_null()`, `isset()` e `empty()` aiutano a controllare e gestire variabili che possono essere `NULL` o vuote, garantendo un codice più robusto e affidabile.