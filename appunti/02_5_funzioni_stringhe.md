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

---

## Elenco funzioni

* [addcslashes() - "Restituisce una stringa con barre rovesciate davanti ai caratteri specificati"](http://php.net/manual/en/function.addcslashes.php)
* [addslashes() - "Restituisce una stringa con barre rovesciate davanti a caratteri predefiniti"](http://php.net/manual/en/function.addslashes.php)
* [bin2hex() - "Converte una stringa di caratteri ASCII in valori esadecimali"](http://php.net/manual/en/function.bin2hex.php)
* [chop() - "Alias di rtrim()"](http://php.net/manual/en/function.rtrim.php)
* [chr() - "Restituisce un carattere da un valore ASCII specificato"](http://php.net/manual/en/function.chr.php)
* [chunk_split() - "Divide una stringa in una serie di parti più piccole"](http://php.net/manual/en/function.chunk-split.php)
* [convert_cyr_string() - "Converte una stringa da un set di caratteri cirillici a un altro"](http://php.net/manual/en/function.convert-cyr-string.php)
* [convert_uudecode() - "Decodifica una stringa uuencoded"](http://php.net/manual/en/function.convert-uudecode.php)
* [convert_uuencode() - "Codifica una stringa usando l'algoritmo uuencode"](http://php.net/manual/en/function.convert-uuencode.php)
* [count_chars() - "Restituisce quante volte un carattere ASCII ricorre all'interno di una stringa e restituisce le informazioni"](http://php.net/manual/en/function.count-chars.php)
* [crc32() - "Calcola un CRC a 32 bit per una stringa"](http://php.net/manual/en/function.crc32.php)
* [crypt() - "Crittografia stringa unidirezionale (hashing)"](http://php.net/manual/en/function.crypt.php)

---

## Elenco funzioni 1

* [echo() - "Emette stringhe"](http://php.net/manual/en/function.echo.php)
* [explode() - "Spezza una stringa in un array"](http://php.net/manual/en/function.explode.php)
* [fprintf() - "Scrive una stringa formattata in un flusso di output specificato"](http://php.net/manual/en/function.fprintf.php)
* [get_html_translation_table() - "Restituisce la tabella di traduzione utilizzata da htmlspecialchars() e htmlentities()"](http://php.net/manual/en/function.htmlspecialchars.php)
* [hebrev() - "Converte il testo ebraico in testo visivo"](http://php.net/manual/en/function.hebrev.php)
* [hebrevc() - "Converte il testo ebraico in testo visivo e le nuove righe (\n) in <br />"](http://php.net/manual/en/function.hebrevc.php)
* [html_entity_decode() - "Converte le entità HTML in caratteri"](http://php.net/manual/en/function.html-entity-decode.php)
* [htmlentities() - "Converte i caratteri in entità HTML"](http://php.net/manual/en/function.htmlentities.php)
* [htmlspecialchars_decode() - "Converte alcune entità HTML predefinite in caratteri"](http://php.net/manual/en/function.htmlspecialchars-decode.php)
* [htmlspecialchars() - "Converte alcuni caratteri predefiniti in entità HTML"](http://php.net/manual/en/function.htmlspecialchars.php)
* [implode() - "Restituisce una stringa dagli elementi di un array"](http://php.net/manual/en/function.implode.php)
* [join() - "Alias di implode()"](http://php.net/manual/en/function.join.php)
* [levenshtein() - "Restituisce la distanza di Levenshtein tra due stringhe"](http://php.net/manual/en/function.levenshtein.php)
* [localeconv() - "Restituisce informazioni sulla formattazione numerica e monetaria locale"](http://php.net/manual/en/function.localeconv.php)
* [ltrim() - "Elimina gli spazi bianchi dal lato sinistro di una stringa"](http://php.net/manual/en/function.ltrim.php)

---

## Elenco funzioni 2

* [md5() - "Calcola l'hash MD5 di una stringa"](http://php.net/manual/en/function.md5.php)
* [md5_file() - "Calcola l'hash MD5 di un file"](http://php.net/manual/en/function.md5-file.php)
* [metaphone() - "Calcola la chiave metafonica di una stringa"](http://php.net/manual/en/function.metaphone.php)
* [money_format() - "Restituisce una stringa formattata come una stringa di valuta"](http://php.net/manual/en/function.money-format.php)
* [nl_langinfo() - "Restituisce informazioni locali specifiche"](http://php.net/manual/en/function.nl-langinfo.php)
* [nl2br() - "Inserisce interruzioni di riga HTML davanti a ogni nuova riga in una stringa"](http://php.net/manual/en/function.nl2br.php)
* [number_format() - "Formatta un numero con migliaia raggruppate"](http://php.net/manual/en/function.number-format.php)
* [ord() - "Restituisce il valore ASCII del primo carattere di una stringa"](http://php.net/manual/en/function.ord.php)
* [parse_str() - "Analizza una stringa di query in variabili"](http://php.net/manual/en/function.parse-str.php)
* [print() - "Emette una stringa"](http://php.net/manual/en/function.print.php)
* [printf() - "Emette una stringa formattata"](http://php.net/manual/en/function.printf.php)
* [quoted_printable_decode() - "Decodifica una stringa stampabile tra virgolette"](http://php.net/manual/en/function.quoted-printable-decode.php)
* [quotemeta() - "Quote meta caratteri"](http://php.net/manual/en/function.quotemeta.php)
* [rtrim() - "Elimina gli spazi bianchi dal lato destro di una stringa"](http://php.net/manual/en/function.rtrim.php)
* [setlocale() - "Imposta informazioni locali"](http://php.net/manual/en/function.setlocale.php)
* [sha1() - "Calcola l'hash SHA-1 di una stringa"](http://php.net/manual/en/function.sha1.php)
* [sha1_file() - "Calcola l'hash SHA-1 di un file"](http://php.net/manual/en/function.sha1-file.php)
* [similar_text() - "Calcola la somiglianza tra due stringhe"](http://php.net/manual/en/function.similar-text.php)
* [soundex() - "Calcola la chiave soundex di una stringa"](http://php.net/manual/en/function.soundex.php)
* [sprintf() - "Scrive una stringa formattata in una variabile"](http://php.net/manual/en/function.sprintf.php)
* [sscanf() - "Analizza l'input da una stringa in base a un formato"](http://php.net/manual/en/function.sscanf.php)

---

## Elenco funzioni 3

* [str_ireplace() - "Sostituisce alcuni caratteri in una stringa (case-insensitive)"](http://php.net/manual/en/function.str-ireplace.php)
* [str_pad() - "Aggiunge una nuova lunghezza a una stringa"](http://php.net/manual/en/function.str-pad.php)
* [str_repeat() - "Ripete una stringa un numero specificato di volte"](http://php.net/manual/en/function.str-repeat.php)
* [str_replace() - "Sostituisce alcuni caratteri in una stringa (case-sensitive)"](http://php.net/manual/en/function.str-replace.php)
* [str_rot13() - "Esegue la codifica ROT13 su una stringa"](http://php.net/manual/en/function.str-rot13.php)
* [str_shuffle() - "Mescola casualmente tutti i caratteri in una stringa"](http://php.net/manual/en/function.str-shuffle.php)
* [str_split() - "Divide una stringa in un array"](http://php.net/manual/en/function.str-split.php)
* [str_word_count() - "Conta il numero di parole in una stringa"](http://php.net/manual/en/function.str-word-count.php)
* [strcasecmp() - "Confronta due stringhe (senza distinzione tra maiuscole e minuscole)"](http://php.net/manual/en/function.strcasecmp.php)
* [strchr() - "Trova la prima occorrenza di una stringa all'interno di un'altra stringa (alias di strstr())"](http://php.net/manual/en/function.strchr.php)
* [strcmp() - "Confronta due stringhe (case-sensitive)"](http://php.net/manual/en/function.strcmp.php)
* [strcoll() - "Confronto di stringhe basato sulla locale"](http://php.net/manual/en/function.strcoll.php)
* [strcspn() - "Restituisce il numero di caratteri trovati in una stringa prima che venga trovata qualsiasi parte di alcuni caratteri specificati"](http://php.net/manual/en/function.strcspn.php)
* [strip_tags() - "Rimuove i tag HTML e PHP da una stringa"](http://php.net/manual/en/function.strip-tags.php)
* [stripcslashes() - "Rimuove le virgolette da una stringa tra virgolette con addcslashes()"](http://php.net/manual/en/function.addcslashes.php)
* [stripslashes() - "Rimuove le virgolette da una stringa tra virgolette con addslashes()"](http://php.net/manual/en/function.addslashes.php)
* [stripos() - "Restituisce la posizione della prima occorrenza di una stringa all'interno di un'altra stringa (case-insensitive)"](http://php.net/manual/en/function.stripos.php)
* [stristr() - "Trova la prima occorrenza di una stringa all'interno di un'altra stringa (senza distinzione tra maiuscole e minuscole)"](http://php.net/manual/en/function.stristr.php)
* [strlen() - "Restituisce la lunghezza di una stringa"](http://php.net/manual/en/function.strlen.php)

---

## Elenco funzioni 4

* [strnatcasecmp() - "Confronta due stringhe usando un " natural="" order"="" algoritmi="" (case-insensitive)"=""](http://php.net/manual/en/function .strnatcasecmp.php)
* [strnatcmp() - "Confronta due stringhe usando un " natural="" order"="" algoritmi="" (case-sensitive)"=""](http://php.net/manual/en/function .strnatcmp.php)
* [strncasecmp() - "Confronto tra stringhe dei primi n caratteri (senza distinzione tra maiuscole e minuscole)"](http://php.net/manual/en/function.strncasecmp.php)
* [strncmp() - "Confronto tra stringhe dei primi n caratteri (case-sensitive)"](http://php.net/manual/en/function.strncmp.php)
* [strpbrk() - "Cerca una stringa per qualsiasi set di caratteri"](http://php.net/manual/en/function.strpbrk.php)
* [strpos() - "Restituisce la posizione della prima occorrenza di una stringa all'interno di un'altra stringa (case-sensitive)"](http://php.net/manual/en/function.strpos.php)
* [strrchr() - "Trova l'ultima occorrenza di una stringa all'interno di un'altra stringa"](http://php.net/manual/en/function.strrchr.php)
* [strrev() - "Inverte una stringa"](http://php.net/manual/en/function.strrev.php)
* [strripos() - "Trova la posizione dell'ultima occorrenza di una stringa all'interno di un'altra stringa (case-insensitive)"](http://php.net/manual/en/function.strripos.php)
* [strrpos() - "Trova la posizione dell'ultima occorrenza di una stringa all'interno di un'altra stringa (case-sensitive)"](http://php.net/manual/en/function.strrpos.php)
* [strspn() - "Restituisce il numero di caratteri trovati in una stringa che contiene solo caratteri da un charlist specificato"](http://php.net/manual/en/function.strspn.php)

---

## Elenco funzioni 5

* [strstr() - "Trova la prima occorrenza di una stringa all'interno di un'altra stringa (case-sensitive)"](http://php.net/manual/en/function.strstr.php)
* [strtok() - "Divide una stringa in stringhe più piccole"](http://php.net/manual/en/function.strtok.php)
* [strtolower() - "Converte una stringa in lettere minuscole"](http://php.net/manual/en/function.strtolower.php)
* [strtoupper() - "Converte una stringa in lettere maiuscole"](http://php.net/manual/en/function.strtoupper.php)
* [strtr() - "Traduce determinati caratteri in una stringa"](http://php.net/manual/en/function.strtr.php)
* [substr() - "Restituisce una parte di una stringa"](http://php.net/manual/en/function.substr.php)
* [substr_compare() - "Confronta due stringhe da una posizione iniziale specificata (binary safe e facoltativamente case-sensitive)"](http://php.net/manual/en/function.substr-compare.php)
* [substr_count() - "Conta il numero di volte in cui una sottostringa si verifica in una stringa"](http://php.net/manual/en/function.substr-count.php)
* [substr_replace() - "Sostituisce una parte di una stringa con un'altra stringa"](http://php.net/manual/en/function.substr-replace.php)
* [trim() - "Elimina gli spazi bianchi da entrambi i lati di una stringa"](http://php.net/manual/en/function.trim.php)
* [ucfirst() - "Converte il primo carattere di una stringa in maiuscolo"](http://php.net/manual/en/function.ucfirst.php)
* [ucwords() - "Converte il primo carattere di ogni parola in una stringa in maiuscolo"](http://php.net/manual/en/function.ucwords.php)
* [vfprintf() - "Scrive una stringa formattata in un flusso di output specificato"](http://php.net/manual/en/function.vfprintf.php)
* [vprintf() - "Emette una stringa formattata"](http://php.net/manual/en/function.vprintf.php)
* [vsprintf() - "Scrive una stringa formattata in una variabile"](http://php.net/manual/en/function.vsprintf.php)
* [wordwrap() - "Avvolge una stringa in un dato numero di caratteri"](http://php.net/manual/en/function.wordwrap.php)
