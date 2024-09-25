# Gestione delle Dipendenze

### **Composer: Cos'è e come si usa**

**Composer** è un gestore di pacchetti per PHP che facilita la gestione delle dipendenze di un progetto. Con Composer, puoi includere librerie di terze parti, mantenere aggiornate le dipendenze e caricare automaticamente le classi nel progetto tramite l'autoloading.

Composer non si occupa solo di installare pacchetti, ma tiene traccia delle versioni, permette di gestire librerie specifiche per il tuo progetto, e crea un ambiente di sviluppo più organizzato e modulare.

---

### **Caratteristiche Principali di Composer**

1. **Gestione delle dipendenze**: Composer permette di definire, installare e aggiornare le librerie richieste dal progetto.
2. **Versionamento preciso**: Con Composer, puoi specificare esattamente le versioni delle librerie di cui hai bisogno, riducendo i rischi di incompatibilità.
3. **Autoloading automatico**: Composer semplifica il caricamento automatico delle classi PHP tramite il file `autoload.php`, riducendo la necessità di `require` o `include` manuali.
4. **Repository centrale**: Composer utilizza **Packagist** come repository principale per trovare pacchetti disponibili. Puoi cercare e installare librerie direttamente da Packagist.
5. **Configurazione centralizzata**: Il file `composer.json` è il cuore di Composer, dove vengono definite le dipendenze, i metadati del progetto e altre impostazioni utili.

---

### **Come Installare Composer**

Composer può essere installato globalmente o per un singolo progetto. Segui questi passaggi per installarlo globalmente:

1. Apri il terminale.
2. Esegui i seguenti comandi per scaricare Composer:

   ```bash
   php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
   php composer-setup.php
   php -r "unlink('composer-setup.php');"
   ```

3. Per usarlo globalmente, sposta il file eseguibile:

   ```bash
   sudo mv composer.phar /usr/local/bin/composer
   ```

   Ora puoi eseguire Composer semplicemente con il comando:

   ```bash
   composer
   ```

---

### **Iniziare un Progetto con Composer**

Per iniziare a utilizzare Composer in un progetto, devi prima creare il file `composer.json`, che conterrà tutte le informazioni necessarie sulle dipendenze del progetto.

1. Vai nella cartella del tuo progetto e inizializza Composer:

   ```bash
   composer init
   ```

   Questo comando ti guiderà nella creazione di un file `composer.json`.

2. Durante l'inizializzazione, ti verranno chieste informazioni come:
   - Nome del progetto
   - Descrizione
   - Autori
   - Tipo di licenza
   - Dipendenze richieste

3. Una volta creato il file `composer.json`, puoi installare le dipendenze usando:

   ```bash
   composer install
   ```

---

### **Il File `composer.json`**

Il file `composer.json` è fondamentale per configurare le dipendenze e impostazioni del progetto. Un esempio di file `composer.json`:

```json
{
    "name": "nomeutente/nomeprogetto",
    "description": "Descrizione del progetto",
    "require": {
        "monolog/monolog": "^2.0"
    },
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```

- **`name`**: Nome del progetto in formato `vendor/package`.
- **`description`**: Breve descrizione del progetto.
- **`require`**: Le dipendenze necessarie (come librerie di terze parti).
- **`autoload`**: Definisce le regole per il caricamento automatico delle classi. In questo caso, usa lo standard **PSR-4** e dice a Composer che le classi nello spazio dei nomi `App\` si trovano nella cartella `src/`.

---

### **Gestione delle Dipendenze**

Dopo aver aggiunto una libreria nel file `composer.json` sotto la chiave `require`, puoi installarla con:

```bash
composer install
```

Questo comando:

- Scarica le librerie definite nel file `composer.json`.
- Crea la cartella `vendor/`, dove vengono memorizzate tutte le librerie.
- Genera un file `composer.lock`, che tiene traccia delle versioni esatte delle dipendenze installate per garantire che l'ambiente di sviluppo e produzione usino le stesse versioni.

#### **Aggiornare le dipendenze**

Per aggiornare le librerie alle versioni più recenti, usa:

```bash
composer update
```

---

### **Autoload in Composer**

Una delle funzionalità più potenti di Composer è l'autoloading delle classi. Questo significa che non è necessario includere manualmente i file delle classi. Composer si occupa di caricarle automaticamente ogni volta che vengono utilizzate.

#### **PSR-4 Autoloading**

PSR-4 è uno standard che definisce come mappare spazi dei nomi ai percorsi delle classi.

Nel file `composer.json` puoi configurare l'autoloading PSR-4 come segue:

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```

