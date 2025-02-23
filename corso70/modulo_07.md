# **📌 MODULO 7 – Interazione con Database MySQL e PDO**  
✅ **Obiettivo:** Imparare a interagire con un database MySQL utilizzando PHP e PDO per eseguire operazioni CRUD (Create, Read, Update, Delete).  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 7.1 – Introduzione ai Database e MySQL**  
📌 **Obiettivi:** Comprendere il funzionamento di un database relazionale e imparare a creare tabelle in MySQL.  

### **📖 Teoria**  
✅ **Cos'è un database?**  
- Un database è un insieme strutturato di dati che può essere gestito e interrogato.  
- MySQL è uno dei database relazionali più popolari.  

✅ **Creare un database e una tabella in MySQL:**  
```sql
CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE libri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255) NOT NULL,
    autore VARCHAR(255) NOT NULL,
    anno_pubblicazione INT NOT NULL
);
```

✅ **Inserire dati nella tabella:**  
```sql
INSERT INTO libri (titolo, autore, anno_pubblicazione) 
VALUES ('Il signore degli anelli', 'J.R.R. Tolkien', 1954);
```

### **💡 Esercizio**  
1. Crea un database `negozio` con una tabella `prodotti` che contiene `id`, `nome`, `prezzo`.  

---

## **🔷 BLOCCO 7.2 – Connessione al Database con PDO**  
📌 **Obiettivi:** Connettere PHP a un database MySQL usando PDO (PHP Data Objects).  

### **📖 Teoria**  
✅ **Connessione al database con PDO:**  
```php
$dsn = "mysql:host=localhost;dbname=biblioteca";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connessione riuscita!";
} catch (PDOException $e) {
    echo "Errore di connessione: " . $e->getMessage();
}
```

### **💡 Esercizio**  
1. Connetti PHP a un database MySQL chiamato `negozio`.  

---

## **🔷 BLOCCO 7.3 – Lettura dei Dati (SELECT con PDO)**  
📌 **Obiettivi:** Recuperare dati dal database utilizzando PDO.  

### **📖 Teoria**  
✅ **Eseguire una query SELECT:**  
```php
$sql = "SELECT * FROM libri";
$stmt = $pdo->query($sql);
$libri = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($libri as $libro) {
    echo $libro["titolo"] . " di " . $libro["autore"] . "<br>";
}
```

✅ **Query con parametri (Prepared Statements):**  
```php
$sql = "SELECT * FROM libri WHERE autore = :autore";
$stmt = $pdo->prepare($sql);
$stmt->execute(["autore" => "J.R.R. Tolkien"]);
$libri = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

### **💡 Esercizio**  
1. Scrivi uno script PHP che legge tutti i prodotti dalla tabella `prodotti`.  

---

## **🔷 BLOCCO 7.4 – Inserimento di Dati (INSERT con PDO)**  
📌 **Obiettivi:** Aggiungere nuovi dati in una tabella MySQL usando PDO.  

### **📖 Teoria**  
✅ **Eseguire un’operazione INSERT con parametri:**  
```php
$sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione) VALUES (:titolo, :autore, :anno)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    "titolo" => "Harry Potter",
    "autore" => "J.K. Rowling",
    "anno" => 1997
]);
```

### **💡 Esercizio**  
1. Crea un modulo HTML per aggiungere nuovi prodotti alla tabella `prodotti` e un file PHP che li inserisce nel database.  

---

## **🔷 BLOCCO 7.5 – Modifica e Cancellazione di Dati (UPDATE e DELETE con PDO)**  
📌 **Obiettivi:** Aggiornare ed eliminare record nel database con PDO.  

### **📖 Teoria**  
✅ **Modificare un record con UPDATE:**  
```php
$sql = "UPDATE libri SET anno_pubblicazione = :anno WHERE titolo = :titolo";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    "anno" => 2000,
    "titolo" => "Harry Potter"
]);
```

✅ **Eliminare un record con DELETE:**  
```php
$sql = "DELETE FROM libri WHERE titolo = :titolo";
$stmt = $pdo->prepare($sql);
$stmt->execute(["titolo" => "Harry Potter"]);
```

### **💡 Esercizio**  
1. Scrivi uno script PHP che aggiorna il prezzo di un prodotto nella tabella `prodotti`.  

---

## **🔷 BLOCCO 7.6 – Costruzione di un Sistema di Login con MySQL e PDO**  
📌 **Obiettivi:** Creare un sistema di autenticazione con utenti registrati nel database.  

### **📖 Teoria**  
✅ **Creare una tabella utenti:**  
```sql
CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

✅ **Registrazione di un utente (hashing password):**  
```php
$password_hash = password_hash("mypassword", PASSWORD_BCRYPT);

$sql = "INSERT INTO utenti (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute(["username" => "admin", "password" => $password_hash]);
```

✅ **Verifica della password in fase di login:**  
```php
$sql = "SELECT * FROM utenti WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(["username" => $_POST["username"]]);
$utente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($utente && password_verify($_POST["password"], $utente["password"])) {
    session_start();
    $_SESSION["utente"] = $_POST["username"];
    echo "Accesso riuscito!";
} else {
    echo "Credenziali errate!";
}
```

### **💡 Esercizio**  
1. Crea un modulo di login con verifica password e sessioni.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. **Obiettivo:** Creare un mini gestionale per una libreria online.  
   - Un’interfaccia per aggiungere e visualizzare libri.  
   - Un’area admin con login per gestire il catalogo.  
   - Possibilità di modificare ed eliminare libri.  

🚀 **Completato il Modulo 7! Sei pronto per il Modulo 8?** 😃