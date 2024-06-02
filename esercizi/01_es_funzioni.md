
### Esercizio 11: Funzione per il Calcolo della Somma

<details>
<summary>
Esercizio 11: Funzione per il Calcolo della Somma
Crea una funzione che accetta due numeri come argomenti e restituisce la loro somma.
</summary>

```php
<?php
function somma($a, $b) {
    return $a + $b;
}

echo "La somma di 3 e 7 è: " . somma(3, 7);
?>
```

</details>

### Esercizio 12: Funzione per il Calcolo del Fattoriale

<details>
<summary>
Esercizio 12: Funzione per il Calcolo del Fattoriale
Scrivi una funzione che calcola il fattoriale di un numero dato.
</summary>

```php
<?php
function fattoriale($n) {
    if ($n === 0) {
        return 1;
    }
    return $n * fattoriale($n - 1);
}

echo "Il fattoriale di 5 è: " . fattoriale(5);
?>
```

</details>

### Esercizio 13: Funzione per Contare le Vocali

<details>
<summary>
Esercizio 13: Funzione per Contare le Vocali
Crea una funzione che accetta una stringa e restituisce il numero di vocali in essa contenute.
</summary>

```php
<?php
function contaVocali($str) {
    $vocali = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U');
    $conta = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $vocali)) {
            $conta++;
        }
    }
    return $conta;
}

echo "Il numero di vocali in 'Hello World' è: " . contaVocali('Hello World');
?>
```

</details>

### Esercizio 14: Funzione per il Massimo Comune Divisore (MCD)

<details>
<summary>
Esercizio 14: Funzione per il Massimo Comune Divisore (MCD)
Scrivi una funzione che calcola il MCD di due numeri usando l'algoritmo di Euclide.
</summary>

```php
<?php
function mcd($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

echo "Il MCD di 48 e 18 è: " . mcd(48, 18);
?>
```

</details>

### Esercizio 15: Funzione per Invertire una Stringa

<details>
<summary>
Esercizio 15: Funzione per Invertire una Stringa
Crea una funzione che accetta una stringa e restituisce la stringa invertita.
</summary>

```php
<?php
function invertiStringa($str) {
    return strrev($str);
}

echo "La stringa invertita di 'Hello' è: " . invertiStringa('Hello');
?>
```

</details>

### Esercizio 16: Funzione per Verificare se un Numero è Primo

<details>
<summary>
Esercizio 16: Funzione per Verificare se un Numero è Primo
Scrivi una funzione che verifica se un numero è primo.
</summary>

```php
<?php
function èPrimo($n) {
    if ($n <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

echo "Il numero 7 è primo? " . (èPrimo(7) ? "Sì" : "No");
?>
```

</details>

### Esercizio 17: Funzione per Generare Numeri Casuali

<details>
<summary>
Esercizio 17: Funzione per Generare Numeri Casuali
Crea una funzione che genera un array di numeri casuali di una lunghezza specificata.
</summary>

```php
<?php
function generaNumeriCasuali($lunghezza) {
    $numeri = array();
    for ($i = 0; $i < $lunghezza; $i++) {
        $numeri[] = rand(1, 100);
    }
    return $numeri;
}

$numeri = generaNumeriCasuali(5);
echo "Numeri casuali: " . implode(", ", $numeri);
?>
```

</details>

### Esercizio 18: Funzione per Convertire Temperatura

<details>
<summary>
Esercizio 18: Funzione per Convertire Temperatura
Scrivi una funzione che converte una temperatura da gradi Celsius a gradi Fahrenheit.
</summary>

```php
<?php
function celsiusToFahrenheit($celsius) {
    return $celsius * 9/5 + 32;
}

echo "25 gradi Celsius sono " . celsiusToFahrenheit(25) . " gradi Fahrenheit.";
?>
```

</details>

### Esercizio 19: Funzione per Calcolare la Media di un Array

<details>
<summary>
Esercizio 19: Funzione per Calcolare la Media di un Array
Crea una funzione che calcola la media dei numeri in un array.
</summary>

```php
<?php
function media($numeri) {
    $somma = array_sum($numeri);
    $conteggio = count($numeri);
    return $somma / $conteggio;
}

$numeri = array(1, 2, 3, 4, 5);
echo "La media è: " . media($numeri);
?>
```

</details>

### Esercizio 20: Funzione per Trovare il Massimo in un Array

<details>
<summary>
Esercizio 20: Funzione per Trovare il Massimo in un Array
Scrivi una funzione che trova il valore massimo in un array.
</summary>

```php
<?php
function trovaMassimo($numeri) {
    return max($numeri);
}

$numeri = array(1, 3, 7, 2, 5);
echo "Il valore massimo è: " . trovaMassimo($numeri);
?>
```

</details>
