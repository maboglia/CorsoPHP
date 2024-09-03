L'esempio seguente mostra come implementare un sistema di upload di foto di prodotti in PHP utilizzando la programmazione orientata agli oggetti (OOP) e le funzionalità introdotte in PHP 8.

### Struttura dei File

1. **index.php** - La pagina principale con il form per l'upload.
2. **Product.php** - La classe che rappresenta il prodotto e gestisce l'upload dell'immagine.
3. **uploads/** - Una directory dove verranno salvate le immagini caricate.

### 1. **Product.php**

Questa classe rappresenta un prodotto e contiene metodi per gestire l'upload dell'immagine.

```php
<?php

class Product
{
    private string $name;
    private string $imageDirectory = 'uploads/';
    private ?string $imageName = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function uploadImage(array $file): bool
    {
        // Verifica che il file sia stato caricato senza errori
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new RuntimeException('Errore durante l\'upload del file.');
        }

        // Verifica il tipo MIME dell'immagine
        $fileInfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $fileInfo->file($file['tmp_name']);
        $validMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (!in_array($mime, $validMimeTypes, true)) {
            throw new RuntimeException('Formato immagine non valido.');
        }

        // Genera un nome univoco per l'immagine
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $this->imageName = sprintf('%s.%s', bin2hex(random_bytes(8)), $ext);

        // Salva l'immagine nella directory specificata
        if (!move_uploaded_file($file['tmp_name'], $this->imageDirectory . $this->imageName)) {
            throw new RuntimeException('Errore nel salvataggio del file.');
        }

        return true;
    }

    public function getImagePath(): ?string
    {
        if ($this->imageName) {
            return $this->imageDirectory . $this->imageName;
        }
        return null;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
```

### 2. **index.php**

Questo file mostra un form per l'upload dell'immagine e gestisce l'interazione con l'utente.

```php
<?php
require_once 'Product.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Crea un nuovo prodotto con il nome inviato
        $productName = $_POST['product_name'] ?? 'Prodotto senza nome';
        $product = new Product($productName);

        // Esegui l'upload dell'immagine
        if (isset($_FILES['product_image'])) {
            $product->uploadImage($_FILES['product_image']);
            $message = 'Immagine caricata con successo!<br>';
            $message .= 'Nome prodotto: ' . htmlspecialchars($product->getName()) . '<br>';
            $message .= 'Immagine caricata: <br><img src="' . htmlspecialchars($product->getImagePath()) . '" alt="Product Image">';
        } else {
            $message = 'Nessun file selezionato.';
        }
    } catch (RuntimeException $e) {
        $message = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Upload Immagine Prodotto</title>
</head>
<body>
    <h1>Carica Immagine Prodotto</h1>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <label for="product_name">Nome Prodotto:</label>
        <input type="text" name="product_name" id="product_name" required>
        <br><br>
        <label for="product_image">Immagine Prodotto:</label>
        <input type="file" name="product_image" id="product_image" accept="image/*" required>
        <br><br>
        <button type="submit">Carica Immagine</button>
    </form>
</body>
</html>
```

### 3. **uploads/**

Questa directory è dove verranno salvate le immagini caricate. Assicurati che questa directory sia scrivibile dal server web. Puoi creare la directory manualmente o includere un controllo nel codice per assicurarti che esista.

```bash
mkdir uploads
chmod 755 uploads
```

### Spiegazione dell'Implementazione

1. **Classe `Product`**:
   - La classe `Product` rappresenta un prodotto. Ha proprietà per il nome del prodotto e per gestire il nome e il percorso dell'immagine.
   - Il metodo `uploadImage()` gestisce l'upload dell'immagine, verificando che il file sia valido (controllo degli errori e tipo MIME) e salvandolo in modo sicuro nella directory degli upload.
   - `getImagePath()` restituisce il percorso completo dell'immagine caricata, utile per visualizzarla in seguito.

2. **Form di Upload (`index.php`)**:
   - L'utente inserisce il nome del prodotto e seleziona un file immagine. Quando il form viene inviato, il file viene caricato e il prodotto viene creato.
   - Se l'upload ha successo, viene mostrata una conferma con il nome del prodotto e un'anteprima dell'immagine.

### Conclusione

Questo esempio mostra come implementare un sistema di upload di immagini utilizzando OOP in PHP 8. La classe `Product` incapsula la logica di gestione dei prodotti, inclusa la validazione e il salvataggio sicuro delle immagini. Questo approccio OOP rende il codice più modulare, riutilizzabile e manutenibile.

---

La funzione `sprintf` in PHP è utilizzata per formattare una stringa secondo un formato specifico e restituirla come risultato. A differenza di `printf`, che stampa direttamente l'output, `sprintf` restituisce la stringa formattata, permettendoti di utilizzarla o manipolarla ulteriormente.

### Sintassi di `sprintf`

```php
sprintf(string $format, mixed ...$values): string
```

- **$format**: La stringa di formato che contiene segnaposti speciali (specificatori di formato) per i valori che desideri inserire.
- **...$values**: I valori che verranno inseriti nei segnaposti nella stringa di formato.

### Specificatori di Formato

I segnaposti all'interno della stringa di formato sono costituiti da un simbolo `%` seguito da un carattere che specifica il tipo di valore da inserire. Ecco alcuni dei più comuni specificatori di formato:

- **%s**: Stringa
- **%d**: Numero intero (base 10)
- **%f**: Numero a virgola mobile (float)
- **%x**: Numero intero in esadecimale (minuscolo)
- **%X**: Numero intero in esadecimale (maiuscolo)
- **%b**: Numero intero in binario
- **%%**: Segno percentuale (per inserire un `%` nella stringa)

### Esempi

#### 1. Formattare una stringa semplice

```php
$name = "Mario";
$greeting = sprintf("Ciao, %s!", $name);
echo $greeting; // Output: Ciao, Mario!
```

#### 2. Formattare numeri interi

```php
$apples = 5;
$bananas = 10;
$summary = sprintf("Ho %d mele e %d banane.", $apples, $bananas);
echo $summary; // Output: Ho 5 mele e 10 banane.
```

#### 3. Formattare numeri a virgola mobile

```php
$price = 1234.5678;
$formattedPrice = sprintf("Prezzo: €%.2f", $price);
echo $formattedPrice; // Output: Prezzo: €1234.57
```
In questo esempio, `%.2f` specifica che il numero deve essere formattato come un float con due cifre decimali.

#### 4. Numeri in esadecimale

```php
$number = 255;
$hex = sprintf("Numero in esadecimale: %x", $number);
echo $hex; // Output: Numero in esadecimale: ff
```

#### 5. Aggiungere zeri iniziali

```php
$number = 42;
$formattedNumber = sprintf("%05d", $number);
echo $formattedNumber; // Output: 00042
```
In questo esempio, `%05d` indica che il numero deve essere formato con almeno 5 cifre, aggiungendo zeri iniziali se necessario.

### Utilizzo Avanzato

Puoi anche specificare la larghezza minima e l'allineamento dei valori. Ad esempio:

```php
$leftAligned = sprintf("|%-10s|", "Test");
$rightAligned = sprintf("|%10s|", "Test");

echo $leftAligned; // Output: |Test      |
echo $rightAligned; // Output: |      Test|
```
In questi esempi:
- `%-10s` allinea il testo a sinistra e riempie lo spazio a destra fino a 10 caratteri.
- `%10s` allinea il testo a destra, riempiendo lo spazio a sinistra.

### Conclusione

`sprintf` è una funzione potente per creare stringhe formattate in modo preciso e personalizzato. È particolarmente utile quando hai bisogno di costruire messaggi complessi, generare output in formati specifici, o creare stringhe per la memorizzazione o l'output in un contesto più strutturato, come file o database.