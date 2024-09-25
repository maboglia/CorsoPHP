# Costrutti Condizionali e Iterativi in PHP

I costrutti condizionali e iterativi in PHP consentono di controllare il flusso di esecuzione del programma, prendendo decisioni in base a condizioni logiche e ripetendo blocchi di codice. Di seguito, verranno illustrati i principali costrutti condizionali e iterativi in PHP, aggiornati per la versione PHP 8.

---

## Costrutti Condizionali

I costrutti condizionali consentono di eseguire blocchi di codice in base al risultato di una condizione logica. I principali costrutti condizionali in PHP sono `if`, `else`, `elseif`, `switch` e il nuovo costrutto `match` introdotto in PHP 8.

### `if` Statement
Il costrutto `if` consente di eseguire un blocco di codice se una condizione specificata risulta vera.

```php
if ($condizione) {
    // Esegui questo blocco se la condizione è vera
}
```

### `else` Statement
Il costrutto `else` permette di specificare un blocco di codice alternativo da eseguire quando la condizione dell'`if` risulta falsa.

```php
if ($condizione) {
    // Esegui questo blocco se la condizione è vera
} else {
    // Esegui questo blocco se la condizione è falsa
}
```

### `elseif` Statement
L'istruzione `elseif` permette di verificare ulteriori condizioni nel caso in cui la condizione precedente risulti falsa.

```php
if ($condizione1) {
    // Esegui questo blocco se condizione1 è vera
} elseif ($condizione2) {
    // Esegui questo blocco se condizione2 è vera
} else {
    // Esegui questo blocco se nessuna delle condizioni è vera
}
```

---

### `switch` Statement
Il costrutto `switch` è utile per confrontare una variabile con diversi valori e gestire i vari casi. Può essere visto come un'alternativa più leggibile rispetto a molteplici `if` e `elseif`.

```php
switch ($espressione) {
    case valore1:
        // Codice da eseguire se $espressione è uguale a valore1
        break;
    case valore2:
        // Codice da eseguire se $espressione è uguale a valore2
        break;
    default:
        // Codice da eseguire se $espressione non corrisponde a nessuno dei valori
}
```

- **Attenzione:** Senza il `break`, l'esecuzione continua nei successivi `case` finché non trova un `break` o termina lo switch.

---

### `match` Expression (PHP 8)
Il costrutto `match` è simile a `switch`, ma introduce alcune differenze significative:
- Confronta sia il valore che il tipo (usando `===`).
- Restituisce direttamente un valore e non necessita di `break`.

```php
$result = match($espressione) {
    valore1 => 'Risultato per valore1',
    valore2 => 'Risultato per valore2',
    default => 'Risultato predefinito',
};
```

- **Vantaggi di `match`:**
  - Confronto rigoroso dei tipi.
  - Sintassi più concisa e meno prone a errori rispetto a `switch`.

---

## Costrutti Iterativi

I costrutti iterativi permettono di ripetere blocchi di codice più volte, a seconda di una condizione. I principali costrutti iterativi in PHP includono `while`, `do-while`, `for` e `foreach`.

### `while` Loop
Il ciclo `while` continua a eseguire un blocco di codice finché la condizione specificata risulta vera.

```php
while ($condizione) {
    // Esegui questo blocco finché la condizione è vera
}
```

Esempio:
```php
$i = 0;
while ($i < 5) {
    echo $i;
    $i++;
}
```

### `do-while` Loop
Simile a `while`, ma esegue il blocco di codice almeno una volta, poiché la condizione viene valutata alla fine.

```php
do {
    // Codice da eseguire almeno una volta
} while ($condizione);
```

Esempio:
```php
$i = 0;
do {
    echo $i;
    $i++;
} while ($i < 5);
```

---

### `for` Loop
Il ciclo `for` è utile quando si conosce il numero di iterazioni da eseguire. La sintassi include un'inizializzazione, una condizione e un incremento.

