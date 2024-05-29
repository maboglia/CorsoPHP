
# PHP challenges


### Controlla se un dato intero positivo è una potenza di due

```php
<?php
function isPowerOfTwo($num) {
    if ($num <= 0) {
        return false;
    }
    return ($num & ($num - 1)) == 0;
}

// Esempio di utilizzo
echo isPowerOfTwo(8) ? "Sì, è una potenza di due" : "No, non è una potenza di due";
?>
```

### Controlla se un dato intero positivo è una potenza di tre

```php
<?php
function isPowerOfThree($num) {
    if ($num <= 0) {
        return false;
    }
    while ($num % 3 == 0) {
        $num /= 3;
    }
    return $num == 1;
}

// Esempio di utilizzo
echo isPowerOfThree(27) ? "Sì, è una potenza di tre" : "No, non è una potenza di tre";
?>
```

### Controlla se un dato intero positivo è una potenza di quattro

```php
<?php
function isPowerOfFour($num) {
    if ($num <= 0) {
        return false;
    }
    return ($num & ($num - 1)) == 0 && ($num & 0x55555555) != 0;
}

// Esempio di utilizzo
echo isPowerOfFour(16) ? "Sì, è una potenza di quattro" : "No, non è una potenza di quattro";
?>
```

### Controlla se un intero è la potenza di un altro intero

```php
<?php
function isPower($base, $num) {
    if ($num <= 0 || $base <= 0) {
        return false;
    }
    while ($num % $base == 0) {
        $num /= $base;
    }
    return $num == 1;
}

// Esempio di utilizzo
echo isPower(3, 27) ? "Sì, è una potenza di 3" : "No, non è una potenza di 3";
?>
```

### Trova uno o più numeri mancanti da un array

```php
<?php
function findMissingNumbers($arr) {
    $missing = [];
    $n = count($arr);
    sort($arr);
    for ($i = $arr[0]; $i < $arr[$n - 1]; $i++) {
        if (!in_array($i, $arr)) {
            $missing[] = $i;
        }
    }
    return $missing;
}

// Esempio di utilizzo
$arr = [1, 2, 4, 6, 7, 9];
print_r(findMissingNumbers($arr));
?>
```

### Crea un modulo HTML e accetta il nome utente e visualizza il nome

```php
<!-- form.html -->
<!DOCTYPE html>
<html>
<head>
    <title>Modulo Utente</title>
</head>
<body>
    <form action="display.php" method="post">
        Nome utente: <input type="text" name="username">
        <input type="submit" value="Invia">
    </form>
</body>
</html>
```

```php
<!-- display.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    echo "Nome utente: " . $username;
}
?>
```

### Script di rilevamento del browser PHP

```php
<?php
$userAgent = $_SERVER['HTTP_USER_AGENT'];
echo "Il tuo browser è: " . $userAgent;
?>
```

### Ottieni il nome del file corrente

```php
<?php
echo "Il nome del file corrente è: " . basename($_SERVER['PHP_SELF']);
?>
```

### Restituisci alcuni componenti di un URL

```php
<?php
$url = "https://www.example.com/path?name=JohnDoe";
$parsedUrl = parse_url($url);
print_r($parsedUrl);
?>
```

### Cambia il colore del primo carattere di una parola

```php
<?php
function changeFirstCharacterColor($word, $color) {
    $firstChar = substr($word, 0, 1);
    $rest = substr($word, 1);
    return "<span style='color:$color;'>$firstChar</span>$rest";
}

echo changeFirstCharacterColor('Hello', 'red');
?>
```

### Controlla se la pagina viene chiamata da 'https' o 'http'

```php
<?php
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    echo "La pagina è chiamata tramite HTTPS";
} else {
    echo "La pagina è chiamata tramite HTTP";
}
?>
```

### Reindirizza un utente a una pagina diversa

```php
<?php
header("Location: https://www.example.com");
exit();
?>
```

### Convalida e-mail

```php
<?php
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Esempio di utilizzo
$email = "test@example.com";
echo validateEmail($email) ? "E-mail valida" : "E-mail non valida";
?>
```

### Visualizza stringa, valori all'interno di una tabella

```php
<?php
$data = [
    ["Nome" => "John", "Età" => 25],
    ["Nome" => "Jane", "Età" => 30]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabella dei Dati</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Età</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['Nome']; ?></td>
                <td><?php echo $row['Età']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
```

### Visualizza il codice sorgente di una pagina web

```php
<?php
$page = file_get_contents("https://www.example.com");
echo htmlspecialchars($page);
?>
```

### Ottieni le ultime informazioni modificate di un file

```php
<?php
$file = 'example.txt';
if (file_exists($file)) {
    echo "Ultima modifica: " . date("F d Y H:i:s.", filemtime($file));
} else {
    echo "Il file non esiste.";
}
?>
```

### Conta il numero di righe in un file

```php
<?php
$file = 'example.txt';
if (file_exists($file)) {
    $lines = count(file($file));
    echo "Il numero di righe nel file è: " . $lines;
} else {
    echo "Il file non esiste.";
}
?>
```

Queste soluzioni coprono vari aspetti della programmazione in PHP e dovrebbero fornire una buona base per risolvere i problemi indicati. Buon divertimento con il codice!
