# creare un semplice modulo di registrazione in PHP. 

Segui i passaggi seguenti per svilupparlo:

1. **Creazione della Pagina HTML**: Crea un file HTML chiamato `registration.html` e aggiungi il seguente codice per creare un modulo di registrazione semplice.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="registration.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
```

2. **Elaborazione dei Dati in PHP**: Crea un file PHP chiamato `registration.php` per elaborare i dati inviati dal modulo e gestire la registrazione dell'utente.

```php
<?php
// Connessione al database (sostituisci con le tue credenziali)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prendi i dati dal modulo di registrazione
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Query per inserire i dati nel database
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

// Esegui la query
if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Chiudi la connessione
$conn->close();
?>
```

3. **Test e Visualizzazione**: Avvia un server locale e accedi alla pagina `registration.html` tramite il browser. Compila il modulo di registrazione con un nome utente, un'email e una password, quindi premi il pulsante "Register". Se i dati vengono inviati con successo, vedrai un messaggio che conferma la registrazione. Puoi verificare nel tuo database se i dati sono stati inseriti correttamente.

Questo esercizio ti offre un'introduzione alla creazione di un modulo di registrazione semplice utilizzando PHP e MySQL. Puoi espandere ulteriormente questa funzionalità aggiungendo controlli di validazione e altre funzionalità come il controllo della disponibilità del nome utente e l'invio di email di conferma.