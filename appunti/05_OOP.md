# PHP: OOP


## cosa sono gli oggetti

codice raggruppato che fa riferimento ad un unico tema

* astrazione delle strutture di codice
  * funzioni
  * attributi

ad un livello base, con poche informazioni utilizziamo gli array per aggregare le nostre informazioni

gli oggetti servono per organizzare e mantenere il codice

* aggiungono chiarezza, riducendo la complessità
* regole semplici e interazione complessa
* lasciano maggior spazio ai dati
* permettono la modularizzazione e la riusabilità del codice

---

## Oggetti

Possiamo pensare ad un oggetto come ad un tipo di dato personalizzato, 
non esistente fra i tipi tradizionali di PHP, ma creato da noi.

Gli oggetti sono formati principalmente da attributi e metodi.
* Gli attributi sono delle variabili proprietarie dell'oggetto, semplici o complesse,
quindi anche Array o Oggetti.
* I metodi sono delle funzioni proprietarie dell'oggetto, e fra questi ce ne
sono due molto importanti i Costruttori e i Distruttori.

Se non definirete un costruttore e un distruttore per la vostra classe
(oggetto), PHP li rimpiazzerà con dei metodi propri di default.

Il costruttore verrà chiamato automaticamente da PHP, ogni volta che verrà
creato un oggetto (istanza), mentre il distruttore sarà chiamato quando l'oggetto
verrà distrutto, ossia quando non esiste più alcun riferimento all'oggetto oppure
alla fine dello script.

Per dichiarare un costruttore, è sufficiente creare una funzione all'interno
della classe che abbia lo stesso nome di quest'ultima, oppure potete usare la parola
chiave __construct().

---


## Modificatori di accesso

* **public** - I membri (attributi o metodi) della classe dichiarati public, possono essere utilizzati sia all'interno che all'esterno della classe (`$this->membro` oppure `$oggetto->membro`)
* **private** - I membri dichiarati private, possono essere utilizzati solo all interno della classe ($this->membro)
* **protected** - I membri dichiarati protected, possono essere utilizzati solo all'interno delle classi madri e derivate ($this->membro), questo modificatore implica l'ereditarietà

```php
$utente = new Studente("Mario", "Rossi", "1-1-1970");
$utente >nome = "Giuseppe";
$utente->cognome = "Verdi";
$utente->stampaStudente();
// output = Nome : Giuseppe / Cognome : Verdi / Data di nascita : 1-1-1970
```

---

## getter e setter

`__get and __set`

```php
<?php
class ContoCorrente {
    private $saldo;

    public function __get($nomeAttributo) {
        return $this->$nomeAttributo;
    }

    public function __set($nomeAttributo, $value) {
        if ( isset($value) ) $this->$nomeAttributo = $value;
    }
}
$mioConto = new ContoCorrente();
$mioConto->saldo = 100;

```

---

### Oggetti e costanti

`Colore.php`

```php
class Colore
{
const ROSSO = "#FF0000";
const VERDE = "#00FF00";
const BLU = "#0000FF";

static public function stampaRosso()
{
echo "<font color='" . self::ROSSO . "'>Il valore esadecimale del colore rosso è : ". self::ROSSO . "</font>";
}
}
```

---

### Utilizzo delle costanti globali

Con le costanti globali è necessario omettere il simbolo del dollaro $ durante la dichiarazione.

I nomi delle costanti in PHP 5 sono sempre Case Sensitive, ed è buona norma scriverle tutte in maiuscolo per distinguerle immediatamente come costanti, ma non è obbligatorio.

### test.php

```php
require once("Colore.php");

echo Colore::ROSSO . "";

Colore::stampaRosso();
```

---

### Esempio


### Studente.php
    Il nome del file è uguale a quello della classe, così come lo è il nome del costruttore.

```php

class Studente {
    public $nome = ""; // attributo
    public $cognome = ""; // attributo
    public $datanascita = ""; // attributo

    /*
    Il costruttore prende in input tre parametri ($n_nome, $n_cognome, $n_data) che andrà a memorizzare
    rispettivamente nei propri attributi ($nome, $cognome, $datanascita), a cui accederà tramite la parola
    chiave this.

    */
    public function Studente($n_nome, $n_cognome, $n_data) // costruttore
    {
        /* Con this l'oggetto può richiamare i suoi attributi e metodi, in quanto this indica l'oggetto
        stesso. */
    $this->nome = $n_nome;
        /* Subito dopo this segue l'operatore di selezione -> che punta ad un determinato attributo o metodo alla sua destra, appartenente
        all'oggetto alla sua sinistra (this).
    */
    $this->cognome = $n_cognome;
        /* Il simbolo del dollaro $, va solo su this e non sul nome dell'attributo/metodo. */
    $this->datanascita = $n_data;
    }

        /* Infine troviamo il metodo stampaStudente() che semplicemente stampa gli attributi dell'oggetto tramite il costrutto echo. */
    public function stampaStudente()// metodo
    {
    echo "Nome : " . $this->nome . "<br />\n";
    echo "Cognome : " . $this->cognome . "<br />\n";
    echo "Data di nascita : " . $this->datanascita. "<br />\n";
    }

}

```

---

### test.php

Per creare una nuova istanza della classe "Studente", abbiamo usato la parola chiave new seguita dal costruttore della classe con i rispettivi parametri.

A seguire richiamiamo il metodo "stampaStudente()" con l'operatore di selezione -> descritto in precedenza.

```html
<?php require_once("Studente.php"); ?>

<html>
    <head>
    <title>Test</title>
    </head>
    <body>
    <?php
    $utente = new Studente("Mario", "Rossi", "10-01-1980");
    $utente->stampaStudente();
    ?>
    </body>
</html>
```

---

### autoload

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