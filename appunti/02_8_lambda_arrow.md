# Funzioni anonime, funzioni lambda, arrow-functions

In PHP, le **funzioni lambda** sono sinonimo di **funzioni anonime**. Si tratta di funzioni che non hanno un nome e possono essere utilizzate in linea, assegnate a variabili, passate come argomenti a funzioni o restituite da altre funzioni. Sono introdotte in PHP a partire dalla versione 5.3, insieme al concetto di **chiusure**.

Una funzione lambda in PHP è creata utilizzando la parola chiave `function` senza specificare un nome per la funzione. Ecco un esempio di una lambda in PHP:

```php
<?php
// Definizione di una funzione lambda e assegnazione a una variabile
$lambda = function($name) {
    return "Ciao, " . $name;
};

// Invocazione della funzione lambda
echo $lambda("Mario");
?>
```

### Caratteristiche delle Lambda in PHP

1. **Funzioni anonime**: Non hanno un nome e possono essere assegnate a variabili o passate direttamente come argomenti ad altre funzioni.
   
2. **Chiusure**: Possono catturare variabili dall'ambito circostante usando la parola chiave `use`. Questo permette alla funzione di accedere a variabili esterne senza usare variabili globali.

3. **Binding di variabili**: Le lambda possono catturare variabili dall'ambito esterno sia per valore (binding anticipato) che per riferimento (binding ritardato, indicato con il simbolo `&`).

### Esempio con una chiusura

Le chiusure permettono alle lambda di accedere a variabili definite nell'ambito esterno:

```php
<?php
$message = "Ciao";

// Lambda con chiusura, che "cattura" la variabile $message dall'ambito esterno
$greet = function($name) use ($message) {
    return $message . ", " . $name;
};

echo $greet("Mario");
?>
```

In questo esempio, la variabile `$message` viene catturata e resa disponibile all'interno della lambda tramite `use`. Il risultato sarà: `Ciao, Mario`.

### Lambda con Binding per Riferimento

È possibile catturare variabili per **riferimento**, il che significa che qualsiasi modifica alla variabile all'interno della lambda influenzerà la variabile originale:

```php
<?php
$counter = 0;

// Cattura la variabile $counter per riferimento
$increment = function() use (&$counter) {
    $counter++;
};

$increment();
$increment();

echo $counter; // Stampa 2
?>
```

In questo caso, ogni volta che la lambda viene eseguita, incrementa il valore di `$counter`.

### Utilizzo Pratico delle Lambda

Le lambda sono spesso utilizzate come **callback** in PHP, ad esempio con funzioni come `array_map()`, `array_filter()`, o `usort()`:

```php
<?php
$numbers = [1, 2, 3, 4, 5];

// Utilizzo di una lambda come callback per array_filter()
$even_numbers = array_filter($numbers, function($number) {
    return $number % 2 == 0;
});

print_r($even_numbers); // Stampa [2, 4]
?>
```

### Differenza tra Lambda e Funzioni Normali

- **Nominazione**: Le lambda non hanno un nome, mentre le funzioni normali sì.
- **Ambito**: Le lambda possono catturare variabili dall'ambito esterno tramite chiusure, cosa che le funzioni normali non fanno in modo implicito.
- **Flessibilità**: Le lambda possono essere assegnate a variabili, passate come argomenti e ritornate da altre funzioni.

Le funzioni lambda in PHP permettono un approccio flessibile alla programmazione, specialmente quando si lavora con funzioni di ordine superiore e callback.

---

A partire da PHP 7.4, è stata introdotta una nuova sintassi più concisa per le funzioni anonime, chiamata **arrow function** (`fn`). Questa sintassi è particolarmente utile quando si vogliono scrivere funzioni anonime semplici e brevi. La principale differenza con le funzioni anonime tradizionali è che le **arrow function** usano il **binding implicito delle variabili** dall'ambito esterno, senza bisogno di usare la parola chiave `use`.

### Sintassi `fn`

Ecco un esempio di utilizzo di una arrow function in PHP:

```php
<?php
// Arrow function che calcola il quadrato di un numero
$square = fn($n) => $n * $n;

echo $square(5); // Stampa 25
?>
```

La sintassi `fn` utilizza una **freccia** (`=>`) per separare i parametri e il corpo della funzione, rendendola simile ad altre sintassi moderne come JavaScript.

### Differenze Principali con le Funzioni Anonime Tradizionali

1. **Sintassi più breve**: Le arrow function non richiedono le parole chiave `function` o `use`.
   
2. **Binding implicito**: Le variabili dell'ambito esterno sono automaticamente catturate, senza necessità di specificare `use`.

3. **Un'espressione singola**: Le arrow function possono contenere solo una singola espressione, che viene automaticamente restituita senza bisogno di usare `return`.

### Esempio con Cattura di Variabili

Con le arrow function, le variabili dell'ambito esterno sono automaticamente disponibili all'interno della funzione:

```php
<?php
$message = "Ciao";

// Arrow function che accede alla variabile $message dall'ambito esterno
$greet = fn($name) => "$message, $name";

echo $greet("Mario"); // Stampa "Ciao, Mario"
?>
```

Non è necessario usare `use` per accedere alla variabile `$message`, perché con la sintassi `fn`, tutte le variabili dell'ambito esterno sono automaticamente catturate.

### Esempio in un contesto reale

Le arrow function sono particolarmente utili quando si lavora con funzioni di ordine superiore come `array_map()`, `array_filter()` o `usort()`. Ecco un esempio con `array_filter()`:

```php
<?php
$numbers = [1, 2, 3, 4, 5];

// Utilizzo di una arrow function come callback per array_filter()
$even_numbers = array_filter($numbers, fn($number) => $number % 2 === 0);

print_r($even_numbers); // Stampa [2, 4]
?>
```

In questo esempio, l'arrow function semplifica il codice, rendendolo più compatto rispetto all'uso di una funzione anonima tradizionale.

### Confronto tra Funzione Anonima e Arrow Function

**Funzione anonima tradizionale:**

```php
<?php
$multiply = function($a, $b) {
    return $a * $b;
};

echo $multiply(5, 3); // Stampa 15
?>
```

**Arrow function equivalente:**

```php
<?php
$multiply = fn($a, $b) => $a * $b;

echo $multiply(5, 3); // Stampa 15
?>
```

### Limiti delle Arrow Function

Le arrow function sono limitate a una **sola espressione** e non possono contenere più istruzioni o blocchi di codice complessi. Se hai bisogno di una funzione più complessa, dovrai usare la sintassi tradizionale con `function`.

```php
<?php
// Questo non è possibile con le arrow function
$complex_fn = function($a, $b) {
    $result = $a + $b;
    return $result * 2;
};
```

Le arrow function sono quindi ideali per operazioni semplici e veloci, mentre le funzioni anonime tradizionali sono più flessibili per operazioni complesse.

### Conclusione

Le arrow function con la sintassi `fn` sono un ottimo strumento per rendere il codice più conciso e leggibile, specialmente in scenari di callback o funzioni di ordine superiore. Tuttavia, per operazioni più complesse, le funzioni anonime tradizionali rimangono più versatili.