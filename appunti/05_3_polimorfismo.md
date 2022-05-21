# Polimorfismo

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



