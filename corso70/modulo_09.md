# **📌 MODULO 9 – Sicurezza, Performance e Debugging in PHP**  
✅ **Obiettivo:** Migliorare la sicurezza e le prestazioni di un’applicazione PHP, implementando best practice per prevenire vulnerabilità e ottimizzare il codice.  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 9.1 – Protezione Contro SQL Injection**  
📌 **Obiettivi:** Capire e prevenire attacchi SQL Injection.  

### **📖 Teoria**  
✅ **Cos’è un attacco SQL Injection?**  
Un utente malintenzionato può manipolare una query SQL inserendo codice dannoso nei campi di input.  

✅ **Esempio di codice vulnerabile:**  
```php
$sql = "SELECT * FROM utenti WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'";
```
Se un utente inserisce `admin' --` nel campo username, può accedere senza password!  

✅ **Soluzione: Prepared Statements con PDO:**  
```php
$sql = "SELECT * FROM utenti WHERE username = :username AND password = :password";
$stmt = $pdo->prepare($sql);
$stmt->execute(["username" => $_POST["username"], "password" => $_POST["password"]]);
$utente = $stmt->fetch(PDO::FETCH_ASSOC);
```

### **💡 Esercizio**  
1. Modifica il codice di login dell’applicazione per usare Prepared Statements.  

---

## **🔷 BLOCCO 9.2 – Protezione Contro Cross-Site Scripting (XSS)**  
📌 **Obiettivi:** Prevenire l’inserimento di codice dannoso nelle pagine web.  

### **📖 Teoria**  
✅ **Cos’è un attacco XSS?**  
Un hacker può inserire codice JavaScript nei campi di input per rubare informazioni.  

✅ **Esempio di codice vulnerabile:**  
```php
echo "<p>Benvenuto, " . $_GET["nome"] . "!</p>";
```
Se l’utente inserisce `<script>alert('Hacked!')</script>`, lo script verrà eseguito.  

✅ **Soluzione: Sanificazione dell’input con `htmlspecialchars`**  
```php
echo "<p>Benvenuto, " . htmlspecialchars($_GET["nome"]) . "!</p>";
```

### **💡 Esercizio**  
1. Aggiungi la funzione `htmlspecialchars()` a tutti i punti in cui stampi input utente.  

---

## **🔷 BLOCCO 9.3 – Protezione Contro CSRF (Cross-Site Request Forgery)**  
📌 **Obiettivi:** Proteggere i moduli da richieste non autorizzate.  

### **📖 Teoria**  
✅ **Cos’è un attacco CSRF?**  
Un hacker potrebbe creare un link che esegue un’azione per conto dell’utente autenticato.  

✅ **Soluzione: Token CSRF nei form**  
1. Generare un token univoco:  
   ```php
   session_start();
   if (!isset($_SESSION["csrf_token"])) {
       $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
   }
   ```
2. Inserire il token nel form:  
   ```html
   <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
   ```
3. Verificare il token alla ricezione del form:  
   ```php
   if ($_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
       die("CSRF attack detected!");
   }
   ```

### **💡 Esercizio**  
1. Implementa la protezione CSRF nei moduli di login e registrazione.  

---

## **🔷 BLOCCO 9.4 – Validazione e Filtraggio degli Input Utente**  
📌 **Obiettivi:** Evitare input errati o dannosi.  

### **📖 Teoria**  
✅ **Sanificazione con `filter_var()`**  
```php
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$numero = filter_var($_POST["numero"], FILTER_VALIDATE_INT);
```

✅ **Esempio di validazione avanzata:**  
```php
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    echo "Email non valida!";
}
```

### **💡 Esercizio**  
1. Implementa validazione e sanificazione nei form di registrazione.  

---

## **🔷 BLOCCO 9.5 – Debugging e Logging in PHP**  
📌 **Obiettivi:** Usare strumenti per individuare errori nel codice.  

### **📖 Teoria**  
✅ **Attivare error reporting in fase di sviluppo:**  
```php
error_reporting(E_ALL);
ini_set("display_errors", 1);
```

✅ **Scrivere errori in un file di log:**  
```php
ini_set("log_errors", 1);
ini_set("error_log", "errors.log");
error_log("Questo è un messaggio di errore");
```

✅ **Uso di `var_dump()` e `print_r()` per debug:**  
```php
var_dump($_POST);
```

### **💡 Esercizio**  
1. Crea un file di log per registrare gli errori dell’applicazione.  

---

## **🔷 BLOCCO 9.6 – Ottimizzazione delle Prestazioni**  
📌 **Obiettivi:** Ridurre il tempo di esecuzione delle pagine.  

### **📖 Teoria**  
✅ **Caching delle query con Redis/Memcached**  
✅ **Uso di `OPcache` per velocizzare il codice PHP**  
✅ **Minimizzazione delle richieste al database**  
✅ **Compressione GZIP per migliorare la velocità di caricamento**  
```php
if (!ob_start("ob_gzhandler")) ob_start();
```

### **💡 Esercizio**  
1. Abilita OPcache sul tuo server per migliorare le prestazioni.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. **Obiettivo:** Analizzare e migliorare la sicurezza e le prestazioni dell’applicazione Biblioteca Online.  
   - Proteggere le query SQL.  
   - Implementare token CSRF nei form.  
   - Attivare logging degli errori.  
   - Ottimizzare il tempo di caricamento delle pagine.  

🚀 **Sicurezza e performance migliorate! Sei pronto per il Modulo 10?** 😃