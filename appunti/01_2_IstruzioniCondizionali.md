# Istruzioni condizionali

## Istruzioni if

Nell’utilizzo di istruzioni ‘if/else’ in una funzione o in una classe, si pensa spesso che ‘else’ debba essere necessariamente usato per potenziali risultati. Ma se il risultato è la restituzione di un valore, ‘else’ non è necessario, perché ‘return’ terminerà la funzione, rendendo ‘else’ inutile.

    <?php
    function test($a)
    {
        if ($a) {
            return true;
        } else {
            return false;
        }
    }
    
    // contro
    
    function test($a)
    {
        if ($a) {
            return true;
        }
        return false;    // else non è necessario
    }

*   [Costrutti if](http://php.net/control-structures.if)

## Istruzioni switch

Le istruzioni switch sono un ottimo modo per evitare di scrivere infiniti if ed elseif, ma ci sono un paio di cose a cui prestare attenzione:

*   Le istruzioni switch confrontano solo i valori, non il tipo (equivalente a ‘==’)
*   Iterano caso dopo caso finché non viene trovata una corrispondenza. Se non viene trovata, viene eseguita quella di default (se definita)
*   Senza un ‘break’, continueranno a implementare ogni caso finché non raggiungono un break/return
*   In una funzione, l’utilizzo di ‘return’ elimina la necessità per un ‘break’, perché esso termina la funzione

    <?php
    $answer = test(2);    // sia il codice del 'case 2', sia quello del 'case 3' saranno implementati
    
    function test($a)
    {
        switch ($a) {
            case 1:
                // codice...
                break;             // break viene usato per terminare l'istruzione switch
            case 2:
                // codice...         // senza un break, il confronto continua fino al caso 3
            case 3:
                // codice...
                return $result;    // in una funzione, 'return' termina la funzione
            default:
                // codice...
                return $error;
        }
    }

*   [Istruzioni switch](http://php.net/control-structures.switch)
*   [PHP switch](http://phpswitch.com/)