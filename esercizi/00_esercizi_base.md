
### Esercizio 1: Hello World

<details>
<summary>
Scrivi uno script PHP che stampa "Hello, World!" sullo schermo.
</summary>

```php
<?php
echo "Hello, World!";
?>
```

</details>

### Esercizio 2: Variabili e Operazioni Aritmetiche

<details>
<summary>
Crea uno script PHP che dichiara due variabili numeriche e stampa la somma, la differenza, il prodotto e il quoziente.
</summary>

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

</details>

### Esercizio 3: Condizioni

<details>
<summary>
Scrivi uno script PHP che controlla se una variabile numerica è positiva, negativa o zero e stampa un messaggio appropriato.
</summary>

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

</details>

### Esercizio 4: Ciclo For

<details>
<summary>
Crea uno script PHP che utilizza un ciclo for per stampare i numeri da 1 a 10.
</summary>

```php
<?php
for ($i = 1; $i <= 10; $i++) {
    echo $i . "\n";
}
?>
```

</details>

### Esercizio 5: Ciclo While

<details>
<summary>
Scrivi uno script PHP che utilizza un ciclo while per stampare i numeri da 1 a 10.
</summary>

```php
<?php
$i = 1;
while ($i <= 10) {
    echo $i . "\n";
    $i++;
}
?>
```

</details>

### Esercizio 6: Funzioni

<details>
<summary>
Crea una funzione PHP che accetta due numeri come parametri e restituisce il loro prodotto. Chiama questa funzione e stampa il risultato.
</summary>

```php
<?php
function prodotto($a, $b) {
    return $a * $b;
}

echo "Il prodotto di 4 e 5 è: " . prodotto(4, 5);
?>
```

</details>

### Esercizio 7: Array

<details>
<summary>
Crea un array con almeno 5 elementi e stampa ciascun elemento utilizzando un ciclo foreach.
</summary>

```php
<?php
$array = array(1, 2, 3, 4, 5);

foreach ($array as $valore) {
    echo $valore . "\n";
}
?>
```

</details>

### Esercizio 8: Array Associativi

<details>
<summary>
Crea un array associativo che contiene i nomi e le età di almeno 3 persone. Stampa ciascun nome e età utilizzando un ciclo foreach.</summary>


```php
<?php
$persone = array("Alice" => 25, "Bob" => 30, "Charlie" => 35);

foreach ($persone as $nome => $eta) {
    echo "Nome: $nome, Età: $eta\n";
}
?>
```

</details>

### Esercizio 9: Stringhe

<details>
<summary>
Scrivi uno script PHP che dichiara una stringa e stampa il numero di caratteri in essa contenuti.
</summary>

```php
<?php
$testo = "Ciao, mondo!";
echo "La lunghezza della stringa è: " . strlen($testo);
?>
```

</details>

### Esercizio 10: Gestione dei Moduli

<details>
<summary>
Crea un semplice modulo HTML con un campo di testo e un pulsante di invio. Scrivi uno script PHP che recupera il valore del campo di </summary>
testo e lo stampa sullo schermo.

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

</details>

---

# Uso di Espressioni, Variabili, Math e Input dall’utente

---

## Esercizio NomeCognome

Scrivere un programma NomeCognome che scrive il vostro nome e il vostro cognome uno
sotto l’altro.
 
---

## Esercizio RadiceQuadrata

Scrivere un programma `RadiceQuadrata` che chiede all’utente di insere un numero intero e ne stampa la radice quadrata (numero frazionario).

---

## Esercizio PerimetroRettangolo

Scrivere un programma PerimetroRettangolo che calcola il perimetro di un rettangolo di base e altezza inserite dall'utente.

---

## Esercizio AreaCerchio

Scrivere un programma AreaCerchio che chiede all’utente di inserire la lunghezza del raggio di un cerchio e ne calcola l’area. 
ATTENZIONE: memorizzare il valore di pi-greco in una costante.

---

## Esercizio Divisione

Scrivere un programma Divisione che chiede all’utente due numeri interi e stampa prima il quoziente della loro divisione intera e poi il resto.

---

## Esercizio SommaProdotto

Scrivere un programma SommaProdotto che chiede all’utente di inserire due valori interi e ne calcola la somma e il prodotto.

---

## Esercizio SommaDiQuattro

Scrivere un programma SommaDiQuattro che chiede all’utente di inserire quattro valori interi, e ne stampa la somma. 
ATTENZIONE: il programma deve utilizzare in tutto solo 2 variabili!

---

## Esercizio SommaApprossimata

Scrivere un programma SommaApprossimata che chiede all’utente di inserire due numeri
con la virgola, li somma e poi stampa il risultato come numero intero.

---

## Esercizio OreInMinuti

Scrivere un programma OreInMinuti che chiede all’utente di inserire un numero frazionario che rappresenta un tempo espresso in ore (ad esempio 3.5 per 3 ore e mezzo) e stampa il corrispondente tempo espresso in minuti (ad esempio 210). 
Il risultato stampato deve essere un numero intero (ossia, NON deve essere 210.0).

---

## Esercizio MinutiInOre

Scrivere un programma MinutiInOre che chiede all’utente di inserire un numero intero che rappresenta un tempo espresso in minuti (ad esempio 210) e stampa il corrispondente tempo espresso in ore e minuti (ad esempio 3 ore e 30 minuti). 
Il risultato stampato deve essere un numero intero (ossia, NON deve essere 3.0 ore e 30.0 minuti).

