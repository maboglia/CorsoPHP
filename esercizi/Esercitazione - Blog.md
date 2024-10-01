# Esercitazione PHP 8: Creazione di un Blog

#### Tema: Blog con Funzionalità di Post e Commenti

In questa esercitazione svilupperai un’applicazione web che simula la gestione di un blog. L'applicazione sarà costruita utilizzando **PHP 8**, seguendo il pattern **MVC** (Model-View-Controller) e sfruttando la **programmazione orientata agli oggetti (OOP)** con l'uso di **namespace** per mantenere il codice organizzato. L'applicazione includerà funzionalità di caricamento di immagini, sessioni per autenticare gli utenti, gestione di post e commenti, e una **REST API** per l'interazione con i contenuti del blog. Il database **MySQL** sarà gestito tramite **PDO**.

---

### Obiettivi dell'Esercitazione

1. Strutturare l’applicazione seguendo il pattern **MVC**.
2. Creare un sistema di autenticazione tramite login/logout usando **sessioni**.
3. Consentire il **caricamento di immagini** per i post del blog.
4. Gestire il database **MySQL** per salvare utenti, post e commenti tramite **PDO**.
5. Fornire un'**API REST** per interagire con i contenuti del blog in formato **JSON**.
6. Utilizzare i **namespace** per organizzare il codice.

---

### Struttura del Progetto

```
/project_root
    /app
        /controllers
            PostController.php
            UserController.php
        /models
            Post.php
            Comment.php
            User.php
        /views
            /posts
                index.php
                create.php
                show.php
            /user
                login.php
    /public
        index.php
        /uploads
            /posts
    /config
        database.php
        routes.php
    /api
        posts.php
        comments.php
    /vendor
    .htaccess
    composer.json
```

---

### Passi dell'Esercitazione

#### 1. Setup del Database

Crea un database MySQL chiamato `blog_db` con tre tabelle principali: `users`, `posts` e `comments`. La tabella `users` sarà utilizzata per autenticare gli utenti, `posts` conterrà i post del blog, e `comments` terrà i commenti dei lettori sui post.

```sql
CREATE DATABASE blog_db;

USE blog_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    post_id INT,
    user_id INT,
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Dati fake per utenti
INSERT INTO users (username, password, email) VALUES 
('admin', 'password_hash1', 'admin@example.com'),
('user1', 'password_hash2', 'user1@example.com');

-- Dati fake per post
INSERT INTO posts (title, content, image, user_id) VALUES 
('Benvenuto nel mio blog', 'Questo è il mio primo post sul blog.', 'post1.png', 1),
('PHP e OOP', 'In questo post parliamo della programmazione orientata agli oggetti in PHP.', 'post2.png', 2);
```

#### 2. Struttura MVC

##### a. **Controller**

Crea un controller `PostController.php` per gestire i post del blog. Questo controller includerà i metodi per visualizzare tutti i post, visualizzare un singolo post, creare nuovi post e aggiungere commenti.

##### b. **Model**

Crea il modello `Post.php` che rappresenterà la tabella `posts` e il modello `Comment.php` per i commenti. Questi modelli gestiranno l’interazione con il database tramite **PDO**.

##### c. **View**

Crea le viste `index.php` per visualizzare la lista dei post, `create.php` per creare un nuovo post e `show.php` per visualizzare un singolo post con i suoi commenti. Utilizza i dati passati dal controller per popolare le viste.

#### 3. Login e Sessioni

Implementa un sistema di login/logout tramite sessioni. Crea un controller `UserController.php` per gestire l’autenticazione. Gli utenti dovranno accedere per poter creare nuovi post o commentare. Usa **password_hash()** per memorizzare le password e **password_verify()** per il login.

#### 4. Caricamento Immagini per i Post

Implementa la funzionalità di **upload** per consentire agli utenti di caricare immagini associate ai post del blog. Le immagini saranno caricate nella cartella `/public/uploads/posts` e verranno gestite nel `PostController.php`.

```php
public function uploadImage($file) {
    $target_dir = "uploads/posts/";
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);
    return $target_file;
}
```

#### 5. Connessione al Database con PDO

Crea un file `database.php` in `/config` per la gestione della connessione al database tramite **PDO**.

```php
class Database {
    private $host = "localhost";
    private $db_name = "blog_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
```

#### 6. API REST per Post e Commenti

Crea delle **REST API** per permettere l’interazione con i post e i commenti tramite richieste **GET**, **POST**, **PUT** e **DELETE**. I file `posts.php` e `comments.php` in `/api` gestiranno le operazioni sui post e sui commenti rispettivamente.

Esempio di gestione delle richieste **GET** per ottenere tutti i post:

```php
header("Content-Type: application/json");

require_once '../config/database.php';
require_once '../models/Post.php';

$database = new Database();
$db = $database->getConnection();

$post = new Post($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $posts = $post->getAll();
    echo json_encode($posts);
}
```

#### 7. Organizzazione dei Namespace

Organizza i modelli e i controller usando **namespace** per separare i componenti. Ad esempio, nel file `Post.php`, definisci un namespace specifico:

```php
namespace App\Models;

class Post {
    // Logica del modello Post
}
```

#### 8. Gestione delle Rotte

Configura le rotte nel file `routes.php` per definire quali URL dell’applicazione verranno gestiti da quali controller.

---

### Logica CRUD per i Post

- **Creazione di un post**: Implementa un form nella vista `create.php` per consentire agli utenti autenticati di inserire nuovi post. La logica per salvare i post nel database sarà gestita nel `PostController.php`.
  
- **Visualizzazione dei post**: Nella vista `index.php`, elenca tutti i post recuperati dal database attraverso il modello `Post.php`.

---

### Conclusione

Concludendo questa esercitazione, avrai creato un’applicazione blog completa utilizzando **PHP 8** con **MVC**. L’applicazione consentirà la gestione dei post e dei commenti con l’aggiunta di sessioni per l’autenticazione, caricamento immagini, e un’interfaccia API REST. La connessione al database sarà gestita tramite **PDO** con **MySQL**, mentre l’organizzazione del codice sarà strutturata tramite l’uso di **namespace**.
