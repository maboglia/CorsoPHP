# costanti delle classi

Le **costanti delle classi** in PHP sono valori immutabili che possono essere definiti all'interno di una classe. A differenza delle variabili normali, le costanti non possono essere modificate una volta definite. Sono utili per definire valori che devono rimanere invariati durante tutto il ciclo di vita della classe o dell'oggetto, come configurazioni, parametri, o nomi simbolici.

### Sintassi per definire una costante in una classe:

Le costanti delle classi si definiscono usando la parola chiave `const`, seguita dal nome della costante e dal valore da assegnarle.

```php
class ClasseEsempio {
    const COSTANTE = "ValoreCostante";
}
```

### Caratteristiche delle costanti delle classi:
- Il nome della costante deve seguire la convenzione del **tutto maiuscolo**, anche se non è obbligatorio.
- Le costanti sono accessibili senza creare un'istanza della classe.
- Le costanti sono sempre di tipo **public** e non possono essere definite con visibilità come `private` o `protected`.

### Accesso alle costanti delle classi

#### 1. **All'interno della classe:**
Puoi accedere alle costanti definite nella stessa classe utilizzando `self::NOME_COSTANTE`.

```php
class ClasseEsempio {
    const SALUTO = "Ciao!";
    
    public function mostraSaluto() {
        echo self::SALUTO;  // Output: Ciao!
    }
}

$oggetto = new ClasseEsempio();
$oggetto->mostraSaluto();
```

#### 2. **Dall'esterno della classe:**
Per accedere alle costanti dall'esterno della classe, utilizza il nome della classe seguito dall'operatore `::` e dal nome della costante.

```php
echo ClasseEsempio::SALUTO;  // Output: Ciao!
```

### Esempio completo:

```php
class Automobile {
    const TIPO_VEICOLO = "Automobile";
    private $marca;
    
    public function __construct($marca) {
        $this->marca = $marca;
    }

    public function mostraTipo() {
        echo "Tipo veicolo: " . self::TIPO_VEICOLO . "\n";  // Accesso all'interno della classe
    }

    public function mostraMarca() {
        echo "Marca: " . $this->marca . "\n";
    }
}

// Accesso dall'esterno della classe
echo Automobile::TIPO_VEICOLO . "\n";  // Output: Automobile

$auto = new Automobile("Toyota");
$auto->mostraTipo();   // Output: Tipo veicolo: Automobile
$auto->mostraMarca();  // Output: Marca: Toyota
```

### Costanti nelle classi derivate

Quando una classe eredita da un'altra, le costanti possono essere ereditate, ma **non possono essere sovrascritte** nella classe derivata.

```php
class Animale {
    const TIPO = "Mammifero";
}

class Cane extends Animale {
    public function mostraTipo() {
        echo self::TIPO;  // Output: Mammifero
    }
}

$cane = new Cane();
$cane->mostraTipo();  // Output: Mammifero
```

In questo esempio, la costante `TIPO` è accessibile nella classe figlia `Cane`, ma non può essere modificata.

### Differenza tra costanti e variabili statiche:

1. **Costanti**: Sono definite con `const`, non possono cambiare il loro valore, e devono essere di tipo scalare (numeri, stringhe, etc.).
2. **Variabili statiche**: Sono definite con la parola chiave `static` e possono cambiare valore durante l'esecuzione del programma.

Esempio di variabile statica:
```php
class EsempioStatico {
    public static $variabile = "Variabile Statica";

    public static function mostraVariabile() {
        echo self::$variabile;
    }
}
```

Le costanti delle classi offrono un modo utile per definire valori fissi che devono rimanere costanti in tutta l'applicazione, migliorando la leggibilità e mantenibilità del codice.