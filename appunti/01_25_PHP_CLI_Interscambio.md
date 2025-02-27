# Formati di interscambio dati

Vediamo come PHP da linea di comando può interagire con i formati di dati JSON, CSV e XML.

### 1. JSON

JSON è molto usato per scambiare dati tra applicazioni. PHP fornisce funzioni native per leggere e scrivere JSON.

#### Leggere JSON da file

```php
<?php
// Legge il contenuto del file JSON
$json = file_get_contents('data.json');

// Decodifica il JSON in un array associativo
$data = json_decode($json, true);

print_r($data);
?>
```

**Nota:** Il secondo parametro `true` di `json_decode()` converte il JSON in array associativo.

#### Scrivere JSON su file

```php
<?php
$data = [
    'nome' => 'Mario',
    'cognome' => 'Rossi',
    'età' => 30
];

$json = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents('output.json', $json);

echo "File JSON creato!";
?>
```

---

### 2. CSV

Il formato CSV è comunemente usato per dati tabellari.

#### Leggere CSV

```php
<?php
if (($handle = fopen('dati.csv', 'r')) !== false) {
    while (($row = fgetcsv($handle, 1000, ',')) !== false) {
        print_r($row);
    }
    fclose($handle);
}
?>
```

La funzione `fgetcsv()` legge una riga alla volta e la converte in un array.

#### Scrivere CSV

```php
<?php
$data = [
    ['Nome', 'Cognome', 'Età'],
    ['Mario', 'Rossi', 30],
    ['Luca', 'Bianchi', 25]
];

$handle = fopen('output.csv', 'w');

foreach ($data as $row) {
    fputcsv($handle, $row);
}

fclose($handle);
echo "File CSV creato!";
?>
```

---

### 3. XML

PHP fornisce diverse librerie per lavorare con XML, come **SimpleXML** e **DOMDocument**.

#### Leggere XML

```php
<?php
$xml = simplexml_load_file('data.xml');

foreach ($xml->persona as $persona) {
    echo $persona->nome . " " . $persona->cognome . "\n";
}
?>
```

Il metodo `simplexml_load_file()` carica il file XML e lo converte in un oggetto.

#### Scrivere XML

```php
<?php
$xml = new SimpleXMLElement('<persone/>');

$persona = $xml->addChild('persona');
$persona->addChild('nome', 'Mario');
$persona->addChild('cognome', 'Rossi');

$xml->asXML('output.xml');
echo "File XML creato!";
?>
```
