# PDO: Collegare e filtrare i parametri

In **PDO**, il metodo `bindParam()` viene utilizzato per associare un parametro a un segnaposto in una query SQL preparata. Questo metodo è particolarmente utile quando si vuole passare un riferimento a una variabile, e permette di specificare esplicitamente il tipo di dato del parametro. 

Ciò offre un controllo più fine sui parametri e può aiutare a prevenire vulnerabilità di sicurezza come la **SQL injection**. Inoltre, garantisce che i dati siano passati nella forma corretta (es. interi, stringhe, booleani).

### Sintassi di `bindParam()`

```php
$stmt->bindParam(mixed $parameter, mixed &$variable, int $data_type = PDO::PARAM_STR);
```

- **`$parameter`**: Il segnaposto nominativo o posizionale nella query (es. `:parametro` o `?`).
- **`$variable`**: La variabile che contiene il valore da associare al segnaposto.
- **`$data_type`**: Il tipo di dato che si desidera forzare (opzionale), utilizzando una delle costanti PDO disponibili.

### Costanti disponibili per il filtraggio (Tipi di dato)

PDO offre diverse **costanti** per indicare il tipo di dato del parametro. Le più comuni sono:

- **`PDO::PARAM_BOOL`**: Forza il valore come booleano (vero/falso).
- **`PDO::PARAM_INT`**: Forza il valore come intero.
- **`PDO::PARAM_STR`**: Forza il valore come stringa.
- **`PDO::PARAM_NULL`**: Forza il valore come `NULL`.
- **`PDO::PARAM_LOB`**: Utilizzato per inviare grandi oggetti binari (BLOB).

### Esempio con `bindParam()` e segnaposto nominativi

```php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');

// Query con segnaposto nominativi
$sql = "INSERT INTO utenti (nome, eta, email) VALUES (:nome, :eta, :email)";

// Preparare la query
$stmt = $pdo->prepare($sql);

// Definire i valori
$nome = 'Mario';
$eta = 30;
$email = 'mario@example.com';

// Legare i parametri con bindParam
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->bindParam(':eta', $eta, PDO::PARAM_INT);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);

// Eseguire la query
$stmt->execute();

echo "Utente inserito correttamente!";
```

### Differenza tra `bindParam()` e `bindValue()`

- **`bindParam()`** lega la **variabile per riferimento**, il che significa che il valore può essere cambiato prima di chiamare `execute()` e PDO utilizzerà il valore aggiornato al momento dell'esecuzione.
- **`bindValue()`** lega **il valore corrente** della variabile al parametro, ed è più adatto se non si ha bisogno di modificare il valore successivamente.

#### Esempio con `bindValue()` (rispetto a `bindParam()`):

```php
$nome = 'Luigi';
$stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
```

In questo caso, il valore attuale della variabile `$nome` viene passato immediatamente.

### Esempio dinamico con `bindParam()` (cambiamento di variabile)

```php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');

// Query con segnaposto nominativo
$sql = "UPDATE utenti SET email = :email WHERE id = :id";
$stmt = $pdo->prepare($sql);

// Lega i parametri usando bindParam
$id = 1;
$email = 'luigi@example.com';

$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);

// Esegui la query con il primo valore
$stmt->execute();

// Cambia il valore della variabile e riesegui
$id = 2;
$email = 'giovanni@example.com';
$stmt->execute();
```

In questo esempio, `bindParam()` lega le variabili per riferimento, quindi quando si cambiano i valori di `$id` e `$email`, la query eseguita rifletterà i nuovi valori.

### Riepilogo delle costanti PDO per `bindParam()`

1. **`PDO::PARAM_BOOL`**: Booleano (vero/falso).
2. **`PDO::PARAM_INT`**: Intero.
3. **`PDO::PARAM_STR`**: Stringa (testo).
4. **`PDO::PARAM_NULL`**: Valore nullo.
5. **`PDO::PARAM_BLOB`**: Per grandi oggetti binari (BLOB).

### Utilizzo combinato di `bindParam()` e `execute()` con array

Se preferisci, puoi eseguire direttamente la query con `execute()` e passare i valori dei parametri in un array, evitando `bindParam()` per legare i parametri singolarmente.

**Esempio:**
```php
$sql = "INSERT INTO utenti (nome, eta, email) VALUES (:nome, :eta, :email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nome' => 'Paolo', ':eta' => 25, ':email' => 'paolo@example.com']);
```

In questo caso, i parametri vengono passati direttamente con l'array associativo senza dover usare `bindParam()`.

### Conclusione

L'uso di `bindParam()` è particolarmente utile quando è necessario associare variabili per riferimento, permettendo di modificarle prima dell'esecuzione della query. Le **costanti PDO** come `PDO::PARAM_INT`, `PDO::PARAM_STR`, ecc., permettono di forzare il tipo di dato dei parametri, migliorando la sicurezza e la correttezza delle query SQL.

---

## Esempi

1. **Parametri con nome (`bindParam` o `bindValue`)**
2. **Parametri posizionali (`?`)**

### 1. **Binding dei parametri con nome**

Puoi usare **segnaposto con nome** nella tua query SQL e associare i valori usando `bindParam()` o `bindValue()`.

- `bindParam()`: Associa una variabile a un segnaposto con nome, passando la variabile **per riferimento**. Il valore viene assegnato quando la query viene eseguita.
- `bindValue()`: Associa un valore a un segnaposto con nome **immediatamente** al momento del binding.

#### Esempio con `bindParam`

```php
$sql = "SELECT * FROM users WHERE username = :username AND age = :age";
$stmt = $pdo->prepare($sql);

$username = "john_doe";
$age = 25;

// Associa i parametri
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':age', $age, PDO::PARAM_INT);

// Esegui la query
$stmt->execute();
```

#### Esempio con `bindValue`

```php
$sql = "SELECT * FROM users WHERE username = :username AND age = :age";
$stmt = $pdo->prepare($sql);

// Associa i valori direttamente
$stmt->bindValue(':username', 'john_doe', PDO::PARAM_STR);
$stmt->bindValue(':age', 25, PDO::PARAM_INT);

// Esegui la query
$stmt->execute();
```

In entrambi i casi, usi segnaposto con il prefisso `:` nella query (`:username`, `:age`), e successivamente associ quei segnaposto ai valori con `bindParam` o `bindValue`.

### 2. **Binding dei parametri posizionali**

Puoi anche utilizzare **segnaposto posizionali (`?`)** e associare i valori a essi. In questo caso, l'ordine dei segnaposto corrisponde all'ordine delle variabili legate.

#### Esempio

```php
$sql = "SELECT * FROM users WHERE username = ? AND age = ?";
$stmt = $pdo->prepare($sql);

// Associa i valori direttamente utilizzando execute
$stmt->execute(['john_doe', 25]);
```

### Utilizzo di `execute()` con un array

Un approccio più semplice è passare i valori direttamente al metodo `execute()` come array.

#### Esempio

```php
$sql = "INSERT INTO users (username, email, age) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['john_doe', 'john@example.com', 25]);
```

