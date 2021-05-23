# Dependency Management {#dependency_management_title}

Ci sono un sacco di librerie, framework e componenti PHP tra cui scegliere. Il tuo progetto probabilmente utilizzerà
molte di esse - sono dipendenze del progetto. Fino a poco tempo, PHP non aveva un buon modo per gestire
queste dipendenze del progetto. Anche se li gestivi manualmente, dovevi comunque preoccuparti dei caricatori automatici.
Non è più un problema.

Attualmente ci sono due principali sistemi di gestione dei pacchetti per PHP: [Composer] e [PEAR]. Il composer è attualmente
il gestore di pacchetti più popolare per PHP, tuttavia per molto tempo PEAR è stato il gestore di pacchetti principale in uso.
Conoscere la storia di PEAR è una buona idea, poiché potresti ancora trovare riferimenti ad essa anche se non la usi mai.
[Composer]: /#composer_and_packagist

## Composer and Packagist {#composer_and_packagist_title}

Composer è un **brillante** gestore delle dipendenze per PHP. Elenca le dipendenze del tuo progetto in un file `composer.json` e,
con pochi semplici comandi, Composer scaricherà automaticamente le dipendenze del tuo progetto e configurerà il caricamento automatico per
voi. Composer è analogo a NPM nel mondo node.js o Bundler nel mondo Ruby.

Esistono già molte librerie PHP compatibili con Composer, pronte per essere utilizzate nel tuo progetto. Questi
i "pacchetti" sono elencati su [Packagist], il repository ufficiale per le librerie PHP compatibili con Composer. 

### How to Install Composer

