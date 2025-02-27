# 🔥 **Come leggere l'input da console in PHP con esempi**

In PHP, è possibile leggere l'input da console (terminale) usando due metodi principali:

1. **readline()**  
2. **fscanf()**

La console in PHP è un'interfaccia a riga di comando (CLI), anche chiamata **Interactive Shell**, che permette di eseguire codice direttamente senza usare il browser.

---

### ✅ Come accedere alla console PHP?

Per accedere alla console PHP, digita questo comando nel terminale:

```bash
php -a
```

A questo punto puoi scrivere qualsiasi codice PHP e premere **Invio** per eseguirlo direttamente.

---

## 🔑 Metodo 1: Usare la funzione **readline()**

La funzione `readline()` è una funzione nativa di PHP usata per leggere l'input dalla console.

### 📌 Sintassi

```php
$a = readline("Inserisci un valore: ");
echo $a;
```

### 🖥️ Output

```
Inserisci un valore: Ciao Mondo
Ciao Mondo
```

---

### ℹ️ **Nota**

Il valore restituito da `readline()` è sempre di tipo **stringa**.  
Se vuoi accettare altri tipi di dati (interi o float), devi fare il **type casting** manualmente.

---

### 📌 Esempio con Type Casting

```php
// Legge un numero intero
$a = (int)readline("Inserisci un numero intero: ");

// Legge un numero decimale
$b = (float)readline("Inserisci un numero decimale: ");

echo "Numero intero: $a\n";
echo "Numero decimale: $b\n";
```

### 🖥️ Output

```
Inserisci un numero intero: 10
Inserisci un numero decimale: 9.78
Numero intero: 10
Numero decimale: 9.78
```

---

### 🚨 Leggere più input separati da spazio

Puoi usare la funzione **explode()** insieme a `readline()` per leggere più valori in una sola volta.

### 📌 Esempio

```php
list($a, $b) = explode(" ", readline("Inserisci due numeri separati da spazio: "));
$a = (int)$a;
$b = (int)$b;

echo "La somma di $a e $b è " . ($a + $b);
```

### 🖥️ Output

```
Inserisci due numeri separati da spazio: 10 20
La somma di 10 e 20 è 30
```

---

### 📌 Leggere un Array dalla console

Puoi leggere più valori in un array usando sempre **explode()**.

### Esempio

```php
$arr = explode(" ", readline("Inserisci numeri separati da spazio: "));
print_r($arr);
```

### 🖥️ Output

```
Inserisci numeri separati da spazio: 1 2 3 4 5
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
)
```

---

---

## 🔑 Metodo 2: Usare la funzione **fscanf()**

La funzione `fscanf()` è simile alla funzione `scanf()` del linguaggio C.

### 📌 Sintassi

```php
fscanf(STDIN, "%d %d", $a, $b);
echo "La somma di $a e $b è " . ($a + $b);
```

---

### 🖥️ Output

```
1 5
La somma di 1 e 5 è 6
```

---

### Differenze tra **readline()** e **fscanf()**

| Metodo     | Type Casting | Velocità | Sintassi |
|-----------|--------------|----------|----------|
| readline() | Manuale      | Lento    | Più semplice |
| fscanf()   | Automatico   | Veloce   | Più complesso |

---

### 🔥 Quando usare uno o l'altro?

| Caso                          | Metodo consigliato |
|--------------------------------|-------------------|
| Input singolo                 | readline()        |
| Input multiplo                | fscanf()         |
| Programmi complessi e veloci   | fscanf()         |
| Lettura di array              | readline() + explode() |

---

## 🔑 Esempio finale

Leggere due numeri, calcolare la somma e stampare il risultato:

### Con readline()

```php
list($a, $b) = explode(" ", readline("Inserisci due numeri: "));
$a = (int)$a;
$b = (int)$b;

echo "La somma è: " . ($a + $b);
```

### Con fscanf()

```php
fscanf(STDIN, "%d %d", $a, $b);
echo "La somma è: " . ($a + $b);
```

---

### 🎯 Conclusione

| Metodo    | Vantaggi                  | Svantaggi          |
|----------|---------------------------|-------------------|
| readline | Semplice, ideale per script piccoli | Richiede il Type Casting |
| fscanf   | Più veloce e automatizza il type casting | Sintassi più complessa |

---

Se stai lavorando su piccoli script o hai bisogno di leggere semplici input, usa **readline()**.  
Per applicazioni più grandi o input multipli, **fscanf()** è la scelta migliore.

---

### 🔥 Bonus Tip

Vuoi leggere un intero array senza usare explode()?  
Prova questo trucco:

```php
$arr = array_map('intval', explode(' ', readline()));
print_r($arr);
```
