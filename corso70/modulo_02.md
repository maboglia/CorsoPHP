# **📌 MODULO 2 – Array, Stringhe e Superglobali in PHP**  
✅ **Obiettivo:** Approfondire la gestione di array, manipolazione delle stringhe e utilizzo delle variabili superglobali.  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 2.1 – Gli Array in PHP**  
📌 **Obiettivi:** Imparare a creare e gestire array semplici e associativi.  

### **📖 Teoria**  
Un **array** è una variabile che può contenere più valori.  
✅ **Array indicizzati**:  
```php
$frutti = ["Mela", "Banana", "Arancia"];
echo $frutti[0]; // "Mela"
```
✅ **Array associativi** (chiave => valore):  
```php
$persona = ["nome" => "Luca", "eta" => 25];
echo $persona["nome"]; // "Luca"
```

### **📝 Esempio**  
```php
$auto = ["Ferrari", "BMW", "Toyota"];
foreach ($auto as $marca) {
    echo "Auto: $marca <br>";
}
```

### **💡 Esercizio**  
1. Crea un array con 5 città e stampale con `foreach()`.  

---

## **🔷 BLOCCO 2.2 – Funzioni per Gestire Array**  
📌 **Obiettivi:** Imparare a ordinare e modificare gli array.  

### **📖 Teoria**  
✅ **Aggiungere e rimuovere elementi**:  
```php
$numeri = [1, 2, 3];
array_push($numeri, 4); // Aggiunge 4
array_pop($numeri); // Rimuove l'ultimo elemento
```
✅ **Ordinare un array**:  
```php
sort($numeri); // Ordina in modo crescente
rsort($numeri); // Ordina in modo decrescente
```
✅ **Contare elementi**:  
```php
echo count($numeri); // Numero di elementi nell'array
```

### **💡 Esercizio**  
1. Crea un array di numeri casuali e ordinalo in ordine crescente.  

---

## **🔷 BLOCCO 2.3 – Manipolazione delle Stringhe**  
📌 **Obiettivi:** Imparare le principali funzioni per lavorare con stringhe in PHP.  

### **📖 Teoria**  
✅ **Concatenazione**:  
```php
$nome = "Mario";
echo "Ciao, " . $nome . "!";
```
✅ **Lunghezza di una stringa**:  
```php
echo strlen("Ciao mondo!"); // 11 caratteri
```
✅ **Maiuscolo e minuscolo**:  
```php
echo strtoupper("ciao!"); // "CIAO!"
echo strtolower("CIAO!"); // "ciao!"
```
✅ **Sostituire parti di una stringa**:  
```php
echo str_replace("gatto", "cane", "Il gatto dorme."); 
// "Il cane dorme."
```

### **💡 Esercizio**  
1. Scrivi una funzione che prende un nome e lo restituisce in maiuscolo.  

---

## **🔷 BLOCCO 2.4 – Le Variabili Superglobali in PHP**  
📌 **Obiettivi:** Comprendere il funzionamento delle variabili **$_GET**, **$_POST**, **$_SERVER**, **$_SESSION** e **$_COOKIE**.  

### **📖 Teoria**  
✅ **$_GET e $_POST** – Raccolgono dati da un form.  
✅ **$_SERVER** – Contiene informazioni sul server e la richiesta.  
✅ **$_SESSION e $_COOKIE** – Memorizzano dati tra pagine diverse.  

### **📝 Esempio**  
📌 **File:** `form.php`  
```php
<form method="GET" action="process.php">
    Nome: <input type="text" name="nome">
    <input type="submit" value="Invia">
</form>
```
📌 **File:** `process.php`  
```php
<?php
echo "Ciao, " . $_GET["nome"] . "!";
?>
```

### **💡 Esercizio**  
1. Crea un form HTML che invia un nome e lo mostra su un’altra pagina.  

---

## **🔷 BLOCCO 2.5 – Gestione delle Sessioni in PHP**  
📌 **Obiettivi:** Imparare a salvare dati tra pagine con le sessioni.  

### **📖 Teoria**  
✅ **Avviare una sessione**:  
```php
session_start();
$_SESSION["utente"] = "Luca";
```
✅ **Recuperare il valore della sessione**:  
```php
echo $_SESSION["utente"]; // "Luca"
```
✅ **Distruggere una sessione**:  
```php
session_destroy();
```

### **💡 Esercizio**  
1. Crea una pagina di login con sessione e un’altra pagina che mostra il nome dell’utente.  

---

## **🔷 BLOCCO 2.6 – Gestione dei Cookie**  
📌 **Obiettivi:** Salvare dati sul browser dell’utente.  

### **📖 Teoria**  
✅ **Impostare un cookie**:  
```php
setcookie("utente", "Marco", time() + 3600);
```
✅ **Leggere un cookie**:  
```php
echo $_COOKIE["utente"];
```
✅ **Eliminare un cookie**:  
```php
setcookie("utente", "", time() - 3600);
```

### **💡 Esercizio**  
1. Crea una pagina che salva un cookie con il nome dell’utente e lo legge alla visita successiva.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. Crea un form che:  
   - Prende un **nome** e un **colore preferito**.  
   - Usa una **sessione** per salvare il nome.  
   - Usa un **cookie** per ricordare il colore.  
   - Stampa `"Ciao, Nome! Il tuo colore preferito è X"` anche dopo un refresh della pagina.  

🚀 **Completato il Modulo 2! Sei pronto per il Modulo 3?** 😃