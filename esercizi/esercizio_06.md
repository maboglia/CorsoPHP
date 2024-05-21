# creare una pagina PHP che calcola la somma e la media di una serie di numeri inseriti dall'utente attraverso un modulo HTML.

Ecco come implementare questo esercizio:

1. **Creazione del Modulo HTML**: Crea un file HTML chiamato `calculate_sum_average.html` e aggiungi il seguente codice per creare un modulo di input.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Sum and Average</title>
</head>
<body>
    <h2>Calculate Sum and Average</h2>
    <form action="calculate_sum_average.php" method="post">
        <label for="numbers">Enter numbers (separated by commas):</label>
        <input type="text" name="numbers" id="numbers" required><br><br>
        
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
```

2. **Calcolo della Somma e della Media in PHP**: Crea un file PHP chiamato `calculate_sum_average.php` per gestire il calcolo della somma e della media dei numeri.

```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prendi i numeri dall'input del modulo e li suddividi in un array
    $numbers = explode(",", $_POST['numbers']);
    
    // Calcola la somma dei numeri
    $sum = array_sum($numbers);
    
    // Calcola la media dei numeri
    $count = count($numbers);
    $average = $sum / $count;
    
    // Formatta la media con due cifre decimali
    $average = number_format($average, 2);
    
    // Visualizza il risultato
    $result = "Sum: $sum<br>";
    $result .= "Average: $average";
} else {
    // Se non è stato inviato un metodo POST, reindirizza alla pagina di input
    header("Location: calculate_sum_average.html");
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

Con questi passaggi, avrai un'applicazione PHP funzionante che prende una serie di numeri separati da virgola, calcola la somma e la media e visualizza i risultati. Puoi ulteriormente migliorare l'applicazione aggiungendo controlli di validazione per assicurarti che l'input sia corretto e gestendo eventuali errori in caso di input non valido.