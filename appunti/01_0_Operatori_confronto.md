Le basi
=======

**Tipi di dati**

PHP è a tipizzazione debole anche perché converte automaticamente il tipo di dati contenuto nella variabile a seconda del contesto (questo è importante quando si usano gli operatori).\
Nonostante ciò, il concetto di [tipo di dato](http://it.wikipedia.org/wiki/Tipo_di_dato) esiste in PHP: ogni variabile è di un determinato tipo a seconda del valore che contiene in quel momento. Principalmente i tipi di dato sono:

|

Nome |
Descrizione |
Esempio ||

Numero intero (*int*) o a virgola mobile (*float*) |
un numero razionale o intero |
`$a = 3; $b = -12.5;` ||

Stringa (*string*) |
sequenza alfanumerica (testo); durante l'assegnazione deve essere delimitata da due virgolette (") o apici ('). |
`$a = "testo"; $b = '"I promessi sposi" è un romanzo di A. Manzoni';` ||

Booleano (*boolean*) |
può assumere solo i valori *true* (vero) o *false* (falso) |
`$a = true; $b = (3 == 5);` ||

Array |
tipo di dato complesso, verrà trattato [più avanti](http://it.wikibooks.org/wiki/PHP/Programmazione/Array) ||

Null |
indica l'assenza di un valore; serve soprattutto ad annullare una variabile |
`$a = null;` |
Di fronte a diversi tipi di dato, il motore PHP può trovarsi in diverse situazioni e si comporta in maniere differenti:

-   se si aspetta un valore *numerico intero* e viene fornito un *numero a virgola mobile* PHP tronca la parte decimale, restituendo solo la parte intera

-   se si aspetta un valore *numerico* e viene fornita una *stringa*, PHP elimina spazi e lettere di troppo utilizzando soltanto i numeri contenuti in tale stringa

-   se si aspetta un valore *numerico* e viene fornito un valore *booleano* viene restituito 1 se il valore è TRUE, 0 se il valore è FALSE

-   se si aspetta un *numero* e viene fornito un *array* restituisce un numero pari al numero di elementi contenuti dall'array

-   se si aspetta una *stringa* e viene fornito un *numero* questo viene convertito in una stringa contentente esattamente il numero stesso

-   se si aspetta un valore *stringa* e viene fornito un valore *booleano* viene restituito *1* se il valore è TRUE, una stringa vuota se è FALSE

-   se si aspetta una *stringa* e viene fornito un *array* restituisce una stringa contenente il valore *array*

-   se si aspetta un valore *booleano* e viene fornito un *numero* PHP restituisce FALSE se il numero è uguale a 0, TRUE se è il numero è diverso da 0 (di solito 1)

-   se si aspetta un valore *booleano* e viene fornita una *stringa* PHP restituisce FALSE se la stringa è vuota o contiene il valore *0*; restituisce TRUE negli altri casi

-   se si aspetta un valore *booleano* e viene fornita un *array* PHP restituisce FALSE se l'array è vuoto , TRUE negli altri casi

-   il valore *null* viene trattato come un valore booleano FALSE

Esistono tuttavia numerose funzioni di conversione per trasformare un tipo di dato in un altro, che consistono nell'anteporre all'espressione in questione il nome del tipo di dato che si vuole ottenere tra parentesi. Ad esempio:

(int)(3.45 + 7.3)

restituisce *10*, in quanto viene convertito un numero *float* in un intero secondo le regole di conversione. Allo stesso modo

(boolean)("questa è un'espressione stringa")

restituisce TRUE

### **- Calcolo multibase**

Oltre al sistema decimale, PHP può lavorare con i sistemi di numerazione in base [otto](http://it.wikipedia.org/wiki/Sistema_numerico_ottale) e [sedici](http://it.wikipedia.org/wiki/Sistema_numerico_esadecimale). Per inizializzare una variabile in base otto, il numero deve iniziare con uno `0` (es `01247`); i numeri in base sedici devono invece iniziare con `0x` (es `0xf56b`).

### **- Stringhe**

Meritano particolare attenzione le stringhe, soprattutto nell'analisi dei caratteri di commutazioni.\
Una stringa in PHP deve essere delimitata da apici o da apici doppi; bisogna tuttavia chiudere una stringa con la stessa modalità con cui si è aperta:

"Questa non è una stringa valida'
'Questa lo è'

Può essere necessario in alcuni casi usare carattere particolari; ad esempio può essere necessario inserire un apice in una stringa delimitata da apici singoli. In questo caso si usano i **caratteri di commutazione** (o **sequenze di escape**). I principali sono:

|

\' |
Singolo apice (necessario solo se la stringa è racchiusa da apici singoli) ||

\" |
Doppio apice (necessario solo se la stringa è racchiusa da apici doppi) || |
Backslash ||

\n |
New line (ritorno a capo) ||

\r |
Ritorno del carrello ||

\t |
Tabulazione orizzontale ||

\v |
Tabulazione verticale (disponibile nelle versioni di PHP superiori alla 5.2.5) ||

\f |
form feed (disponibile nelle versioni di PHP superiori alla 5.2.5) ||

\$ |
Segno del dollaro ||

\x00 - \xFF |
Carattere esadecimale |
**Nota**: nel caso di stringhe racchiuse da apici singoli l'unica sequenza di escape ammessa è la prima (\')


## Gli operatori principali sono:

-   **matematici** (restituiscono e richiedono valori numerici)

    -   + somma algebrica

    -   - sottrazione o negazione del numero

    -   * Moltiplicazione

    -   / divisione

    -   % modulo (resto della divisione intera)

-   **stringa** (restituiscono una stringa)

    -   . (punto) concatena due stringhe

Gli operatori visti finora hanno inoltre una sintassi particolare nel caso di espressioni come ad esempio

$a = $a + 3;
$b = $b.' stringa';

Queste espressioni, infatti, nelle quali compare la stessa variabile ambo sia a destra che a sinistra dell'uguale, possono essere riassunte in

$a += 3;
$b .= ' stringa';

-   booleani o di **confronto** (restituiscono un valore boolean)

    -   === identicamente uguale (anche del medesimo tipo)

    -   == uguale a

    -   != diverso da

    -   > maggiore di

    -   < minore di

    -   => maggiore o uguale a

    -   <= minore o uguale a

-   **logici** (restituiscono e operano su boolean)

    -   ! corrisponde alla negazione logica ed è un operatore unario (necessita di un solo operando). Restituisce false se l'operando è true, true se viceversa.

    -   and o && corrisponde alla congiunzione logica (et). Restituisce true solo se entrambi gli operandi sono veri.

    -   or o || corrisponde disgiunzione inclusiva logica (vel). Restituisce true anche se uno sole degli operandi è vero.

    -   xor corrisponde alla disgiunzione esclusiva logica (out). Restituisce true solo se uno dei due valori è true e l'altro è false;

-   due operatori molto importanti e comodi in PHP sono gli operatori chiamati di **incremento** e di **decremento** ++ e --, che restituiscono un valore numerico e aumentano o diminuiscono il valore della variabile di una unità. È più facile capire il loro funzionamento con un esempio:

$v1 = $v2++; //assegna a $v1 il valore di $v2 e *poi* incrementa $v2 di 1
$v1 = $v2-- //assegna a $v1 il valore di $v2 e *poi* decrementa $v2 di 1
$v1 = ++$v2; //incrementa $v2 di 1 e *poi* assegna a $v1 il valore di $v2
$v1 = --$v2 //decrementa $v2 di 1 e *poi* assegna a $v1 il valore di $v2

-   un altro operatore molto comodo in PHP è l'**operatore ternario** ? : la cui sintassi è

condizione ? espr1 : espr2

Quando il motore PHP legge questo operatore valuta il valore di *condizione*: se è vera, restituisce il valore *espr1*, altrimenti il valore *espr2*. Un esempio potrebbe rendere più chiaro il tutto:

$var = ($a > $b ? 'a maggiore di b' : 'a minore di b');

Il valore di $var sarà quindi dipendente dal valore booleano dell'espressione `a > $b`

L'operatore ternario può essere usato anche per determinare il valore di un parametro da passare ad una funzione.

Ad esempio:

function prova( $valore ) {
   echo $valore;
}

prova( true  ? "prova 1 " : "prova 2" );
prova( false ? "prova 1 " : "prova 2" );

Il codice sopra riportato darà come output:

prova 1 prova 2


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

*   [Operatori](http://www.php.net/manual/en/language.operators.php)
*   [Operatori di confronto](http://php.net/language.operators.comparison)
*   [Tabella di confronto tra tipi](http://php.net/types.comparisons)
*   [Prontuario del confronto](http://phpcheatsheets.com/index.php?page=compare)