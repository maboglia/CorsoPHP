# Argomenti delle Funzioni PHP

---

#### Introduzione

Gli argomenti delle funzioni sono valori passati a una funzione quando viene chiamata. Questi valori possono essere utilizzati all'interno della funzione per eseguire operazioni specifiche.

---

#### Codice di Esempio

```php
<html lang="en">
 <head>
  <title>Functions: Arguments</title>
 </head>
 <body>
  <?php

function say_hello_to($word) {
 echo "Hello {$word}!<br />";
}

$name = "John Doe";
say_hello_to($name);

?>
  <?php

function better_hello($greeting, $target, $punct) {
 echo $greeting . " " . $target . $punct . "<br />";
}

better_hello("Hello", $name, "!");
better_hello("Greetings", $name, "!!!");

better_hello("Greetings", $name, null);

?>
 </body>
</html>
```

---

#### Spiegazione del Codice

1. **Funzione `say_hello_to()`**

```php
<?php
    function say_hello_to($word) {
 echo "Hello {$word}!<br />";
}
?>
```

- La funzione `say_hello_to()` accetta un singolo argomento `$word` e stampa il saluto "Hello" seguito dal valore di `$word`.

2. **Utilizzo della Funzione con un Argomento**

```php
<?php
    $name = "John Doe";
say_hello_to($name);
// Chiamata alla funzione con l'argomento $name
?>
```

- Viene assegnato il valore "John Doe" alla variabile `$name`, che viene quindi passato come argomento alla funzione `say_hello_to()`.

3. **Funzione `better_hello()`**

```php
<?php
    function better_hello($greeting, $target, $punct) {
 echo $greeting . " " . $target . $punct . "<br />";
}
?>
```

- La funzione `better_hello()` accetta tre argomenti: `$greeting`, `$target`, e `$punct`. Stampa una frase composta da questi tre argomenti.

4. **Utilizzo della Funzione con più Argomenti**

```php
<?php
    better_hello("Hello", $name, "!");
// Chiamata alla funzione con tre argomenti
    better_hello("Greetings", $name, "!!!");
// Chiamata alla funzione con tre argomenti
    better_hello("Greetings", $name, null);
// Chiamata alla funzione con tre argomenti, dove il terzo è null
?>
```

- La funzione `better_hello()` viene chiamata con diversi set di argomenti, consentendo di personalizzare il saluto in base alle esigenze.

---

#### Concetto Chiave

- **Argomenti delle Funzioni**: Gli argomenti delle funzioni sono valori passati quando una funzione viene chiamata e possono essere utilizzati all'interno della funzione per eseguire operazioni specifiche.

---

#### Considerazioni Finali

Utilizzando gli argomenti delle funzioni, è possibile rendere le funzioni più flessibili e riutilizzabili, consentendo loro di lavorare con una vasta gamma di input. Assicurarsi di definire i parametri delle funzioni in base alle necessità del codice e di utilizzare argomenti significativi per mantenere il codice chiaro e comprensibile.

- [named arguments](../appunti/02_10_named_arguments.md)