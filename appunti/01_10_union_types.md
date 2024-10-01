# Union Types

Gli **Union Types** sono stati introdotti in PHP 8 e permettono di specificare più tipi di dati per un singolo parametro, proprietà o valore di ritorno di una funzione. Questa caratteristica consente di definire più tipi validi che una variabile può assumere, rendendo il codice più flessibile e preciso.

### Sintassi degli Union Types

Per definire un Union Type, si separano i tipi con il simbolo `|` (pipe). Ad esempio, puoi indicare che una variabile o un parametro può essere sia di tipo `int` che `string`.

```php
function example(int|string $value): int|string {
    return $value;
}
```

In questo esempio, la funzione `example` accetta un parametro che può essere o un `int` o una `string`, e restituisce un valore che può essere di uno di questi due tipi.

### Utilizzo degli Union Types

Gli Union Types possono essere utilizzati nei seguenti contesti:

1. **Parametri di Funzione**:

    ```php
    function addNumbers(int|float $a, int|float $b): int|float {
        return $a + $b;
    }
    ```

    Questa funzione accetta due parametri che possono essere o `int` o `float` e restituirà un `int` o un `float`.

2. **Proprietà di Classe**:

    ```php
    class Example {
        public int|string $id;
    }
    ```

    La proprietà `$id` può contenere sia un valore `int` che una `string`.

3. **Valore di Ritorno di Funzione**:

    ```php
    function getValue(): int|string {
        return rand(0, 1) === 1 ? 42 : "forty-two";
    }
    ```

### Benefici degli Union Types

- **Maggiore Flessibilità**: Consente di accettare e restituire più tipi di dati, semplificando la gestione di situazioni in cui una funzione deve trattare valori di tipi diversi.
- **Tipizzazione più Forte**: Migliora la sicurezza del codice, riducendo la possibilità di errori relativi ai tipi e migliorando la leggibilità.
- **Compatibilità**: È utile per le API e le librerie che possono gestire più tipi di input senza bisogno di sovraccaricare le funzioni.

### Limiti degli Union Types

- **Void non è unito ad altri tipi**: Non è possibile avere `void` come parte di un Union Type. Ad esempio, non è consentito dichiarare una funzione che ritorna `int|string|void`.
  
- **Nullable Types**: Se vuoi accettare un tipo nullo, puoi usare `?` o includere `null` negli Union Types. Esempio:

    ```php
    function process(?string $value): void {
        // accetta una stringa o null
    }
    
    // oppure
    function process(string|null $value): void {
        // accetta una stringa o null
    }
    ```

### Conclusione

Gli **Union Types** in PHP rappresentano un passo avanti verso una tipizzazione più robusta e flessibile, permettendo ai programmatori di scrivere codice più pulito, sicuro e versatile.
