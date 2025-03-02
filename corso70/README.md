# **Corso Completo di PHP (70 ore)**  

Ecco un programma dettagliato per un **corso di PHP da 70 ore**, che copre dalle basi fino agli argomenti avanzati.  

---

## **Modulo 1: Introduzione a PHP (10 ore)**  

1. **Cos'è PHP e come funziona**  
2. Installazione di PHP, Apache e MySQL (XAMPP, MAMP, LAMP)  
3. Primo script PHP  
4. Sintassi di base e struttura di un file PHP  
5. Variabili e tipi di dati  
6. Operatori in PHP  

## **Modulo 2: Strutture di Controllo (8 ore)**  

7. Condizioni (`if`, `else`, `switch`)  
8. Cicli (`while`, `for`, `foreach`, `do-while`)  
9. Array e manipolazione degli array  
10. Funzioni personalizzate e funzioni PHP integrate  

## **Modulo 3: Programmazione Orientata agli Oggetti (OOP) (10 
ore)**  
11. Introduzione alla OOP  
12. Classi e oggetti  
13. Proprietà e metodi  
14. Costruttori e distruttori  
15. Ereditarietà e polimorfismo  
16. Interfacce e trait  
17. Namespace e autoloading  

## **Modulo 4: Lavorare con i Database (10 ore)**  

18. Introduzione a MySQL e SQL  
19. Connessione a MySQL con MySQLi e PDO  
20. Operazioni CRUD (Create, Read, Update, Delete)  
21. Query preparate e prevenzione SQL Injection  
22. Relazioni tra tabelle e join  
23. Gestione degli errori con database  

## **Modulo 5: Gestione delle Form e Sicurezza (8 ore)**  

24. Creazione e gestione di form HTML con PHP  
25. Validazione dei dati  
26. Upload di file  
27. Sessioni e cookie  
28. Sicurezza in PHP (XSS, CSRF, Hashing password con `password_hash`)  

## **Modulo 6: PHP Avanzato (14 ore)**  

29. API REST con PHP  
30. Consumo di API esterne con `cURL`  
31. Uso di Composer e librerie PHP  
32. Gestione degli errori ed eccezioni  
33. Invio di email con PHP (`PHPMailer`)  
34. Cache e ottimizzazione delle performance  
35. Creazione di un piccolo framework MVC da zero  

## **Modulo 7: Progetto Finale (10 ore)**  

36. Sviluppo di un'applicazione web completa con autenticazione utente  
37. Integrazione con un database  
38. Dashboard con grafici e statistiche  
39. Deploy su un hosting web  

---

Perfetto! Ecco la **parte teorica del corso** suddivisa per moduli.  

---

# **Modulo 1: Introduzione a PHP**  

### **Cos'è PHP e come funziona?**  
PHP (Hypertext Preprocessor) è un linguaggio di programmazione lato server utilizzato per lo sviluppo web. Permette di generare pagine dinamiche interagendo con database e altri servizi.  

**Caratteristiche principali:**  
- Open-source e gratuito  
- Supportato dalla maggior parte dei server web  
- Facilmente integrabile con HTML e database come MySQL  
- Compatibile con vari sistemi operativi (Windows, Linux, macOS)  

### **Installazione di PHP, Apache e MySQL**  
Per eseguire PHP in locale, puoi installare:  
- **XAMPP** (Windows, macOS, Linux)  
- **MAMP** (macOS)  
- **LAMP** (Linux)  

Dopo l’installazione, crea un file `index.php` nella cartella `htdocs` (XAMPP) e scrivi:  
```php
<?php
  echo "Ciao, mondo!";
?>
```  
Apri il browser e vai su `http://localhost/index.php` per vedere il risultato.  

---

# **Modulo 2: Strutture di Controllo**  

### **Variabili e Tipi di Dati**  
PHP è debolmente tipizzato, il che significa che le variabili non hanno bisogno di una dichiarazione esplicita del tipo.  
```php
$nome = "Mario";  // Stringa
$eta = 30;        // Intero
$prezzo = 19.99;  // Float
$online = true;   // Booleano
$array = [1, 2, 3]; // Array
```  

### **Condizioni e Cicli**  
```php
// IF-ELSE
$eta = 18;
if ($eta >= 18) {
    echo "Sei maggiorenne.";
} else {
    echo "Sei minorenne.";
}

// FOR LOOP
for ($i = 0; $i < 5; $i++) {
    echo "Numero: $i ";
}

// FOREACH LOOP
$nomi = ["Luca", "Giulia", "Marco"];
foreach ($nomi as $nome) {
    echo $nome;
}
```

---

# **Modulo 3: Programmazione Orientata agli Oggetti (OOP)**  

### **Creazione di Classi e Oggetti**  
```php
class Persona {
    public $nome;
    public $eta;

    public function __construct($nome, $eta) {
        $this->nome = $nome;
        $this->eta = $eta;
    }

    public function saluta() {
        return "Ciao, mi chiamo $this->nome e ho $this->eta anni.";
    }
}

$persona1 = new Persona("Mario", 25);
echo $persona1->saluta();
```

---

# **Modulo 4: Lavorare con i Database**  

### **Connessione a MySQL con PDO**  
```php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=miodatabase", "root", "");
    echo "Connessione riuscita!";
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}
```

### **Eseguire Query (CRUD)**  
```php
// INSERIRE DATI
$sql = "INSERT INTO utenti (nome, email) VALUES ('Mario', 'mario@email.com')";
$pdo->exec($sql);

// LEGGERE DATI
$query = $pdo->query("SELECT * FROM utenti");
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo $row['nome'] . " - " . $row['email'];
}
```

---

# **Modulo 5: Gestione delle Form e Sicurezza**  

### **Gestire Form HTML con PHP**  
```php
<form method="POST" action="process.php">
    Nome: <input type="text" name="nome">
    <input type="submit" value="Invia">
</form>
```
**Nel file `process.php`:**  
```php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    echo "Ciao, $nome!";
}
```

### **Sicurezza: Prevenire SQL Injection**  
Utilizzare query preparate:  
```php
$stmt = $pdo->prepare("INSERT INTO utenti (nome, email) VALUES (:nome, :email)");
$stmt->execute(['nome' => $nome, 'email' => $email]);
```

---

# **Modulo 6: PHP Avanzato**  

### **Creazione di un'API REST**  
```php
header("Content-Type: application/json");
$risposta = ["messaggio" => "Benvenuto nella mia API!"];
echo json_encode($risposta);
```

### **Utilizzo di cURL per chiamare API esterne**  
```php
$ch = curl_init("https://api.example.com/data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
```

### **Gestione degli errori con le eccezioni**  
```php
try {
    $result = 10 / 0;
} catch (Exception $e) {
    echo "Errore: " . $e->getMessage();
}
```

---

# **Modulo 7: Progetto Finale**  
Creazione di un'app con:  
✅ Autenticazione utente  
✅ Gestione database  
✅ Dashboard con statistiche  

---
