# Esercitazione PHP 8: Creare una Gestione di Collezioni di Carte Pokémon

#### Tema: Collezione di Carte Pokémon

In questa esercitazione, svilupperai un'applicazione web con PHP 8 che consente agli utenti di gestire la propria collezione di carte Pokémon. L’applicazione sarà costruita seguendo il pattern MVC (Model-View-Controller), utilizzando la programmazione orientata agli oggetti (OOP), e organizzata tramite **namespace**. Inoltre, l'applicazione gestirà il login, le sessioni, l'upload di immagini, e fornirà API REST in formato JSON per accedere ai dati delle carte. La connessione al database MySQL sarà gestita tramite PDO.

---

### Obiettivi

1. Implementare una struttura MVC per l'applicazione.
2. Gestire le sessioni e l’autenticazione degli utenti (login/logout).
3. Consentire l’upload di immagini delle carte.
4. Interagire con un database MySQL tramite PDO per salvare carte, collezioni e utenti.
5. Esportare i dati delle carte tramite API REST in formato JSON.
6. Organizzare il codice in namespace per garantire modularità e manutenibilità.

---

### Struttura del Progetto

Il progetto avrà la seguente struttura di cartelle:

```
/project_root
    /app
        /controllers
            CardController.php
            UserController.php
        /models
            Card.php
            Collection.php
            User.php
        /views
            /cards
                index.php
                create.php
            /user
                login.php
    /public
        index.php
        /uploads
            /cards
    /config
        database.php
        routes.php
    /api
        cards.php
    /vendor
    .htaccess
    composer.json
```

---

### Passi da Seguire

#### 1. Setup del Database

Crea un database MySQL chiamato `pokemon_collection` con tre tabelle: `users`, `collections`, e `cards`. Usa i seguenti dati fake per popolarlo.

```sql
CREATE DATABASE pokemon_collection;

USE pokemon_collection;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE collections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    collection_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(50) NOT NULL,
    image VARCHAR(255) NULL,
    rarity VARCHAR(50) NOT NULL,
    FOREIGN KEY (collection_id) REFERENCES collections(id)
);

-- Inserimento di dati fake
INSERT INTO users (username, password, email) VALUES 
('trainer1', 'password_hash1', 'trainer1@example.com'),
('trainer2', 'password_hash2', 'trainer2@example.com');

INSERT INTO collections (user_id, name, description) VALUES 
(1, 'Base Set', 'Prima edizione delle carte Pokémon.'),
(2, 'Jungle Set', 'Collezione di carte della serie Jungle.');

INSERT INTO cards (collection_id, name, type, image, rarity) VALUES 
(1, 'Charizard', 'Fire', 'charizard.png', 'Rare'),
(1, 'Blastoise', 'Water', 'blastoise.png', 'Rare'),
(2, 'Pikachu', 'Electric', 'pikachu.png', 'Common');
```

#### 2. Struttura MVC

##### a. **Controller**

Crea un controller chiamato `CardController.php` per gestire le operazioni CRUD delle carte (creazione, lettura, aggiornamento, eliminazione). Il controller dovrà includere metodi per visualizzare le carte, aggiungere nuove carte e modificare le esistenti.

##### b. **Model**

Crea i modelli `Card.php`, `Collection.php` e `User.php`. Questi modelli rappresenteranno le tabelle `cards`, `collections` e `users` nel database e permetteranno l’interazione tramite PDO.

##### c. **View**

Crea una vista `index.php` che mostrerà la lista delle carte di una collezione specifica e una vista `create.php` per aggiungere nuove carte alla collezione.

#### 3. Login e Sessioni

Implementa un sistema di autenticazione gestito da sessioni. Gli utenti dovranno autenticarsi per accedere alle proprie collezioni e carte. Il login sarà gestito da `UserController.php` e utilizzerà sessioni PHP. Le password saranno salvate in modo sicuro utilizzando `password_hash()` e verificate con `password_verify()`.

#### 4. Upload di Immagini delle Carte

Crea una funzione di upload per le immagini delle carte nel controller `CardController.php`. Le immagini saranno caricate nella cartella `/public/uploads/cards`.

```php
// Esempio di funzione di upload di immagine
public function uploadImage($file) {
    $target_dir = "uploads/cards/";
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);
    return $target_file;
}
```

#### 5. Connessione al Database con PDO

Crea una classe `Database.php` in `/config` per gestire la connessione al database MySQL utilizzando PDO.

```php
class Database {
    private $host = "localhost";
    private $db_name = "pokemon_collection";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
```

#### 6. Creazione di API REST

Crea un file `cards.php` nella cartella `/api` per gestire le richieste API REST. L'API dovrà supportare:

- **GET**: Restituisce tutte le carte di una collezione specifica in formato JSON.
- **POST**: Aggiunge una nuova carta alla collezione.

```php
header("Content-Type: application/json");

require_once '../config/database.php';
require_once '../models/Card.php';

$database = new Database();
$db = $database->getConnection();

$card = new Card($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cards = $card->getAllByCollectionId($_GET['collection_id']);
    echo json_encode($cards);
}
```

#### 7. Organizzazione dei Namespace

Organizza il codice utilizzando i namespace per mantenere la struttura del codice pulita e modulare. Ad esempio, utilizza il seguente namespace nel modello `Card.php`:

```php
namespace App\Models;

class Card {
    // Codice del modello Card
}
```

---

### Conclusione

Con questa esercitazione, svilupperai una piattaforma di gestione di collezioni di carte Pokémon, utilizzando PHP 8 e integrando sessioni, upload di immagini, API REST, e PDO per la connessione al database MySQL. Questa architettura MVC, unita a OOP e namespace, ti permetterà di creare un’applicazione ben organizzata e scalabile.
