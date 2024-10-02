# Installazione di Laravel: Guida Passo Passo

L'installazione di Laravel è il primo passo per iniziare a costruire applicazioni web potenti e moderne. Di seguito troverai una guida dettagliata su come installare Laravel nel tuo ambiente locale. Laravel richiede alcuni prerequisiti per funzionare correttamente, quindi iniziamo da lì.

### 1. Prerequisiti per Laravel

Per installare e utilizzare Laravel, assicurati di avere installato i seguenti software:

- **PHP 8.0 o superiore**: Laravel richiede una versione recente di PHP per supportare tutte le sue funzionalità. Controlla la versione di PHP nel terminale con il comando:

  ```bash
  php -v
  ```

- **Composer**: Laravel utilizza Composer per gestire le dipendenze. Puoi scaricare Composer dal sito ufficiale [Composer](https://getcomposer.org/). Una volta installato, controlla che sia funzionante con:

  ```bash
  composer -v
  ```

- **Server Web**: Puoi usare server locali come **Apache** o **Nginx**. Tuttavia, Laravel include anche un server di sviluppo integrato che puoi usare per testare le tue applicazioni in locale.

- **Database**: Laravel supporta diversi database come MySQL, PostgreSQL, SQLite e SQL Server. Assicurati di avere un database configurato e accessibile.

### 2. Installazione di Laravel tramite Composer

Una volta soddisfatti i prerequisiti, possiamo procedere all'installazione di Laravel. Esistono due metodi principali:

#### A) Installazione Globale del Laravel Installer

Laravel offre uno strumento chiamato **Laravel Installer** che può essere installato globalmente. Una volta installato, puoi creare nuove applicazioni Laravel facilmente.

1. Installa Laravel Installer globalmente tramite Composer:

   ```bash
   composer global require laravel/installer
   ```

2. Assicurati che la cartella `~/.composer/vendor/bin` sia nel tuo **PATH** di sistema per poter utilizzare `laravel` come comando da terminale.

3. Ora puoi creare una nuova applicazione Laravel con il seguente comando:

   ```bash
   laravel new nome-progetto
   ```

   Questo creerà una nuova directory chiamata `nome-progetto` contenente un'installazione di Laravel completamente configurata.

#### B) Installazione tramite Composer Create-Project

Se non vuoi installare globalmente Laravel, puoi usare Composer per installarlo direttamente nella tua directory di progetto.

1. Naviga nella cartella in cui vuoi creare il progetto e usa il comando:

   ```bash
   composer create-project --prefer-dist laravel/laravel nome-progetto
   ```

2. Questo comando installerà Laravel e tutte le sue dipendenze nella cartella `nome-progetto`.

### 3. Configurazione del File `.env`

Dopo l'installazione, Laravel include un file di configurazione `.env` che contiene variabili d'ambiente per configurare l'applicazione. Questo file è essenziale per impostare database, driver email, chiavi API e altre impostazioni.

1. Nella directory del progetto, apri il file `.env`. Vedrai un contenuto simile:

   ```env
   APP_NAME=Laravel
   APP_ENV=local
   APP_KEY=base64:xxxx
   APP_DEBUG=true
   APP_URL=http://localhost

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_database
   DB_USERNAME=root
   DB_PASSWORD=segreta
   ```

2. Configura il tuo database impostando i valori per `DB_DATABASE`, `DB_USERNAME`, e `DB_PASSWORD` in base alla tua configurazione locale.

3. Genera la chiave dell'applicazione (APP_KEY) con il comando:

   ```bash
   php artisan key:generate
   ```

   Questo è importante per la sicurezza dell'applicazione, poiché viene utilizzata per la cifratura.

### 4. Avviare il Server di Sviluppo

Una volta configurato, puoi avviare il server di sviluppo integrato in Laravel con il seguente comando:

```bash
php artisan serve
```

Questo comando avvierà il server alla URL `http://localhost:8000`. Ora puoi visualizzare la tua applicazione Laravel visitando questo indirizzo nel browser.

### 5. Configurare il Database

1. Dopo aver impostato il database nel file `.env`, puoi eseguire le **migrazioni** di Laravel per creare le tabelle predefinite (come la tabella `users` per l'autenticazione):

   ```bash
   php artisan migrate
   ```

   Questo creerà tutte le tabelle necessarie nel tuo database.

### 6. Controllo del Funzionamento

Se tutto è configurato correttamente, dovresti vedere la schermata di benvenuto di Laravel all'indirizzo `http://localhost:8000`. Da qui puoi iniziare a costruire la tua applicazione.

### Conclusione

L'installazione di Laravel è semplice e veloce, grazie al supporto di Composer e agli strumenti integrati che offre. Con Laravel, puoi iniziare subito a sviluppare applicazioni web, sfruttando la sua vasta gamma di funzionalità e il potente ecosistema che lo accompagna.