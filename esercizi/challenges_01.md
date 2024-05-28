

### Esercizio 1: Hello World

Scrivi uno script PHP che stampa "Hello, World!" sullo schermo.

```php
<?php
echo "Hello, World!";
?>
```

### Esercizio 2: Variabili e Operazioni Aritmetiche

Crea uno script PHP che dichiara due variabili numeriche e stampa la somma, la differenza, il prodotto e il quoziente.

```php
<?php
$a = 10;
$b = 5;

echo "Somma: " . ($a + $b) . "\n";
echo "Differenza: " . ($a - $b) . "\n";
echo "Prodotto: " . ($a * $b) . "\n";
echo "Quoziente: " . ($a / $b) . "\n";
?>
```

### Esercizio 3: Condizioni

Scrivi uno script PHP che controlla se una variabile numerica è positiva, negativa o zero e stampa un messaggio appropriato.

```php
<?php
$num = -2;

if ($num > 0) {
    echo "Il numero è positivo.";
} elseif ($num < 0) {
    echo "Il numero è negativo.";
} else {
    echo "Il numero è zero.";
}
?>
```

### Esercizio 4: Ciclo For

Crea uno script PHP che utilizza un ciclo for per stampare i numeri da 1 a 10.

```php
<?php
for ($i = 1; $i <= 10; $i++) {
    echo $i . "\n";
}
?>
```

### Esercizio 5: Ciclo While

Scrivi uno script PHP che utilizza un ciclo while per stampare i numeri da 1 a 10.

```php
<?php
$i = 1;
while ($i <= 10) {
    echo $i . "\n";
    $i++;
}
?>
```

### Esercizio 6: Funzioni

Crea una funzione PHP che accetta due numeri come parametri e restituisce il loro prodotto. Chiama questa funzione e stampa il risultato.

```php
<?php
function prodotto($a, $b) {
    return $a * $b;
}

echo "Il prodotto di 4 e 5 è: " . prodotto(4, 5);
?>
```

### Esercizio 7: Array

Crea un array con almeno 5 elementi e stampa ciascun elemento utilizzando un ciclo foreach.

```php
<?php
$array = array(1, 2, 3, 4, 5);

foreach ($array as $valore) {
    echo $valore . "\n";
}
?>
```

### Esercizio 8: Array Associativi

Crea un array associativo che contiene i nomi e le età di almeno 3 persone. Stampa ciascun nome e età utilizzando un ciclo foreach.

```php
<?php
$persone = array("Alice" => 25, "Bob" => 30, "Charlie" => 35);

foreach ($persone as $nome => $eta) {
    echo "Nome: $nome, Età: $eta\n";
}
?>
```

### Esercizio 9: Stringhe

Scrivi uno script PHP che dichiara una stringa e stampa il numero di caratteri in essa contenuti.

```php
<?php
$testo = "Ciao, mondo!";
echo "La lunghezza della stringa è: " . strlen($testo);
?>
```

### Esercizio 10: Gestione dei Moduli

Crea un semplice modulo HTML con un campo di testo e un pulsante di invio. Scrivi uno script PHP che recupera il valore del campo di testo e lo stampa sullo schermo.

HTML:

```html
<form action="esercizio10.php" method="post">
    Nome: <input type="text" name="nome">
    <input type="submit">
</form>
```

PHP (`esercizio10.php`):

```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    echo "Ciao, " . $nome . "!";
}
?>
```

Questi esercizi coprono concetti base di PHP come output, variabili, condizioni, cicli, funzioni, array, stringhe e gestione dei moduli. Sono un buon punto di partenza per chi vuole imparare PHP.

---

# PHP challenges



* Controlla se un dato intero positivo è una potenza di due
* Controlla se un dato intero positivo è una potenza di tre
* Controlla se un dato intero positivo è una potenza di quattro
* Controlla se un intero è la potenza di un altro intero
* Trova uno o più numeri mancanti da un array
* Crea un modulo html e accetta il nome utente e visualizza il nome
* Script di rilevamento del browser PHP
* Ottieni il nome del file corrente
* Restituisci alcuni componenti di un URL
* Cambia il colore del primo carattere di una parola
* Controlla se la pagina viene chiamata da 'https' o 'http'
* Reindirizza un utente a una pagina diversa
* Convalida e-mail
* Visualizza stringa, valori all'interno di una tabella
* Visualizza il codice sorgente di una pagina web
* Ottieni le ultime informazioni modificate di un file
* Conta il numero di righe in un file