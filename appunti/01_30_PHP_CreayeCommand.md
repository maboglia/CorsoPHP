Ottima scelta! 🔥  
Adesso vediamo come creare **Comandi Personalizzati** con **PHP CLI** 🔌 direttamente da terminale, proprio come fanno i framework tipo **Laravel Artisan** o **Symfony Console**.

---

### 📌 Creazione di Comandi Personalizzati in PHP CLI
In questo capitolo approfondiamo:
1. Cos'è un comando personalizzato
2. Struttura base
3. Passaggio di parametri
4. Opzioni con flag
5. Colori e formattazione output
6. Input interattivi
7. Uso di **composer** per rendere i comandi globali

---

### 🔑 1. Cos'è un Comando Personalizzato?
Un **comando personalizzato** è uno script PHP eseguibile da terminale con:
- Nome comando (es. `php mycommand`)
- Parametri opzionali
- Input utente
- Output formattato
- Logica specifica

---

### 🛠️ 2. Struttura Base di un Comando
Creiamo il nostro primo comando:
```php
#!/usr/bin/env php
<?php

// Abilita gli errori
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Ciao dal comando CLI!\n";
```
---

### 🚨 Come renderlo eseguibile:
1. Salvalo come `ciao.php`
2. Rendi eseguibile il file:
```bash
chmod +x ciao.php
```
3. Eseguilo:
```bash
php ciao.php
```
---

### 3. Passaggio di Parametri
In PHP CLI, i parametri vengono letti tramite l'array `$_SERVER['argv']`.

Esempio:
```php
#!/usr/bin/env php
<?php
// Leggi i parametri
$args = $_SERVER['argv'];

if (isset($args[1])) {
    echo "Ciao, " . $args[1] . "!\n";
} else {
    echo "Nessun nome passato!\n";
}
```
👉 Esegui:
```bash
php ciao.php Mario
```
✅ Output:
```
Ciao, Mario!
```
---

### 4. Opzioni con Flag
Per creare comandi con flag tipo:
```bash
php mycommand --nome=Mario --eta=30
```
Usiamo la funzione **getopt()**:
```php
#!/usr/bin/env php
<?php
$options = getopt("", ["nome:", "eta:"]);

if (isset($options['nome']) && isset($options['eta'])) {
    echo "Ciao {$options['nome']}, hai {$options['eta']} anni.\n";
} else {
    echo "Devi passare --nome e --eta!\n";
}
```
---

### 🎨 5. Output con Colori e Formattazione
Per colorare l'output in console, usa i **Codici ANSI**:
| Colore   | Codice |
|----------|-------|
| Verde    | `\033[32m` |
| Rosso    | `\033[31m` |
| Giallo   | `\033[33m` |
| Reset    | `\033[0m` |

Esempio:
```php
echo "\033[32mSuccesso!\033[0m\n";
echo "\033[31mErrore!\033[0m\n";
```
---

### 6. Input Interattivo
Per leggere l'input utente in modo interattivo usiamo **readline()**:
```php
#!/usr/bin/env php
<?php

$nome = readline("Inserisci il tuo nome: ");
echo "Ciao $nome!\n";
```
---

### 7. Creazione di Comandi Globali con Composer
Possiamo rendere i comandi disponibili da qualsiasi cartella con **Composer**.

1. Crea un progetto Composer:
```bash
composer init
```
2. Modifica il `composer.json`:
```json
"bin": [
  "ciao.php"
]
```
3. Installa il comando globalmente:
```bash
composer install
composer global require tuoprogetto
```
Ora puoi eseguire:
```bash
ciao Mario
```
---

### Esempio Completo
Creiamo un comando:
```php
#!/usr/bin/env php
<?php

$options = getopt("", ["nome:", "eta:"]);

if (isset($options['nome']) && isset($options['eta'])) {
    echo "\033[32mBenvenuto {$options['nome']}!\033[0m\n";
    echo "Hai {$options['eta']} anni.\n";
} else {
    echo "\033[31mErrore: Devi passare --nome e --eta\033[0m\n";
}
```

---

### 🎯 Output
```bash
php user.php --nome=Marco --eta=25
```
✅ Output:
```
Benvenuto Marco!
Hai 25 anni.
```
---

