# Clonare Oggetti in PHP

Con il passaggio da PHP 4 a PHP 5, c'è stato un cambiamento significativo nella gestione degli oggetti. In PHP 4, ogni volta che veniva creata un'istanza di un oggetto con la parola chiave `new`, l'oggetto veniva restituito direttamente e memorizzato nella variabile. In PHP 5, e nelle versioni successive, compreso PHP 8, la creazione di un oggetto attraverso `new` restituisce **un riferimento** all'oggetto, non l'oggetto stesso.

## Differenza tra Assegnazione e Clonazione

Quando si assegna un oggetto a una nuova variabile, si sta assegnando **un riferimento** all'oggetto originale. Questo significa che entrambe le variabili puntano allo stesso oggetto in memoria, e qualsiasi modifica fatta tramite una variabile si rifletterà automaticamente nell'altra.

Se si desidera creare una copia indipendente di un oggetto, è necessario utilizzare la parola chiave `clone`. Questa operazione creerà una copia superficiale dell'oggetto, in modo che le modifiche apportate alla copia clonata non influenzino l'originale.

### Esempio di Clonazione

```php
<?php
class Oggetto {
    public $valore;
    
    public function __construct($v) {
        $this->valore = $v;
    }
}

$istanza1 = new Oggetto(5);
$istanza2 = $istanza1; // Assegnazione per riferimento
$istanza3 = clone $istanza1; // Clonazione oggetto

// Modifica del valore tramite riferimento
$istanza2->valore = 7; // Modifica sia $istanza1 che $istanza2

// Modifica del valore nella copia clonata
$istanza3->valore = 13;

echo $istanza1->valore; // Stampa 7
echo $istanza2->valore; // Stampa 7
echo $istanza3->valore; // Stampa 13
?>
```

### Spiegazione

- **$istanza1 e $istanza2**: Sono riferimenti allo stesso oggetto in memoria. Modificando `$istanza2->valore`, anche `$istanza1->valore` cambia.
- **$istanza3**: È una copia clonata. Le modifiche fatte su `$istanza3` non influenzano `$istanza1` o `$istanza2`.

## Clonazione Superficiale vs Profonda

In PHP, la clonazione predefinita è **superficiale** (shallow copy). Questo significa che se l'oggetto contiene riferimenti ad altri oggetti, i riferimenti stessi saranno clonati, ma gli oggetti referenziati **non** saranno clonati. Pertanto, gli oggetti interni rimarranno condivisi tra l'originale e la copia.

### Esempio di Clonazione Superficiale

```php
<?php
class InnerObject {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }
}

class OuterObject {
    public $inner;

    public function __construct(InnerObject $inner) {
        $this->inner = $inner;
    }
}

$inner1 = new InnerObject("originale");
$outer1 = new OuterObject($inner1);
$outer2 = clone $outer1;

$outer2->inner->name = "modificato";

echo $outer1->inner->name; // Stampa "modificato"
echo $outer2->inner->name; // Stampa "modificato"
?>
```

In questo esempio, la clonazione di `$outer1` non ha creato una nuova copia di `$inner1`, quindi `$outer2->inner` e `$outer1->inner` puntano allo stesso oggetto.

### Clonazione Profonda

Se è necessario creare una copia completa e indipendente di un oggetto, incluse le sue proprietà oggetto, si deve implementare manualmente una **clonazione profonda**. Questo può essere fatto sovrascrivendo il metodo `__clone()` all'interno della classe.

### Esempio di Clonazione Profonda

```php
<?php
class InnerObject {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }
}

class OuterObject {
    public $inner;

    public function __construct(InnerObject $inner) {
        $this->inner = $inner;
    }

    // Implementazione di clonazione profonda
    public function __clone() {
        $this->inner = clone $this->inner;
    }
}

$inner1 = new InnerObject("originale");
$outer1 = new OuterObject($inner1);
$outer2 = clone $outer1;

$outer2->inner->name = "modificato";

echo $outer1->inner->name; // Stampa "originale"
echo $outer2->inner->name; // Stampa "modificato"
?>
```

In questo esempio, grazie all'implementazione del metodo `__clone()`, ora `$outer1` e `$outer2` hanno due istanze indipendenti di `InnerObject`, e le modifiche fatte su una non influenzano l'altra.

---

## Novità in PHP 8

PHP 8 non introduce nuove funzionalità specifiche legate alla clonazione degli oggetti, ma continua a supportare le stesse meccaniche di clonazione viste in PHP 5 e 7. Tuttavia, con PHP 8 si hanno miglioramenti generali nelle prestazioni, nella gestione degli errori e una maggiore flessibilità grazie all'introduzione dei **Union Types**, che possono essere usati anche nelle classi che gestiscono oggetti complessi.

---

## Riepilogo

- **Assegnazione per riferimento**: Due variabili puntano allo stesso oggetto, quindi le modifiche in una si riflettono nell'altra.
- **Clonazione**: Utilizzando `clone`, si crea una copia superficiale dell'oggetto, separando l'istanza dall'originale.
- **Clonazione profonda**: Richiede la personalizzazione del metodo `__clone()` per duplicare anche gli oggetti contenuti all'interno dell'oggetto originale.

Sfruttare la clonazione degli oggetti in PHP permette di gestire al meglio la creazione di copie indipendenti e garantisce un controllo più preciso sulla manipolazione dei dati all'interno delle applicazioni.

