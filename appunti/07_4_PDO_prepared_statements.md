# PDO: statement e preparedStatement

In **PDO (PHP Data Objects)**, ci sono due principali metodi per eseguire query SQL: `query()` e `prepare()`. La differenza tra i due è cruciale, soprattutto quando si gestiscono dati dinamici provenienti dagli utenti.

### 1. **PDO::query()**
Il metodo `query()` viene utilizzato per eseguire query SQL direttamente. È più adatto per query **statiche**, in cui non ci sono dati dinamici o input esterni. Può restituire direttamente i risultati sotto forma di un oggetto `PDOStatement`.

**Esempio di utilizzo di `query()`:**
```php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');

// Esecuzione di una query SELECT semplice
$result = $pdo->query("SELECT * FROM utenti");

// Iterazione sui risultati
foreach ($result as $row) {
    echo $row['nome'];
}
```
**Uso indicato**: quando i dati sono statici o completamente sotto il controllo dello sviluppatore.

### 2. **PDO::prepare() e PDO::execute()**
Il metodo `prepare()` viene utilizzato per preparare una query SQL con **parametri segnaposto**. I **prepared statements** sono ideali per eseguire query che includono **dati dinamici**, soprattutto quelli provenienti dagli utenti. Utilizzare `prepare()` insieme a `execute()` aiuta a prevenire vulnerabilità come **SQL injection**, poiché i parametri vengono gestiti in modo sicuro.

#### Sintassi di un prepared statement:

1. **Prepara la query** con segnaposto (`?` o `:parametro`).
2. **Esegui** la query legando i valori ai segnaposto.

#### Esempio di utilizzo di `prepare()` con segnaposto posizionali (`?`):
```php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');

// Preparazione della query con segnaposto
$sql = "SELECT * FROM utenti WHERE id = ?";

// Preparazione e esecuzione del prepared statement
$stmt = $pdo->prepare($sql);
$stmt->execute([1]);

// Recupero dei risultati
$utenti = $stmt->fetchAll();
foreach ($utenti as $utente) {
    echo $utente['nome'];
}
```

#### Esempio di utilizzo di `prepare()` con segnaposto nominativi (`:parametro`):
```php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');

// Query con segnaposto nominativo
$sql = "SELECT * FROM utenti WHERE nome = :nome";

// Preparazione
$stmt = $pdo->prepare($sql);

// Esecuzione con valore per il parametro
$stmt->execute([':nome' => 'Mario']);

// Recupero dei risultati
$utenti = $stmt->fetchAll();
foreach ($utenti as $utente) {
    echo $utente['nome'];
}
```

### Vantaggi dei Prepared Statements

1. **Protezione contro SQL Injection**: I dati inseriti dall'utente sono automaticamente escapati da PDO, proteggendo l'applicazione dagli attacchi di **SQL injection**.
2. **Efficienza**: Le query preparate possono essere riutilizzate più volte, migliorando le prestazioni soprattutto quando vengono eseguite molte volte con valori diversi.
3. **Gestione dei tipi di dato**: Con `bindParam()` e `bindValue()`, puoi esplicitamente legare i parametri e definire il tipo di dato (stringa, intero, ecc.).

### Differenza principale tra `query()` e `prepare()`

- **`query()`**: Esegue una query SQL direttamente. È più semplice e rapido, ma non è sicuro per input dinamici, in quanto può essere vulnerabile a SQL injection.
  
  **Uso consigliato**: solo per query statiche o in cui non ci sono input esterni.

- **`prepare()`**: Prepara una query con segnaposto e la esegue in seguito con `execute()`. Protegge da SQL injection ed è adatto per query dinamiche che richiedono input utente.

  **Uso consigliato**: per qualsiasi query che coinvolga dati dinamici provenienti dall'utente.

### Esempio di SQL Injection evitato con Prepared Statements:
#### Query con `query()` (pericolosa):
```php
$nome = $_GET['nome'];
$result = $pdo->query("SELECT * FROM utenti WHERE nome = '$nome'");
```
Se l'input utente è `Mario'; DROP TABLE utenti; --`, questa query può causare la cancellazione della tabella `utenti`.

#### Query sicura con `prepare()`:
```php
$nome = $_GET['nome'];
$stmt = $pdo->prepare("SELECT * FROM utenti WHERE nome = :nome");
$stmt->execute([':nome' => $nome]);
```
In questo caso, l'input utente viene correttamente escapato e non può causare un attacco SQL injection.

### Conclusione:
- Usa **`query()`** solo per query semplici e statiche.
- Usa **`prepare()` e `execute()`** per query che includono input dinamici, per garantire sicurezza ed evitare attacchi SQL injection.