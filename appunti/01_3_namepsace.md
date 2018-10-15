
Namespace globale
-----------------

Per organizzare meglio il codice sorgente sorgente, in PHP puoi usare il concetto di namespace. 
Introdotto dalla versione 5.3.0, è utile per evitare collisioni di nomi e per creare alias.

* `namespace Foo;`
* `namespace Foo\Bar;`
* `namespace Foo\Bar\subnamespace;`

```php
    namespace phptherightway;
    
    function fopen()
    {
        $file = \fopen();    // Il nome della nostra funzione è lo stesso di una nativa.
                             // Esegui la funzione native aggiungendo '\'.
    }
    
    function array()
    {
        $iterator = new \ArrayIterator();    // ArrayIterator è una classe nativa. Usare il suo nome senza un backslash
                                             // significa cercare di risolverla nel tuo namespace.
    }
```

Quando usi i namespace, potresti scoprire che le funzioni native sono nascoste dalle funzioni che hai scritto. 
Per sistemarlo, riferisciti alla funzione globale mettendo un backslash prima del nome della funzione.

*   [PHP namespace](http://php.net/manual/it/language.namespaces.php)