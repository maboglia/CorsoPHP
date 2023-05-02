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

## Elenco funzioni


* [abs() "Restituisce il valore assoluto di un numero"](http://php.net/manual/en/function.abs.php)
* [acos() "Restituisce l'arcocoseno di un numero"](http://php.net/manual/en/function.acos.php)
* [acosh() "Restituisce l'inverso del coseno iperbolico di un numero "](http://php.net/manual/en/function.acosh.php)
* [asin() "Restituisce l'arcoseno di un numero"](http://php.net/manual/en/function.asin.php)
* [asinh() "Restituisce l'inverso del seno iperbolico di un numero"](http://php.net/manual/en/function.asinh.php)
* [atan() "Restituisce l'arcotangente di un numero come valore numerico compreso tra -PI/2 e PI/2 radianti"](http://php.net/manual/en/function.atan.php)
* [atan2() "Restituisce l'angolo theta di un punto (x,y) come valore numerico compreso tra -PI e PI radianti"](http://php.net/manual/en/function.atan2.php)
* [atanh() "Restituisce la tangente iperbolica inversa di un numero"](http://php.net/manual/en/function.atanh.php)
* [base_convert() "Converte un numero da una base all'altra"](http://php.net/manual/en/function.base-convert.php)
* [bindec() "Converte un numero binario in un numero decimale"](http://php.net/manual/en/function.bindec.php)
* [ceil() "Restituisce il valore di un numero arrotondato per eccesso all'intero più vicino"](http://php.net/manual/en/function.ceil.php)
* [cos() "Restituisce il coseno di un numero"](http://php.net/manual/en/function.cos.php)
* [cosh() "Restituisce il coseno iperbolico di un numero"](http://php.net/manual/en/function.cosh.php)

---

## Elenco funzioni 2

* [decbin() "Converte un numero decimale in un numero binario"](http://php.net/manual/en/function.decbin.php)
* [dechex() "Converte un numero decimale in un numero esadecimale"](http://php.net/manual/en/function.dechex.php)
* [decoct() "Converte un numero decimale in un numero ottale"](http://php.net/manual/en/function.decoct.php)
* [deg2rad() "Converte un grado in un numero in radianti"](http://php.net/manual/en/function.deg2rad.php)
* [exp() "Restituisce il valore di E"](http://php.net/manual/en/function.exp.php)
* [expm1() "Restituisce il valore di E"](http://php.net/manual/en/function.expm1.php)
* [floor() "Restituisce il valore di un numero arrotondato per difetto all'intero più vicino"](http://php.net/manual/en/function.floor.php)
* [fmod() "Restituisce il resto (modulo) della divisione degli argomenti"](http://php.net/manual/en/function.fmod.php)
* [getrandmax() "Restituisce il numero massimo casuale che può essere restituito da una chiamata alla funzione rand()"](http://php.net/manual/en/function.rand.php)
* [hexdec() "Converte un numero esadecimale in un numero decimale"](http://php.net/manual/en/function.hexdec.php)
* [hypot() "Restituisce la lunghezza dell'ipotenusa di un triangolo rettangolo"](http://php.net/manual/en/function.hypot.php)
* [is_finite() "Restituisce true se un valore è un numero finito"](http://php.net/manual/en/function.is-finite.php)
* [is_infinite() "Restituisce true se un valore è un numero infinito"](http://php.net/manual/en/function.is-infinite.php)
* [is_nan() "Restituisce true se un valore non è un numero"](http://php.net/manual/en/function.is-nan.php)
* [lcg_value() "Restituisce un numero pseudo casuale nell'intervallo di (0,1)>](http://php.net/manual/en/function.lcg-value.php)
* [log() "Restituisce il logaritmo naturale (in base E) di un numero"](http://php.net/manual/en/function.log.php)
* [log10() "Restituisce il logaritmo in base 10 di un numero"](http://php.net/manual/en/function.log10.php)
* [log1p() "Restituisce log(1+numero)>](http://php.net/manual/en/function.log.php)

---

## Elenco funzioni 3

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