```php
for ($inizializzazione; $condizione; $incremento) {
    // Esegui questo blocco finché la condizione è vera
}
```

Esempio:
```php
for ($i = 0; $i < 5; $i++) {
    echo $i;
}
```

---

### `foreach` Loop
Il ciclo `foreach` è specificamente progettato per iterare attraverso gli array e gli oggetti. È molto utile per gestire strutture di dati complesse.

```php
foreach ($array as $chiave => $valore) {
    // Esegui questo blocco per ogni elemento dell'array
}
```

Esempio:
```php
$array = ['a' => 1, 'b' => 2, 'c' => 3];
foreach ($array as $chiave => $valore) {
    echo "$chiave => $valore";
}
```

---

## Altri Costrutti di Controllo

### `break`
Il costrutto `break` viene utilizzato per terminare un ciclo o un'istruzione `switch`.

```php
while (true) {
    if ($condizione) {
        break; // Esce dal ciclo
    }
}
```

### `continue`
Il costrutto `continue` salta l'iterazione corrente del ciclo e passa all'iterazione successiva.

```php
for ($i = 0; $i < 10; $i++) {
    if ($i == 5) {
        continue; // Salta l'iterazione corrente
    }
    echo $i;
}
```

### `goto` (da evitare)
Il costrutto `goto` salta a una specifica etichetta definita all'interno del codice. Tuttavia, il suo utilizzo è sconsigliato, in quanto rende il codice difficile da mantenere.

```php
goto target;

echo 'Questo non verrà eseguito';

target:
echo 'Salto diretto qui';
```

---

## Conclusione

PHP 8 offre una vasta gamma di costrutti di controllo condizionali e iterativi che permettono una grande flessibilità nel controllo del flusso del programma. L'introduzione di nuove funzionalità come `match` e miglioramenti alle prestazioni dei cicli rende lo sviluppo più potente e meno incline a errori rispetto alle versioni precedenti.

---

## `return`

Il costrutto `return` in PHP viene utilizzato all'interno di una funzione o di un metodo per restituire un valore e terminare l'esecuzione della funzione. Qualsiasi codice dopo il `return` non verrà eseguito.

### Sintassi di `return`
```php
function somma($a, $b) {
    return $a + $b;
}
```

In questo esempio, la funzione `somma` ritorna la somma di `$a` e `$b`. Quando viene eseguito il `return`, la funzione termina immediatamente.

### Utilizzo di `return` Senza Valore
È possibile utilizzare `return` senza specificare un valore, il che provoca semplicemente l'uscita dalla funzione senza restituire nulla.

```php
function esci() {
    echo "Prima di uscire";
    return;
    echo "Questo non sarà mai eseguito";
}
```

### `return` nelle Funzioni con Condizioni
Quando si utilizza `return` all'interno di una condizione, come un costrutto `if`, si può evitare l'uso di `else` per ottimizzare il codice, poiché `return` termina l'esecuzione della funzione.

#### Esempio con `else` non necessario:
```php
function test($a) {
    if ($a > 10) {
        return true;
    }
    return false;
}
```

Questo esempio è più leggibile rispetto all'uso di `else`:
```php
function test($a) {
    if ($a > 10) {
        return true;
    } else {
        return false;
    }
}
```

---

## `return` in Funzioni a Più Valori

In PHP 8, puoi anche restituire più valori utilizzando array o il costrutto `list` per assegnare valori a variabili multiple.

### Restituire più valori con un array
```php
function ottieniValori() {
    return [1, 2, 3];
}

list($val1, $val2, $val3) = ottieniValori();
echo $val1; // Stampa 1
```

---

## `return` e Tipizzazione

Con PHP 7 e PHP 8, puoi specificare il tipo di valore che una funzione deve restituire utilizzando la dichiarazione del tipo di ritorno. Se la funzione non restituisce un valore compatibile con il tipo dichiarato, verrà generato un errore.

