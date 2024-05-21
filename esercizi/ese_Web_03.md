### Creazione di una Pagina di Accesso con Gestione delle Sessioni in PHP

#### Step 1: Configurazione dell'Ambiente
Per iniziare, assicurati di avere un server PHP funzionante, come XAMPP, WAMP, o MAMP, oppure utilizza un server remoto con PHP installato.

#### Step 2: Creazione della Struttura delle Cartelle
Organizza i tuoi file in una struttura di cartelle logica:
```
/session_example
    /includes
        header.php
        footer.php
    index.php
    login.php
    logout.php
    welcome.php
```

#### Step 3: Creazione del Modulo di Login

**login.php**
```php
<?php
session_start();
$message = "";

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Hardcoded user credentials (for simplicity)
    $valid_username = "admin";
    $valid_password = "password";

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit;
    } else {
        $message = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php echo $message; ?><br>
    <form action="login.php" method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
```

#### Step 4: Creazione della Pagina di Benvenuto

**welcome.php**
```php
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
```

#### Step 5: Creazione della Pagina di Logout

**logout.php**
```php
<?php
session_start();
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
header("Location: login.php");
exit;
?>
```

#### Step 6: Aggiunta di Header e Footer (Facoltativo)

**includes/header.php**
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Example</title>
</head>
<body>
```

**includes/footer.php**
```php
</body>
</html>
```

Puoi includere questi file in ogni pagina per evitare di ripetere il codice HTML:

**welcome.php**
```php
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
include("includes/header.php");
?>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
<p><a href="logout.php">Logout</a></p>
<?php include("includes/footer.php"); ?>
```

**login.php**
```php
<?php
session_start();
$message = "";

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $valid_username = "admin";
    $valid_password = "password";

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit;
    } else {
        $message = "Invalid username or password";
    }
}
include("includes/header.php");
?>
<h2>Login</h2>
<?php echo $message; ?><br>
<form action="login.php" method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="submit" value="Login">
</form>
<?php include("includes/footer.php"); ?>
```

### Spiegazione del Codice
1. **Gestione della Sessione**:
   - In `login.php`, `session_start()` avvia una nuova sessione o riprende quella esistente.
   - Se il form è stato inviato (`isset($_POST['submit'])`), verifica le credenziali hardcoded.
   - Se le credenziali sono valide, memorizza l'username nella sessione e reindirizza a `welcome.php`.

2. **Protezione della Pagina di Benvenuto**:
   - In `welcome.php`, verifica se l'utente è autenticato (`isset($_SESSION['username'])`).
   - Se l'utente non è autenticato, viene reindirizzato a `login.php`.

3. **Logout**:
   - In `logout.php`, cancella i dati della sessione e distrugge la sessione.

4. **Sicurezza**:
   - `htmlspecialchars()` viene utilizzato per prevenire attacchi XSS visualizzando correttamente i caratteri speciali.

### Esecuzione
1. Apri `login.php` nel browser.
2. Inserisci `username: admin` e `password: password`.
3. Dopo il login, verrai reindirizzato a `welcome.php`.
4. Clicca su "Logout" per terminare la sessione e tornare alla pagina di login.

Questo esercizio mostra come creare un sistema di autenticazione di base in PHP utilizzando le sessioni, un componente essenziale per molte applicazioni web.