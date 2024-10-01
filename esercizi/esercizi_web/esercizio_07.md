# Validazione form html

creare una pagina PHP che prende in input un nome utente e una password da un modulo HTML, li valida e mostra un messaggio di benvenuto se la combinazione è corretta. Se la combinazione è sbagliata, mostrerà un messaggio di errore.

Ecco come implementare questo esercizio:

1. **Creazione del Modulo HTML**: Crea un file HTML chiamato `login.html` e aggiungi il seguente codice per creare un modulo di login.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
```

2. **Validazione del Login in PHP**: Crea un file PHP chiamato `login.php` per gestire la validazione del nome utente e della password.

```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i valori del modulo
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Dati di login predefiniti
    $valid_username = "mario";
    $valid_password = "secret";

    // Messaggio di benvenuto o errore
    if ($username === $valid_username && $password === $valid_password) {
        $message = "Welcome, " . htmlspecialchars($username) . "!";
    } else {
        $message = "Invalid username or password.";
    }
} else {
    // Se non è stato inviato un metodo POST, reindirizza alla pagina di login
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
</head>
<body>
    <h2>Login Result</h2>
    <p><?php echo $message; ?></p>
    <a href="login.html">Back to Login</a>
</body>
</html>
```

### Spiegazione:

1. **Modulo HTML**:
    - Il file `login.html` contiene un modulo con campi di input per `username` e `password`.
    - Il modulo invia i dati al file `login.php` tramite il metodo `POST`.

2. **Validazione del Login in PHP**:
    - Il file `login.php` gestisce la richiesta `POST` dal modulo.
    - Recupera i valori del modulo e li confronta con i valori predefiniti `valid_username` e `valid_password`.
    - Se i valori corrispondono, viene mostrato un messaggio di benvenuto.
    - Se i valori non corrispondono, viene mostrato un messaggio di errore.
    - Se la richiesta non è `POST`, l'utente viene reindirizzato alla pagina di login.

Questa implementazione consente di creare un semplice sistema di autenticazione per un sito web utilizzando PHP. Puoi ulteriormente migliorare l'applicazione aggiungendo funzionalità come hash delle password, messaggi di errore più dettagliati e gestione delle sessioni per tracciare l'accesso degli utenti.