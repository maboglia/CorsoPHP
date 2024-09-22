# JsonSerializable

L'interfaccia `JsonSerializable` in PHP permette di controllare come un oggetto viene serializzato in JSON. Implementando questa interfaccia, puoi definire la logica di serializzazione personalizzata per le tue classi. Questo è particolarmente utile quando desideri includere solo determinati attributi o formattare i dati in un modo specifico durante la conversione in JSON.

### Come Funziona

Per utilizzare `JsonSerializable`, segui questi passaggi:

1. **Implementa l'interfaccia**: La tua classe deve implementare l'interfaccia `JsonSerializable`.

2. **Definisci il metodo `jsonSerialize()`**: Questo metodo deve restituire i dati da serializzare in formato JSON. Puoi restituire un array o un oggetto.

### Esempio di Implementazione

Ecco un esempio di una classe che implementa `JsonSerializable`:

```php
class User implements JsonSerializable {
    private $name;
    private $email;
    private $age;

    public function __construct($name, $email, $age) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    // Implementazione del metodo jsonSerialize
    public function jsonSerialize() {
        return [
            'name' => $this->name,
            'email' => $this->email,
            // Escludiamo l'età dalla serializzazione
        ];
    }
}

// Creazione di un oggetto User
$user = new User('Mario Rossi', 'mario@example.com', 30);

// Serializzazione in JSON
$json = json_encode($user);
echo $json; // {"name":"Mario Rossi","email":"mario@example.com"}
```

### Dettagli del Funzionamento

- **Restituzione di un Array**: Nel metodo `jsonSerialize()`, restituisci un array con le chiavi e i valori che desideri includere nella serializzazione. In questo caso, abbiamo escluso l'attributo `age`.
  
- **Utilizzo con `json_encode()`**: Quando chiami `json_encode()` sull'oggetto che implementa `JsonSerializable`, PHP automaticamente chiama il metodo `jsonSerialize()` per ottenere i dati da convertire in JSON.

### Gestione di Proprietà Aggiuntive

Puoi anche gestire proprietà più complesse. Ad esempio, se desideri restituire un formato diverso o includere valori calcolati:

```php
class Product implements JsonSerializable {
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function jsonSerialize() {
        return [
            'name' => $this->name,
            'totalPrice' => $this->price * $this->quantity, // Calcola il prezzo totale
        ];
    }
}

// Creazione di un oggetto Product
$product = new Product('Laptop', 1000, 2);

// Serializzazione in JSON
$jsonProduct = json_encode($product);
echo $jsonProduct; // {"name":"Laptop","totalPrice":2000}
```

### Conclusione

L'interfaccia `JsonSerializable` fornisce un modo flessibile e potente per controllare come le tue classi vengono convertite in JSON. Ti consente di personalizzare la serializzazione in base alle esigenze della tua applicazione, semplificando la gestione dei dati JSON.