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
