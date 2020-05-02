# Classi astratte

Le classi astratte ci permettono
di specificare con esattezza quali classi e quali metodi devono
obbligatoriamente essere ridefiniti da una sottoclasse per
poter essere utilizzati.

La sottoclasse derivata da una classe astratta, dovrà
obbligatoriamente definire tali metodi astratti 
per far sì che l'ereditarietà venga accettata.


---

```php
<?php
abstract class Animale{
protected $zampe;
protected function Animale($z){
$this->zampe = $z;
}
public function numeroZampe(){
echo $this->zampe;
}
abstract protected function suono();
}
class Cane extends Animale{
public function Cane(){
parent::Animale(4);
}
public function suono()
{ echo "bau!"; }
}
$rex = new Cane();
$rex->numeroZampe(); // Stampa 4
$
$rex->suono();
>
() // Stampa "bau!”
?>
```

---

Il metodo astratto "suono()" della classe astratta
"Animale" è solamente dichiarato, mentre la definizione avviene
direttamente nella classe derivata.

Dichiarando Cane senza la definizione di suono(),
avremmo ottenuto un errore.