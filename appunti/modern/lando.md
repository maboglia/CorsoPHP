# **Lando + PHP** (Ambiente di sviluppo locale)

### 1) Cos’è Lando

**Lando** è uno strumento che permette di creare ambienti di sviluppo locali basati su **Docker**, in modo semplice e standardizzato.

Con Lando puoi:

* avviare un progetto PHP in pochi secondi
* lavorare con versioni diverse di PHP (7.4, 8.0, 8.1, 8.2, ecc.)
* aggiungere facilmente database (MySQL, MariaDB, PostgreSQL)
* usare strumenti come Composer, phpMyAdmin, Xdebug
* evitare problemi di configurazione tra PC diversi

---

### 2) Prerequisiti

Per usare Lando servono:

* **Docker Desktop** installato e avviato
* **Lando** installato sul sistema

Verifica installazione:

```bash
docker --version
lando --version
```

---

### 3) Creare un progetto PHP base con Lando

Crea una cartella progetto:

```bash
mkdir progetto-php-lando
cd progetto-php-lando
```

Inizializza Lando:

```bash
lando init
```

Lando ti farà alcune domande, ad esempio:

* tipo di progetto → **php**
* cartella webroot → `.` oppure `public`

---

### 4) File fondamentale: `.lando.yml`

Il file `.lando.yml` è la configurazione del progetto.

Esempio tipico per PHP:

```yaml
name: mio-progetto-php
recipe: php
config:
  webroot: .
  php: '8.2'
```

Significato:

* **name** → nome ambiente Lando
* **recipe** → modello di progetto (php, laravel, wordpress…)
* **webroot** → cartella pubblica
* **php** → versione PHP da usare

---

### 5) Avviare e fermare l’ambiente

Per avviare:

```bash
lando start
```

Per fermare:

```bash
lando stop
```

Per eliminare completamente i container:

```bash
lando destroy
```

---

### 6) Verificare le informazioni dell’ambiente

```bash
lando info
```

Mostra:

* URL del sito locale
* porte esposte
* servizi attivi (appserver, database, ecc.)

---

### 7) Eseguire comandi PHP dentro Lando

Per eseguire PHP:

```bash
lando php -v
```

Eseguire uno script:

```bash
lando php index.php
```

Aprire una shell nel container:

```bash
lando ssh
```

---

### 8) Uso di Composer con Lando

Composer è spesso già incluso.

Verifica:

```bash
lando composer --version
```

Installare dipendenze:

```bash
lando composer install
```

Aggiornare:

```bash
lando composer update
```

---

### 9) Creare un file PHP di test

Crea un file `index.php`:

```php
<?php
phpinfo();
```

Avvia Lando:

```bash
lando start
```

Apri nel browser l’URL fornito da:

```bash
lando info
```

---

### 10) Aggiungere un database (MySQL/MariaDB)

Esempio `.lando.yml` con database:

```yaml
name: php-db-project
recipe: php
config:
  webroot: .
  php: '8.2'

services:
  database:
    type: mariadb:10.6

tooling:
  mysql:
    service: database
    cmd: mysql -uroot
```

Poi:

```bash
lando start
lando mysql
```

---

### 11) Collegamento PHP a database (PDO)

Esempio di connessione:

```php
<?php

$host = "database";
$dbname = "lando";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    echo "Connessione OK!";
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}
```

Nota importante:

* **host = database** perché è il nome del servizio Lando

---

### 12) Attivare Xdebug (debug PHP)

Esempio `.lando.yml`:

```yaml
name: php-debug
recipe: php
config:
  php: '8.2'
  webroot: .
  xdebug: true
```

Poi riavvia:

```bash
lando restart
```

---

### 13) Comandi utili da ricordare

| Comando          | Funzione             |
| ---------------- | -------------------- |
| `lando start`    | avvia l’ambiente     |
| `lando stop`     | ferma l’ambiente     |
| `lando restart`  | riavvia              |
| `lando destroy`  | elimina container    |
| `lando info`     | mostra URL e servizi |
| `lando ssh`      | entra nel container  |
| `lando php`      | esegue PHP           |
| `lando composer` | esegue Composer      |

---

### 14) Vantaggi didattici di Lando

* ambiente **standard** per tutti gli studenti
* niente configurazioni manuali su Apache/PHP/MySQL
* facile cambiare versione PHP
* permette di insegnare concetti moderni di **containerizzazione**
* adatto a Laravel, Symfony, WordPress, Drupal

---

## Esercizio didattico (consigliato)

1. Creare progetto `php-lando-esercizio`
2. Configurare `.lando.yml` con PHP 8.2
3. Creare `index.php` che stampa:

   * data e ora corrente
   * versione PHP
4. Aggiungere MariaDB e creare tabella `studenti`
5. Scrivere script PHP che inserisce e legge studenti da DB

