# La funzione `__autoload`

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
