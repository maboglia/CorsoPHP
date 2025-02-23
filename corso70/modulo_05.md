# **📌 MODULO 5 – Gestione di Form, File e Sessioni in PHP**  
✅ **Obiettivo:** Imparare a gestire input da form, file upload e sessioni utente in PHP.  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 5.1 – Gestione dei Form in PHP**  
📌 **Obiettivi:** Imparare a raccogliere e validare i dati inviati da un form HTML.  

### **📖 Teoria**  
✅ **Form HTML di base:**  
```html
<form action="processa.php" method="POST">
    Nome: <input type="text" name="nome">
    <input type="submit" value="Invia">
</form>
```
✅ **Ricevere dati con PHP:**  
```php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    echo "Ciao, $nome!";
}
```
✅ **Validazione dell’input:**  
```php
if (empty($nome)) {
    echo "Il campo nome è obbligatorio.";
}
```
✅ **Protezione contro XSS:**  
```php
$nome = htmlspecialchars($_POST["nome"]);
```

### **💡 Esercizio**  
1. Crea un form con campi `nome`, `email` e `messaggio`, e un file PHP che li elabora con validazione.  

---

## **🔷 BLOCCO 5.2 – Upload e Gestione di File in PHP**  
📌 **Obiettivi:** Caricare e gestire file dal client al server in modo sicuro.  

### **📖 Teoria**  
✅ **Form per il caricamento di file:**  
```html
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Scegli un file: <input type="file" name="file">
    <input type="submit" value="Carica">
</form>
```
✅ **Gestire l’upload in PHP:**  
```php
if ($_FILES["file"]["error"] == 0) {
    move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
    echo "File caricato con successo!";
}
```
✅ **Limitare il tipo di file:**  
```php
$tipo = mime_content_type($_FILES["file"]["tmp_name"]);
$estensioni_permesse = ["image/png", "image/jpeg"];
if (!in_array($tipo, $estensioni_permesse)) {
    echo "Formato non consentito!";
}
```

### **💡 Esercizio**  
1. Crea un sistema di upload che accetta solo immagini `.jpg` e `.png`, e le visualizza in una pagina.  

---

## **🔷 BLOCCO 5.3 – Creazione e Utilizzo delle Sessioni**  
📌 **Obiettivi:** Creare e gestire sessioni utente per mantenere informazioni tra le pagine.  

### **📖 Teoria**  
✅ **Avviare una sessione e memorizzare dati:**  
```php
session_start();
$_SESSION["utente"] = "Luca";
```
✅ **Recuperare i dati della sessione:**  
```php
session_start();
echo "Benvenuto " . $_SESSION["utente"];
```
✅ **Distruggere la sessione:**  
```php
session_destroy();
```

### **💡 Esercizio**  
1. Crea un sistema di login che memorizza l'utente in una sessione e mostra un messaggio di benvenuto.  

---

## **🔷 BLOCCO 5.4 – Utilizzo dei Cookie in PHP**  
📌 **Obiettivi:** Memorizzare informazioni sul browser dell’utente tramite cookie.  

### **📖 Teoria**  
✅ **Creare un cookie:**  
```php
setcookie("utente", "Luca", time() + 3600); // Dura 1 ora
```
✅ **Leggere un cookie:**  
```php
if (isset($_COOKIE["utente"])) {
    echo "Ciao " . $_COOKIE["utente"];
}
```
✅ **Eliminare un cookie:**  
```php
setcookie("utente", "", time() - 3600);
```

### **💡 Esercizio**  
1. Crea un sistema che memorizza l'ultima visita di un utente con un cookie.  

---

## **🔷 BLOCCO 5.5 – Creazione di una Pagina di Contatto con Invio Email**  
📌 **Obiettivi:** Creare un form di contatto che invia email usando `mail()`.  

### **📖 Teoria**  
✅ **Creare un form di contatto:**  
```html
<form action="contatto.php" method="POST">
    Email: <input type="email" name="email">
    Messaggio: <textarea name="messaggio"></textarea>
    <input type="submit" value="Invia">
</form>
```
✅ **Inviare email con `mail()`:**  
```php
$destinatario = "admin@email.com";
$oggetto = "Nuovo messaggio";
$messaggio = $_POST["messaggio"];
$headers = "From: " . $_POST["email"];

mail($destinatario, $oggetto, $messaggio, $headers);
```

### **💡 Esercizio**  
1. Crea un form di contatto che invia un'email e mostra un messaggio di conferma.  

---

## **🔷 BLOCCO 5.6 – Creazione di una Pagina con Restrizioni di Accesso**  
📌 **Obiettivi:** Creare un'area riservata accessibile solo agli utenti autenticati.  

### **📖 Teoria**  
✅ **Proteggere una pagina con sessione:**  
```php
session_start();
if (!isset($_SESSION["utente"])) {
    header("Location: login.php");
    exit;
}
echo "Benvenuto nella tua area riservata!";
```

### **💡 Esercizio**  
1. Crea un’area riservata accessibile solo dopo il login.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. **Obiettivo:** Creare un mini sistema di gestione utenti con:  
   - **Form di registrazione e login** con sessioni.  
   - **Pagina di profilo utente** accessibile solo dopo il login.  
   - **Possibilità di caricare un'immagine profilo**.  
   - **Logout** che distrugge la sessione.  

🚀 **Completato il Modulo 5! Sei pronto per il Modulo 6?** 😃