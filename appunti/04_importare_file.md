# Importazione di file

---

## Include

Spesso è necessario richiamare lo stesso codice su più pagine. Questo può essere fatto inserendo prima il codice in un file separato e quindi includendo quel file usando l'istruzione include. Questa istruzione prende tutto il testo nel file specificato e lo include nello script, come se il codice fosse stato copiato in quella posizione. Proprio come echo, include è un costrutto di linguaggio speciale e non una funzione, quindi le parentesi non dovrebbero essere usate.

```php
<?php
includi 'miofile.php';
?>
```

Quando viene incluso un file, l'analisi passa alla modalità HTML all'inizio del file di destinazione e riprende nuovamente la modalità PHP alla fine. Per questo motivo, qualsiasi codice all'interno del file incluso che deve essere eseguito come codice PHP deve essere racchiuso all'interno di tag PHP.

```php
<?php
// miofile.php
?>
```

---

## Require

Il costrutto `require` include e valuta il file specificato. È identico a `include`, tranne nel modo in cui gestisce l'errore. 

Quando l'importazione di un file non riesce, `require` interrompe lo script con un errore; mentre `include` emette solo un avviso. Un'importazione potrebbe non riuscire perché il file non viene trovato o perché l'utente che esegue il server Web non ha accesso in lettura ad esso.

`require 'miofile.php'; // stop in caso di errore`

In genere, è meglio utilizzare `require` per qualsiasi applicazione PHP complessa o sito CMS. In questo modo, l'applicazione non tenta di essere eseguita quando manca un file chiave. 

Per segmenti di codice meno critici e semplici siti Web PHP, `include` può essere sufficiente, nel qual caso PHP mostra l'output, anche se manca il file incluso.

---

## include_once

L'istruzione include_once si comporta come include, tranne per il fatto che se il file specificato è già stato incluso, non viene nuovamente incluso.

`include_once 'miofile.php'; // include solo una volta`

## require_once

L'istruzione require_once funziona come require, ma non importa un file se è già stato importato.

`require_once 'myfile.php'; // richiede solo una volta`

---

## Return

È possibile eseguire un'istruzione di ritorno all'interno di un file importato. Questo interrompe l'esecuzione e ritorna allo script che ha chiamato l'importazione del file.


```php
<?php
// daImportare.php
return 'OK';
?>
```

Se viene specificato un valore restituito, l'istruzione import restituisce quel valore, proprio come una normale funzione.

```php
<?php
// myfile.php
if ((include 'daImportare.php') == 'OK')
echo 'OK'; ?>
```

---

## _Autoload

Per applicazioni Web di grandi dimensioni, il numero di inclusioni richieste in ogni script può essere notevole. Questo può essere evitato definendo una funzione __autoload. Questa funzione viene richiamata automaticamente quando viene utilizzata una classe o un'interfaccia non definita per provare a caricare quella definizione. Richiede un parametro, che è il nome della classe o dell'interfaccia che PHP sta cercando.

```php
function __autoload($nome_classe)
{
  include $nome_classe . '.php';
}
// Attempt to auto include MiaClasse.php
$obj = new MiaClasse();
```