### 🌐 Prossimo Step
Creiamo una **Console PHP CLI completa** con:
- Comandi multipli
- Interazione con Database (PDO)
- Configurazione da file JSON
- Log di sistema
- Test automatici con PHPUnit

---

Perfetto! Partiamo con la creazione di una console CLI personalizzata in PHP con queste caratteristiche:

### **Struttura di Base del Progetto**
```
php-cli-console/
├── console.php        # File principale per l'esecuzione dei comandi
├── config.json        # Configurazione database e parametri vari
├── commands/          # Cartella con i comandi personalizzati
│   ├── HelpCommand.php
│   ├── UserCommand.php
│   └── LogCommand.php
├── lib/              # Librerie di supporto
│   ├── Database.php
│   └── Logger.php
└── logs/             # File di log
    └── app.log
```

---

### **1. Configurazione JSON**
Il file `config.json` contiene i parametri di configurazione:
```json
{
    "db": {
        "host": "localhost",
        "dbname": "cli_console",
        "user": "root",
        "password": ""
    },
    "logs": {
        "path": "logs/app.log"
    }
}
```

---

### **2. Classe Database (lib/Database.php)**
Connessione con PDO:
```php
<?php
class Database {
    private $pdo;

    public function __construct() {
        $config = json_decode(file_get_contents(__DIR__ . '/../config.json'), true);
        $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']}";
        
        try {
            $this->pdo = new PDO($dsn, $config['db']['user'], $config['db']['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
```

---

### **3. Logger (lib/Logger.php)**
Scrittura dei log su file:
```php
<?php
class Logger {
    private $logFile;

    public function __construct() {
        $config = json_decode(file_get_contents(__DIR__ . '/../config.json'), true);
        $this->logFile = $config['logs']['path'];
    }

    public function log($message) {
        $entry = date('Y-m-d H:i:s') . " - " . $message . PHP_EOL;
        file_put_contents($this->logFile, $entry, FILE_APPEND);
    }
}
```

---

### **4. Comando Help (commands/HelpCommand.php)**
Visualizza i comandi disponibili:
```php
<?php
class HelpCommand {
    public static function execute() {
        echo "Comandi disponibili:\n";
        echo "  user:create [nome] [email]  - Crea un nuovo utente\n";
        echo "  log:view                   - Visualizza i log\n";
        echo "  help                       - Mostra i comandi disponibili\n";
    }
}
```

---

### **5. Comando Utente (commands/UserCommand.php)**
Crea un nuovo utente nel database:
```php
<?php
require_once __DIR__ . '/../lib/Database.php';
require_once __DIR__ . '/../lib/Logger.php';

class UserCommand {
    public static function create($name, $email) {
        $db = new Database();
        $pdo = $db->getConnection();
        $logger = new Logger();

        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);

        echo "Utente $name creato con successo!\n";
        $logger->log("Creato utente: $name ($email)");
    }
}
```

---

### **6. Console Principale (console.php)**
Gestione degli input CLI:
```php
<?php
require_once 'commands/HelpCommand.php';
require_once 'commands/UserCommand.php';
require_once 'commands/LogCommand.php';

if ($argc < 2) {
    HelpCommand::execute();
    exit;
}

$command = $argv[1];
$params = array_slice($argv, 2);

switch ($command) {
    case 'help':
        HelpCommand::execute();
        break;
    case 'user:create':
        if (count($params) == 2) {
            UserCommand::create($params[0], $params[1]);
        } else {
            echo "Uso: user:create [nome] [email]\n";
        }
        break;
    case 'log:view':
        LogCommand::execute();
        break;
    default:
        echo "Comando sconosciuto!\n";
        HelpCommand::execute();
}
```

---

### **7. Eseguire la Console**
Dalla riga di comando:
```bash
php console.php help
php console.php user:create Mario mario@example.com
php console.php log:view
```

---

### **8. Log di Sistema**
I log vengono salvati in:
```
logs/app.log
```
Esempio di log:
```
2025-02-27 14:30:12 - Creato utente: Mario (mario@example.com)
```

---

### **9. Creazione di Domande Aiken**
Genera domande aiken da console:
```bash
php console.php aiken:generate
```

---

### **10. Prossimi Passi**
- Creazione di comandi per esportazione CSV, JSON e XML
- Interazione con API esterne
- Validazione degli input CLI
- Test Unitari
