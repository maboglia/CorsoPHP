# Esercitazione PHP 8: Creare una Gestione di Playlist di Video YouTube

#### Tema: Playlist di Video YouTube

In questa esercitazione, realizzerai un'applicazione web basata su PHP 8 che permette agli utenti di gestire le proprie playlist di video di YouTube. L’applicazione utilizzerà il pattern architetturale MVC (Model-View-Controller), sarà orientata agli oggetti (OOP), e organizzerà il codice utilizzando i **namespace**. Verranno gestiti login, sessioni, upload di file, e l'interazione con un database MySQL tramite PDO. Inoltre, sarà prevista una API REST che permetterà di accedere ai dati in formato JSON.

### Obiettivi

1. Creare una struttura base MVC in PHP 8.
2. Implementare la gestione delle sessioni per il login degli utenti.
3. Creare un sistema di upload per le immagini di copertina delle playlist.
4. Interagire con un database MySQL usando PDO per gestire utenti, video e playlist.
5. Implementare API REST per l'accesso ai dati delle playlist in formato JSON.
6. Organizzare il codice utilizzando namespace per migliorare la manutenibilità.

---

### Struttura del Progetto

Il progetto avrà la seguente struttura di cartelle:

```
/project_root
    /app
        /controllers
            PlaylistController.php
            UserController.php
        /models
            Playlist.php
            User.php
            Video.php
        /views
            /playlist
                index.php
                create.php
            /user
                login.php
    /public
        index.php
        /uploads
            /images
    /config
        database.php
        routes.php
    /api
        playlist.php
    /vendor
    .htaccess
    composer.json
```

---

### Passi da Seguire

#### 1. Setup del Database

Crea un database MySQL chiamato `youtube_playlist` con tre tabelle: `users`, `playlists`, e `videos`. Usa i seguenti dati fake per popolarlo.

```sql
CREATE DATABASE youtube_playlist;

USE youtube_playlist;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE playlists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    cover_image VARCHAR(255) NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    playlist_id INT NOT NULL,
    youtube_url VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    FOREIGN KEY (playlist_id) REFERENCES playlists(id)
);

-- Inserimento di dati fake
INSERT INTO users (username, password, email) VALUES 
('user1', 'password_hash1', 'user1@example.com'),
('user2', 'password_hash2', 'user2@example.com');

INSERT INTO playlists (user_id, title, cover_image) VALUES 
(1, 'My Favorite Videos', 'cover1.jpg'),
(2, 'Top Music Hits', 'cover2.jpg');

INSERT INTO videos (playlist_id, youtube_url, title) VALUES 
(1, 'https://www.youtube.com/watch?v=video1', 'Video 1 Title'),
(1, 'https://www.youtube.com/watch?v=video2', 'Video 2 Title'),
(2, 'https://www.youtube.com/watch?v=video3', 'Video 3 Title');
```

#### 2. Struttura MVC

##### a. **Controller**

Crea un controller chiamato `PlaylistController.php` per gestire le operazioni CRUD delle playlist. Il controller dovrà gestire le operazioni di visualizzazione, creazione e modifica delle playlist.

##### b. **Model**

Crea un modello chiamato `Playlist.php` che rappresenti la logica della playlist e permetta l'interazione con la tabella `playlists` nel database usando PDO.

##### c. **View**

Crea una vista `index.php` per elencare tutte le playlist dell'utente loggato. Un’altra vista, `create.php`, permetterà all’utente di creare una nuova playlist.

#### 3. Sessioni e Login

Implementa un sistema di login nella classe `UserController.php`. L'utente dovrà autenticarsi utilizzando la tabella `users` e le sessioni PHP. Usa la funzione `password_hash()` per salvare le password in modo sicuro e `password_verify()` per verificarle durante il login.

#### 4. Upload di Immagini

Crea una funzione nella classe `PlaylistController.php` per permettere l'upload dell'immagine di copertina della playlist. Salva l'immagine nella cartella `/public/uploads/images`.

#### 5. Connessione al Database con PDO

Crea una classe `Database.php` all’interno della cartella `/config` per gestire la connessione al database MySQL utilizzando PDO.

```php
class Database {
    private $host = "localhost";
    private $db_name = "youtube_playlist";
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

#### 6. Creazione di un'API REST

Crea un file `playlist.php` nella cartella `/api` per esporre le playlist in formato JSON. L’API dovrà fornire le seguenti funzionalità:

- **GET**: Restituisce tutte le playlist dell’utente.
- **POST**: Crea una nuova playlist.

```php
header("Content-Type: application/json");

require_once '../config/database.php';
require_once '../models/Playlist.php';

$database = new Database();
$db = $database->getConnection();

$playlist = new Playlist($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $playlists = $playlist->getAll();
    echo json_encode($playlists);
}
```

#### 7. Namespace

Organizza il codice utilizzando namespace per evitare conflitti di nomi e mantenere il progetto modulare. Ad esempio, nel modello `Playlist.php`, utilizza il seguente namespace:

```php
namespace App\Models;

class Playlist {
    // Codice della classe Playlist
}
```

---

### Conclusione

Questa esercitazione ti guiderà attraverso la creazione di una piattaforma per gestire playlist di video YouTube, combinando vari aspetti del moderno sviluppo PHP, inclusi MVC, OOP, PDO, API REST e sessioni.
