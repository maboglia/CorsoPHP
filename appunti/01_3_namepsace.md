
Namespace globale
-----------------

Quando usi i namespace, potresti scoprire che le funzioni native sono nascoste dalle funzioni che hai scritto. 
Per sistemarlo, riferisciti alla funzione globale mettendo un backslash prima del nome della funzione.

    <?php
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

*   [Spazio globale](http://php.net/language.namespaces.global)
*   [Regole globali](http://php.net/userlandnaming.rules)