# PHP


## Funzioni per array

### array_chunk()
array array_chunk ( array input, int dimensione [, bool mantieni_chiavi] )

<?php
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 2));
print_r(array_chunk($input_array, 2, true));
?>

### array_count_values()
array array_count_values ( array input )
array_count_values() restituisce un array che ha i valori dell'array input per chiavi e la loro
frequenza in input come valori.

<?php
$array = array(1, "hello", 1, "world", "hello");
print_r(array_count_values($array));
?>

### array array ( [mixed ...] )
Restituisce un array contenente i parametri. Ai parametri si può dare un indice con l'operatore =>.
Leggere la sezione relativa ai tipi per ulteriori informazioni sugli array.
<?php
$array = array(1, 1, 1, 1, 1, 8 => 1, 4 => 1, 19, 3 => 13);
print_r($array);
?>

### esempio
<?php
$primotrimestre = array(1 => 'Gennaio', 'Febbraio', 'Marzo');
print_r($primotrimestre);
?>


### bool asort ( array array [, int sort_flags] )
Questa funzione ordina un array in modo tale che i suoi indici mantengano la loro correlazione con
gli elementi ai quali sono associati. Viene usata principalmente nell'ordinamento degli array
associativi, quando la disposizione originaria degli elementi è importante.

### bool arsort ( array array [, int sort_flags] )
Ordina un array in ordine decrescente e mantiene le associazioni degli indici

### int count ( mixed var [, int mode] )
Restituisce il numero di elementi in var, la quale è di norma un array, dal momento che qualsiasi
altro oggetto avrà un elemento.

### array each ( array array )
Restituisce la corrente coppia chiave/valore corrente di array e incrementa il puntatore interno
dell'array. Questa coppia è restituita in un array di quattro elementi, con le chiavi 0, 1, key, and
value. Gli elementi 0 e key contengono il nome della chiave dell'elemento dell'array, mentre 1 e
value contengono i dati.
<?php
$foo = array("bob", "fred", "jussi", "jouni", "egon", "bau");
$bar = each($foo);
print_r($bar);
?>

Array ([1] => bob [value] => bob
[0] => 0 [key] => 0)
### Attraversamento di un array con each()
<?php
$frutta = array('a' => 'mela', 'b' => 'pera', 'c' => 'banana');
reset($frutta);
while (list($chiave, $valore) = each($frutta)) {
echo "$chiave => $valore\n";
}
?>

### mixed current ( array array )
Restituisce l'elemento corrente di un array
Ogni array ha un puntatore interno all'elemento "corrente", che è inizializzato al primo elemento
inserito nell'array. La funzione current() restituisce il valore dell'elemento che è attualmente
puntato dal puntatore interno. In ogni caso non muove il puntatore. Se il puntatore interno punta
oltre la fine della lista di elementi, current() restituisce FALSE.

### mixed reset ( array array )
reset() riporta il puntatore di array sul primo elemento e ne restituisce il valore.

### mixed next ( array array )
Restituisce l'elemento dell'array che sta nella posizione successiva a quella attuale indicata dal
puntatore interno, oppure FALSE se non ci sono altri elementi.

### mixed prev ( array array )
Restituisce l'elemento dell'array che sta nella posizione precedente a quella attuale indicata dal
puntatore interno, oppure FALSE se non ci sono altri elementi.

### mixed end ( array array )
end() fa avanzare il puntatore di array all'ultimo elemento, e restituisce il suo valore.


### 
bool in_array ( mixed ago, array pagliaio [, bool strict] )
Cerca in pagliaio per trovare ago e restituisce TRUE se viene trovato nell'array, FALSE altrimenti.
```php
<?php
$os = array("MacOs", "Windows", "Android", "Linux");
if (in_array("Android", $os))
echo "Trovato Android";
if (in_array("macos", $os))
echo "Trovato macos";
?>
```

**NB: La seconda condizione fallisce perché in_array() è case sensitive**

## FUNZIONI DI DATA E ORA

### string date ( string formato [, int timestamp] )

Restituisce una stringa formattata in accordo con il formato della stringa usato nell' intero
timestamp o nell'attuale orario locale se timestamp non è assegnato.

