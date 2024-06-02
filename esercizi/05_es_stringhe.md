
### Esercizio 51: Lunghezza di una Stringa

<details>
<summary>
Scrivi una funzione che accetta una stringa e restituisce la sua lunghezza.
</summary>

```php
<?php
function lunghezzaStringa($stringa) {
    return strlen($stringa);
}

echo "La lunghezza della stringa 'Hello, World!' è: " . lunghezzaStringa('Hello, World!');
?>
```

</details>

### Esercizio 52: Convertire una Stringa in Maiuscolo

<details>
<summary>
Crea una funzione che accetta una stringa e la converte in maiuscolo.
</summary>

```php
<?php
function stringaMaiuscola($stringa) {
    return strtoupper($stringa);
}

echo "La stringa 'hello' in maiuscolo è: " . stringaMaiuscola('hello');
?>
```

</details>

### Esercizio 53: Convertire una Stringa in Minuscolo

<details>
<summary>
Scrivi una funzione che accetta una stringa e la converte in minuscolo.
</summary>

```php
<?php
function stringaMinuscola($stringa) {
    return strtolower($stringa);
}

echo "La stringa 'HELLO' in minuscolo è: " . stringaMinuscola('HELLO');
?>
```

</details>

### Esercizio 54: Invertire una Stringa

<details>
<summary>
Crea una funzione che accetta una stringa e la restituisce invertita.
</summary>

```php
<?php
function invertiStringa($stringa) {
    return strrev($stringa);
}

echo "La stringa 'hello' invertita è: " . invertiStringa('hello');
?>
```

</details>

### Esercizio 55: Contare le Parole in una Stringa

<details>
<summary>
Scrivi una funzione che accetta una stringa e conta il numero di parole in essa.
</summary>

```php
<?php
function contaParole($stringa) {
    return str_word_count($stringa);
}

echo "Il numero di parole nella stringa 'Hello, World!' è: " . contaParole('Hello, World!');
?>
```

</details>

### Esercizio 56: Estrarre una Sottostringa

<details>
<summary>
Crea una funzione che accetta una stringa, una posizione iniziale e una lunghezza, ed estrae la sottostringa corrispondente.
</summary>

```php
<?php
function estraiSottostringa($stringa, $inizio, $lunghezza) {
    return substr($stringa, $inizio, $lunghezza);
}

echo "La sottostringa di 'Hello, World!' da 7, di lunghezza 5 è: " . estraiSottostringa('Hello, World!', 7, 5);
?>
```

</details>

### Esercizio 57: Trovare la Posizione di una Sottostringa

<details>
<summary>
Scrivi una funzione che accetta una stringa e una sottostringa, e restituisce la posizione della sottostringa nella stringa </summary>principa
le.

```php
<?php
function trovaPosizione($stringa, $sottostringa) {
    return strpos($stringa, $sottostringa);
}

echo "La posizione della sottostringa 'World' in 'Hello, World!' è: " . trovaPosizione('Hello, World!', 'World');
?>
```

</details>

### Esercizio 58: Sostituire una Parte di una Stringa

<details>
<summary>
Crea una funzione che accetta una stringa, una sottostringa da trovare e una sottostringa di sostituzione, e restituisce la </summary>stringa 
risultante dalla sostituzione.

```php
<?php
function sostituisciStringa($stringa, $trova, $sostituisci) {
    return str_replace($trova, $sostituisci, $stringa);
}

echo "Sostituendo 'World' con 'PHP' in 'Hello, World!': " . sostituisciStringa('Hello, World!', 'World', 'PHP');
?>
```

</details>

### Esercizio 59: Contare le Occorrenze di una Sottostringa

<details>
<summary>
Scrivi una funzione che accetta una stringa e una sottostringa, e conta il numero di occorrenze della sottostringa nella </summary>stringa 
principale.

```php
<?php
function contaOccorrenze($stringa, $sottostringa) {
    return substr_count($stringa, $sottostringa);
}

echo "Il numero di occorrenze di 'l' in 'Hello, World!' è: " . contaOccorrenze('Hello, World!', 'l');
?>
```

</details>

### Esercizio 60: Suddividere una Stringa in un Array

<details>
<summary>
Crea una funzione che accetta una stringa e un delimitatore, e suddivide la stringa in un array basato sul delimitatore.
</summary>

```php
<?php
function suddividiStringa($stringa, $delimitatore) {
    return explode($delimitatore, $stringa);
}

$array = suddividiStringa('Hello,World,PHP', ',');
echo "La stringa suddivisa in array: ";
print_r($array);
?>
```

</details>

