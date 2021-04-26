
Operatore ternario
------------------

L’operatore ternario è un ottimo modo per sintetizzare il codice, ma viene spesso abusato. Anche se gli operatori ternari possono essere nidificati, è consigliato usarne uno per riga per leggibilità.

```php
    $a = 5;
    echo ($a == 5) ? 'sì' : 'no';
```
Ecco invece un esempio che sacrifica ogni forma di leggibilità per ridurre il numero delle righe:

```php
    echo ($a) ? ($a == 5) ? 'sì' : 'no' : ($b == 10) ? 'troppo' : ':(';    // eccessiva nidificazione, sacrifica la leggibilità
```

---

Per restituire un valore con gli operatori ternari usa la sintassi corretta.

```php
    $a = 5;
    echo ($a == 5) ? return true : return false;    // questo esempio mostrerà un errore
    
    // contro
    
    $a = 5;
    return ($a == 5) ? 'sì' : 'no';    // questo esempio restituirà 'sì'
```
---

È importante notare che non serve usare l’operatore ternario per restituire un valore booleano. Un esempio:

```php
    $a = 3;
    return ($a == 3) ? true : false; // Restituirà true o false a seconda della condizione $a == 3
    
    // vs
    
    $a = 3;
    return $a == 3; // Restituirà true o false a seconda della condizione $a == 3
```
Lo stesso si può dire per tutte le operazioni (===, !==, !=, == etc.)


---

#### Uso delle parentesi con gli operatori ternari per forma e funzione

Quando usi l’operatore ternario, le parentesi possono fare la loro parte per migliorare la leggibilità e anche per unire più condizioni in blocchi di istruzioni. Un esempio di un uso superfluo delle parentesi è:

```php
    $a = 3;
    return ($a == 3) ? "sì" : "no"; // restituisce sì o no a seconda della condizione $a == 3
    
    // contro
    
    $a = 3;
    return $a == 3 ? "sì" : "no"; // restituisce sì o no a seconda della condizione $a == 3
```
---

Le parentesi permettono anche di creare unioni in un blocco di istruzioni, in modo che il blocco venga controllato come una sola condizione. Ecco un esempio in cui il blocco restituirà true se sia ($a == 3 e $b == 4) che $c == 5 sono veri.

```php
    return ($a == 3 && $b == 4) && $c == 5;
```
Un altro esempio è la porzione qui sotto che restituirà true se ($a != 3 E $b != 4) O $C == 5.

```php
    return ($a != 3 && $b != 4) || $c == 5;
```
*   [Operatore ternario](http://php.net/language.operators.comparison)