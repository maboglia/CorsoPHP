# creare una pagina PHP che utilizza il metodo GET per ricevere dei parametri dall'URL e mostrare i risultati in una pagina web.

### Esercizio 8: Utilizzare il Metodo GET per Ricevere Parametri dall'URL

1. **Creazione della Pagina HTML per Inviare i Parametri**: Crea un file HTML chiamato `form_get.html` che contiene un modulo per inviare i parametri tramite il metodo GET.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Method Form</title>
</head>
<body>
    <h2>GET Method Form</h2>
    <form action="display_get.php" method="get">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
```

2. **Creazione della Pagina PHP per Visualizzare i Parametri Ricevuti**: Crea un file PHP chiamato `display_get.php` per gestire e visualizzare i parametri ricevuti tramite il metodo GET.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display GET Parameters</title>
</head>
<body>
    <h2>Received GET Parameters</h2>

    <?php
    // Controlla se i parametri sono impostati
    if (isset($_GET['name']) && isset($_GET['age'])) {
        // Recupera i valori dei parametri
        $name = htmlspecialchars($_GET['name']);
        $age = htmlspecialchars($_GET['age']);

        // Visualizza i valori
        echo "<p>Name: " . $name . "</p>";
        echo "<p>Age: " . $age . "</p>";
    } else {
        // Messaggio di errore se i parametri non sono impostati
        echo "<p>Parameters 'name' and 'age' are missing in the URL.</p>";
    }
    ?>

    <a href="form_get.html">Back to Form</a>
</body>
</html>
```

### Spiegazione:

1. **Modulo HTML**:
    - Il file `form_get.html` contiene un modulo con campi di input per `name` e `age`.
    - Il modulo invia i dati al file `display_get.php` tramite il metodo GET.

2. **Visualizzazione dei Parametri in PHP**:
    - Il file `display_get.php` gestisce la richiesta GET dal modulo.
    - Controlla se i parametri `name` e `age` sono impostati nell'URL.
    - Recupera i valori dei parametri e li visualizza nella pagina.
    - Se i parametri non sono impostati, mostra un messaggio di errore.

### Esempio di URL con Parametri GET:

Quando invii il modulo, il browser genererà un URL simile a questo:

```
http://localhost/display_get.php?name=John&age=25
```

La pagina `display_get.php` visualizzerà i parametri `name` e `age` ricevuti dall'URL.

Questo esercizio dimostra come utilizzare il metodo GET per inviare dati tramite l'URL e come ricevere e visualizzare questi dati in PHP.