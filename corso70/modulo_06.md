# **📌 MODULO 6 – Programmazione ad Oggetti (OOP) in PHP**  
✅ **Obiettivo:** Imparare la Programmazione ad Oggetti (OOP) in PHP per scrivere codice più strutturato e modulare.  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 6.1 – Introduzione alla Programmazione ad Oggetti in PHP**  
📌 **Obiettivi:** Capire i concetti base della programmazione ad oggetti (OOP).  

### **📖 Teoria**  
✅ **Concetti fondamentali:**  
- **Classe**: Modello per creare oggetti.  
- **Oggetto**: Istanza di una classe.  
- **Proprietà**: Variabili associate a una classe.  
- **Metodo**: Funzione definita all'interno di una classe.  

✅ **Creare una classe in PHP:**  
```php
class Persona {
    public $nome;
    
    public function saluta() {
        return "Ciao, mi chiamo " . $this->nome;
    }
}
```
✅ **Creare un oggetto e usarlo:**  
```php
$persona1 = new Persona();
$persona1->nome = "Luca";
echo $persona1->saluta(); // Output: Ciao, mi chiamo Luca
```

### **💡 Esercizio**  
1. Crea una classe `Auto` con proprietà `marca` e `modello`, e un metodo `descrivi()`.  

---

## **🔷 BLOCCO 6.2 – Costruttori e Modificatori di Accesso**  
📌 **Obiettivi:** Comprendere il costruttore e i modificatori di accesso (`public`, `private`, `protected`).  

### **📖 Teoria**  
✅ **Usare il costruttore per inizializzare gli oggetti:**  
```php
class Auto {
    public $marca;
    public $modello;
    
    public function __construct($marca, $modello) {
        $this->marca = $marca;
        $this->modello = $modello;
    }
}
$auto1 = new Auto("Toyota", "Yaris");
```
✅ **Modificatori di accesso:**  
- **Public**: Accessibile ovunque.  
- **Private**: Accessibile solo all’interno della classe.  
- **Protected**: Accessibile nella classe e nelle classi derivate.  

✅ **Esempio con `private`:**  
```php
class ContoBancario {
    private $saldo = 1000;
    
    public function getSaldo() {
        return $this->saldo;
    }
}
$conto = new ContoBancario();
echo $conto->getSaldo(); // Funziona
// echo $conto->saldo; // Errore: proprietà privata
```

### **💡 Esercizio**  
1. Crea una classe `ContoCorrente` con una proprietà `saldo` privata e un metodo `preleva()`.  

---

## **🔷 BLOCCO 6.3 – Ereditarietà e Polimorfismo**  
📌 **Obiettivi:** Capire come una classe può ereditare proprietà e metodi da un’altra classe.  

### **📖 Teoria**  
✅ **Ereditarietà:**  
```php
class Veicolo {
    public $marca;
    
    public function __construct($marca) {
        $this->marca = $marca;
    }
    
    public function descrivi() {
        return "Questo veicolo è una " . $this->marca;
    }
}
class Auto extends Veicolo {
    public $modello;
    
    public function __construct($marca, $modello) {
        parent::__construct($marca);
        $this->modello = $modello;
    }
    
    public function descrivi() {
        return parent::descrivi() . " modello " . $this->modello;
    }
}
$auto = new Auto("Fiat", "500");
echo $auto->descrivi();
```
✅ **Polimorfismo:**  
```php
class Animale {
    public function verso() {
        return "Suono generico";
    }
}
class Cane extends Animale {
    public function verso() {
        return "Bau!";
    }
}
$animale = new Cane();
echo $animale->verso(); // Output: Bau!
```

### **💡 Esercizio**  
1. Crea una classe `Persona` e una classe `Studente` che eredita da `Persona`, aggiungendo un metodo `diplomato()`.  

---

## **🔷 BLOCCO 6.4 – Interfacce e Classi Astratte**  
📌 **Obiettivi:** Capire la differenza tra interfacce e classi astratte.  

### **📖 Teoria**  
✅ **Classe astratta (non può essere istanziata):**  
```php
abstract class Forma {
    abstract public function area();
}
class Quadrato extends Forma {
    private $lato;
    
    public function __construct($lato) {
        $this->lato = $lato;
    }
    
    public function area() {
        return $this->lato * $this->lato;
    }
}
$quadrato = new Quadrato(4);
echo $quadrato->area(); // Output: 16
```
✅ **Interfacce:**  
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

### **💡 Esercizio**  
1. Crea un'interfaccia `Veicolo` con il metodo `avvia()` e implementala in `Auto` e `Moto`.  

---

## **🔷 BLOCCO 6.5 – Gestione delle Eccezioni**  
📌 **Obiettivi:** Usare `try/catch` per gestire gli errori.  

### **📖 Teoria**  
✅ **Usare `try/catch` per intercettare errori:**  
```php
try {
    throw new Exception("Errore personalizzato!");
} catch (Exception $e) {
    echo "Eccezione catturata: " . $e->getMessage();
}
```
✅ **Creare una classe di eccezioni personalizzata:**  
```php
class ErrorePersonalizzato extends Exception {}

try {
    throw new ErrorePersonalizzato("Errore critico!");
} catch (ErrorePersonalizzato $e) {
    echo $e->getMessage();
}
```

### **💡 Esercizio**  
1. Crea una funzione che divide due numeri e lancia un’eccezione se il divisore è 0.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. **Obiettivo:** Creare un piccolo sistema OOP per la gestione di libri.  
   - Una classe `Libro` con titolo e autore.  
   - Una classe `Biblioteca` che contiene un array di `Libri`.  
   - Metodi per aggiungere e visualizzare i libri.  
   - Un'eccezione se si tenta di aggiungere un libro senza titolo.  

🚀 **Completato il Modulo 6! Sei pronto per il Modulo 7?** 😃