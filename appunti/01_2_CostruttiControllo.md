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
```

```php

if (<espressione>){
    //<statement>
    } //if ... else
else 
    //<statement>
```

```php

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

## PHP8 `match`

In PHP, la funzione `match` è stata introdotta a partire dalla versione **PHP 8** come una nuova espressione simile al tradizionale costrutto `switch`, ma con alcune differenze chiave:

- **Restituisce un valore**: `match` è un'espressione, quindi restituisce direttamente un valore. A differenza di `switch`, non ha bisogno di usare `break` per evitare esecuzioni indesiderate.
- **Confronto rigoroso**: `match` usa il confronto rigoroso (`===`), il che significa che confronta sia il valore che il tipo.
- **Semplicità**: `match` è più compatto e leggibile, evitando la necessità di un blocco `break` dopo ogni caso.

### Sintassi di `match`

```php
$result = match ($variable) {
    valore1 => azione1,
    valore2 => azione2,
    valoreN => azioneN,
    default => azioneDefault,
};
```

### Differenze con `switch`
- **Nessun bisogno di `break`**: In `match`, ogni condizione esprime direttamente un valore senza la necessità di interrompere manualmente il flusso con `break`.
- **Confronto rigoroso (`===`)**: A differenza di `switch` che usa il confronto debole (`==`), `match` usa il confronto rigoroso.
- **Restituisce sempre un valore**: Essendo un'espressione, `match` deve restituire un valore in tutti i casi.

### Esempio di utilizzo di `match`

Ecco un esempio semplice per mostrare la differenza tra `switch` e `match`.

#### Con `switch`

```php
$valore = 2;
switch ($valore) {
    case 1:
        $risultato = "Uno";
        break;
    case 2:
        $risultato = "Due";
        break;
    case 3:
        $risultato = "Tre";
        break;
    default:
        $risultato = "Non trovato";
        break;
}

echo $risultato;  // Output: Due
```

#### Con `match`

```php
$valore = 2;
$risultato = match ($valore) {
    1 => "Uno",
    2 => "Due",
    3 => "Tre",
    default => "Non trovato",
};

echo $risultato;  // Output: Due
```

### Esempio con tipi di dati diversi

Poiché `match` usa il confronto rigoroso, distingue tra tipi di dati:

```php
$valore = '2';  // stringa
$risultato = match ($valore) {
    1 => "Intero 1",
    2 => "Intero 2",
    '2' => "Stringa 2",
    default => "Non trovato",
};

echo $risultato;  // Output: Stringa 2
```

### Esempio complesso con espressioni multiple

Puoi anche combinare più valori in un singolo caso di `match`:

```php
$esito = 'vittoria';

$risultato = match ($esito) {
    'vittoria', 'successo' => 'Hai vinto!',
    'sconfitta', 'fallimento' => 'Hai perso!',
    default => 'Stato sconosciuto',
};

echo $risultato;  // Output: Hai vinto!
```

### Vantaggi di `match`
- **Codice più pulito**: `match` richiede meno righe di codice rispetto a `switch` e rende la logica più leggibile.
- **Confronto rigoroso**: Elimina il comportamento ambiguo che può derivare dal confronto debole di `switch`.
- **Obbligo di coprire tutti i casi**: Se non definisci un caso `default` e nessuna delle condizioni viene soddisfatta, PHP lancerà un'eccezione, il che aiuta a evitare bug derivanti da mancate coperture di casi.

---

## Iterazione - ripetizione - loop

Costrutti per la esecuzione ripetuta di istruzioni

### while
`while (<espressione>) <statement>`

### do while
`do <statement> while (<espressione>)`

---

### for
`for (<espressione1>;<espressione2>;<espressione3>) <statement>`


### foreach

* sintassi 1

`foreach (<array_expression> as <variabile>) <statement>`

* sintassi 2

`foreach (<array_expression> as <variabileK> => <variabileV>)<statement>`

---

controllo di cicli e selezioni

### break

Interrompe l'esecuzione del costrutto in cui è inserito, tipica applicazione è all'interno dello
switch come visto in precedenza. Può essere utilizzato anche all'interno di for, foreach,
while, do-while, in tal caso interrrompe forzatamente la ripetizione.

### continue

Salta cioè che segue all'interno del costrutto ciclico in cui è inserito, senza però interrompere necessariamente la ripetizione

### return

`return <espressione>`

Interrompe l'esecuzione del metodo corrente e restituisce all'ambiente chiamante il valore
ottenuto valutando l'espressione.

Si rimanda al [manuale php](http://www.php.net/manual/en/language.control-structures.php) per gli approfondimenti

