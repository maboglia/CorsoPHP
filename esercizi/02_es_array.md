
### Esercizio 21: Somma degli Elementi di un Array

Scrivi una funzione che accetta un array di numeri e restituisce la somma di tutti gli elementi.

```php
<?php
function sommaArray($array) {
    return array_sum($array);
}

$numeri = array(1, 2, 3, 4, 5);
echo "La somma degli elementi è: " . sommaArray($numeri);
?>
```

### Esercizio 22: Filtrare i Numeri Pari

Crea una funzione che accetta un array di numeri e restituisce un nuovo array contenente solo i numeri pari.

```php
<?php
function filtraPari($array) {
    return array_filter($array, function($num) {
        return $num % 2 == 0;
    });
}

$numeri = array(1, 2, 3, 4, 5, 6);
$pari = filtraPari($numeri);
echo "Numeri pari: " . implode(", ", $pari);
?>
```

### Esercizio 23: Trovare il Minimo e il Massimo

Scrivi una funzione che accetta un array di numeri e restituisce il valore minimo e massimo.

```php
<?php
function minMax($array) {
    return array('min' => min($array), 'max' => max($array));
}

$numeri = array(1, 2, 3, 4, 5);
$minMax = minMax($numeri);
echo "Minimo: " . $minMax['min'] . ", Massimo: " . $minMax['max'];
?>
```

### Esercizio 24: Ordinare un Array

Crea una funzione che ordina un array di numeri in ordine crescente.

```php
<?php
function ordinaArray($array) {
    sort($array);
    return $array;
}

$numeri = array(5, 1, 4, 2, 3);
$ordinati = ordinaArray($numeri);
echo "Array ordinato: " . implode(", ", $ordinati);
?>
```

### Esercizio 25: Unire Due Array

Scrivi una funzione che accetta due array e li unisce in un unico array.

```php
<?php
function unisciArray($array1, $array2) {
    return array_merge($array1, $array2);
}

$array1 = array(1, 2, 3);
$array2 = array(4, 5, 6);
$uniti = unisciArray($array1, $array2);
echo "Array unito: " . implode(", ", $uniti);
?>
```

### Esercizio 26: Rimuovere Duplicati

Crea una funzione che accetta un array e rimuove i valori duplicati.

```php
<?php
function rimuoviDuplicati($array) {
    return array_unique($array);
}

$numeri = array(1, 2, 2, 3, 4, 4, 5);
$unici = rimuoviDuplicati($numeri);
echo "Array senza duplicati: " . implode(", ", $unici);
?>
```

### Esercizio 27: Contare le Occorrenze di un Valore

Scrivi una funzione che accetta un array e un valore, e conta quante volte quel valore appare nell'array.

```php
<?php
function contaValore($array, $valore) {
    return array_count_values($array)[$valore] ?? 0;
}

$numeri = array(1, 2, 2, 3, 4, 4, 5);
$conta = contaValore($numeri, 2);
echo "Il valore 2 appare: " . $conta . " volte";
?>
```

### Esercizio 28: Invertire un Array

Crea una funzione che accetta un array e restituisce un nuovo array con l'ordine degli elementi invertito.

```php
<?php
function invertiArray($array) {
    return array_reverse($array);
}

$numeri = array(1, 2, 3, 4, 5);
$invertiti = invertiArray($numeri);
echo "Array invertito: " . implode(", ", $invertiti);
?>
```

### Esercizio 29: Trasformare una Stringa in un Array

Scrivi una funzione che accetta una stringa separata da virgole e la trasforma in un array.

```php
<?php
function stringaToArray($stringa) {
    return explode(",", $stringa);
}

$stringa = "1,2,3,4,5";
$array = stringaToArray($stringa);
echo "Array: " . implode(", ", $array);
?>
```

### Esercizio 30: Calcolare la Lunghezza di un Array

Crea una funzione che accetta un array e restituisce la sua lunghezza.

```php
<?php
function lunghezzaArray($array) {
    return count($array);
}

$numeri = array(1, 2, 3, 4, 5);
echo "La lunghezza dell'array è: " . lunghezzaArray($numeri);
?>
```

