# Creare una pagina PHP che genera una tabella HTML con dati provenienti da un array multidimensionale.

### Esercizio 10: Generare una Tabella HTML da un Array Multidimensionale

1. **Creazione della Pagina PHP**: Crea un file PHP chiamato `table_from_array.php`.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table from Array</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Generated Table from Array</h2>

    <?php
    // Definisci un array multidimensionale
    $students = array(
        array("ID" => 1, "Name" => "Alice", "Age" => 20, "Grade" => "A"),
        array("ID" => 2, "Name" => "Bob", "Age" => 22, "Grade" => "B"),
        array("ID" => 3, "Name" => "Charlie", "Age" => 23, "Grade" => "C"),
        array("ID" => 4, "Name" => "Dave", "Age" => 21, "Grade" => "B"),
        array("ID" => 5, "Name" => "Eve", "Age" => 20, "Grade" => "A")
    );

    // Funzione per generare una tabella HTML da un array multidimensionale
    function generate_table($array) {
        // Inizio della tabella
        echo "<table>";

        // Header della tabella
        echo "<tr>";
        foreach ($array[0] as $key => $value) {
            echo "<th>{$key}</th>";
        }
        echo "</tr>";

        // Corpo della tabella
        foreach ($array as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>{$cell}</td>";
            }
            echo "</tr>";
        }

        // Fine della tabella
        echo "</table>";
    }

    // Chiama la funzione per generare la tabella
    generate_table($students);
    ?>

</body>
</html>
```

### Spiegazione:

1. **Definizione dell'Array Multidimensionale**:
    - L'array `$students` contiene informazioni su vari studenti, con ogni studente rappresentato da un array associativo.

2. **Funzione per Generare la Tabella**:
    - La funzione `generate_table($array)` prende un array multidimensionale come input e genera una tabella HTML.
    - La funzione prima genera l'header della tabella utilizzando le chiavi del primo elemento dell'array.
    - Poi, itera attraverso l'array per generare le righe della tabella, con ogni cella che contiene i valori dell'array.

3. **Stile della Tabella**:
    - Aggiungiamo uno stile CSS di base per rendere la tabella più leggibile, con bordi e padding per le celle e uno sfondo per l'header.

### Esempio di Utilizzo:

1. Apri il file `table_from_array.php` nel tuo browser.
2. La pagina mostrerà una tabella HTML generata dall'array multidimensionale contenente le informazioni degli studenti.

### Ulteriori Miglioramenti:

1. **Ordinamento**:
    - Puoi aggiungere funzionalità di ordinamento per permettere agli utenti di ordinare le righe della tabella cliccando sui titoli delle colonne.

2. **Stile Avanzato**:
    - Puoi migliorare lo stile della tabella utilizzando framework CSS come Bootstrap per rendere la tabella più attraente.

3. **Interazione**:
    - Puoi aggiungere funzionalità JavaScript per permettere agli utenti di interagire con la tabella, come la possibilità di filtrare i risultati.

Questo esercizio dimostra come generare dinamicamente una tabella HTML da un array multidimensionale in PHP, un'abilità utile per visualizzare dati strutturati provenienti da database o altre fonti.