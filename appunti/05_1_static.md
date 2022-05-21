# static keyword

---

La parola chiave static può essere utilizzata per dichiarare proprietà e metodi a cui è possibile accedere senza dover creare un'istanza della classe. I membri statici (classe) esistono solo in una copia, che appartiene alla classe stessa, mentre i membri di istanza (non statici) vengono creati come nuove copie per ogni nuovo oggetto.





```php
class Cerchio
{
  // Membri dell'istanza (uno per oggetto)
  public $r = 10;
  function getArea() {}
  // Membri statici/di classe (solo una copia)
  static $PI_GRECO = 3.14;
  static function calcolaArea($a) {}
}
```

I metodi statici non possono utilizzare i membri dell'istanza poiché questi metodi non fanno parte di un'istanza. Tuttavia, possono utilizzare altri membri statici.

---

## Fare riferimento a membri statici

A differenza dei membri dell'istanza, non è possibile accedere ai membri statici utilizzando `l'operatore freccia singola (->)`. Invece, per fare riferimento a membri statici all'interno di una classe, al membro deve essere preceduta la parola chiave `self` seguita dall'operatore di risoluzione dell'ambito (`::`). La parola chiave `self` è un alias per il nome della classe, quindi in alternativa è possibile utilizzare il nome effettivo della classe.

```php
static function calcolaArea($a)
{
    return self::$PI_GRECO * $a * $a;     // ok
    return Cerchio::$PI_GRECO * $a * $a; // in alternativa si può usare il nome della classe
}
```

---


La stessa sintassi viene utilizzata per accedere ai membri statici da un metodo di istanza.
Si noti che, contrariamente ai metodi statici, i metodi di istanza possono utilizzare membri sia statici che di istanza.

```php
function getArea()
{
    return self::calcolaArea($this->$r);
}
```

---


Per accedere ai membri statici dall'esterno della classe, è necessario utilizzare il nome della classe, seguito dall'operatore di risoluzione dell'ambito (::).

```php

class Cerchio
{
    static $PI_GRECO = 3.14;
  static function calcolaArea($a)
  {
      return self::$PI_GRECO * $a * $a;
  }
}
echo Cerchio::$PI_GRECO; // "3.14"
echo Cerchio::calcolaArea(10); // "314"
```

I membri statici possono essere utilizzati senza dover creare un'istanza della classe. 
Pertanto, i metodi dovrebbero essere dichiarati statici se eseguono una funzione generica indipendentemente dalle variabili di istanza. 
Allo stesso modo, le proprietà dovrebbero essere dichiarate statiche se è necessaria solo una singola istanza della variabile all'interno del programma.
Per esempio per attribuire un numero di matricola univoco a ciascun oggetto.

---

## Variabili static

Le variabili locali possono essere dichiarate statiche per fare in modo che la funzione ricordi il suo valore. Tale variabile statica esiste solo nell'ambito della funzione locale, ma non perde il suo valore al termine della funzione. Questo può essere utilizzato per contare il numero di volte in cui viene chiamata una funzione, ad esempio.

```php
function contatoreStatico()
{
    static $val = 0;
  echo $val++;
}
contatoreStatico(); // "0"
contatoreStatico(); // "1"
contatoreStatico(); // "2"
```

---


Il valore iniziale assegnato a una variabile statica viene impostato una sola volta. Le proprietà statiche possono essere inizializzate solo con una costante; ma **NON** con un'espressione, con un'altra variabile o con un valore restituito da una funzione.

La parola chiave self è un alias per il nome della classe della classe che la racchiude. Ciò significa che la parola chiave fa riferimento alla sua classe che la racchiude anche quando viene chiamata dal contesto di una classe figlia.

```php
class ClasseBase
{
    protected static $val = 'classe base';
  public static function getVal()
  {
      return self::$val;
  }
}
class ClasseDerivata extends ClasseBase
{
    protected static $val = 'classe derivata (figlia)';
}
echo ClasseDerivata::getVal(); // "classe base"
```

---


Per ottenere il riferimento alla classe per valutare la classe chiamante effettiva, è necessario utilizzare la parola chiave static invece della parola chiave self. Questa funzionalità è denominata `late static bindings` ed è stata aggiunta in PHP 5.3.

```php
class ClasseBase
{
  protected static $val = 'classe base';
  public static function getLateStaticBinding()
  {
    return static::$val;
  }
}
```

```php
class ClasseDerivata extends ClasseBase
{
  protected static $val = 'classe derivata (figlia)';
}
echo ClasseDerivata::getLateStaticBinding(); // "classe derivata (figlia)"
```
