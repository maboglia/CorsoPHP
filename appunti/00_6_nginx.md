# Nginx con PHP: Guida Essenziale

**Nginx** è un server web ad alte prestazioni, spesso utilizzato in combinazione con PHP per gestire applicazioni dinamiche come WordPress, Laravel e molte altre. A differenza di Apache, Nginx non utilizza moduli per eseguire PHP direttamente, ma funge da proxy per un processo separato chiamato **PHP-FPM** (FastCGI Process Manager). 

In questa guida, vedremo come configurare **Nginx** per lavorare con PHP, utilizzando **PHP-FPM** per eseguire i file PHP in modo efficiente.

---

## Vantaggi di Nginx con PHP

- **Performance**: Nginx è noto per la sua efficienza nel gestire un alto numero di richieste simultanee grazie all'architettura asincrona e non bloccante.
- **Gestione del traffico statico/dinamico**: Nginx gestisce il traffico statico come file HTML, CSS, JS in modo molto efficiente, delegando a PHP-FPM solo le richieste dinamiche.
- **Facilità di configurazione**: Pur essendo potente, la configurazione di Nginx è semplice e flessibile, permettendo una facile gestione delle risorse.

---

## Installazione di Nginx e PHP-FPM

### 1. Installazione di Nginx
Per installare Nginx su un server Linux (es. Ubuntu/Debian):

```bash
sudo apt update
sudo apt install nginx
```

### 2. Installazione di PHP e PHP-FPM

Per eseguire il codice PHP, è necessario installare **PHP-FPM** (FastCGI Process Manager), che gestisce i processi PHP separatamente da Nginx.

```bash
sudo apt install php php-fpm
```

In genere, PHP-FPM viene installato automaticamente con il pacchetto `php`. Se si desidera una versione specifica di PHP (es. PHP 8.0), è possibile specificarla:

```bash
sudo apt install php8.0 php8.0-fpm
```

---

## Configurazione di Nginx per PHP

Una volta installati Nginx e PHP-FPM, dobbiamo configurare Nginx per gestire le richieste PHP.

### 1. Modifica della configurazione di Nginx

Il file di configurazione principale di Nginx si trova in `/etc/nginx/nginx.conf`, ma le configurazioni specifiche per i siti web sono generalmente posizionate in `/etc/nginx/sites-available/` (con link simbolici in `/etc/nginx/sites-enabled/`).

Modifichiamo la configurazione del nostro sito. Creiamo o modifichiamo il file di configurazione per il nostro dominio (esempio `/etc/nginx/sites-available/miosito.com`).

Ecco un esempio di configurazione di base per far funzionare PHP con Nginx:

```nginx
server {
    listen 80;
    server_name miosito.com www.miosito.com;
    root /var/www/miosito.com/public;

    index index.php index.html index.htm;

    # Gestione delle richieste PHP
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;  # Specificare il percorso corretto per PHP-FPM
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Gestione degli errori
    error_log /var/log/nginx/miosito_error.log;
    access_log /var/log/nginx/miosito_access.log;

    # Blocco accesso ai file sensibili
    location ~ /\.ht {
        deny all;
    }
}
```

### Spiegazione della Configurazione:

- **listen 80**: Il server ascolta sulla porta 80 (HTTP).
- **server_name**: Il dominio che Nginx servirà (es. `miosito.com`).
- **root**: Directory radice del sito web.
- **index**: La priorità dei file da servire quando si accede a una directory (come `index.php` o `index.html`).
- **location ~ \.php$**: Blocca che gestisce le richieste PHP.
  - **include snippets/fastcgi-php.conf**: Include una configurazione predefinita per PHP-FPM.
  - **fastcgi_pass**: Invia le richieste PHP al socket di PHP-FPM.
  - **fastcgi_param SCRIPT_FILENAME**: Passa il percorso corretto del file PHP a PHP-FPM.
- **location ~ /\.ht**: Blocca l'accesso ai file `.htaccess` (che Nginx non utilizza) per motivi di sicurezza.

### 2. Creare il link simbolico

Una volta creata la configurazione, attiviamola creando un link simbolico in `/etc/nginx/sites-enabled/`:

```bash
sudo ln -s /etc/nginx/sites-available/miosito.com /etc/nginx/sites-enabled/
```

### 3. Test della configurazione

Prima di riavviare Nginx, assicurati che la configurazione non contenga errori:

```bash
sudo nginx -t
```

Se il test è positivo, riavviamo Nginx:

```bash
sudo systemctl restart nginx
```

---

## Ottimizzazione di PHP-FPM

Dopo aver configurato Nginx, è consigliabile ottimizzare PHP-FPM per il carico che ci si aspetta. La configurazione di PHP-FPM si trova solitamente in `/etc/php/8.0/fpm/pool.d/www.conf`.

Alcuni parametri da considerare:

- **pm.max_children**: Numero massimo di processi che PHP-FPM può avviare.
- **pm.start_servers**: Numero di processi che PHP-FPM avvierà inizialmente.
- **pm.min_spare_servers**: Numero minimo di processi inattivi in attesa di nuove richieste.
- **pm.max_spare_servers**: Numero massimo di processi inattivi in attesa di nuove richieste.

Questi parametri dovrebbero essere configurati in base alle risorse del server e al carico previsto.

---

## Testare PHP

Crea un semplice file `info.php` nella directory del tuo sito per verificare che PHP funzioni correttamente:

```php
<?php
phpinfo();
```

Accedi a questo file tramite il tuo browser: `http://miosito.com/info.php`. Se tutto è configurato correttamente, vedrai la pagina delle informazioni di PHP.

---

## Conclusione

Nginx con PHP-FPM è una combinazione estremamente potente per servire applicazioni web PHP in modo efficiente. Con una configurazione adeguata, Nginx può gestire un numero elevato di richieste simultanee, garantendo performance elevate e stabilità.