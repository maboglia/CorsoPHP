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

### Elenco funzioni 1

| Nome funzione | Descrizione |
|---------------|-------------|
| [boolval](http://www.php.net/manual/en/function.boolval.php) | Ottieni il valore booleano di una variabile |
| [debug_zval_dump](http://www.php.net/manual/en/function.debug-zval-dump.php) | Scarica una rappresentazione di stringa di un valore zend interno nell'output |
| [doubleval](http://www.php.net/manual/en/function.doubleval.php) | Alias di floatval |
| [empty](http://www.php.net/manual/en/function.empty.php) | Determina se una variabile è vuota |
| [floatval](http://www.php.net/manual/en/function.floatval.php) | Ottieni il valore float di una variabile |
| [get_defined_vars](http://www.php.net/manual/en/function.get-defined-vars.php) | Restituisce un array di tutte le variabili definite |
| [get_resource_type](http://www.php.net/manual/en/function.get-resource-type.php) | Restituisce il tipo di risorsa |
| [gettype](http://www.php.net/manual/en/function.gettype.php) | Ottieni il tipo di una variabile |
| [import_request_variables](http://www.php.net/manual/en/function.import-request-variables.php) | Importa variabili GET/POST/Cookie nell'ambito globale |

---

### Elenco funzioni 2

| Nome funzione | Descrizione |
|---------------|-------------|
| [intval](http://www.php.net/manual/en/function.intval.php) | Ottieni il valore intero di una variabile |
| [is_array](http://www.php.net/manual/en/function.is-array.php) | Trova se una variabile è un array |
| [is_bool](http://www.php.net/manual/en/function.is-bool.php) | Scopri se una variabile è booleana |
| [is_callable](http://www.php.net/manual/en/function.is-callable.php) | Verifica che il contenuto di una variabile possa essere chiamato come funzione |
| [is_double](http://www.php.net/manual/en/function.is-double.php) | Alias di is_float |
| [is_float](http://www.php.net/manual/en/function.is-float.php) | Trova se il tipo di una variabile è float |
| [is_int](http://www.php.net/manual/en/function.is-int.php) | Trova se il tipo di una variabile è intero |
| [is_integer](http://www.php.net/manual/en/function.is-integer.php) | Alias di is_int |
| [is_long](http://www.php.net/manual/en/function.is-long.php) | Alias di is_int |
| [is_null](http://www.php.net/manual/en/function.is-null.php) | Trova se una variabile è NULL |
| [is_numeric](http://www.php.net/manual/en/function.is-numeric.php) | Trova se una variabile è un numero o una stringa numerica |
| [is_object](http://www.php.net/manual/en/function.is-object.php) | Trova se una variabile è un oggetto |
| [is_real](http://www.php.net/manual/en/function.is-real.php) | Alias di is_float |
| [is_resource](http://www.php.net/manual/en/function.is-resource.php) | Trova se una variabile è una risorsa |
| [is_scalar](http://www.php.net/manual/en/function.is-scalar.php) | Trova se una variabile è uno scalare |
| [is_string](http://www.php.net/manual/en/function.is-string.php) | Trova se il tipo di una variabile è stringa |

---

### Elenco funzioni 3

| Nome funzione | Descrizione |
|---------------|-------------|
| [isset](http://www.php.net/manual/en/function.isset.php) | Determina se una variabile è impostata e non è NULL |
| [print_r](http://www.php.net/manual/en/function.print-r.php) | Stampa informazioni leggibili su una variabile |
| [serialize](http://www.php.net/manual/en/function.serialize.php) | Genera una rappresentazione memorizzabile di un valore |
| [settype](http://www.php.net/manual/en/function.settype.php) | Imposta il tipo di una variabile |
| [strval](http://www.php.net/manual/en/function.strval.php) | Ottieni valore stringa di una variabile |
| [unserialize](http://www.php.net/manual/en/function.unserialize.php) | Crea un valore PHP da una rappresentazione memorizzata |
| [unset](http://www.php.net/manual/en/function.unset.php) | Annulla l'impostazione di una determinata variabile |
| [var_dump](http://www.php.net/manual/en/function.var-dump.php) | Scarica informazioni su una variabile |
| [var_export](http://www.php.net/manual/en/function.var-export.php) | Emette o restituisce una rappresentazione di stringa analizzabile di una variabile |
