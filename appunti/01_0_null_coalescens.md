# Operatore a Protezione dei Valori Nulli

In PHP, l'**Operatore a Protezione dei Valori Nulli** è un costrutto introdotto in PHP 7.0 chiamato **operatore di coalescenza nulla** (`??`). Questo operatore permette di verificare se una variabile è impostata e non è `null`, restituendo un valore predefinito se la variabile non è settata o è `null`.

### Sintassi:
```php
$variabile = $espressione ?? $valorePredefinito;
```

- Se l'**espressione** è settata e non è `null`, allora viene restituito il suo valore.
- Se l'**espressione** non è settata o è `null`, viene restituito il valore **$valorePredefinito**.

### Esempio di utilizzo:
```php
$nomeUtente = null;
$nomeVisualizzato = $nomeUtente ?? 'Ospite';
echo $nomeVisualizzato;  // Output: Ospite
```

In questo esempio, la variabile `$nomeUtente` è `null`, quindi l'operatore `??` restituisce il valore predefinito `'Ospite'`.

### Esempio più complesso:
L'operatore può essere utilizzato anche in catene multiple per verificare diverse variabili o espressioni.

```php
$opzione1 = null;
$opzione2 = null;
$opzione3 = "Valore trovato";
$scelta = $opzione1 ?? $opzione2 ?? $opzione3 ?? 'Nessuna opzione valida';
echo $scelta;  // Output: Valore trovato
```

In questo caso, `$opzione1` e `$opzione2` sono `null`, ma `$opzione3` ha un valore, quindi l'output sarà "Valore trovato".

### Utilizzo in contesti OOP:
L'operatore `??` è molto utile nella programmazione orientata agli oggetti (OOP) quando si lavora con metodi o proprietà che potrebbero restituire valori nulli. 

```php
class Utente {
    private $nome;

    public function __construct($nome = null) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome ?? 'Ospite';
    }
}

$utente = new Utente();
echo $utente->getNome();  // Output: Ospite

$utenteConNome = new Utente("Mario");
echo $utenteConNome->getNome();  // Output: Mario
```

In questo esempio, il metodo `getNome()` utilizza l'operatore di coalescenza nulla per restituire "Ospite" se la proprietà `$nome` è `null`.

### Differenze rispetto ad altri operatori:
- **`isset()`**: Prima dell'introduzione di `??`, si usava spesso `isset()` per controllare se una variabile era settata e non era `null`:
  ```php
  $valore = isset($variabile) ? $variabile : 'default';
  ```
  Con l'operatore `??`, questo può essere scritto in modo più compatto:
  ```php
  $valore = $variabile ?? 'default';
  ```

L'operatore di coalescenza nulla è un modo semplice e leggibile per gestire valori `null` o non definiti.