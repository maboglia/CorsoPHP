# Oggetti ed Ereditarietà

Il concetto dell'ereditarietà, è uno dei più importanti della
programmazione orientata agli oggetti, a cui si appoggiano altri
metodi avanzati di programmazione come ad esempio il Polimorfismo
o le Classi Astratte

L'ereditarietà ci consente di creare delle classi (classi derivate o
sottoclassi) basate su classi già esistenti (classi base o
superclassi).

Un grande vantaggio è quello di poter riutilizzare il codice di una
classe di base senza doverlo modificare.

---

L'ereditarietà ci consente quindi di scrivere del codice molto più
flessibile, in quanto permette una generalizzazione molto più forte di
un concetto, rendendo più facile descrivere una situazione di vita reale.

Pensate alla classe base come ad un oggetto che descrive un concetto
generale, e pensate invece alle sottoclassi come ad una
generale specializzazione di tale concetto, esteso mediante proprietà e metodi
aggiuntivi.

---

### Animale.php

```php
<?php
class Animale // Classe Base
{
public $zampe;
public $ordine;
public $nome;
public function Animale($z, $o, $n) // Costruttore
{
$this->zampe = $z;
$this->ordine = $o;
$this->nome = $n;
}
protected function stampaDati() // Metodo protetto : può essere richiamato solo dalle classi derivate
{ echo $this->nome . " : Zampe = " . $this->zampe . " / Ordine = " . $this->ordine;}
}
?>
```

---

### Cane.php
```php
<?php
require_once("Animale.php");
class Cane extends Animale // "Sottoclasse o Derivata"
{
    public function Cane() // Costruttore classe derivata
    {
        parent::Animale(4, "Vertebrati", "Cane"); // Chiamata al costruttore della classe madre
        /* oppure più generalizzato
        parent::__construct(4, "Vertebrati", "Cane");
        */
    }

    public function stampaDati($suono)
    {
        echo "Faccio $suono perchè sono ";
        parent::stampaDati(); // Chiamata al metodo protetto della classe
    }
}
```

---

### Gallina.php

```php
<?php
require_once("Animale.php");
class Gallina extends Animale // "Sottoclasse" o "Classe Derivata"
{
public function Gallina() // Costruttore classe derivata
{
parent::Animale(2, "Vertebrati", "Gallina"); // Chiamata al costruttore della classe madre
}
public function stampaDati($suono)
{
echo "Faccio $suono perchè sono ";
parent::stampaDati(); // Chiamata al metodo protetto della classe madre
}
}
?>
```

---

Il metodo stampaDati di Animale è dichiarato con il modificatore di
accesso protected, ossia può essere utilizzato solo all'interno della
classe madre Animale e all'interno di tutte le classi da essa derivate,
quindi anche Cane e Gallina.

Per richiamare il costruttore della classe madre dalle figlie è sufficiente
utilizzare parent:: invece di this, in questo modo accediamo
direttamente alla classe base, allo stesso modo con cui self:: viene
usato al posto di this.

---

### test.php

```php
<?php
require_once("Cane.php");
require_once("Gallina.php");

$cane = new Cane();
$cane->stampaDati("bau");

$gallina = new Gallina();
$gallina->stampaDati("chicchirichì");

?>
```

---

Sottoclasse derivata da una sottoclasse

### Alano.php

```php
<?php
require_once("Cane.php");

class Alano extends Cane{
private $suono;
public function Alano()
{
parent::Cane();
$this->suono = "wuoff";
}
public function stampaDati()
{
parent::stampaDati($this->suono);
echo " / Razza : Alano";
}
}
?>
```

### test.php

```php
<?php
require_once("Alano.php");
$cane = new Alano();
$cane->stampaDati();
?>
```