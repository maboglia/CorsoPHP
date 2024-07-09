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

### Programmazione Funzionale in PHP

PHP supporta le funzioni di prima classe, il che significa che una funzione può essere assegnata a una variabile. Sia le funzioni definite dall'utente che le funzioni incorporate possono essere referenziate da una variabile e invocate dinamicamente. Le funzioni possono essere passate come argomenti ad altre funzioni e una funzione può restituire altre funzioni (una caratteristica chiamata funzioni di ordine superiore).

La ricorsione, una caratteristica che consente a una funzione di chiamare se stessa, è supportata dal linguaggio, ma la maggior parte del codice PHP si concentra sull'iterazione.

Le funzioni anonime (con supporto per le chiusure) sono presenti dalla versione PHP 5.3 (2009).

PHP 5.4 ha aggiunto la capacità di associare le chiusure all'ambito di un oggetto e ha anche migliorato il supporto per i callables in modo che possano essere utilizzati in modo intercambiabile con le funzioni anonime nella maggior parte dei casi.

L'uso più comune delle funzioni di ordine superiore è quando si implementa un modello di strategia. La funzione incorporata array_filter() richiede sia l'array di input (dati) che una funzione (una strategia o un callback) utilizzata come funzione di filtro per ogni elemento dell'array.

```php
<?php
$input = array(1, 2, 3, 4, 5, 6);

// Crea una nuova funzione anonima e la assegna a una variabile
$filter_even = function($item) {
    return ($item % 2) == 0;
};

// La funzione incorporata array_filter accetta sia i dati che la funzione
$output = array_filter($input, $filter_even);

// Non è necessario assegnare la funzione a una variabile. Questo è valido anche:
$output = array_filter($input, function($item) {
    return ($item % 2) == 0;
});

print_r($output);
?>
```

Una chiusura è una funzione anonima che può accedere a variabili importate dall'ambito esterno senza utilizzare variabili globali. Teoricamente, una chiusura è una funzione con alcuni argomenti chiusi (ad esempio, fissati) dall'ambiente quando è definita. Le chiusure possono aggirare le restrizioni dell'ambito delle variabili in modo pulito.

Nel prossimo esempio usiamo le chiusure per definire una funzione che restituisce una singola funzione di filtro per `array_filter()`, da una famiglia di funzioni di filtro.

```php
<?php
/**
 * Crea una funzione anonima di filtro che accetta elementi > $min
 *
 * Restituisce un singolo filtro da una famiglia di filtri "maggiore di n"
 */
function criteria_greater_than($min)
{
    return function($item) use ($min) {
        return $item > $min;
    };
}

$input = array(1, 2, 3, 4, 5, 6);

// Usa array_filter su un input con una funzione di filtro selezionata
$output = array_filter($input, criteria_greater_than(3));

print_r($output); // elementi > 3
?>
```

Ogni funzione di filtro nella famiglia accetta solo elementi maggiori di un valore minimo. Il singolo filtro restituito da criteria_greater_than è una chiusura con l'argomento $min chiuso dal valore nell'ambito (dato come argomento quando criteria_greater_than è chiamato).

Il binding anticipato è utilizzato per impostazione predefinita per importare la variabile $min nella funzione creata. Per vere chiusure con binding ritardato, si dovrebbe utilizzare un riferimento durante l'importazione. Immagina una libreria di templating o di validazione dell'input, dove una chiusura è definita per catturare variabili nell'ambito e accedervi successivamente quando la funzione anonima è valutata.

Leggi sulle funzioni anonime
Maggiori dettagli nella RFC sulle Chiusure
Leggi sull'invocazione dinamica delle funzioni con `call_user_func_array()`
