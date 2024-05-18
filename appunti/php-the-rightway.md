Le basi
=======

Operatori di confronto
----------------------

Gli operatori di confronto sono spesso un aspetto trascurato di PHP, il che può portare a molti risultati inaspettati. Uno di questi problemi deriva dai conforonti stretti (i confronti di valori booleani come se fossero interi).

```php
    <?php
    $a = 5;   // 5 come intero
    
    var_dump($a == 5);       // confronta il valore; restituisce vero
    var_dump($a == '5');     // confronta il valore (ignora il tipo); restituisce vero
    var_dump($a === 5);      // confronta tipo/valore (intero e intero); restituisce vero
    var_dump($a === '5');    // confronta tipo/valore (intero e intero); restituisce falso
    
    /**
     * Confronti stretti
     */
    if (strpos('testing', 'test')) {    // 'test' è trovato alla posizione 0, che è interpretato come il booleano falso
        // codice...
    }
    
    // contro
    
    if (strpos('testing', 'test') !== false) {    // vero, perché è stato fatto un confronto stretto (0 !== false)
        // codice...
    }
```

*   [Operatori di confronto](http://php.net/language.operators.comparison)
*   [Tabella di confronto tra tipi](http://php.net/types.comparisons)
*   [Prontuario del confronto](http://phpcheatsheets.com/index.php?page=compare)

Istruzioni condizionali
-----------------------

### Istruzioni if

Nell’utilizzo di istruzioni ‘if/else’ in una funzione o in una classe, si pensa spesso che ‘else’ debba essere necessariamente usato per potenziali risultati. Ma se il risultato è la restituzione di un valore, ‘else’ non è necessario, perché ‘return’ terminerà la funzione, rendendo ‘else’ inutile.
```php
    <?php
    function test($a)
    {
        if ($a) {
            return true;
        } else {
            return false;
        }
    }
    
    // contro
    
    function test($a)
    {
        if ($a) {
            return true;
        }
        return false;    // else non è necessario
    }
```

*   [Costrutti if](http://php.net/control-structures.if)

### Istruzioni switch

Le istruzioni switch sono un ottimo modo per evitare di scrivere infiniti if ed elseif, ma ci sono un paio di cose a cui prestare attenzione:

*   Le istruzioni switch confrontano solo i valori, non il tipo (equivalente a ‘==’)
*   Iterano caso dopo caso finché non viene trovata una corrispondenza. Se non viene trovata, viene eseguita quella di default (se definita)
*   Senza un ‘break’, continueranno a implementare ogni caso finché non raggiungono un break/return
*   In una funzione, l’utilizzo di ‘return’ elimina la necessità per un ‘break’, perché esso termina la funzione

```php
    <?php
    $answer = test(2);    // sia il codice del 'case 2', sia quello del 'case 3' saranno implementati
    
    function test($a)
    {
        switch ($a) {
            case 1:
                // codice...
                break;             // break viene usato per terminare l'istruzione switch
            case 2:
                // codice...         // senza un break, il confronto continua fino al caso 3
            case 3:
                // codice...
                return $result;    // in una funzione, 'return' termina la funzione
            default:
                // codice...
                return $error;
        }
    }
```

*   [Istruzioni switch](http://php.net/control-structures.switch)
*   [PHP switch](http://phpswitch.com/)

Namespace globale
-----------------

Quando usi i namespace, potresti scoprire che le funzioni native sono nascoste dalle funzioni che hai scritto. Per sistemarlo, riferisciti alla funzione globale mettendo un backslash prima del nome della funzione.

```php
    <?php
    namespace phptherightway;
    
    function fopen()
    {
        $file = \fopen();    // Il nome della nostra funzione è lo stesso di una nativa.
                             // Esegui la funzione native aggiungendo '\'.
    }
    
    function array()
    {
        $iterator = new \ArrayIterator();    // ArrayIterator è una classe nativa. Usare il suo nome senza un backslash
                                             // significa cercare di risolverla nel tuo namespace.
    }
```

*   [Spazio globale](http://php.net/language.namespaces.global)
*   [Regole globali](http://php.net/userlandnaming.rules)

Stringhe
--------

### Concatenamento

*   If your line extends beyond the recommended line length (120 characters), consider concatenating your line
*   For readability it is best to use concatenation operators over concatenating assignment operators
*   While within the original scope of the variable, indent when concatenation uses a new line
    
*   Se la tua linea eccede la lunghezza raccomandata (120 caratteri), considera il concatenamento
*   Per leggibilità è meglio usare gli operatori di concatenamento invece che gli operatori concatenanti di assegnazione
*   Se ti trovi nello scope originale della variabile, usa l’indentazione quando il concatenamento occupa una nuova linea

```php
    <?php
    $a  = 'Esempio multi-linea';    // operatore di assegnazione/concatenamento (.=)
    $a .= "\n";
    $a .= 'di cosa non fare';
    
    // vs
    
    $a = 'Esempio multi-linea'      // operatore di concatenamento (.)
        . "\n"                     // indentazione delle nuove linee
        . 'di cosa fare';
```

*   [Operatori delle stringhe](http://php.net/language.operators.string)

### Tipi di stringhe

Le stringhe sono una serie di caratteri, e fin qui il concetto è piuttosto semplice. Detto questo, ci sono tipi diversi di stringhe che hanno una sintassi e funzionalità leggermente differenti.

#### Apici singoli

Gli apici singoli vengono usati per denotare una “stringa letterale”. Le stringhe letterali non eseguono il parsing di caratteri speciali o variabili.

Se usi gli apici singoli, puoi inserire il nome di una variabile così: `'qualche $cosa'` e vedresti l’output esatto `quale $cosa`. Se usi gli apici doppi, la stringa cercherebbe di recuperare la variabile `$cosa` e visualizzerebbe degli errori in caso la variabile non venisse trovata.

```php
    <?php
    echo 'Questa è la mia stringa, guarda come è bella.';    // non serve interpretare una stringa semplice
    
    /**
     * Output:
     *
     * Questa è la mia stringa, guarda come è bella.
     */
```

*   [Apici singoli](http://php.net/language.types.string#language.types.string.syntax.single)

#### Virgolette

Le virgolette sono il coltellno svizzero delle stringhe. Non solo effettuano il parsing delle variabili come abbiamo detto sopra, ma di tutti i caratteri speciali come `\n` per la nuova linea, `\t` per la tabulazione etc.

```php
    <?php
    echo 'phptherightway è ' . $adjective . '.'     // un esempio con apici singoli che usa concatenamento multiplo per
        . "\n"                                      // variabili e caratteri di escape
        . 'Adoro imparare' . $code . '!';
    
    // contro
    
    echo "phptherightway è $adjective.\n Adoro imparare $code!"    // Invece del concatenamento multiplo, le virgolette
                                                                   // ci permettono di creare una stringa interpretata
```

Gli apici doppi possono contenere variabili; questa si chiama “interpolazione”.

```php
<?php
    $juice = 'plum';
    echo "I like $juice juice";    // Output: I like plum juice
```

Quando usi l’interpolazione, capita spesso che il nome di una variabile tocchi un altro carattere. Questo renderà impossibile distinguere il nome della variabile dal carattere letterale.

Per ovviare al problema, racchiudi la variabile in un paio di parentesi graffe.

```php
    <?php
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

#### Sintassi nowdoc

La sintassi nowdoc è stata introdotta in PHP 5.3 e internamente funziona nello stesso modo degli apici singoli, ma è adatta per creare stringhe multi-linea senza dover usare il concatenamento.

```php
    <?php
    $str = <<<'EOD'             // inizializzata da <<<
    Esempio di stringa
    che occupa più linee
    utilizzando la sintassi nowdoc.
    $a non viene interpretato.
    EOD;                        // la chiusura di 'EOD' dev'essere su una linea a parte, e senza indentazione
    
    /**
     * Output:
     *
     * Esempio di stringa
     * che occupa più linee
     * utilizzando la sintassi Nowdoc.
     * $a non viene interpretato.
     */
```

*   [Sintassi nowdoc](http://php.net/language.types.string#language.types.string.syntax.nowdoc)

#### Sintassi heredoc

La sintassi heredoc internamente funziona nello stesso modo delle virgolette, ma è adatta per la creazione di stringhe multi-linea senza la necessità di concatenamento.

```php
    <?php
    $a = 'variabili';
    
    $str = <<<EOD               // inizializzata da <<<
    Esempio di stringa
    che occupa più linee
    utilizzando la sintassi heredoc.
    Le $a sono interpretate.
    EOD;                        // la chiusura di 'EOD' dev'essere su una linea a parte, e senza indentazione
    
    /**
     * Output:
     *
     * Esempio di stringa
     * che occupa più linee
     * utilizzando la sintassi heredoc.
     * Le variabili sono interpretate.
     */
```

*   [Sintassi heredoc](http://php.net/language.types.string#language.types.string.syntax.heredoc)

### Qual è più veloce?

C’è un mito secondo cui gli apici singoli sono più veloci delle stringhe con apici doppi. Non è vero.

Se stai definendo una stringa e non cerchi di concatenare valori o eseguire altre operazioni complicate, allora gli apici singoli e doppi sono identici. Nessuno dei due è più veloce.

Se stai concatenando stringhe multiple di qualunque tipo, o interpolando valori in una stringa con apici doppi, allora i risultati possono variare. Se stai lavorando con un piccolo numero di valori, il concatenamento è di poco più veloce. Con molti valori, l’interpolazione è di poco più veloce.

Indipendentemente da ciò che fai con le stringhe, nessuno dei tipi avrà mai un impatto evidente sulla tua applicazione. Cercare di riscrivere il codice per usare l’uno o l’altro tipo è un esercizio inutile, quindi evita queste micro-ottimizzazioni a meno che tu non capisca realmente il significato e l’impatto delle differenze.

*   [Disproving the Single Quotes Performance Myth](http://nikic.github.io/2012/01/09/Disproving-the-Single-Quotes-Performance-Myth.html)

Operatore ternario
------------------

L’operatore ternario è un ottimo modo per sintetizzare il codice, ma viene spesso abusato. Anche se gli operatori ternari possono essere nidificati, è consigliato usarne uno per riga per leggibilità.

```php
    <?php
    $a = 5;
    echo ($a == 5) ? 'sì' : 'no';
```

Ecco invece un esempio che sacrifica ogni forma di leggibilità per ridurre il numero delle righe:

```php
    <?php
    echo ($a) ? ($a == 5) ? 'sì' : 'no' : ($b == 10) ? 'troppo' : ':(';    // eccessiva nidificazione, sacrifica la leggibilità
```

Per restituire un valore con gli operatori ternari usa la sintassi corretta.

```php
    <?php
    $a = 5;
    echo ($a == 5) ? return true : return false;    // questo esempio mostrerà un errore
    
    // contro
    
    $a = 5;
    return ($a == 5) ? 'sì' : 'no';    // questo esempio restituirà 'sì'
```

È importante notare che non serve usare l’operatore ternario per restituire un valore booleano. Un esempio:

```php
    <?php
    $a = 3;
    return ($a == 3) ? true : false; // Restituirà true o false a seconda della condizione $a == 3
    
    // vs
    
    $a = 3;
    return $a == 3; // Restituirà true o false a seconda della condizione $a == 3
```

Lo stesso si può dire per tutte le operazioni (===, !==, !=, == etc.)

#### Uso delle parentesi con gli operatori ternari per forma e funzione

Quando usi l’operatore ternario, le parentesi possono fare la loro parte per migliorare la leggibilità e anche per unire più condizioni in blocchi di istruzioni. Un esempio di un uso superfluo delle parentesi è:

```php
    <?php
    $a = 3;
    return ($a == 3) ? "sì" : "no"; // restituisce sì o no a seconda della condizione $a == 3
    
    // contro
    
    $a = 3;
    return $a == 3 ? "sì" : "no"; // restituisce sì o no a seconda della condizione $a == 3
```

Le parentesi permettono anche di creare unioni in un blocco di istruzioni, in modo che il blocco venga controllato come una sola condizione. Ecco un esempio in cui il blocco restituirà true se sia ($a == 3 e $b == 4) che $c == 5 sono veri.

```php
    <?php
    return ($a == 3 && $b == 4) && $c == 5;
```

Un altro esempio è la porzione qui sotto che restituirà true se ($a != 3 E $b != 4) O $C == 5.

```php
    <?php
    return ($a != 3 && $b != 4) || $c == 5;
```

*   [Operatore ternario](http://php.net/language.operators.comparison)

Dichiarazioni di variabili
--------------------------

A volte, gli sviluppatori cercano di rendere il loro codice “più pulito” dichiarando variabili predefinite con un nome differente. Ciò che questo comporta, in realtà, è un raddoppiamento del consumo di memoria dello script. Nell’esempio sottostante, presumiamo che una stringa di esempio contenga dati per 1MB. Copiando la variabile hai portato il consumo di memoria dello script a 2MB.

```php
    <?php
    $about = 'Una stringa molto lunga';    // usa 2MB di memoria
    echo $about;
    
    // contro
    
    echo 'Una stringa molto lunga';        // usa 1MB di memoria
```
