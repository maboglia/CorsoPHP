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



* [addcslashes() - "Returns a string with backslashes in front of the specified characters"](http://php.net/manual/en/function.addcslashes.php)


* [addslashes() - "Returns a string with backslashes in front of predefined characters"](http://php.net/manual/en/function.addslashes.php)


* [bin2hex() - "Converts a string of ASCII characters to hexadecimal values"](http://php.net/manual/en/function.bin2hex.php)


* [chop() - "Alias of rtrim()"](http://php.net/manual/en/function.rtrim.php)


* [chr() - "Returns a character from a specified ASCII value"](http://php.net/manual/en/function.chr.php)


* [chunk_split() - "Splits a string into a series of smaller parts"](http://php.net/manual/en/function.chunk-split.php)


* [convert_cyr_string() - "Converts a string from one Cyrillic character-set to another"](http://php.net/manual/en/function.convert-cyr-string.php)


* [convert_uudecode() - "Decodes a uuencoded string"](http://php.net/manual/en/function.convert-uudecode.php)


* [convert_uuencode() - "Encodes a string using the uuencode algorithm"](http://php.net/manual/en/function.convert-uuencode.php)


* [count_chars() - "Returns how many times an ASCII character occurs within a string and returns the information"](http://php.net/manual/en/function.count-chars.php)


* [crc32() - "Calculates a 32-bit CRC for a string"](http://php.net/manual/en/function.crc32.php)


* [crypt() - "One-way string encryption (hashing)"](http://php.net/manual/en/function.crypt.php)


* [echo() - "Outputs strings"](http://php.net/manual/en/function.echo.php)


* [explode() - "Breaks a string into an array"](http://php.net/manual/en/function.explode.php)


* [fprintf() - "Writes a formatted string to a specified output stream"](http://php.net/manual/en/function.fprintf.php)


* [get_html_translation_table() - "Returns the translation table used by htmlspecialchars() and htmlentities()"](http://php.net/manual/en/function.htmlspecialchars.php)


* [hebrev() - "Converts Hebrew text to visual text"](http://php.net/manual/en/function.hebrev.php)


* [hebrevc() - "Converts Hebrew text to visual text and new lines (\n) into <br />"](http://php.net/manual/en/function.hebrevc.php)


* [html_entity_decode() - "Converts HTML entities to characters"](http://php.net/manual/en/function.html-entity-decode.php)


* [htmlentities() - "Converts characters to HTML entities"](http://php.net/manual/en/function.htmlentities.php)


* [htmlspecialchars_decode() - "Converts some predefined HTML entities to characters"](http://php.net/manual/en/function.htmlspecialchars-decode.php)


* [htmlspecialchars() - "Converts some predefined characters to HTML entities"](http://php.net/manual/en/function.htmlspecialchars.php)


* [implode() - "Returns a string from the elements of an array"](http://php.net/manual/en/function.implode.php)


* [join() - "Alias of implode()"](http://php.net/manual/en/function.join.php)


* [levenshtein() - "Returns the Levenshtein distance between two strings"](http://php.net/manual/en/function.levenshtein.php)


* [localeconv() - "Returns locale numeric and monetary formatting information"](http://php.net/manual/en/function.localeconv.php)


* [ltrim() - "Strips whitespace from the left side of a string"](http://php.net/manual/en/function.ltrim.php)


* [md5() - "Calculates the MD5 hash of a string"](http://php.net/manual/en/function.md5.php)


* [md5_file() - "Calculates the MD5 hash of a file"](http://php.net/manual/en/function.md5-file.php)


* [metaphone() - "Calculates the metaphone key of a string"](http://php.net/manual/en/function.metaphone.php)


* [money_format() - "Returns a string formatted as a currency string"](http://php.net/manual/en/function.money-format.php)


* [nl_langinfo() - "Returns specific local information"](http://php.net/manual/en/function.nl-langinfo.php)


* [nl2br() - "Inserts HTML line breaks in front of each newline in a string"](http://php.net/manual/en/function.nl2br.php)


* [number_format() - "Formats a number with grouped thousands"](http://php.net/manual/en/function.number-format.php)


* [ord() - "Returns the ASCII value of the first character of a string"](http://php.net/manual/en/function.ord.php)


* [parse_str() - "Parses a query string into variables"](http://php.net/manual/en/function.parse-str.php)


* [print() - "Outputs a string"](http://php.net/manual/en/function.print.php)


* [printf() - "Outputs a formatted string"](http://php.net/manual/en/function.printf.php)


* [quoted_printable_decode() - "Decodes a quoted-printable string"](http://php.net/manual/en/function.quoted-printable-decode.php)


* [quotemeta() - "Quotes meta characters"](http://php.net/manual/en/function.quotemeta.php)


* [rtrim() - "Strips whitespace from the right side of a string"](http://php.net/manual/en/function.rtrim.php)


* [setlocale() - "Sets locale information"](http://php.net/manual/en/function.setlocale.php)


* [sha1() - "Calculates the SHA-1 hash of a string"](http://php.net/manual/en/function.sha1.php)


* [sha1_file() - "Calculates the SHA-1 hash of a file"](http://php.net/manual/en/function.sha1-file.php)


* [similar_text() - "Calculates the similarity between two strings"](http://php.net/manual/en/function.similar-text.php)


* [soundex() - "Calculates the soundex key of a string"](http://php.net/manual/en/function.soundex.php)


* [sprintf() - "Writes a formatted string to a variable"](http://php.net/manual/en/function.sprintf.php)


* [sscanf() - "Parses input from a string according to a format"](http://php.net/manual/en/function.sscanf.php)


* [str_ireplace() - "Replaces some characters in a string (case-insensitive)"](http://php.net/manual/en/function.str-ireplace.php)


* [str_pad() - "Pads a string to a new length"](http://php.net/manual/en/function.str-pad.php)


* [str_repeat() - "Repeats a string a specified number of times"](http://php.net/manual/en/function.str-repeat.php)


* [str_replace() - "Replaces some characters in a string (case-sensitive)"](http://php.net/manual/en/function.str-replace.php)


* [str_rot13() - "Performs the ROT13 encoding on a string"](http://php.net/manual/en/function.str-rot13.php)


* [str_shuffle() - "Randomly shuffles all characters in a string"](http://php.net/manual/en/function.str-shuffle.php)


* [str_split() - "Splits a string into an array"](http://php.net/manual/en/function.str-split.php)


* [str_word_count() - "Count the number of words in a string"](http://php.net/manual/en/function.str-word-count.php)


* [strcasecmp() - "Compares two strings (case-insensitive)"](http://php.net/manual/en/function.strcasecmp.php)


* [strchr() - "Finds the first occurrence of a string inside another string (alias of strstr())"](http://php.net/manual/en/function.strchr.php)


* [strcmp() - "Compares two strings (case-sensitive)"](http://php.net/manual/en/function.strcmp.php)


* [strcoll() - "Locale based string comparison"](http://php.net/manual/en/function.strcoll.php)


* [strcspn() - "Returns the number of characters found in a string before any part of some specified characters are found"](http://php.net/manual/en/function.strcspn.php)


* [strip_tags() - "Strips HTML and PHP tags from a string"](http://php.net/manual/en/function.strip-tags.php)


* [stripcslashes() - "Unquotes a string quoted with addcslashes()"](http://php.net/manual/en/function.addcslashes.php)


* [stripslashes() - "Unquotes a string quoted with addslashes()"](http://php.net/manual/en/function.addslashes.php)


* [stripos() - "Returns the position of the first occurrence of a string inside another string (case-insensitive)"](http://php.net/manual/en/function.stripos.php)


* [stristr() - "Finds the first occurrence of a string inside another string (case-insensitive)"](http://php.net/manual/en/function.stristr.php)


* [strlen() - "Returns the length of a string"](http://php.net/manual/en/function.strlen.php)


* [strnatcasecmp() - "Compares two strings using a " natural="" order"="" algorithm="" (case-insensitive)"=""](http://php.net/manual/en/function.strnatcasecmp.php)


* [strnatcmp() - "Compares two strings using a " natural="" order"="" algorithm="" (case-sensitive)"=""](http://php.net/manual/en/function.strnatcmp.php)


* [strncasecmp() - "String comparison of the first n characters (case-insensitive)"](http://php.net/manual/en/function.strncasecmp.php)


* [strncmp() - "String comparison of the first n characters (case-sensitive)"](http://php.net/manual/en/function.strncmp.php)


* [strpbrk() - "Searches a string for any of a set of characters"](http://php.net/manual/en/function.strpbrk.php)


* [strpos() - "Returns the position of the first occurrence of a string inside another string (case-sensitive)"](http://php.net/manual/en/function.strpos.php)


* [strrchr() - "Finds the last occurrence of a string inside another string"](http://php.net/manual/en/function.strrchr.php)


* [strrev() - "Reverses a string"](http://php.net/manual/en/function.strrev.php)


* [strripos() - "Finds the position of the last occurrence of a string inside another string (case-insensitive)"](http://php.net/manual/en/function.strripos.php)


* [strrpos() - "Finds the position of the last occurrence of a string inside another string (case-sensitive)"](http://php.net/manual/en/function.strrpos.php)


* [strspn() - "Returns the number of characters found in a string that contains only characters from a specified charlist"](http://php.net/manual/en/function.strspn.php)


* [strstr() - "Finds the first occurrence of a string inside another string (case-sensitive)"](http://php.net/manual/en/function.strstr.php)


* [strtok() - "Splits a string into smaller strings"](http://php.net/manual/en/function.strtok.php)


* [strtolower() - "Converts a string to lowercase letters"](http://php.net/manual/en/function.strtolower.php)


* [strtoupper() - "Converts a string to uppercase letters"](http://php.net/manual/en/function.strtoupper.php)


* [strtr() - "Translates certain characters in a string"](http://php.net/manual/en/function.strtr.php)


* [substr() - "Returns a part of a string"](http://php.net/manual/en/function.substr.php)


* [substr_compare() - "Compares two strings from a specified start position (binary safe and optionally case-sensitive)"](http://php.net/manual/en/function.substr-compare.php)


* [substr_count() - "Counts the number of times a substring occurs in a string"](http://php.net/manual/en/function.substr-count.php)


* [substr_replace() - "Replaces a part of a string with another string"](http://php.net/manual/en/function.substr-replace.php)


* [trim() - "Strips whitespace from both sides of a string"](http://php.net/manual/en/function.trim.php)


* [ucfirst() - "Converts the first character of a string to uppercase"](http://php.net/manual/en/function.ucfirst.php)


* [ucwords() - "Converts the first character of each word in a string to uppercase"](http://php.net/manual/en/function.ucwords.php)


* [vfprintf() - "Writes a formatted string to a specified output stream"](http://php.net/manual/en/function.vfprintf.php)


* [vprintf() - "Outputs a formatted string"](http://php.net/manual/en/function.vprintf.php)


* [vsprintf() - "Writes a formatted string to a variable"](http://php.net/manual/en/function.vsprintf.php)


* [wordwrap() - "Wraps a string to a given number of characters"](http://php.net/manual/en/function.wordwrap.php)

