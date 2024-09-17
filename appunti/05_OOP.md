# **Introduzione alla Programmazione Orientata agli Oggetti (OOP) in PHP**

La **Programmazione Orientata agli Oggetti** (OOP) è un paradigma di programmazione che si concentra sulla creazione di oggetti, che possono contenere dati sotto forma di attributi (proprietà) e comportamenti sotto forma di metodi (funzioni). PHP, a partire dalla versione 5, ha introdotto il supporto completo alla programmazione orientata agli oggetti, rendendola una delle caratteristiche principali per lo sviluppo di applicazioni moderne.

---

### **1. Cos'è una Classe?**

Una **classe** è una struttura che rappresenta un modello o blueprint da cui si possono creare oggetti. In altre parole, una classe definisce proprietà (variabili) e metodi (funzioni) che descrivono il comportamento e le caratteristiche di un oggetto.

#### Sintassi di una Classe in PHP

```php
<?php
class Automobile {
    // Proprietà (variabili)
    public $marca;
    public $modello;

    // Costruttore
    public function __construct($marca, $modello) {
        $this->marca = $marca;
        $this->modello = $modello;
    }

    // Metodo (funzione)
    public function dettagliAutomobile() {
        return "Marca: $this->marca, Modello: $this->modello";
    }
}
?>
```

**Spiegazione**:

- **`class Automobile`**: definisce una classe chiamata `Automobile`.
- **Proprietà**: `$marca` e `$modello` sono variabili che rappresentano gli attributi della classe.
- **Metodo**: `dettagliAutomobile()` è una funzione che restituisce una descrizione dell'automobile.
- **Costruttore**: `__construct()` è un metodo speciale che viene chiamato automaticamente quando viene creato un oggetto dalla classe. Serve per inizializzare le proprietà dell'oggetto.

---

### **2. Cos'è un Oggetto?**

Un **oggetto** è un'istanza di una classe. Quando si crea un oggetto da una classe, si dice che si sta "istanziando" quella classe. Gli oggetti contengono **dati** e possono eseguire **azioni** definite dalla classe da cui derivano.

#### Esempio di Creazione di un Oggetto

```php
<?php
// Creare un oggetto dalla classe Automobile
$auto = new Automobile("Fiat", "500");

// Chiamare un metodo dell'oggetto
echo $auto->dettagliAutomobile();  // Output: Marca: Fiat, Modello: 500
?>
```

**Spiegazione**:

- **`new Automobile("Fiat", "500")`**: crea un nuovo oggetto dalla classe `Automobile`, passando i valori per `marca` e `modello` al costruttore.
- **`$auto->dettagliAutomobile()`**: richiama il metodo `dettagliAutomobile()` dell'oggetto `$auto`.

---

### **3. Proprietà e Metodi**

- **Proprietà**: sono le variabili definite all'interno di una classe. Queste proprietà rappresentano gli attributi dell'oggetto.
- **Metodi**: sono le funzioni definite all'interno della classe. Questi metodi rappresentano il comportamento che un oggetto può eseguire.

#### Esempio

```php
<?php
class Automobile {
    public $marca;
    public $modello;

    public function __construct($marca, $modello) {
        $this->marca = $marca;
        $this->modello = $modello;
    }

    public function descrivi() {
        return "Questa automobile è una $this->marca $this->modello.";
    }
}

// Creare un oggetto
$miaAuto = new Automobile("Tesla", "Model S");
echo $miaAuto->descrivi();  // Output: Questa automobile è una Tesla Model S.
?>
```

---

### **4. Visibilità delle Proprietà e dei Metodi**

Le **proprietà** e i **metodi** possono avere diverse visibilità:

- **public**: accessibile ovunque (dentro e fuori dalla classe).
- **private**: accessibile solo all'interno della classe stessa.
- **protected**: accessibile all'interno della classe e delle sue sottoclassi.

#### Esempio

```php
<?php
class Automobile {
    public $marca;  // Accessibile ovunque
    private $modello;  // Accessibile solo all'interno della classe

    public function __construct($marca, $modello) {
        $this->marca = $marca;
        $this->modello = $modello;
    }

    // Metodo pubblico che può accedere a una proprietà privata
    public function descrivi() {
        return "Marca: $this->marca, Modello: $this->modello";
    }
}

$auto = new Automobile("BMW", "X5");
echo $auto->descrivi();  // Output: Marca: BMW, Modello: X5

// Tentativo di accesso diretto a una proprietà privata: causerebbe un errore
// echo $auto->modello;  // ERRORE
?>
```

**Spiegazione**:

- La proprietà **`$modello`** è privata, quindi non può essere acceduta dall'esterno della classe, ma può essere utilizzata all'interno dei metodi della classe.

---

### **5. Ereditarietà**

L'**ereditarietà** è un concetto fondamentale dell'OOP che consente di creare una nuova classe basata su una classe esistente. La nuova classe eredita le proprietà e i metodi della classe genitore, ma può anche aggiungere o sovrascrivere funzionalità.

#### Esempio

```php
<?php
// Classe genitore
class Veicolo {
    public $marca;

    public function __construct($marca) {
        $this->marca = $marca;
    }

    public function avvia() {
        return "Il veicolo è avviato.";
    }
}

// Classe figlia
class Automobile extends Veicolo {
    public $modello;

    public function __construct($marca, $modello) {
        parent::__construct($marca);  // Chiama il costruttore della classe genitore
        $this->modello = $modello;
    }

    public function descrivi() {
        return "Marca: $this->marca, Modello: $this->modello";
    }
}

$miaAuto = new Automobile("Audi", "A4");
echo $miaAuto->descrivi();  // Output: Marca: Audi, Modello: A4
echo $miaAuto->avvia();  // Output: Il veicolo è avviato.
?>
```

**Spiegazione**:

- **`class Automobile extends Veicolo`**: la classe `Automobile` eredita dalla classe `Veicolo`.
- **`parent::__construct($marca)`**: richiama il costruttore della classe genitore all'interno del costruttore della classe figlia.

---

### **6. Polimorfismo**

Il **polimorfismo** permette alle classi derivate di sovrascrivere metodi ereditati dalla classe genitore per fornire implementazioni specifiche.

#### Esempio

```php
<?php
class Veicolo {
    public function descrivi() {
        return "Sono un veicolo.";
    }
}

class Automobile extends Veicolo {
    public function descrivi() {
        return "Sono un'automobile.";
    }
}

$veicolo = new Veicolo();
echo $veicolo->descrivi();  // Output: Sono un veicolo.

$auto = new Automobile();
echo $auto->descrivi();  // Output: Sono un'automobile.
?>
```

---

### **7. Concetti chiave dell'OOP in PHP**

1. **Incapsulamento**: L'idea di nascondere i dettagli interni di un oggetto e fornire un'interfaccia pubblica per l'interazione.
2. **Ereditarietà**: Il meccanismo per cui una classe può ereditare proprietà e metodi da un'altra classe.
3. **Polimorfismo**: Capacità di un metodo di comportarsi diversamente in classi derivate.
4. **Astrazione**: Fornire una rappresentazione semplificata di un oggetto nascondendo dettagli complessi.

---

### **Conclusione**

La Programmazione Orientata agli Oggetti (OOP) in PHP offre strumenti potenti per creare applicazioni scalabili e manutenibili. Comprendere classi, oggetti, ereditarietà e polimorfismo è essenziale per sviluppare software complessi in modo efficiente.
