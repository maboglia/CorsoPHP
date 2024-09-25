# La classe `DOMDocument`

La classe `DOMDocument` in PHP è utilizzata per lavorare con documenti XML e HTML. Ti permette di creare, manipolare e analizzare documenti in modo programmatico. Ecco una panoramica di come funziona:

### Creazione di un Documento

Puoi creare un nuovo documento XML o HTML usando il costruttore:

```php
$doc = new DOMDocument('1.0', 'UTF-8');
```

### Caricamento di un Documento

Puoi caricare un documento XML o HTML da un file o da una stringa:

```php
// Carica da un file
$doc->load('file.xml');

// Carica da una stringa
$doc->loadXML('<root><element>Hello World</element></root>');
```

### Creazione di Elementi

Puoi creare nuovi elementi e aggiungerli al documento:

```php
$root = $doc->createElement('root');
$doc->appendChild($root);

$child = $doc->createElement('child', 'Content');
$root->appendChild($child);
```

### Navigazione del Documento

Puoi navigare attraverso il documento usando metodi come `getElementsByTagName()`:

```php
$elements = $doc->getElementsByTagName('child');
foreach ($elements as $element) {
    echo $element->nodeValue; // Stampa "Content"
}
```

### Modifica di Elementi

Puoi modificare gli attributi e il contenuto degli elementi:

```php
$child->setAttribute('attribute', 'value');
$child->nodeValue = 'New Content';
```

### Rimozione di Elementi

Per rimuovere un elemento, utilizza `removeChild()`:

```php
$root->removeChild($child);
```

### Salvataggio del Documento

Puoi salvare il documento in un file o come stringa:

```php
$doc->save('newfile.xml'); // Salva in un file

$xmlString = $doc->saveXML(); // Ottiene la stringa XML
```

### Impostazioni di Formattazione

Puoi anche formattare il documento per renderlo più leggibile:

```php
$doc->formatOutput = true;
```

### Esempio Completo

Ecco un esempio completo che crea un documento XML, aggiunge alcuni elementi e lo salva:

```php
$doc = new DOMDocument('1.0', 'UTF-8');
$doc->formatOutput = true;

$root = $doc->createElement('root');
$doc->appendChild($root);

$child1 = $doc->createElement('child', 'First Child');
$root->appendChild($child1);

$child2 = $doc->createElement('child', 'Second Child');
$root->appendChild($child2);

$doc->save('example.xml');
```

### Conclusione

`DOMDocument` è una classe potente e flessibile per la manipolazione di XML e HTML in PHP. Ti consente di costruire documenti complessi e di gestire strutture di dati gerarchiche in modo semplice.

---

## Esempio con documenti HTML

Puoi utilizzare la classe `DOMDocument` per creare e manipolare documenti HTML in PHP.

### Creazione di un Documento HTML

Puoi iniziare creando un documento HTML e aggiungendo elementi. Ecco un esempio:

```php
// Crea un nuovo documento HTML
$doc = new DOMDocument('1.0', 'UTF-8');

// Imposta il formato per una migliore leggibilità
$doc->formatOutput = true;

// Crea l'elemento <html>
$html = $doc->createElement('html');
$doc->appendChild($html);

// Crea l'elemento <head>
$head = $doc->createElement('head');
$html->appendChild($head);

// Crea e aggiungi un titolo
$title = $doc->createElement('title', 'Esempio di Documento HTML');
$head->appendChild($title);

// Crea l'elemento <body>
$body = $doc->createElement('body');
$html->appendChild($body);

// Crea e aggiungi un paragrafo
$paragraph = $doc->createElement('p', 'Ciao, questo è un paragrafo.');
$body->appendChild($paragraph);

// Crea e aggiungi un link
$link = $doc->createElement('a', 'Visita OpenAI');
$link->setAttribute('href', 'https://www.openai.com');
$body->appendChild($link);

// Salva il documento in un file
$doc->save('example.html');
```

### Caricamento di un Documento HTML Esistente

Puoi anche caricare e manipolare un documento HTML esistente:

```php
// Carica un documento HTML esistente
$doc->load('example.html');

// Aggiungi un nuovo paragrafo al body
$newParagraph = $doc->createElement('p', 'Questo è un nuovo paragrafo aggiunto.');
$body = $doc->getElementsByTagName('body')->item(0);
$body->appendChild($newParagraph);

// Salva le modifiche
$doc->save('example_modified.html');
```

### Navigazione e Modifica di Elementi

Puoi navigare nel documento e modificare gli elementi esistenti. Ad esempio, se vuoi cambiare il contenuto del primo paragrafo:

```php
// Trova il primo paragrafo e modifica il suo contenuto
$paragraphs = $doc->getElementsByTagName('p');
if ($paragraphs->length > 0) {
    $paragraphs->item(0)->nodeValue = 'Contenuto modificato del primo paragrafo.';
}

// Salva le modifiche
$doc->save('example_modified.html');
```

### Esempio Completo

Ecco un esempio completo che crea un documento HTML, aggiunge vari elementi, e poi lo modifica:

```php
// Creazione del documento HTML
$doc = new DOMDocument('1.0', 'UTF-8');
$doc->formatOutput = true;

$html = $doc->createElement('html');
$doc->appendChild($html);

$head = $doc->createElement('head');
$html->appendChild($head);

$title = $doc->createElement('title', 'Esempio di Documento HTML');
$head->appendChild($title);

$body = $doc->createElement('body');
$html->appendChild($body);

$paragraph = $doc->createElement('p', 'Ciao, questo è un paragrafo.');
$body->appendChild($paragraph);

$link = $doc->createElement('a', 'Visita OpenAI');
$link->setAttribute('href', 'https://www.openai.com');
$body->appendChild($link);

// Salva il documento
$doc->save('example.html');

// Carica e modifica il documento
$doc->load('example.html');
$newParagraph = $doc->createElement('p', 'Questo è un nuovo paragrafo aggiunto.');
$body->appendChild($newParagraph);

// Modifica il primo paragrafo
$paragraphs = $doc->getElementsByTagName('p');
if ($paragraphs->length > 0) {
    $paragraphs->item(0)->nodeValue = 'Contenuto modificato del primo paragrafo.';
}

// Salva le modifiche
$doc->save('example_modified.html');
```

### Conclusione

Utilizzando `DOMDocument`, puoi facilmente creare, caricare e modificare documenti HTML in PHP. Questa classe è molto utile per generare dinamicamente contenuti web e per manipolare strutture HTML esistenti.