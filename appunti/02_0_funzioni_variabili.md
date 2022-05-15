# FUNZIONI DI VARIABILI

## bool empty ( mixed var )

Determina se una variabile è da considerare vuota. empty() è l'opposto di (boolean) var, tranne che
non viene dato alcun warning quando la variabile non è valorizzata. Nota: empty() agisce solo su
variabili, qualsiasi altra cosa genera un errore di parsing. In altre parole, il seguente comando non
funziona: empty(trim($name)).

---

## float floatval ( mixed var )

La funzione restituisce il valore di tipo float di var.

## int intval ( mixed var [, int base] )

Estrae il valore intero di var, utilizzando la base definita a parametro per la conversione. (La base
vale 10 di default).

## bool is_array ( mixed var )

Verifica se il valore dato è un array.
Inoltre, si hanno anche, is_bool, is_float, is_int, is_null, is_numeric, is_string con analoga funzione.

---

## bool isset ( mixed variabile [, ...] )

Restituisce TRUE se la variabile esiste; FALSE in caso contrario.
Se una variabile è stata cancellata con unset(), non potrà essere impostata. La funzione isset()
restituirà FALSE se viene utilizzata per testare una variabile valorizzata a NULL. Inoltre occorre

notare che il byte NULL ("\0") non equivale alla costante PHP NULL.

## void unset ( mixed var [, mixed var [, mixed ...]] )
unset() distrugge la variabile specificata. Occorre notare che in PHP 3 la funzione unset() restituiva
sempre TRUE (in realtà era il valore 1). In PHP 4, invece, la funzione unset() non è più una vera
funzione, __ora è una istruzione__. In questa veste non ritorna alcun valore, e cercare di ottenere un
valore dalla funzione unset() produce un errore di parsing.

---

## Elenco funzioni

* [boolval "Get the boolean value of a variable"](http://www.php.net/manual/en/function.boolval.php)
* [debug_zval_dump "Dumps a string representation of an internal zend value to output"](http://www.php.net/manual/en/function.debug-zval-dump.php)
* [doubleval "Alias of floatval"](http://www.php.net/manual/en/function.doubleval.php)
* [empty "Determine whether a variable is empty"](http://www.php.net/manual/en/function.empty.php)
* [floatval "Get float value of a variable"](http://www.php.net/manual/en/function.floatval.php)
* [get_defined_vars "Returns an array of all defined variables"](http://www.php.net/manual/en/function.get-defined-vars.php)
* [get_resource_type "Returns the resource type"](http://www.php.net/manual/en/function.get-resource-type.php)
* [gettype "Get the type of a variable"](http://www.php.net/manual/en/function.gettype.php)
* [import_request_variables "Import GET/POST/Cookie variables into the global scope"](http://www.php.net/manual/en/function.import-request-variables.php)
* [intval "Get the integer value of a variable"](http://www.php.net/manual/en/function.intval.php)
* [is_array "Finds whether a variable is an array"](http://www.php.net/manual/en/function.is-array.php)
* [is_bool "Finds out whether a variable is a boolean"](http://www.php.net/manual/en/function.is-bool.php)
* [is_callable "Verify that the contents of a variable can be called as a function"](http://www.php.net/manual/en/function.is-callable.php)
* [is_double "Alias of is_float"](http://www.php.net/manual/en/function.is-double.php)
* [is_float "Finds whether the type of a variable is float"](http://www.php.net/manual/en/function.is-float.php)
* [is_int "Find whether the type of a variable is integer"](http://www.php.net/manual/en/function.is-int.php)
* [is_integer "Alias of is_int"](http://www.php.net/manual/en/function.is-integer.php)
* [is_long "Alias of is_int"](http://www.php.net/manual/en/function.is-long.php)
* [is_null "Finds whether a variable is NULL"](http://www.php.net/manual/en/function.is-null.php)
* [is_numeric "Finds whether a variable is a number or a numeric string"](http://www.php.net/manual/en/function.is-numeric.php)
* [is_object "Finds whether a variable is an object"](http://www.php.net/manual/en/function.is-object.php)
* [is_real "Alias of is_float"](http://www.php.net/manual/en/function.is-real.php)
* [is_resource "Finds whether a variable is a resource"](http://www.php.net/manual/en/function.is-resource.php)
* [is_scalar "Finds whether a variable is a scalar"](http://www.php.net/manual/en/function.is-scalar.php)
* [is_string "Find whether the type of a variable is string"](http://www.php.net/manual/en/function.is-string.php)
* [isset "Determine if a variable is set and is not NULL"](http://www.php.net/manual/en/function.isset.php)
* [print_r "Prints human-readable information about a variable"](http://www.php.net/manual/en/function.print-r.php)
* [serialize "Generates a storable representation of a value"](http://www.php.net/manual/en/function.serialize.php)
* [settype "Set the type of a variable"](http://www.php.net/manual/en/function.settype.php)
* [strval "Get string value of a variable"](http://www.php.net/manual/en/function.strval.php)
* [unserialize "Creates a PHP value from a stored representation"](http://www.php.net/manual/en/function.unserialize.php)
* [unset "Unset a given variable"](http://www.php.net/manual/en/function.unset.php)
* [var_dump "Dumps information about a variable"](http://www.php.net/manual/en/function.var-dump.php)
* [var_export "Outputs or returns a parsable string representation of a variable"](http://www.php.net/manual/en/function.var-export.php)
