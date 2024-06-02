
### Esercizio 1: Stampa i numeri da 1 a 10

<details>
<summary>
Scrivi un ciclo che stampa i numeri da 1 a 10.
</summary>

```php
<?php
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
?>
```

</details>

---

### Esercizio 2: Stampa i numeri pari da 1 a 20

<details>
<summary>
Scrivi un ciclo che stampa tutti i numeri pari da 1 a 20.
</summary>

```php
<?php
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}
?>
```

</details>

---

### Esercizio 3: Stampa i numeri dispari da 1 a 20

<details>
<summary>
Scrivi un ciclo che stampa tutti i numeri dispari da 1 a 20.
</summary>

```php
<?php
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}
?>
```

</details>

---

### Esercizio 4: Somma dei numeri da 1 a 100

<details>
<summary>
Scrivi un ciclo che calcola la somma dei numeri da 1 a 100.
</summary>

```php
<?php
$somma = 0;
for ($i = 1; $i <= 100; $i++) {
    $somma += $i;
}
echo "La somma dei numeri da 1 a 100 è: " . $somma;
?>
```

</details>

---

### Esercizio 5: Fattoriale di un numero

<details>
<summary>
Scrivi un ciclo che calcola il fattoriale di un numero dato (esempio: 5!).
</summary>

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

</details>

---

### Esercizio 6: Stampa gli elementi di un array

<details>
<summary>
Scrivi un ciclo che stampa tutti gli elementi di un array.
</summary>

```php
<?php
$array = [1, 2, 3, 4, 5];
foreach ($array as $elemento) {
    echo $elemento . " ";
}
?>
```

</details>

---

### Esercizio 7: Somma degli elementi di un array

<details>
<summary>
Scrivi un ciclo che calcola la somma di tutti gli elementi di un array.
</summary>

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

</details>

---

### Esercizio 8: Conta i numeri positivi in un array

<details>
<summary>
Scrivi un ciclo che conta quanti numeri positivi ci sono in un array.
</summary>

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

</details>

---

### Esercizio 9: Stampa una tabella di moltiplicazione

<details>
<summary>
Scrivi un ciclo che stampa una tabella di moltiplicazione (fino a 10x10).
</summary>

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

</details>

---

### Esercizio 10: Genera i primi n numeri della sequenza di Fibonacci

<details>
<summary>
Scrivi un ciclo che genera i primi n numeri della sequenza di Fibonacci.
</summary>

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

</details>
