# Utilizzo della nuova espressione `match` in PHP8.

Supponiamo di voler calcolare il voto di uno studente in base al suo punteggio. Se il punteggio è compreso tra un certo intervallo di valori, vogliamo restituire un voto corrispondente.

### Esempio con `match`

```php
<?php

$score = 85;

$grade = match (true) {
    $score >= 90 => 'A',
    $score >= 80 => 'B',
    $score >= 70 => 'C',
    $score >= 60 => 'D',
    default => 'F',
};

echo "Il voto dello studente è: $grade";  // Output: Il voto dello studente è: B
?>
```

### Spiegazione:

- Usiamo il valore `true` per confrontare direttamente le condizioni, in modo che ogni espressione venga valutata. 
- A seconda del punteggio (`$score`), verrà assegnato un voto corrispondente. Per esempio, se `$score` è 85, `match` restituirà 'B' poiché 85 è maggiore o uguale a 80.
- Se nessuna delle condizioni è soddisfatta, viene utilizzato il valore `default`, che in questo caso è `F`.

### Vantaggi di `match` rispetto a `switch` in questo esempio:
- Non è necessario specificare `break` come in `switch`.
- Le condizioni sono valutate rigorosamente.
- Il codice è più compatto e leggibile.

### Esempio con tipi di input diversi

Un altro esempio che evidenzia il confronto rigoroso di `match`:

```php
<?php

$input = 10;

$result = match ($input) {
    10 => "Hai inserito un numero intero 10",
    '10' => "Hai inserito una stringa '10'",
    default => "Input non riconosciuto",
};

echo $result;  // Output: Hai inserito un numero intero 10
?>
```

In questo caso, il confronto è rigoroso (`===`), quindi PHP distingue tra il numero intero `10` e la stringa `'10'`.