# classi anonime

Le **classi anonime** in PHP sono classi senza nome definite e utilizzate al volo, senza la necessità di dichiararle come una classe separata. Questa funzionalità è stata introdotta in PHP 7 e risulta molto utile quando si ha bisogno di un'implementazione rapida di un oggetto che non deve essere riutilizzato altrove. Le classi anonime offrono un modo semplice per definire una classe direttamente nel punto in cui viene utilizzata.

### Sintassi di una classe anonima:

Le classi anonime vengono definite utilizzando la parola chiave `new class` seguita dalla loro definizione.

```php
$oggetto = new class {
    public function saluta() {
        return "Ciao dal mondo delle classi anonime!";
    }
};

echo $oggetto->saluta();  // Output: Ciao dal mondo delle classi anonime!
```

### Caratteristiche delle classi anonime:

- **Senza nome**: Non hanno un nome, quindi non possono essere dichiarate in modo riutilizzabile.
- **Ereditarietà**: Possono estendere altre classi e implementare interfacce.
- **Metodi e proprietà**: Possono avere metodi, proprietà e costruttori come una normale classe PHP.

### Esempio: Classe anonima con costruttore e proprietà

```php
$auto = new class("Toyota") {
    private $marca;

    public function __construct($marca) {
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca;
    }
};

echo $auto->getMarca();  // Output: Toyota
```

In questo esempio, la classe anonima ha una proprietà `$marca`, un costruttore per impostarla, e un metodo `getMarca()` per accedervi.

### Ereditarietà nelle classi anonime

Le classi anonime possono estendere altre classi e implementare interfacce.

#### Esempio con ereditarietà:

```php
class Veicolo {
    protected $tipo = "Veicolo";

    public function mostraTipo() {
        return $this->tipo;
    }
}

$auto = new class extends Veicolo {
    protected $tipo = "Automobile";
};

echo $auto->mostraTipo();  // Output: Automobile
```

In questo esempio, la classe anonima estende la classe `Veicolo` e sovrascrive la proprietà `$tipo`.

#### Esempio con interfacce:

```php
interface Saluto {
    public function saluta();
}

$oggetto = new class implements Saluto {
    public function saluta() {
        return "Salve!";
    }
};

echo $oggetto->saluta();  // Output: Salve!
```

In questo esempio, la classe anonima implementa l'interfaccia `Saluto` e definisce il metodo `saluta()`.

### Utilizzo pratico delle classi anonime

Le classi anonime sono particolarmente utili quando si ha bisogno di un oggetto una tantum o per implementare oggetti che hanno un comportamento temporaneo. Sono spesso usate per:

1. **Mocking nei test unitari**: Possono essere utilizzate per creare oggetti fittizi (mock) nelle unità di test senza dover creare una nuova classe per ciascuna simulazione.
2. **Callback personalizzati**: Possono essere utili per definire rapidamente una logica personalizzata, ad esempio in un contesto di callback o gestione degli eventi.
3. **Design pattern**: In alcuni casi, possono essere utilizzate in pattern come il pattern Strategy o Observer.

### Esempio di callback con classe anonima

```php
function eseguiSaluto($oggetto) {
    echo $oggetto->saluta();
}

eseguiSaluto(new class {
    public function saluta() {
        return "Ciao, questo è un saluto!";
    }
});
// Output: Ciao, questo è un saluto!
```

### Conclusione

Le classi anonime in PHP permettono di definire rapidamente oggetti per usi specifici, riducendo la complessità del codice e evitando la necessità di creare classi dedicate in situazioni dove il riutilizzo non è richiesto. Sono particolarmente utili per le implementazioni temporanee, i test e i contesti di callback.