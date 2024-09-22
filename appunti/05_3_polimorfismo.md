# Polimorfismo e interfacce

Ecco una versione migliorata e aggiornata del post sul polimorfismo, con esempi più chiari e dettagliati:

---

# Il Polimorfismo in PHP

Il **polimorfismo** è uno dei concetti fondamentali della programmazione orientata agli oggetti (OOP), e rappresenta la capacità di un metodo di adattarsi a diversi tipi di dati, pur mantenendo un'interfaccia comune. Questo è possibile grazie all'ereditarietà e alla possibilità di sovrascrivere i metodi nelle classi derivate.

### Definizione di Polimorfismo

In informatica, il termine "polimorfismo" deriva dal greco **πολυμορφος** (`poly` = molto, `morphē` = forma), e significa **avere molte forme**. In termini pratici, ciò significa che un singolo metodo o funzione può comportarsi in modi diversi in base all'oggetto o al tipo su cui viene applicato.

Il polimorfismo può essere suddiviso in due tipi principali:

1. **Polimorfismo per inclusione** (tipico della OOP)
2. **Polimorfismo parametrico** (tipico della programmazione generica)

---

## 1. Polimorfismo per Inclusione (Sottotipi)

Nel contesto della programmazione orientata agli oggetti, il polimorfismo per inclusione si verifica quando un metodo definito in una classe base viene sovrascritto da una classe derivata, consentendo alle sottoclassi di implementare versioni specifiche di quel metodo.

### Esempio

Consideriamo un esempio di polimorfismo per inclusione con una classe base `Animale` e due sottoclassi, `Cane` e `Gatto`. Entrambe le sottoclassi ridefiniscono il metodo `faRumore()`, ma mantengono lo stesso nome e la stessa interfaccia.

```php
// Classe base
class Animale {
    public function faRumore() {
        return "L'animale fa un rumore";
    }
}

// Classe derivata Cane
class Cane extends Animale {
    public function faRumore() {
        return "Il cane abbaia";
    }
}

// Classe derivata Gatto
class Gatto extends Animale {
    public function faRumore() {
        return "Il gatto miagola";
    }
}

// Uso del polimorfismo
function faiRumoreAnimale(Animale $animale) {
    echo $animale->faRumore() . PHP_EOL;
}

$cane = new Cane();
$gatto = new Gatto();

faiRumoreAnimale($cane); // Output: "Il cane abbaia"
faiRumoreAnimale($gatto); // Output: "Il gatto miagola"
```

### Dettagli
In questo esempio, la funzione `faiRumoreAnimale()` accetta un parametro di tipo `Animale`, ma può operare con oggetti di tipo `Cane` o `Gatto`, grazie al fatto che entrambe le sottoclassi sono considerate come istanze della classe base `Animale`. Questo è **polimorfismo per inclusione**, dove le sottoclassi possono essere utilizzate al posto della superclasse senza rompere la logica del programma.

---

## 2. Polimorfismo Parametrico

Il polimorfismo parametrico permette di scrivere codice che può operare su diversi tipi di dati senza dover conoscere il tipo specifico in anticipo. In PHP, ciò può essere ottenuto attraverso **interfacce**, **tipi generici** (introdotti in altri linguaggi come Java e C++), e le **union types** introdotte in PHP 8.

### Esempio: Interfacce e Tipi Unione

PHP 8 ha introdotto i **Union Types**, che permettono di specificare che un parametro può essere di più tipi diversi, facilitando l'implementazione del polimorfismo parametrico. Ecco un esempio:

```php
interface Forma {
    public function area(): float;
}

class Rettangolo implements Forma {
    private float $larghezza;
    private float $altezza;

    public function __construct(float $larghezza, float $altezza) {
        $this->larghezza = $larghezza;
        $this->altezza = $altezza;
    }

    public function area(): float {
        return $this->larghezza * $this->altezza;
    }
}

class Cerchio implements Forma {
    private float $raggio;

    public function __construct(float $raggio) {
        $this->raggio = $raggio;
    }

    public function area(): float {
        return pi() * pow($this->raggio, 2);
    }
}

function calcolaArea(Forma $forma): float {
    return $forma->area();
}

$rettangolo = new Rettangolo(4, 5);
$cerchio = new Cerchio(3);

echo calcolaArea($rettangolo); // Output: 20
echo calcolaArea($cerchio);    // Output: 28.27
```

