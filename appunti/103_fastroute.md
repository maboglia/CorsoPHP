# FastRoute

FastRoute è una libreria per PHP progettata per fornire un sistema di routing estremamente veloce, essenziale per la creazione di applicazioni web. È particolarmente adatta per framework PHP custom o per chi desidera avere un controllo preciso delle route senza utilizzare framework completi come Laravel o Symfony. Grazie alla sua struttura leggera e alle sue performance, FastRoute è ideale per le applicazioni web ad alte prestazioni.

---

## Caratteristiche principali di FastRoute

1. **Alta Velocità**: FastRoute è conosciuta per la sua velocità nella gestione delle route, grazie a un parser che ottimizza le prestazioni riducendo al minimo il tempo di elaborazione per ogni richiesta.

2. **Supporto per route dinamiche**: La libreria permette di definire parametri dinamici nelle route, ad esempio `/user/{id}` per indirizzare a percorsi che accettano parametri.

3. **Match di metodi HTTP**: FastRoute può gestire differenti metodi HTTP (GET, POST, PUT, DELETE, ecc.) per la stessa route, permettendo quindi un routing complesso e dettagliato.

4. **Semplicità di implementazione**: Il setup è minimo, rendendola facile da integrare in un progetto PHP. È sufficiente un file `composer` per installarla e iniziare a definire le route.

5. **Supporto per Middleware**: Sebbene FastRoute non includa un sistema di middleware nativo, può essere facilmente integrato con soluzioni middleware tramite librerie aggiuntive o integrazioni custom.

6. **Compatibilità**: Funziona con PHP 7.2+ e ha una struttura leggera e priva di dipendenze non necessarie, quindi può essere integrata in un’ampia varietà di ambienti.

---

## Installazione

FastRoute è disponibile come pacchetto Composer, quindi può essere installata in un progetto PHP con il seguente comando:

```bash
composer require nikic/fast-route
```

---

## Sintassi e utilizzo di base

Per utilizzare FastRoute, è possibile definire le route attraverso un approccio dichiarativo che supporta pattern avanzati. Ecco un esempio di definizione di route con FastRoute:

```php
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

$dispatcher = simpleDispatcher(function(RouteCollector $r) {
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    $r->addRoute('POST', '/user/{id:\d+}', 'update_user_handler');
});
```

In questo esempio:

- Viene creata una route `GET` per ottenere le informazioni di un utente tramite il suo ID (`/user/{id}`).
- È anche possibile definire pattern per i parametri, come `\d+` per numeri interi.

---

## Funzionamento

FastRoute è basata sul concetto di **dispatcher**, che associa le route HTTP definite a un gestore specifico per ciascuna richiesta. Esegue una scansione del percorso di richiesta e del metodo HTTP per verificare la presenza di una route corrispondente.

L’output del dispatcher consiste in un array con tre stati possibili:

- **FOUND**: La route corrispondente è stata trovata.
- **NOT_FOUND**: Nessuna route corrisponde alla richiesta.
- **METHOD_NOT_ALLOWED**: La route esiste ma non supporta il metodo HTTP usato.

---

## Integrazione e Utilizzo

Il dispatcher può essere inserito all'interno di una logica di routing più ampia e integrato in vari sistemi middleware. La flessibilità di FastRoute consente di includere facilmente gestori per la logica di autenticazione, validazione dei parametri, gestione degli errori e altro.

---

## Vantaggi di FastRoute

- **Performance**: Ottimizzata per una gestione rapida e ridotta latenza.
- **Leggerezza**: Il codice è semplice, senza overhead di framework complessi.
- **Flessibilità**: Permette di costruire un sistema di routing personalizzato per le esigenze specifiche di un progetto.
  
---

## Limiti

- **Nessun supporto middleware nativo**: Per ottenere una gestione dei middleware completa è necessario ricorrere a librerie o implementazioni custom.
- **Meno funzionalità avanzate rispetto ai framework completi**: Non offre la gamma di funzionalità aggiuntive come nei framework MVC come Laravel.

---

## Esempio di implementazione completo

```php
require 'vendor/autoload.php';

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

$dispatcher = simpleDispatcher(function(RouteCollector $r) {
    $r->addRoute('GET', '/home', 'home_handler');
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    $r->addRoute('POST', '/user/{id:\d+}', 'update_user_handler');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Rimozione dei parametri di query
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404 - Route non trovata";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo "Metodo non permesso. Permessi: " . implode(', ', $allowedMethods);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}
```

