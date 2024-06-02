
### Esercizio 31: Controllare se un Numero è Pari o Dispari

<details>
<summary>
Scrivi una funzione che accetta un numero e restituisce se è pari o dispari.
</summary>

```php
<?php
function pariDispari($numero) {
    return ($numero % 2 == 0) ? "Pari" : "Dispari";
}

echo "Il numero 4 è: " . pariDispari(4) . "\n";
echo "Il numero 7 è: " . pariDispari(7);
?>
```

</details>

---

### Esercizio 32: Calcolare la Radice Quadrata

<details>
<summary>
Crea una funzione che accetta un numero e restituisce la sua radice quadrata.
</summary>

```php
<?php
function radiceQuadrata($numero) {
    return sqrt($numero);
}

echo "La radice quadrata di 16 è: " . radiceQuadrata(16);
?>
```

</details>

---

### Esercizio 33: Calcolare la Potenza di un Numero

<details>
<summary>
Scrivi una funzione che accetta due numeri, base ed esponente, e restituisce il risultato della potenza.
</summary>

```php
<?php
function potenza($base, $esponente) {
    return pow($base, $esponente);
}

echo "2 elevato alla 3 è: " . potenza(2, 3);
?>
```

</details>

---

### Esercizio 34: Convertire un Numero Decimale in Binario

<details>
<summary>
Crea una funzione che accetta un numero decimale e lo converte in binario.
</summary>

```php
<?php
function decimaleBinario($numero) {
    return decbin($numero);
}

echo "Il numero binario di 10 è: " . decimaleBinario(10);
?>
```

</details>

---

### Esercizio 35: Calcolare il Massimo Comune Divisore (MCD)

<details>
<summary>
Scrivi una funzione che accetta due numeri e restituisce il loro MCD usando l'algoritmo di Euclide.
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

echo "Il MCD di 56 e 98 è: " . mcd(56, 98);
?>
```

</details>

---

### Esercizio 36: Convertire un Numero Decimale in Esadecimale

<details>
<summary>
Crea una funzione che accetta un numero decimale e lo converte in esadecimale.
</summary>

```php
<?php
function decimaleEsadecimale($numero) {
    return dechex($numero);
}

echo "Il numero esadecimale di 255 è: " . decimaleEsadecimale(255);
?>
```

</details>

---

### Esercizio 37: Somma dei Primi N Numeri Naturali

<details>
<summary>
Scrivi una funzione che accetta un numero `n` e restituisce la somma dei primi `n` numeri naturali.
</summary>

```php
<?php
function sommaNumeriNaturali($n) {
    return ($n * ($n + 1)) / 2;
}

echo "La somma dei primi 10 numeri naturali è: " . sommaNumeriNaturali(10);
?>
```

</details>

---

### Esercizio 38: Generare un Numero Casuale in un Intervallo

<details>
<summary>
Crea una funzione che accetta due numeri e genera un numero casuale compreso tra questi due numeri.
</summary>

```php
<?php
function numeroCasuale($min, $max) {
    return rand($min, $max);
}

echo "Numero casuale tra 1 e 100: " . numeroCasuale(1, 100);
?>
```

</details>

---

### Esercizio 39: Calcolare il Fattoriale di un Numero

<details>
<summary>
Scrivi una funzione che accetta un numero e calcola il suo fattoriale.
</summary>

```php
<?php
function fattoriale($n) {
    if ($n == 0) {
        return 1;
    } else {
        return $n * fattoriale($n - 1);
    }
}

echo "Il fattoriale di 5 è: " . fattoriale(5);
?>
```

</details>

---

### Esercizio 40: Convertire un Numero in una Stringa Formattata

<details>
<summary>
Crea una funzione che accetta un numero e lo restituisce come una stringa formattata con due cifre decimali.
</summary>

```php
<?php
function formattaNumero($numero) {
    return number_format($numero, 2);
}

echo "Il numero 1234.5678 formattato è: " . formattaNumero(1234.5678);
?>
```

</details>