### Dettagli
In questo esempio, l'interfaccia `Forma` definisce il metodo `area()`, che viene implementato sia da `Rettangolo` che da `Cerchio`. Grazie al **polimorfismo parametrico**, la funzione `calcolaArea()` può operare su qualsiasi tipo di oggetto che implementi l'interfaccia `Forma`, indipendentemente dal fatto che sia un rettangolo o un cerchio.

---

## Polimorfismo in PHP 8: Novità

PHP 8 ha introdotto nuove funzionalità che migliorano l'uso del polimorfismo:

1. **Union Types**: Ora è possibile dichiarare che un parametro o un ritorno può avere più tipi, migliorando la flessibilità del polimorfismo parametrico.

   ```php
   function processaDati(int|float|string $dati): string {
       if (is_int($dati)) {
           return "Numero intero: $dati";
       } elseif (is_float($dati)) {
           return "Numero decimale: $dati";
       } else {
           return "Stringa: $dati";
       }
   }
   ```

2. **Match Expression**: PHP 8 introduce l'operatore `match`, che può essere utilizzato in modo efficace insieme al polimorfismo per scegliere il comportamento corretto in base al tipo di dato.

   ```php
   function getDescrizioneAnimale(Animale $animale): string {
       return match (get_class($animale)) {
           Cane::class => "Questo è un cane",
           Gatto::class => "Questo è un gatto",
           default => "Questo è un altro tipo di animale"
       };
   }
   ```

---

## Conclusione

Il polimorfismo è un concetto potente che rende il codice più flessibile, riutilizzabile e mantenibile. Permette di trattare oggetti di classi diverse in modo uniforme, facilitando l'espansione delle funzionalità del programma senza modificare il codice esistente. Grazie alle nuove funzionalità introdotte in PHP 8, come i **Union Types** e il **match**, PHP supporta ancora meglio il polimorfismo sia per inclusione che parametrico.

---

Ecco una versione migliorata e aggiornata del post sulle interfacce in PHP, con esempi più chiari e dettagliati, tenendo conto delle novità introdotte da PHP 8:

---

# Interfacce in PHP

In PHP, non è possibile implementare l'**ereditarietà multipla**: una classe può ereditare da una sola classe, sia essa astratta o concreta. Tuttavia, per risolvere le limitazioni dell'ereditarietà multipla, si possono utilizzare le **interfacce**. Le interfacce permettono di definire un set di metodi che una classe deve implementare, fornendo così una struttura comune senza limitare le possibilità di eredità.

### Perché usare le interfacce?

1. **Evita i problemi dell'ereditarietà multipla** (come il *diamond problem*).
2. **Definisce contratti**: ogni classe che implementa un'interfaccia è obbligata a rispettare un contratto, ovvero deve implementare tutti i metodi definiti nell'interfaccia.
3. **Fornisce flessibilità**: una classe può implementare più interfacce, permettendo così un comportamento polimorfico e flessibile.

---

## Definizione di un'Interfaccia

Un'interfaccia specifica i metodi che le classi devono implementare, ma non contiene alcuna logica di implementazione. Tutti i metodi definiti in un'interfaccia sono implicitamente pubblici e devono essere implementati dalle classi che "usano" l'interfaccia. Le interfacce sono definite con la parola chiave `interface`.

### Esempio

```php
interface Animale {
    public function faRumore(): string;
    public function muovi(): void;
}
```

In questo esempio, l'interfaccia `Animale` dichiara due metodi: `faRumore` e `muovi`. Qualsiasi classe che implementa questa interfaccia deve fornire una definizione concreta per questi metodi.

### Implementazione dell'Interfaccia

Una classe che implementa un'interfaccia deve fornire un'implementazione per tutti i metodi definiti nell'interfaccia.

