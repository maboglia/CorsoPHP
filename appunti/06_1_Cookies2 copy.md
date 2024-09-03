# Cookie
### PHP: Gestione dei Cookie

I cookie sono piccoli file di testo che vengono salvati nel computer dell'utente per memorizzare informazioni utili durante la navigazione su un sito web. In PHP, la gestione dei cookie è un'operazione piuttosto semplice e coinvolge principalmente l'uso di due funzioni principali: `setcookie()` e `$_COOKIE`.

#### 1. **Creazione di un Cookie**

Per creare un cookie in PHP, si utilizza la funzione `setcookie()`. Questa funzione deve essere chiamata **prima** di qualsiasi output HTML, poiché i cookie vengono inviati nell'intestazione HTTP.

**Sintassi di `setcookie()`:**
```php
bool setcookie(string $name, string $value = "", int $expires = 0, string $path = "", string $domain = "", bool $secure = false, bool $httponly = false);
```

- **$name**: Il nome del cookie.
- **$value**: Il valore del cookie.
- **$expires**: La data di scadenza del cookie (in timestamp Unix). Se omesso o impostato a `0`, il cookie sarà valido solo per la sessione corrente.
- **$path**: Il percorso sul server in cui il cookie è disponibile. Se omesso, il valore predefinito è la directory corrente.
- **$domain**: Il dominio in cui il cookie è disponibile.
- **$secure**: Se impostato a `true`, il cookie sarà inviato solo tramite una connessione HTTPS.
- **$httponly**: Se impostato a `true`, il cookie sarà accessibile solo tramite il protocollo HTTP, non tramite JavaScript.

**Esempio di Creazione di un Cookie:**
```php
setcookie("username", "Mario", time() + 3600, "/"); // Scadenza tra un'ora
```

#### 2. **Accesso ai Cookie**

Una volta che un cookie è stato impostato, esso sarà disponibile per tutte le richieste successive fino alla sua scadenza. I cookie possono essere acceduti utilizzando la superglobale `$_COOKIE`.

**Esempio di Accesso a un Cookie:**
```php
if(isset($_COOKIE['username'])) {
    echo "Ciao " . $_COOKIE['username'];
} else {
    echo "Utente non riconosciuto";
}
```

#### 3. **Modifica di un Cookie**

Per modificare un cookie, basta chiamare nuovamente `setcookie()` con lo stesso nome del cookie e specificare un nuovo valore o altre opzioni. La modifica del valore di un cookie è sostanzialmente identica alla sua creazione.

**Esempio di Modifica di un Cookie:**
```php
setcookie("username", "Luigi", time() + 3600, "/");
```

#### 4. **Cancellazione di un Cookie**

Per cancellare un cookie, si può impostare la sua data di scadenza a un tempo passato, tipicamente a `time() - 3600`.

**Esempio di Cancellazione di un Cookie:**
```php
setcookie("username", "", time() - 3600, "/");
```

#### 5. **Considerazioni sulla Sicurezza**

- **Cookie Sicuri**: Se il sito utilizza HTTPS, è consigliabile impostare il parametro `$secure` a `true` per garantire che il cookie venga trasmesso solo su connessioni sicure.
- **HttpOnly**: Impostare `$httponly` a `true` aiuta a proteggere i cookie da accessi JavaScript, prevenendo attacchi XSS.
- **SameSite**: Un altro parametro importante (introdotto nelle versioni più recenti di PHP) è `SameSite`, che può essere impostato per mitigare attacchi CSRF.

```php
setcookie("username", "Mario", time() + 3600, "/", "", true, true); // Secure e HttpOnly
```

### Conclusioni

La gestione dei cookie in PHP è un processo essenziale per memorizzare e recuperare informazioni sull'utente, utile per sessioni di login, preferenze dell'utente, e altre funzioni di personalizzazione. Tuttavia, è importante gestire i cookie in modo sicuro per proteggere i dati degli utenti e prevenire vulnerabilità.