Le basi
=======

Operatori di confronto
----------------------

Gli operatori di confronto sono spesso un aspetto trascurato di PHP, il che può portare a molti risultati inaspettati. Uno di questi problemi deriva dai conforonti stretti (i confronti di valori booleani come se fossero interi).

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

*   [Operatori di confronto](http://php.net/language.operators.comparison)
*   [Tabella di confronto tra tipi](http://php.net/types.comparisons)
*   [Prontuario del confronto](http://phpcheatsheets.com/index.php?page=compare)






### Qual è più veloce?

C’è un mito secondo cui gli apici singoli sono più veloci delle stringhe con apici doppi. Non è vero.

Se stai definendo una stringa e non cerchi di concatenare valori o eseguire altre operazioni complicate, allora gli apici singoli e doppi sono identici. Nessuno dei due è più veloce.

Se stai concatenando stringhe multiple di qualunque tipo, o interpolando valori in una stringa con apici doppi, allora i risultati possono variare. Se stai lavorando con un piccolo numero di valori, il concatenamento è di poco più veloce. Con molti valori, l’interpolazione è di poco più veloce.

Indipendentemente da ciò che fai con le stringhe, nessuno dei tipi avrà mai un impatto evidente sulla tua applicazione. Cercare di riscrivere il codice per usare l’uno o l’altro tipo è un esercizio inutile, quindi evita queste micro-ottimizzazioni a meno che tu non capisca realmente il significato e l’impatto delle differenze.

*   [Disproving the Single Quotes Performance Myth](http://nikic.github.io/2012/01/09/Disproving-the-Single-Quotes-Performance-Myth.html)

Operatore ternario
------------------

L’operatore ternario è un ottimo modo per sintetizzare il codice, ma viene spesso abusato. Anche se gli operatori ternari possono essere nidificati, è consigliato usarne uno per riga per leggibilità.

    <?php
    $a = 5;
    echo ($a == 5) ? 'sì' : 'no';

Ecco invece un esempio che sacrifica ogni forma di leggibilità per ridurre il numero delle righe:

    <?php
    echo ($a) ? ($a == 5) ? 'sì' : 'no' : ($b == 10) ? 'troppo' : ':(';    // eccessiva nidificazione, sacrifica la leggibilità

Per restituire un valore con gli operatori ternari usa la sintassi corretta.

    <?php
    $a = 5;
    echo ($a == 5) ? return true : return false;    // questo esempio mostrerà un errore
    
    // contro
    
    $a = 5;
    return ($a == 5) ? 'sì' : 'no';    // questo esempio restituirà 'sì'

È importante notare che non serve usare l’operatore ternario per restituire un valore booleano. Un esempio:

    <?php
    $a = 3;
    return ($a == 3) ? true : false; // Restituirà true o false a seconda della condizione $a == 3
    
    // vs
    
    $a = 3;
    return $a == 3; // Restituirà true o false a seconda della condizione $a == 3

Lo stesso si può dire per tutte le operazioni (===, !==, !=, == etc.)

#### Uso delle parentesi con gli operatori ternari per forma e funzione

Quando usi l’operatore ternario, le parentesi possono fare la loro parte per migliorare la leggibilità e anche per unire più condizioni in blocchi di istruzioni. Un esempio di un uso superfluo delle parentesi è:

    <?php
    $a = 3;
    return ($a == 3) ? "sì" : "no"; // restituisce sì o no a seconda della condizione $a == 3
    
    // contro
    
    $a = 3;
    return $a == 3 ? "sì" : "no"; // restituisce sì o no a seconda della condizione $a == 3

Le parentesi permettono anche di creare unioni in un blocco di istruzioni, in modo che il blocco venga controllato come una sola condizione. Ecco un esempio in cui il blocco restituirà true se sia ($a == 3 e $b == 4) che $c == 5 sono veri.

    <?php
    return ($a == 3 && $b == 4) && $c == 5;

Un altro esempio è la porzione qui sotto che restituirà true se ($a != 3 E $b != 4) O $C == 5.

    <?php
    return ($a != 3 && $b != 4) || $c == 5;

*   [Operatore ternario](http://php.net/language.operators.comparison)

Dichiarazioni di variabili
--------------------------

A volte, gli sviluppatori cercano di rendere il loro codice “più pulito” dichiarando variabili predefinite con un nome differente. Ciò che questo comporta, in realtà, è un raddoppiamento del consumo di memoria dello script. Nell’esempio sottostante, presumiamo che una stringa di esempio contenga dati per 1MB. Copiando la variabile hai portato il consumo di memoria dello script a 2MB.

    <?php
    $about = 'Una stringa molto lunga';    // usa 2MB di memoria
    echo $about;
    
    // contro
    
    echo 'Una stringa molto lunga';        // usa 1MB di memoria

*   [Consigli sulle prestazioni](http://web.archive.org/web/20140625191431/https://developers.google.com/speed/articles/optimizing-php)

[Return to Main Page](http://it.phptherightway.com/)

[![Creative Commons License](Le%20basi%20-%20PHP:%20La%20Retta%20Via_files/88x31.png)](http://creativecommons.org/licenses/by-nc-sa/3.0/)  
PHP: The Right Way di [Josh Lockhart](http://www.twitter.com/codeguy) è rilasciato sotto una licenza [Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License](http://creativecommons.org/licenses/by-nc-sa/3.0/).  
Basato su un lavoro a [www.phptherightway.com](http://www.phptherightway.com/).