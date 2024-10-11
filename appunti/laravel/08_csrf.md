# Cross-Site Request Forgery

In Laravel, il **token CSRF** (Cross-Site Request Forgery) è un meccanismo di protezione per prevenire attacchi di tipo **CSRF** (Cross-Site Request Forgery). Il token viene utilizzato per garantire che le richieste HTTP provengano solo da fonti legittime, come il proprio sito web, e non da siti esterni o malintenzionati.

L'annotazione `@csrf` viene usata nei form HTML all'interno delle view in Laravel per generare automaticamente un campo nascosto contenente il token CSRF, che viene poi inviato insieme alla richiesta al server.

### Cosa fa `@csrf`?
Quando usi `@csrf` all'interno di un form in una view Blade, Laravel genera automaticamente un campo nascosto con un token univoco che rappresenta la sessione dell'utente corrente. Questo token viene inviato insieme ai dati del form e Laravel lo verifica lato server per assicurarsi che la richiesta provenga dal proprio sito e non da una fonte esterna.

Esempio:

```html
<form method="POST" action="/submit-form">
    @csrf
    <input type="text" name="name" placeholder="Nome">
    <button type="submit">Invia</button>
</form>
```

Laravel traduce `@csrf` in:

```html
<form method="POST" action="/submit-form">
    <input type="hidden" name="_token" value="token_unico_generato_da_laravel">
    <input type="text" name="name" placeholder="Nome">
    <button type="submit">Invia</button>
</form>
```

Qui, il campo nascosto `_token` contiene un valore unico che Laravel genera automaticamente e associa alla sessione dell'utente. Quando l'utente invia il form, questo token viene inviato insieme alla richiesta e Laravel verifica la sua validità per prevenire attacchi CSRF.

### Come funziona la protezione CSRF?

1. **Generazione del token**: Laravel genera un token CSRF per ogni sessione utente. Questo token è univoco e viene memorizzato nella sessione dell'utente.
   
2. **Iniezione del token**: Quando inserisci `@csrf` in un form, Laravel inserisce automaticamente il token CSRF come campo nascosto nel form HTML.
   
3. **Verifica del token**: Quando il form viene inviato, Laravel controlla se il token inviato con la richiesta corrisponde al token memorizzato nella sessione. Se corrisponde, la richiesta è considerata legittima e viene elaborata. Se non corrisponde o manca, la richiesta viene rifiutata con un errore **419 Page Expired**.

### Perché è importante il token CSRF?

Gli attacchi **CSRF** tentano di ingannare un utente autenticato inducendolo a eseguire un'azione non voluta su un sito di fiducia (come inviare un form o fare una richiesta di tipo POST) da un sito esterno malintenzionato.

Ad esempio, se un utente è loggato su un sito (come il tuo sito Laravel) e visita un sito malintenzionato, quest'ultimo potrebbe cercare di inviare una richiesta POST al tuo sito utilizzando i cookie dell'utente senza che l'utente ne sia consapevole. L'utilizzo del token CSRF impedisce a tali attacchi di avere successo, poiché solo il tuo sito può generare e verificare quel token.

### Dove è necessario `@csrf`?

`@csrf` è richiesto per tutte le richieste che modificano lo stato del server, come **POST**, **PUT**, **PATCH** o **DELETE**. Non è richiesto per le richieste di tipo **GET**, poiché le richieste GET non dovrebbero modificare i dati sul server secondo i principi REST.

### Riassunto:
- `@csrf` inserisce automaticamente un token CSRF nei form per prevenire attacchi di tipo Cross-Site Request Forgery.
- Laravel verifica la corrispondenza del token inviato con quello presente nella sessione dell'utente.
- Aiuta a proteggere le applicazioni Laravel da richieste non autorizzate che potrebbero compromettere la sicurezza del sito.

L'uso di `@csrf` è fondamentale per garantire la sicurezza delle applicazioni web e dovrebbe essere presente in ogni form che invia dati tramite POST, PUT, PATCH o DELETE.