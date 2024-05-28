
### Esercizio 1: Stampa i numeri da 1 a 10

Scrivi un ciclo che stampa i numeri da 1 a 10.

```php
<?php
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
?>
```

### Esercizio 2: Stampa i numeri pari da 1 a 20

Scrivi un ciclo che stampa tutti i numeri pari da 1 a 20.

```php
<?php
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}
?>
```

### Esercizio 3: Stampa i numeri dispari da 1 a 20

Scrivi un ciclo che stampa tutti i numeri dispari da 1 a 20.

```php
<?php
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}
?>
```

### Esercizio 4: Somma dei numeri da 1 a 100

Scrivi un ciclo che calcola la somma dei numeri da 1 a 100.

```php
<?php
$somma = 0;
for ($i = 1; $i <= 100; $i++) {
    $somma += $i;
}
echo "La somma dei numeri da 1 a 100 è: " . $somma;
?>
```

### Esercizio 5: Fattoriale di un numero

Scrivi un ciclo che calcola il fattoriale di un numero dato (esempio: 5!).

```php
<?php
$numero = 5;
$fattoriale = 1;
for ($i = 1; $i <= $numero; $i++) {
    $fattoriale *= $i;
}
echo "Il fattoriale di $numero è: " . $fattoriale;
?>
```

### Esercizio 6: Stampa gli elementi di un array

Scrivi un ciclo che stampa tutti gli elementi di un array.

```php
<?php
$array = [1, 2, 3, 4, 5];
foreach ($array as $elemento) {
    echo $elemento . " ";
}
?>
```

### Esercizio 7: Somma degli elementi di un array

Scrivi un ciclo che calcola la somma di tutti gli elementi di un array.

```php
<?php
$array = [1, 2, 3, 4, 5];
$somma = 0;
foreach ($array as $elemento) {
    $somma += $elemento;
}
echo "La somma degli elementi dell'array è: " . $somma;
?>
```

### Esercizio 8: Conta i numeri positivi in un array

Scrivi un ciclo che conta quanti numeri positivi ci sono in un array.

```php
<?php
$array = [-1, 2, 3, -4, 5];
$positivi = 0;
foreach ($array as $elemento) {
    if ($elemento > 0) {
        $positivi++;
    }
}
echo "Il numero di elementi positivi nell'array è: " . $positivi;
?>
```

### Esercizio 9: Stampa una tabella di moltiplicazione

Scrivi un ciclo che stampa una tabella di moltiplicazione (fino a 10x10).

```php
<?php
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        echo $i * $j . "\t";
    }
    echo "\n";
}
?>
```

### Esercizio 10: Genera i primi n numeri della sequenza di Fibonacci

Scrivi un ciclo che genera i primi n numeri della sequenza di Fibonacci.

```php
<?php
function fibonacci($n) {
    $a = 0;
    $b = 1;
    for ($i = 0; $i < $n; $i++) {
        echo $a . " ";
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }
}

// Esempio di utilizzo
fibonacci(10);
?>
```
