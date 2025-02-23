# **📌 MODULO 4 – Interazione con Database MySQL in PHP**  
✅ **Obiettivo:** Imparare a collegare PHP con MySQL, eseguire query, gestire CRUD (Create, Read, Update, Delete) e prevenire SQL Injection.  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 4.1 – Introduzione ai Database e MySQL**  
📌 **Obiettivi:** Comprendere il funzionamento dei database relazionali e MySQL.  

### **📖 Teoria**  
✅ **Cos'è un database relazionale?**  
Un database **relazionale** memorizza dati in tabelle con colonne e righe.  

✅ **Struttura di una tabella MySQL:**  
Una tabella `utenti`:  
| id | nome | email          |  
|----|------|---------------|  
| 1  | Luca | luca@email.com |  
| 2  | Anna | anna@email.com |  

✅ **Comandi SQL di base:**  
```sql
CREATE DATABASE scuola;
USE scuola;
CREATE TABLE studenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    eta INT
);
```

### **💡 Esercizio**  
1. Crea un database chiamato `negozio` e una tabella `prodotti` con colonne `id`, `nome`, `prezzo`.  

---

## **🔷 BLOCCO 4.2 – Connessione a MySQL con PHP (MySQLi e PDO)**  
📌 **Obiettivi:** Collegare PHP a un database MySQL usando MySQLi e PDO.  

### **📖 Teoria**  
✅ **Connessione con MySQLi:**  
```php
$conn = new mysqli("localhost", "root", "", "scuola");
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
echo "Connessione riuscita!";
```
✅ **Connessione con PDO:**  
```php
try {
    $conn = new PDO("mysql:host=localhost;dbname=scuola", "root", "");
    echo "Connessione riuscita!";
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}
```

### **💡 Esercizio**  
1. Crea un file PHP che si connette a un database MySQL chiamato `blog`.  

---

## **🔷 BLOCCO 4.3 – Creare e Leggere Dati (CREATE & READ – CRUD)**  
📌 **Obiettivi:** Inserire e recuperare dati da MySQL.  

### **📖 Teoria**  
✅ **Inserire dati con MySQLi:**  
```php
$sql = "INSERT INTO studenti (nome, eta) VALUES ('Marco', 22)";
$conn->query($sql);
```
✅ **Recuperare dati:**  
```php
$result = $conn->query("SELECT * FROM studenti");
while ($row = $result->fetch_assoc()) {
    echo $row['nome'] . " ha " . $row['eta'] . " anni.<br>";
}
```

### **💡 Esercizio**  
1. Crea una pagina PHP che inserisce uno studente e ne visualizza i dati.  

---

## **🔷 BLOCCO 4.4 – Aggiornare e Cancellare Dati (UPDATE & DELETE – CRUD)**  
📌 **Obiettivi:** Modificare e cancellare dati nel database.  

### **📖 Teoria**  
✅ **Aggiornare un record:**  
```php
$sql = "UPDATE studenti SET eta = 23 WHERE nome = 'Marco'";
$conn->query($sql);
```
✅ **Cancellare un record:**  
```php
$sql = "DELETE FROM studenti WHERE nome = 'Marco'";
$conn->query($sql);
```

### **💡 Esercizio**  
1. Crea una pagina PHP con un form che aggiorna l'età di uno studente esistente.  

---

## **🔷 BLOCCO 4.5 – Prevenzione SQL Injection con Query Preparate**  
📌 **Obiettivi:** Proteggere le query SQL da attacchi malevoli.  

### **📖 Teoria**  
✅ **Query vulnerabile a SQL Injection:**  
```php
$sql = "SELECT * FROM utenti WHERE nome = '" . $_GET['nome'] . "'";
```
✅ **Query sicura con MySQLi Prepared Statements:**  
```php
$stmt = $conn->prepare("SELECT * FROM utenti WHERE nome = ?");
$stmt->bind_param("s", $_GET['nome']);
$stmt->execute();
```
✅ **Query sicura con PDO:**  
```php
$stmt = $conn->prepare("SELECT * FROM utenti WHERE nome = :nome");
$stmt->bindParam(":nome", $_GET['nome']);
$stmt->execute();
```

### **💡 Esercizio**  
1. Crea una query che recupera un utente in modo sicuro con PDO.  

---

## **🔷 BLOCCO 4.6 – Creazione di un Sistema di Login con Database**  
📌 **Obiettivi:** Creare un sistema di autenticazione con MySQL.  

### **📖 Teoria**  
✅ **Struttura tabella `utenti`:**  
```sql
CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);
```
✅ **Registrare un utente con password hash:**  
```php
$password = password_hash("mypassword", PASSWORD_BCRYPT);
$conn->query("INSERT INTO utenti (username, password) VALUES ('user1', '$password')");
```
✅ **Verificare la password in fase di login:**  
```php
$stmt = $conn->prepare("SELECT password FROM utenti WHERE username = ?");
$stmt->bind_param("s", $_POST["username"]);
$stmt->execute();
$stmt->bind_result($hashed_password);
$stmt->fetch();

if (password_verify($_POST["password"], $hashed_password)) {
    echo "Login riuscito!";
} else {
    echo "Credenziali errate.";
}
```

### **💡 Esercizio**  
1. Crea un form di login che verifica username e password usando hash.  

---

## **🔷 BLOCCO 4.7 – Relazioni tra Tabelle e JOIN in MySQL**  
📌 **Obiettivi:** Collegare più tabelle con `JOIN`.  

### **📖 Teoria**  
✅ **Esempio di due tabelle correlate:**  
```sql
CREATE TABLE ordini (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    prodotto VARCHAR(50),
    FOREIGN KEY (id_cliente) REFERENCES clienti(id)
);
```
✅ **JOIN tra `clienti` e `ordini`:**  
```sql
SELECT clienti.nome, ordini.prodotto 
FROM clienti 
JOIN ordini ON clienti.id = ordini.id_cliente;
```

### **💡 Esercizio**  
1. Crea due tabelle `autori` e `libri` collegate da una relazione, e usa una query `JOIN` per mostrare gli autori con i loro libri.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. **Obiettivo:** Creare una piccola applicazione PHP per la gestione di prodotti.  
   - Un **form** per aggiungere prodotti al database.  
   - Una **pagina** che mostra l’elenco dei prodotti con opzioni per modificarli e cancellarli.  
   - Utilizzare **query preparate** per prevenire SQL Injection.  
   - Aggiungere un **sistema di login** per gestire l’accesso.  

🚀 **Completato il Modulo 4! Sei pronto per il Modulo 5?** 😃