# Ambito delle Variabili nelle Funzioni PHP

---

#### Introduzione

L'ambito delle variabili, o "scope", si riferisce all'area del codice in cui una variabile è accessibile e può essere utilizzata. In PHP, ci sono diversi livelli di ambito delle variabili, tra cui l'ambito globale e l'ambito locale delle funzioni.

---

#### Codice di Esempio

```php
<html lang="en">
 <head>
  <title>Functions: Scope</title>
 </head>
 <body>
  <?php

$bar = "outside";
// ambito globale

function foo() {
 global $bar;
 if (isset($bar)) {
  echo "foo: " . $bar . "<br />";
 }
 $bar = "inside";
 //  ambito locale
}

echo "1: " . $bar . "<br />";
foo();
echo "2: " . $bar . "<br />";


?>
 </body>
</html>
```

---

#### Spiegazione del Codice

1. **Ambito Globale**

```php
<?php
    $bar = "outside";
// Variabile definita nell'ambito globale
?>
```

- La variabile `$bar` viene definita all'esterno di qualsiasi funzione, rendendola una variabile globale accessibile da tutto il codice all'interno del file.

2. **Funzione `foo()`**

```php
<?php
    function foo() {
 global $bar;
 //  Dichiarazione della variabile globale $bar all'interno della funzione
        if (isset($bar)) {
            echo "foo: " . $bar . "<br />";
        }
        $bar = "inside";  // Assegnazione di un valore alla variabile $bar nell'ambito locale della funzione
}
?>
```

- La funzione `foo()` accede alla variabile globale `$bar` utilizzando la parola chiave `global`. La funzione stampa il valore di `$bar` se è stato impostato, quindi assegna un nuovo valore alla variabile `$bar` nell'ambito locale della funzione.

3. **Output**

```php
<?php
    echo "1: " . $bar . "<br />";
// Stampa il valore di $bar prima di chiamare la funzione
    foo();
// Chiama la funzione foo()
    echo "2: " . $bar . "<br />";
// Stampa il valore di $bar dopo aver chiamato la funzione
?>
```

- La prima istruzione `echo` stampa il valore di `$bar` prima di chiamare la funzione `foo()`.
- Dopo aver chiamato la funzione `foo()`, la variabile globale `$bar` viene modificata nella funzione, quindi la seconda istruzione `echo` stampa il nuovo valore di `$bar`.

---

#### Concetto Chiave

- **Ambito delle Variabili**: Le variabili possono avere ambito globale, accessibile da tutto il codice, o ambito locale, accessibile solo all'interno di una specifica funzione.

---

#### Considerazioni Finali

Comprendere il concetto di ambito delle variabili è fondamentale per scrivere codice PHP efficace e ben strutturato. Utilizzando le parole chiave `global` o definendo le variabili all'interno delle funzioni, è possibile gestire correttamente l'ambito delle variabili e garantire che vengano utilizzate nel contesto appropriato.
