# PHP: OOP


## cosa sono gli oggetti

*codice raggruppato che fa riferimento ad un unico tema*

* astrazione delle strutture di codice
  * attributi
  * funzioni (metodi)

ad un livello base, con poche informazioni utilizziamo gli **array** per aggregare le nostre informazioni

gli **oggetti** servono per organizzare e mantenere il codice

* aggiungono chiarezza, riducendo la complessità
* regole semplici e interazione complessa
* lasciano maggior spazio ai dati
* permettono la modularizzazione e la riusabilità del codice

---

## Oggetti

Una classe è un modello utilizzato per creare oggetti. Per definirne uno viene utilizzata la parola chiave class, seguita da un nome e da un blocco di codice. 

La convenzione di denominazione per le classi è maiuscola, il che significa che ogni parola dovrebbe essere inizialmente in maiuscolo.

Il corpo della classe può contenere proprietà e metodi. Le proprietà sono variabili che mantengono lo stato dell'oggetto, mentre i metodi sono funzioni che definiscono ciò che l'oggetto può fare. 

Le proprietà sono anche conosciute come campi o attributi in altre lingue. In PHP, devono avere un livello di accesso esplicito specificato. Di seguito viene utilizzato il livello di accesso public, che consente l'accesso illimitato alla proprietà.

```php
class Rettangolo
{
  public $x, $y;
  function newArea($a, $b) { return $a * $b; }
}

```

---

Per accedere ai membri dall'interno della classe, viene utilizzata la pseudo variabile $this insieme all'operatore a freccia singola (`->`). La variabile `$this` è un riferimento all'istanza corrente della classe e può essere utilizzata solo all'interno di un contesto di oggetti. Senza di essa, `$x` e `$y` sarebbero visti solo come variabili locali.

---
## Istanziare  un oggetto

Per utilizzare i membri di una classe dall'esterno della classe che la racchiude, è necessario prima creare un oggetto della classe. Questo viene fatto usando la parola chiave `new`, che crea un nuovo oggetto o istanza.
$r = new Rettangolo(); // oggetto istanziato
L'oggetto contiene il proprio insieme di proprietà, che possono contenere valori diversi da quelli di altre istanze della classe. Come per le funzioni, gli oggetti di una classe possono essere creati anche se la definizione della classe appare più in basso nel file di script.

```php
$r = new ClasseDemo(); // ok
classe ClasseDemo {};
```

---

## Accesso ai membri dell'oggetto
Per accedere ai membri che appartengono a un oggetto, è necessario l'operatore freccia singola (`->`). Può essere utilizzato per chiamare metodi o assegnare valori a proprietà.

```php
$r->x = 5;
$r->y = 10;
$r->getArea(); // 50
```

Un altro modo per inizializzare le proprietà consiste nell'utilizzare i valori delle proprietà iniziali.

---

## Valori iniziali delle proprietà

Se una proprietà deve avere un valore iniziale, un modo semplice consiste nell'assegnare la proprietà nello stesso momento in cui viene dichiarata. Questo valore iniziale viene quindi impostato al momento della creazione dell'oggetto. Deve essere un'espressione costante. Non può, ad esempio, essere una variabile o un'espressione matematica.

```php

class Rettangolo
{
  public $x = 5, $y = 10;
}
```

---

## Costruttore
Una classe può avere un costruttore, che è un metodo speciale utilizzato per inizializzare (costruire) l'oggetto. Questo metodo fornisce un modo per inizializzare le proprietà, che non è limitato alle espressioni costanti. In PHP, il costruttore inizia con due caratteri di sottolineatura seguiti dalla parola costrutto. Metodi come questi sono conosciuti come metodi magici.
```php
class Rettangolo
{
   public $x, $y;
   function __construct()
   {
     $this->x = 5;
     $this->y = 10;
     echo "Costruito";
} }
```

