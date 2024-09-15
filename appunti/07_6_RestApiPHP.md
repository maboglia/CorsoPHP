# **REST API con PHP**

Una **REST API** (Representational State Transfer) è un'architettura per progettare servizi web che permette di scambiare dati tra client e server utilizzando i metodi HTTP come GET, POST, PUT e DELETE. Le API RESTful sono ampiamente utilizzate per creare applicazioni moderne che comunicano via web.

In questo esempio, svilupperemo una semplice REST API con PHP 8 utilizzando il **pattern MVC** (Model-View-Controller), **PDO** per l'interazione con un database MySQL, e il namespace per una migliore organizzazione del codice.

---

### **Passi principali**

1. **Preparare l'ambiente di sviluppo**.
2. **Creare una struttura di progetto**.
3. **Configurare la connessione al database con PDO**.
4. **Creare il modello per il CRUD (Create, Read, Update, Delete)**.
5. **Implementare il controller che gestisce le richieste**.
6. **Implementare un router per indirizzare le richieste HTTP**.
7. **Gestire le risposte RESTful**.

---

### **1. Struttura del Progetto**

Organizzeremo il progetto seguendo il pattern MVC. Ecco la struttura della cartella:

```
/rest-api-php
│
├── /config
│   └── Database.php      # Connessione PDO al database
├── /controllers
│   └── OggettoController.php   # Controller per gestire le richieste
├── /models
│   └── Oggetto.php       # Modello che rappresenta un oggetto nel DB
├── /routes
│   └── api.php           # Router per gestire le rotte API
├── index.php             # Entry point dell'app
└── composer.json         # Gestione delle dipendenze
```

---

### **2. Configurazione della Connessione PDO al Database**

Creiamo la connessione al database tramite PDO in `config/Database.php`:

```php
<?php
namespace Config;

use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $db_name = 'collezione_db';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Connessione al database
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connessione fallita: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
```

---

### **3. Creazione del Modello Oggetto**

Il modello rappresenta la tabella `oggetti` nel database. In `models/Oggetto.php`, implementeremo il modello per gestire il CRUD:

```php
<?php
namespace Models;

use PDO;

class Oggetto {
    private $conn;
    private $table = 'oggetti';

    public $id;
    public $titolo;
    public $descrizione;
    public $dimensioni;
    public $prezzo;

    // Costruttore con dipendenza alla connessione PDO
    public function __construct($db) {
        $this->conn = $db;
    }

    // Lettura di tutti gli oggetti
    public function leggiTutti() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Creazione di un nuovo oggetto
    public function crea() {
        $query = 'INSERT INTO ' . $this->table . ' SET titolo = :titolo, descrizione = :descrizione, dimensioni = :dimensioni, prezzo = :prezzo';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titolo', $this->titolo);
        $stmt->bindParam(':descrizione', $this->descrizione);
        $stmt->bindParam(':dimensioni', $this->dimensioni);
        $stmt->bindParam(':prezzo', $this->prezzo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Aggiornamento di un oggetto
    public function aggiorna() {
        $query = 'UPDATE ' . $this->table . ' SET titolo = :titolo, descrizione = :descrizione, dimensioni = :dimensioni, prezzo = :prezzo WHERE id = :id';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titolo', $this->titolo);
        $stmt->bindParam(':descrizione', $this->descrizione);
        $stmt->bindParam(':dimensioni', $this->dimensioni);
        $stmt->bindParam(':prezzo', $this->prezzo);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminazione di un oggetto
    public function elimina() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
```

---

### **4. Creazione del Controller**

Il controller gestisce le richieste HTTP e interagisce con il modello. In `controllers/OggettoController.php`:

```php
<?php
namespace Controllers;

use Models\Oggetto;
use PDO;

class OggettoController {
    private $oggetto;

    public function __construct($db) {
        $this->oggetto = new Oggetto($db);
    }

    // Gestione della lettura di tutti gli oggetti
    public function leggiOggetti() {
        $stmt = $this->oggetto->leggiTutti();
        $oggetti = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($oggetti);
    }

    // Creazione di un nuovo oggetto
    public function creaOggetto($dati) {
        $this->oggetto->titolo = $dati['titolo'];
        $this->oggetto->descrizione = $dati['descrizione'];
        $this->oggetto->dimensioni = $dati['dimensioni'];
        $this->oggetto->prezzo = $dati['prezzo'];

        if ($this->oggetto->crea()) {
            echo json_encode(['message' => 'Oggetto creato con successo']);
        } else {
            echo json_encode(['message' => 'Creazione oggetto fallita']);
        }
    }

    // Aggiornamento di un oggetto esistente
    public function aggiornaOggetto($id, $dati) {
        $this->oggetto->id = $id;
        $this->oggetto->titolo = $dati['titolo'];
        $this->oggetto->descrizione = $dati['descrizione'];
        $this->oggetto->dimensioni = $dati['dimensioni'];
        $this->oggetto->prezzo = $dati['prezzo'];

        if ($this->oggetto->aggiorna()) {
            echo json_encode(['message' => 'Oggetto aggiornato con successo']);
        } else {
            echo json_encode(['message' => 'Aggiornamento oggetto fallito']);
        }
    }

    // Eliminazione di un oggetto esistente
    public function eliminaOggetto($id) {
        $this->oggetto->id = $id;

        if ($this->oggetto->elimina()) {
            echo json_encode(['message' => 'Oggetto eliminato con successo']);
        } else {
            echo json_encode(['message' => 'Eliminazione oggetto fallita']);
        }
    }
}
?>
```

---

### **5. Creazione del Router**

Il router indirizza le richieste ai metodi corretti del controller. In `routes/api.php`:

```php
<?php
use Config\Database;
use Controllers\OggettoController;

require_once '../config/Database.php';
require_once '../controllers/OggettoController.php';

// Imposta gli header HTTP
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Connessione al database
$database = new Database();
$db = $database->connect();

// Inizializza il controller
$controller = new OggettoController($db);

// Identifica il metodo della richiesta
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $controller->leggiOggetti();
        break;

    case 'POST':
        $dati = json_decode(file_get_contents("php://input"), true);
        $controller->creaOggetto($dati);
        break;

    case 'PUT':
        $id = $_GET['id'];
        $dati = json_decode(file_get_contents("php://input"), true);
        $controller->aggiornaOggetto($id, $dati);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $controller->eliminaOggetto($id);
        break;
