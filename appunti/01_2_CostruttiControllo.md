# Costrutti di controllo

Costrutti di controllo di flusso delle istruzioni

## Sequenza

Elenco di istruzioni fra parentesi graffe

```php
{ 
    <statement> 
    ... 
    <statement> 
}
```

---

## Alternativa - condizione - selezione 

Scelta fra due o più vie alternative (una sì e le altre no)
```php
if (<espressione>){
    //<statement>
    } //if

if (<espressione>){
    //<statement>
    } //if ... else
else 
    //<statement>

if (<espressione>){
    //<statement>
    } //else if
elseif (<espressione>){
    //<statement>
    } 
else 
    //<statement>
```

---

### Attenzione

Nell’utilizzo di istruzioni ‘if/else’ in una funzione o in una classe, si pensa spesso che ‘else’ debba essere necessariamente usato per potenziali risultati.

Ma se il risultato è la restituzione di un valore, ‘else’ non è necessario, perché ‘return’ terminerà la funzione, rendendo ‘else’ inutile.

```php
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
```

---

### Istruzioni switch

Le istruzioni switch sono un ottimo modo per evitare di scrivere infiniti if ed elseif, ma ci sono un paio di cose a cui prestare attenzione:

*   Le istruzioni switch confrontano solo i valori, non il tipo (equivalente a ‘==’)
*   Iterano caso dopo caso finché non viene trovata una corrispondenza. Se non viene trovata, viene eseguita quella di default (se definita)
*   Senza un ‘break’, continueranno a implementare ogni caso finché non raggiungono un break/return
*   In una funzione, l’utilizzo di ‘return’ elimina la necessità per un ‘break’, perché esso termina la funzione

---

```php
    <?php
    $answer = test(2);    
    
    
    function test($a)
    {
        switch ($a) {
            case 1:
                // codice...
                break; // break viene usato per terminare l'istruzione switch
    // sia il codice del 'case 2', sia quello del 'case 3' saranno implementati
            case 2:
                // codice...         
                // senza un break, il confronto continua fino al caso 3
            case 3:
                // codice...
                return $result;    // in una funzione, 'return' termina la funzione
            default:
                // codice...
                return $error;
        }
    }
```

---

## switch

Ha una sintassi articolata:

```php 
switch (<espressione>){
    case <valore1>:
    <statement>...<statement>
    break;

    case <valore2>:
    <statement>...<statement>
    break;
    ... altri case ...
    
    case <valoreN>:
    <statement>...<statement>
    break;
    
    default:
    <statement>...<statement>
    break;
}
```

---

## Iterazione - ripetizione - loop

Costrutti per la esecuzione ripetuta di istruzioni

### while
```while (<espressione>) <statement>```

### do while
```do <statement> while (<espressione>)```

---

### for
```for (<espressione1>;<espressione2>;<espressione3>) <statement>```


### foreach

* sintassi 1

```foreach (<array_expression> as <variabile>) <statement>```

* sintassi 2

```foreach (<array_expression> as <variabileK> => <variabileV>)<statement>```

---

controllo di cicli e selezioni

### break

Interrompe l'esecuzione del costrutto in cui è inserito, tipica applicazione è all'interno dello
switch come visto in precedenza. Può essere utilizzato anche all'interno di for, foreach,
while, do-while, in tal caso interrrompe forzatamente la ripetizione.

### continue

Salta cioè che segue all'interno del costrutto ciclico in cui è inserito, senza però interrompere necessariamente la ripetizione

### return

```return <espressione>```

Interrompe l'esecuzione del metodo corrente e restituisce all'ambiente chiamante il valore
ottenuto valutando l'espressione.

Si rimanda al manuale php http://www.php.net/manual/en/language.control-structures.php
per gli approfondimenti

---

## Operatore `null coalescing`

L'operatore `null coalescing (??)` è stato aggiunto in PHP 7 come scorciatoia per il caso comune di utilizzo di un ternario con `isset`. Restituisce il suo primo operando se esiste e non è nullo; in caso contrario, restituisce il suo secondo operando.

```php
$x = null;
$nome = $x ?? 'sconosciuto'; // "sconosciuto"
```

Questa istruzione è equivalente alla seguente operazione ternaria, che utilizza il costrutto isset.

`$nome = oggetto($x) ? $x : 'sconosciuto';`