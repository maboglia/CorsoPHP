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


---

### **La Classe `DateTime` in PHP**

La classe **`DateTime`** di PHP offre un modo avanzato e flessibile per gestire le **date e gli orari**. Fornisce metodi per creare, manipolare e formattare date e orari, superando i limiti delle funzioni native come `date()` o `time()`.

---

### **1. Creazione di un Oggetto `DateTime`**

L'oggetto `DateTime` rappresenta un'istanza di data e ora. Può essere creato senza argomenti (che rappresenterà la data e ora corrente) o con una stringa specifica che rappresenta una data.

#### Esempi

```php
<?php
// Creazione di un oggetto DateTime con la data e ora corrente
$dataCorrente = new DateTime();
echo $dataCorrente->format('Y-m-d H:i:s');  // Output: 2024-09-12 15:34:12 (esempio)

// Creazione di un oggetto DateTime con una data specifica
$dataSpecificata = new DateTime('2024-09-12 10:30:00');
echo $dataSpecificata->format('Y-m-d H:i:s');  // Output: 2024-09-12 10:30:00
?>
```

**Spiegazione**:
* **`new DateTime()`** crea un oggetto con la data e l'ora corrente.
* **`new DateTime('2024-09-12 10:30:00')`** crea un oggetto con una data e ora specifica.
* Il metodo **`format('Y-m-d H:i:s')`** permette di formattare la data e l'ora secondo lo schema indicato.

---

### **2. Modificare la Data e l'Ora**

La classe `DateTime` permette di modificare facilmente una data o un orario utilizzando il metodo **`modify()`**. È possibile passare stringhe di testo che rappresentano modifiche temporali come "next day", "+1 week", "-3 days", ecc.

#### Esempio

```php
<?php
$data = new DateTime('2024-09-12');

// Aggiungere 1 giorno
$data->modify('+1 day');
echo $data->format('Y-m-d');  // Output: 2024-09-13

// Sottrarre 3 giorni
$data->modify('-3 days');
echo $data->format('Y-m-d');  // Output: 2024-09-10
?>
```

**Spiegazione**:
* **`$data->modify('+1 day')`** aggiunge un giorno alla data attuale.
* **`$data->modify('-3 days')`** sottrae tre giorni.

---

### **3. Differenza tra Date (`diff`)**

Il metodo **`diff()`** calcola la differenza tra due date e restituisce un oggetto **`DateInterval`** che rappresenta questa differenza in anni, mesi, giorni, ore, ecc.

#### Esempio

```php
<?php
$dataInizio = new DateTime('2024-09-01');
$dataFine = new DateTime('2024-09-12');

// Calcola la differenza tra le due date
$differenza = $dataInizio->diff($dataFine);
echo $differenza->days;  // Output: 11 (numero totale di giorni)
?>
```

**Spiegazione**:
* **`$dataInizio->diff($dataFine)`** restituisce un oggetto `DateInterval` che rappresenta la differenza tra due date.
* **`$differenza->days`** restituisce il numero totale di giorni tra le due date.

---

### **4. Formattare una Data**

Il metodo **`format()`** permette di formattare una data o un orario in vari formati. Accetta stringhe di formato come **`Y`** per l'anno, **`m`** per il mese, **`d`** per il giorno, e molte altre.

#### Esempio di formattazione

```php
<?php
$data = new DateTime('2024-09-12 10:30:00');
echo $data->format('l, d F Y H:i');  // Output: Thursday, 12 September 2024 10:30
?>
```

**Spiegazione**:
* **`format('l, d F Y H:i')`** restituisce una stringa che rappresenta la data in un formato leggibile (es: giovedì, 12 settembre 2024, 10:30).

---

### **5. Timezone (Fuso Orario)**

La classe `DateTime` supporta il **fuso orario** attraverso la classe **`DateTimeZone`**. È possibile specificare un fuso orario durante la creazione dell'oggetto `DateTime` o modificarlo successivamente.

#### Esempio con fuso orario

```php
<?php
$data = new DateTime('2024-09-12 10:30:00', new DateTimeZone('Europe/Rome'));
echo $data->format('Y-m-d H:i:s');  // Output: 2024-09-12 10:30:00

// Cambiare il fuso orario
$data->setTimezone(new DateTimeZone('America/New_York'));
echo $data->format('Y-m-d H:i:s');  // Output: 2024-09-12 04:30:00 (ora di New York)
?>
```

**Spiegazione**:
* **`new DateTimeZone('Europe/Rome')`** imposta il fuso orario iniziale.
* **`setTimezone()`** permette di cambiare il fuso orario dopo la creazione dell'oggetto.

---

### **6. Creare Oggetti `DateTime` da Timestamps**

Un **timestamp** è un numero che rappresenta il numero di secondi trascorsi dal 1 gennaio 1970 (epoch Unix). La classe `DateTime` può essere creata anche da un timestamp.

#### Esempio

```php
<?php
$timestamp = time();  // Ottieni il timestamp corrente
$data = (new DateTime())->setTimestamp($timestamp);

echo $data->format('Y-m-d H:i:s');  // Output: data e ora corrente
?>
```

---

### **7. Esempio Completo: Calcolare la Data di Scadenza**

Ecco un esempio che calcola una data di scadenza a partire da una data di inizio aggiungendo un periodo di 30 giorni:

```php
<?php
$dataInizio = new DateTime('2024-09-12');
$dataInizio->modify('+30 days');  // Aggiungi 30 giorni

echo "Data di scadenza: " . $dataInizio->format('Y-m-d');  // Output: Data di scadenza: 2024-10-12
?>
```

---

### **8. Confronto tra Date**

Gli oggetti `DateTime` possono essere confrontati utilizzando gli operatori di confronto normali (`<`, `>`, `==`, ecc.). Il confronto tra due oggetti `DateTime` restituisce `true` o `false`.

#### Esempio

```php
<?php
$data1 = new DateTime('2024-09-12');
$data2 = new DateTime('2024-09-15');

if ($data1 < $data2) {
    echo "La data1 è prima della data2";  // Output: La data1 è prima della data2
}
?>
```

---

### **Conclusione**

La classe **`DateTime`** di PHP è un potente strumento per lavorare con date e orari. Essa consente non solo di rappresentare e formattare le date, ma anche di manipolarle, confrontarle, e gestire il fuso orario in modo efficiente. Grazie ai suoi metodi flessibili, è ideale per lavorare con progetti che richiedono operazioni complesse sulle date.