In questo esempio, la libreria FastRoute:

1. Verifica l'URI richiesto e il metodo HTTP.
2. Identifica la route e gestisce l'azione corrispondente.
3. Gestisce errori di route non trovata o metodo non consentito.

---

## Implementazione di fastroutes - `routes.php`

Separare le rotte in un file dedicato rende il codice più organizzato e facilita la gestione dei percorsi. Con FastRoute, è semplice implementare questo approccio. Ecco un esempio di come strutturare una piccola applicazione PHP utilizzando un file `routes.php` per definire tutte le rotte.

---

## Struttura dei File

```plaintext
project/
│
├── public/
│   └── index.php         # Punto di ingresso principale dell'applicazione
│
├── routes.php            # File che contiene la definizione delle rotte
│
└── vendor/               # Directory creata da Composer
```

---

## 1. Definizione delle Rotte in `routes.php`

Nel file `routes.php`, utilizziamo `RouteCollector` di FastRoute per definire le nostre rotte. Questo file si limita a specificare le rotte, mantenendo il routing separato dalla logica dell'applicazione.

```php
<?php

use FastRoute\RouteCollector;

/**
 * Definizione delle rotte in FastRoute
 * 
 * @param RouteCollector $r
 */
return function (RouteCollector $r) {
    $r->addRoute('GET', '/home', 'homeHandler');
    $r->addRoute('GET', '/user/{id:\d+}', 'userHandler'); // Route con parametro ID numerico
    $r->addRoute('POST', '/user/{id:\d+}/update', 'updateUserHandler');
};
```

---

## 2. Punto di Ingresso dell'Applicazione in `index.php`

Nel file `index.php`, carichiamo FastRoute e il file `routes.php`, quindi utilizziamo il dispatcher per gestire le richieste. Questa configurazione consente di mantenere la logica di gestione delle rotte separata dalle definizioni.

```php
<?php

require '../vendor/autoload.php';

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

// Carica le rotte dal file routes.php
$dispatcher = simpleDispatcher(require '../routes.php');

// Recupera il metodo HTTP e l'URI della richiesta
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Rimuove eventuali query string dall'URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Esegue il dispatch della route
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

// Funzioni di gestione delle rotte
function homeHandler() {
    echo 'Benvenuto nella Home!';
}

function userHandler($vars) {
    echo "Profilo utente con ID: " . $vars['id'];
}

function updateUserHandler($vars) {
    echo "Aggiornamento dati utente con ID: " . $vars['id'];
}
```

---

## Spiegazione del Codice

1. **Separazione delle Rotte**:
   - In `routes.php`, le rotte sono definite in una funzione anonima che riceve un oggetto `RouteCollector`.
   - Questo file viene caricato in `index.php`, rendendo possibile separare le definizioni di rotta dalla logica del dispatcher.

2. **Dispatcher e Gestione della Richiesta**:
   - In `index.php`, il dispatcher verifica l’URI della richiesta e il metodo HTTP, quindi lo confronta con le rotte definite.
   - Se trova una corrispondenza (`FOUND`), esegue il gestore associato.
   - Se non trova una corrispondenza (`NOT_FOUND` o `METHOD_NOT_ALLOWED`), restituisce un messaggio di errore appropriato.

3. **Gestori delle Rotte**:
   - Le funzioni `homeHandler`, `userHandler` e `updateUserHandler` simulano l’elaborazione della richiesta, restituendo un semplice messaggio come esempio.

---

## Vantaggi di Separare il File delle Rotte

- **Manutenibilità**: Separare il file delle rotte rende più facile gestire e aggiornare i percorsi dell'applicazione senza modificare il file principale.
- **Pulizia del Codice**: La logica delle rotte è centralizzata, riducendo la complessità di `index.php`.
- **Facilità di Espansione**: Nuovi percorsi possono essere aggiunti rapidamente in `routes.php` senza impattare il dispatcher o la logica di gestione delle richieste.

---

## Esecuzione

1. Avvia il server:

   ```bash
   php -S localhost:8000 -t public
   ```

2. Apri nel browser i seguenti percorsi per testare:
   - [http://localhost:8000/home](http://localhost:8000/home) → Mostra la home.
   - [http://localhost:8000/user/123](http://localhost:8000/user/123) → Mostra il profilo dell'utente con ID `123`.
   - [http://localhost:8000/user/123/update](http://localhost:8000/user/123/update) → Aggiorna i dati dell'utente `123`.

