# Importazione di File in PHP

## Include

Quando si lavora su più pagine, potrebbe essere necessario riutilizzare lo stesso codice. Per fare ciò, puoi inserire il codice in un file separato e poi includerlo nel tuo script usando l'istruzione `include`. Questa istruzione inserisce tutto il testo del file specificato nello script corrente, come se il codice fosse stato scritto direttamente in quella posizione. A differenza delle funzioni, `include` è un costrutto del linguaggio e non richiede l'uso delle parentesi.

```php
<?php
include 'miofile.php';
?>
```

Quando un file viene incluso, l'analisi del codice passa alla modalità HTML all'inizio del file e ritorna alla modalità PHP alla fine. Pertanto, qualsiasi codice PHP nel file incluso deve essere racchiuso all'interno dei tag PHP.

```php
<?php
// miofile.php
?>
```

## Require

Il costrutto `require` funziona in modo simile a `include`, ma gestisce gli errori in modo diverso. Se il file specificato non può essere incluso, `require` interrompe l'esecuzione dello script e genera un errore fatale. Al contrario, `include` emette solo un avviso, permettendo allo script di continuare.

```php
<?php
require 'miofile.php'; // Interrompe lo script se il file non viene trovato
?>
```

Per applicazioni PHP complesse o siti CMS, è consigliabile usare `require` per garantire che lo script non continui se manca un file essenziale. Per codici meno critici o siti web semplici, `include` può essere sufficiente, poiché PHP mostrerà l'output anche se il file incluso non viene trovato.

## include_once

L'istruzione `include_once` funziona come `include`, ma garantisce che il file specificato venga incluso solo una volta durante l'esecuzione dello script. Questo è utile per evitare dichiarazioni duplicate o per garantire che il file venga caricato solo una volta.

```php
<?php
include_once 'miofile.php'; // Include solo una volta
?>
```

## require_once

`require_once` si comporta come `require`, ma assicura che il file specificato venga incluso solo una volta, anche se viene chiamato più volte. Questo previene errori causati da dichiarazioni duplicate e garantisce che il file venga caricato una sola volta.

```php
<?php
require_once 'miofile.php'; // Richiede solo una volta
?>
```

## Return

All'interno di un file incluso, puoi utilizzare l'istruzione `return` per restituire un valore. Questo interrompe l'esecuzione del file e restituisce il valore allo script che ha chiamato l'importazione.

```php
<?php
// daImportare.php
return 'OK';
?>
```

Se il valore restituito viene specificato, l'istruzione `include` restituirà quel valore, proprio come una funzione normale.

```php
<?php
// myfile.php
if ((include 'daImportare.php') == 'OK') {
    echo 'OK';
}
?>
```