I seguenti caratteri sono utilizzati nella stringa formato:
    a - "am" o "pm"
    A - "AM" o "PM"
    d - giorno del mese, 2 cifre senza tralasciare gli zero; i.e. "01" a "31"
    D - giorno della settimana, testuale, 3 lettere; i.e. "Fri"
    F - mese, testuale, long; i.e. "January"
    g - ora, formato a 12-ore senza eventuali zero; i.e. "1" a "12"
    G - ora, formato a 24-ore senza eventuali zero; i.e. "0" a "23"
    h - ora, formato a 12-ore; i.e. "01" a "12"
    H - ora, formato a 24-ore; i.e. "00" a "23"
    i - minuti; i.e. "00" a "59"
    I (i grande) - "1" se c'è l'ora legale, "0" altrimenti.
    j - giorno del mese senza eventuali zero; i.e. "1" a "31"
    l ('L' piccola) - giorno della settimana, testuale, long; i.e. "Friday"
    L - valore booleano per stabilire se è un anno bisestile; i.e. "0" o "1"
    m - mese; i.e. "01" a "12"
    M - mese, testuale, 3 lettere; i.e. "Jan"
    n - mese senza eventuali zero; i.e. "1" a "12"
    s - secondi; i.e. "00" a "59"
    t - numero di giorni del mese dato; i.e. "28" a "31"
    w - giorno della settimana, numerico, i.e. "0" (Domenica) a "6" (Sabato)
    Y - anno, 4 cifre; i.e. "1999"
    y - anno, 2 cifre; i.e. "99"
    z - giorno dell'anno; i.e. "0" a "365"
    /* Today

```php
$today = is March 10th, 2017, 5:16:18 pm */
$today = date("F j, Y, g:i a");
$today = date("m.d.y");
$today = date("j, n, Y");
$today = date("Ymd");
$today = date('h-i-s, j-m-y, it is w Day z ');
$today = date('\i\t \i\s \t\h\e jS \d\a\y.');
$today = date("D M j G:i:s T Y");
$today = date('H:m:s \m \i\s\ \m\o\n\t\h');
$today = date("H:i:s");


//Marzo 10, 2017, 5:16 pm
//03.10.01
//10, 3, 2017
//20170310
//05-16-17, 10-03-01, 1631 1618 6 Fripm01
//It is the 10th day.
//Sab Mar 10 15:16:08 MST 2017
//17:03:17 m is month
//17:16:17
```

### string setlocale ( mixed category, array locale )

```php
<?php
/* Impostazioni locali in italiano */
setlocale(LC_ALL, 'it');
/* Visualizza: venerdì 22 dicembre 1978 */


echo strftime("%A %d %B %Y", mktime(0, 0, 0, 12, 22, 1978)); 

?>

```


### int mktime ( int hour, int minute, int second, int month, int day, int year [, int is_dst])

Restituisce la UNIX timestamp per una data

### string strftime ( string format [, int timestamp] )
Le seguenti sequenze di caratteri sono utilizzate nella stringa del formato:
    %a - Nome del giorno della settimana abbreviato in accordo con i parametri locali lun
    %A - Nome completo del giorno della settimana in accordo con i parametri locali lunedì
    %b - Nome del mese abbreviato in accordo con i parametri locali giu
    %B - Nome completo del mese in accordo con i parametri locali giugno
    %c - Rappresentazione preferita di data e orario per le attuali impostazioni locali 19/06/2006
    11.16.32 (tutto continuato con uno spazio in mezzo, dannata formattazione Word)
    %d - giorno del mese come numero decimale (intervallo tra 01 e 31) 19
    %H - ora come numero decimale usando il sistema a 24 ore (intervallo tra 00 e 23) 11
    %I - ora come numero decimale usando il sistema a 12 ore (intervallo tra 01 e 12) 11
    %j - giorno dell'anno come numero decimale (intervallo tra 001 e 366) 170
    %m - mese come numero decimale (intervallo tra 01 e 12) 06
    %M - minuto come numero decimale 16
    %n - carattere di nuova linea ‘accapo’
    %S - secondi come numero decimale 32
    %U - numero della settimana dell'anno in corso come numero decimale, iniziando dalla
    prima Domenica come primo giorno della prima settimana 25
    %W - numero della settimana dell'attuale anno come numero decimale, partendo con il
    primo Lunedì come primo giorno della prima settimana 25
    %w - giorno della settimana come decimale, dove la Domenica è 0 1
    %x - visualizzazione della data preferita dalle impostazioni del sistema locale senza orario
    19/06/2006
    %X - visualizzazione dell'orario preferito dalle impostazioni del sistema locale senza data
    11.16.32
    %y - anno come numero decimale senza secolo (intervallo tra 00 e 99) 06
    %Y - anno come numero decimale incluso il secolo 2006
    %Z - fuso orario o abbreviazione ora solare Europa occidentale
    %% - il carattere `%' %

