# Named Arguments in PHP 8: Guida Completa

Con l'introduzione di **PHP 8**, una delle funzionalità più utili e attese è quella dei **Named Arguments** (Argomenti Nominati). Questa novità permette di passare argomenti a una funzione o metodo specificandone il nome, anziché affidarsi solo alla posizione. Questo aumenta notevolmente la leggibilità del codice, soprattutto quando si chiamano funzioni con molti parametri o parametri opzionali.

## Che cosa sono i Named Arguments?

In PHP 8, quando si chiama una funzione o un metodo, è possibile specificare il nome dei parametri a cui si vuole assegnare un valore. Questo permette di:
- Ignorare l'ordine degli argomenti.
- Passare solo alcuni parametri, senza dover specificare tutti quelli precedenti (come accadeva con gli argomenti posizionali).
- Aumentare la leggibilità del codice, specialmente con funzioni che hanno molti argomenti opzionali.

### Esempio di Named Arguments

```php
function creaUtente(string $nome, string $cognome, int $eta = 18, string $email = "") {
    // codice per creare un utente
}

// Named Arguments
creaUtente(nome: "Mario", cognome: "Rossi", eta: 25);
```

In questo esempio, stiamo passando i valori specificando i nomi dei parametri. Non è necessario rispettare l'ordine e possiamo omettere l'argomento opzionale `$email`.

## Vantaggi dei Named Arguments

1. **Migliore leggibilità**: Passare i valori tramite nome rende subito chiaro a cosa si riferisce ogni argomento, senza dover indovinare il significato basandosi sulla posizione.
2. **Ordine non importante**: Si possono specificare i parametri in qualsiasi ordine, rendendo il codice più flessibile.
3. **Parametri opzionali più facili**: È possibile saltare parametri opzionali e specificare solo quelli necessari, senza dover indicare quelli che non si vuole modificare.
   
### Esempio di ignorare l'ordine

```php
creaUtente(cognome: "Bianchi", nome: "Luigi");
```

Anche se `nome` era il primo parametro nella dichiarazione della funzione, qui possiamo specificarlo dopo `cognome` senza problemi.

### Esempio con argomenti opzionali

```php
creaUtente(nome: "Carla", cognome: "Verdi", email: "carla@esempio.com");
```

In questo esempio, abbiamo saltato l'argomento opzionale `$eta`, ma possiamo specificare direttamente l'argomento `$email`.

## Utilizzo con Funzioni Built-in

I Named Arguments funzionano anche con molte delle funzioni predefinite di PHP. Ad esempio, possiamo usarli con la funzione `array_fill()`:

```php
$array = array_fill(start_index: 0, num: 5, value: "PHP");
// Output: Array ( [0] => PHP [1] => PHP [2] => PHP [3] => PHP [4] => PHP )
```

## Restrizioni dei Named Arguments

1. **Non combinabili con parametri variadici**: I Named Arguments non possono essere utilizzati con funzioni che accettano un numero variabile di argomenti (`...$args`).
   
2. **Parametri obbligatori**: Anche con Named Arguments, tutti i parametri obbligatori devono essere forniti, a meno che non abbiano un valore di default.

3. **Ordine corretto per posizionali e nominati**: Quando si combinano **Named Arguments** e **Positional Arguments**, i Named Arguments devono venire dopo gli argomenti posizionali. Ad esempio:

   ```php
   creaUtente("Marco", "Verdi", eta: 30);  // OK
   creaUtente(eta: 30, "Marco", "Verdi");  // ERRORE!
   ```

4. **Compatibilità retroattiva**: Anche se i Named Arguments sono una potente funzionalità, cambiamenti futuri nelle funzioni o nei metodi (ad esempio, rinominando parametri) potrebbero introdurre incompatibilità. Questo è importante da considerare durante l'aggiornamento del codice.

## Conclusione

I **Named Arguments** in PHP 8 rappresentano un significativo miglioramento della leggibilità e della flessibilità del codice. Specialmente nelle funzioni con numerosi parametri opzionali o con significati meno ovvi, questa funzionalità semplifica la gestione degli argomenti, riducendo errori e ambiguità.