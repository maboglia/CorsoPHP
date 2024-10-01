# creazione di una semplice calcolatrice in PHP:

1. **Creazione della Pagina HTML**: Crea un file HTML chiamato `calculator.html` e aggiungi il seguente codice per creare una semplice interfaccia per la calcolatrice.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <h2>Simple Calculator</h2>
    <form action="calculator.php" method="post">
        <input type="number" name="num1" placeholder="Enter first number" required>
        <select name="operator" required>
            <option value="">Select Operator</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="num2" placeholder="Enter second number" required>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
```

2. **Elaborazione dei Dati in PHP**: Crea un file PHP chiamato `calculator.php` per elaborare i dati inviati dal modulo e calcolare il risultato in base all'operatore selezionato.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Result</title>
</head>
<body>
    <h2>Calculator Result</h2>
    <?php
    // Verifica se il modulo è stato inviato
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se tutti i campi sono stati compilati
        if (isset($_POST['num1'], $_POST['operator'], $_POST['num2'])) {
            $num1 = $_POST['num1'];
            $operator = $_POST['operator'];
            $num2 = $_POST['num2'];
            
            // Effettua il calcolo in base all'operatore selezionato
            switch ($operator) {
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case '*':
                    $result = $num1 * $num2;
                    break;
                case '/':
                    // Gestisce la divisione per zero
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        echo "<p>Error: Division by zero</p>";
                        die();
                    }
                    break;
                default:
                    echo "<p>Error: Invalid operator</p>";
                    die();
            }
            // Visualizza il risultato
            echo "<p>Result: $result</p>";
        } else {
            echo "<p>Error: Please fill all fields</p>";
        }
    }
    ?>
</body>
</html>
```

3. **Test e Visualizzazione**: Avvia un server locale e accedi alla pagina `calculator.html` tramite il browser. Inserisci due numeri e seleziona un operatore dalla lista. Dopo aver premuto il pulsante "Calculate", il risultato del calcolo verrà visualizzato sulla pagina.

Questo esercizio ti offre una panoramica di base su come elaborare i dati del modulo HTML utilizzando PHP e come eseguire operazioni matematiche semplici. Puoi espandere ulteriormente questa calcolatrice aggiungendo più funzionalità e operazioni matematiche.