Per avere il giorno della settimana come decimale, dove Lunedì = 0 e Domenica = 6 si può usare la
seguente espressione (strftime ("%w") + 6) % 7

Questo numero è utilizzabile anche come indice di un array di nomi di giorni ove, per esempio
Array ([0] => Lunedì, [1] => Martedì, … [6] = Domenica)


## FUNZIONI PER LA GESTIONE DI FILE E DEL FILESYSTEM

resource fopen ( string filename, string mode [, bool use_include_path [, resource zcontext]] )
La funzione fopen() apre un collegamneto tra una risorsa, indicata dal parametro filename, ed un
flusso.

### bool fclose ( resource handle )
Chiude il file puntato da handle.

### bool feof ( resource handle )
Restituisce TRUE se il puntatore al file ha raggiunto la fine del file (EOF) o si è verificato un errore
(anche in caso di timeout del socket); altrimenti restituisce FALSE.

### string fgetc ( resource handle )
Restituisce una stringa contenente un singolo carattere letto dal file puntato da handle. Restituisce
FALSE alla fine del file (EOF).

### string fgets ( resource handle, int length )
Restituisce una stringa di length - 1 byte letti dal file puntato da handle. La lettura termina quando
sono stati letti length - 1 byte, oppure si incontra il carattere di newline (che viene incluso nel valore
restituito), oppure alla fine del file (EOF) qualora giunga prima. Se non si specifica length, si
assume come default 1k, o 1024 byte.

### bool file_exists ( string filename )
Restituisce TRUE se il file o la directory specificata da filename esiste; FALSE altrimenti.

### array file ( string filename [, int use_include_path [, resource context]] )
Identica a readfile(), eccetto per il fatto che file() restituisce il file in un vettore. Ogni elemento del
vettore corrisponde ad una riga del file, con il carattere di newline ancora inserito. Se la funzione
non riesce restituisce FALSE. (nota di Simone: apre e chiude il file automaticamente)

### int fwrite ( resource handle, string string [, int length] )
fwrite() scrive il contenuto di string nel flusso del file puntato da handle. Se l'argomento length è
specificato la scrittura si arresterà dopo aver scritto length byte o alla fine di string se si verificasse
prima. fwrite() returns the number of bytes written, or FALSE on error.


## FUNZIONI MATEMATICHE

### number abs ( mixed numero )
Restituisce il valore assoluto di un numero.

### mixed max ( number arg1, number arg2 [, number ...] )

### mixed max ( array numbers [, array ...] )

### max() restituisce il numericamente più grande dei valori dati come parametro.

### mixed min ( number arg1, number arg2 [, number ...] )

### mixed min ( array numbers [, array ...] )

### min() restituisce il numericamente più piccolo dei valori dati come parametro.

### float pow ( float base, float esp )

Restituisce base elevato alla potenza di esp. Se possibile, questa funzione restituisce un integer.
Nota: Il PHP non può gestire valori negativi per bases.

### int rand ( [int min, int max] )

Se chiamata senza i parametri opzionali min, max, rand() restituisce un valore pseudo casuale
compreso fra 0 e RAND_MAX. Se ad esempio si desidera un numero casuale compreso fra 5 e 15
(inclusi) usare rand (5, 15).

### double round ( double val [, int precisione] )
Restituisce il valore arrotondato di val con la precisione specificata (numero di cifre dopo il punto
decimale). precisione può anche essere negativa o zero (predefinito).

## FUNZIONI PER LE STRINGHE

### string rtrim ( string str [, string charlist] )
Questa funzione restituisce la stringa str a cui sono stati rimossi gli spazi finali. Senza la specifica
del secondo parametro rtrim() rimuoverà i seguenti caratteri:
" " (ASCII 32 (0x20)), spazio ordinario.
"\t" (ASCII 9 (0x09)), tab.
"\n" (ASCII 10 (0x0A)), newline (line feed).
"\r" (ASCII 13 (0x0D)), carriage return.
"\0" (ASCII 0 (0x00)), il byte NUL.
"\x0B" (ASCII 11 (0x0B)), il tab verticale.


