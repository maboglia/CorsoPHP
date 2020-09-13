# Polimorfismo

Il Polimorfismo è la capacità di utilizzare un unico metodo in grado di
comportarsi in modo specifico quando applicato a tipi di dato differenti.

Questo è reso possibile
grazie all'ereditarietà, che consente alle sottoclassi di ridefinire i metodi ereditati dalla classe base.

Il linguaggio può identificare una qualunque istanza della sottoclasse,
come un'istanza della classe base, poiché per il principio dell'ereditarietà, ogni sottoclasse
possiede per natura tutte le proprietà della classe base (attributi e metodi).

---

```php
<?php
class Animale{
    /* Rendiamo protetto il metodo
    per obbligare una ridefinizione in una
    sottoclasse. Più avanti per ottenere un risultato
    migliore useremo le Classi Astratte. */

protected function zampe(){
echo "Errore : la funzione va
obbligatoriamente ridefinita da una
sottoclasse!";
}
}
class Cane extends Animale{
public function zampe(){
echo "Zampe : 4";
}
}
class Gallina extends Animale{
public function zampe(){
echo "Zampe : 2";
?>

}
}
function numeroZampe($oggetto){
if ($oggetto instanceof Animale) //Condizione = Se oggetto è un istanza di Animale o derivata da essa

{
$oggetto->zampe();
}
else{
echo "Tipo di oggetto non riconosciuto!!";
}
}
numeroZampe(new Cane()); // Stampa:"Zampe : 4
numeroZampe(new Gallina()); // Stampa :Zampe : 2

---

```

Nell’ esempio possiamo notare che abbiamo stabilito un nome univoco
per il nostro metodo ("zampe()"), ereditato direttamente dalla classe
base Animale.

Flessibilità della funzione esterna numeroZampe(), che sarà in
grado di gestire anche altri classi oltre a Cane e Gallina,
 definibili in un secondo momento senza necessità di apportare modifiche alla
funzione numeroZampe() o alle tre classi (Animale, Cane e Gallina).
