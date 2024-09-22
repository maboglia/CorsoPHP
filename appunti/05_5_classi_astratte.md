# Classi astratte

Le classi astratte ci permettono
di specificare con esattezza quali classi e quali metodi devono
obbligatoriamente essere ridefiniti da una sottoclasse per
poter essere utilizzati.

La sottoclasse derivata da una classe astratta, dovrà
obbligatoriamente definire tali metodi astratti 
per far sì che l'ereditarietà venga accettata.

---

## Metodi astratti

Una classe astratta fornisce un'implementazione parziale su cui altre classi possono basarsi. Quando una classe viene dichiarata astratta, significa che la classe può contenere metodi incompleti che devono essere implementati nelle classi figlie, oltre ai normali membri della classe.

In una classe astratta, qualsiasi metodo può essere dichiarato astratto. Questi metodi vengono quindi lasciati non implementati e vengono specificate solo le loro firme, mentre i blocchi di codice vengono sostituiti da punti e virgola.

```php
abstract class FiguraGeometrica
{
  private $x = 100, $y = 100;
  abstract public function getArea();
}
```
  
---

Se una classe eredita da questa classe astratta, è quindi forzata a sovrascrivere il metodo astratto. La firma del metodo deve corrispondere, ad eccezione del livello di accesso, che può essere reso meno ristretto.

```php
class Rettangolo extends FiguraGeometrica
{
  public function getArea()
  {
    return $this->x * $this->y;
  }
}
```


Non è possibile istanziare una classe astratta. Servono solo come genitori per le altre classi, dettando in parte la loro attuazione.

`$s = nuova forma();` // errore in fase di compilazione

Tuttavia, una classe astratta può ereditare da una classe non astratta (concreta).

---

## Classi astratte e interfacce

Le classi astratte sono per molti versi simili alle interfacce. Entrambi possono definire le firme dei membri che le classi che ne derivano devono implementare e nessuna di esse può essere istanziata. 

Le differenze principali sono, in primo luogo, che la classe astratta può contenere membri non astratti, mentre l'interfaccia no. 

In secondo luogo, una classe può implementare un numero qualsiasi di interfacce ma ereditare solo da una classe, astratta o meno.
