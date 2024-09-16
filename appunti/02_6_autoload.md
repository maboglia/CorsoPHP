### **Caricamento automatico delle classi in PHP (Autoloading)**

Il **caricamento automatico delle classi** (*autoloading*) in PHP è un meccanismo che consente di caricare automaticamente i file contenenti le definizioni delle classi o delle interfacce quando vengono utilizzate, senza bisogno di includerle manualmente con `require` o `include`. L’autoloading rende il codice più pulito e modulare, e semplifica la gestione di progetti più complessi.

A partire da PHP 5.3, il caricamento automatico è stato migliorato con l'introduzione di **`spl_autoload_register()`**, che permette di registrare una o più funzioni di caricamento automatico. A partire da PHP 7.4 e PHP 8, il sistema di autoloading viene ulteriormente arricchito dal supporto a **Composer**, il gestore di pacchetti che facilita la gestione delle dipendenze e dell'autoloading.

---

### **Come funziona il caricamento automatico?**

1. **Autoload manuale con `spl_autoload_register()`**:
   Questa funzione permette di registrare una funzione che verrà richiamata automaticamente quando viene richiesta una classe che non è ancora stata inclusa.

2. **Autoload con Composer**:
   Composer gestisce automaticamente il caricamento delle classi utilizzando un file `composer.json`. È una soluzione molto potente e automatizzata, utilizzata nella maggior parte dei progetti PHP moderni.

---

### **1. Autoload manuale con `spl_autoload_register()`**

Un esempio di come implementare manualmente l’autoloading:

#### Esempio

Struttura delle cartelle:

```
/progetto
   ├── /models
   │      └── Oggetto.php
   └── index.php
```

#### `models/Oggetto.php`

```php
<?php
namespace Models;

class Oggetto {
    public function descrizione() {
        return "Questo è un oggetto.";
    }
}
```

#### `index.php`

```php
<?php

// Funzione di autoload
spl_autoload_register(function($class) {
    // Sostituisce i namespace con il percorso della directory
    $class = str_replace("\\", "/", $class);
    
    // Include il file della classe
    include __DIR__ . '/' . $class . '.php';
});

// Uso della classe Oggetto senza includere manualmente il file
use Models\Oggetto;

$oggetto = new Oggetto();
echo $oggetto->descrizione();
```

**Spiegazione**:

- La funzione di autoload sostituisce il backslash (`\`) nei namespace con lo slash (`/`), trasformando il nome della classe in un percorso di file.
- Carica automaticamente il file contenente la definizione della classe quando viene istanziata.

---

### **2. Autoload con Composer**

Composer è uno strumento molto usato per gestire sia le dipendenze che l’autoloading di classi, evitando la necessità di creare manualmente funzioni di autoload. Composer gestisce questo attraverso il file `composer.json` e genera automaticamente un file di autoloading.

#### **Passi per implementare l'autoload con Composer:**

1. **Inizializzare Composer** nel progetto:
   Apri il terminale nella directory del progetto e digita:

   ```bash
   composer init
   ```

   Questo comando ti guiderà nella creazione di un file `composer.json`.

2. **Aggiungere l'autoload** nel file `composer.json`:
   Una volta creato il file, puoi aggiungere la sezione `autoload` per specificare le cartelle che contengono le tue classi.

#### Esempio di `composer.json`

```json
{
    "name": "utente/progetto",
    "autoload": {
        "psr-4": {
            "Models\\": "models/",
            "Controllers\\": "controllers/"
        }
    },
    "require": {}
}
```

3. **Eseguire il comando di autoload**:
   Dopo aver aggiunto la configurazione, esegui il comando:

   ```bash
   composer dump-autoload
   ```

   Questo comando genera automaticamente un file chiamato `vendor/autoload.php` che si occuperà del caricamento automatico di tutte le classi specificate in `composer.json`.

4. **Utilizzare l'autoloading di Composer**:
   Ora puoi includere l'autoload di Composer e le tue classi saranno caricate automaticamente.

#### Esempio di utilizzo con Composer

```php
<?php
require 'vendor/autoload.php';  // Include l'autoload di Composer

use Models\Oggetto;

$oggetto = new Oggetto();
echo $oggetto->descrizione();
```

**Vantaggi dell'autoload con Composer**:

- **Automatizzazione**: Non devi più scrivere funzioni di autoload personalizzate.
- **PSR-4**: Segue lo standard di caricamento automatico PSR-4, che permette di mappare namespace a directory, rendendo la gestione delle classi molto ordinata.
- **Gestione delle dipendenze**: Composer non si limita solo all'autoloading, ma gestisce anche pacchetti di terze parti (es. librerie esterne), rendendo lo sviluppo più efficiente.

---

### **Conclusione**

Il caricamento automatico delle classi è una pratica essenziale per sviluppare applicazioni PHP moderne e scalabili. Sia che tu scelga di implementarlo manualmente con `spl_autoload_register()` o di utilizzare Composer per un approccio più robusto e automatizzato, l'autoloading migliora l'organizzazione e la manutenibilità del codice.

---


## la funzione `spl_autoload_register()`

```php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$obj  = new MyClass1();
$obj2 = new MyClass2(); 
```

## Caricamento automatico delle classi ¶

Molti sviluppatori che producono applicazioni orientate agli oggetti creano un file sorgente PHP per ogni classe definita. Uno dei più grossi inconvenienti di questo approccio è la necessità di mantenere una lunga lista di inclusioni all'inizio di ogni script (un'inclusione per ogni classe).

### Note:

Prima di 5.3.0, le eccezioni sollevate dalla funzione `__autoload` non potevano essere intercettate nel blocco catch e avrebbero portato ad un errore fatale. 

Da 5.3.0+ le eccezioni sollevate nella funzione `__autoload` possono essere intercettate nel blocco catch, con la sola precisazione che se si sta sollevando un'eccezione definita dall'utente la classe in cui l'eccezione viene definita deve essere disponibile. 

La funzione `__autoload` può essere usata ricorsivamente per caricare la classe dell'eccezione personalizzata.

La funzionalità di autocaricamento non è disponibile se si sta usando PHP nella modalità interattiva di CLI.



### Example #1 Esempio di autocaricamento

Questo esempio cerca di caricare le classi MyClass1 e MyClass2 rispettivamente dai file MyClass1.php e MyClass2.php.

```php
<?php
function __autoload($class_name) {
    include $class_name . '.php';
}

$obj  = new MyClass1();
$obj2 = new MyClass2(); 
?>
```

### Example #2 Altro esempio di autocaricamento

Questo esempio tenta di caricare l'interfaccia ITest.

```php
<?php

function __autoload($name) {
    var_dump($name);
}

class Foo implements ITest {
}

/*
string(5) "ITest"

Fatal error: Interface 'ITest' not found in ...
*/
?>
```

### Example #3 Autocaricamento con gestione delle eccezioni per 5.3.0+

Questo esempio solleva un'eccezione e dimostra come intercettarla con il blocco try/catch.

```php
<?php
function __autoload($name) {
    echo "Si vuole caricare $name.\n";
    throw new Exception("Impossibile caricare $name.");
}

try {
    $obj = new NonLoadableClass();
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}
?>
```
Il precedente esempio visualizzerà:

Si vuole caricare NonLoadableClass.
Impossibile caricare NonLoadableClass.

### Example #4 Autocaricamento con gestione delle eccezioni per 5.3.0+ - Classe dell'eccezione personalizzata mancante

Questo esempio solleva un'eccezione per una eccezione personalizzata non caricabile.

```php
<?php
function __autoload($name) {
    echo "Si vuole caricare $name.\n";
    throw new MissingException("Impossibile $name.");
}

try {
    $obj = new NonLoadableClass();
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}
?>
```

Il precedente esempio visualizzerà:

Si vuole caricare NonLoadableClass.
Si vuole caricare MissingException.

Fatal error: Class 'MissingException' not found in testMissingException.php on line 

### NB: La funzione `__autoload` è stata deprecata e non è più disponibile da php 8

Questa funzione è richiamata automaticamente quando una classe o un'interfaccia non definita viene utilizzata.

Richiede un parametro, che è il nome della classe o dell'interfaccia PHP.


```php

function __autoload($class)
{
    echo "Argomento Passato alla funzione Autoloader = $class\n";
    include __DIR__ . '/../' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
}

```

Una buona pratica da seguire quando si scrivono applicazioni orientate agli oggetti
è utilizzare un file per ogni classe e denominarlo in base al nome della classe.

Seguendo questa convenzione, la funzione `__autoload` è in grado di caricare la classe necessaria.

```php
<?php
// miaclasse.php
class MiaClasse {}
?>
```

Se il file si trova in una sottocartella, il nome della classe può includere caratteri underline. 
Questi caratteri devono poi essere convertiti in separatori di path nella funzione di caricamento automatico `__autoload`.