```php
class Cane implements Animale {
    public function faRumore(): string {
        return "Il cane abbaia";
    }

    public function muovi(): void {
        echo "Il cane corre";
    }
}

class Gatto implements Animale {
    public function faRumore(): string {
        return "Il gatto miagola";
    }

    public function muovi(): void {
        echo "Il gatto cammina";
    }
}

// Uso dell'interfaccia
$cane = new Cane();
echo $cane->faRumore();  // Output: "Il cane abbaia"
$cane->muovi();          // Output: "Il cane corre"

$gatto = new Gatto();
echo $gatto->faRumore();  // Output: "Il gatto miagola"
$gatto->muovi();          // Output: "Il gatto cammina"
```

In questo esempio, sia `Cane` che `Gatto` implementano l'interfaccia `Animale`, e ciascuna classe fornisce la propria versione dei metodi `faRumore` e `muovi`.

---

## Costanti nelle Interfacce

Le interfacce possono anche definire **costanti**. Queste costanti sono simili a quelle delle classi, ma non possono essere sovrascritte dalle classi che implementano l'interfaccia.

```php
interface Matematica {
    const PI = 3.14;
}

class Cerchio implements Matematica {
    private float $raggio;

    public function __construct(float $raggio) {
        $this->raggio = $raggio;
    }

    public function area(): float {
        return self::PI * pow($this->raggio, 2);
    }
}

$cerchio = new Cerchio(5);
echo $cerchio->area();  // Output: 78.5
```

In questo esempio, `PI` è una costante definita nell'interfaccia `Matematica` e viene utilizzata nella classe `Cerchio` per calcolare l'area.

---

## Estendere le Interfacce

Le interfacce possono estendere altre interfacce, permettendo di costruire strutture più complesse e modulabili. Tuttavia, un'interfaccia non può estendere una classe.

```php
interface Forma {
    public function area(): float;
}

interface Forma3D extends Forma {
    public function volume(): float;
}
```

In questo esempio, l'interfaccia `Forma3D` estende `Forma`, e qualsiasi classe che implementa `Forma3D` dovrà implementare i metodi definiti sia in `Forma` che in `Forma3D`.

---

## Interfacce e Polimorfismo

Le interfacce giocano un ruolo chiave nel **polimorfismo**. Le classi che implementano la stessa interfaccia possono essere trattate in modo uniforme, poiché condividono un insieme comune di metodi, indipendentemente dalla loro implementazione concreta.

```php
function calcolaArea(Forma $forma): float {
    return $forma->area();
}

$rettangolo = new class implements Forma {
    private float $larghezza = 4;
    private float $altezza = 5;

    public function area(): float {
        return $this->larghezza * $this->altezza;
    }
};

$cerchio = new Cerchio(3);  // Definito in precedenza

echo calcolaArea($rettangolo); // Output: 20
echo calcolaArea($cerchio);    // Output: 28.27
```

In questo esempio, la funzione `calcolaArea()` accetta qualsiasi oggetto che implementa l'interfaccia `Forma`, permettendo così l'uso polimorfico delle classi che implementano l'interfaccia.

---

## Interfacce e PHP 8: Novità

PHP 8 ha introdotto alcune novità che migliorano ulteriormente l'uso delle interfacce:

1. **Union Types**: Ora è possibile dichiarare che un parametro o un ritorno può avere più tipi, il che migliora la flessibilità nella programmazione orientata alle interfacce.

    ```php
    interface Trasformabile {
        public function trasforma(int|float|string $input): string;
    }

    class Converter implements Trasformabile {
        public function trasforma(int|float|string $input): string {
            return "Valore: " . $input;
        }
    }

    $converter = new Converter();
    echo $converter->trasforma(123);  // Output: Valore: 123
    ```

2. **Match Expression**: Con l'introduzione dell'operatore `match`, PHP 8 facilita la selezione del comportamento corretto in base ai tipi di dati, utilizzando interfacce per implementare logiche condizionali.

---

## Conclusione

Le interfacce in PHP sono un potente strumento per definire contratti tra le classi e garantire che tutte le classi che le implementano seguano lo stesso schema di metodi. Permettono di implementare comportamenti polimorfici e risolvere i limiti dell'ereditarietà multipla. Con le nuove funzionalità introdotte da PHP 8, come gli **Union Types** e il **match**, il supporto alle interfacce è ancora più flessibile e potente.