Quando viene creata una nuova istanza di questa classe, viene chiamato il costruttore, che in questo esempio imposta le proprietà sui valori specificati. 

Si noti che tutti i valori di proprietà iniziali vengono impostati prima dell'esecuzione del costruttore.
`$r = new Rettangolo(); // "Costruito"`

Poiché questo costruttore non accetta argomenti, le parentesi possono essere opzionalmente omesse.
`$r = new Rettangolo; // "Costruito"`

---

Proprio come qualsiasi altro metodo, il costruttore può avere un elenco di parametri. Può essere utilizzato per impostare i valori delle proprietà sugli argomenti passati al momento della creazione dell'oggetto.
```php
class Rettangolo
{
   public $x, $y;
   function __construct($x, $y)
   {
     $this->x = $x;
     $this->y = $y;
   }
}

$r = new Rettangolo(5,10);
```

---

## Distruttore

Oltre al costruttore, le classi possono avere anche un distruttore. Questo metodo magico inizia con due trattini bassi seguiti dalla parola distruzione. Viene chiamato non appena non ci sono più riferimenti all'oggetto, prima che l'oggetto venga distrutto dal Garbage Collector di PHP.

```php
class Rettangolo
{
// ...
   function __destruct() { echo "Distrutto"; }
}
```

Per testare il distruttore, la funzione unset può rimuovere manualmente tutti i riferimenti all'oggetto.
`unset($r); // "Distrutto"`


---

Se non definirete un costruttore e un distruttore per la vostra classe
(oggetto), PHP li rimpiazzerà con dei metodi propri di default.

Il costruttore verrà chiamato automaticamente da PHP, ogni volta che verrà
creato un oggetto (istanza), mentre il distruttore sarà chiamato quando l'oggetto
verrà distrutto, ossia quando non esiste più alcun riferimento all'oggetto oppure
alla fine dello script.

---

## Confronto di oggetti

Quando si utilizza l'operatore "uguale a" (`==`) sugli oggetti, questi oggetti sono considerati uguali se gli oggetti sono istanze della stessa classe e le loro proprietà hanno gli stessi valori e tipi. Al contrario, l'operatore "strettamente uguale a" (`===`) restituisce true solo se le variabili si riferiscono alla stessa istanza della stessa classe.

---


## Modificatori di accesso

* **public** - I membri (attributi o metodi) della classe dichiarati public, possono essere utilizzati sia all'interno che all'esterno della classe (`$this->membro` oppure `$oggetto->membro`)
* **private** - I membri dichiarati private, possono essere utilizzati solo all interno della classe ($this->membro)
* **protected** - I membri dichiarati protected, possono essere utilizzati solo all'interno delle classi madri e derivate ($this->membro), questo modificatore implica l'ereditarietà

---

## getter e setter

In Php sono disponibili i metodi magici `__get and __set`

```php
<?php
class ContoBancario {
    private $saldo;

    public function __get($nomeAttributo) {
        return $this->$nomeAttributo;
    }

    public function __set($nomeAttributo, $value) {
        if ( isset($value) ) $this->$nomeAttributo = $value;
    }
}
$mioConto = new ContoBancario();
$mioConto->saldo = 1000;//setter
echo $mioConto->saldo;//getter

```

---


### Utilizzo delle costanti globali

Con le costanti globali è necessario omettere il simbolo del dollaro $ durante la dichiarazione.

I nomi delle costanti in PHP 5 sono sempre Case Sensitive, ed è buona norma scriverle tutte in maiuscolo per distinguerle immediatamente come costanti, ma non è obbligatorio.

---

### test.php

```php
require once("Taglie.php");

echo Taglie::XL . "";

Taglie::mostraTaglia();

```

---

### autoloader delle classi

```php

function includeClassFile($class) {
    $file = "include/" . strtolower( trim( $class ) ) . ".php";
    if (file_exists($file)
    {
        include $file;
        return true;
    }
    return false;
}

spl_autoload_register('includeClassFile');
```