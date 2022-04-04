# Introduzione al linguaggio PHP

PHP è prima di tutto un linguaggio interpretato, non è compilato come p.es.il C e non dispone di una macchina virtuale come p.es Java

In PHP (ma anche p.es. in Perl, Python, Ruby, ...) il codice sorgente viene eseguito direttamente
dall’interprete ed è questo a “dialogare” con il processore.

---

La documentazione ufficiale

Perché usare PHP:

* È gratuito;
* È molto utilizzato, sono disponibili moltissimi articoli, librerie, script e tutorial;
* È documentato in modo estremamente dettagliato.
* I principali framework e CMS utilizzati in ambito web sono scritti in PHP.

Su [php.net](www.php.net) si trova un elenco completo delle funzioni e relativi esempi d’uso.

La conoscenza di questo sito web è fondamentale!

---



## Hello World con PHP

```php
<?php
echo "Hello World";
?>
```



## I tag di apertura e chiusura
Il codice PHP può essere incorporato nel codice html di una pagina web, e viceversa. Naturalmente una pagina può contenere esclusivamente codice PHP. In ogni caso bisogna utilizzare gli appositi tag per delimitare il codice PHP: il tag di apertura <?php ed il tag di chiusura ?>. 

La forma proposta non è l’unica, ma per adesso utilizzeremo questa.

---


## echo
echo é il comando utilizzato per gli output a video, lo si utilizzerà parecchio. Si può utilizzare
anche print.



## Doppi apici: ""

Servono ad indicare che si tratta di una stringa
Punto e virgola per terminare le istruzioni;
Ogni dichiarazione in PHP deve terminare con un il punto e virgola.

---


## Estensione

Salvate preferibilmente in un file con estensione .php.
L’impostazione può essere modificata attraverso i file di configurazione del web server



## Variabili

Le variabili sono dei contenitori di informazioni che possiamo definire e modificare nell’esecuzione del nostro script. In PHP le variabili iniziano con il simbolo $ e continuano con lettere e/o numeri ma non possono iniziare con un numero. 
