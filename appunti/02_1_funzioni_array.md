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

---

## Elenco funzioni

* [array()](http://php.net/manual/en/function.array.php) Crea un array.
* [array_change_key_case()](http://php.net/manual/en/function.array-change-key-case.php) Restituisce un array con tutte le chiavi in minuscolo o maiuscolo.
* [array_chunk()](http://php.net/manual/en/function.array-chunk.php) Divide un array in blocchi di array.
* [array_combine()](http://php.net/manual/en/function.array-combine.php) Crea un array utilizzando un array per le chiavi e un altro per i suoi valori.
* [array_count_values()](http://php.net/manual/en/function.array-count-values.php) Restituisce un array con il numero di occorrenze per ogni valore.
* [array_diff()](http://php.net/manual/en/function.array-diff.php) Confronta i valori dell'array e restituisce le differenze.
* [array_diff_assoc()](http://php.net/manual/en/function.array-diff-assoc.php) Confronta chiavi e valori dell'array e restituisce le differenze.
* [array_diff_key()](http://php.net/manual/en/function.array-diff-key.php) Confronta le chiavi dell'array e restituisce le differenze.
* [array_diff_uassoc()](http://php.net/manual/en/function.array-diff-uassoc.php) Confronta le chiavi ei valori dell'array, con un ulteriore controllo della funzione creata dall'utente, e restituisce le differenze.
* [array_diff_ukey()](http://php.net/manual/en/function.array-diff-ukey.php) Confronta le chiavi dell'array, con un ulteriore controllo della funzione creata dall'utente, e restituisce le differenze.

---

## Elenco funzioni 2

* [array_fill()](http://php.net/manual/en/function.array-fill.php) Riempie un array di valori.
* [array_filter()](http://php.net/manual/en/function.array-filter.php) Filtra gli elementi di un array utilizzando una funzione creata dall'utente.
* [array_flip()](http://php.net/manual/en/function.array-flip.php) Scambia tutte le chiavi con i loro valori associati in un array.
* [array_intersect()](http://php.net/manual/en/function.array-intersect.php) Confronta i valori dell'array e restituisce le corrispondenze.
* [array_intersect_assoc()](http://php.net/manual/en/function.array-intersect-assoc.php) Confronta le chiavi ei valori dell'array e restituisce le corrispondenze.
* [array_intersect_key()](http://php.net/manual/en/function.array-intersect-key.php) Confronta le chiavi dell'array e restituisce le corrispondenze.
* [array_intersect_uassoc()](http://php.net/manual/en/function.array-intersect-uassoc.php) Confronta le chiavi ei valori dell'array, con un ulteriore controllo della funzione creata dall'utente, e restituisce le corrispondenze.
* [array_intersect_ukey()](http://php.net/manual/en/function.array-intersect-ukey.php) Confronta le chiavi dell'array, con un ulteriore controllo della funzione creata dall'utente, e restituisce le corrispondenze.
* [array_key_exists()](http://php.net/manual/en/function.array-key-exists.php) Controlla se la chiave specificata esiste nell'array.
* [array_keys()](http://php.net/manual/en/function.array-keys.php) Restituisce tutte le chiavi di un array.
* [array_map()](http://php.net/manual/en/function.array-map.php) Invia ogni valore di un array a una funzione creata dall'utente, che restituisce nuovi valori.
* [array_merge()](http://php.net/manual/en/function.array-merge.php) Unisce uno o più array in un unico array.
* [array_merge_recursive()](http://php.net/manual/en/function.array-merge-recursive.php) Unisce uno o più array in un unico array.
* [array_multisort()](http://php.net/manual/en/function.array-multisort.php) Ordina array multipli o multidimensionali.

---

## Elenco funzioni 3

* [array_pad()](http://php.net/manual/en/function.array-pad.php) Inserisce un numero specificato di elementi, con un valore specificato, in un array.
* [array_pop()](http://php.net/manual/en/function.array-pop.php) Elimina l'ultimo elemento di un array.
* [array_product()](http://php.net/manual/en/function.array-product.php) Calcola il prodotto dei valori in un array.
* [array_push()](http://php.net/manual/en/function.array-push.php) Inserisce uno o più elementi alla fine di un array.
* [array_rand()](http://php.net/manual/en/function.array-rand.php) Restituisce una o più chiavi casuali da un array.
* [array_reduce()](http://php.net/manual/en/function.array-reduce.php) Restituisce un array come stringa, utilizzando una funzione definita dall'utente.
* [array_reverse()](http://php.net/manual/en/function.array-reverse.php) Restituisce un array nell'ordine inverso.
* [array_search()](http://php.net/manual/en/function.array-search.php) Cerca un array per un dato valore e restituisce la chiave.
* [array_shift()](http://php.net/manual/en/function.array-shift.php) Rimuove il primo elemento da un array e restituisce il valore dell'elemento rimosso.
* [array_slice()](http://php.net/manual/en/function.array-slice.php) Restituisce parti selezionate di un array.
* [array_splice()](http://php.net/manual/en/function.array-splice.php) Rimuove e sostituisce gli elementi specificati di un array.
* [array_sum()](http://php.net/manual/en/function.array-sum.php) Restituisce la somma dei valori in un array.
* [array_udiff()](http://php.net/manual/en/function.array-udiff.php) Confronta i valori dell'array in una funzione creata dall'utente e restituisce un array.
* [array_udiff_assoc()](http://php.net/manual/en/function.array-udiff-assoc.php) Confronta le chiavi dell'array e confronta i valori dell'array in una funzione creata dall'utente e restituisce un array.
* [array_udiff_uassoc()](http://php.net/manual/en/function.array-udiff-uassoc.php) Confronta le chiavi dell'array ei valori dell'array nelle funzioni create dall'utente e restituisce un array.
* [array_uintersect()](http://php.net/manual/en/function.array-uintersect.php) Confronta i valori dell'array in una funzione creata dall'utente e restituisce un array.
* [array_uintersect_assoc()](http://php.net/manual/en/function.array-uintersect-assoc.php) Confronta le chiavi dell'array e confronta i valori dell'array in una funzione creata dall'utente e restituisce un array.
* [array_uintersect_uassoc()](http://php.net/manual/en/function.array-uintersect-uassoc.php) Confronta le chiavi dell'array ei valori dell'array nelle funzioni create dall'utente e restituisce un array.
* [array_unique()](http://php.net/manual/en/function.array-unique.php) Rimuove i valori duplicati da un array.
* [array_unshift()](http://php.net/manual/en/function.array-unshift.php) Aggiunge uno o più elementi all'inizio di un array.

---

## Elenco funzioni 4

* [array_values()](http://php.net/manual/en/function.array-values.php) Restituisce tutti i valori di un array.
* [array_walk()](http://php.net/manual/en/function.array-walk.php) Applica una funzione utente a ogni membro di un array.
* [array_walk_recursive()](http://php.net/manual/en/function.array-walk-recursive.php) Applica una funzione utente in modo ricorsivo a ogni membro di un array.
* [arsort()](http://php.net/manual/en/function.arsort.php) Ordina un array in ordine inverso e mantiene l'associazione dell'indice.
* [asort()](http://php.net/manual/en/function.asort.php) Ordina un array e mantiene l'associazione dell'indice.
* [compact()](http://php.net/manual/en/function.compact.php) Crea un array contenente le variabili ei loro valori.
* [count()](http://php.net/manual/en/function.count.php) Conta gli elementi in un array o le proprietà in un oggetto.
* [current()](http://php.net/manual/en/function.current.php) Restituisce l'elemento corrente in un array.
* [each()](http://php.net/manual/en/function.each.php) Restituisce la coppia chiave e valore corrente da un array.
* [end()](http://php.net/manual/en/function.end.php) Imposta il puntatore interno di un array al suo ultimo elemento.
* [extract()](http://php.net/manual/en/function.extract.php) Importa le variabili nella tabella dei simboli corrente da un array.
* [in_array()](http://php.net/manual/en/function.in-array.php) Controlla se un valore specificato esiste in un array.
* [key()](http://php.net/manual/en/function.key.php) Recupera una chiave da un array.
* [krsort()](http://php.net/manual/en/function.krsort.php) Ordina un array per chiave in ordine inverso.
* [ksort()](http://php.net/manual/en/function.ksort.php) Ordina un array per chiave.
* [list()](http://php.net/manual/en/function.list.php) Assegna le variabili come se fossero un array.

---

## Elenco funzioni 5

* [natcasesort()](http://php.net/manual/en/function.natcasesort.php) Ordina un array usando un " natural="" order"="" algoritmi"=" senza distinzione tra maiuscole e minuscole: natcaseso.
* [natsort()](http://php.net/manual/en/function.natsort.php) Ordina un array usando un " natural="" order"="" algoritmi"=": natso.
* [next()](http://php.net/manual/en/function.next.php) Avanza il puntatore all'array interno di un array.
* [()](http://php.net/manual/en/function.current.php) Alias di current(): p.
* [prev()](http://php.net/manual/en/function.prev.php) Riavvolge il puntatore dell'array interno.
* [range()](http://php.net/manual/en/function.range.php) Crea un array contenente un intervallo di elementi.
* [reset()](http://php.net/manual/en/function.reset.php) Imposta il puntatore interno di un array al suo primo elemento.
* [rsort()](http://php.net/manual/en/function.rsort.php) Ordina un array in ordine inverso.
* [shuffle()](http://php.net/manual/en/function.shuffle.php) Mescola un array.
* [()](http://php.net/manual/en/function.count.php) Alias di count(): size.
* [sort()](http://php.net/manual/en/function.sort.php) Ordina un array.
* [uasort()](http://php.net/manual/en/function.uasort.php) Ordina un array con una funzione definita dall'utente e mantiene l'associazione dell'indice.
* [uksort()](http://php.net/manual/en/function.uksort.php) Ordina un array per chiavi utilizzando una funzione definita dall'utente.
* [usort()](http://php.net/manual/en/function.usort.php) Ordina un array per valori utilizzando una funzione definita dall'utente.
