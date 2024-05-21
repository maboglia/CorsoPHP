# sviluppare una pagina PHP che prenda un input da un modulo HTML e verifichi se il numero inserito è pari o dispari.

Ecco come potrebbe essere implementato:

1. **Creazione della Pagina HTML**: Crea un file HTML chiamato `even_odd.html` e aggiungi il seguente codice per creare un modulo di input.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even or Odd</title>
</head>
<body>
    <h2>Check if Number is Even or Odd</h2>
    <form action="check_even_odd.php" method="post">
        <label for="number">Enter a number:</label>
        <input type="number" name="number" id="number" required><br><br>
        
        <input type="submit" value="Check">
    </form>
</body>
</html>
```

2. **Verifica se il Numero è Pari o Dispari in PHP**: Crea un file PHP chiamato `check_even_odd.php` per gestire la verifica del numero.

```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prendi il numero dall'input del modulo
    $number = $_POST['number'];
    
    // Verifica se il numero è pari o dispari
    if ($number % 2 == 0) {
        $result = "$number is even.";
    } else {
        $result = "$number is odd.";
    }
} else {
    // Se non è stato inviato un metodo POST, reindirizza alla pagina di input
    header("Location: even_odd.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <h2>Result</h2>
    <p><?php echo $result; ?></p>
</body>
</html>
```

Con questi passaggi, avrai un'applicazione PHP funzionante che prende un numero da un modulo HTML, verifica se è pari o dispari e visualizza il risultato. Puoi espandere ulteriormente questa applicazione aggiungendo controlli di validazione per assicurarti che l'input sia un numero e migliorare l'aspetto del frontend con CSS.