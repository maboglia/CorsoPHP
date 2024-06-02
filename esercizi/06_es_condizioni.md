
### Esercizio 1: Verifica se un numero è pari o dispari

<details>
<summary>
Scrivi una funzione che verifica se un numero dato è pari o dispari.
</summary>

```php
<?php
function pariDispari($numero) {
    if ($numero % 2 == 0) {
        return "Il numero $numero è pari.";
    } else {
        return "Il numero $numero è dispari.";
    }
}

// Esempio di utilizzo
echo pariDispari(5);
?>
```

</details>

### Esercizio 2: Trova il numero maggiore tra tre numeri

<details>
<summary>
Scrivi una funzione che trova il numero maggiore tra tre numeri dati.
</summary>

```php
<?php
function trovaMaggiore($a, $b, $c) {
    if ($a > $b && $a > $c) {
        return "Il numero maggiore è $a.";
    } elseif ($b > $a && $b > $c) {
        return "Il numero maggiore è $b.";
    } else {
        return "Il numero maggiore è $c.";
    }
}

// Esempio di utilizzo
echo trovaMaggiore(10, 20, 15);
?>
```

</details>

### Esercizio 3: Verifica se un numero è positivo, negativo o zero

<details>
<summary>
Scrivi una funzione che verifica se un numero dato è positivo, negativo o zero.
</summary>

```php
<?php
function verificaNumero($numero) {
    if ($numero > 0) {
        return "Il numero $numero è positivo.";
    } elseif ($numero < 0) {
        return "Il numero $numero è negativo.";
    } else {
        return "Il numero è zero.";
    }
}

// Esempio di utilizzo
echo verificaNumero(-10);
?>
```

</details>

### Esercizio 4: Verifica se un anno è bisestile

<details>
<summary>
Scrivi una funzione che verifica se un anno dato è bisestile.
</summary>

```php
<?php
function annoBisestile($anno) {
    if (($anno % 4 == 0 && $anno % 100 != 0) || ($anno % 400 == 0)) {
        return "$anno è un anno bisestile.";
    } else {
        return "$anno non è un anno bisestile.";
    }
}

// Esempio di utilizzo
echo annoBisestile(2024);
?>
```

</details>

### Esercizio 5: Verifica se un carattere è una vocale o una consonante

<details>
<summary>
Scrivi una funzione che verifica se un carattere dato è una vocale o una consonante.
</summary>

```php
<?php
function vocaleConsonante($char) {
    $char = strtolower($char);
    if (in_array($char, ['a', 'e', 'i', 'o', 'u'])) {
        return "$char è una vocale.";
    } else {
        return "$char è una consonante.";
    }
}

// Esempio di utilizzo
echo vocaleConsonante('E');
?>
```

</details>

### Esercizio 6: Verifica se un numero è primo

<details>
<summary>
Scrivi una funzione che verifica se un numero dato è primo.
</summary>

```php
<?php
function numeroPrimo($numero) {
    if ($numero <= 1) {
        return "$numero non è un numero primo.";
    }
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return "$numero non è un numero primo.";
        }
    }
    return "$numero è un numero primo.";
}

// Esempio di utilizzo
echo numeroPrimo(7);
?>
```

</details>

### Esercizio 7: Verifica se una stringa è vuota o meno

<details>
<summary>
Scrivi una funzione che verifica se una stringa data è vuota o meno.
</summary>

```php
<?php
function stringaVuota($stringa) {
    if (empty($stringa)) {
        return "La stringa è vuota.";
    } else {
        return "La stringa non è vuota.";
    }
}

// Esempio di utilizzo
echo stringaVuota('');
?>
```

</details>

### Esercizio 8: Verifica se un numero è compreso tra due valori

<details>
<summary>
Scrivi una funzione che verifica se un numero è compreso tra due valori dati.
</summary>

```php
<?php
function compresoTra($numero, $min, $max) {
    if ($numero >= $min && $numero <= $max) {
        return "$numero è compreso tra $min e $max.";
    } else {
        return "$numero non è compreso tra $min e $max.";
    }
}

// Esempio di utilizzo
echo compresoTra(5, 1, 10);
?>
```

</details>

### Esercizio 9: Verifica se una parola è palindroma

<details>
<summary>
Scrivi una funzione che verifica se una parola data è palindroma.
</summary>

```php
<?php
function parolaPalindroma($parola) {
    $parola = strtolower($parola);
    if ($parola == strrev($parola)) {
        return "$parola è una parola palindroma.";
    } else {
        return "$parola non è una parola palindroma.";
    }
}

// Esempio di utilizzo
echo parolaPalindroma('Anna');
?>
```

</details>

### Esercizio 10: Verifica l'età per guidare

<details>
<summary>
Scrivi una funzione che verifica se una persona è abbastanza grande per guidare.
</summary>

```php
<?php
function verificaEtaGuida($eta) {
    if ($eta >= 18) {
        return "Puoi guidare.";
    } else {
        return "Non puoi guidare.";
    }
}

// Esempio di utilizzo
echo verificaEtaGuida(16);
?>
```

</details>
