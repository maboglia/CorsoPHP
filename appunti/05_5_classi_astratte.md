# Classi astratte

Le classi astratte ci permettono
di specificare con esattezza quali classi e quali metodi devono
obbligatoriamente essere ridefiniti da una sottoclasse per
poter essere utilizzati.

La sottoclasse derivata da una classe astratta, dovrà
obbligatoriamente definire tali metodi astratti 
per far sì che l'ereditarietà venga accettata.


---
Una classe astratta fornisce un'implementazione parziale su cui altre classi possono basarsi. Quando una classe viene dichiarata astratta, significa che la classe può contenere metodi incompleti che devono essere implementati nelle classi figlie, oltre ai normali membri della classe.

## Metodi astratti
In una classe astratta, qualsiasi metodo può essere dichiarato astratto. Questi metodi vengono quindi lasciati non implementati e vengono specificate solo le loro firme, mentre i blocchi di codice vengono sostituiti da punti e virgola.

---

```php
abstract class FiguraGeometrica
{
  private $x = 100, $y = 100;
  abstract public function getArea();
}
```

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
$s = nuova forma(); // errore in fase di compilazione
Tuttavia, una classe astratta può ereditare da una classe non astratta (concreta).

---

## Classi astratte e interfacce

Le classi astratte sono per molti versi simili alle interfacce. Entrambi possono definire le firme dei membri che le classi che ne derivano devono implementare e nessuna di esse può essere istanziata. 

Le differenze principali sono, in primo luogo, che la classe astratta può contenere membri non astratti, mentre l'interfaccia no. 

In secondo luogo, una classe può implementare un numero qualsiasi di interfacce ma ereditare solo da una classe, astratta o meno.

---

## Interfacce

In PHP non è disponibile l'ereditarietà multipla, si può ereditare da una sola classe, astratta o concreta che sia.

* Per ovviare al problema (c.d. *diamond problem*) si possono creare delle interfacce che forniscano le proprietà di più classi.
* Lo scopo delle interfacce è quello di fornire un preciso set di metodi 
base per le classi, mediante la dichiarazione di metodi astratti
* Le interfacce possono avere solo metodi che saranno di default 
astratti e attributi pubblici e costanti.

---

Un'interfaccia specifica i metodi che le classi che utilizzano l'interfaccia devono implementare. Sono definiti con la parola chiave dell'interfaccia, seguita da un nome e un blocco di codice. La loro convenzione di denominazione consiste nell'iniziare con una i piccola e poi avere ogni parola inizialmente in maiuscolo.

`interface iMiaInterfaccia {}`

---

Il blocco di codice per un'interfaccia può contenere firme per metodi di istanza. Questi metodi non possono avere implementazioni. Invece, i loro corpi sono sostituiti da punti e virgola. I metodi di interfaccia devono essere sempre pubblici.

```php
interface iMiaInterfaccia
{
    public function mioMetodo();
}
```

---

Inoltre, le interfacce possono definire **costanti**. Queste costanti di interfaccia si comportano proprio come costanti di classe, tranne per il fatto che non possono essere sovrascritte.

```php
interface iMiaInterfaccia
{
   const PI = 3.14;
}
```

---

## Estendere un'interfaccia

Un'interfaccia non può ereditare da una classe, ma potrebbe ereditare da un'altra interfaccia.

`interface i1 {}`
`interface i2 extends i1 {`}