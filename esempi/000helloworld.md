### Scheda Informativa: Struttura di un Documento HTML con PHP
#### Introduzione
Il codice PHP viene solitamente inserito all'interno di un documento HTML. Questo esempio mostra come integrare PHP in una pagina HTML e come utilizzare i commenti e le operazioni di base in PHP.
#### Codice HTML di Base
```html
<html lang="en">
	<head>
		<title>Hello World</title>
	</head>
	<body>
		<!-- Codice PHP sarà inserito qui -->
	</body>
</html>
```
- `<html lang="en">`: Tag di apertura per il documento HTML, con specifica della lingua (inglese).
- `<head>`: Contiene informazioni meta e il titolo della pagina.
- `<title>Hello World</title>`: Titolo della pagina, visibile nella scheda del browser.
- `<body>`: Contiene il contenuto visibile della pagina.
#### Inserimento di PHP in HTML
```php
<?php
// single-line comments are like this
# or like this (less common)

/* double-line comments are written
like this, so that you can keep typing
     and typing
*/
?>
```
- `<?php ... ?>`: Delimitatori di blocco PHP. Tutto il codice PHP deve essere racchiuso tra questi tag.
- `//`: Commento su una singola linea.
- `#`: Un altro modo di scrivere commenti su una singola linea (meno comune).
- `/* ... */`: Commento su più linee, utile per spiegazioni più lunghe o per blocchi di codice.
#### Esempi di Codice PHP
```php
<?php echo "Hello World!";
?><br />
```
- `<?php echo "Hello World!";
?>`: Utilizza `echo` per stampare "Hello World!" sulla pagina. `echo` è una delle funzioni più comuni in PHP per l'output.
- `<br />`: Tag HTML per andare a capo.
```php
<?php echo "Hello" . " World!";
?><br />
```
- `.`: Operatore di concatenazione in PHP. Unisce due stringhe.
```php
<?php echo 2 + 3;
?>
```
- `2 + 3`: Esegue una semplice operazione aritmetica (addizione) e stampa il risultato (5).
#### Riepilogo
In questo esempio, abbiamo visto:
- Come integrare PHP in un documento HTML.
- I vari tipi di commenti utilizzabili in PHP.
- Come usare `echo` per stampare testo e risultati di espressioni.
- Come concatenare stringhe e fare operazioni aritmetiche di base.
Queste nozioni fondamentali sono essenziali per iniziare a lavorare con PHP e comprendere come interagisce con HTML per creare pagine web dinamiche.