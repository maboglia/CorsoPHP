# Array Functions

```php
<html lang="en">
 <head>
  <title>Array Functions</title>
 </head>
 <body>
  <?php $numbers = array(8,23,15,42,16,4);
?>
  Count:     <?php echo count($numbers);
?><br />
  Max value:   <?php echo max($numbers);
?><br />
  Min value:   <?php echo min($numbers);
?><br />
  <br />
  <pre>
  Sort:      <?php sort($numbers);
print_r($numbers);
?><br />
  Reverse sort: <?php rsort($numbers);
print_r($numbers);
?><br />
  </pre>
  <br />
  Implode:    <?php echo $num_string = implode(" * ", $numbers);
?><br />
  Explode:    <?php print_r(explode(" * ", $num_string));
?><br />
  <br />
  15 in array?: <?php echo in_array(15, $numbers);
// returns T/F ?><br />
  19 in array?: <?php echo in_array(19, $numbers);
// returns T/F ?><br />
 </body>
</html>
```

### Funzioni per gli Array in PHP

---

#### 1. `count($array)`

Restituisce il numero di elementi presenti nell'array.

---

#### 2. `max($array)`

Restituisce il valore massimo all'interno dell'array.

---

#### 3. `min($array)`

Restituisce il valore minimo all'interno dell'array.

---

#### 4. `sort($array)`

Ordina gli elementi dell'array in ordine crescente e modifica l'array originale.

---

#### 5. `rsort($array)`

Ordina gli elementi dell'array in ordine decrescente e modifica l'array originale.

---

#### 6. `implode($separator, $array)`

Concatena gli elementi dell'array in una stringa separati dal separatore specificato.

---

#### 7. `explode($separator, $string)`

Suddivide una stringa in un array di stringhe utilizzando il separatore specificato.

---

#### 8. `in_array($value, $array)`

Restituisce `true` se il valore specificato è presente nell'array, altrimenti restituisce `false`.

### Esempio di Utilizzo nel Codice

- `count($numbers)`: Restituisce il numero di elementi nell'array `$numbers`.
- `max($numbers)`: Restituisce il valore massimo all'interno dell'array `$numbers`.
- `min($numbers)`: Restituisce il valore minimo all'interno dell'array `$numbers`.
- `sort($numbers)`: Ordina gli elementi di `$numbers` in ordine crescente.
- `rsort($numbers)`: Ordina gli elementi di `$numbers` in ordine decrescente.
- `implode(" * ", $numbers)`: Concatena gli elementi di `$numbers` utilizzando " * " come separatore.
- `explode(" * ", $num_string)`: Suddivide la stringa `$num_string` in un array utilizzando " * " come separatore.
- `in_array(15, $numbers)`: Verifica se il valore 15 è presente nell'array `$numbers`.
- `in_array(19, $numbers)`: Verifica se il valore 19 è presente nell'array `$numbers`.
