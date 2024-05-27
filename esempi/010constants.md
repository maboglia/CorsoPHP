# Utilizzo delle Costanti in PHP

---

#### Introduzione

Le costanti in PHP sono simili alle variabili, ma una volta definite, il loro valore non può essere cambiato. Le costanti sono utili per definire valori che devono rimanere invariati nel tempo, come configurazioni o parametri fissi.

---

#### Codice di Esempio

```php
<html lang="en">
 <head>
  <title>Constants</title>
 </head>
 <body>
  <?php
   $max_width = 980;

define("MAX_WIDTH", 980);
echo MAX_WIDTH;
?>
  <br />
  <?php // can't change the value
  //MAX_WIDTH = MAX_WIDTH + 1
  //echo MAX_WIDTH;
  ?>
  <?php // can't even redefine it
  define("MAX_WIDTH", 981);
  echo MAX_WIDTH;
  ?>
 </body>
</html>
```

---

#### Spiegazione del Codice

- **Definizione di una Variabile Normale**

```php
$max_width = 980;
```

- `$max_width`: Una variabile normale a cui viene assegnato il valore `980`. Questo valore può essere cambiato in seguito nel codice.
- **Definizione di una Costante**

```php
define("MAX_WIDTH", 980);
```

- `define()`: Funzione utilizzata per definire una costante in PHP.
- `"MAX_WIDTH"`: Nome della costante. Per convenzione, i nomi delle costanti sono spesso scritti in maiuscolo.
- `980`: Valore assegnato alla costante `MAX_WIDTH`.
- **Stampa del Valore della Costante**

```php
echo MAX_WIDTH;
```

- `echo`: Utilizzato per stampare il valore della costante `MAX_WIDTH`. Poiché è una costante, non è necessario utilizzare il simbolo `$`.
- **Tentativo di Modifica del Valore della Costante (Commentato)**

```php
// MAX_WIDTH = MAX_WIDTH + 1
// echo MAX_WIDTH;
```

- Questi commenti illustrano che le costanti non possono essere modificate dopo essere state definite. Se il codice fosse eseguito senza i commenti, causerebbe un errore.
- **Tentativo di Ridefinizione della Costante**

```php
define("MAX_WIDTH", 981);
echo MAX_WIDTH;
```

- Anche se viene fatto un nuovo tentativo di definire `MAX_WIDTH` con un valore diverso (`981`), PHP ignorerà questa ridefinizione e il valore della costante rimarrà invariato a `980`.

---

#### Concetti Chiave

- **Definizione delle Costanti**: Le costanti sono definite usando `define("NOME_COSTANTE", valore)`.
- **Immutabilità**: Una volta definita, una costante non può essere modificata o ridefinita.
- **Senza Simbolo `$`**: A differenza delle variabili, le costanti sono usate direttamente con il loro nome senza il simbolo `$`.
- **Ambito Globale**: Le costanti sono automaticamente globali e possono essere utilizzate in qualsiasi parte del codice, indipendentemente dall'ambito in cui sono state definite.

---

#### Esempio di Output

Quando il codice viene eseguito, l'output sarà:

```
980
980
```

Il secondo tentativo di ridefinire la costante `MAX_WIDTH` non ha effetto, quindi il valore rimane `980`.

---

#### Conclusione

Le costanti sono utili quando si ha bisogno di valori immutabili nel codice. Comprendere come definirle e utilizzarle correttamente è essenziale per scrivere codice PHP robusto e mantenibile. Le costanti assicurano che certi valori critici non vengano accidentalmente modificati nel corso dell'esecuzione del programma.
