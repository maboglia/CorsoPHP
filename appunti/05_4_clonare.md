# Clonare oggetti

In PHP 4, durante la creazione di un oggetto attraverso la parola chiave
new, veniva restituito l'oggetto stesso e questo veniva memorizzato
nella variabile specificata.

In PHP 5 invece, quando creiamo una nuova istanza `$oggetto = new MiaClasse();`, 
new ci restituisce non il nuovo oggetto ma un
riferimento ad esso.

---

In PHP 5 se assegnate ad una variabile l'istanza di un oggetto,
l'assegnazione avverrà per riferimento poichè l'istanza stessa contiene
solo un riferimento all'oggetto creato.

Se volete quindi creare una copia di un'istanza, dovrete clonarla.

Per clonare un oggetto è sufficiente mettere la parola chiave clone
dopo l'operatore di assegnazione "=".

---

```php
<?php
class Oggetto{
public $valore;
public function Oggetto($v){
$this->valore = $v;
}
}
$istanza1 = new Oggetto(5);
$istanza2 = $istanza1; // Assegnazione per riferimento
$istanza3 = clone $istanza1; // Clonazione oggetto
$istanza2->valore = 7; // Modifica anche $istanza1
$istanza3->valore = 13;
echo $istanza1->valore; // Non stampa 5 ma 7
echo $istanza2->valore;
$istanza2 >valore; // Stampa 7
echo $istanza3->valore; // Stampa 13
?>
```

---

Clonando un oggetto, per definizione si crea una copia esatta di tale oggetto, quindi i
riferimenti contenuti in esso saranno comunque copiati come tali, e dopo la clonazione
conterranno ancora il riferimento alla stessa risorsa di prima.

