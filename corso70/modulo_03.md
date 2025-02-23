# **📌 MODULO 3 – Programmazione Orientata agli Oggetti (OOP) in PHP**  
✅ **Obiettivo:** Comprendere i principi della programmazione orientata agli oggetti in PHP, creando classi, oggetti, metodi e proprietà.  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 3.1 – Introduzione alla OOP in PHP**  
📌 **Obiettivi:** Capire cos'è la programmazione orientata agli oggetti e perché usarla.  

### **📖 Teoria**  
La **Programmazione Orientata agli Oggetti (OOP)** permette di organizzare il codice in modo modulare e riutilizzabile.  
✅ **Principali concetti:**  
- **Classe**: Modello per creare oggetti.  
- **Oggetto**: Istanza di una classe.  
- **Proprietà**: Variabili dentro una classe.  
- **Metodi**: Funzioni dentro una classe.  

### **📝 Esempio**  
```php
class Persona {
    public $nome;
    
    function saluta() {
        return "Ciao, mi chiamo " . $this->nome;
    }
}

$utente = new Persona();
$utente->nome = "Luca";
echo $utente->saluta();
```

### **💡 Esercizio**  
1. Crea una classe `Auto` con la proprietà `$marca` e un metodo `mostraMarca()`.  

---

## **🔷 BLOCCO 3.2 – Proprietà e Metodi delle Classi**  
📌 **Obiettivi:** Dichiarare proprietà e metodi in una classe e usarli correttamente.  

### **📖 Teoria**  
✅ **Proprietà (variabili di classe)**:  
```php
class Prodotto {
    public $nome = "Telefono";
}
```
✅ **Metodi (funzioni di classe)**:  
```php
class Prodotto {
    public $nome;
    
    function mostraNome() {
        return "Prodotto: " . $this->nome;
    }
}
```
✅ **Usare `$this` per accedere alle proprietà dentro la classe.**  

### **💡 Esercizio**  
1. Crea una classe `Libro` con proprietà `$titolo` e `$autore`, e un metodo per restituire una descrizione.  

---

## **🔷 BLOCCO 3.3 – Il Costruttore e il Distruttore**  
📌 **Obiettivi:** Creare oggetti con parametri iniziali usando il costruttore.  

### **📖 Teoria**  
✅ **Il metodo `__construct()` viene eseguito quando un oggetto è creato:**  
```php
class Persona {
    public $nome;
    
    function __construct($nome) {
        $this->nome = $nome;
    }
}

$utente = new Persona("Mario");
echo $utente->nome;
```
✅ **Il metodo `__destruct()` viene eseguito quando l'oggetto viene distrutto:**  
```php
class Test {
    function __destruct() {
        echo "Oggetto eliminato!";
    }
}
$oggetto = new Test();
```

### **💡 Esercizio**  
1. Crea una classe `Utente` con un costruttore che prende nome ed età e un metodo che restituisce un saluto.  

---

## **🔷 BLOCCO 3.4 – Modificatori di Accesso (public, private, protected)**  
📌 **Obiettivi:** Controllare l’accesso alle proprietà e ai metodi.  

### **📖 Teoria**  
✅ **`public`** – Accessibile ovunque.  
✅ **`private`** – Accessibile solo dentro la classe.  
✅ **`protected`** – Accessibile dentro la classe e dalle sottoclassi.  

```php
class Persona {
    private $nome;

    function setNome($n) {
        $this->nome = $n;
    }

    function getNome() {
        return $this->nome;
    }
}

$utente = new Persona();
$utente->setNome("Giovanni");
echo $utente->getNome();
```

### **💡 Esercizio**  
1. Crea una classe `ContoBancario` con proprietà `$saldo` privata e metodi `deposito()` e `prelievo()`.  

---

## **🔷 BLOCCO 3.5 – L’Ereditarietà**  
📌 **Obiettivi:** Creare classi che ereditano proprietà e metodi da altre classi.  

### **📖 Teoria**  
✅ **Una classe figlia può ereditare da una classe padre:**  
```php
class Animale {
    public $nome;
    
    function dormi() {
        return "Zzz...";
    }
}

class Cane extends Animale {
    function abbaia() {
        return "Bau Bau!";
    }
}

$cane = new Cane();
$cane->nome = "Fido";
echo $cane->nome . " dice: " . $cane->abbaia();
```

### **💡 Esercizio**  
1. Crea una classe `Veicolo` con una proprietà `$marca` e un metodo `info()`.  
2. Crea una classe `Auto` che eredita da `Veicolo` e aggiunge un metodo `tipo()`.  

---

## **🔷 BLOCCO 3.6 – Le Interfacce e le Classi Astratte**  
📌 **Obiettivi:** Creare strutture avanzate di classi con interfacce e classi astratte.  

### **📖 Teoria**  
✅ **Le interfacce definiscono metodi che devono essere implementati:**  
```php
interface Animale {
    public function faiVerso();
}

class Gatto implements Animale {
    public function faiVerso() {
        return "Miao!";
    }
}
```
✅ **Le classi astratte possono avere metodi implementati e non:**  
```php
abstract class Forma {
    abstract public function area();
}

class Rettangolo extends Forma {
    public function area() {
        return "Calcolo dell'area";
    }
}
```

### **💡 Esercizio**  
1. Crea un’interfaccia `Forma` con un metodo `calcolaArea()` e una classe `Quadrato` che la implementa.  

---

## **🔷 BLOCCO 3.7 – Il Polimorfismo**  
📌 **Obiettivi:** Sostituire metodi in classi derivate per comportamenti diversi.  

### **📖 Teoria**  
✅ **Sovrascrivere metodi in una classe figlia:**  
```php
class Veicolo {
    public function info() {
        return "Questo è un veicolo.";
    }
}

class Auto extends Veicolo {
    public function info() {
        return "Questa è un'auto.";
    }
}

$auto = new Auto();
echo $auto->info(); // "Questa è un'auto."
```

### **💡 Esercizio**  
1. Crea una classe `Animale` con un metodo `verso()`.  
2. Crea due classi `Cane` e `Gatto` che estendono `Animale` e sovrascrivono `verso()`.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. Crea un’applicazione PHP con:  
   - Una classe `Prodotto` con proprietà `nome` e `prezzo`.  
   - Una classe `Elettronico` che eredita `Prodotto` e ha una proprietà `garanzia`.  
   - Una classe `Carrello` che contiene un array di prodotti e un metodo per calcolare il totale.  
   - Un form HTML per aggiungere prodotti al carrello e visualizzarli.  

🚀 **Completato il Modulo 3! Sei pronto per il Modulo 4?** 😃