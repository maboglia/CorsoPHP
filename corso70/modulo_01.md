# **📌 MODULO 1 – Introduzione a PHP**  
✅ **Obiettivo:** Fornire le basi di PHP, dalla sintassi fondamentale alla gestione di variabili, operatori e strutture di controllo.  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 1.1 – Cos'è PHP?**  
📌 **Obiettivi:** Comprendere cos’è PHP, a cosa serve e come funziona.  

### **📖 Teoria**  
PHP (*Hypertext Preprocessor*) è un linguaggio di scripting lato server usato per creare pagine web dinamiche.  
✅ È **open-source** e molto usato per lo sviluppo web.  
✅ Si esegue lato **server**, generando **HTML dinamico**.  
✅ Funziona insieme a **Apache** (server) e **MySQL** (database).  

### **📝 Esempio**  
Un file PHP ha estensione `.php` e può contenere sia **HTML** che **codice PHP**:  
```php
<!DOCTYPE html>
<html>
<body>
    <h1><?php echo "Ciao, mondo!"; ?></h1>
</body>
</html>
```

### **💡 Esercizio**  
1. Installa **XAMPP** o **MAMP** per eseguire PHP in locale.  
2. Crea un file `test.php` con il codice sopra e aprilo nel browser.  

---

## **🔷 BLOCCO 1.2 – Sintassi Base di PHP**  
📌 **Obiettivi:** Comprendere la sintassi e le regole fondamentali di PHP.  

### **📖 Teoria**  
📌 PHP usa **tag di apertura e chiusura**:  
```php
<?php
    echo "Ciao, PHP!";
?>
```
📌 **Regole fondamentali:**  
✅ **Le istruzioni terminano con `;`**  
✅ **PHP è case-sensitive per le variabili (`$nome` ≠ `$NOME`)**  
✅ **Commenti**:  
```php
// Questo è un commento su una riga
/* Questo è un commento
   su più righe */
```

### **📝 Esempio**  
```php
<?php
echo "Benvenuto in PHP!"; // Stampa un testo
?>
```

### **💡 Esercizio**  
1. Scrivi uno script PHP che stampi `"PHP è fantastico!"`.  

---

## **🔷 BLOCCO 1.3 – Variabili e Tipi di Dato**  
📌 **Obiettivi:** Dichiarare variabili e capire i tipi di dato.  

### **📖 Teoria**  
✅ Una variabile in PHP inizia con `$`:  
```php
$nome = "Mario";
$eta = 25;
```
✅ **Tipi di dato principali:**  
- **Stringhe**: `"Ciao"`  
- **Numeri interi**: `10, -5, 0`  
- **Float**: `3.14, -2.5`  
- **Booleani**: `true, false`  

### **📝 Esempio**  
```php
<?php
$nome = "Luca";
$eta = 30;
echo "Mi chiamo $nome e ho $eta anni.";
?>
```

### **💡 Esercizio**  
1. Crea tre variabili: **nome**, **città** e **età**. Stampale in una frase.  

---

## **🔷 BLOCCO 1.4 – Operatori in PHP**  
📌 **Obiettivi:** Usare gli operatori matematici e logici in PHP.  

### **📖 Teoria**  
✅ **Operatori aritmetici**:  
```php
$somma = 10 + 5;    // 15
$prodotto = 10 * 5; // 50
```
✅ **Operatori di confronto**:  
```php
var_dump(5 == "5"); // true
var_dump(5 === "5"); // false (tipo diverso)
```
✅ **Operatori logici**:  
```php
$attivo = true;
var_dump($attivo && false); // false
```

### **💡 Esercizio**  
1. Scrivi uno script che calcoli la somma e il prodotto di due numeri.  

---

## **🔷 BLOCCO 1.5 – Strutture di Controllo**  
📌 **Obiettivi:** Imparare `if`, `else`, `switch`, e i cicli (`for`, `while`).  

### **📖 Teoria**  
✅ **If-Else:**  
```php
$eta = 18;
if ($eta >= 18) {
    echo "Sei maggiorenne!";
} else {
    echo "Sei minorenne!";
}
```
✅ **Switch:**  
```php
$colore = "rosso";
switch ($colore) {
    case "rosso":
        echo "Il colore è rosso!";
        break;
    default:
        echo "Colore sconosciuto.";
}
```

### **💡 Esercizio**  
1. Scrivi uno script che controlli se un numero è **pari o dispari**.  

---

## **🔷 BLOCCO 1.6 – Cicli (for, while, foreach)**  
📌 **Obiettivi:** Capire i cicli per iterare su dati e array.  

### **📖 Teoria**  
✅ **For** (ciclo con contatore):  
```php
for ($i = 1; $i <= 5; $i++) {
    echo "Numero: $i <br>";
}
```
✅ **While** (ciclo finché una condizione è vera):  
```php
$i = 1;
while ($i <= 5) {
    echo "Contatore: $i <br>";
    $i++;
}
```
✅ **Foreach** (per array):  
```php
$frutti = ["Mela", "Banana", "Arancia"];
foreach ($frutti as $frutto) {
    echo "Frutto: $frutto <br>";
}
```

### **💡 Esercizio**  
1. Crea un array con 5 nomi e stampali usando `foreach`.  

---

## **🔷 BLOCCO 1.7 – Funzioni in PHP**  
📌 **Obiettivi:** Capire le funzioni e come usarle.  

### **📖 Teoria**  
✅ **Creare una funzione**  
```php
function saluta($nome) {
    return "Ciao, $nome!";
}
echo saluta("Marco");
```

✅ **Parametri e valori di ritorno**  
```php
function somma($a, $b) {
    return $a + $b;
}
echo somma(5, 10); // 15
```

### **💡 Esercizio**  
1. Crea una funzione `quadrato()` che prende un numero e restituisce il suo quadrato.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. Crea un file PHP che:  
   - Contenga una variabile `$nome` e `$eta`.  
   - Controlli se `$eta` è maggiore di 18.  
   - Usi una funzione `messaggio()` che restituisce `"Ciao, Nome! Hai XX anni"`.  
   - Usi un ciclo `for` per stampare i numeri da 1 a 10.  

🚀 **Completato il Modulo 1! Sei pronto per passare al Modulo 2?** 😃