### string chr ( int ascii )
La funzione restituisce una stringa di un carattere contenente il carattere indicato come codifica
ASCII nel parametro ascii. La funzione è complementare di ord().

### array explode ( string separator, string string [, int limit] )
Questa funzione restituisce una matrice di stringhe, ciascuna delle quali è una parte di string
ottenuta dividendo la stringa originale utilizzando separator come separatore di stringa. Se si
imposta limit la matrice restituita conterrà al massimo limit elementi di cui l'ultimo conterrà la parte
restante di string.

### int fprintf ( resource handle, string format [, mixed args [, mixed ...]] )
La funzione scrive una stringa formattata in base al parametro format nello stream indicato dal
parametro handle. I valori per il parametro format sono descritti nella documentazione della
funzione sprintf().

### string implode ( string glue, array pieces )
Restituisce una stringa contenente tutti gli elementi di una matrice nel medesimo ordine, inserendo
il parametro glue tra un elemento e l'altro.

### string ltrim ( string str [, string charlist] )
Come rtrim, ma lavora dall’inizio della stringa str.

### int ord ( string string )
Restituisce il valore ASCII del primo carattere di string. È complementare di chr().

### int strcmp ( string str1, string str2 )
Restituisce < 0 se str1 è minore di str2; > 0 se str1 è maggiore di str2, e 0 se sono uguali.
Attenzione: il confronto tiene conto delle lettere maiuscole e minuscole.

### int strcasecmp ( string str1, string str2 )
Restituisce < 0 se str1 è minore di str2; > 0 se str1 è maggiore di str2, e 0 se sono uguali. Confronto
non sensibile alle maiuscole e sicuro con i dati binari.

### int strlen ( string string )

Restituisce la lunghezza della stringa string.

### string strstr ( string haystack, string needle )
Restituisce la parte della stringa haystack dalla prima occorrenza di needle fino alla fine di

haystack. Se non si trova needle, restituisce FALSE.

### string strtolower ( string str )

La funzione restituisce la stringa string con tutti i caratteri alfabetici convertiti in minuscolo.

### string strtoupper ( string string )

Restituisce la stringa string con i caratteri alfabetici convertiti in maiuscolo.

### mixed str_replace ( mixed search, mixed replace, mixed subject [, int &count] )

Questa funzione restituisce una stringa, od una matrice, con tutte le occorrenze di search nella
stringa subject sostituite con il valore del parametro replace.

### string substr ( string string, int start [, int length] )

La funzione substr() restituisce la porzione di string indicata dai parametri start e length. Se start
non è negativo, la stringa restituita inizierà dalla posizione start di string, partendo da zero.

### string trim ( string str [, string charlist] )

Questa funzione restituisce il parametro str privo degli spazi iniziali e finali.

## FUNZIONI DI VARIABILI

### bool empty ( mixed var )

Determina se una variabile è da considerare vuota. empty() è l'opposto di (boolean) var, tranne che
non viene dato alcun warning quando la variabile non è valorizzata. Nota: empty() agisce solo su
variabili, qualsiasi altra cosa genera un errore di parsing. In altre parole, il seguente comando non
funziona: empty(trim($name)).

### float floatval ( mixed var )

La funzione restituisce il valore di tipo float di var.

### int intval ( mixed var [, int base] )

Estrae il valore intero di var, utilizzando la base definita a parametro per la conversione. (La base
vale 10 di default).

### bool is_array ( mixed var )

Verifica se il valore dato è un array.
Inoltre, si hanno anche, is_bool, is_float, is_int, is_null, is_numeric, is_string con analoga funzione.

### bool isset ( mixed variabile [, ...] )

Restituisce TRUE se la variabile esiste; FALSE in caso contrario.
Se una variabile è stata cancellata con unset(), non potrà essere impostata. La funzione isset()
restituirà FALSE se viene utilizzata per testare una variabile valorizzata a NULL. Inoltre occorre

notare che il byte NULL ("\0") non equivale alla costante PHP NULL.

### void unset ( mixed var [, mixed var [, mixed ...]] )
unset() distrugge la variabile specificata. Occorre notare che in PHP 3 la funzione unset() restituiva
sempre TRUE (in realtà era il valore 1). In PHP 4, invece, la funzione unset() non è più una vera
funzione, ora è una istruzione. In questa veste non ritorna alcun valore, e cercare di ottenere un
valore dalla funzione unset() produce un errore di parsing.