Questo dice a Composer che qualsiasi classe nello spazio dei nomi `App\` può essere trovata nella cartella `src/`. Ad esempio:

- La classe `App\Controllers\HomeController` verrà cercata in `src/Controllers/HomeController.php`.

Dopo aver configurato l'autoload, esegui:

```bash
composer dump-autoload
```

Questo comando genera il file `vendor/autoload.php`, che carica automaticamente le classi. Per utilizzare l'autoload, basta includere `autoload.php` all'inizio del tuo script:

```php
require_once __DIR__ . '/vendor/autoload.php';
```

### **Esempio di Progetto con Autoload**

Struttura del progetto:

```
- src/
  - Controllers/
    - HomeController.php
- public/
  - index.php
- composer.json
- vendor/
```

1. **File `composer.json`**

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```

2. **Classe HomeController**

```php
<?php
// src/Controllers/HomeController.php
namespace App\Controllers;

class HomeController {
    public function index() {
        echo "Benvenuto nella Home!";
    }
}
```

3. **File `index.php`**

```php
<?php
// public/index.php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;

$controller = new HomeController();
$controller->index();
```

Dopo aver eseguito il comando `composer dump-autoload`, il sistema sarà pronto per caricare automaticamente le classi.

---

### **Comandi Utili di Composer**

- **Installare le dipendenze**: `composer install`
- **Aggiornare le dipendenze**: `composer update`
- **Generare l'autoload**: `composer dump-autoload`
- **Verificare le dipendenze**: `composer show`
- **Rimuovere una dipendenza**: `composer remove nomepacchetto`
- **Aggiungere una dipendenza**: `composer require nomepacchetto`

---

### **Conclusione**

Composer è uno strumento essenziale per la gestione delle dipendenze in PHP. Facilita l'integrazione di librerie di terze parti e la gestione dei loro aggiornamenti, semplifica il caricamento delle classi e rende lo sviluppo più organizzato e modulare. Con l'autoloading, Composer elimina la necessità di includere manualmente ogni file, rendendo lo sviluppo più fluido e mantenibile.

---

Ci sono molte librerie, framework e componenti PHP tra cui scegliere. Il tuo progetto probabilmente utilizzerà molte di esse - sono dipendenze del progetto.

Fino a poco tempo fa, PHP non aveva un buon modo per gestire queste dipendenze del progetto. Anche se le gestivi manualmente, dovevi comunque preoccuparti dei caricatori automatici.

Attualmente, ci sono due principali sistemi di gestione dei pacchetti per PHP: [Composer] e [PEAR].

**Composer** è attualmente il gestore di pacchetti più popolare per PHP. Tuttavia, per molto tempo, **PEAR** è stato il gestore di pacchetti principale in uso.

Conoscere la storia di PEAR è una buona idea, poiché potresti ancora trovare riferimenti ad essa anche se non la usi mai.

---

## Composer e Packagist

Composer è un **brillante** gestore delle dipendenze per PHP. Elenca le dipendenze del tuo progetto in un file `composer.json` e, con pochi semplici comandi, Composer scaricherà automaticamente le dipendenze del tuo progetto e configurerà il caricamento automatico per te. Composer è analogo a **NPM** nel mondo **node.js** o Bundler nel mondo Ruby.

