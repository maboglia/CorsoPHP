# Cookies in PHP: esempio pratico

L'esempio seguente mostra come utilizzare i cookie in PHP sia lato backend che frontend. Sul backend, imposteremo un cookie per tracciare l'ultima visita dell'utente. Sul frontend, mostreremo un avviso informando l'utente della presenza dei cookie.

### Struttura dei File

1. **index.php** - La pagina principale dove si imposta e si legge il cookie, e si visualizza un avviso sui cookie.
2. **cookie-consent.js** - Uno script JavaScript per gestire il consenso ai cookie.

### 1. **index.php**

Questo file gestisce i cookie e visualizza un messaggio di benvenuto basato sull'ultimo accesso dell'utente.

```php
<?php
// Imposta un cookie per l'ultima visita dell'utente
$cookie_name = "last_visit";
$cookie_value = date("Y-m-d H:i:s");
$cookie_expire = time() + (86400 * 30); // 30 giorni
$cookie_path = "/";

// Verifica se il cookie esiste già
$last_visit_message = '';
if (isset($_COOKIE[$cookie_name])) {
    $last_visit_message = "Bentornato! La tua ultima visita è stata il " . $_COOKIE[$cookie_name];
} else {
    $last_visit_message = "Benvenuto! Questa è la tua prima visita.";
}

// Imposta il cookie
setcookie($cookie_name, $cookie_value, $cookie_expire, $cookie_path);

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione dei Cookie in PHP</title>
    <style>
        .cookie-consent {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #222;
            color: #fff;
            text-align: center;
            padding: 15px;
            display: none;
        }
    </style>
</head>
<body>

    <h1>Gestione dei Cookie in PHP</h1>
    <p><?php echo $last_visit_message; ?></p>

    <div class="cookie-consent" id="cookie-consent">
        Questo sito utilizza i cookie per migliorare la tua esperienza. 
        <button id="accept-cookies">Accetta i cookie</button>
    </div>

    <script src="cookie-consent.js"></script>
</body>
</html>
```

### 2. **cookie-consent.js**

Questo script gestisce l'avviso sui cookie. Il messaggio viene visualizzato solo se l'utente non ha ancora accettato i cookie.

```javascript
document.addEventListener('DOMContentLoaded', function () {
    const consentElement = document.getElementById('cookie-consent');
    const acceptButton = document.getElementById('accept-cookies');

    // Verifica se l'utente ha già accettato i cookie
    if (!getCookie('cookie_consent')) {
        consentElement.style.display = 'block';
    }

    // Gestisce il clic sul pulsante di accettazione dei cookie
    acceptButton.addEventListener('click', function () {
        setCookie('cookie_consent', 'accepted', 30);
        consentElement.style.display = 'none';
    });

    // Funzione per impostare un cookie
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    // Funzione per ottenere il valore di un cookie
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
});
```

### Funzionamento dell'Esempio

1. **Impostazione del Cookie (Backend)**:
   - All'accesso dell'utente alla pagina, il backend verifica se esiste già un cookie denominato `last_visit`. Se esiste, mostra un messaggio di bentornato con la data dell'ultima visita.
   - Se il cookie non esiste, viene creato e impostato con la data e l'ora corrente, e il messaggio di benvenuto rifletterà che è la prima visita dell'utente.
   - Il cookie `last_visit` viene impostato per durare 30 giorni.

2. **Avviso sui Cookie (Frontend)**:
   - Quando l'utente visita il sito, uno script JavaScript controlla se esiste un cookie chiamato `cookie_consent`. Se non esiste, viene visualizzato un avviso per informare l'utente dell'uso dei cookie.
   - Se l'utente clicca su "Accetta i cookie", il cookie `cookie_consent` viene impostato e l'avviso scompare.

3. **Interazione tra Backend e Frontend**:
   - Il backend si occupa della logica principale relativa ai cookie (impostazione e lettura).
   - Il frontend gestisce la parte di interfaccia utente, informando l'utente sull'uso dei cookie e memorizzando il consenso.

### Conclusione

Questo esempio fornisce una soluzione completa per la gestione dei cookie in PHP, con un'attenzione particolare al rispetto della privacy degli utenti attraverso un avviso sui cookie gestito tramite JavaScript. L'approccio combinato di backend e frontend garantisce una gestione dei cookie efficace e conforme alle normative sulla privacy.
