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