Esistono già molte librerie PHP compatibili con Composer, pronte per essere utilizzate nel tuo progetto. Questi "pacchetti" sono elencati su [Packagist](http://packagist.org/), il repository ufficiale per le librerie PHP compatibili con Composer.

---

### Come installare Composer

Il modo più sicuro per scaricare Composer è [seguendo le istruzioni ufficiali](https://getcomposer.org/download/).

Ciò verificherà che il programma di installazione non sia danneggiato o manomesso.

Il programma di installazione installa Composer *localmente*, nella directory di lavoro corrente.

Ti consigliamo di installarlo *globalmente* (ad esempio una singola copia in `/usr/local/bin`) - per farlo, esegui il comando seguente:

```console
mv composer.phar /usr/local/bin/composer
```

**Nota:** Se il comando sopra fallisce a causa dei permessi, aggiungi il prefisso `sudo`.

Per eseguire un Composer installato localmente dovresti usare `php composer.phar`, mentre per quello installato globalmente è sufficiente usare `composer`
---

#### Installare su Windows

Per gli utenti Windows, il modo più semplice per essere operativi è utilizzare il programma di installazione [ComposerSetup], che
esegue un'installazione globale e imposta il tuo `$ PATH` in modo che tu possa semplicemente chiamare` composer` da qualsiasi file
directory nella riga di comando.

---

### Installare Composer (manualmente)

L'installazione manuale di Composer è una tecnica avanzata; tuttavia, ci sono vari motivi per cui a
lo sviluppatore potrebbe preferire questo metodo rispetto all'utilizzo della routine di installazione interattiva. L'interattivo
l'installazione controlla l'installazione di PHP per garantire che:

- viene utilizzata una versione sufficiente di PHP
- I file `.phar` possono essere eseguiti correttamente
- sono sufficienti determinati permessi di directory
- alcune estensioni problematiche non vengono caricate
- alcune impostazioni di `php.ini` sono impostate

Poiché un'installazione manuale non esegue nessuno di questi controlli, è necessario decidere se il compromesso "vale la pena" per te. Pertanto, di seguito è riportato come ottenere Composer manualmente:

`{lang="console"}`

`curl -s https://getcomposer.org/composer.phar -o $HOME/local/bin/composer`
`chmod +x $HOME/local/bin/composer`


Il percorso `$ HOME / local / bin` (o una directory a tua scelta) dovrebbe essere nel tuo ambiente` $ PATH`
variabile. Ciò risulterà nella disponibilità di un comando `composer`.

Quando ti imbatti nella documentazione che afferma di eseguire Composer come `php composer.phar install`, puoi farlo sostituiscilo con:

`{lang="console"}`

`composer install`


This section will assume you have installed composer globally.

---

### Come definire ed installare le Dependencies

Composer tiene traccia delle dipendenze del tuo progetto in un file chiamato `composer.json`. Puoi gestirlo a mano se vuoi, o usa lo stesso Composer. 

Il comando `composer require` aggiunge una dipendenza dal progetto
e se non hai un file `composer.json`, ne verrà creato uno. Ecco un esempio che aggiunge [Twig] come dipendenza del tuo progetto.

`{lang="console"}`

`composer require twig/twig:~1.8`

---

In alternativa, il comando `composer init` ti guiderà attraverso la creazione di un file completo` composer.json` per il tuo progetto. 

In ogni caso, una volta creato il file `composer.json` puoi dire a Composer di farlo
scarica e installa le tue dipendenze nella directory `vendor /`. 

Questo vale anche per i progetti che hai scaricato che fornisce già un file `composer.json`:


`{lang="console"}`

`composer install`


Successivamente, aggiungi questa riga al file PHP principale della tua applicazione; questo dirà a PHP di usare Composer's
caricatore automatico per le dipendenze del progetto.


`{lang="php"}`

`<?php require 'vendor/autoload.php';?>`


Ora puoi usare le dipendenze del tuo progetto e verranno caricate automaticamente su richiesta.

---

### Aggiornare le dependencies

Composer crea un file chiamato `composer.lock` che memorizza la versione esatta di ogni pacchetto scaricato la prima volta che hai eseguito `composer install`. 

Se condividi il tuo progetto con altri, assicurati che il file `composer.lock` sia incluso, in modo che quando eseguono` composer install` lo faranno
ottenere le stesse versioni di te. 

Per aggiornare le tue dipendenze, esegui `composer update`. 
Non usare `composer update` durante la distribuzione, solo` composer install`, altrimenti potresti ritrovarti con un file versioni del pacchetto in produzione.

Ciò è particolarmente utile quando si definiscono i requisiti della versione in modo flessibile. 

Ad esempio, una versione requisito di "~ 1.8" significa "qualsiasi cosa più recente di" 1.8.0 ", ma minore di" 2.0.x-dev "". 

Puoi anche usare il carattere jolly "*" come in "1.8. *". 

Ora il comando `composer update` di Composer aggiornerà tutti i tuoi file
dipendenze dalla versione più recente che si adatta alle restrizioni definite.

---


### ricevere notifiche

Per ricevere notifiche sui nuovi rilasci di versioni è possibile iscriversi a [VersionEye], un servizio web che può monitorare i tuoi account GitHub e BitBucket per i file `composer.json` e inviare e-mail con nuove versioni dei pacchetti.

### Controllare le didendenze e le issues di sicurezza

Il **[Security Advisories Checker]** è un servizio web e uno strumento da riga di comando, entrambi esamineranno il tuo `composer.lock` file e dirti se devi aggiornare le tue dipendenze.

---


### Gestire le dipendenze globali con Composer

Composer può anche gestire le dipendenze globali e i loro binari. L'utilizzo è semplice, tutto ciò di cui hai bisogno
da fare è anteporre al comando "global". Se ad esempio volessi installare PHPUnit e averlo
disponibile a livello globale, dovresti eseguire il seguente comando:


`{lang="console"}`

`composer global require phpunit/phpunit`


Questo creerà una cartella `~ / .composer` dove risiedono le tue dipendenze globali. Per avere installato
binari dei pacchetti disponibili ovunque, dovresti quindi aggiungere la cartella `~ / .composer / vendor / bin` al tuo file
Variabile "$ PATH".

---

## Altro su Composer

* [Packagist](http://packagist.org/)
* [Learn about Composer](http://getcomposer.org/doc/00-intro.md)
* [ComposerSetup](https://getcomposer.org)
