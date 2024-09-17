### **La Keyword `static` in PHP OOP**

In PHP, la parola chiave **`static`** è utilizzata in contesto di **programmazione orientata agli oggetti (OOP)** per definire proprietà e metodi che appartengono alla **classe** anziché all'**istanza** della classe. Ciò significa che i membri `static` possono essere utilizzati senza creare un'istanza della classe.

---

### **1. Proprietà e Metodi Statici**

- **Proprietà statiche**: sono variabili della classe che sono condivise tra tutte le istanze della classe. Non appartengono a un singolo oggetto, ma alla classe stessa.
  
- **Metodi statici**: sono funzioni che possono essere chiamate direttamente sulla classe senza bisogno di istanziare un oggetto. All'interno di un metodo statico, non si può accedere alle proprietà o ai metodi non statici, poiché non esiste un'istanza.

#### Esempio di proprietà e metodi statici

```php
<?php
class Contatore {
    public static $count = 0;

    public static function incrementa() {
        self::$count++;
    }
}

Contatore::incrementa();  // Incrementa il contatore statico
Contatore::incrementa();
echo Contatore::$count;    // Output: 2
?>
```

**Spiegazione**:

- **`public static $count`**: è una proprietà statica che mantiene il conteggio degli incrementi.
- **`public static function incrementa()`**: è un metodo statico che incrementa la variabile `$count`.
- **`Contatore::incrementa()`**: i metodi statici vengono chiamati usando il nome della classe seguito da `::` (operatore di risoluzione di ambito).

---

### **2. Accesso ai Membri Statici**

Per accedere a una proprietà o un metodo statico dall'interno della classe stessa, si utilizza la parola chiave **`self`** seguita dall'operatore di risoluzione di ambito `::`.

#### Esempio

```php
<?php
class Esempio {
    public static $nome = "PHP";

    public static function saluta() {
        return "Ciao, " . self::$nome;
    }
}

echo Esempio::saluta();  // Output: Ciao, PHP
?>
```

**Spiegazione**:

- **`self::$nome`**: accede alla proprietà statica `$nome` all'interno della classe tramite `self::`.

---

### **3. Differenza tra Proprietà Statiche e di Istanza**

- **Proprietà statiche**: esistono una sola volta per la classe e sono condivise tra tutte le istanze della classe.
- **Proprietà di istanza**: ogni oggetto (istanza) ha una sua copia delle proprietà non statiche.

#### Esempio di differenza

```php
<?php
class Persona {
    public static $numeroPersone = 0;
    public $nome;

    public function __construct($nome) {
        $this->nome = $nome;
        self::$numeroPersone++;
    }
}

$p1 = new Persona("Alice");
$p2 = new Persona("Bob");

echo Persona::$numeroPersone;  // Output: 2 (variabile statica condivisa)
?>
```

**Spiegazione**:

- Ogni istanza della classe **`Persona`** ha una sua proprietà `$nome`, ma la proprietà statica `$numeroPersone` è condivisa tra tutte le istanze e viene incrementata ogni volta che viene creato un nuovo oggetto.

---

### **4. Metodi Statici e Ereditarietà**

I **metodi statici** possono essere ereditati dalle classi figlie e possono essere sovrascritti. È anche possibile accedere ai metodi statici della classe padre usando **`parent::`**.

#### Esempio di ereditarietà

```php
<?php
class Animale {
    public static function descrivi() {
        return "Sono un animale";
    }
}

class Cane extends Animale {
    public static function descrivi() {
        return "Sono un cane";
    }
}

echo Cane::descrivi();   // Output: Sono un cane
echo Animale::descrivi(); // Output: Sono un animale
?>
```

---

### **5. Late Static Binding (`static::`)**

Quando si lavora con classi che estendono altre classi, PHP offre il meccanismo del **late static binding** attraverso la parola chiave `static`. Questa permette di chiamare metodi o proprietà statici della **classe figlia** anche se definiti nella classe padre.

#### Esempio con `static::`

```php
<?php
class Animale {
    public static function crea() {
        return new static();  // Utilizza "late static binding"
    }
}

class Gatto extends Animale {
    public function miagola() {
        return "Miao!";
    }
}

$gatto = Gatto::crea();  // Crea un'istanza di Gatto
echo $gatto->miagola();  // Output: Miao!
?>
```

**Spiegazione**:

- **`static::`** fa sì che la chiamata `crea()` nella classe **`Gatto`** restituisca un'istanza della classe figlia, anche se il metodo è definito nella classe padre.

---

### **6. Variabili Statiche all'interno dei Metodi**

All'interno dei metodi (statici e non), è possibile dichiarare variabili **statiche locali**, che mantengono il loro valore tra le diverse chiamate della funzione.

#### Esempio di variabile statica locale

```php
<?php
function contatore() {
    static $count = 0;
    $count++;
    echo $count;
}

contatore();  // Output: 1
contatore();  // Output: 2
contatore();  // Output: 3
?>
```

**Spiegazione**:

- **`static $count`**: questa variabile mantiene il suo valore tra una chiamata e l'altra della funzione.

---

### **Vantaggi dell'uso di `static`**

1. **Risparmio di risorse**: poiché le proprietà e i metodi statici non necessitano di creare istanze della classe, possono essere utilizzati per definire costanti, configurazioni o metodi utility.
2. **Modularità**: metodi statici possono essere usati per scrivere funzioni generiche o helper che non dipendono dallo stato dell'oggetto.
3. **Efficienza**: nei casi in cui le istanze non sono necessarie, l'uso di metodi statici può migliorare le prestazioni.

---

### **Conclusione**

La keyword **`static`** in PHP consente di definire proprietà e metodi che appartengono alla **classe stessa** e non alle sue istanze. Questo è utile per definire metodi utilitari, variabili condivise o costanti di configurazione che non cambiano tra diverse istanze. I metodi statici possono essere ereditati e supportano il **late static binding**, che consente comportamenti flessibili e dinamici tra classi genitore e figlie.
