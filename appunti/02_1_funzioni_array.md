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
if (in_array("macos", $os))``
echo "Trovato macos";
?>
```

**NB: La seconda condizione fallisce perché in_array() è case sensitive**

* [array()](http://php.net/manual/en/function.array.php)[Creates an array: ]
* [array_change_key_case()](http://php.net/manual/en/function.array-change-key-case.php)[Returns an array with all keys in lowercase or uppercase: ]
* [array_chunk()](http://php.net/manual/en/function.array-chunk.php)[Splits an array into chunks of arrays: ]
* [array_combine()](http://php.net/manual/en/function.array-combine.php)[Creates an array by using one array for keys and another for its values: ]
* [array_count_values()](http://php.net/manual/en/function.array-count-values.php)[Returns an array with the number of occurrences for each value: ]
* [array_diff()](http://php.net/manual/en/function.array-diff.php)[Compares array values, and returns the differences: ]
* [array_diff_assoc()](http://php.net/manual/en/function.array-diff-assoc.php)[Compares array keys and values, and returns the differences: ]
* [array_diff_key()](http://php.net/manual/en/function.array-diff-key.php)[Compares array keys, and returns the differences: ]
* [array_diff_uassoc()](http://php.net/manual/en/function.array-diff-uassoc.php)[Compares array keys and values, with an additional user-made function check, and returns the differences: ]
* [array_diff_ukey()](http://php.net/manual/en/function.array-diff-ukey.php)[Compares array keys, with an additional user-made function check, and returns the differences: ]
* [array_fill()](http://php.net/manual/en/function.array-fill.php)[Fills an array with values: ]
* [array_filter()](http://php.net/manual/en/function.array-filter.php)[Filters elements of an array using a user-made function: ]
* [array_flip()](http://php.net/manual/en/function.array-flip.php)[Exchanges all keys with their associated values in an array: ]
* [array_intersect()](http://php.net/manual/en/function.array-intersect.php)[Compares array values, and returns the matches: ]
* [array_intersect_assoc()](http://php.net/manual/en/function.array-intersect-assoc.php)[Compares array keys and values, and returns the matches: ]
* [array_intersect_key()](http://php.net/manual/en/function.array-intersect-key.php)[Compares array keys, and returns the matches: ]
* [array_intersect_uassoc()](http://php.net/manual/en/function.array-intersect-uassoc.php)[Compares array keys and values, with an additional user-made function check, and returns the matches: ]
* [array_intersect_ukey()](http://php.net/manual/en/function.array-intersect-ukey.php)[Compares array keys, with an additional user-made function check, and returns the matches: ]
* [array_key_exists()](http://php.net/manual/en/function.array-key-exists.php)[Checks if the specified key exists in the array: ]
* [array_keys()](http://php.net/manual/en/function.array-keys.php)[Returns all the keys of an array: ]
* [array_map()](http://php.net/manual/en/function.array-map.php)[Sends each value of an array to a user-made function, which returns new values: ]
* [array_merge()](http://php.net/manual/en/function.array-merge.php)[Merges one or more arrays into one array: ]
* [array_merge_recursive()](http://php.net/manual/en/function.array-merge-recursive.php)[Merges one or more arrays into one array: ]
* [array_multisort()](http://php.net/manual/en/function.array-multisort.php)[Sorts multiple or multi-dimensional arrays: ]
* [array_pad()](http://php.net/manual/en/function.array-pad.php)[Inserts a specified number of items, with a specified value, to an array: ]
* [array_pop()](http://php.net/manual/en/function.array-pop.php)[Deletes the last element of an array: ]
* [array_product()](http://php.net/manual/en/function.array-product.php)[Calculates the product of the values in an array: ]
* [array_push()](http://php.net/manual/en/function.array-push.php)[Inserts one or more elements to the end of an array: ]
* [array_rand()](http://php.net/manual/en/function.array-rand.php)[Returns one or more random keys from an array: ]
* [array_reduce()](http://php.net/manual/en/function.array-reduce.php)[Returns an array as a string, using a user-defined function: ]
* [array_reverse()](http://php.net/manual/en/function.array-reverse.php)[Returns an array in the reverse order: ]
* [array_search()](http://php.net/manual/en/function.array-search.php)[Searches an array for a given value and returns the key: ]
* [array_shift()](http://php.net/manual/en/function.array-shift.php)[Removes the first element from an array, and returns the value of the removed element: ]
* [array_slice()](http://php.net/manual/en/function.array-slice.php)[Returns selected parts of an array: ]
* [array_splice()](http://php.net/manual/en/function.array-splice.php)[Removes and replaces specified elements of an array: ]
* [array_sum()](http://php.net/manual/en/function.array-sum.php)[Returns the sum of the values in an array: ]
* [array_udiff()](http://php.net/manual/en/function.array-udiff.php)[Compares array values in a user-made function and returns an array: ]
* [array_udiff_assoc()](http://php.net/manual/en/function.array-udiff-assoc.php)[Compares array keys, and compares array values in a user-made function, and returns an array: ]
* [array_udiff_uassoc()](http://php.net/manual/en/function.array-udiff-uassoc.php)[Compares array keys and array values in user-made functions, and returns an array: ]
* [array_uintersect()](http://php.net/manual/en/function.array-uintersect.php)[Compares array values in a user-made function and returns an array: ]
* [array_uintersect_assoc()](http://php.net/manual/en/function.array-uintersect-assoc.php)[Compares array keys, and compares array values in a user-made function, and returns an array: ]
* [array_uintersect_uassoc()](http://php.net/manual/en/function.array-uintersect-uassoc.php)[Compares array keys and array values in user-made functions, and returns an array: ]
* [array_unique()](http://php.net/manual/en/function.array-unique.php)[Removes duplicate values from an array: ]
* [array_unshift()](http://php.net/manual/en/function.array-unshift.php)[Adds one or more elements to the beginning of an array: ]
* [array_values()](http://php.net/manual/en/function.array-values.php)[Returns all the values of an array: ]
* [array_walk()](http://php.net/manual/en/function.array-walk.php)[Applies a user function to every member of an array: ]
* [array_walk_recursive()](http://php.net/manual/en/function.array-walk-recursive.php)[Applies a user function recursively to every member of an array: ]
* [arsort()](http://php.net/manual/en/function.arsort.php)[Sorts an array in reverse order and maintain index association: ]
* [asort()](http://php.net/manual/en/function.asort.php)[Sorts an array and maintain index association: ]
* [compact()](http://php.net/manual/en/function.compact.php)[Create array containing variables and their values: ]
* [count()](http://php.net/manual/en/function.count.php)[Counts elements in an array, or properties in an object: ]
* [current()](http://php.net/manual/en/function.current.php)[Returns the current element in an array: ]
* [each()](http://php.net/manual/en/function.each.php)[Returns the current key and value pair from an array: ]
* [end()](http://php.net/manual/en/function.end.php)[Sets the internal pointer of an array to its last element: ]
* [extract()](http://php.net/manual/en/function.extract.php)[Imports variables into the current symbol table from an array: ]
* [in_array()](http://php.net/manual/en/function.in-array.php)[Checks if a specified value exists in an array: ]
* [key()](http://php.net/manual/en/function.key.php)[Fetches a key from an array: ]
* [krsort()](http://php.net/manual/en/function.krsort.php)[Sorts an array by key in reverse order: ]
* [ksort()](http://php.net/manual/en/function.ksort.php)[Sorts an array by key: ]
* [list()](http://php.net/manual/en/function.list.php)[Assigns variables as if they were an array: ]
* [()](http://php.net/manual/en/function.natcasesort.php)[Sorts an array using a case insensitive " natural="" order"="" algorithm"=": natcasesort]
* [()](http://php.net/manual/en/function.natsort.php)[Sorts an array using a " natural="" order"="" algorithm"=": natsort]
* [next()](http://php.net/manual/en/function.next.php)[Advance the internal array pointer of an array: ]
* [()](http://php.net/manual/en/function.current.php)[Alias of current(): pos]
* [prev()](http://php.net/manual/en/function.prev.php)[Rewinds the internal array pointer: ]
* [range()](http://php.net/manual/en/function.range.php)[Creates an array containing a range of elements: ]
* [reset()](http://php.net/manual/en/function.reset.php)[Sets the internal pointer of an array to its first element: ]
* [rsort()](http://php.net/manual/en/function.rsort.php)[Sorts an array in reverse order: ]
* [shuffle()](http://php.net/manual/en/function.shuffle.php)[Shuffles an array: ]
* [()](http://php.net/manual/en/function.count.php)[Alias of count(): sizeof]
* [sort()](http://php.net/manual/en/function.sort.php)[Sorts an array: ]
* [uasort()](http://php.net/manual/en/function.uasort.php)[Sorts an array with a user-defined function and maintain index association: ]
* [uksort()](http://php.net/manual/en/function.uksort.php)[Sorts an array by keys using a user-defined function: ]
* [usort()](http://php.net/manual/en/function.usort.php)[Sorts an array by values using a user-defined  function: ]
