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
