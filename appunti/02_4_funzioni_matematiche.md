# FUNZIONI MATEMATICHE

* `number abs ( mixed numero )`
Restituisce il valore assoluto di un numero.

* `mixed max ( number arg1, number arg2 [, number ...] )`

* `mixed max ( array numbers [, array ...] )`

* `max() `
restituisce il numericamente più grande dei valori dati come parametro.

* `mixed min ( number arg1, number arg2 [, number ...] )`

* `mixed min ( array numbers [, array ...] )`

* `min() restituisce il numericamente più piccolo dei valori dati come parametro.`

* `float pow ( float base, float esp )`

---

Restituisce base elevato alla potenza di esp. Se possibile, questa funzione restituisce un integer.
Nota: Il PHP non può gestire valori negativi per bases.

* `int rand ( [int min, int max] )`

Se chiamata senza i parametri opzionali min, max, rand() restituisce un valore pseudo casuale
compreso fra 0 e RAND_MAX. Se ad esempio si desidera un numero casuale compreso fra 5 e 15
(inclusi) usare rand (5, 15).

* `double round ( double val [, int precisione] )`
Restituisce il valore arrotondato di val con la precisione specificata (numero di cifre dopo il punto
decimale). precisione può anche essere negativa o zero (predefinito).

---


### Elenco Funzioni Matematiche

| Funzione | Descrizione |
|----------|-------------|
| [abs()](http://php.net/manual/en/function.abs.php) | Restituisce il valore assoluto di un numero. |
| [acos()](http://php.net/manual/en/function.acos.php) | Restituisce l'arcocoseno di un numero. |
| [acosh()](http://php.net/manual/en/function.acosh.php) | Restituisce l'inverso del coseno iperbolico di un numero. |
| [asin()](http://php.net/manual/en/function.asin.php) | Restituisce l'arcoseno di un numero. |
| [asinh()](http://php.net/manual/en/function.asinh.php) | Restituisce l'inverso del seno iperbolico di un numero. |
| [atan()](http://php.net/manual/en/function.atan.php) | Restituisce l'arcotangente di un numero come valore numerico compreso tra -PI/2 e PI/2 radianti. |
| [atan2()](http://php.net/manual/en/function.atan2.php) | Restituisce l'angolo theta di un punto (x,y) come valore numerico compreso tra -PI e PI radianti. |
| [atanh()](http://php.net/manual/en/function.atanh.php) | Restituisce la tangente iperbolica inversa di un numero. |
| [base_convert()](http://php.net/manual/en/function.base-convert.php) | Converte un numero da una base all'altra. |
| [bindec()](http://php.net/manual/en/function.bindec.php) | Converte un numero binario in un numero decimale. |
| [ceil()](http://php.net/manual/en/function.ceil.php) | Restituisce il valore di un numero arrotondato per eccesso all'intero più vicino. |
| [cos()](http://php.net/manual/en/function.cos.php) | Restituisce il coseno di un numero. |
| [cosh()](http://php.net/manual/en/function.cosh.php) | Restituisce il coseno iperbolico di un numero. |
---

Ecco la tabella con le funzioni matematiche aggiuntive:

### Elenco Funzioni 2

| Funzione | Descrizione |
|----------|-------------|
| [decbin()](http://php.net/manual/en/function.decbin.php) | Converte un numero decimale in un numero binario. |
| [dechex()](http://php.net/manual/en/function.dechex.php) | Converte un numero decimale in un numero esadecimale. |
| [decoct()](http://php.net/manual/en/function.decoct.php) | Converte un numero decimale in un numero ottale. |
| [deg2rad()](http://php.net/manual/en/function.deg2rad.php) | Converte un grado in radianti. |
| [exp()](http://php.net/manual/en/function.exp.php) | Restituisce il valore di E elevato alla potenza di un numero. |
| [expm1()](http://php.net/manual/en/function.expm1.php) | Restituisce E elevato alla potenza di un numero meno 1. |
| [floor()](http://php.net/manual/en/function.floor.php) | Restituisce il valore di un numero arrotondato per difetto all'intero più vicino. |
| [fmod()](http://php.net/manual/en/function.fmod.php) | Restituisce il resto (modulo) della divisione degli argomenti. |
| [getrandmax()](http://php.net/manual/en/function.rand.php) | Restituisce il numero massimo casuale che può essere restituito da una chiamata alla funzione rand(). |
| [hexdec()](http://php.net/manual/en/function.hexdec.php) | Converte un numero esadecimale in un numero decimale. |
| [hypot()](http://php.net/manual/en/function.hypot.php) | Restituisce la lunghezza dell'ipotenusa di un triangolo rettangolo. |
| [is_finite()](http://php.net/manual/en/function.is-finite.php) | Restituisce true se un valore è un numero finito. |
| [is_infinite()](http://php.net/manual/en/function.is-infinite.php) | Restituisce true se un valore è un numero infinito. |
| [is_nan()](http://php.net/manual/en/function.is-nan.php) | Restituisce true se un valore non è un numero. |
| [lcg_value()](http://php.net/manual/en/function.lcg-value.php) | Restituisce un numero pseudo casuale nell'intervallo di (0,1). |
| [log()](http://php.net/manual/en/function.log.php) | Restituisce il logaritmo naturale (in base E) di un numero. |
| [log10()](http://php.net/manual/en/function.log10.php) | Restituisce il logaritmo in base 10 di un numero. |
| [log1p()](http://php.net/manual/en/function.log1p.php) | Restituisce log(1+numero). |

---

Ecco la tabella con le funzioni di manipolazione delle stringhe e di crittografia:

### Elenco Funzioni 3

| Funzione | Descrizione |
|----------|-------------|
| [addcslashes()](http://php.net/manual/en/function.addcslashes.php) | Restituisce una stringa con barre rovesciate davanti ai caratteri specificati. |
| [addslashes()](http://php.net/manual/en/function.addslashes.php) | Restituisce una stringa con barre rovesciate davanti a caratteri predefiniti. |
| [bin2hex()](http://php.net/manual/en/function.bin2hex.php) | Converte una stringa di caratteri ASCII in valori esadecimali. |
| [chop()](http://php.net/manual/en/function.rtrim.php) | Alias di `rtrim()`, rimuove spazi bianchi dalla fine di una stringa. |
| [chr()](http://php.net/manual/en/function.chr.php) | Restituisce un carattere da un valore ASCII specificato. |
| [chunk_split()](http://php.net/manual/en/function.chunk-split.php) | Divide una stringa in una serie di parti più piccole. |
| [convert_cyr_string()](http://php.net/manual/en/function.convert-cyr-string.php) | Converte una stringa da un set di caratteri cirillici a un altro. |
| [convert_uudecode()](http://php.net/manual/en/function.convert-uudecode.php) | Decodifica una stringa uuencoded. |
| [convert_uuencode()](http://php.net/manual/en/function.convert-uuencode.php) | Codifica una stringa usando l'algoritmo uuencode. |
| [count_chars()](http://php.net/manual/en/function.count-chars.php) | Restituisce quante volte un carattere ASCII ricorre all'interno di una stringa e restituisce le informazioni. |
| [crc32()](http://php.net/manual/en/function.crc32.php) | Calcola un CRC a 32 bit per una stringa. |
| [crypt()](http://php.net/manual/en/function.crypt.php) | Crittografia stringa unidirezionale (hashing). |
