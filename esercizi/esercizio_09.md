# Creare una pagina PHP che utilizza il metodo POST per ricevere dei parametri da un modulo e mostrare i risultati in una pagina web.

### Esercizio 9: Utilizzare il Metodo POST per Ricevere Parametri da un Modulo

1. **Creazione della Pagina HTML per Inviare i Parametri**: Crea un file HTML chiamato `form_post.html` che contiene un modulo per inviare i parametri tramite il metodo POST.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Method Form</title>
</head>
<body>
    <h2>POST Method Form</h2>
    <form action="display_post.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
```

2. **Creazione della Pagina PHP per Visualizzare i Parametri Ricevuti**: Crea un file PHP chiamato `display_post.php` per gestire e visualizzare i parametri ricevuti tramite il metodo POST.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display POST Parameters</title>
</head>
<body>
    <h2>Received POST Parameters</h2>

    <?php
    // Controlla se i parametri sono impostati
    if (isset($_POST['name']) && isset($_POST['email'])) {
        // Recupera i valori dei parametri
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        // Visualizza i valori
        echo "<p>Name: " . $name . "</p>";
        echo "<p>Email: " . $email . "</p>";
    } else {
        // Messaggio di errore se i parametri non sono impostati
        echo "<p>Parameters 'name' and 'email' are missing in the form submission.</p>";
    }
    ?>

    <a href="form_post.html">Back to Form</a>
</body>
</html>
```

### Spiegazione:

1. **Modulo HTML**:
    - Il file `form_post.html` contiene un modulo con campi di input per `name` e `email`.
    - Il modulo invia i dati al file `display_post.php` tramite il metodo POST.

2. **Visualizzazione dei Parametri in PHP**:
    - Il file `display_post.php` gestisce la richiesta POST dal modulo.
    - Controlla se i parametri `name` e `email` sono impostati nel POST.
    - Recupera i valori dei parametri e li visualizza nella pagina.
    - Se i parametri non sono impostati, mostra un messaggio di errore.

### Esempio di Utilizzo:

1. Apri `form_post.html` nel tuo browser.
2. Inserisci i tuoi dati nei campi del modulo e fai clic su "Submit".
3. Il modulo invierà i dati a `display_post.php`, che mostrerà i valori ricevuti.

### Ulteriori Miglioramenti:

1. **Validazione dei Dati**:
    - Puoi aggiungere ulteriori controlli per validare i dati prima di visualizzarli, come la validazione dell'email o la verifica della presenza di tutti i campi richiesti.

2. **Messaggi di Conferma**:
    - Puoi personalizzare i messaggi di conferma o di errore per migliorare l'esperienza dell'utente.

Questo esercizio dimostra come utilizzare il metodo POST per inviare dati tramite un modulo e come ricevere e visualizzare questi dati in PHP.