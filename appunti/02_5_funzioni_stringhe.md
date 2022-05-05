# FUNZIONI PER LE STRINGHE

* `string rtrim ( string str [, string charlist] )`
Questa funzione restituisce la stringa str a cui sono stati rimossi gli spazi finali. Senza la specifica
del secondo parametro rtrim() rimuoverà i seguenti caratteri:
" " (ASCII 32 (0x20)), spazio ordinario.
"\t" (ASCII 9 (0x09)), tab.
"\n" (ASCII 10 (0x0A)), newline (line feed).
"\r" (ASCII 13 (0x0D)), carriage return.
"\0" (ASCII 0 (0x00)), il byte NUL.
"\x0B" (ASCII 11 (0x0B)), il tab verticale.


* `string chr ( int ascii )`
La funzione restituisce una stringa di un carattere contenente il carattere indicato come codifica
ASCII nel parametro ascii. La funzione è complementare di ord().

* `array explode ( string separator, string string [, int limit] )`
Questa funzione restituisce una matrice di stringhe, ciascuna delle quali è una parte di string
ottenuta dividendo la stringa originale utilizzando separator come separatore di stringa. Se si
imposta limit la matrice restituita conterrà al massimo limit elementi di cui l'ultimo conterrà la parte
restante di string.

* `int fprintf ( resource handle, string format [, mixed args [, mixed ...]] )`
La funzione scrive una stringa formattata in base al parametro format nello stream indicato dal
parametro handle. I valori per il parametro format sono descritti nella documentazione della
funzione sprintf().

* `string implode ( string glue, array pieces )`
Restituisce una stringa contenente tutti gli elementi di una matrice nel medesimo ordine, inserendo
il parametro glue tra un elemento e l'altro.

* `string ltrim ( string str [, string charlist] )`
Come rtrim, ma lavora dall’inizio della stringa str.

* `int ord ( string string )`
Restituisce il valore ASCII del primo carattere di string. È complementare di chr().

* `int strcmp ( string str1, string str2 )`
Restituisce < 0 se str1 è minore di str2; > 0 se str1 è maggiore di str2, e 0 se sono uguali.
Attenzione: il confronto tiene conto delle lettere maiuscole e minuscole.

* `int strcasecmp ( string str1, string str2 )`
Restituisce < 0 se str1 è minore di str2; > 0 se str1 è maggiore di str2, e 0 se sono uguali. Confronto
non sensibile alle maiuscole e sicuro con i dati binari.

* `int strlen ( string string )`

Restituisce la lunghezza della stringa string.

* `string strstr ( string haystack, string needle )`
Restituisce la parte della stringa haystack dalla prima occorrenza di needle fino alla fine di

haystack. Se non si trova needle, restituisce FALSE.

* `string strtolower ( string str )`

La funzione restituisce la stringa string con tutti i caratteri alfabetici convertiti in minuscolo.

* `string strtoupper ( string string )`

Restituisce la stringa string con i caratteri alfabetici convertiti in maiuscolo.

* `mixed str_replace ( mixed search, mixed replace, mixed subject [, int &count] )`

Questa funzione restituisce una stringa, od una matrice, con tutte le occorrenze di search nella
stringa subject sostituite con il valore del parametro replace.

* `string substr ( string string, int start [, int length] )`

La funzione substr() restituisce la porzione di string indicata dai parametri start e length. Se start
non è negativo, la stringa restituita inizierà dalla posizione start di string, partendo da zero.

* `string trim ( string str [, string charlist] )`

Questa funzione restituisce il parametro str privo degli spazi iniziali e finali.