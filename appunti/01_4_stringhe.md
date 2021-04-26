# Stringhe


## Tipi di stringhe

Le stringhe sono una serie di caratteri, e fin qui il concetto è piuttosto semplice. Detto questo, ci sono tipi diversi di stringhe che hanno una sintassi e funzionalità leggermente differenti.

### Apici singoli

Gli apici singoli vengono usati per denotare una “stringa letterale”. Le stringhe letterali non eseguono il parsing di caratteri speciali o variabili.

Se usi gli apici singoli, puoi inserire il nome di una variabile così: `'qualche $cosa'` e vedresti l’output esatto `quale $cosa`. Se usi gli apici doppi, la stringa cercherebbe di recuperare la variabile `$cosa` e visualizzerebbe degli errori in caso la variabile non venisse trovata.

```php
    echo 'Questa è la mia stringa, guarda come è bella.';    // non serve interpretare una stringa semplice
    
    /**
     * Output:
     *
     * Questa è la mia stringa, guarda come è bella.
     */
```
*   [Apici singoli](http://php.net/language.types.string#language.types.string.syntax.single)

---

### Virgolette

Le virgolette sono il coltellno svizzero delle stringhe. Non solo effettuano il parsing delle variabili come abbiamo detto sopra, ma di tutti i caratteri speciali come `\n` per la nuova linea, `\t` per la tabulazione etc.

```php
    echo 'phptherightway è ' . $adjective . '.'  
    // un esempio con apici singoli che usa concatenamento multiplo per
        . "\n"                                      
        // variabili e caratteri di escape
        . 'Adoro imparare' . $code . '!';
        // contro
        echo "phptherightway è $adjective.\n Adoro imparare $code!"    
    
    // Invece del concatenamento multiplo, le virgolette
    // ci permettono di creare una stringa interpretata
```

---

## interpolazione

Gli apici doppi possono contenere variabili; questa si chiama **interpolazione**.

```php
    $juice = 'plum';
    echo "I like $juice juice";    // Output: I like plum juice
```

---

Quando usi l’interpolazione, capita spesso che il nome di una variabile tocchi un altro carattere. Questo renderà impossibile distinguere il nome della variabile dal carattere letterale.

---

## uso delle parentesi graffe

Per ovviare al problema, racchiudi la variabile in un paio di parentesi graffe.

```php
    $juice = 'prugn';
    echo "Ho bevuto del succo fatto con le $juicee";    // $juice non può essere interpetato
    
    // contro
    
    $juice = 'prugn';
    echo "Ho bevuto del succo fatto con le {$juice}e";    // $juice verrà interpretato
    
    /**
     * Anche le variabili complesse possono essere racchiuse tra parentesi graffe
     */
    
    $juice = array('mel', 'banan', 'prugn');
    echo "Ho bevuto del succo fatto con le {$juice[1]}e";   // $juice[1] verrà interpretato
```

*   [Virgolette](http://php.net/language.types.string#language.types.string.syntax.double)

---

### Qual è più veloce?

C’è un mito secondo cui gli apici singoli sono più veloci delle stringhe con apici doppi. Non è vero.

Se stai definendo una stringa e non cerchi di concatenare valori o eseguire altre operazioni complicate, allora gli apici singoli e doppi sono identici. Nessuno dei due è più veloce.

Se stai concatenando stringhe multiple di qualunque tipo, o interpolando valori in una stringa con apici doppi, allora i risultati possono variare. Se stai lavorando con un piccolo numero di valori, il concatenamento è di poco più veloce. Con molti valori, l’interpolazione è di poco più veloce.

Indipendentemente da ciò che fai con le stringhe, nessuno dei tipi avrà mai un impatto evidente sulla tua applicazione. Cercare di riscrivere il codice per usare l’uno o l’altro tipo è un esercizio inutile, quindi evita queste micro-ottimizzazioni a meno che tu non capisca realmente il significato e l’impatto delle differenze.

*   [Disproving the Single Quotes Performance Myth](http://nikic.github.io/2012/01/09/Disproving-the-Single-Quotes-Performance-Myth.html)

---

## Concatenamento


*   Se la tua linea eccede la lunghezza raccomandata (120 caratteri), considera il concatenamento
*   Per leggibilità è meglio usare gli operatori di concatenamento invece che gli operatori concatenanti di assegnazione
*   Se ti trovi nello scope originale della variabile, usa l’indentazione quando il concatenamento occupa una nuova linea

```php
$a  = 'Esempio multi-linea';    // operatore di assegnazione/concatenamento (.=)
$a .= "\n";
$a .= 'di cosa non fare';

// vs

$a = 'Esempio multi-linea'      // operatore di concatenamento (.)
    . "\n"                     // indentazione delle nuove linee
    . 'di cosa fare';
```

*   [Operatori delle stringhe](http://php.net/language.operators.string)

---
