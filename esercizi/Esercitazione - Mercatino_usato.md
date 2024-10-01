# Esercitazione PHP: Mercatino Online dell'Usato

#### **Obiettivo**

Realizzare un'applicazione web per un "Mercatino online dell'usato" utilizzando PHP 8 e l'architettura MVC (Model-View-Controller). L'applicazione dovrà implementare funzionalità come registrazione e login degli utenti, gestione di sessioni, caricamento di immagini per i prodotti in vendita, e comunicazione tramite API REST in formato JSON per visualizzare prodotti e categorie. Il database MySQL sarà gestito tramite PDO e conterrà dati relativi agli utenti, ai prodotti e alle categorie.

### **Requisiti Tecnici**

- **PHP 8** con utilizzo di **namespace**.
- Architettura **MVC** con classi separate per il modello, la vista e il controller.
- Programmazione ad oggetti (**OOP**) con gestione di namespace.
- **Sessioni** per mantenere lo stato degli utenti loggati.
- Funzionalità di **upload di file** (immagini dei prodotti).
- **Login** sicuro con hashing delle password.
- API **RESTful** che restituiscono dati in formato **JSON**.
- Connessione al database **MySQL** tramite **PDO**.
- Dati del mercatino (utenti, prodotti, categorie) gestiti tramite database MySQL.

---

### **Descrizione dell'Esercizio**

#### **1. Struttura del Progetto (MVC)**

Crea una struttura di cartelle come segue:

```
mercatino/
├── app/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── config/
├── public/
│   ├── index.php
│   └── uploads/
└── vendor/
```

- **app/controllers/**: Contiene i controller dell'applicazione (gestione degli utenti, prodotti, categorie).
- **app/models/**: Contiene i modelli che interagiscono con il database (utenti, prodotti, categorie).
- **app/views/**: Contiene i file HTML e le interfacce utente.
- **public/index.php**: Entry point dell'applicazione.
- **public/uploads/**: Directory dove verranno salvate le immagini caricate dai venditori.
- **vendor/**: Directory per gestire le dipendenze esterne, come Composer.

---

#### **2. Database: MySQL**

Crea un database chiamato `mercatino_usato`. Utilizza la seguente struttura per le tabelle e popola il database con dati finti per il testing:

##### **Struttura del database:**

```sql
CREATE DATABASE mercatino_usato;

USE mercatino_usato;

-- Tabella utenti
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabella categorie
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Tabella prodotti
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
```

##### **Dati di esempio:**

```sql
-- Dati utenti
INSERT INTO users (username, password, email) VALUES
('john_doe', SHA2('password123', 256), 'john@example.com'),
('jane_smith', SHA2('mypassword', 256), 'jane@example.com');

-- Dati categorie
INSERT INTO categories (name) VALUES
('Elettronica'),
('Abbigliamento'),
('Libri');

-- Dati prodotti
INSERT INTO products (user_id, category_id, name, description, price, image) VALUES
(1, 1, 'Smartphone usato', 'Smartphone in ottime condizioni', 150.00, 'smartphone.jpg'),
(2, 3, 'Romanzo antico', 'Romanzo del XIX secolo', 35.00, 'libro_antico.jpg');
```

---

#### **3. Funzionalità da Implementare**

##### **3.1. Registrazione e Login degli Utenti**

- **Controller**: `UserController.php`
- **Modello**: `User.php`
- Implementa la registrazione di nuovi utenti e il login sicuro con hashing delle password (usa `password_hash` e `password_verify`).
- Mantieni lo stato dell'utente con sessioni PHP.
  
##### **3.2. Gestione dei Prodotti**

- **Controller**: `ProductController.php`
- **Modello**: `Product.php`
- Visualizzazione di tutti i prodotti del mercatino, con possibilità di filtrare per categoria.
- Funzione per inserire nuovi prodotti tramite form (incluso l'**upload di immagini**).

##### **3.3. API REST in JSON**

- Crea un controller che espone le API per:
  - Restituire tutti i prodotti in formato JSON.
  - Restituire dettagli di un prodotto specifico in base all'ID.
  - Esempio di chiamata API:

    ```
    GET /api/products
    Response:
    [
      {"id": 1, "name": "Smartphone usato", "price": "150.00", "image": "smartphone.jpg"},
      {"id": 2, "name": "Romanzo antico", "price": "35.00", "image": "libro_antico.jpg"}
    ]
    ```

##### **3.4. Upload di Immagini dei Prodotti**

- Crea un form che permetta agli utenti registrati di inserire nuovi prodotti, inclusa l'immagine (file upload).
- Gli upload devono essere salvati nella cartella `/public/uploads/`.

##### **3.5. Utilizzo delle Sessioni**

- Utilizza le sessioni PHP per mantenere lo stato di login dell'utente.
- Impedisci l'accesso ad alcune pagine senza che l'utente sia autenticato (ad es. l'inserimento di nuovi prodotti).

---

#### **4. Connessione al Database con PDO**

- Utilizza **PDO** per la connessione al database MySQL e la gestione delle query in modo sicuro.
  
Esempio di connessione PDO nel file di configurazione:

```php
<?php
namespace App\Config;

class Database {
    private $host = 'localhost';
    private $db_name = 'mercatino_usato';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Connessione fallita: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
```

---

#### **5. Autoloading e Composer**

- [Opzionale] Utilizza **Composer** per la gestione delle dipendenze e l'autoloading delle classi, in modo da organizzare al meglio il codice e rispettare il pattern **PSR-4**.

---

### **Consegna**

L'esercitazione prevede la consegna del codice sorgente del progetto e di un breve documento che descriva l'implementazione dell'applicazione e le scelte tecniche adottate.
