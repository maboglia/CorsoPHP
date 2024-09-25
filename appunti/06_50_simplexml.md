### Leggere un file XML in modo semplice con PHP

In questo esempio utilizziamo **SimpleXML**, un'estensione di PHP che permette di lavorare con dati XML in maniera semplice e intuitiva. Il codice che segue mostra come caricare un XML, attraversarne i nodi e accedere ai suoi attributi e valori.

#### **Codice:**

```php
<?php
// Definiamo una stringa contenente un documento XML
$xml_string = "<?xml version='1.0'?>
<users>
    <user id='398'>
        <nome>Pippo</nome>
        <email>pippo@dominio.com</email>
    </user>
    <user id='867'>
        <nome>Pluto</nome>
        <email>pluto@dominio.com</email>
    </user>
</users>";

// Carichiamo l'XML nella memoria con SimpleXML
$xml = simplexml_load_string($xml_string);

// Iteriamo su ciascun nodo 'user' all'interno del file XML
foreach ($xml->user as $user) {
    // Accediamo agli attributi del nodo, ad esempio 'id'
    echo $user['id'], ' ';
    
    // I sotto-nodi (ad es. 'nome', 'email') sono accessibili tramite l'operatore '->'
    echo $user->nome, ' ';   // Stampa il nome dell'utente
    echo $user->email, '<br />';   // Stampa l'email dell'utente
}
?>
```

### **Spiegazione del Codice:**

1. **Definizione della stringa XML:**
   - Il documento XML contiene una lista di utenti, dove ogni utente ha un attributo `id` e dei sotto-nodi come `nome` ed `email`.

2. **`simplexml_load_string($xml_string)`:**
   - La funzione `simplexml_load_string` carica il contenuto XML come un oggetto `SimpleXMLElement`. Questo permette di accedere facilmente ai dati XML attraverso un approccio orientato agli oggetti.

3. **Loop su ciascun nodo `<user>`:**
   - L'oggetto `$xml` contiene tutti i dati XML. Attraverso `$xml->user`, possiamo accedere direttamente a tutti i nodi `<user>`.

4. **Accesso agli attributi e sotto-nodi:**
   - Gli **attributi** degli elementi XML (ad esempio `id`) vengono letti come se fossero array associativi (`$user['id']`).
   - I **sotto-nodi** (`<nome>`, `<email>`) sono accessibili tramite l'operatore `->` (`$user->nome`, `$user->email`).

### **Uscita prevista:**

```
398 Pippo pippo@dominio.com
867 Pluto pluto@dominio.com
```

### **Vantaggi dell'uso di SimpleXML:**

- **Semplicità**: SimpleXML consente di lavorare con XML come se fosse un oggetto, rendendo il codice pulito e leggibile.
- **Navigazione intuitiva**: È facile accedere sia agli attributi che ai sotto-elementi utilizzando la sintassi di accesso agli oggetti (`->`).

---

## Scrittura di file XML

**SimpleXML** in PHP è principalmente progettato per la lettura di XML, ma offre anche funzionalità per la scrittura e la modifica dei dati XML. Puoi utilizzare SimpleXML per creare nuovi nodi, modificare valori esistenti e quindi esportare l'oggetto in formato XML

### Esempio di Scrittura con SimpleXML

Ecco un esempio che mostra come creare un nuovo documento XML e scrivere dati in esso utilizzando SimpleXML:

```php
<?php
// Creazione di un nuovo oggetto SimpleXMLElement
$xml = new SimpleXMLElement('<?xml version="1.0"?><users></users>');

// Aggiunta di un nuovo nodo 'user'
$user1 = $xml->addChild('user');
$user1->addAttribute('id', '398');
$user1->addChild('nome', 'Pippo');
$user1->addChild('email', 'pippo@dominio.com');

// Aggiunta di un secondo nodo 'user'
$user2 = $xml->addChild('user');
$user2->addAttribute('id', '867');
$user2->addChild('nome', 'Pluto');
$user2->addChild('email', 'pluto@dominio.com');

// Salvataggio del file XML su disco
$xml->asXML('utenti.xml');

// Visualizzazione del contenuto XML
header('Content-Type: application/xml');
echo $xml->asXML();
?>
```

### Spiegazione del Codice

1. **Creazione di un Nuovo Documento XML:**
   - `new SimpleXMLElement('<?xml version="1.0"?><users></users>');` crea un nuovo oggetto XML vuoto con la radice `<users>`.

2. **Aggiunta di Nodi e Attributi:**
   - `addChild('user')` crea un nuovo nodo `<user>`.
   - `addAttribute('id', '398')` aggiunge un attributo `id` al nodo `<user>`.
   - `addChild('nome', 'Pippo')` e `addChild('email', 'pippo@dominio.com')` aggiungono i sotto-nodi `nome` ed `email`.

3. **Salvataggio del Documento XML:**
   - `asXML('utenti.xml')` salva il documento XML in un file chiamato `utenti.xml`.

4. **Visualizzazione del Contenuto XML:**
   - Impostando l'header per il tipo di contenuto a `application/xml`, il contenuto XML viene visualizzato nel browser.

### Conclusione

SimpleXML è una scelta conveniente per gestire XML in lettura e scrittura in PHP. Sebbene non supporti tutte le funzionalità di manipolazione XML che potrebbero essere disponibili in librerie più complesse come DOMDocument, offre un'interfaccia semplice e diretta per operazioni comuni.
