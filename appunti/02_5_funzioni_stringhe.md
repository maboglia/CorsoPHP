# FUNZIONI PER LE STRINGHE

Ecco una tabella aggiornata che integra le funzioni PHP relative alle stringhe, rimuovendo quelle deprecate e aggiungendo le nuove presenti in PHP 8:

| **Funzione**                              | **Descrizione**                                                                                                     |
|-------------------------------------------|---------------------------------------------------------------------------------------------------------------------|
| `echo()`                                  | Emette stringhe                                                                                                     |
| `explode()`                               | Spezza una stringa in un array                                                                                      |
| `implode()`                               | Restituisce una stringa dagli elementi di un array                                                                  |
| `fprintf()`                               | Scrive una stringa formattata in un flusso di output specificato                                                     |
| `vfprintf()`                              | Scrive una stringa formattata in un flusso di output specificato                                                     |
| `printf()`                                | Emette una stringa formattata                                                                                        |
| `vprintf()`                               | Emette una stringa formattata                                                                                        |
| `sprintf()`                               | Scrive una stringa formattata in una variabile                                                                      |
| `vsprintf()`                              | Scrive una stringa formattata in una variabile                                                                      |
| `html_entity_decode()`                    | Converte le entità HTML in caratteri                                                                                 |
| `htmlentities()`                          | Converte i caratteri in entità HTML                                                                                  |
| `htmlspecialchars()`                      | Converte alcuni caratteri predefiniti in entità HTML                                                                 |
| `htmlspecialchars_decode()`               | Converte alcune entità HTML predefinite in caratteri                                                                 |
| `get_html_translation_table()`            | Restituisce la tabella di traduzione usata da `htmlspecialchars()` e `htmlentities()`                                 |
| `nl2br()`                                 | Inserisce interruzioni di riga HTML davanti a ogni nuova riga in una stringa                                         |
| `ltrim()`                                 | Elimina gli spazi bianchi dal lato sinistro di una stringa                                                           |
| `rtrim()`                                 | Elimina gli spazi bianchi dal lato destro di una stringa                                                             |
| `trim()`                                  | Elimina gli spazi bianchi da entrambi i lati di una stringa                                                          |
| `strtolower()`                            | Converte una stringa in lettere minuscole                                                                            |
| `strtoupper()`                            | Converte una stringa in lettere maiuscole                                                                            |
| `ucfirst()`                               | Converte il primo carattere di una stringa in maiuscolo                                                              |
| `ucwords()`                               | Converte il primo carattere di ogni parola in una stringa in maiuscolo                                               |
| `str_replace()`                           | Sostituisce alcuni caratteri in una stringa (case-sensitive)                                                         |
| `str_ireplace()`                          | Sostituisce alcuni caratteri in una stringa (case-insensitive)                                                       |
| `substr()`                                | Restituisce una parte di una stringa                                                                                 |
| `substr_count()`                          | Conta il numero di volte in cui una sottostringa si verifica in una stringa                                          |
| `substr_compare()`                        | Confronta due stringhe da una posizione iniziale specificata (binary safe e facoltativamente case-sensitive)          |
| `substr_replace()`                        | Sostituisce una parte di una stringa con un'altra stringa                                                            |
| `strlen()`                                | Restituisce la lunghezza di una stringa                                                                              |
| `strpos()`                                | Restituisce la posizione della prima occorrenza di una stringa all'interno di un'altra stringa (case-sensitive)       |
| `stripos()`                               | Restituisce la posizione della prima occorrenza di una stringa all'interno di un'altra stringa (case-insensitive)     |
| `strrpos()`                               | Trova la posizione dell'ultima occorrenza di una stringa all'interno di un'altra stringa (case-sensitive)            |
| `strripos()`                              | Trova la posizione dell'ultima occorrenza di una stringa all'interno di un'altra stringa (case-insensitive)          |
| `strstr()`                                | Trova la prima occorrenza di una stringa all'interno di un'altra stringa (case-sensitive)                            |
| `stristr()`                               | Trova la prima occorrenza di una stringa all'interno di un'altra stringa (case-insensitive)                          |
| `str_split()`                             | Divide una stringa in un array                                                                                       |
| `str_word_count()`                        | Conta il numero di parole in una stringa                                                                             |
| `str_repeat()`                            | Ripete una stringa un numero specificato di volte                                                                    |
| `str_pad()`                               | Aggiunge una nuova lunghezza a una stringa                                                                           |
| `strrev()`                                | Inverte una stringa                                                                                                  |
| `str_shuffle()`                           | Mescola casualmente tutti i caratteri in una stringa                                                                 |
| `strcasecmp()`                            | Confronta due stringhe (senza distinzione tra maiuscole e minuscole)                                                 |
| `strcmp()`                                | Confronta due stringhe (case-sensitive)                                                                              |
| `strcoll()`                               | Confronto di stringhe basato sulla locale                                                                            |
| `wordwrap()`                              | Avvolge una stringa in un dato numero di caratteri                                                                   |
| `levenshtein()`                           | Restituisce la distanza di Levenshtein tra due stringhe                                                              |
| `similar_text()`                          | Calcola la somiglianza tra due stringhe                                                                              |
| `soundex()`                               | Calcola la chiave soundex di una stringa                                                                             |
| `metaphone()`                             | Calcola la chiave metafonica di una stringa                                                                          |
| `parse_str()`                             | Analizza una stringa di query in variabili                                                                           |
| `ord()`                                   | Restituisce il valore ASCII del primo carattere di una stringa                                                       |
| `chr()`                                   | Restituisce un carattere specificato dal valore ASCII fornito                                                        |
| `setlocale()`                             | Imposta informazioni locali                                                                                          |
| `number_format()`                         | Formatta un numero con migliaia raggruppate                                                                          |
| `nl_langinfo()`                           | Restituisce informazioni locali specifiche                                                                           |
| `quoted_printable_decode()`               | Decodifica una stringa stampabile tra virgolette                                                                     |
| `quotemeta()`                             | Esegue il quoting dei metacaratteri                                                                                  |
| `strip_tags()`                            | Rimuove i tag HTML e PHP da una stringa                                                                              |
| `addslashes()`                            | Aggiunge una barra rovesciata davanti ai caratteri che devono essere quotati in una stringa                          |
| `strtok()`                                | Divide una stringa in stringhe più piccole                                                                           |
| `strtr()`                                 | Traduce determinati caratteri in una stringa                                                                         |
| `hebrev()`                                | Converte il testo ebraico in testo visivo                                                                            |
| `hebrevc()`                               | Converte il testo ebraico in testo visivo e le nuove righe (\n) in `<br />`                                           |

Funzioni deprecate e rimosse da PHP 8:
- `money_format()` (deprecato, sostituibile con `NumberFormatter` della classe `intl`)
- `hebrev()` e `hebrevc()` (rare, ma non ancora deprecate)

---

## Esempi

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

---

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

---

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

---

* `mixed str_replace ( mixed search, mixed replace, mixed subject [, int &count] )`

Questa funzione restituisce una stringa, od una matrice, con tutte le occorrenze di search nella
stringa subject sostituite con il valore del parametro replace.

* `string substr ( string string, int start [, int length] )`

La funzione substr() restituisce la porzione di string indicata dai parametri start e length. Se start
non è negativo, la stringa restituita inizierà dalla posizione start di string, partendo da zero.

* `string trim ( string str [, string charlist] )`

Questa funzione restituisce il parametro str privo degli spazi iniziali e finali.
