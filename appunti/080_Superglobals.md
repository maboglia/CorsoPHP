# Variabili Superglobali in PHP

In PHP esistono diverse variabili predefinite chiamate **superglobali**. Queste variabili sono speciali perché sono accessibili ovunque nel codice, indipendentemente dall’ambito in cui ti trovi. Ciò significa che non è necessario utilizzare la parola chiave `global` per accedere a queste variabili all'interno di funzioni o metodi. Le superglobali forniscono un modo semplice per gestire dati importanti, come informazioni sulle richieste HTTP o variabili di sessione.

### Elenco delle Superglobali in PHP

| **Nome**      | **Descrizione**                                                                                                                                         |
|---------------|---------------------------------------------------------------------------------------------------------------------------------------------------------|
| **`$GLOBALS`**| Contiene tutte le variabili globali, incluse le altre superglobali. È un array associativo che ti permette di accedere a qualsiasi variabile definita a livello globale.|
| **`$_GET`**   | Contiene le variabili inviate tramite una richiesta HTTP di tipo **GET**. Le variabili vengono passate nell'URL. È utile per recuperare i dati inviati tramite query string, come i parametri di una ricerca. |
| **`$_POST`**  | Contiene le variabili inviate tramite una richiesta HTTP di tipo **POST**. Questa superglobale è comunemente usata per gestire moduli inviati dagli utenti, come i dati di login o registrazione. |
| **`$_FILES`** | Contiene le informazioni sui file caricati tramite un modulo HTML che usa `POST` e ha l'attributo `enctype="multipart/form-data"`. Puoi utilizzarla per accedere ai file caricati dagli utenti. |
| **`$_COOKIE`**| Contiene le variabili memorizzate nei **cookie** inviati dal browser dell'utente al server. I cookie vengono utilizzati per memorizzare dati persistenti sul lato client, come le preferenze dell'utente. |
| **`$_SESSION`**| Contiene le variabili di **sessione**, che vengono utilizzate per mantenere dati persistenti durante la navigazione di un utente sul sito. Ad esempio, può essere usato per memorizzare dati dell'utente loggato. |
| **`$_REQUEST`**| Contiene le variabili inviate tramite **$_GET**, **$_POST** e **$_COOKIE**. È un modo comodo per raccogliere dati da diversi metodi di richiesta, ma è consigliato usarla con cautela per motivi di sicurezza. |
| **`$_SERVER`** | Contiene informazioni sul server web e sulla richiesta HTTP. Ad esempio, puoi ottenere l’indirizzo IP del client, il percorso del file in esecuzione, o il metodo di richiesta utilizzato (GET, POST, etc.). |
| **`$_ENV`**   | Contiene le variabili di **ambiente** definite sul server. Queste variabili dipendono dalla configurazione del server e vengono spesso utilizzate per configurare il comportamento dell'applicazione in base all'ambiente in cui viene eseguita (ad esempio, sviluppo, produzione, ecc.). |

### Esempio di Utilizzo

Un esempio pratico potrebbe essere il recupero di dati inviati tramite un modulo `POST`:

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];  // Recupera il valore dell'input 'username' dal modulo
    echo "Benvenuto, " . htmlspecialchars($username);  // Stampa il nome utente in modo sicuro
}
```

In questo caso, usiamo la superglobale `$_POST` per accedere ai dati inviati dall'utente tramite un modulo e la superglobale `$_SERVER` per verificare il tipo di richiesta (POST in questo caso).

Le superglobali sono fondamentali per lo sviluppo di applicazioni web in PHP, poiché forniscono un accesso rapido e semplice a tutte le informazioni necessarie sulle richieste HTTP, le sessioni e l'ambiente del server.
