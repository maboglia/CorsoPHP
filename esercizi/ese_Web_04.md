### Implementazione di un Modulo di Caricamento di File in PHP

#### Step 1: Configurazione dell'Ambiente
Assicurati di avere un server PHP funzionante e configurato correttamente.

#### Step 2: Creazione della Struttura delle Cartelle
Organizza i tuoi file in una struttura di cartelle logica:
```
/file_upload_example
    /uploads
    upload.php
    process_upload.php
```
La cartella `uploads` sarà la destinazione dei file caricati.

#### Step 3: Creazione del Modulo di Caricamento

**upload.php**
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="process_upload.php" method="post" enctype="multipart/form-data">
        Seleziona un file da caricare:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br><br>
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
```
#### Step 4: Creazione del File di Processo del Caricamento

**process_upload.php**
```php
<?php
// Configurazione della destinazione di caricamento
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Verifica se il file è una vera immagine o un falso
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Il file è un'immagine - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "Il file non è un'immagine.<br>";
        $uploadOk = 0;
    }
}

// Verifica se il file esiste già
if (file_exists($target_file)) {
    echo "Spiacente, il file esiste già.<br>";
    $uploadOk = 0;
}

// Limita la dimensione del file (es. massimo 5MB)
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Spiacente, il tuo file è troppo grande.<br>";
    $uploadOk = 0;
}

// Permetti solo certi formati di file (immagini)
$allowed_formats = array("jpg", "jpeg", "png", "gif", "pdf");
if(!in_array($imageFileType, $allowed_formats)) {
    echo "Spiacente, solo i file JPG, JPEG, PNG, GIF, e PDF sono permessi.<br>";
    $uploadOk = 0;
}

// Verifica se $uploadOk è settato a 0 per errori
if ($uploadOk == 0) {
    echo "Spiacente, il tuo file non è stato caricato.<br>";
// Se tutto è ok, prova a caricare il file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Il file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " è stato caricato.";
    } else {
        echo "Spiacente, c'è stato un errore nel caricamento del tuo file.";
    }
}
?>
```

### Spiegazione del Codice

1. **Form di Caricamento**:
   - In `upload.php`, viene creato un form HTML che utilizza l'attributo `enctype="multipart/form-data"` per consentire il caricamento dei file.
   - Il form invia i dati a `process_upload.php` utilizzando il metodo POST.

2. **Processo di Caricamento**:
   - In `process_upload.php`, il file viene caricato nella directory `uploads/`.
   - Viene verificato se il file è una vera immagine utilizzando `getimagesize()`.
   - Controlli addizionali vengono eseguiti per:
     - Verificare se il file esiste già.
     - Limitare la dimensione del file a un massimo di 5MB.
     - Permettere solo certi formati di file (JPG, JPEG, PNG, GIF, PDF).
   - Se tutte le verifiche passano, il file viene caricato nella cartella `uploads/` utilizzando `move_uploaded_file()`.
   - Messaggi di errore vengono mostrati se il caricamento fallisce.

### Esecuzione
1. Apri `upload.php` nel browser.
2. Seleziona un file dal tuo computer.
3. Clicca su "Upload File".
4. Verrà mostrato un messaggio di successo o di errore in base al risultato del caricamento.

Questo esercizio mostra come implementare un sistema di caricamento di file di base in PHP, che è essenziale per molte applicazioni web che richiedono l'upload di immagini o documenti.