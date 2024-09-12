![logo](./its.png)

# Corso PHP

---

### Upload di File con PHP

L'upload di file in PHP consente agli utenti di caricare file da un modulo HTML al server. Questo è utile per funzionalità come caricare immagini, documenti o altri file per l'elaborazione lato server.

#### 1. **Creare un Modulo HTML per l'Upload di File**

Per caricare un file, è necessario creare un modulo HTML che permetta all'utente di selezionare un file dal proprio dispositivo. Ecco un esempio:

```html
<form action="upload.php" method="post" enctype="multipart/form-data">
  Seleziona il file da caricare:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Carica File" name="submit">
</form>
```

**Spiegazione:**

- `action="upload.php"`: Specifica il file PHP che gestirà l'upload.
- `method="post"`: Utilizza il metodo POST per inviare i dati.
- `enctype="multipart/form-data"`: Necessario per inviare file.
- `<input type="file" name="fileToUpload">`: Permette all'utente di scegliere un file dal proprio dispositivo.

#### 2. **Gestire l'Upload nel File PHP**

Una volta inviato il modulo, il file PHP indicato nell'attributo `action` gestisce il processo di upload. PHP utilizza l'array globale `$_FILES` per gestire i file caricati.

Ecco un esempio di script PHP per l'upload:

```php
<?php
$target_dir = "uploads/";  // Directory in cui verranno salvati i file
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Controlla se il file è un'immagine reale o un falso
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Il file è un'immagine - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Il file non è un'immagine.";
        $uploadOk = 0;
    }
}

// Controlla se il file esiste già
if (file_exists($target_file)) {
    echo "Il file esiste già.";
    $uploadOk = 0;
}

// Controlla la dimensione del file
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Il file è troppo grande.";
    $uploadOk = 0;
}

// Permette solo alcuni formati di file
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif" ) {
    echo "Sono permessi solo i formati JPG, JPEG, PNG e GIF.";
    $uploadOk = 0;
}

// Controlla se $uploadOk è stato impostato a 0 a causa di un errore
if ($uploadOk == 0) {
    echo "Il file non è stato caricato.";
// Se tutto è ok, prova a caricare il file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Il file ". basename( $_FILES["fileToUpload"]["name"]). " è stato caricato.";
    } else {
        echo "C'è stato un errore durante il caricamento del file.";
    }
}
?>
```

**Spiegazione del Codice:**

- **$target_dir**: Specifica la cartella in cui verranno salvati i file caricati.
- **$_FILES["fileToUpload"]["tmp_name"]**: Questo è il percorso temporaneo dove PHP salva il file durante il caricamento.
- **basename()**: Estrae il nome del file dal percorso.
- **move_uploaded_file()**: Sposta il file dal percorso temporaneo alla cartella finale (nel nostro caso `uploads/`).

#### 3. **Validazioni Comuni durante l'Upload**

Quando si gestisce l'upload di file, ci sono alcune validazioni fondamentali da effettuare:

- **Verifica del tipo di file**: PHP non controlla automaticamente il tipo di file, quindi è importante verificare l'estensione del file o il suo tipo MIME.
  
  ```php
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if ($imageFileType != "jpg" && $imageFileType != "png") {
      echo "Sono permessi solo i formati JPG e PNG.";
  }
  ```

- **Verifica della dimensione del file**: I file molto grandi possono consumare troppo spazio o banda. È possibile impostare un limite di dimensione.

  ```php
  if ($_FILES["fileToUpload"]["size"] > 500000) { // Limite a 500KB
      echo "Il file è troppo grande.";
  }
  ```

- **Verifica se il file esiste già**: Se un file con lo stesso nome esiste già, puoi decidere di sovrascriverlo o interrompere il caricamento.

  ```php
  if (file_exists($target_file)) {
      echo "Il file esiste già.";
  }
  ```

#### 4. **Configurazione del Server**

Per gestire correttamente l'upload di file, è importante configurare correttamente il file `php.ini`. Alcune direttive importanti da considerare sono:

- **`upload_max_filesize`**: Limita la dimensione massima dei file caricati.
- **`post_max_size`**: Imposta il limite massimo per tutti i dati POST, inclusi i file caricati.
- **`file_uploads`**: Deve essere `On` per abilitare l'upload di file.
  
Esempio di configurazione:

```ini
file_uploads = On
upload_max_filesize = 2M
post_max_size = 8M
```

#### 5. **Gestione degli Errori durante l'Upload**

PHP assegna un codice di errore in caso di problemi con il caricamento. Questo codice può essere controllato tramite `$_FILES['fileToUpload']['error']`. Ecco una breve lista dei codici di errore:

- **UPLOAD_ERR_OK (0)**: Caricamento avvenuto con successo.
- **UPLOAD_ERR_INI_SIZE (1)**: Il file supera la direttiva `upload_max_filesize`.
- **UPLOAD_ERR_FORM_SIZE (2)**: Il file supera il limite impostato nel modulo HTML (`MAX_FILE_SIZE`).
- **UPLOAD_ERR_PARTIAL (3)**: Il file è stato caricato solo parzialmente.
- **UPLOAD_ERR_NO_FILE (4)**: Nessun file è stato caricato.

#### 6. **Miglioramenti per la Sicurezza**

L'upload di file può introdurre rischi per la sicurezza se non viene gestito correttamente. Ecco alcune buone pratiche:

- **Convalida rigorosa dei file**: Controllare sempre l'estensione e il tipo MIME.
- **Limitare le dimensioni del file**: Impostare dei limiti appropriati per evitare il consumo eccessivo di risorse.
- **Rinominare i file**: Per evitare conflitti o problemi di sicurezza, considera di rinominare i file caricati.
- **Gestire le autorizzazioni della cartella di upload**: Assicurati che la cartella di upload abbia le giuste autorizzazioni, evitando che l'esecuzione di file PHP al suo interno possa rappresentare una minaccia.

### Conclusione

Caricare file con PHP è un processo relativamente semplice ma richiede attenzione nella gestione della sicurezza e delle validazioni. Un modulo HTML ben progettato e un'adeguata gestione del file lato server ti permetteranno di gestire gli upload in modo sicuro ed efficiente.


---

## Metti in pratica

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