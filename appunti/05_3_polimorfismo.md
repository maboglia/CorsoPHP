# Polimorfismo e interfacce

Il Polimorfismo è la capacità di utilizzare un unico metodo in grado di
comportarsi in modo specifico quando applicato a tipi di dato differenti.

Questo è reso possibile grazie all'ereditarietà, che consente alle sottoclassi di ridefinire i metodi ereditati dalla classe base.

Il linguaggio può identificare una qualunque istanza della sottoclasse,
come un'istanza della classe base, poiché per il principio dell'ereditarietà, ogni sottoclasse possiede per natura tutte le proprietà della classe base (attributi e metodi).

---

In informatica, il termine polimorfismo (dal greco `πολυμορφος` composto dai termini `πολυ` molto e `μορφή` forma quindi "**avere molte forme**") viene usato in senso generico per riferirsi a espressioni che possono rappresentare valori di diversi tipi (dette espressioni polimorfiche). In un linguaggio non tipizzato, tutte le espressioni sono intrinsecamente polimorfiche.

Il termine viene associato a due significati specifici:

* nel contesto della **programmazione orientata agli oggetti**, si riferisce al fatto che un'espressione il cui tipo sia descritto da una classe A può assumere valori di un qualunque tipo descritto da una classe B sottoclasse di A (polimorfismo per inclusione);
* nel contesto della **programmazione generica**, si riferisce al fatto che il codice del programma può ricevere un tipo come parametro invece che conoscerlo a priori (polimorfismo parametrico).

* [polimorfismo su wikipedia](https://it.wikipedia.org/wiki/Polimorfismo_(informatica))  

---

## Polimorfismo per inclusione
Solitamente è legato alle relazioni di eredità tra classi, che garantisce che tali oggetti, pur di tipo differente, abbiano una stessa interfaccia: nei linguaggi ad oggetti tipizzati, le istanze di una sottoclasse possono essere utilizzate al posto di istanze della superclasse (polimorfismo per inclusione). 

## Polimorfismo parametrico
Un altro meccanismo spesso disponibile nei linguaggi tipizzati è il polimorfismo parametrico: in determinati contesti, è possibile definire delle variabili dal tipo parametrizzato, che viene poi specificato durante l'uso effettivo. Esempi di polimorfismo parametrico sono i template del C++ e i generics del Java.


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

## Programmazione funzionale - Lambda

```php
<?php
function show_Spanish(int $n, string $m): string
{
    return "The number {$n} is called {$m} in Spanish";
}

function map_Spanish(int $n, string $m): array
{
    return [$n => $m];
}

$a = [1, 2, 3, 4, 5];
$b = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

$c = array_map('show_Spanish', $a, $b);
print_r($c);

$d = array_map('map_Spanish', $a , $b);
print_r($d);
?>
```


