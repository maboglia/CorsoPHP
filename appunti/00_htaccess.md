# Apache `.htaccess`

Il file `.htaccess` è un file di configurazione utilizzato da Apache per definire specifiche direttive di configurazione a livello di directory. Può essere usato per una varietà di scopi, come gestire i permessi, abilitare la riscrittura degli URL, proteggere directory, abilitare la compressione e molto altro.

### Configurazioni utili per `.htaccess`

Di seguito alcune delle configurazioni più comuni e utili che puoi usare nel file `.htaccess` per migliorare il comportamento e la sicurezza del tuo sito web.

---

### 1. **Impostare una pagina di errore personalizzata**

Puoi utilizzare il file `.htaccess` per definire pagine di errore personalizzate per vari codici di errore HTTP, come 404 (pagina non trovata) o 500 (errore del server).

```apache
ErrorDocument 404 /404.html
ErrorDocument 500 /500.html
```

- **404**: Pagina non trovata.
- **500**: Errore interno del server.

---

### 2. **Riscrittura degli URL (URL rewriting)**

Una delle funzionalità più potenti del file `.htaccess` è la riscrittura degli URL, comunemente usata per creare URL più puliti e SEO-friendly.

Per abilitare la riscrittura degli URL, devi avere il modulo `mod_rewrite` abilitato in Apache. Puoi attivarlo con il seguente comando su sistemi Linux:

```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

Ecco un esempio di riscrittura degli URL che trasforma un URL complesso in uno più leggibile:

```apache
RewriteEngine On
RewriteRule ^prodotti/([0-9]+)/?$ prodotti.php?id=$1 [L]
```

In questo esempio:
- L'URL `https://tuosito.com/prodotti/123` verrà riscritto come `https://tuosito.com/prodotti.php?id=123`.

---

### 3. **Reindirizzamenti (301, 302)**

Puoi utilizzare `.htaccess` per configurare i reindirizzamenti permanenti (301) o temporanei (302).

#### Reindirizzamento permanente (301):

```apache
Redirect 301 /vecchia-pagina.html /nuova-pagina.html
```

In questo esempio, la pagina `vecchia-pagina.html` viene reindirizzata in modo permanente a `nuova-pagina.html`.

#### Reindirizzamento temporaneo (302):

```apache
Redirect 302 /vecchia-pagina.html /nuova-pagina-temporanea.html
```

---

### 4. **Protezione tramite password (Autenticazione HTTP Basic)**

Puoi proteggere una directory con una password usando `.htaccess` e un file `.htpasswd`:

1. Crea un file `.htpasswd` con username e password criptate.
2. Aggiungi queste righe al file `.htaccess` nella directory che vuoi proteggere:

```apache
AuthType Basic
AuthName "Area Riservata"
AuthUserFile /percorso/assoluto/del/.htpasswd
Require valid-user
```

---

### 5. **Impedire l'accesso a specifici file o directory**

Per proteggere file sensibili, puoi bloccare l'accesso tramite `.htaccess`. Ad esempio, puoi bloccare l'accesso al file `.htaccess` stesso o ad altri file di sistema:

```apache
<Files .htaccess>
    Order allow,deny
    Deny from all
</Files>

<FilesMatch "\.(ini|log|sh|php)$">
    Order allow,deny
    Deny from all
</FilesMatch>
```

In questo esempio, l'accesso ai file `.ini`, `.log`, `.sh`, e `.php` viene negato.

---

### 6. **Disabilitare la visualizzazione del contenuto della directory (Directory Listing)**

Se una directory non contiene un file `index.html` o `index.php`, Apache può mostrare l'elenco dei file nella directory. Puoi disabilitare questa funzionalità per motivi di sicurezza:

```apache
Options -Indexes
```

---

### 7. **Abilitare la compressione Gzip**

Abilitare la compressione Gzip può migliorare le prestazioni del tuo sito riducendo la dimensione dei file inviati al browser.

```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
</IfModule>
```

In questo modo, i file HTML, CSS, JS e XML verranno compressi prima di essere inviati al browser.

---

### 8. **Impostare le regole di cache del browser**

Puoi migliorare le prestazioni del sito abilitando la cache del browser per file statici come immagini, CSS, e JavaScript:

```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/pdf "access plus 1 month"
    ExpiresByType text/javascript "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

In questo esempio:
- Le immagini saranno memorizzate nella cache per un anno.
- I file CSS e JS saranno memorizzati nella cache per un mese.

---

### 9. **Limitare l'accesso per indirizzo IP**

Puoi limitare l'accesso al sito o a specifiche directory in base agli indirizzi IP:

```apache
Order Deny,Allow
Deny from all
Allow from 192.168.1.100
Allow from 203.0.113.0/24
```

In questo esempio, l'accesso è consentito solo a indirizzi IP specifici, mentre tutti gli altri sono bloccati.

---

### 10. **Impostare un file index diverso**

Per impostazione predefinita, Apache cerca un file `index.html` o `index.php` come file predefinito in una directory. Puoi personalizzare il file index utilizzando `.htaccess`:

```apache
DirectoryIndex home.php index.html index.php
```

In questo caso, Apache cercherà prima `home.php`, poi `index.html`, e infine `index.php`.

---

### 11. **Proteggere le directory con HTTPS**

Puoi forzare l'uso di HTTPS per migliorare la sicurezza del sito:

```apache
RewriteEngine On
RewriteCond %{HTTPS} !=on
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

Questo codice forza il reindirizzamento di tutte le richieste HTTP su HTTPS.

---

### 12. **Limitare la dimensione di upload di file**

Puoi limitare la dimensione massima dei file caricati utilizzando `.htaccess`, utile in ambienti condivisi dove non hai accesso al file `php.ini`:

```apache
php_value upload_max_filesize 10M
php_value post_max_size 10M
```

In questo esempio, la dimensione massima per l'upload di file è impostata su 10 MB.

---

### Conclusione

Il file `.htaccess` è un potente strumento per personalizzare il comportamento di Apache a livello di directory. Offre flessibilità per gestire reindirizzamenti, sicurezza, cache, compressione e molto altro senza dover modificare la configurazione globale del server. È particolarmente utile in ambienti di hosting condiviso, dove non si ha accesso diretto ai file di configurazione principali di Apache.