### Esempio di Tipizzazione del Ritorno
```php
function somma(int $a, int $b): int {
    return $a + $b;
}
```

In questo esempio, la funzione `somma` accetta due interi e restituisce un intero. PHP 8 verifica che il tipo di dato restituito corrisponda a quello dichiarato.

---

## Conclusione

Il costrutto `return` è fondamentale per controllare il flusso di esecuzione di una funzione, poiché permette di restituire un valore e terminare immediatamente il blocco di codice corrente.

---

## PHP8 Focus su `match`

In PHP, la funzione `match` è stata introdotta a partire dalla versione **PHP 8** come una nuova espressione simile al tradizionale costrutto `switch`, ma con alcune differenze chiave:

- **Restituisce un valore**: `match` è un'espressione, quindi restituisce direttamente un valore. A differenza di `switch`, non ha bisogno di usare `break` per evitare esecuzioni indesiderate.
- **Confronto rigoroso**: `match` usa il confronto rigoroso (`===`), il che significa che confronta sia il valore che il tipo.
- **Semplicità**: `match` è più compatto e leggibile, evitando la necessità di un blocco `break` dopo ogni caso.

### Sintassi di `match`

```php
$result = match ($variable) {
    valore1 => azione1,
    valore2 => azione2,
    valoreN => azioneN,
    default => azioneDefault,
};
```

### Differenze con `switch`
- **Nessun bisogno di `break`**: In `match`, ogni condizione esprime direttamente un valore senza la necessità di interrompere manualmente il flusso con `break`.
- **Confronto rigoroso (`===`)**: A differenza di `switch` che usa il confronto debole (`==`), `match` usa il confronto rigoroso.
- **Restituisce sempre un valore**: Essendo un'espressione, `match` deve restituire un valore in tutti i casi.

### Esempio di utilizzo di `match`

Ecco un esempio semplice per mostrare la differenza tra `switch` e `match`.

#### Con `switch`

```php
$valore = 2;
switch ($valore) {
    case 1:
        $risultato = "Uno";
        break;
    case 2:
        $risultato = "Due";
        break;
    case 3:
        $risultato = "Tre";
        break;
    default:
        $risultato = "Non trovato";
        break;
}

echo $risultato;  // Output: Due
```

#### Con `match`

```php
$valore = 2;
$risultato = match ($valore) {
    1 => "Uno",
    2 => "Due",
    3 => "Tre",
    default => "Non trovato",
};

echo $risultato;  // Output: Due
```

### Esempio con tipi di dati diversi

Poiché `match` usa il confronto rigoroso, distingue tra tipi di dati:

```php
$valore = '2';  // stringa
$risultato = match ($valore) {
    1 => "Intero 1",
    2 => "Intero 2",
    '2' => "Stringa 2",
    default => "Non trovato",
};

echo $risultato;  // Output: Stringa 2
```

### Esempio complesso con espressioni multiple

Puoi anche combinare più valori in un singolo caso di `match`:

```php
$esito = 'vittoria';

$risultato = match ($esito) {
    'vittoria', 'successo' => 'Hai vinto!',
    'sconfitta', 'fallimento' => 'Hai perso!',
    default => 'Stato sconosciuto',
};

echo $risultato;  // Output: Hai vinto!
```

### Vantaggi di `match`
- **Codice più pulito**: `match` richiede meno righe di codice rispetto a `switch` e rende la logica più leggibile.
- **Confronto rigoroso**: Elimina il comportamento ambiguo che può derivare dal confronto debole di `switch`.
- **Obbligo di coprire tutti i casi**: Se non definisci un caso `default` e nessuna delle condizioni viene soddisfatta, PHP lancerà un'eccezione, il che aiuta a evitare bug derivanti da mancate coperture di casi.


Si rimanda al [manuale php](http://www.php.net/manual/en/language.control-structures.php) per gli approfondimenti

