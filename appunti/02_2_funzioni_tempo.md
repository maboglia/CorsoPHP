# FUNZIONI DI DATA E ORA

* `string date ( string formato [, int timestamp] )`

Restituisce una stringa formattata in accordo con il formato della stringa usato nell' intero
timestamp o nell'attuale orario locale se timestamp non è assegnato.

I seguenti caratteri sono utilizzati nella stringa formato:

char|significato
---|---
a|"am" o "pm"
A|"AM" o "PM"
d|giorno del mese, 2 cifre senza tralasciare gli zero; i.e. "01" a "31"
D|giorno della settimana, testuale, 3 lettere; i.e. "Fri"
F|mese, testuale, long; i.e. "January"
g|ora, formato a 12-ore senza eventuali zero; i.e. "1" a "12"
G|ora, formato a 24-ore senza eventuali zero; i.e. "0" a "23"
h|ora, formato a 12-ore; i.e. "01" a "12"
H|ora, formato a 24-ore; i.e. "00" a "23"
i|minuti; i.e. "00" a "59"
I (i maiusc.)|"1" se c'è l'ora legale, "0" altrimenti.
j|giorno del mese senza eventuali zero; i.e. "1" a "31"
l ('L' minusc.)|giorno della settimana, testuale, long; i.e. "Friday"
L|valore booleano per stabilire se è un anno bisestile; i.e. "0" o "1"
m|mese; i.e. "01" a "12"
M|mese, testuale, 3 lettere; i.e. "Jan"
n|mese senza eventuali zero; i.e. "1" a "12"
s|secondi; i.e. "00" a "59"
t|numero di giorni del mese dato; i.e. "28" a "31"
w|giorno della settimana, numerico, i.e. "0" (Domenica) a "6" (Sabato)
Y|anno, 4 cifre; i.e. "1999"
y|anno, 2 cifre; i.e. "99"
z|giorno dell'anno; i.e. "0" a "365"

```php

$today = date("F j, Y, g:i a");
$today = date("m.d.y");
$today = date("j, n, Y");
$today = date("Ymd");
$today = date('h-i-s, j-m-y, it is w Day z ');
$today = date('\i\t \i\s \t\h\e jS \d\a\y.');
$today = date("D M j G:i:s T Y");
$today = date('H:m:s \m \i\s\ \m\o\n\t\h');
$today = date("H:i:s");

```

* `string setlocale ( mixed category, array locale )`

```php
<?php
/* Impostazioni locali in italiano */
setlocale(LC_ALL, 'it');
/* Visualizza: venerdì 22 dicembre 1978 */


echo strftime("%A %d %B %Y", mktime(0, 0, 0, 12, 22, 1978)); 

?>

```


* `int mktime ( int hour, int minute, int second, int month, int day, int year [, int is_dst])`

Restituisce la UNIX timestamp per una data

## string strftime ( string format [, int timestamp] )
Le seguenti sequenze di caratteri sono utilizzate nella stringa del formato:
* %a - Nome del giorno della settimana abbreviato in accordo con i parametri locali lun
* %A - Nome completo del giorno della settimana in accordo con i parametri locali lunedì
* %b - Nome del mese abbreviato in accordo con i parametri locali giu
* %B - Nome completo del mese in accordo con i parametri locali giugno
* %c - Rappresentazione preferita di data e orario per le attuali impostazioni locali
* %d - giorno del mese come numero decimale (intervallo tra 01 e 31) 19
* %H - ora come numero decimale usando il sistema a 24 ore (intervallo tra 00 e 23) 11
* %I - ora come numero decimale usando il sistema a 12 ore (intervallo tra 01 e 12) 11
* %j - giorno dell'anno come numero decimale (intervallo tra 001 e 366) 170
* %m - mese come numero decimale (intervallo tra 01 e 12) 06
* %M - minuto come numero decimale 16
* %n - carattere di nuova linea ‘a capo’
* %S - secondi come numero decimale 32
* %U - numero della settimana dell'anno in corso come numero decimale, iniziando dalla
    prima Domenica come primo giorno della prima settimana 25
* %W - numero della settimana dell'attuale anno come numero decimale, partendo con il
    primo Lunedì come primo giorno della prima settimana 
* %w - giorno della settimana come decimale, dove la Domenica è 0 1
* %x - visualizzazione della data preferita dalle impostazioni del sistema locale senza orario
* %X - visualizzazione dell'orario preferito dalle impostazioni del sistema locale senza data
* %y - anno come numero decimale senza secolo (intervallo tra 00 e 99) 06
* %Y - anno come numero decimale incluso il secolo 2006
* %Z - fuso orario o abbreviazione ora solare Europa occidentale
*  %% - il carattere `%' %

Per avere il giorno della settimana come decimale, dove Lunedì = 0 e Domenica = 6 si può usare la
seguente espressione (strftime ("%w") + 6) % 7

Questo numero è utilizzabile anche come indice di un array di nomi di giorni ove, per esempio
Array ([0] => Lunedì, [1] => Martedì, … [6] = Domenica)

---

## Elenco funzioni


* [checkdate() "Convalida una data gregoriana"](http://php.net/manual/en/function.checkdate.php)
* [date_default_timezone_get() "Restituisce il fuso orario predefinito"](http://php.net/manual/en/function.date-default-timezone-get.php)
* [date_default_timezone_set() "Imposta il fuso orario predefinito"](http://php.net/manual/en/function.date-default-timezone-set.php)
* [date_sunrise() "Restituisce l'ora dell'alba per un dato giorno/località"](http://php.net/manual/en/function.date-sunrise.php)
* [date_sunset() "Restituisce l'ora del tramonto per un dato giorno/località"](http://php.net/manual/en/function.date-sunset.php)
* [date() "Formatta una data/ora locale"](http://php.net/manual/en/function.date.php)
* [getdate() "Restituisce un array che contiene informazioni su data e ora per un timestamp Unix"](http://php.net/manual/en/function.getdate.php)
* [gettimeofday() "Restituisce un array che contiene informazioni sull'ora corrente"](http://php.net/manual/en/function.gettimeofday.php)
* [gmdate() "Formatta una data/ora GMT/UTC"](http://php.net/manual/en/function.gmdate.php)
* [gmmktime() "Restituisce il timestamp Unix per una data GMT"](http://php.net/manual/en/function.gmmktime.php)
* [gmstrftime() "Formatta un'ora/data GMT/UTC in base alle impostazioni locali"](http://php.net/manual/en/function.gmstrftime.php)
* [idate() "Formatta un'ora/data locale come numero intero"](http://php.net/manual/en/function.idate.php)
* [localtime() "Restituisce un array che contiene i componenti temporali di un timestamp Unix"](http://php.net/manual/en/function.localtime.php)
* [microtime() "Restituisce i microsecondi per l'ora corrente"](http://php.net/manual/en/function.microtime.php)
* [mktime() "Restituisce il timestamp Unix per una data"](http://php.net/manual/en/function.mktime.php)
* [strftime() "Formatta un'ora/data locale in base alle impostazioni locali"](http://php.net/manual/en/function.strftime.php)
* [strptime() "Analizza una data/ora generata con strftime()"](http://php.net/manual/en/function.strftime.php)
* [strtotime() "Analizza una data o un orario testuale inglese in un timestamp Unix"](http://php.net/manual/en/function.strtotime.php)
* [time() "Restituisce l'ora corrente come timestamp Unix"](http://php.net/manual/en/function.time.php)
