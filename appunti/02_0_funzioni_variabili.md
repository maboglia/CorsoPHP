# FUNZIONI DI VARIABILI

* `bool empty ( mixed var )`

Determina se una variabile è da considerare vuota. `empty()` è l'opposto di (boolean) var, tranne che
non viene dato alcun warning quando la variabile non è valorizzata. Nota: `empty()` agisce solo su
variabili, qualsiasi altra cosa genera un errore di parsing. In altre parole, il seguente comando non
funziona: empty(trim($name)).

---

* `float floatval ( mixed var )`

La funzione restituisce il valore di tipo float di var.

* `int intval ( mixed var [, int base] )`

Estrae il valore intero di var, utilizzando la base definita a parametro per la conversione. (La base
vale 10 di default).

* `bool is_array ( mixed var )`

Verifica se il valore dato è un array.
Inoltre, si hanno anche, is_bool, is_float, is_int, is_null, is_numeric, is_string con analoga funzione.

---

* `bool isset ( mixed variabile [, ...] )`

Restituisce **TRUE** se la variabile esiste; **FALSE** in caso contrario.
Se una variabile è stata cancellata con `unset()`, non potrà essere impostata. La funzione `isset()`
restituirà FALSE se viene utilizzata per testare una variabile valorizzata a NULL. Inoltre occorre

notare che il byte NULL ("\0") non equivale alla costante PHP NULL.

* `void unset ( mixed var [, mixed var [, mixed ...]] )`
`unset()` distrugge la variabile specificata. Occorre notare che in PHP 3 la funzione `unset()` restituiva
sempre **TRUE** (in realtà era il valore 1). In PHP 4, invece, la funzione `unset()` non è più una vera
funzione, __ora è una istruzione__. In questa veste non ritorna alcun valore, e cercare di ottenere un
valore dalla funzione unset() produce un errore di parsing.

---

## Elenco funzioni

* [boolval "Ottieni il valore booleano di una variabile"](http://www.php.net/manual/en/function.boolval.php)
* [debug_zval_dump "Scarica una rappresentazione di stringa di un valore zend interno nell'output"](http://www.php.net/manual/en/function.debug-zval-dump.php)
* [doubleval "Alias di floatval"](http://www.php.net/manual/en/function.doubleval.php)
* [vuoto "Determina se una variabile è vuota"](http://www.php.net/manual/en/function.empty.php)
* [floatval "Ottieni il valore float di una variabile"](http://www.php.net/manual/en/function.floatval.php)
* [get_defined_vars "Restituisce un array di tutte le variabili definite"](http://www.php.net/manual/en/function.get-defined-vars.php)
* [get_resource_type "Restituisce il tipo di risorsa"](http://www.php.net/manual/en/function.get-resource-type.php)
* [gettype "Ottieni il tipo di una variabile"](http://www.php.net/manual/en/function.gettype.php)
* [import_request_variables "Importa variabili GET/POST/Cookie nell'ambito globale"](http://www.php.net/manual/en/function.import-request-variables.php)

---

## Elenco funzioni 2

* [intval "Ottieni il valore intero di una variabile"](http://www.php.net/manual/en/function.intval.php)
* [is_array "Trova se una variabile è un array"](http://www.php.net/manual/en/function.is-array.php)
* [is_bool "Scopri se una variabile è booleana"](http://www.php.net/manual/en/function.is-bool.php)
* [is_callable "Verifica che il contenuto di una variabile possa essere chiamato come funzione"](http://www.php.net/manual/en/function.is-callable.php)
* [is_double "Alias di is_float"](http://www.php.net/manual/en/function.is-double.php)
* [is_float "Trova se il tipo di una variabile è float"](http://www.php.net/manual/en/function.is-float.php)
* [is_int "Trova se il tipo di una variabile è intero"](http://www.php.net/manual/en/function.is-int.php)
* [is_integer "Alias di is_int"](http://www.php.net/manual/en/function.is-integer.php)
* [is_long "Alias di is_int"](http://www.php.net/manual/en/function.is-long.php)
* [is_null "Trova se una variabile è NULL"](http://www.php.net/manual/en/function.is-null.php)
* [is_numeric "Trova se una variabile è un numero o una stringa numerica"](http://www.php.net/manual/en/function.is-numeric.php)
* [is_object "Trova se una variabile è un oggetto"](http://www.php.net/manual/en/function.is-object.php)
* [is_real "Alias di is_float"](http://www.php.net/manual/en/function.is-real.php)
* [is_resource "Trova se una variabile è una risorsa"](http://www.php.net/manual/en/function.is-resource.php)
* [is_scalar "Trova se una variabile è uno scalare"](http://www.php.net/manual/en/function.is-scalar.php)
* [is_string "Trova se il tipo di una variabile è stringa"](http://www.php.net/manual/en/function.is-string.php)

---

## Elenco funzioni 3

* [isset "Determina se una variabile è impostata e non è NULL"](http://www.php.net/manual/en/function.isset.php)
* [print_r "Stampa informazioni leggibili su una variabile"](http://www.php.net/manual/en/function.print-r.php)
* [serialize "Genera una rappresentazione memorizzabile di un valore"](http://www.php.net/manual/en/function.serialize.php)
* [settype "Imposta il tipo di una variabile"](http://www.php.net/manual/en/function.settype.php)
* [strval "Ottieni valore stringa di una variabile"](http://www.php.net/manual/en/function.strval.php)
* [unserialize "Crea un valore PHP da una rappresentazione memorizzata"](http://www.php.net/manual/en/function.unserialize.php)
* [unset "Annulla l'impostazione di una determinata variabile"](http://www.php.net/manual/en/function.unset.php)
* [var_dump "Scarica informazioni su una variabile"](http://www.php.net/manual/en/function.var-dump.php)
* [var_export "Emette o restituisce una rappresentazione di stringa analizzabile di una variabile"](http://www.php.net/manual/en/function.var-export.php)
