# **📌 MODULO 8 – Creazione di un'Applicazione Web Completa con PHP e MySQL**  
✅ **Obiettivo:** Mettere in pratica le conoscenze acquisite costruendo un'applicazione web completa con PHP, MySQL e PDO.  
✅ **Durata:** ~12 ore  

---

## **🔷 BLOCCO 8.1 – Progettazione dell’Applicazione**  
📌 **Obiettivi:** Pianificare la struttura dell’applicazione web.  

### **📖 Teoria**  
✅ **Scelta del progetto:**  
- Un sistema di gestione di una **biblioteca online**.  
- Funzionalità principali:
  - Registrazione e login degli utenti.
  - Aggiunta, modifica e rimozione di libri.
  - Ricerca e visualizzazione dei libri.
  - Prenotazione di un libro.  

✅ **Progettazione del database:**  
```sql
CREATE DATABASE biblioteca_online;
USE biblioteca_online;

CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    ruolo ENUM('utente', 'admin') NOT NULL DEFAULT 'utente'
);

CREATE TABLE libri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255) NOT NULL,
    autore VARCHAR(255) NOT NULL,
    anno_pubblicazione INT NOT NULL,
    disponibile BOOLEAN DEFAULT TRUE
);

CREATE TABLE prenotazioni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utente INT,
    id_libro INT,
    data_prenotazione DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utente) REFERENCES utenti(id),
    FOREIGN KEY (id_libro) REFERENCES libri(id)
);
```

### **💡 Esercizio**  
1. Crea la struttura del database e popolalo con dati di esempio.  

---

## **🔷 BLOCCO 8.2 – Creazione dell’Interfaccia di Registrazione e Login**  
📌 **Obiettivi:** Implementare l'autenticazione degli utenti.  

### **📖 Teoria**  
✅ **Modulo di registrazione:**  
```php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    
    $sql = "INSERT INTO utenti (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $username, "password" => $password]);

    echo "Registrazione completata!";
}
```

✅ **Modulo di login:**  
```php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "SELECT * FROM utenti WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $_POST["username"]]);
    $utente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utente && password_verify($_POST["password"], $utente["password"])) {
        $_SESSION["utente"] = $utente["username"];
        echo "Accesso riuscito!";
    } else {
        echo "Credenziali errate!";
    }
}
```

### **💡 Esercizio**  
1. Crea un’interfaccia di registrazione e login con sessioni.  

---

## **🔷 BLOCCO 8.3 – Implementazione del Catalogo Libri**  
📌 **Obiettivi:** Creare una pagina che visualizza tutti i libri disponibili.  

### **📖 Teoria**  
✅ **Visualizzare i libri disponibili:**  
```php
$sql = "SELECT * FROM libri WHERE disponibile = 1";
$stmt = $pdo->query($sql);
$libri = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($libri as $libro) {
    echo "<p>{$libro['titolo']} di {$libro['autore']}</p>";
}
```

✅ **Ricerca di un libro:**  
```php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "SELECT * FROM libri WHERE titolo LIKE :titolo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["titolo" => "%" . $_POST["ricerca"] . "%"]);
    $libri = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
```

### **💡 Esercizio**  
1. Crea un modulo di ricerca per filtrare i libri per titolo e autore.  

---

## **🔷 BLOCCO 8.4 – Aggiunta, Modifica ed Eliminazione di Libri**  
📌 **Obiettivi:** Implementare le funzionalità CRUD per i libri.  

### **📖 Teoria**  
✅ **Aggiungere un nuovo libro:**  
```php
$sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione) VALUES (:titolo, :autore, :anno)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    "titolo" => $_POST["titolo"],
    "autore" => $_POST["autore"],
    "anno" => $_POST["anno"]
]);
```

✅ **Modificare un libro:**  
```php
$sql = "UPDATE libri SET titolo = :titolo, autore = :autore, anno_pubblicazione = :anno WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    "titolo" => $_POST["titolo"],
    "autore" => $_POST["autore"],
    "anno" => $_POST["anno"],
    "id" => $_POST["id"]
]);
```

✅ **Eliminare un libro:**  
```php
$sql = "DELETE FROM libri WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $_POST["id"]]);
```

### **💡 Esercizio**  
1. Crea un'interfaccia di amministrazione per aggiungere, modificare ed eliminare libri.  

---

## **🔷 BLOCCO 8.5 – Prenotazione di un Libro**  
📌 **Obiettivi:** Permettere agli utenti di prenotare un libro.  

### **📖 Teoria**  
✅ **Prenotare un libro:**  
```php
$sql = "INSERT INTO prenotazioni (id_utente, id_libro) VALUES (:id_utente, :id_libro)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    "id_utente" => $_SESSION["utente_id"],
    "id_libro" => $_POST["id_libro"]
]);

$sql = "UPDATE libri SET disponibile = 0 WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $_POST["id_libro"]]);
```

✅ **Visualizzare le prenotazioni di un utente:**  
```php
$sql = "SELECT libri.titolo, libri.autore FROM prenotazioni 
        JOIN libri ON prenotazioni.id_libro = libri.id
        WHERE prenotazioni.id_utente = :id_utente";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id_utente" => $_SESSION["utente_id"]]);
$prenotazioni = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

### **💡 Esercizio**  
1. Implementa la prenotazione dei libri con aggiornamento della disponibilità.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. **Obiettivo:** Completare l’applicazione **Biblioteca Online** con:
   - Registrazione/Login utenti.
   - Visualizzazione e ricerca dei libri.
   - CRUD per la gestione dei libri.
   - Sistema di prenotazione.  

🚀 **Applicazione completa! Sei pronto per il Modulo 9?** 😃