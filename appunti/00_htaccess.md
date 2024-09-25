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

---

## Esempio

```text
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

Il file `.htaccess` è utilizzato per configurare a livello di directory il comportamento del server web Apache. Le istruzioni che hai fornito fanno parte di una configurazione comune per gestire le richieste di URL tramite un unico file di front controller, spesso usato in applicazioni PHP che seguono l'architettura MVC.

### **Spiegazione delle Istruzioni**

#### **1. `RewriteEngine On`**

Questa direttiva abilita il modulo di riscrittura (`mod_rewrite`) di Apache. Il modulo permette di riscrivere gli URL in base a regole definite, consentendo la creazione di URL "puliti" e l'instradamento delle richieste a specifici script PHP.

#### **2. `RewriteCond %{REQUEST_FILENAME} !-f`**

Questa è una **condizione di riscrittura** che viene valutata prima della regola successiva (`RewriteRule`). La condizione controlla se il file richiesto **non** esiste fisicamente sul server.

- **`%{REQUEST_FILENAME}`** rappresenta il percorso completo del file richiesto.
- **`!-f`** significa "se non esiste un file fisico". Quindi, questa condizione è vera solo se il file specificato nell'URL non esiste.

#### **3. `RewriteCond %{REQUEST_FILENAME} !-d`**

Simile alla condizione precedente, ma controlla se la richiesta non corrisponde a una directory.

- **`%{REQUEST_FILENAME}`** rappresenta il percorso completo della directory richiesta.
- **`!-d`** significa "se non esiste una directory fisica". Questa condizione è vera solo se la directory specificata nell'URL non esiste.

#### **4. `RewriteRule ^(.*)$ index.php [QSA,L]`**

Questa è la regola di riscrittura vera e propria. Dice ad Apache come riscrivere l'URL quando le condizioni precedenti sono soddisfatte.

- **`^(.*)$`**: Questo è un'espressione regolare che cattura qualsiasi stringa dopo il nome del dominio. `^(.*)$` corrisponde a qualsiasi URL.
- **`index.php`**: Se la richiesta non corrisponde a un file o a una directory esistente, la richiesta viene riscritta per essere gestita da `index.php`.
- **`[QSA,L]`**:
  - **`QSA`** (Query String Append): Se nell'URL originale era presente una query string (es. `?id=123`), questa viene mantenuta e aggiunta alla query string di destinazione.
  - **`L`** (Last): Indica che questa è l'ultima regola da applicare. Una volta applicata questa regola, Apache non considera ulteriori regole di riscrittura.

### **Cosa fa il codice nel contesto MVC?**

Queste regole sono comunemente usate in applicazioni MVC per inviare tutte le richieste a un singolo punto di ingresso (`index.php`), che funge da front controller.

- **Gestione centralizzata**: In un'applicazione MVC, tutte le richieste (ad esempio `https://tuosito.com/prodotti/dettaglio/5`) vengono reindirizzate a `index.php`. Da lì, il codice PHP può analizzare l'URL, caricare il controller e l'azione corretti, e infine restituire la risposta appropriata.
  
- **URL puliti**: L'uso di `.htaccess` consente di creare URL puliti e user-friendly, senza estensioni di file o parametri query string visibili.

### **Esempio di Flusso:**

1. L'utente richiede `https://tuosito.com/prodotti/dettaglio/5`.
2. Apache controlla se il file o la directory corrispondente esistono fisicamente:
   - Se esistono, Apache serve il file o la directory.
   - Se non esistono, Apache riscrive l'URL per essere gestito da `index.php`.
3. `index.php` riceve la richiesta e decide come elaborarla (ad esempio, potrebbe estrarre il controller `prodotti`, l'azione `dettaglio`, e l'ID `5` per visualizzare un prodotto specifico).

---

L'istruzione `Options -Indexes` nel file `.htaccess` viene utilizzata per disabilitare l'indicizzazione delle directory su un server web Apache.

### **Spiegazione di `Options -Indexes`**

- **`Options`**: Questa direttiva configura varie opzioni per la directory in cui è posizionata o per le sue sottodirectory.

- **`-Indexes`**: Il segno meno `-` disabilita un'opzione specifica, in questo caso `Indexes`.

#### **Cosa fa `Indexes`?**

Quando l'opzione `Indexes` è attivata, Apache permette l'elenco dei file contenuti in una directory se non esiste un file di indice (come `index.php`, `index.html`, ecc.) in quella directory.

Se un utente tenta di accedere a una directory del sito web, ad esempio `https://tuosito.com/uploads/`, e non c'è un file di indice, il server mostra un elenco di tutti i file contenuti in quella directory.

#### **Effetto di `Options -Indexes`**

Impostando `Options -Indexes`, si disabilita questa funzionalità. Questo significa che se un utente tenta di accedere a una directory che non ha un file di indice, invece di vedere l'elenco dei file, riceverà un errore "403 Forbidden". Questo è utile per motivi di sicurezza, poiché impedisce agli utenti di esplorare direttamente la struttura delle directory del server, proteggendo così i file sensibili.

### **Esempio di Comportamento**

- **Senza `Options -Indexes`:**
  - L'utente accede a `https://tuosito.com/uploads/`.
  - Se non c'è un file `index.html` o `index.php` nella directory, il server mostra l'elenco di tutti i file presenti.

- **Con `Options -Indexes`:**
  - L'utente accede a `https://tuosito.com/uploads/`.
  - Se non c'è un file di indice, il server restituisce un errore "403 Forbidden", impedendo la visualizzazione dei file.

### **Motivi per Utilizzare `Options -Indexes`**

- **Sicurezza**: Previene l'esposizione non autorizzata di file all'interno delle directory.
- **Controllo**: Permette di mantenere il controllo su quali file vengono mostrati agli utenti e come.
  
Utilizzare `Options -Indexes` è una buona pratica per migliorare la sicurezza di un sito web, specialmente in directory che potrebbero contenere file riservati o sensibili.
