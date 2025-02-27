### 🔌 **Connessione a Database da Console con PHP**

In PHP da **linea di comando (CLI)**, è possibile connettersi a un database come MySQL, SQLite o altri DBMS direttamente dal terminale senza bisogno di pagine web.

Questa funzionalità è molto utile per:
- Automazione di script
- Importazione/Esportazione di dati
- Backup
- Manutenzione
- Operazioni batch

---

### 1. **Connessione a MySQL da Console**
Per connettersi a un database MySQL, si utilizza l'estensione **PDO (PHP Data Objects)**.

#### Esempio di Connessione
```php
<?php
$host = 'localhost';
$dbname = 'test_db';
$user = 'root';
$pass = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    echo "Connessione riuscita!\n";
} catch (PDOException $e) {
    echo "Errore di connessione: " . $e->getMessage() . "\n";
}
?>
```
---

### 📌 **Eseguire lo script dalla console**
Apri il terminale nella cartella dove hai salvato il file:
```bash
php connessione.php
```
**Output:**
```
Connessione riuscita!
```

---

### 2. **Query di Lettura (SELECT)**
Per leggere dati dal database:
```php
<?php
$query = $db->query("SELECT * FROM utenti");

foreach ($query as $row) {
    echo "ID: " . $row['id'] . " - Nome: " . $row['nome'] . "\n";
}
?>
```
---

### 3. **Query di Scrittura (INSERT)**
Inseriamo nuovi dati tramite CLI:
```php
<?php
$nome = readline("Inserisci il nome: ");
$stmt = $db->prepare("INSERT INTO utenti (nome) VALUES (:nome)");
$stmt->bindParam(':nome', $nome);

if ($stmt->execute()) {
    echo "Utente inserito con successo!\n";
} else {
    echo "Errore durante l'inserimento!\n";
}
?>
```
---

### 4. **Query di Aggiornamento (UPDATE)**
Aggiorna i dati di un utente:
```php
<?php
$id = (int)readline("Inserisci ID utente: ");
$nome = readline("Inserisci il nuovo nome: ");

$stmt = $db->prepare("UPDATE utenti SET nome = :nome WHERE id = :id");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo "Utente aggiornato!\n";
} else {
    echo "Errore durante l'aggiornamento!\n";
}
?>
```
---

### 5. **Query di Eliminazione (DELETE)**
Elimina un utente:
```php
<?php
$id = (int)readline("Inserisci ID da eliminare: ");
$stmt = $db->prepare("DELETE FROM utenti WHERE id = :id");
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo "Utente eliminato!\n";
} else {
    echo "Errore durante l'eliminazione!\n";
}
?>
```
---

### 6. **Interazione Multipla (Loop di input)**
Puoi creare un'interfaccia interattiva con un loop infinito:
```php
<?php
while (true) {
    echo "1. Inserisci Utente\n";
    echo "2. Visualizza Utenti\n";
    echo "3. Esci\n";
    $scelta = readline("Scelta: ");

    if ($scelta == 1) {
        $nome = readline("Inserisci Nome: ");
        $stmt = $db->prepare("INSERT INTO utenti (nome) VALUES (:nome)");
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        echo "Utente aggiunto!\n";
    } elseif ($scelta == 2) {
        $query = $db->query("SELECT * FROM utenti");
        foreach ($query as $row) {
            echo $row['id'] . ": " . $row['nome'] . "\n";
        }
    } elseif ($scelta == 3) {
        echo "Uscita...\n";
        break;
    } else {
        echo "Scelta non valida\n";
    }
}
?>
```
---

### 7. **Connessione con SQLite**
SQLite non richiede credenziali o server:
```php
<?php
$db = new PDO("sqlite:database.db");
echo "Connessione a SQLite riuscita!";
?>
```
---

### 8. **Configurazione Variabili d'Ambiente**
Se devi gestire connessioni diverse o evitare di scrivere le credenziali nel codice, usa il file `.env`.

Esempio `.env`:
```
DB_HOST=localhost
DB_NAME=test_db
DB_USER=root
DB_PASS=
```

Leggere il file:
```php
$dotenv = parse_ini_file('.env');
$db = new PDO("mysql:host={$dotenv['DB_HOST']};dbname={$dotenv['DB_NAME']}", $dotenv['DB_USER'], $dotenv['DB_PASS']);
```
---

### 🔑 **Confronto tra MySQL e SQLite da Console**
| Funzione    | MySQL | SQLite |
|-------------|-------|-------|
| Installazione | Richiede server | Nessun server |
| Velocità     | Veloce per grandi dati | Più veloce per piccoli dati |
| Sicurezza    | Più sicuro con utenti | Meno sicuro |
| Backup       | Manuale | Copia del file DB |

---

### ✅ **Conclusione**
La connessione ai database da console con PHP permette di creare script di automazione e gestione senza bisogno di interfacce grafiche.

PHP + CLI + Database = 🔥 Automazione Totale
