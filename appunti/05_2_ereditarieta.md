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

L'ereditarietà consente a una classe di acquisire i membri di un'altra classe. Nell'esempio seguente, la classe `Quadrato` eredita da `Rettangolo`, specificato dalla parola chiave extends. `Rettangolo` diventa quindi la classe padre di `Quadrato`, che a sua volta diventa una classe derivata di `Rettangolo`. Oltre ai propri membri, `Quadrato` ottiene tutti i membri accessibili (non privati) in `Rettangolo`, incluso qualsiasi costruttore.

---

```php
// Classe padre (classe base)
class Rettangolo
{
   public $x, $y;
   function __construct($a, $b)
   {
     $questo->x = $a;
     $questo->y = $b;
   }
}

// Classe figlio (classe derivata)

class Quadrato extends Rettangolo {
    //eredita tutto quello che non è privato del Rettangolo
}
```

---

Quando si crea un'istanza di `Quadrato`, ora devono essere specificati due argomenti perché `Quadrato` ha ereditato il costruttore di `Rettangolo`.

`$forma = new Quadrato(5,10);`

Gli attributi e metodi ereditati da `Rettangolo` sono accessibili anche dall'oggetto `Quadrato`.

`$forma->x = 5; $forma->y = 10;`

Una classe in PHP può ereditare solo da una superclasse e il genitore deve essere definito prima della classe derivata nel file di script.

---

## Override: sovrascrittura dei metodi

Un membro in una classe derivata può ridefinire un membro nella sua classe padre per assegnargli una nuova implementazione. Per sovrascrivere un membro ereditato, deve solo essere dichiarato nuovamente con lo stesso nome. Come illustrato di seguito, il costruttore Quadrato esegue l'override del costruttore in Rettangolo.

```php
class Quadrato extends Rettangolo
{
  function __construct($a)
  {
    $questo->x = $a;
    $questo->y = $a;
  }
}
```

---


Con questo nuovo costruttore, viene utilizzato un solo argomento per creare lo Quadrato.
`$forma = nuovo quadrato(5);`
Poiché il costruttore ereditato di Rettangolo viene sovrascritto, il costruttore di Rettangolo non viene più chiamato quando viene creato l'oggetto Quadrato. Spetta allo sviluppatore chiamare il costruttore padre, se necessario. Questo viene fatto anteponendo alla chiamata la parola chiave padre e due due punti. I due punti sono noti come `operatore di risoluzione dell'ambito (::)`.

```php
class Quadrato extends Rettangolo
{
  function __construct($a)
  {
    parent::__construct($a,$a);
  }
}
```

---

La parola chiave parent è un alias per il nome della superclasse, che può essere utilizzato in alternativa. In PHP, è possibile accedere a membri sovrascritti a qualsiasi livello nella gerarchia di ereditarietà utilizzando questa notazione.

```php
class Quadrato extends Rettangolo
{
  function __construct($a)
  {
    Rettangolo::__construct($a,$a);
  }
}
```

---

## la parola chiave **final**

Per impedire a una classe figlio di eseguire l'override di un metodo, è possibile definirlo come `final`. Una classe stessa può anche essere definita come `final` per impedire a qualsiasi classe di estenderla.

```php
final class NotExtendable
{
  final function notOverridable() {}
}

```

---

## l'operatore Instanceof 
Come precauzione di sicurezza, è possibile verificare se è possibile eseguire il cast di un oggetto in una classe specifica utilizzando l'operatore instanceof. 

Questo operatore restituisce true se è possibile eseguire il cast dell'oggetto sul lato sinistro nel tipo sul lato destro senza causare un errore. Questo è vero quando l'oggetto è un'istanza o eredita dalla classe di destra.

```php

$forma = new Quadrato(5);
$forma instanceof Quadrato;    // true
$forma instanceof Rettangolo; // true
```