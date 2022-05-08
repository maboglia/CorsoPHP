# Funzioni per array

* [Elenco completo funzioni per array](https://www.php.net/manual/en/ref.array.php)

* `array_chunk()`
array array_chunk( array input, int dimensione [, bool mantieni_chiavi] )

<?php
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 2));
print_r(array_chunk($input_array, 2, true));
?>

* `array_count_values(), array array_count_values( array input )`

restituisce un array che ha i valori dell'array input per chiavi e la loro frequenza in input come valori.

```php
<?php
$array = array(1, "hello", 1, "world", "hello");
print_r(array_count_values($array));
?>
```
---

* `array array( [mixed ...] )`
Restituisce un array contenente i parametri. Ai parametri si può dare un indice con l'operatore =>.
Leggere la sezione relativa ai tipi per ulteriori informazioni sugli array.
<?php
$array = array(1, 1, 1, 1, 1, 8 => 1, 4 => 1, 19, 3 => 13);
print_r($array);
?>

## esempio
```php
<?php
$primotrimestre = array(1 => 'Gennaio', 'Febbraio', 'Marzo');
print_r($primotrimestre);
?>
```

---

* `bool asort( array array [, int sort_flags] )`
Questa funzione ordina un array in modo tale che i suoi indici mantengano la loro correlazione con
gli elementi ai quali sono associati. Viene usata principalmente nell'ordinamento degli array
associativi, quando la disposizione originaria degli elementi è importante.

* `bool arsort( array array [, int sort_flags] )`
Ordina un array in ordine decrescente e mantiene le associazioni degli indici

* `int count( mixed var [, int mode] )`
Restituisce il numero di elementi in var, la quale è di norma un array, dal momento che qualsiasi
altro oggetto avrà un elemento.

---

* `array each( array array )`
Restituisce la corrente coppia chiave/valore corrente di array e incrementa il puntatore interno
dell'array. Questa coppia è restituita in un array di quattro elementi, con le chiavi 0, 1, key, and value. Gli elementi 0 e key contengono il nome della chiave dell'elemento dell'array, mentre 1 e value contengono i dati.

```php
<?php
$foo = array("bob", "fred", "jussi", "jouni", "egon", "bau");
$bar = each($foo);
print_r($bar);
?>

Array ([1] => bob [value] => bob
[0] => 0 [key] => 0)
```

## Attraversamento di un array con each()

```php
<?php
$frutta = array('a' => 'mela', 'b' => 'pera', 'c' => 'banana');
reset($frutta);
while (list($chiave, $valore) = each($frutta)) {
echo "$chiave => $valore\n";
}
?>
```
---

* `mixed current( array array )`
Restituisce l'elemento corrente di un array
Ogni array ha un puntatore interno all'elemento "corrente", che è inizializzato al primo elemento inserito nell'array. 

La funzione current() restituisce il valore dell'elemento che è attualmente puntato dal puntatore interno. In ogni caso non muove il puntatore. Se il puntatore interno punta oltre la fine della lista di elementi, current() restituisce FALSE.



* `mixed reset( array array )`
reset() riporta il puntatore di array sul primo elemento e ne restituisce il valore.

---

* `mixed next( array array )`
Restituisce l'elemento dell'array che sta nella posizione successiva a quella attuale indicata dal
puntatore interno, oppure FALSE se non ci sono altri elementi.

* `mixed prev( array array )`
Restituisce l'elemento dell'array che sta nella posizione precedente a quella attuale indicata dal
puntatore interno, oppure FALSE se non ci sono altri elementi.

* `mixed end( array array )`
end() fa avanzare il puntatore di array all'ultimo elemento, e restituisce il suo valore.

---

* `bool in_array( mixed ago, array pagliaio [, bool strict] )`
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

