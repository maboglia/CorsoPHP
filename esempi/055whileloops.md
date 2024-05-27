# Ciclo While in PHP

---

#### Introduzione

Il ciclo `while` è una struttura di controllo di flusso in PHP che esegue iterazioni ripetute di un blocco di codice finché una condizione specificata è vera.

---

#### Codice di Esempio

```php
<html lang="en">
 <head>
  <title>Loops: while</title>
 </head>
 <body>
  <?php
   $count = 0;
while ($count <= 10) {
 if ($count == 5) {
  echo "FIVE, ";
 }
 else {
  echo $count . ", ";
 }
 $count++;
 //  increment by 1
}
echo "<br />";
echo "Count: {$count}";
?>
  <br />
  <br />
  <?php // On your own exercise

$count = 1;
while ($count < 20) {
 if($count % 2 == 0) {
  echo "{$count} is even<br />";
 }
 else {
  echo "{$count} is odd<br />";
 }
 $count++;
}

?>
 </body>
</html>
```

---

#### Spiegazione del Codice

1. **Esempio di Ciclo While**

```php
<?php
 $count = 0;
while ($count <= 10) {
 if ($count == 5) {
  echo "FIVE, ";
 }
 else {
  echo $count . ", ";
 }
 $count++;
 //  increment by 1
}
echo "<br />";
echo "Count: {$count}";
?>
```

- `$count = 0;`: Inizializza la variabile `$count` a 0.
- `while ($count <= 10) { ... }`: Il ciclo while continua finché la condizione `$count <= 10` è vera.
- `if ($count == 5) { ... }`: Controlla se `$count` è uguale a 5. Se vero, stampa "FIVE, " altrimenti stampa il valore di `$count`.
- `$count++;`: Incrementa la variabile `$count` di 1 ad ogni iterazione.

2. **Esercizio "On your own"**

```php
<?php
 $count = 1;
while ($count < 20) {
 if($count % 2 == 0) {
  echo "{$count} is even<br />";
 }
 else {
  echo "{$count} is odd<br />";
 }
 $count++;
}
?>
```

- Inizializza `$count` a 1 e continua fino a quando è inferiore a 20.
- Controlla se `$count` è pari o dispari e stampa il risultato di conseguenza.
- Incrementa `$count` di 1 ad ogni iterazione.

---

#### Concetti Chiave

- **Ciclo While**: Esegue ripetutamente un blocco di codice finché una condizione specificata è vera.
- **Incremento della Variabile di Controllo**: È importante aggiornare la variabile di controllo all'interno del ciclo per evitare loop infiniti.

---

#### Esempio di Output

Quando il codice viene eseguito, l'output sarà:

```
0, 1, 2, 3, 4, FIVE, 6, 7, 8, 9, 10,
Count: 11
1 is odd
2 is even
3 is odd
4 is even
5 is odd
6 is even
7 is odd
8 is even
9 is odd
10 is even
11 is odd
12 is even
13 is odd
14 is even
15 is odd
16 is even
17 is odd
18 is even
19 is odd
```

---

#### Conclusione

Il ciclo while è uno strumento potente per eseguire iterazioni ripetute di un blocco di codice finché una condizione specificata è vera. È importante comprendere la sintassi del ciclo while e l'importanza di aggiornare correttamente la variabile di controllo all'interno del ciclo.
