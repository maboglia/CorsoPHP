# Valori di Ritorno nelle Funzioni PHP

---

#### Introduzione

I valori di ritorno nelle funzioni PHP consentono a una funzione di restituire un valore al punto in cui è stata chiamata. Questo valore può essere utilizzato direttamente nel codice o assegnato a una variabile per ulteriori operazioni.

---

#### Codice di Esempio

```php
<html lang="en">
 <head>
  <title>Functions: Return Values</title>
 </head>
 <body>
  <?php

function add($val1, $val2) {
 $sum = $val1 + $val2;
 return $sum;
}

$result1 = add(3,4);
$result2 = add(5,$result1);
echo $result2;

?>
  <br />
  <?php // Chinese Zodiac as a function

function chinese_zodiac($year) {
 switch (($year - 4) % 12) {
  case  0: return 'Rat';
  case  1: return 'Ox';
  case  2: return 'Tiger';
  case  3: return 'Rabbit';
  case  4: return 'Dragon';
  case  5: return 'Snake';
  case  6: return 'Horse';
  case  7: return 'Goat';
  case  8: return 'Monkey';
  case  9: return 'Rooster';
  case 10: return 'Dog';
  case 11: return 'Pig';
 }
}

$zodiac = chinese_zodiac(2013);
echo "2013 is the year of the {$zodiac}.<br />";

echo "2027 is the year of the " . chinese_zodiac(2027) . ".<br />";

?>
  <br />
  <?php

function better_hello($greeting, $target, $punct) {
 return $greeting . " " . $target . $punct . "<br />";
}

echo better_hello("Hello", "John Doe", "!");

?>
 </body>
</html>
```

---

#### Spiegazione del Codice

1. **Definizione della Funzione `add()` con Valore di Ritorno**

```php
<?php
    function add($val1, $val2) {
 $sum = $val1 + $val2;
 return $sum;
}
?>
```

- La funzione `add()` accetta due argomenti, li somma e restituisce il risultato.

2. **Utilizzo dei Valori di Ritorno**

```php
<?php
    $result1 = add(3,4);
// $result1 conterrà 7
    $result2 = add(5,$result1);
// $result2 conterrà il risultato di 5 + $result1
    echo $result2;
// Stampa il valore di $result2
?>
```

3. **Funzione `chinese_zodiac()` con Valore di Ritorno**

```php
<?php
    function chinese_zodiac($year) {
 switch (($year - 4) % 12) {
  case  0: return 'Rat';
  case  1: return 'Ox';
  //   ...
 }
}

$zodiac = chinese_zodiac(2013);
// Assegna il valore di ritorno della funzione alla variabile $zodiac
    echo "2013 is the year of the {$zodiac}.<br />";
// Stampa il risultato
?>
```

4. **Funzione `better_hello()` con Valore di Ritorno**

```php
<?php
    function better_hello($greeting, $target, $punct) {
 return $greeting . " " . $target . $punct . "<br />";
}

echo better_hello("Hello", "John Doe", "!");
// Stampa il risultato della funzione
?>
```

---

#### Concetto Chiave

- **Valori di Ritorno delle Funzioni**: I valori di ritorno sono i valori restituiti da una funzione al punto in cui è stata chiamata. Questi valori possono essere utilizzati direttamente nel codice o assegnati a variabili per ulteriori operazioni.

---

#### Considerazioni Finali

I valori di ritorno consentono alle funzioni di comunicare con altre parti del programma restituendo dati. Assicurarsi di restituire il tipo di dato corretto e che il valore di ritorno sia utilizzato in modo appropriato nel contesto del programma.
