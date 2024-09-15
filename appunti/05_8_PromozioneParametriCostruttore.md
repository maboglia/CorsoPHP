# Promozione dei Parametri del Costruttore

La **Promozione dei Parametri del Costruttore** è una funzionalità introdotta in **PHP 8** che semplifica la definizione delle proprietà di una classe direttamente nel costruttore, eliminando la necessità di doverle dichiarare separatamente. Questa funzionalità rende il codice più conciso e leggibile, riducendo la duplicazione di codice.

### Prima di PHP 8 (senza Promozione dei Parametri)

Prima di PHP 8, quando definivi una classe con un costruttore, dovevi dichiarare le proprietà della classe e successivamente assegnarle tramite i parametri del costruttore. Ecco un esempio di come avresti scritto una classe in PHP 7:

```php
class Prodotto {
    public string $nome;
    public float $prezzo;
    public int $quantità;

    public function __construct(string $nome, float $prezzo, int $quantità) {
        $this->nome = $nome;
        $this->prezzo = $prezzo;
        $this->quantità = $quantità;
    }
}

$prodotto = new Prodotto('Laptop', 999.99, 5);
```

### Dopo PHP 8 (con Promozione dei Parametri)

Con la **Promozione dei Parametri del Costruttore** in PHP 8, è possibile ridurre questo codice dichiarando le proprietà direttamente nei parametri del costruttore. In questo modo, PHP promuove automaticamente i parametri del costruttore a proprietà della classe.

Ecco lo stesso esempio, semplificato con la promozione dei parametri:

```php
class Prodotto {
    public function __construct(
        public string $nome,
        public float $prezzo,
        public int $quantità
    ) {}
}

$prodotto = new Prodotto('Laptop', 999.99, 5);
```

In questo esempio:

- Le proprietà `$nome`, `$prezzo` e `$quantità` vengono dichiarate direttamente nei parametri del costruttore.
- PHP si occupa automaticamente di creare le proprietà e assegnare i valori forniti al costruttore.

### Vantaggi della Promozione dei Parametri

1. **Codice più conciso**: Non devi più scrivere le stesse cose due volte (una volta per dichiarare le proprietà e una volta nel costruttore per assegnare i valori).
2. **Meno ripetizioni**: Riduce la ridondanza, migliorando la manutenibilità del codice.
3. **Migliore leggibilità**: Il costruttore diventa molto più semplice e chiaro.

### Specifiche della Sintassi

- I parametri promossi devono avere uno dei seguenti modificatori di visibilità: `public`, `protected` o `private`. Questo indica che i parametri non solo vengono accettati dal costruttore, ma vengono anche promossi a proprietà della classe con il livello di accesso specificato.
- Il tipo dei parametri può essere dichiarato come in qualsiasi funzione PHP moderna, e può includere tipi scalari (`int`, `float`, `string`, ecc.) o oggetti, come in altri contesti.

### Esempio con Visibilità e Tipi di Dato

```php
class Utente {
    public function __construct(
        private string $username,
        protected string $email,
        public int $età
    ) {}
}

$utente = new Utente('john_doe', 'john@example.com', 30);

echo $utente->età; // Accesso permesso perché è public
```

In questo esempio:

- **`$username`** è una proprietà privata (`private`), quindi non è accessibile al di fuori della classe.
- **`$email`** è una proprietà protetta (`protected`), quindi può essere accessibile solo dalla classe stessa e dalle sue sottoclassi.
- **`$età`** è una proprietà pubblica (`public`), quindi è accessibile dall'esterno della classe.

### Limiti della Promozione dei Parametri

Ci sono alcuni contesti in cui non è possibile utilizzare la promozione dei parametri:

1. **Parametri complessi**: Se la logica di inizializzazione richiede manipolazioni complesse, come la validazione o il calcolo basato sui parametri, la promozione dei parametri potrebbe non essere adatta.

   ```php
   class Prodotto {
       private float $prezzoConIVA;
       
       public function __construct(
           public string $nome,
           public float $prezzo
       ) {
           $this->prezzoConIVA = $prezzo * 1.22; // Non può essere fatto direttamente con la promozione
       }
   }
   ```

2. **Parametri opzionali con valori di default**: Anche se è possibile utilizzare parametri opzionali, la gestione di logiche più complesse per impostare i valori di default può essere difficile da gestire solo con la promozione dei parametri.

### Conclusione

La **Promozione dei Parametri del Costruttore** in PHP 8 semplifica notevolmente la creazione di classi, rendendo il codice più breve e leggibile. Riduce la duplicazione di codice, promuovendo automaticamente i parametri del costruttore a proprietà della classe, mantenendo una sintassi chiara e ordinata. Tuttavia, per inizializzazioni complesse, potrebbe essere necessario continuare a utilizzare un approccio tradizionale.
