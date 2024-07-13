# la funzione `spl_autoload_register()`

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
