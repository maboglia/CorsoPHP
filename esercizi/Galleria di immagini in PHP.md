# Galleria di immagini in PHP 

Sviluppa un "Galleria di immagini" in PHP che legge automaticamente le immagini da una directory sul server e le visualizza sulla pagina web, segui questi passaggi:

### Step 1: Configurazione dell'Ambiente
Assicurati di avere un server PHP funzionante (come XAMPP, WAMP, o un server web live).

### Step 2: Creazione della Struttura delle Cartelle
Organizza i tuoi file in una struttura di cartelle logica:
```
/image-gallery
    /images
        image1.jpg
        image2.png
        ...
    index.php
```
Nella cartella `images`, inserisci le immagini che desideri visualizzare nella galleria.

### Step 3: Creazione del File `index.php`
Il file `index.php` leggerà le immagini dalla cartella `images` e le visualizzerà in una galleria. Ecco il codice:

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
        }
        .gallery img {
            margin: 10px;
            border: 2px solid #ddd;
            width: 200px;
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Image Gallery</h1>
    <div class="gallery">
        <?php
        $imagesDir = 'images/';
        $images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        foreach ($images as $image) {
            echo '<img src="' . $image . '" alt="Image">';
        }
        ?>
    </div>
</body>
</html>
```

### Spiegazione del Codice

1. **HTML Structure**: La struttura base della pagina HTML contiene una sezione `<div>` con la classe `gallery` dove saranno inserite le immagini.

2. **CSS Styling**:
    - `display: flex; flex-wrap: wrap;`: La galleria utilizza Flexbox per disporre le immagini in righe e avvolgere le immagini che non entrano in una singola riga.
    - `img { margin: 10px; border: 2px solid #ddd; width: 200px; height: 150px; object-fit: cover; }`: Imposta lo stile delle immagini per avere margini, bordo e dimensioni coerenti. `object-fit: cover` assicura che le immagini mantengano le proporzioni riempiendo l'area assegnata.

3. **PHP Code**:
    - `$imagesDir = 'images/';`: Specifica la directory delle immagini.
    - `$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);`: Utilizza la funzione `glob()` per cercare tutti i file con estensioni `.jpg`, `.jpeg`, `.png`, e `.gif` nella directory delle immagini.
    - `foreach ($images as $image) { echo '<img src="' . $image . '" alt="Image">'; }`: Itera attraverso ogni immagine trovata e genera un elemento `<img>` per ciascuna, impostando l'attributo `src` al percorso dell'immagine.

### Step 4: Test della Galleria
1. Avvia il server web (ad es. avvia Apache in XAMPP).
2. Apri il browser web e naviga all'URL dove hai salvato la tua cartella `image-gallery` (ad es. `http://localhost/image-gallery/`).

### Step 5: Aggiungi Altre Immagini
Per aggiungere nuove immagini alla galleria, basta copiare i file immagine nella cartella `images`. La galleria si aggiornerà automaticamente per mostrare le nuove immagini.

### Conclusione
Hai ora una galleria di immagini funzionale in PHP che legge automaticamente le immagini da una directory sul server e le visualizza in una pagina web. Puoi personalizzare ulteriormente lo stile e la funzionalità in base alle tue esigenze.