Il modo più sicuro per scaricare Composer è [seguendo le istruzioni ufficiali] (https://getcomposer.org/download/).
Ciò verificherà che il programma di installazione non sia danneggiato o manomesso.
Il programma di installazione installa Composer *localmente*, nella directory di lavoro corrente.

Ti consigliamo di installarlo *globalmente* (ad esempio una singola copia in / usr / local / bin) - per farlo, eseguilo in seguito:


`{lang="console"}`
`mv composer.phar /usr/local/bin/composer`


**Note:** Se quanto sopra fallisce a causa dei permessi, aggiungere il prefisso `sudo`.

Per eseguire un compositore installato localmente dovresti usare `php composer.phar`, globalmente è semplicemente` composer`.

#### Installing on Windows

Per gli utenti Windows, il modo più semplice per essere operativi è utilizzare il programma di installazione [ComposerSetup], che
esegue un'installazione globale e imposta il tuo `$ PATH` in modo che tu possa semplicemente chiamare` composer` da qualsiasi file
directory nella riga di comando.

### How to Install Composer (manually)

L'installazione manuale di Composer è una tecnica avanzata; tuttavia, ci sono vari motivi per cui a
lo sviluppatore potrebbe preferire questo metodo rispetto all'utilizzo della routine di installazione interattiva. L'interattivo
l'installazione controlla l'installazione di PHP per garantire che:

- viene utilizzata una versione sufficiente di PHP
- I file `.phar` possono essere eseguiti correttamente
- sono sufficienti determinati permessi di directory
- alcune estensioni problematiche non vengono caricate
- alcune impostazioni di `php.ini` sono impostate

Poiché un'installazione manuale non esegue nessuno di questi controlli, è necessario decidere se il compromesso è
ne vale la pena per te. Pertanto, di seguito è riportato come ottenere Composer manualmente:

`{lang="console"}`

`curl -s https://getcomposer.org/composer.phar -o $HOME/local/bin/composer`
`chmod +x $HOME/local/bin/composer`


Il percorso `$ HOME / local / bin` (o una directory a tua scelta) dovrebbe essere nel tuo ambiente` $ PATH`
variabile. Ciò risulterà nella disponibilità di un comando `composer`.

Quando ti imbatti nella documentazione che afferma di eseguire Composer come `php composer.phar install`, puoi farlo
sostituiscilo con:


`{lang="console"}`

`composer install`


This section will assume you have installed composer globally.

### How to Define and Install Dependencies

Composer tiene traccia delle dipendenze del tuo progetto in un file chiamato `composer.json`. Puoi gestirlo
a mano se vuoi, o usa lo stesso Composer. Il comando `composer require` aggiunge una dipendenza dal progetto
e se non hai un file `composer.json`, ne verrà creato uno. Ecco un esempio che aggiunge [Twig]
come dipendenza del tuo progetto.

`{lang="console"}`

`composer require twig/twig:~1.8`


In alternativa, il comando `composer init` ti guiderà attraverso la creazione di un file completo` composer.json`
per il tuo progetto. In ogni caso, una volta creato il file `composer.json` puoi dire a Composer di farlo
scarica e installa le tue dipendenze nella directory `vendor /`. Questo vale anche per i progetti
hai scaricato che fornisce già un file `composer.json`:


`{lang="console"}`

`composer install`


Successivamente, aggiungi questa riga al file PHP principale della tua applicazione; questo dirà a PHP di usare Composer's
caricatore automatico per le dipendenze del progetto.


`{lang="php"}`

`<?php require 'vendor/autoload.php';?>`


Ora puoi usare le dipendenze del tuo progetto e verranno caricate automaticamente su richiesta.

### Updating your dependencies

Composer crea un file chiamato `composer.lock` che memorizza la versione esatta di ogni pacchetto
scaricato la prima volta che hai eseguito `composer install`. Se condividi il tuo progetto con altri,
assicurati che il file `composer.lock` sia incluso, in modo che quando eseguono` composer install` lo faranno
ottenere le stesse versioni di te. Per aggiornare le tue dipendenze, esegui `composer update`. Non usare
`composer update` durante la distribuzione, solo` composer install`, altrimenti potresti ritrovarti con un file
versioni del pacchetto in produzione.

Ciò è particolarmente utile quando si definiscono i requisiti della versione in modo flessibile. Ad esempio, una versione
requisito di "~ 1.8" significa "qualsiasi cosa più recente di" 1.8.0 ", ma minore di" 2.0.x-dev "". Puoi anche usare
il carattere jolly "*" come in "1.8. *". Ora il comando `composer update` di Composer aggiornerà tutti i tuoi file
dipendenze dalla versione più recente che si adatta alle restrizioni definite.

### Update Notifications

Per ricevere notifiche sui nuovi rilasci di versioni è possibile iscriversi a [VersionEye], un servizio web
che può monitorare i tuoi account GitHub e BitBucket per i file `composer.json` e inviare e-mail con nuovi
versioni dei pacchetti.

### Checking your dependencies for security issues

Il [Security Advisories Checker] è un servizio web e uno strumento da riga di comando, entrambi esamineranno il tuo `composer.lock`
file e dirti se devi aggiornare le tue dipendenze.

### Handling global dependencies with Composer

Composer può anche gestire le dipendenze globali e i loro binari. L'utilizzo è semplice, tutto ciò di cui hai bisogno
da fare è anteporre al comando "global". Se ad esempio volessi installare PHPUnit e averlo
disponibile a livello globale, dovresti eseguire il seguente comando:


`{lang="console"}`

`composer global require phpunit/phpunit`


Questo creerà una cartella `~ / .composer` dove risiedono le tue dipendenze globali. Per avere installato
binari dei pacchetti disponibili ovunque, dovresti quindi aggiungere la cartella `~ / .composer / vendor / bin` al tuo file
Variabile "$ PATH".

* [Learn about Composer]

[Packagist]: http://packagist.org/
[Twig]: http://twig.sensiolabs.org
[VersionEye]: https://www.versioneye.com/
[Security Advisories Checker]: https://security.sensiolabs.org/
[Learn about Composer]: http://getcomposer.org/doc/00-intro.md
[ComposerSetup]: https://getcomposer.org/Composer-Setup.exe
