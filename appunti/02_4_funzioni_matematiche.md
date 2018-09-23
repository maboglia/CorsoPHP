# FUNZIONI MATEMATICHE

## number abs ( mixed numero )
Restituisce il valore assoluto di un numero.

## mixed max ( number arg1, number arg2 [, number ...] )

## mixed max ( array numbers [, array ...] )

## max() restituisce il numericamente più grande dei valori dati come parametro.

## mixed min ( number arg1, number arg2 [, number ...] )

## mixed min ( array numbers [, array ...] )

## min() restituisce il numericamente più piccolo dei valori dati come parametro.

## float pow ( float base, float esp )

Restituisce base elevato alla potenza di esp. Se possibile, questa funzione restituisce un integer.
Nota: Il PHP non può gestire valori negativi per bases.

## int rand ( [int min, int max] )

Se chiamata senza i parametri opzionali min, max, rand() restituisce un valore pseudo casuale
compreso fra 0 e RAND_MAX. Se ad esempio si desidera un numero casuale compreso fra 5 e 15
(inclusi) usare rand (5, 15).

## double round ( double val [, int precisione] )
Restituisce il valore arrotondato di val con la precisione specificata (numero di cifre dopo il punto
decimale). precisione può anche essere negativa o zero (predefinito).