## STORIA

L'8 giugno il danese 1995 **Rasmus Lerdorf** invia un messaggio in un newsgroup ([leggi i suoi messaggi](https://en.wikiquote.org/wiki/Rasmus_Lerdorf)) annunciando il rilascio di "un set di piccoli binari scritti in C", **PHP 1.0** (che, all'inizio, significava "**Personal Home Page**". Le funzioni di **PHP 1.0** sono limitate: registra gli accessi ad un sito tracciando anche i referrers, può fare inclusioni server-side, mostra gli utenti connessi, protegge con password una pagina...

Nelle successive versioni vengono aggiunti il supporto per le query SQL in mSQL (predecessore di MySQL) e la disponibilità di un wrapper cgi (FI, "Form Interpreter", "Interprete di Form"). Intanto, verso la fine del '95, PHP comincia a diventare famoso e viene rinominato in PHP/FI, anche grazie alla possibilità di integrare PHP nelle pagine HTML

Il 12 novembre 1997 arriva PHP/FI 2.0 che, secondo il sito php.net, è usato da circa 50 000 domini.

---

## PHP 3.0

rilasciato il 6 giugno 1998, segna un punto di svolta, in quanto appare lo "Zend Engine", creato dagli israeliani Zeev Suraski and Andi Gutmans. Oltre a questo vengono aggiunti il supporto per altri database e la compatibilità con Windows ed altri sistemi operativi. Cambia anche il nome che da "Personal Home Page" diventa l'attuale "PHP: Hypertext Preprocessor".

## PHP 4.0

porta, il 22 maggio 2000, molte ottimizzazioni. Viene cambiata anche la licenza, che dalla GPL (addottata fin da **PHP 1.0**) passò alla PHP License, più restrittiva ma sempre Open source.

---

## PHP 5

Circa quattro anni dopo, il 13 luglio 2004, viene rilasciato **PHP 5.0**. Molti sono i miglioramenti proposti da questa versione; il principale è l'introduzione dello Zend Engine 2 e il supporto nativo alla programmazione a oggetti.

Nel 2005 la configurazione LAMP (Linux, Apache, MySql, PHP) supera il 50% del totale dei server sulla rete mondiale. 


Nel 2008 PHP 5 è diventata l'unica versione stabile in fase di sviluppo. A partire da PHP 5.3.0 il linguaggio implementa una funzione chiamata "late static binding" che può essere utilizzata per fare riferimento alla classe chiamata in un contesto di eredità statica.

La versione 5 di PHP ha raggiunto la release 5.6 prima di essere abbandonata dal punto di vista dello sviluppo e supporto nel gennaio 2019.

---

## PHP 7

Il 3 dicembre 2015 è stata rilasciata la versione 7, attualmente ancora in fase di sviluppo e attivamente supportata.

## PHP 8

Il 27 novembre 2020 è stata rilasciata la versione 8.
# PHP

<!-- TOC -->

- [PHP](#php)
    - [Individuare il sistema operativo del web server](#individuare-il-sistema-operativo-del-web-server)
    - [Upload di immagini. Ecco la classe!](#upload-di-immagini-ecco-la-classe)
    - [Creare una form per scrivere file di testo](#creare-una-form-per-scrivere-file-di-testo)
    - [Generare un file captcha](#generare-un-file-captcha)
    - [Windows set variabile ambiente php](#windows-set-variabile-ambiente-php)
    - [Passaggio di parametri per riferimento](#passaggio-di-parametri-per-riferimento)
    - [Utilizzo dei parametri default in una funzione](#utilizzo-dei-parametri-default-in-una-funzione)
        - [SCEGLIERE UN COLORE HTML IN MANIERA RANDOM](#scegliere-un-colore-html-in-maniera-random)
        - [REDIRIGERE UNA PAGINA SENZA USARE I META HTML](#redirigere-una-pagina-senza-usare-i-meta-html)
        - [DISTRUGGERE UNA DIRECTORY E IL SUO CONTENUTO](#distruggere-una-directory-e-il-suo-contenuto)
        - [LEGGERE IN MODO SEMPLICE UN FILE XML](#leggere-in-modo-semplice-un-file-xml)

<!-- /TOC -->

## Individuare il sistema operativo del web server

```php
<?php
function serverOS() {
    $sys = strtoupper(PHP_OS); if(substr($sys,0,3) == "WIN") {
        $os = 1; }
elseif($sys == "LINUX") {
    $os = 2; }
else {
    $os = 3; }
return $os; }
echo serverOS(); ?>
```

## Upload di immagini. Ecco la classe!

```php
<?php
class immagini{
public $file;
public $array_estension;
public function __construct($fp, $ext){ $this->file=$fp;
$this->array_estension=$ext; }
public function is_image(){
if(preg_match("§image§", $this->file["type"])) return true; return false;
}
public function get_estention(){ if(!$this->is_image()) return false;
public function ext_allowed(){ foreach($this->array_estension as $value){
if("image/".$value==$this->file["type"]) return true; }
return false; }
if(!$this->ext_allowed()) return false; $splt=explode("/", $this->file["type"]); if($splt[1]=="jpeg") $splt[1]="jpg";
return ".".$splt[1]; }
public function save($new_name, $where){
if(!$this->is_image()) return false;
if(move_uploaded_file($this->file['tmp_name'], $where.$new_name)) return $where.
$new_name; return false;
}
} }
?>
```

## Creare una form per scrivere file di testo

```php
<html>
<head>
<title>Da un form a un file</title> </head>
<body>
<center>
<form method="post" action="#">
<textarea rows="25" cols="40" name="testo"></textarea><br> <input type="submit" value="Invia!">
<input type="reset" value="Cancella!">
</form>
<?php
$testo = $_POST['testo']; if(empty($testo)){
echo "non hai inserito un testo da scrivere nel file!"; }
else {
@$fp = fopen("prova.txt","r") or die("Impossibile aprire il file.<br>"); if(!fputs($fp,$testo)){
echo "Impossibile scrivere il file.<br>"; }
else {
echo "File scritto con successo.<br>";
} }
?>
```

## Generare un file captcha

```php
public function too_much($max_byte){ 
    if($this->file["size"]>$max_byte) 
        return true; 
    return false;

<!-- file form.php -->
<form action="result.php" method="post">
<img alt="Parola casuale" src="image.php">
<input type="text" name="num"><br />
<input type="submit" name="submit" value="Invia">
</form>

<?php
// file per creare l'immagine random header("Content-type: image/png");
$string = "abcdefghijklmnopqrstuvwxyz0123456789"; for($i=0;$i<6;$i++){
$pos = rand(0,36);
$str .= $string{$pos}; }
$img_handle = ImageCreate (60, 20) or die ("impossibile creare l'immagine"); // Dimensione dell'immagine (x,y)
$back_color = ImageColorAllocate($img_handle, 255, 255, 255);
// Colore di sfondo dell'immagine
$txt_color = ImageColorAllocate($img_handle, 0, 0, 0); // Colore del testo
ImageString($img_handle, 31, 5, 0, $str, $txt_color); Imagepng($img_handle);
session_start();
$_SESSION['img_number'] = $str;
?>

<?php
// file che mostra i risultati del form
session_start();
if($_SESSION['img_number'] != $_POST['num']){
echo'La frase che hai inserio non è corretta.<br>
<a href="form.php">Prova ancora</a><br>'; }else{
echo'La frase che hai inserito è corretta<br>'; }
?>
```


## Windows set variabile ambiente php
SET PATH=%PATH%;C:\your\wamp\path\php


## Passaggio di parametri per riferimento
<?php
function aggiungi_qualcosa(&$string)
{
$string .= 'e qualche altra cosa.';
}
$str = 'Questa è una stringa, ';
aggiungi_qualcosa($str);
echo $str;
// l'output sarà 'Questa è una stringa, e qualche altra cosa.'
?>

## Utilizzo dei parametri default in una funzione
<?php
function fare_pizza($pizza = "margherita")
{
return "Vuoi una pizza $pizza.\n";
}
echo fare_pizza();
echo fare_pizza("napoletana");

## tips_ioprogrammo PHP

### SCRIVERE IN UN FILE DI TESTO E PERMETTERNE IL DOWNLOAD

```php
<?
// Ottenere l'indirizzo IP dell'utente e memorizzarlo in un variabile
$stringa = $_SERVER['REMOTE_ADDR'];
// Creare il file da scrivere
$file = fopen($stringa, 'w') or die("impossible aprire il file");
// Scrivere il testo nel file
fwrite($file, $stringa);
// Chiudere il file
fclose($file);
// Forzare il download
$filepath = "/home/percorso/del/file/";
$file = $filepath . $ip; header("Content-type: application/force-downlo
ad");
header("Content-Transfer-Encoding: Binary");
header("Content-length: ".filesize($file)); header("Content-disposition:
attachment; filename=\"".basename($file)."\""); readfile($file);
//Eliminare il file
unlink($stringa);
?>
```

### VISUALIZZARE UN MENU SELECT CON I DATI DI UN ARRAY

```php
<?php
// contenuto dell'array
$mioArray = array('Gatto','Matto','Adatto','Cerbiatto', 'Impatto', 'Intatto');
// valori dal primo array
echo'<select name="parole">';
// per ogni valore dell'array assegniamo una variabile chiamata "parola"
foreach($mioArray as $parola){
echo'<option value="'.$parola.'">'.$parola.'</option>';
}
echo'</select>';
?>
```

### SCEGLIERE UN COLORE HTML IN MANIERA RANDOM

```php
<?php
function coloreRandom()
{
$str = '#';
for($i = 0 ; $i < 6 ; $i++)
{
$numeroRandom = rand(0 , 15);
switch ($numeroRandom) {
case 10: $numeroRandom = 'A'; break;
case 11: $numeroRandom = 'B'; break;
case 12: $numeroRandom = 'C'; break;case 13: $numeroRandom = 'D'; break;
case 14: $numeroRandom = 'E'; break;
case 15: $numeroRandom = 'F'; break;
}
$str .= $numeroRandom;
}
return $str;
}
$colore = coloreRandom();
echo '<span style="color:'.$colore.'">Colore random: '.$colore.'
</span>';
?>
ALTERNARE I COLORI DI RIGO NEI RISULTATI DI UNA
```


### REDIRIGERE UNA PAGINA SENZA USARE I META HTML

```php

<?php
header("Refresh: 3: url=http://www.bogliaccino.it");
?>
<h1>Visiterai il sito bogliaccino fra tre secondi</h1>

```

### DISTRUGGERE UNA DIRECTORY E IL SUO CONTENUTO

```php
<?
function distruggiDir($dir, $virtual = false)
{
$ds = DIRECTORY_SEPARATOR;
$dir = $virtual ? realpath($dir) : $dir;
$dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;
if (is_dir($dir) && $handle = opendir($dir))
{
while ($file = readdir($handle))
{
if ($file == '.' || $file == '..')
{
continue;
}
elseif (is_dir($dir.$ds.$file))
{
distruggiDir($dir.$ds.$file);
}
else
{
unlink($dir.$ds.$file);
}
}
closedir($handle);
rmdir($dir);
return true;
}
else
{
return false;
}
}
?>
```

### LEGGERE IN MODO SEMPLICE UN FILE XML

```php
<?
//stringa xml
$xml_string="<?xml version='1.0'?>
<users>
<user id='398'>
<nome>Pippo</nome>
<email>pippo@dominio.com</nome>
</user>
<user id='867'>
<nome>Pluto</nome>
<email>pluto@dominio.com</nome>
</user>
</users>";
// carico l'xml con simplexml
$xml = simplexml_load_string($xml_string);
// loop attraverso ogni nodo del file
foreach ($xml->user as $user){
// accesso agli attributi del nodo
echo $user['id'], ' ';
// i subnodi sono disponibili tramite l'operatore '->'
echo $user->nome, ' ';
echo $user->email, '<br />';
}
?>
```# Classi astratte

Le classi astratte ci permettono
di specificare con esattezza quali classi e quali metodi devono
obbligatoriamente essere ridefiniti da una sottoclasse per
poter essere utilizzati.

La sottoclasse derivata da una classe astratta, dovrà
obbligatoriamente definire tali metodi astratti 
per far sì che l'ereditarietà venga accettata.

---

## Metodi astratti

Una classe astratta fornisce un'implementazione parziale su cui altre classi possono basarsi. Quando una classe viene dichiarata astratta, significa che la classe può contenere metodi incompleti che devono essere implementati nelle classi figlie, oltre ai normali membri della classe.

In una classe astratta, qualsiasi metodo può essere dichiarato astratto. Questi metodi vengono quindi lasciati non implementati e vengono specificate solo le loro firme, mentre i blocchi di codice vengono sostituiti da punti e virgola.

```php
abstract class FiguraGeometrica
{
  private $x = 100, $y = 100;
  abstract public function getArea();
}
```
  
---

Se una classe eredita da questa classe astratta, è quindi forzata a sovrascrivere il metodo astratto. La firma del metodo deve corrispondere, ad eccezione del livello di accesso, che può essere reso meno ristretto.

```php
class Rettangolo extends FiguraGeometrica
{
  public function getArea()
  {
    return $this->x * $this->y;
  }
}
```

Non è possibile istanziare una classe astratta. Servono solo come genitori per le altre classi, dettando in parte la loro attuazione.
$s = nuova forma(); // errore in fase di compilazione
Tuttavia, una classe astratta può ereditare da una classe non astratta (concreta).

---

## Classi astratte e interfacce

Le classi astratte sono per molti versi simili alle interfacce. Entrambi possono definire le firme dei membri che le classi che ne derivano devono implementare e nessuna di esse può essere istanziata. 

Le differenze principali sono, in primo luogo, che la classe astratta può contenere membri non astratti, mentre l'interfaccia no. 

In secondo luogo, una classe può implementare un numero qualsiasi di interfacce ma ereditare solo da una classe, astratta o meno.

---

## Interfacce

In PHP non è disponibile l'ereditarietà multipla, si può ereditare da una sola classe, astratta o concreta che sia.

* Per ovviare al problema (c.d. *diamond problem*) si possono creare delle interfacce che forniscano le proprietà di più classi.
* Lo scopo delle interfacce è quello di fornire un preciso set di metodi 
base per le classi, mediante la dichiarazione di metodi astratti
* Le interfacce possono avere solo metodi che saranno di default 
astratti e attributi pubblici e costanti.

---

Un'interfaccia specifica i metodi che le classi che utilizzano l'interfaccia devono implementare. Sono definiti con la parola chiave dell'interfaccia, seguita da un nome e un blocco di codice. La loro convenzione di denominazione consiste nell'iniziare con una i piccola e poi avere ogni parola inizialmente in maiuscolo.

`interface iMiaInterfaccia {}`

---

Il blocco di codice per un'interfaccia può contenere firme per metodi di istanza. Questi metodi non possono avere implementazioni. Invece, i loro corpi sono sostituiti da punti e virgola. I metodi di interfaccia devono essere sempre pubblici.

```php
interface iMiaInterfaccia
{
    public function mioMetodo();
}
```

---

Inoltre, le interfacce possono definire **costanti**. Queste costanti di interfaccia si comportano proprio come costanti di classe, tranne per il fatto che non possono essere sovrascritte.

```php
interface iMiaInterfaccia
{
   const PI = 3.14;
}
```

---

## Estendere un'interfaccia

Un'interfaccia non può ereditare da una classe, ma potrebbe ereditare da un'altra interfaccia.

`interface i1 {}`
`interface i2 extends i1 {`}
Operatore ternario
------------------

L’operatore ternario è un ottimo modo per sintetizzare il codice, ma viene spesso abusato. Anche se gli operatori ternari possono essere nidificati, è consigliato usarne uno per riga per leggibilità.

```php
    $a = 5;
    echo ($a == 5) ? 'sì' : 'no';
```
Ecco invece un esempio che sacrifica ogni forma di leggibilità per ridurre il numero delle righe:

```php
    echo ($a) ? ($a == 5) ? 'sì' : 'no' : ($b == 10) ? 'troppo' : ':(';    // eccessiva nidificazione, sacrifica la leggibilità
```

---

Per restituire un valore con gli operatori ternari usa la sintassi corretta.

```php
    $a = 5;
    echo ($a == 5) ? return true : return false;    // questo esempio mostrerà un errore
    
    // contro
    
    $a = 5;
    return ($a == 5) ? 'sì' : 'no';    // questo esempio restituirà 'sì'
```
---

È importante notare che non serve usare l’operatore ternario per restituire un valore booleano. Un esempio:

```php
    $a = 3;
    return ($a == 3) ? true : false; // Restituirà true o false a seconda della condizione $a == 3
    
    // vs
    
    $a = 3;
    return $a == 3; // Restituirà true o false a seconda della condizione $a == 3
```
Lo stesso si può dire per tutte le operazioni (===, !==, !=, == etc.)


---

#### Uso delle parentesi con gli operatori ternari per forma e funzione

Quando usi l’operatore ternario, le parentesi possono fare la loro parte per migliorare la leggibilità e anche per unire più condizioni in blocchi di istruzioni. Un esempio di un uso superfluo delle parentesi è:

```php
    $a = 3;
    return ($a == 3) ? "sì" : "no"; // restituisce sì o no a seconda della condizione $a == 3
    
    // contro
    
    $a = 3;
    return $a == 3 ? "sì" : "no"; // restituisce sì o no a seconda della condizione $a == 3
```
---

Le parentesi permettono anche di creare unioni in un blocco di istruzioni, in modo che il blocco venga controllato come una sola condizione. Ecco un esempio in cui il blocco restituirà true se sia ($a == 3 e $b == 4) che $c == 5 sono veri.

```php
    return ($a == 3 && $b == 4) && $c == 5;
```
Un altro esempio è la porzione qui sotto che restituirà true se ($a != 3 E $b != 4) O $C == 5.

```php
    return ($a != 3 && $b != 4) || $c == 5;
```
*   [Operatore ternario](http://php.net/language.operators.comparison)# Dependency Management: Gestione delle dipendenze

Ci sono un sacco di librerie, framework e componenti PHP tra cui scegliere. 

Il tuo progetto probabilmente utilizzerà molte di esse - sono dipendenze del progetto. 

Fino a poco tempo, PHP non aveva un buon modo per gestire queste dipendenze del progetto. 

Anche se li gestivi manualmente, dovevi comunque preoccuparti dei caricatori automatici. 

Attualmente ci sono due principali sistemi di gestione dei pacchetti per PHP: [Composer] e [PEAR]. 

Il **composer** è attualmente il gestore di pacchetti più popolare per PHP, tuttavia per molto tempo **PEAR** è stato il gestore di pacchetti principale in uso.

Conoscere la storia di PEAR è una buona idea, poiché potresti ancora trovare riferimenti ad essa anche se non la usi mai.

---

## Composer and Packagist

Composer è un **brillante** gestore delle dipendenze per PHP. Elenca le dipendenze del tuo progetto in un file `composer.json` e,
con pochi semplici comandi, Composer scaricherà automaticamente le dipendenze del tuo progetto e configurerà il caricamento automatico per
voi. Composer è analogo a **NPM** nel mondo **node.js** o Bundler nel mondo Ruby.

Esistono già molte librerie PHP compatibili con Composer, pronte per essere utilizzate nel tuo progetto. Questi i "pacchetti" sono elencati su [Packagist](http://packagist.org/), il repository ufficiale per le librerie PHP compatibili con Composer. 

---

### Come installare Composer

Il modo più sicuro per scaricare Composer è [seguendo le istruzioni ufficiali] (https://getcomposer.org/download/).

Ciò verificherà che il programma di installazione non sia danneggiato o manomesso.

Il programma di installazione installa Composer *localmente*, nella directory di lavoro corrente.

Ti consigliamo di installarlo *globalmente* (ad esempio una singola copia in / usr / local / bin) - per farlo, eseguilo in seguito:


`{lang="console"}`
`mv composer.phar /usr/local/bin/composer`


**Note:** Se quanto sopra fallisce a causa dei permessi, aggiungere il prefisso `sudo`.

Per eseguire un compositore installato localmente dovresti usare `php composer.phar`, globalmente è semplicemente` composer`.

---

#### Installare su Windows

Per gli utenti Windows, il modo più semplice per essere operativi è utilizzare il programma di installazione [ComposerSetup], che
esegue un'installazione globale e imposta il tuo `$ PATH` in modo che tu possa semplicemente chiamare` composer` da qualsiasi file
directory nella riga di comando.

---

### Installare Composer (manualmente)

L'installazione manuale di Composer è una tecnica avanzata; tuttavia, ci sono vari motivi per cui a
lo sviluppatore potrebbe preferire questo metodo rispetto all'utilizzo della routine di installazione interattiva. L'interattivo
l'installazione controlla l'installazione di PHP per garantire che:

- viene utilizzata una versione sufficiente di PHP
- I file `.phar` possono essere eseguiti correttamente
- sono sufficienti determinati permessi di directory
- alcune estensioni problematiche non vengono caricate
- alcune impostazioni di `php.ini` sono impostate

Poiché un'installazione manuale non esegue nessuno di questi controlli, è necessario decidere se il compromesso "vale la pena" per te. Pertanto, di seguito è riportato come ottenere Composer manualmente:

`{lang="console"}`

`curl -s https://getcomposer.org/composer.phar -o $HOME/local/bin/composer`
`chmod +x $HOME/local/bin/composer`


Il percorso `$ HOME / local / bin` (o una directory a tua scelta) dovrebbe essere nel tuo ambiente` $ PATH`
variabile. Ciò risulterà nella disponibilità di un comando `composer`.

Quando ti imbatti nella documentazione che afferma di eseguire Composer come `php composer.phar install`, puoi farlo sostituiscilo con:

`{lang="console"}`

`composer install`


This section will assume you have installed composer globally.

---

### Come definire ed installare le Dependencies

Composer tiene traccia delle dipendenze del tuo progetto in un file chiamato `composer.json`. Puoi gestirlo a mano se vuoi, o usa lo stesso Composer. 

Il comando `composer require` aggiunge una dipendenza dal progetto
e se non hai un file `composer.json`, ne verrà creato uno. Ecco un esempio che aggiunge [Twig] come dipendenza del tuo progetto.

`{lang="console"}`

`composer require twig/twig:~1.8`

---

In alternativa, il comando `composer init` ti guiderà attraverso la creazione di un file completo` composer.json` per il tuo progetto. 

In ogni caso, una volta creato il file `composer.json` puoi dire a Composer di farlo
scarica e installa le tue dipendenze nella directory `vendor /`. 

Questo vale anche per i progetti che hai scaricato che fornisce già un file `composer.json`:


`{lang="console"}`

`composer install`


Successivamente, aggiungi questa riga al file PHP principale della tua applicazione; questo dirà a PHP di usare Composer's
caricatore automatico per le dipendenze del progetto.


`{lang="php"}`

`<?php require 'vendor/autoload.php';?>`


Ora puoi usare le dipendenze del tuo progetto e verranno caricate automaticamente su richiesta.

---

### Aggiornare le dependencies

Composer crea un file chiamato `composer.lock` che memorizza la versione esatta di ogni pacchetto scaricato la prima volta che hai eseguito `composer install`. 

Se condividi il tuo progetto con altri, assicurati che il file `composer.lock` sia incluso, in modo che quando eseguono` composer install` lo faranno
ottenere le stesse versioni di te. 

Per aggiornare le tue dipendenze, esegui `composer update`. 
Non usare `composer update` durante la distribuzione, solo` composer install`, altrimenti potresti ritrovarti con un file versioni del pacchetto in produzione.

Ciò è particolarmente utile quando si definiscono i requisiti della versione in modo flessibile. 

Ad esempio, una versione requisito di "~ 1.8" significa "qualsiasi cosa più recente di" 1.8.0 ", ma minore di" 2.0.x-dev "". 

Puoi anche usare il carattere jolly "*" come in "1.8. *". 

Ora il comando `composer update` di Composer aggiornerà tutti i tuoi file
dipendenze dalla versione più recente che si adatta alle restrizioni definite.

---


### ricevere notifiche

Per ricevere notifiche sui nuovi rilasci di versioni è possibile iscriversi a [VersionEye], un servizio web che può monitorare i tuoi account GitHub e BitBucket per i file `composer.json` e inviare e-mail con nuove versioni dei pacchetti.

### Controllare le didendenze e le issues di sicurezza

Il **[Security Advisories Checker]** è un servizio web e uno strumento da riga di comando, entrambi esamineranno il tuo `composer.lock` file e dirti se devi aggiornare le tue dipendenze.

---


### Gestire le dipendenze globali con Composer

Composer può anche gestire le dipendenze globali e i loro binari. L'utilizzo è semplice, tutto ciò di cui hai bisogno
da fare è anteporre al comando "global". Se ad esempio volessi installare PHPUnit e averlo
disponibile a livello globale, dovresti eseguire il seguente comando:


`{lang="console"}`

`composer global require phpunit/phpunit`


Questo creerà una cartella `~ / .composer` dove risiedono le tue dipendenze globali. Per avere installato
binari dei pacchetti disponibili ovunque, dovresti quindi aggiungere la cartella `~ / .composer / vendor / bin` al tuo file
Variabile "$ PATH".

---

## Altro su Composer

* [Packagist](http://packagist.org/)
* [Twig](http://twig.sensiolabs.org)
* [VersionEye](https://www.versioneye.com/)
* [Security Advisories Checker](https://security.sensiolabs.org/)
* [Learn about Composer](http://getcomposer.org/doc/00-intro.md)
* [ComposerSetup](https://getcomposer.org)
# heredoc e nowdoc

## Sintassi heredoc

La sintassi **heredoc** internamente funziona nello stesso modo delle virgolette, ma è adatta per la creazione di stringhe multi-linea senza la necessità di concatenamento.

```php
    $a = 'variabili';
    
    $str = <<<EOD               // inizializzata da <<<
    Esempio di stringa
    che occupa più linee
    utilizzando la sintassi heredoc.
    Le $a sono interpretate.
    EOD;                        // la chiusura di 'EOD' dev'essere su una linea a parte, e senza indentazione
    
    /**
     * Output:
     * Esempio di stringa
     * che occupa più linee
     * utilizzando la sintassi heredoc.
     * Le variabili sono interpretate.
     */
```

*   [Sintassi heredoc](http://php.net/language.types.string#language.types.string.syntax.heredoc)

---

## Sintassi nowdoc

La sintassi **nowdoc** è stata introdotta in PHP 5.3 e internamente funziona nello stesso modo degli apici singoli, ma è adatta per creare stringhe multi-linea senza dover usare il concatenamento.

```php
    $str = <<<'EOD'             // inizializzata da <<<
    Esempio di stringa
    che occupa più linee
    utilizzando la sintassi nowdoc.
    $a non viene interpretato.
    EOD;                        // la chiusura di 'EOD' dev'essere su una linea a parte, e senza indentazione
    
    /**
     * Output:
     * Esempio di stringa
     * che occupa più linee
     * utilizzando la sintassi Nowdoc.
     * $a non viene interpretato.
     */
```

*   [Sintassi nowdoc](http://php.net/language.types.string#language.types.string.syntax.nowdoc)
## Connessione PDO

```php 
/*connessione*/

$database="quiz";

try {
	$connessione = new PDO("mysql:host=localhost;dbname=".$database.";charset=utf8", $user, $password);
	if($connessione){
		global $connessione;
	}

	
} catch (PDOException $e) {
		echo $e->getMessage();
}
```

---

## Connessione MySQLi - object oriented

```php 

    $connessione = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($connessione->connect_errno) {
         die("ERROR : -> ".$connessione->connect_error);
     }
```

---

## Connessione MySQLi - procedural

```php 

$connessione = mysqli_connect(HOST, USER, PASS, DB);

if (mysqli_connect_errno()){
    die("La connessione al db non è riuscita..." . mysqli_connect_error());
}

```# Array

Anche Php prevede la struttura dati array come altri linguaggi, ma rispetto alle tipiche
proprietà che ritroviamo ad es negli array in Java esistono sostanziali differenze.

In php un array è una variabile che permette di associare valori a chiavi.

Le chiavi possono essere di tipo integer o string.

---

## Chiavi di tipo integer

Nel caso di chiavi di tipo integer ritroviamo proprietà simili a quelle note in Java, si veda
l'esempio:

```php
$a[0]='Mario';
$a[1]='Antonio';
. . .
$a[99]='Luisa';
```

in cui l'array $a ha indice numerico da 0 a 99, ogni elemento di $a contiene una stringa.

---

Sarà possibile accedere direttamente a un singolo elemento specificandone l'indice
numerico, es

```php
echo $a[12];
//o prevedere un ciclo per iterare su tutti gli elementi
for ($i=0;$i<100;$i++){
echo $a[$i].”\n”;// oppure echo ”{$a[$i]}\n”;
}
```

Esiste un'altra importante proprietà sui valori che vedremo nel seguito.

---

## Chiavi di tipo string

La 'vera' natura degli array in php è di essere __associativi__, in cui i valori sono associati a chiavi e non sono incasellati in un elenco posizionale.

```php
$nome['Rossi']='Mario';
$nome['Verdi']='Antonio';
. . .
$nome['Bianchi']='Luisa';
```

si perde ogni riferimento posizionale per legare direttamente a ogni cognome il suo nome,
quindi si pone l'accento sul significato dei dati più che al vincolo della struttura.

---

Quindi alla domanda su qual è il nome di Bianchi si può rispondere con

`echo $nome['Bianchi'];`

Diventa meno immediato pensare a come realizzare una iterazione su ogni elemento di un
array di questo tipo, non esiste più un indica numerico che assume valori fra due estremi
noti.

Per questo è previsto un costrutto specifico, foreach.

---

## Foreach

Questo costrutto prevede due forme sintattiche.

### Sintassi array-valore

`foreach (<array_expression> as <variabileValore>) <statement>`

### Permette di iterare su tutti i valori presenti nell'array, es

```php
foreach ($nome as $n) {
echo $n.”\n”; // oppure echo ”$n\n”;
}
```

In questo modo si otterranno tutti i valori (i nomi) ma non si hanno informazioni sulle chiavi
(nel nostro dcaso i cognomi).

Per questo esiste l'altra forma sintattica.

---

### Sintassi array-chiave-valore

```php
foreach (<array_expression> as <variabChiave> => <variabValore>)
<statement>
```

In questo caso l'iterazione fornisce oltra al valore corrente anche la relativa chiave
corrente. Es:

```php
foreach ($nome as $c => $n) {
echo ”$n $c\n”;
}
```

---

Il costrutto foreach può essere usato su qualunque array, anche quelli con chiave
numerica, es:

```php
foreach ($a as $n) {
echo $n.”\n”; // oppure echo ”$n\n”;
}
```

e ancora:

```php
foreach ($a as $c => $n) {
echo ”$n $c\n”;
}
```

La chiave qui è un numero, non più la stringa di cognome.

---

## Proprietà associativa

In php l'array è associativo. Il caso di array a chiave numerica è un caso particolare che
rientra nella condizione generale, per cui possiamo avere array con indice numerico 'con
buchi' e in cui la posizione non è correlata al valore numerico dell'indice.

Esempio 'con buco':

```php
$a[0]='Mario';
$a[1]='Antonio';
$a[99]='Luisa';
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```

---

Esempio in ordine 'casuale':

```php
$a[0]='Mario';
$a[99]='Luisa';
$a[1]='Antonio';
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```

---

Esempio con indici che non partono da 0:

```php
$a[10]='Mario';
$a[11]='Antonio';
$a[99]='Luisa';
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```

Posso comunque iterare per indice solo se i valori sono contigui:

```php
$a[10]='Mario';
$a[11]='Antonio';
$a[12]='Luisa';
for ($i=10;$i<13;$i++) {
echo "$i {$a[$i]}\n";
}
```

---

In caso di 'buchi':

```php
$a[10]='Mario';
$a[11]='Antonio';
$a[22]='Luisa';
for ($i=10;$i<23;$i++) {
echo "$i {$a[$i]}\n";
}
```

Mentre il foreach fa emergere solo i dati 'reali':

```php
$a[10]='Mario';
$a[11]='Antonio';
$a[22]='Luisa';
```

```php
foreach ($a as $key => $value) {
echo "$key $value\n";
```

---

## I valori eterogenei

Altra proprietà che distingue gli array Php da quelli Java è che il valore presente negli
elementi non deve necessariamente essere dello stesso tipo per tutti, cade dunque il
vincolo di omogeneità.

Es:

```php
$a[0]='Mario';
$a[1]='Rossi';
$a[2]=1.85;
$a[3]=true;
$a[4]=10;
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```

e ancora:

```php
$a['nome']='Mario';
$a['cognome']='Rossi';
$a['altezza']=1.85;
$a['coniugato']=true;
$a['dita nelle mani']=10;
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```

---

## Funzione print_r

Comoda per visualizzare in modo compatto i dati di un array. Tipica applicazione è finalizzata al debug.

Es.

```php
$a['nome']='Mario';
$a['cognome']='Rossi';
$a['altezza']=1.85;
$a['coniugato']=true;
$a['dita nelle mani']=10;
print_r($a);
```

---

## Funzione array()

Consente di istanziare un array.

Se priva di parametri restituisce un array vuoto, cioè privo di elementi, es:

`$a=array();`

In questo modo la variabile $a è riconosciuta come array, ache se priva di dati.

Se la funzione array riceve un elenco di parametri nella forma
`array(vl1,val2,val3,.., valN9`

li considera elementi da inserire nell'array, p.es:

`$a=array('Mario','Rossi',1.85,true,10);`
equivale a

```php
$a[0]='Mario';
$a[1]='Rossi';
$a[2]=1.85;
$a[3]=true;
$a[4]=10;
```

---

Infine i parametri passati possono avere la forma chiave=>valore:
`array(k1=>v1, k2=>v2, k3=>v3,..., kN=>vN)`
in questo caso verrà costruito un array associativo.
Ad es:

```php
$a=array('nome'=>'Mario','cognome'=>'Rossi','altezza'=>1.85,'coniugato'=>true,'dita delle mani'=>10);
```

equivale a

```php
$a['nome']='Mario';
$a['cognome']='Rossi';
$a['altezza']=1.85;
$a['coniugato']=true;
$a['dita nelle mani']=10;
```

---

## Costruzione di array in stile JSON

Con la versione 5.4 di PHP è stato introdotto la possibilità di definire un array anche con la scrittura semplificata prevista dal formato JSON, per cui il seguente array

```php
$a = array(
array(1,2),
array(3,4),
);
```

può essere costruito anche in questo modo:

```php
$a = [
[1, 2],
[3, 4],
];
```

Si noti che in entrambi gli esempi la virgola finale prima dell'ultima parentesi non ha funzione di separatore e può essere omessa, ma offre una pratica semplificazione di editing quando si vogliano aggiungere/rimuovere valori nell'array: tutti gli elementi sono seguiti da virgola, dal primo all'ultimo.
# Stringhe

## Tipi di stringhe

Le stringhe sono una serie di caratteri, e fin qui il concetto è piuttosto semplice. Detto questo, ci sono tipi diversi di stringhe che hanno una sintassi e funzionalità leggermente differenti.

### Apici singoli

Gli apici singoli vengono usati per denotare una “stringa letterale”. Le stringhe letterali non eseguono il parsing di caratteri speciali o variabili.

Se usi gli apici singoli, puoi inserire il nome di una variabile così: `'qualche $cosa'` e vedresti l’output esatto `quale $cosa`. Se usi gli apici doppi, la stringa cercherebbe di recuperare la variabile `$cosa` e visualizzerebbe degli errori in caso la variabile non venisse trovata.

---

```php
    echo 'Questa è la mia stringa, guarda come è bella.';    // non serve interpretare una stringa semplice
    
    /**
     * Output:
     *
     * Questa è la mia stringa, guarda come è bella.
     */
```

* [Apici singoli](http://php.net/language.types.string#language.types.string.syntax.single)

---

### Virgolette

Le virgolette sono il coltellno svizzero delle stringhe. Non solo effettuano il parsing delle variabili come abbiamo detto sopra, ma di tutti i caratteri speciali come `\n` per la nuova linea, `\t` per la tabulazione etc.

```php
    echo 'phptherightway è ' . $adjective . '.'  
    // un esempio con apici singoli che usa concatenamento multiplo per
        . "\n"                                      
        // variabili e caratteri di escape
        . 'Adoro imparare' . $code . '!';
        // contro
        echo "phptherightway è $adjective.\n Adoro imparare $code!"    
    
    // Invece del concatenamento multiplo, le virgolette
    // ci permettono di creare una stringa interpretata
```

---

## interpolazione

Gli apici doppi possono contenere variabili; questa si chiama **interpolazione**.

```php
    $juice = 'plum';
    echo "I like $juice juice";    // Output: I like plum juice
```

---

Quando usi l’interpolazione, capita spesso che il nome di una variabile tocchi un altro carattere. Questo renderà impossibile distinguere il nome della variabile dal carattere letterale.

---

## uso delle parentesi graffe

Per ovviare al problema, racchiudi la variabile in un paio di parentesi graffe.

```php
    $juice = 'prugn';
    echo "Ho bevuto del succo fatto con le $juicee";    // $juice non può essere interpetato
    
    // contro
    
    $juice = 'prugn';
    echo "Ho bevuto del succo fatto con le {$juice}e";    // $juice verrà interpretato
    
    /**
     * Anche le variabili complesse possono essere racchiuse tra parentesi graffe
     */
    
    $juice = array('mel', 'banan', 'prugn');
    echo "Ho bevuto del succo fatto con le {$juice[1]}e";   // $juice[1] verrà interpretato
```

* [Virgolette](http://php.net/language.types.string#language.types.string.syntax.double)

---

### Qual è più veloce?

C’è un mito secondo cui gli apici singoli sono più veloci delle stringhe con apici doppi. Non è vero.

Se stai definendo una stringa e non cerchi di concatenare valori o eseguire altre operazioni complicate, allora gli apici singoli e doppi sono identici. Nessuno dei due è più veloce.

Se stai concatenando stringhe multiple di qualunque tipo, o interpolando valori in una stringa con apici doppi, allora i risultati possono variare. Se stai lavorando con un piccolo numero di valori, il concatenamento è di poco più veloce. Con molti valori, l’interpolazione è di poco più veloce.

Indipendentemente da ciò che fai con le stringhe, nessuno dei tipi avrà mai un impatto evidente sulla tua applicazione. Cercare di riscrivere il codice per usare l’uno o l’altro tipo è un esercizio inutile, quindi evita queste micro-ottimizzazioni a meno che tu non capisca realmente il significato e l’impatto delle differenze.

* [Disproving the Single Quotes Performance Myth](http://nikic.github.io/2012/01/09/Disproving-the-Single-Quotes-Performance-Myth.html)

---

## Concatenare elementi

* Se la tua linea eccede la lunghezza raccomandata (120 caratteri), considera il concatenamento
* Per leggibilità è meglio usare gli operatori di concatenamento invece che gli operatori concatenanti di assegnazione
* Se ti trovi nello scope originale della variabile, usa l’indentazione quando il concatenamento occupa una nuova linea

```php
$a  = 'Esempio multi-linea';    // operatore di assegnazione/concatenamento (.=)
$a .= "\n";
$a .= 'di cosa non fare';

// vs

$a = 'Esempio multi-linea'      // operatore di concatenamento (.)
    . "\n"                     // indentazione delle nuove linee
    . 'di cosa fare';
```

* [Operatori delle stringhe](http://php.net/language.operators.string)
# Funzioni per array

* [Elenco completo funzioni per array](https://www.php.net/manual/en/ref.array.php)

* `array_chunk()`
array array_chunk( array input, int dimensione [, bool mantieni_chiavi] )

<?php
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 2));
print_r(array_chunk($input_array, 2, true));
?>

* `array_count_values(), array array_count_values( array input )`

restituisce un array che ha i valori dell'array input per chiavi e la loro frequenza in input come valori.

```php
<?php
$array = array(1, "hello", 1, "world", "hello");
print_r(array_count_values($array));
?>
```
---

* `array array( [mixed ...] )`
Restituisce un array contenente i parametri. Ai parametri si può dare un indice con l'operatore =>.
Leggere la sezione relativa ai tipi per ulteriori informazioni sugli array.
<?php
$array = array(1, 1, 1, 1, 1, 8 => 1, 4 => 1, 19, 3 => 13);
print_r($array);
?>

## esempio
```php
<?php
$primotrimestre = array(1 => 'Gennaio', 'Febbraio', 'Marzo');
print_r($primotrimestre);
?>
```

---

* `bool asort( array array [, int sort_flags] )`
Questa funzione ordina un array in modo tale che i suoi indici mantengano la loro correlazione con
gli elementi ai quali sono associati. Viene usata principalmente nell'ordinamento degli array
associativi, quando la disposizione originaria degli elementi è importante.

* `bool arsort( array array [, int sort_flags] )`
Ordina un array in ordine decrescente e mantiene le associazioni degli indici

* `int count( mixed var [, int mode] )`
Restituisce il numero di elementi in var, la quale è di norma un array, dal momento che qualsiasi
altro oggetto avrà un elemento.

---

* `array each( array array )`
Restituisce la corrente coppia chiave/valore corrente di array e incrementa il puntatore interno
dell'array. Questa coppia è restituita in un array di quattro elementi, con le chiavi 0, 1, key, and value. Gli elementi 0 e key contengono il nome della chiave dell'elemento dell'array, mentre 1 e value contengono i dati.

```php
<?php
$foo = array("bob", "fred", "jussi", "jouni", "egon", "bau");
$bar = each($foo);
print_r($bar);
?>

Array ([1] => bob [value] => bob
[0] => 0 [key] => 0)
```

## Attraversamento di un array con each()

```php
<?php
$frutta = array('a' => 'mela', 'b' => 'pera', 'c' => 'banana');
reset($frutta);
while (list($chiave, $valore) = each($frutta)) {
echo "$chiave => $valore\n";
}
?>
```
---

* `mixed current( array array )`
Restituisce l'elemento corrente di un array
Ogni array ha un puntatore interno all'elemento "corrente", che è inizializzato al primo elemento inserito nell'array. 

La funzione current() restituisce il valore dell'elemento che è attualmente puntato dal puntatore interno. In ogni caso non muove il puntatore. Se il puntatore interno punta oltre la fine della lista di elementi, current() restituisce FALSE.



* `mixed reset( array array )`
reset() riporta il puntatore di array sul primo elemento e ne restituisce il valore.

---

* `mixed next( array array )`
Restituisce l'elemento dell'array che sta nella posizione successiva a quella attuale indicata dal
puntatore interno, oppure FALSE se non ci sono altri elementi.

* `mixed prev( array array )`
Restituisce l'elemento dell'array che sta nella posizione precedente a quella attuale indicata dal
puntatore interno, oppure FALSE se non ci sono altri elementi.

* `mixed end( array array )`
end() fa avanzare il puntatore di array all'ultimo elemento, e restituisce il suo valore.

---

* `bool in_array( mixed ago, array pagliaio [, bool strict] )`
Cerca in pagliaio per trovare ago e restituisce TRUE se viene trovato nell'array, FALSE altrimenti.
```php
<?php
$os = array("MacOs", "Windows", "Android", "Linux");
if (in_array("Android", $os))
echo "Trovato Android";
if (in_array("macos", $os))``
echo "Trovato macos";
?>
```

**NB: La seconda condizione fallisce perché in_array() è case sensitive**

---

## Elenco funzioni

* [array()](http://php.net/manual/en/function.array.php) Crea un array.
* [array_change_key_case()](http://php.net/manual/en/function.array-change-key-case.php) Restituisce un array con tutte le chiavi in minuscolo o maiuscolo.
* [array_chunk()](http://php.net/manual/en/function.array-chunk.php) Divide un array in blocchi di array.
* [array_combine()](http://php.net/manual/en/function.array-combine.php) Crea un array utilizzando un array per le chiavi e un altro per i suoi valori.
* [array_count_values()](http://php.net/manual/en/function.array-count-values.php) Restituisce un array con il numero di occorrenze per ogni valore.
* [array_diff()](http://php.net/manual/en/function.array-diff.php) Confronta i valori dell'array e restituisce le differenze.
* [array_diff_assoc()](http://php.net/manual/en/function.array-diff-assoc.php) Confronta chiavi e valori dell'array e restituisce le differenze.
* [array_diff_key()](http://php.net/manual/en/function.array-diff-key.php) Confronta le chiavi dell'array e restituisce le differenze.
* [array_diff_uassoc()](http://php.net/manual/en/function.array-diff-uassoc.php) Confronta le chiavi ei valori dell'array, con un ulteriore controllo della funzione creata dall'utente, e restituisce le differenze.
* [array_diff_ukey()](http://php.net/manual/en/function.array-diff-ukey.php) Confronta le chiavi dell'array, con un ulteriore controllo della funzione creata dall'utente, e restituisce le differenze.

---

## Elenco funzioni 2

* [array_fill()](http://php.net/manual/en/function.array-fill.php) Riempie un array di valori.
* [array_filter()](http://php.net/manual/en/function.array-filter.php) Filtra gli elementi di un array utilizzando una funzione creata dall'utente.
* [array_flip()](http://php.net/manual/en/function.array-flip.php) Scambia tutte le chiavi con i loro valori associati in un array.
* [array_intersect()](http://php.net/manual/en/function.array-intersect.php) Confronta i valori dell'array e restituisce le corrispondenze.
* [array_intersect_assoc()](http://php.net/manual/en/function.array-intersect-assoc.php) Confronta le chiavi ei valori dell'array e restituisce le corrispondenze.
* [array_intersect_key()](http://php.net/manual/en/function.array-intersect-key.php) Confronta le chiavi dell'array e restituisce le corrispondenze.
* [array_intersect_uassoc()](http://php.net/manual/en/function.array-intersect-uassoc.php) Confronta le chiavi ei valori dell'array, con un ulteriore controllo della funzione creata dall'utente, e restituisce le corrispondenze.
* [array_intersect_ukey()](http://php.net/manual/en/function.array-intersect-ukey.php) Confronta le chiavi dell'array, con un ulteriore controllo della funzione creata dall'utente, e restituisce le corrispondenze.
* [array_key_exists()](http://php.net/manual/en/function.array-key-exists.php) Controlla se la chiave specificata esiste nell'array.
* [array_keys()](http://php.net/manual/en/function.array-keys.php) Restituisce tutte le chiavi di un array.
* [array_map()](http://php.net/manual/en/function.array-map.php) Invia ogni valore di un array a una funzione creata dall'utente, che restituisce nuovi valori.
* [array_merge()](http://php.net/manual/en/function.array-merge.php) Unisce uno o più array in un unico array.
* [array_merge_recursive()](http://php.net/manual/en/function.array-merge-recursive.php) Unisce uno o più array in un unico array.
* [array_multisort()](http://php.net/manual/en/function.array-multisort.php) Ordina array multipli o multidimensionali.

---

## Elenco funzioni 3

* [array_pad()](http://php.net/manual/en/function.array-pad.php) Inserisce un numero specificato di elementi, con un valore specificato, in un array.
* [array_pop()](http://php.net/manual/en/function.array-pop.php) Elimina l'ultimo elemento di un array.
* [array_product()](http://php.net/manual/en/function.array-product.php) Calcola il prodotto dei valori in un array.
* [array_push()](http://php.net/manual/en/function.array-push.php) Inserisce uno o più elementi alla fine di un array.
* [array_rand()](http://php.net/manual/en/function.array-rand.php) Restituisce una o più chiavi casuali da un array.
* [array_reduce()](http://php.net/manual/en/function.array-reduce.php) Restituisce un array come stringa, utilizzando una funzione definita dall'utente.
* [array_reverse()](http://php.net/manual/en/function.array-reverse.php) Restituisce un array nell'ordine inverso.
* [array_search()](http://php.net/manual/en/function.array-search.php) Cerca un array per un dato valore e restituisce la chiave.
* [array_shift()](http://php.net/manual/en/function.array-shift.php) Rimuove il primo elemento da un array e restituisce il valore dell'elemento rimosso.
* [array_slice()](http://php.net/manual/en/function.array-slice.php) Restituisce parti selezionate di un array.
* [array_splice()](http://php.net/manual/en/function.array-splice.php) Rimuove e sostituisce gli elementi specificati di un array.
* [array_sum()](http://php.net/manual/en/function.array-sum.php) Restituisce la somma dei valori in un array.
* [array_udiff()](http://php.net/manual/en/function.array-udiff.php) Confronta i valori dell'array in una funzione creata dall'utente e restituisce un array.
* [array_udiff_assoc()](http://php.net/manual/en/function.array-udiff-assoc.php) Confronta le chiavi dell'array e confronta i valori dell'array in una funzione creata dall'utente e restituisce un array.
* [array_udiff_uassoc()](http://php.net/manual/en/function.array-udiff-uassoc.php) Confronta le chiavi dell'array ei valori dell'array nelle funzioni create dall'utente e restituisce un array.
* [array_uintersect()](http://php.net/manual/en/function.array-uintersect.php) Confronta i valori dell'array in una funzione creata dall'utente e restituisce un array.
* [array_uintersect_assoc()](http://php.net/manual/en/function.array-uintersect-assoc.php) Confronta le chiavi dell'array e confronta i valori dell'array in una funzione creata dall'utente e restituisce un array.
* [array_uintersect_uassoc()](http://php.net/manual/en/function.array-uintersect-uassoc.php) Confronta le chiavi dell'array ei valori dell'array nelle funzioni create dall'utente e restituisce un array.
* [array_unique()](http://php.net/manual/en/function.array-unique.php) Rimuove i valori duplicati da un array.
* [array_unshift()](http://php.net/manual/en/function.array-unshift.php) Aggiunge uno o più elementi all'inizio di un array.

---

## Elenco funzioni 4

* [array_values()](http://php.net/manual/en/function.array-values.php) Restituisce tutti i valori di un array.
* [array_walk()](http://php.net/manual/en/function.array-walk.php) Applica una funzione utente a ogni membro di un array.
* [array_walk_recursive()](http://php.net/manual/en/function.array-walk-recursive.php) Applica una funzione utente in modo ricorsivo a ogni membro di un array.
* [arsort()](http://php.net/manual/en/function.arsort.php) Ordina un array in ordine inverso e mantiene l'associazione dell'indice.
* [asort()](http://php.net/manual/en/function.asort.php) Ordina un array e mantiene l'associazione dell'indice.
* [compact()](http://php.net/manual/en/function.compact.php) Crea un array contenente le variabili ei loro valori.
* [count()](http://php.net/manual/en/function.count.php) Conta gli elementi in un array o le proprietà in un oggetto.
* [current()](http://php.net/manual/en/function.current.php) Restituisce l'elemento corrente in un array.
* [each()](http://php.net/manual/en/function.each.php) Restituisce la coppia chiave e valore corrente da un array.
* [end()](http://php.net/manual/en/function.end.php) Imposta il puntatore interno di un array al suo ultimo elemento.
* [extract()](http://php.net/manual/en/function.extract.php) Importa le variabili nella tabella dei simboli corrente da un array.
* [in_array()](http://php.net/manual/en/function.in-array.php) Controlla se un valore specificato esiste in un array.
* [key()](http://php.net/manual/en/function.key.php) Recupera una chiave da un array.
* [krsort()](http://php.net/manual/en/function.krsort.php) Ordina un array per chiave in ordine inverso.
* [ksort()](http://php.net/manual/en/function.ksort.php) Ordina un array per chiave.
* [list()](http://php.net/manual/en/function.list.php) Assegna le variabili come se fossero un array.

---

## Elenco funzioni 5

* [natcasesort()](http://php.net/manual/en/function.natcasesort.php) Ordina un array usando un " natural="" order"="" algoritmi"=" senza distinzione tra maiuscole e minuscole: natcaseso.
* [natsort()](http://php.net/manual/en/function.natsort.php) Ordina un array usando un " natural="" order"="" algoritmi"=": natso.
* [next()](http://php.net/manual/en/function.next.php) Avanza il puntatore all'array interno di un array.
* [()](http://php.net/manual/en/function.current.php) Alias di current(): p.
* [prev()](http://php.net/manual/en/function.prev.php) Riavvolge il puntatore dell'array interno.
* [range()](http://php.net/manual/en/function.range.php) Crea un array contenente un intervallo di elementi.
* [reset()](http://php.net/manual/en/function.reset.php) Imposta il puntatore interno di un array al suo primo elemento.
* [rsort()](http://php.net/manual/en/function.rsort.php) Ordina un array in ordine inverso.
* [shuffle()](http://php.net/manual/en/function.shuffle.php) Mescola un array.
* [()](http://php.net/manual/en/function.count.php) Alias di count(): size.
* [sort()](http://php.net/manual/en/function.sort.php) Ordina un array.
* [uasort()](http://php.net/manual/en/function.uasort.php) Ordina un array con una funzione definita dall'utente e mantiene l'associazione dell'indice.
* [uksort()](http://php.net/manual/en/function.uksort.php) Ordina un array per chiavi utilizzando una funzione definita dall'utente.
* [usort()](http://php.net/manual/en/function.usort.php) Ordina un array per valori utilizzando una funzione definita dall'utente.
# metodi magici

I **metodi magici** sono metodi speciali che sovrascrivono l'azione predefinita di PHP quando determinate azioni vengono eseguite su un oggetto.
Attenzione

Tutti i nomi dei metodi che iniziano con `__` sono riservati da PHP. Pertanto, **non è consigliabile utilizzare tali nomi di metodi** a meno che non si sovrascriva il comportamento di PHP.

I seguenti nomi di metodi sono considerati **magici**: 
* `__construct()`, 
* `__destruct()`, 
* `__call()`, 
* `__callStatic()`, 
* `__get()`, 
* `__set()`, 
* `__isset()`, 
* `__unset()`, 
* `__sleep()`, 
* `__wakeup()`, 
* `__serialize`( ), 
* `__unserialize()`, 
* `__toString()`, 
* `__invoke()`, 
* `__set_state()`, 
* `__clone(`) e 
* `__debugInfo()`.

---

## Metodi `public`

Tutti i **metodi magici**, ad eccezione di `__construct()`, `__destruct()` e `__clone()`, devono essere dichiarati come pubblici, altrimenti viene emesso un E_WARNING. Prima di PHP 8.0.0, non veniva emessa alcuna diagnostica per i **metodi magici** `__sleep()`, `__wakeup()`, `__serialize()`, `__unserialize()` e `__set_state()`.


Se le dichiarazioni di tipo sono utilizzate nella definizione di un metodo magico, devono essere identiche alla firma descritta in questo documento. In caso contrario, viene emesso un errore irreversibile. Prima di PHP 8.0.0, non veniva emessa alcuna diagnostica. Tuttavia, `__construct()` e `__destruct()` non devono dichiarare un tipo restituito; in caso contrario viene emesso un errore fatale.
# Namespace globale

Per organizzare meglio il codice sorgente sorgente, in PHP puoi usare il concetto di namespace. 

Introdotto dalla versione 5.3.0, è utile per evitare collisioni di nomi e per creare alias.

* `namespace Foo;`
* `namespace Foo\Bar;`
* `namespace Foo\Bar\subnamespace;`

---

## esempio d'uso

```php
    namespace phptherightway;
    
    function fopen()
    {
        $file = \fopen();    // Il nome della nostra funzione è lo stesso di una nativa.
                             // Esegui la funzione native aggiungendo '\'.
    }
    
    function array()
    {
        $iterator = new \ArrayIterator();    // ArrayIterator è una classe nativa. Usare il suo nome senza un backslash
                                             // significa cercare di risolverla nel tuo namespace.
    }
```

---

## Attenzione

Quando usi i namespace, potresti scoprire che le funzioni native sono nascoste dalle funzioni che hai scritto. 
Per sistemarlo, riferisciti alla funzione globale mettendo un backslash prima del nome della funzione.

*   [PHP namespace](http://php.net/manual/it/language.namespaces.php)# PHP

PHP, acronimo per "PHP: Hypertext Preprocessor" (PHP: Preprocessore di Ipertesti, è una sigla ricorsiva), è un linguaggio di programmazione general-purpose (per svariati utilizzi) open source molto utilizzato soprattutto nell'ambito della programmazione web.

La sua sintassi è basata su quella del C, del Java e del Perl.

Il linguaggio PHP è uno tra i più semplici attualmente in uso con funzioni intuitive e con una guida online molto esaustiva (disponibile al sito php.net). Per costruire siti web dinamici, l'uso del linguaggio PHP insieme ad un database (come ad esempio MySql) e ad un webserver (come ad esempio Apache), offre innumerevoli funzioni così che la gestione delle informazioni si è molto semplificata.

---

## Alcune caratteristiche

* La **dinamicità**: le pagine in HTML sono statiche.
* La **semplicità**: il linguaggio PHP è semplice da sviluppare, gestire e modificare.
* La grandissima **varietà di funzioni**: nel sito www.php.net è visualizzabile la documentazione completa del PHP con tutte le funzioni disponibili all'uso.
* Il **costo**: dato da non sottovalutare è il costo. Il php è Open Source, non ha limitazioni di sorta.
* La **comunità**: una enorme comunità di sviluppatori e moltissima documentazione e tutorial online.

## COME FUNZIONA

Fin dalla sua prima uscita, PHP è stato un linguaggio fortemente orientato al web.
Le tre principali aree di utilizzo di PHP sono:

* Server side scripting - scripting lato server per il web
* Shell scripting - scripting a riga di comando
* Applicazioni desktop

---

## SERVER-SIDE-SCRIPTING

Questo ambito di utilizzo è il più tradizionale ed il più diffuso. PHP consente di generare in maniera dinamica le pagine web. Per utilizzare PHP in questo ambito occorrono:

* un server web
* l'interprete PHP
* un browser web

Durante il caricamento di una pagina Web, il browser del client invia una richiesta HTTP al web server, il quale si incarica di restituirgli una risposta, normalmente una "pagina" web contenente codice HTML, oppure un'immagine o un altro tipo di documento.

Nel caso sia una pagina scritta in HTML, una volta ricevuta il browser è in grado di disegnarne il contenuto sullo schermo interpretando il linguaggio di markup.

---

Le pagine nelle quali è presente codice PHP, che sono memorizzate sul server, non sono direttamente lette ed interpretate dal browser ma vengono interpretate da un modulo aggiuntivo del web server che è appunto il modulo PHP.

Normalmente le pagine contenente codice PHP devono avere una estensione di tipo ".php" ma, configurando opportunamente il server, è possibile utilizzare anche estensione ".html" o altro.

Tutte le volte che al web server viene fatta la richiesta di una pagina, questa viene analizzata da esso. Se all'interno della pagina viene riconosciuta la presenza di codice PHP, questo viene interpretata dal modulo PHP che si preoccuperà eventualmente di trasformarla nel formato HTML, direttamente interpretabile dal browser richiedente.

Il susseguirsi logico delle varie fasi è il seguente:

1. l'utente richiama la pagina (inserendo l'URL o cliccando un link)
2. il browser inoltra la richiesta al web server
3. il web server cerca la pagina (il file) richiesto
4. se la pagina contiene codice PHP viene passata al modulo PHP, altrimenti si va al punto 6
5. il modulo PHP interpreta la pagina PHP e restituisce la corrispondente pagina HTML
6. la pagina "HTML" viene spedita al browser richiedente
7. il browser, una volta ricevuta la pagina, la legge e la disegna a monitor

---

Una pagina web è da considerare composta da due componenti fondamentali: la struttura o layout e il contenuto. Per layout intendiamo tutto ciò che descrive come la pagina deve essere disegnata, tabelle, colori, fonts, frames... in generale tutto ciò che può essere definito mediante il linguaggio HTML. Per contenuto consideriamo, per semplicità, tutto ciò che non è struttura ma informazione che la pagina ci offre. In un sito web di solito la struttura resta all'incirca la stessa per tutte le pagine. Quel che cambia è il contenuto.

Per facilitare il lavoro ai webmaster la soluzione sarebbe quella di poter separare "fisicamente" il contenuto delle pagine dalla loro struttura. Il PHP viene in aiuto soprattutto in tali situazioni: generalmente un pagina viene costruita memorizzando in un file la struttura (della generica pagina) e in un database il contenuto. In questo modo quello che è il compito dell'interprete PHP è quello di assemblare la pagina inserendo il contenuto caricato dal database nella struttura.

---

Il funzionamento a questo punto differisce leggermente da quello sopra riportato in quanto il punto 5 si modifica in questo modo:
il modulo PHP interpreta la pagina PHP, richiede al database il contenuto da inserire, genera e restituisce la corrispondente pagina HTML.
In realtà, esistono anche altre possibilità: si può modificare il mime type con l'istruzione
`<?php header("Content-type: Linguaggio contenuto"); ?>`

oppure tramite particolari estensioni di PHP come le librerie GD è possibile creare delle immagini e restituire quindi non una pagina HTML bensì un'immagine vera e propria.
# FUNZIONI PER LE STRINGHE

* `string rtrim ( string str [, string charlist] )`
Questa funzione restituisce la stringa str a cui sono stati rimossi gli spazi finali. Senza la specifica
del secondo parametro rtrim() rimuoverà i seguenti caratteri:
" " (ASCII 32 (0x20)), spazio ordinario.
"\t" (ASCII 9 (0x09)), tab.
"\n" (ASCII 10 (0x0A)), newline (line feed).
"\r" (ASCII 13 (0x0D)), carriage return.
"\0" (ASCII 0 (0x00)), il byte NUL.
"\x0B" (ASCII 11 (0x0B)), il tab verticale.


* `string chr ( int ascii )`
La funzione restituisce una stringa di un carattere contenente il carattere indicato come codifica
ASCII nel parametro ascii. La funzione è complementare di ord().

* `array explode ( string separator, string string [, int limit] )`
Questa funzione restituisce una matrice di stringhe, ciascuna delle quali è una parte di string
ottenuta dividendo la stringa originale utilizzando separator come separatore di stringa. Se si
imposta limit la matrice restituita conterrà al massimo limit elementi di cui l'ultimo conterrà la parte
restante di string.

---

* `int fprintf ( resource handle, string format [, mixed args [, mixed ...]] )`
La funzione scrive una stringa formattata in base al parametro format nello stream indicato dal
parametro handle. I valori per il parametro format sono descritti nella documentazione della
funzione sprintf().

* `string implode ( string glue, array pieces )`
Restituisce una stringa contenente tutti gli elementi di una matrice nel medesimo ordine, inserendo
il parametro glue tra un elemento e l'altro.

* `string ltrim ( string str [, string charlist] )`
Come rtrim, ma lavora dall’inizio della stringa str.

* `int ord ( string string )`
Restituisce il valore ASCII del primo carattere di string. È complementare di chr().

* `int strcmp ( string str1, string str2 )`
Restituisce < 0 se str1 è minore di str2; > 0 se str1 è maggiore di str2, e 0 se sono uguali.
Attenzione: il confronto tiene conto delle lettere maiuscole e minuscole.

---

* `int strcasecmp ( string str1, string str2 )`
Restituisce < 0 se str1 è minore di str2; > 0 se str1 è maggiore di str2, e 0 se sono uguali. Confronto
non sensibile alle maiuscole e sicuro con i dati binari.

* `int strlen ( string string )`

Restituisce la lunghezza della stringa string.

* `string strstr ( string haystack, string needle )`
Restituisce la parte della stringa haystack dalla prima occorrenza di needle fino alla fine di

haystack. Se non si trova needle, restituisce FALSE.

* `string strtolower ( string str )`

La funzione restituisce la stringa string con tutti i caratteri alfabetici convertiti in minuscolo.

* `string strtoupper ( string string )`

Restituisce la stringa string con i caratteri alfabetici convertiti in maiuscolo.

---

* `mixed str_replace ( mixed search, mixed replace, mixed subject [, int &count] )`

Questa funzione restituisce una stringa, od una matrice, con tutte le occorrenze di search nella
stringa subject sostituite con il valore del parametro replace.

* `string substr ( string string, int start [, int length] )`

La funzione substr() restituisce la porzione di string indicata dai parametri start e length. Se start
non è negativo, la stringa restituita inizierà dalla posizione start di string, partendo da zero.

* `string trim ( string str [, string charlist] )`

Questa funzione restituisce il parametro str privo degli spazi iniziali e finali.

---

## Elenco funzioni

* [addcslashes() - "Restituisce una stringa con barre rovesciate davanti ai caratteri specificati"](http://php.net/manual/en/function.addcslashes.php)
* [addslashes() - "Restituisce una stringa con barre rovesciate davanti a caratteri predefiniti"](http://php.net/manual/en/function.addslashes.php)
* [bin2hex() - "Converte una stringa di caratteri ASCII in valori esadecimali"](http://php.net/manual/en/function.bin2hex.php)
* [chop() - "Alias di rtrim()"](http://php.net/manual/en/function.rtrim.php)
* [chr() - "Restituisce un carattere da un valore ASCII specificato"](http://php.net/manual/en/function.chr.php)
* [chunk_split() - "Divide una stringa in una serie di parti più piccole"](http://php.net/manual/en/function.chunk-split.php)
* [convert_cyr_string() - "Converte una stringa da un set di caratteri cirillici a un altro"](http://php.net/manual/en/function.convert-cyr-string.php)
* [convert_uudecode() - "Decodifica una stringa uuencoded"](http://php.net/manual/en/function.convert-uudecode.php)
* [convert_uuencode() - "Codifica una stringa usando l'algoritmo uuencode"](http://php.net/manual/en/function.convert-uuencode.php)
* [count_chars() - "Restituisce quante volte un carattere ASCII ricorre all'interno di una stringa e restituisce le informazioni"](http://php.net/manual/en/function.count-chars.php)
* [crc32() - "Calcola un CRC a 32 bit per una stringa"](http://php.net/manual/en/function.crc32.php)
* [crypt() - "Crittografia stringa unidirezionale (hashing)"](http://php.net/manual/en/function.crypt.php)

---

## Elenco funzioni 1

* [echo() - "Emette stringhe"](http://php.net/manual/en/function.echo.php)
* [explode() - "Spezza una stringa in un array"](http://php.net/manual/en/function.explode.php)
* [fprintf() - "Scrive una stringa formattata in un flusso di output specificato"](http://php.net/manual/en/function.fprintf.php)
* [get_html_translation_table() - "Restituisce la tabella di traduzione utilizzata da htmlspecialchars() e htmlentities()"](http://php.net/manual/en/function.htmlspecialchars.php)
* [hebrev() - "Converte il testo ebraico in testo visivo"](http://php.net/manual/en/function.hebrev.php)
* [hebrevc() - "Converte il testo ebraico in testo visivo e le nuove righe (\n) in <br />"](http://php.net/manual/en/function.hebrevc.php)
* [html_entity_decode() - "Converte le entità HTML in caratteri"](http://php.net/manual/en/function.html-entity-decode.php)
* [htmlentities() - "Converte i caratteri in entità HTML"](http://php.net/manual/en/function.htmlentities.php)
* [htmlspecialchars_decode() - "Converte alcune entità HTML predefinite in caratteri"](http://php.net/manual/en/function.htmlspecialchars-decode.php)
* [htmlspecialchars() - "Converte alcuni caratteri predefiniti in entità HTML"](http://php.net/manual/en/function.htmlspecialchars.php)
* [implode() - "Restituisce una stringa dagli elementi di un array"](http://php.net/manual/en/function.implode.php)
* [join() - "Alias di implode()"](http://php.net/manual/en/function.join.php)
* [levenshtein() - "Restituisce la distanza di Levenshtein tra due stringhe"](http://php.net/manual/en/function.levenshtein.php)
* [localeconv() - "Restituisce informazioni sulla formattazione numerica e monetaria locale"](http://php.net/manual/en/function.localeconv.php)
* [ltrim() - "Elimina gli spazi bianchi dal lato sinistro di una stringa"](http://php.net/manual/en/function.ltrim.php)

---

## Elenco funzioni 2

* [md5() - "Calcola l'hash MD5 di una stringa"](http://php.net/manual/en/function.md5.php)
* [md5_file() - "Calcola l'hash MD5 di un file"](http://php.net/manual/en/function.md5-file.php)
* [metaphone() - "Calcola la chiave metafonica di una stringa"](http://php.net/manual/en/function.metaphone.php)
* [money_format() - "Restituisce una stringa formattata come una stringa di valuta"](http://php.net/manual/en/function.money-format.php)
* [nl_langinfo() - "Restituisce informazioni locali specifiche"](http://php.net/manual/en/function.nl-langinfo.php)
* [nl2br() - "Inserisce interruzioni di riga HTML davanti a ogni nuova riga in una stringa"](http://php.net/manual/en/function.nl2br.php)
* [number_format() - "Formatta un numero con migliaia raggruppate"](http://php.net/manual/en/function.number-format.php)
* [ord() - "Restituisce il valore ASCII del primo carattere di una stringa"](http://php.net/manual/en/function.ord.php)
* [parse_str() - "Analizza una stringa di query in variabili"](http://php.net/manual/en/function.parse-str.php)
* [print() - "Emette una stringa"](http://php.net/manual/en/function.print.php)
* [printf() - "Emette una stringa formattata"](http://php.net/manual/en/function.printf.php)
* [quoted_printable_decode() - "Decodifica una stringa stampabile tra virgolette"](http://php.net/manual/en/function.quoted-printable-decode.php)
* [quotemeta() - "Quote meta caratteri"](http://php.net/manual/en/function.quotemeta.php)
* [rtrim() - "Elimina gli spazi bianchi dal lato destro di una stringa"](http://php.net/manual/en/function.rtrim.php)
* [setlocale() - "Imposta informazioni locali"](http://php.net/manual/en/function.setlocale.php)
* [sha1() - "Calcola l'hash SHA-1 di una stringa"](http://php.net/manual/en/function.sha1.php)
* [sha1_file() - "Calcola l'hash SHA-1 di un file"](http://php.net/manual/en/function.sha1-file.php)
* [similar_text() - "Calcola la somiglianza tra due stringhe"](http://php.net/manual/en/function.similar-text.php)
* [soundex() - "Calcola la chiave soundex di una stringa"](http://php.net/manual/en/function.soundex.php)
* [sprintf() - "Scrive una stringa formattata in una variabile"](http://php.net/manual/en/function.sprintf.php)
* [sscanf() - "Analizza l'input da una stringa in base a un formato"](http://php.net/manual/en/function.sscanf.php)

---

## Elenco funzioni 3

* [str_ireplace() - "Sostituisce alcuni caratteri in una stringa (case-insensitive)"](http://php.net/manual/en/function.str-ireplace.php)
* [str_pad() - "Aggiunge una nuova lunghezza a una stringa"](http://php.net/manual/en/function.str-pad.php)
* [str_repeat() - "Ripete una stringa un numero specificato di volte"](http://php.net/manual/en/function.str-repeat.php)
* [str_replace() - "Sostituisce alcuni caratteri in una stringa (case-sensitive)"](http://php.net/manual/en/function.str-replace.php)
* [str_rot13() - "Esegue la codifica ROT13 su una stringa"](http://php.net/manual/en/function.str-rot13.php)
* [str_shuffle() - "Mescola casualmente tutti i caratteri in una stringa"](http://php.net/manual/en/function.str-shuffle.php)
* [str_split() - "Divide una stringa in un array"](http://php.net/manual/en/function.str-split.php)
* [str_word_count() - "Conta il numero di parole in una stringa"](http://php.net/manual/en/function.str-word-count.php)
* [strcasecmp() - "Confronta due stringhe (senza distinzione tra maiuscole e minuscole)"](http://php.net/manual/en/function.strcasecmp.php)
* [strchr() - "Trova la prima occorrenza di una stringa all'interno di un'altra stringa (alias di strstr())"](http://php.net/manual/en/function.strchr.php)
* [strcmp() - "Confronta due stringhe (case-sensitive)"](http://php.net/manual/en/function.strcmp.php)
* [strcoll() - "Confronto di stringhe basato sulla locale"](http://php.net/manual/en/function.strcoll.php)
* [strcspn() - "Restituisce il numero di caratteri trovati in una stringa prima che venga trovata qualsiasi parte di alcuni caratteri specificati"](http://php.net/manual/en/function.strcspn.php)
* [strip_tags() - "Rimuove i tag HTML e PHP da una stringa"](http://php.net/manual/en/function.strip-tags.php)
* [stripcslashes() - "Rimuove le virgolette da una stringa tra virgolette con addcslashes()"](http://php.net/manual/en/function.addcslashes.php)
* [stripslashes() - "Rimuove le virgolette da una stringa tra virgolette con addslashes()"](http://php.net/manual/en/function.addslashes.php)
* [stripos() - "Restituisce la posizione della prima occorrenza di una stringa all'interno di un'altra stringa (case-insensitive)"](http://php.net/manual/en/function.stripos.php)
* [stristr() - "Trova la prima occorrenza di una stringa all'interno di un'altra stringa (senza distinzione tra maiuscole e minuscole)"](http://php.net/manual/en/function.stristr.php)
* [strlen() - "Restituisce la lunghezza di una stringa"](http://php.net/manual/en/function.strlen.php)

---

## Elenco funzioni 4

* [strnatcasecmp() - "Confronta due stringhe usando un " natural="" order"="" algoritmi="" (case-insensitive)"=""](http://php.net/manual/en/function .strnatcasecmp.php)
* [strnatcmp() - "Confronta due stringhe usando un " natural="" order"="" algoritmi="" (case-sensitive)"=""](http://php.net/manual/en/function .strnatcmp.php)
* [strncasecmp() - "Confronto tra stringhe dei primi n caratteri (senza distinzione tra maiuscole e minuscole)"](http://php.net/manual/en/function.strncasecmp.php)
* [strncmp() - "Confronto tra stringhe dei primi n caratteri (case-sensitive)"](http://php.net/manual/en/function.strncmp.php)
* [strpbrk() - "Cerca una stringa per qualsiasi set di caratteri"](http://php.net/manual/en/function.strpbrk.php)
* [strpos() - "Restituisce la posizione della prima occorrenza di una stringa all'interno di un'altra stringa (case-sensitive)"](http://php.net/manual/en/function.strpos.php)
* [strrchr() - "Trova l'ultima occorrenza di una stringa all'interno di un'altra stringa"](http://php.net/manual/en/function.strrchr.php)
* [strrev() - "Inverte una stringa"](http://php.net/manual/en/function.strrev.php)
* [strripos() - "Trova la posizione dell'ultima occorrenza di una stringa all'interno di un'altra stringa (case-insensitive)"](http://php.net/manual/en/function.strripos.php)
* [strrpos() - "Trova la posizione dell'ultima occorrenza di una stringa all'interno di un'altra stringa (case-sensitive)"](http://php.net/manual/en/function.strrpos.php)
* [strspn() - "Restituisce il numero di caratteri trovati in una stringa che contiene solo caratteri da un charlist specificato"](http://php.net/manual/en/function.strspn.php)

---

## Elenco funzioni 5

* [strstr() - "Trova la prima occorrenza di una stringa all'interno di un'altra stringa (case-sensitive)"](http://php.net/manual/en/function.strstr.php)
* [strtok() - "Divide una stringa in stringhe più piccole"](http://php.net/manual/en/function.strtok.php)
* [strtolower() - "Converte una stringa in lettere minuscole"](http://php.net/manual/en/function.strtolower.php)
* [strtoupper() - "Converte una stringa in lettere maiuscole"](http://php.net/manual/en/function.strtoupper.php)
* [strtr() - "Traduce determinati caratteri in una stringa"](http://php.net/manual/en/function.strtr.php)
* [substr() - "Restituisce una parte di una stringa"](http://php.net/manual/en/function.substr.php)
* [substr_compare() - "Confronta due stringhe da una posizione iniziale specificata (binary safe e facoltativamente case-sensitive)"](http://php.net/manual/en/function.substr-compare.php)
* [substr_count() - "Conta il numero di volte in cui una sottostringa si verifica in una stringa"](http://php.net/manual/en/function.substr-count.php)
* [substr_replace() - "Sostituisce una parte di una stringa con un'altra stringa"](http://php.net/manual/en/function.substr-replace.php)
* [trim() - "Elimina gli spazi bianchi da entrambi i lati di una stringa"](http://php.net/manual/en/function.trim.php)
* [ucfirst() - "Converte il primo carattere di una stringa in maiuscolo"](http://php.net/manual/en/function.ucfirst.php)
* [ucwords() - "Converte il primo carattere di ogni parola in una stringa in maiuscolo"](http://php.net/manual/en/function.ucwords.php)
* [vfprintf() - "Scrive una stringa formattata in un flusso di output specificato"](http://php.net/manual/en/function.vfprintf.php)
* [vprintf() - "Emette una stringa formattata"](http://php.net/manual/en/function.vprintf.php)
* [vsprintf() - "Scrive una stringa formattata in una variabile"](http://php.net/manual/en/function.vsprintf.php)
* [wordwrap() - "Avvolge una stringa in un dato numero di caratteri"](http://php.net/manual/en/function.wordwrap.php)
# **Lavorare con le variabili**

In PHP le variabili sono identificate dal simbolo **$** che precede il nome della variabile stessa. 

Il primo carattere dopo il $ **non può essere un numero** o un **carattere speciale**, solo una lettera o un carattere underline (_).

---

## Variabili non tipizzate

Il linguaggio PHP è un linguaggio chiamato a **tipizzazione debole**, non richiede alcuna dichiarazione di variabile: una variabile è tale dalla prima riga nella quale se ne fa uso.

L'istruzione fondamentale che è possibile eseguire con una variabile è l'**assegnazione**, che imposta (assegna) il valore contenuto dalla variabile. 

La sintassi è

`$nome = valore`

dove _valore_ è un'**espressione** valida per PHP (per espressione si intende una sequenza di dati, operatori e/o variabili che restituisca un valore). 

---

## Tipi di dato

Data Type|Category|Description
---|---|---
int|Scalar|Integer
float|Scalar|Floating-point number
bool|Scalar|Boolean value
string|Scalar|Series of characters
array|Composite|Collection of values
object|Composite|User-defined data type
resource|Special|External resource
callable|Special|Function or method
null|Special|No value

---

## fare riferimento ad una variabile

Per fare riferimento ad una variabile e al suo valore sarà necessario semplicemente riferirsi al nome; si noti che PHP è case-sensitive, quindi $var e $Var sono due variabili differenti. 

#### **Variabili per valore e per riferimento**

Le variabili PHP sono solitamente passate per **valore**:
quando una variabile viene assegnata ad un'altra in realtà viene assegnato ad una variabile **una copia del valore dell'altra**, ma le due variabili identificano comunque due celle di memoria differenti. 

Ad esempio:
```php
$var1 = 3;
$var2 = $var1 //ora $var2 contiene il valore 3
$var2 = 4 //in questo caso non cambia il valore di $var1 ma solo quello di $var2
```
---

Talvolta, soprattutto per quanto riguarda l'uso di funzioni, è comodo aver due variabili che puntino alla stessa cella di memoria. 

Per fare ciò si assegnano le **variabili per riferimento** usando la sintassi:

`$var1 = &$var2`

Ad esempio

```php
$var1 = 3;
$var2 = &$var1 //ora $var2 e $var1 puntano alla stessa cella di memoria
$var2 = 4 //ora $var1 e $var2 contengono entrambe il valore 4
```

---

#### **Costanti**

Può essere comodo durante la programmazione definire valori **costanti**, cioè riutilizzabili nel codice. 

La differenza sostanziale tra costanti e varibili sta nel fatto che le prime, a differenza delle seconde, non
possono essere modificate. 
Per definire una costante si usa la sintassi:

`define("NOME_COSTANTE", valore);`

e per richiamarle si usa semplicemente il loro nome:

`echo NOME_COSTANTE;`

---

## costanti predefinite

Esistono alcune **costanti predefinite**, che sono valide cioè in tutti gli script:


* __FILE__:
	restituisce il percorso completo e il nome del file 

* __LINE__:
	restituisce il numero di riga in cui si trova la costante  

* __FUNCTION__
	restituisce il nome della funzione in cui la costante è richiamata 

* __CLASS__:
	restituisce il nome della classe in cui la costante è richiamata.


---


## Dichiarazioni di variabili


```php
    <?php
    $about = 'Una stringa molto lunga';    // usa 2MB di memoria
    echo $about;
    
    // contro
    
    echo 'Una stringa molto lunga';        // usa 1MB di memoria
```

*   [Consigli sulle prestazioni](https://developers.google.com/speed/articles/optimizing-php)
# Oggetti ed Ereditarietà

Il concetto dell'ereditarietà, è uno dei più importanti della
programmazione orientata agli oggetti, a cui si appoggiano altri
metodi avanzati di programmazione come ad esempio il Polimorfismo
o le Classi Astratte

L'ereditarietà ci consente di creare delle classi (classi derivate o
sottoclassi) basate su classi già esistenti (classi base o
superclassi).

Un grande vantaggio è quello di poter riutilizzare il codice di una
classe di base senza doverlo modificare.

---

L'ereditarietà ci consente quindi di scrivere del codice molto più
flessibile, in quanto permette una generalizzazione molto più forte di
un concetto, rendendo più facile descrivere una situazione di vita reale.

Pensate alla classe base come ad un oggetto che descrive un concetto
generale, e pensate invece alle sottoclassi come ad una
generale specializzazione di tale concetto, esteso mediante proprietà e metodi
aggiuntivi.

---

L'ereditarietà consente a una classe di acquisire i membri di un'altra classe. Nell'esempio seguente, la classe `Quadrato` eredita da `Rettangolo`, specificato dalla parola chiave extends. `Rettangolo` diventa quindi la classe padre di `Quadrato`, che a sua volta diventa una classe derivata di `Rettangolo`. Oltre ai propri membri, `Quadrato` ottiene tutti i membri accessibili (non privati) in `Rettangolo`, incluso qualsiasi costruttore.

---

```php
// Classe padre (classe base)
class Rettangolo
{
   public $x, $y;
   function __construct($a, $b)
   {
     $questo->x = $a;
     $questo->y = $b;
   }
}

// Classe figlio (classe derivata)

class Quadrato extends Rettangolo {
    //eredita tutto quello che non è privato del Rettangolo
}
```

---

Quando si crea un'istanza di `Quadrato`, ora devono essere specificati due argomenti perché `Quadrato` ha ereditato il costruttore di `Rettangolo`.

`$forma = new Quadrato(5,10);`

Gli attributi e metodi ereditati da `Rettangolo` sono accessibili anche dall'oggetto `Quadrato`.

`$forma->x = 5; $forma->y = 10;`

Una classe in PHP può ereditare solo da una superclasse e il genitore deve essere definito prima della classe derivata nel file di script.

---

## Override: sovrascrittura dei metodi

Un membro in una classe derivata può ridefinire un membro nella sua classe padre per assegnargli una nuova implementazione. Per sovrascrivere un membro ereditato, deve solo essere dichiarato nuovamente con lo stesso nome. Come illustrato di seguito, il costruttore Quadrato esegue l'override del costruttore in Rettangolo.

```php
class Quadrato extends Rettangolo
{
  function __construct($a)
  {
    $questo->x = $a;
    $questo->y = $a;
  }
}
```

---


Con questo nuovo costruttore, viene utilizzato un solo argomento per creare lo Quadrato.
`$forma = nuovo quadrato(5);`
Poiché il costruttore ereditato di Rettangolo viene sovrascritto, il costruttore di Rettangolo non viene più chiamato quando viene creato l'oggetto Quadrato. Spetta allo sviluppatore chiamare il costruttore padre, se necessario. Questo viene fatto anteponendo alla chiamata la parola chiave padre e due due punti. I due punti sono noti come `operatore di risoluzione dell'ambito (::)`.

```php
class Quadrato extends Rettangolo
{
  function __construct($a)
  {
    parent::__construct($a,$a);
  }
}
```

---

La parola chiave parent è un alias per il nome della superclasse, che può essere utilizzato in alternativa. In PHP, è possibile accedere a membri sovrascritti a qualsiasi livello nella gerarchia di ereditarietà utilizzando questa notazione.

```php
class Quadrato extends Rettangolo
{
  function __construct($a)
  {
    Rettangolo::__construct($a,$a);
  }
}
```

---

## la parola chiave **final**

Per impedire a una classe figlio di eseguire l'override di un metodo, è possibile definirlo come `final`. Una classe stessa può anche essere definita come `final` per impedire a qualsiasi classe di estenderla.

```php
final class NotExtendable
{
  final function notOverridable() {}
}

```

---

## l'operatore Instanceof 
Come precauzione di sicurezza, è possibile verificare se è possibile eseguire il cast di un oggetto in una classe specifica utilizzando l'operatore instanceof. 

Questo operatore restituisce true se è possibile eseguire il cast dell'oggetto sul lato sinistro nel tipo sul lato destro senza causare un errore. Questo è vero quando l'oggetto è un'istanza o eredita dalla classe di destra.

```php

$forma = new Quadrato(5);
$forma instanceof Quadrato;    // true
$forma instanceof Rettangolo; // true
```# Superglobals

Diverse variabili predefinite in PHP sono "superglobali", il che significa che sono disponibili in tutti gli ambiti in uno script. Non è necessario eseguire la variabile $ globale; per accedervi all'interno di funzioni o metodi

Nome|Descrizione
---|---
$GLOBALS| Contains all global variables, including other superglobals.
$_GET|Contiene le variabili inviate via HTTP GET request.
$_POST|Contiene le variabili inviate via HTTP POST request.
$_FILES|Contiene le variabili inviate via HTTP POST file upload.
$_COOKIE|Contiene le variabili inviate via HTTP cookies.
$_SESSION|Contiene le variabili memorizzate nella sessione utente `session`.
$_REQUEST|Contiene le variabili inviate via `$_GET` , `$_POST` , ed eventualmente $_COOKIE.
$_SERVER|Contiene le informazioni sul web server e le request effettuate.
$_ENV|Contiene tutte le variabili settate sul web server.

# Clonare oggetti

In PHP 4, durante la creazione di un oggetto attraverso la parola chiave
new, veniva restituito l'oggetto stesso e questo veniva memorizzato
nella variabile specificata.

In PHP 5 invece, quando creiamo una nuova istanza `$oggetto = new MiaClasse();`, 
`new`  **NON** restituisce il nuovo oggetto ma un
riferimento ad esso.

---

In PHP 5 se assegnate ad una variabile l'istanza di un oggetto,
l'assegnazione avverrà per riferimento poichè l'istanza stessa contiene
solo un riferimento all'oggetto creato.

Se volete quindi creare una copia di un'istanza, dovrete clonarla.

Per clonare un oggetto è sufficiente mettere la parola chiave clone
dopo l'operatore di assegnazione "=".

---

```php
<?php
class Oggetto{
public $valore;
public function Oggetto($v){
$this->valore = $v;
}
}
$istanza1 = new Oggetto(5);
$istanza2 = $istanza1; // Assegnazione per riferimento
$istanza3 = clone $istanza1; // Clonazione oggetto
$istanza2->valore = 7; // Modifica anche $istanza1
$istanza3->valore = 13;
echo $istanza1->valore; // Non stampa 5 ma 7
echo $istanza2->valore;
$istanza2 >valore; // Stampa 7
echo $istanza3->valore; // Stampa 13
?>
```

---

Clonando un oggetto, per definizione si crea una copia esatta di tale oggetto, quindi i
riferimenti contenuti in esso saranno comunque copiati come tali, e dopo la clonazione
conterranno ancora il riferimento alla stessa risorsa di prima.

# Database in PHP

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/big_picture.png)

## Database, connessione

1. Crea una connessione al database
2. Invia una richiesta al DB
3. Usa i dati ricevuti, se disponibili
4. Rilascia i dati in memoria
5. Chiudi la connessione

---

## API

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/api_DB.png)

* mysql
  * Api originali, deprecate, disabilitate dalla versione 7
* mysqli
  * I=Improved: API migliorate, permettono il procedurale e supportano OOP
* PDO
  * PHP Data Objects

---

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/api_DB2.png)

---

## mysqli procedurale o object orinted

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/api_DB_OOP.png)

---

## prevenire SQL Injections

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/sql_injection.png)

---

### riferimenti

[manuale php](http://php.net/manual/en/mysqlinfo.api.choosing.php)# Php Quick Scripting Reference
[Libro di Mikael Olsson](https://www.amazon.it/Quick-Scripting-Reference-Mikael-Olsson/dp/1430262834)

---

## 1: Using PHP 

* Embedding PHP 
* Outputting Text 
* Installing a Web Server 
* Hello World 
* Compile and Parse 
* Comments 

---

## 2: Variables 

* Defining Variables 
* Data Types 
* Integer Type 
* Floating-Point Type 
* Bool Type 
* Null Type 
* Default Values 

---

## 3: Operators 

* Arithmetic Operators 
* Assignment Operators 
* Combined Assignment Operators 
* Increment and Decrement Operators 
* Comparison Operators 
* Logical Operators 
* Bitwise Operators 
* Operator Precedence 
* Additional Logical Operators 

---

## 4: String 

* String Concatenation 
* Delimiting Strings 
* Heredoc Strings 
* Nowdoc Strings 
* Escape Characters 
* Character Reference 
* String Compare 

---

## 5: Arrays 

* Numeric Arrays 
* Associative Arrays 
* Mixed Arrays
* Multi-Dimensional Arrays 

---

## 6: Conditionals 

* If Statement 
* Switch Statement 
* Alternative Syntax 
* Mixed Modes 
* Ternary Operator 

---

## 7: Loops 

* While Loop 
* Do-while Loop 
* For Loop 
* Foreach Loop 
* Alternative Syntax 
* Break 
* Continue 
* Goto 

---

## 8: Functions 

* Defining Functions 
* Calling Functions 
* Function Parameters 
* Default Parameters 
* Variable Parameter Lists 
* Return Statement 
* Scope and Lifetime 
* Anonymous Functions 
* Closures 
* Generators 
* Built-in Functions 

---

## 9: Class 

* Instantiating an Object 
* Accessing Object Members 
* Initial Property Values 
* Constructor 
* Destructor 
* Case Sensitivity 
* Object Comparison 
* Anonymous Classes 
* Closure Object 

---

## 10: Inheritance 

* Overriding Members 
* Final Keyword 
* Instanceof Operator 

---

## 11: Access Levels 

* Private Access 
* Protected Access 
* Public Access 
* Var Keyword 
* Object Access 
* Access Level Guideline 

---

## 12: Static 

* Referencing Static Members 
* Static Variables 
* Late Static Bindings 

---

## 13: Constants 

* Const 
* Define 
* Const and define 
* Constant Guideline 
* Magic Constants 

---

## 14: Interface 

* Interface Signatures 
* Interface Example 
* Interface Usages 
* Interface Guideline 

---

## 15: Abstract 

* Abstract Methods 
* Abstract Example 
* Abstract Classes and Interfaces 
* Abstract Guideline 

---

## 16: Traits 

* Inheritance and Traits 
* Trait Guidelines 

---

## 17: Importing Files 

* Include Path 
* Require 
* Include_once 
* Require_once 
* Return 
* _Autoload 

---

## 18: Type Declarations 

* Argument Type Declarations 
* Return Type Declarations 
* Strict Typing 

---

## 19: Type Conversions 

* Explicit Casts 
* Set type 
* Get type 

---

## 20: Variable Testing

* Isset 
* Empty 
* Is_null 
* Unset 
* Null Coalescing Operator 
* Determining Types 
* Variable Information 

---

## 21: Overloading 

* Property Overloading 
* Method Overloading 
* Isset and unset Overloading 

---

## 22: Magic Methods 

* _ToString 
* _Invoke 
* Object Serialization 
* _Sleep 
* _Wakeup 
* Set State 
* Object Cloning 

---

## 23: User Input

* HTML Form 
* Sending with POST 
* Sending with GET 
* Request Array 
* Security Concerns 
* Submitting Arrays 
* File Uploading 
* Superglobals 

---

## 24: Cookies 

* Creating Cookies 
* Cookie Array 
* Deleting Cookies 

---

## 25: Sessions 

* Starting a Session 
* Session Array 
* Deleting a Session 

---

## 26: Namespaces 

* Creating Namespaces 
* Nested Namespaces 
* Alternative Syntax 
* Referencing Namespaces 
* Namespace Aliases 
* Namespace Keyword 
* Namespace Guideline

---

## 27: References 

* Assign by Reference 
* Pass by Reference 
* Return by Reference 

---

## 28: Advanced Variables 

* Curly Syntax 
* Variable Variable Names
* Variable Function Names 
* Variable Class Names 

---

## 29: Error Handling 

* Correcting Errors 
* Error Levels 
* Error-Handling Environment 
* Custom Error Handlers 
* Raising Errors 

---

## 30: Exception Handling 

* Try-catch Statement 
* Throwing Exceptions 
* Catch Block 
* Finally Block 
* Rethrowing Exceptions 
* Uncaught Exception Handler 
* Errors and Exceptions 

---

## 31: Assertions 

* Assert 
* Performance 
* Index ## Tipi di dato

PHP è a tipizzazione debole anche perché converte automaticamente il tipo di dati contenuto nella variabile a seconda del contesto (questo è importante quando si usano gli operatori).

Nonostante ciò, il concetto di [tipo di dato](http://it.wikipedia.org/wiki/Tipo_di_dato) esiste in PHP: ogni variabile è di un determinato tipo a seconda del valore che contiene in quel momento. 

---

## Principalmente i tipi di dato sono:

### Numero intero (*int*) o a virgola mobile (*float*)
un numero razionale o intero
`$a = 3; $b = -12.5;`

### Stringa (*string*)
sequenza alfanumerica (testo); durante l'assegnazione deve essere delimitata da due virgolette (") o apici ('). |
`$a = "testo"; $b = '"I promessi sposi" è un romanzo di A. Manzoni';`

### Booleano (*boolean*)
può assumere solo i valori *true* (vero) o *false* (falso) |
`$a = true; $b = (3 == 5);`

---


### Array
tipo di dato complesso

### Null
indica l'assenza di un valore; serve soprattutto ad annullare una variabile 
`$a = null;`

## Conversione di tipo

Esistono numerose funzioni di conversione per trasformare un tipo di dato in un altro, che consistono nell'anteporre all'espressione in questione il nome del tipo di dato che si vuole ottenere tra parentesi. Ad esempio:

`(int)(3.45 + 7.3)`

restituisce *10*, in quanto viene convertito un numero *float* in un intero secondo le regole di conversione. Allo stesso modo

`(boolean)("questa è un'espressione stringa")`

restituisce TRUE

---



### **Stringhe**

Meritano particolare attenzione le stringhe, soprattutto nell'analisi dei caratteri di commutazioni.\
Una stringa in PHP deve essere delimitata da apici o da apici doppi; bisogna tuttavia chiudere una stringa con la stessa modalità con cui si è aperta:

"Questa non è una stringa valida'
'Questa lo è'

---


Può essere necessario in alcuni casi usare carattere particolari; ad esempio può essere necessario inserire un apice in una stringa delimitata da apici singoli. In questo caso si usano i **caratteri di commutazione** (o **sequenze di escape**). I principali sono:

Operatore|descrizione
---|---
`\'`|Singolo apice (necessario solo se la stringa è racchiusa da apici singoli)
`\"`|Doppio apice (necessario solo se la stringa è racchiusa da apici doppi)
`\n`|New line (ritorno a capo)
`\r`|Ritorno del carrello
`\t`|Tabulazione orizzontale
`\v`|Tabulazione verticale (disponibile nelle versioni di PHP superiori alla 5.2.5)
`\f`|form feed (disponibile nelle versioni di PHP superiori alla 5.2.5)
`\$`|Segno del dollaro
`\x00 - \xFF` | Carattere esadecimale |


**Nota**: nel caso di stringhe racchiuse da apici singoli l'unica sequenza di escape ammessa è la prima (\')


---


# Gli operatori principali

* operatori **matematici** 
* operatori per le **stringhe**
* operatori booleani o di **confronto**
* operatori **logici** 
* operatori di **incremento** e di **decremento**
* **operatore ternario**

---

### operatori **matematici** (restituiscono e richiedono valori numerici)

* `+ somma algebrica`

* `- sottrazione o negazione del numero`

* `* Moltiplicazione`
  
* `/ divisione`

* `% modulo (resto della divisione intera)`

---

### operatori per le **stringhe** (restituiscono una stringa)

* `. (punto) concatena due stringhe`

Gli operatori visti finora hanno inoltre una sintassi particolare nel caso di espressioni come ad esempio

* `$a = $a + 3;`
* `$b = $b.' stringa';`

Queste espressioni, infatti, nelle quali compare la stessa variabile ambo sia a destra che a sinistra dell'uguale, possono essere riassunte in

* `$a += 3;`
* `$b .= ' stringa';`

---


### operatori booleani o di **confronto** (restituiscono un valore boolean)

Operatore|descrizione
---|---
`===`| identicamente uguale (anche del medesimo tipo)
`==`| uguale a
`!=`| diverso da
`>`| maggiore di
`<`| minore di
`=>`| maggiore o uguale a
`<=`| minore o uguale a

---


### operatori **logici** (restituiscono e operano su boolean)

Operatore|descrizione
---|---
`!`|corrisponde alla negazione logica ed è un operatore unario (necessita di un solo operando). Restituisce false se l'operando è true, true se viceversa.`
`and o &&`|corrisponde alla congiunzione logica (et). Restituisce true solo se entrambi gli operandi sono veri.`
`or o \||`|corrisponde disgiunzione inclusiva logica (vel). Restituisce true anche se uno sole degli operandi è vero.`
`xor`|corrisponde alla disgiunzione esclusiva logica (out). Restituisce true solo se uno dei due valori è true e l'altro è false;`

---

## operatori di **incremento** e di **decremento**

due operatori molto importanti e comodi in PHP sono gli operatori chiamati di **incremento** e di **decremento** ++ e --, che restituiscono un valore numerico e aumentano o diminuiscono il valore della variabile di una unità. È più facile capire il loro funzionamento con un esempio:

Operatore|descrizione
---|---
`$v1 = $v2++;`|assegna a $v1 il valore di $v2 e *poi* incrementa $v2 di 1
`$v1 = $v2--`|assegna a $v1 il valore di $v2 e *poi* decrementa $v2 di 1
`$v1 = ++$v2;`|incrementa $v2 di 1 e *poi* assegna a $v1 il valore di $v2
`$v1 = --$v2`|decrementa $v2 di 1 e *poi* assegna a $v1 il valore di $v2

---
 
### **operatore ternario**

 un altro operatore molto comodo in PHP è l'**operatore ternario** ? : la cui sintassi è

`condizione ? espr1 : espr2`

Quando il motore PHP legge questo operatore valuta il valore di *condizione*: se è vera, restituisce il valore *espr1*, altrimenti il valore *espr2*. Un esempio potrebbe rendere più chiaro il tutto:

`$var = ($a > $b ? 'a maggiore di b' : 'a minore di b');`

Il valore di $var sarà quindi dipendente dal valore booleano dell'espressione `a > $b`

---
### **operatore ternario**

L'operatore ternario può essere usato anche per determinare il valore di un parametro da passare ad una funzione.

Ad esempio:

`function prova( $valore ) {
   echo $valore;
}`

`prova( true  ? "prova 1 " : "prova 2" );`
`prova( false ? "prova 1 " : "prova 2" );`

Il codice sopra riportato darà come output:

`prova 1 prova 2`


---


## Operatori di confronto


```php
    <?php
    $a = 5;   // 5 come intero
    
    var_dump($a == 5);       // confronta il valore; restituisce vero
    var_dump($a == '5');     // confronta il valore (ignora il tipo); restituisce vero
    var_dump($a === 5);      // confronta tipo/valore (intero e intero); restituisce vero
    var_dump($a === '5');    // confronta tipo/valore (intero e intero); restituisce falso
    
    /**
     * Confronti stretti
     */
    if (strpos('testing', 'test')) {    // 'test' è trovato alla posizione 0, che è interpretato come il booleano falso
        // codice...
    }
    
    // contro
    
    if (strpos('testing', 'test') !== false) {    // vero, perché è stato fatto un confronto stretto (0 !== false)
        // codice...
    }
```

---


*   [Operatori](http://www.php.net/manual/en/language.operators.php)
*   [Operatori di confronto](http://php.net/language.operators.comparison)
*   [Tabella di confronto tra tipi](http://php.net/types.comparisons)
*   [Prontuario del confronto](http://phpcheatsheets.com/index.php?page=compare)


---

Di fronte a diversi tipi di dato, il motore PHP può trovarsi in diverse situazioni e si comporta in maniere differenti:

### *si aspetta* un intero

* se si aspetta un valore *numerico intero* e viene fornito un *numero a virgola mobile* PHP tronca la parte decimale, restituendo solo la parte intera

* se si aspetta un valore *numerico* e viene fornita una *stringa*, PHP elimina spazi e lettere di troppo utilizzando soltanto i numeri contenuti in tale stringa

* se si aspetta un valore *numerico* e viene fornito un valore *booleano* viene restituito 1 se il valore è TRUE, 0 se il valore è FALSE

* se si aspetta un *numero* e viene fornito un *array* restituisce un numero pari al numero di elementi contenuti dall'array


---

Di fronte a diversi tipi di dato, il motore PHP può trovarsi in diverse situazioni e si comporta in maniere differenti:

### *si aspetta* una stringa

* se si aspetta una *stringa* e viene fornito un *numero* questo viene convertito in una stringa contentente esattamente il numero stesso

* se si aspetta un valore *stringa* e viene fornito un valore *booleano* viene restituito *1* se il valore è TRUE, una stringa vuota se è FALSE

* se si aspetta una *stringa* e viene fornito un *array* restituisce una stringa contenente il valore *array*

---

Di fronte a diversi tipi di dato, il motore PHP può trovarsi in diverse situazioni e si comporta in maniere differenti:

### *si aspetta* un boolean


* se si aspetta un valore *booleano* e viene fornito un *numero* PHP restituisce FALSE se il numero è uguale a 0, TRUE se è il numero è diverso da 0 (di solito 1)

* se si aspetta un valore *booleano* e viene fornita una *stringa* PHP restituisce FALSE se la stringa è vuota o contiene il valore *0*; restituisce TRUE negli altri casi

* se si aspetta un valore *booleano* e viene fornita un *array* PHP restituisce FALSE se l'array è vuoto , TRUE negli altri casi

* il valore *null* viene trattato come un valore booleano FALSE

### **Calcolo multibase**

Oltre al sistema decimale, PHP può lavorare con i sistemi di numerazione in base [otto](http://it.wikipedia.org/wiki/Sistema_numerico_ottale) e [sedici](http://it.wikipedia.org/wiki/Sistema_numerico_esadecimale). Per inizializzare una variabile in base otto, il numero deve iniziare con uno `0` (es `01247`); i numeri in base sedici devono invece iniziare con `0x` (es `0xf56b`).
# Costanti magiche

Ci sono nove costanti magiche che cambiano valore a seconda di dove vengono utilizzate. Ad esempio, il valore di __LINE__ dipende dalla riga su cui viene utilizzato nello script. Tutte queste costanti "magiche" vengono risolte in fase di compilazione, a differenza delle costanti regolari, che vengono risolte in fase di esecuzione. Queste costanti speciali non fanno distinzione tra maiuscole e minuscole e sono le seguenti:

---

## Costanti magiche di PHP Nome Descrizione

costante|descrizione
---|---
`__LINE__`|Il numero di riga corrente del file.
`__FILE__`|Il percorso completo e il nome file del file con collegamenti simbolici risolti. Se utilizzato all'interno di un include, viene restituito il nome del file incluso.
`__DIR__`|La directory del file. Se utilizzato all'interno di un include, viene restituita la directory del file incluso. Questo equivale a dirname(__FILE__). Questo nome di directory non ha una barra finale a meno che non sia la directory principale.
`__FUNCTION__`|Il nome della funzione, o {closure} per le funzioni anonime.
`__CLASS__`|Il nome della classe. Il nome della classe include lo spazio dei nomi in cui è stato dichiarato (ad es. Foo\Bar). Quando viene utilizzato in un metodo `trait`, __CLASS__ è il nome della classe in cui viene utilizzato il `trait`.
`__TRAIT__`|Il nome del `trait`. Il nome del `trait` include lo spazio dei nomi in cui è stato dichiarato (ad es. Foo\Bar).
`__METHOD__`|Il nome del metodo della classe.
`__NAMESPACE__`|Il nome dello spazio dei nomi corrente.
ClassName::class Il nome completo della classe.# La funzione `__autoload`

Questa funzione è richiamata automaticamente quando una classe o un'interfaccia non definita viene utilizzata.

Richiede un parametro, che è il nome della classe o dell'interfaccia PHP.


```php

function __autoload($class)
{
    echo "Argomento Passato alla funzione Autoloader = $class\n";
    include __DIR__ . '/../' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
}

```

Una buona pratica da seguire quando si scrivono applicazioni orientate agli oggetti
è utilizzare un file per ogni classe e denominarlo in base al nome della classe.

Seguendo questa convenzione, la funzione `__autoload` è in grado di caricare la classe necessaria.

```php
<?php
// miaclasse.php
class MiaClasse {}
?>
```

Se il file si trova in una sottocartella, il nome della classe può includere caratteri underline. 
Questi caratteri devono poi essere convertiti in separatori di path nella funzione di caricamento automatico `__autoload`.
# FUNZIONI DI VARIABILI

* `bool empty ( mixed var )`

Determina se una variabile è da considerare vuota. `empty()` è l'opposto di (boolean) var, tranne che
non viene dato alcun warning quando la variabile non è valorizzata. Nota: `empty()` agisce solo su
variabili, qualsiasi altra cosa genera un errore di parsing. In altre parole, il seguente comando non
funziona: empty(trim($name)).

---

* `float floatval ( mixed var )`

La funzione restituisce il valore di tipo float di var.

* `int intval ( mixed var [, int base] )`

Estrae il valore intero di var, utilizzando la base definita a parametro per la conversione. (La base
vale 10 di default).

* `bool is_array ( mixed var )`

Verifica se il valore dato è un array.
Inoltre, si hanno anche, is_bool, is_float, is_int, is_null, is_numeric, is_string con analoga funzione.

---

* `bool isset ( mixed variabile [, ...] )`

Restituisce **TRUE** se la variabile esiste; **FALSE** in caso contrario.
Se una variabile è stata cancellata con `unset()`, non potrà essere impostata. La funzione `isset()`
restituirà FALSE se viene utilizzata per testare una variabile valorizzata a NULL. Inoltre occorre

notare che il byte NULL ("\0") non equivale alla costante PHP NULL.

* `void unset ( mixed var [, mixed var [, mixed ...]] )`
`unset()` distrugge la variabile specificata. Occorre notare che in PHP 3 la funzione `unset()` restituiva
sempre **TRUE** (in realtà era il valore 1). In PHP 4, invece, la funzione `unset()` non è più una vera
funzione, __ora è una istruzione__. In questa veste non ritorna alcun valore, e cercare di ottenere un
valore dalla funzione unset() produce un errore di parsing.

---

## Elenco funzioni

* [boolval "Ottieni il valore booleano di una variabile"](http://www.php.net/manual/en/function.boolval.php)
* [debug_zval_dump "Scarica una rappresentazione di stringa di un valore zend interno nell'output"](http://www.php.net/manual/en/function.debug-zval-dump.php)
* [doubleval "Alias di floatval"](http://www.php.net/manual/en/function.doubleval.php)
* [vuoto "Determina se una variabile è vuota"](http://www.php.net/manual/en/function.empty.php)
* [floatval "Ottieni il valore float di una variabile"](http://www.php.net/manual/en/function.floatval.php)
* [get_defined_vars "Restituisce un array di tutte le variabili definite"](http://www.php.net/manual/en/function.get-defined-vars.php)
* [get_resource_type "Restituisce il tipo di risorsa"](http://www.php.net/manual/en/function.get-resource-type.php)
* [gettype "Ottieni il tipo di una variabile"](http://www.php.net/manual/en/function.gettype.php)
* [import_request_variables "Importa variabili GET/POST/Cookie nell'ambito globale"](http://www.php.net/manual/en/function.import-request-variables.php)

---

## Elenco funzioni 2

* [intval "Ottieni il valore intero di una variabile"](http://www.php.net/manual/en/function.intval.php)
* [is_array "Trova se una variabile è un array"](http://www.php.net/manual/en/function.is-array.php)
* [is_bool "Scopri se una variabile è booleana"](http://www.php.net/manual/en/function.is-bool.php)
* [is_callable "Verifica che il contenuto di una variabile possa essere chiamato come funzione"](http://www.php.net/manual/en/function.is-callable.php)
* [is_double "Alias di is_float"](http://www.php.net/manual/en/function.is-double.php)
* [is_float "Trova se il tipo di una variabile è float"](http://www.php.net/manual/en/function.is-float.php)
* [is_int "Trova se il tipo di una variabile è intero"](http://www.php.net/manual/en/function.is-int.php)
* [is_integer "Alias di is_int"](http://www.php.net/manual/en/function.is-integer.php)
* [is_long "Alias di is_int"](http://www.php.net/manual/en/function.is-long.php)
* [is_null "Trova se una variabile è NULL"](http://www.php.net/manual/en/function.is-null.php)
* [is_numeric "Trova se una variabile è un numero o una stringa numerica"](http://www.php.net/manual/en/function.is-numeric.php)
* [is_object "Trova se una variabile è un oggetto"](http://www.php.net/manual/en/function.is-object.php)
* [is_real "Alias di is_float"](http://www.php.net/manual/en/function.is-real.php)
* [is_resource "Trova se una variabile è una risorsa"](http://www.php.net/manual/en/function.is-resource.php)
* [is_scalar "Trova se una variabile è uno scalare"](http://www.php.net/manual/en/function.is-scalar.php)
* [is_string "Trova se il tipo di una variabile è stringa"](http://www.php.net/manual/en/function.is-string.php)

---

## Elenco funzioni 3

* [isset "Determina se una variabile è impostata e non è NULL"](http://www.php.net/manual/en/function.isset.php)
* [print_r "Stampa informazioni leggibili su una variabile"](http://www.php.net/manual/en/function.print-r.php)
* [serialize "Genera una rappresentazione memorizzabile di un valore"](http://www.php.net/manual/en/function.serialize.php)
* [settype "Imposta il tipo di una variabile"](http://www.php.net/manual/en/function.settype.php)
* [strval "Ottieni valore stringa di una variabile"](http://www.php.net/manual/en/function.strval.php)
* [unserialize "Crea un valore PHP da una rappresentazione memorizzata"](http://www.php.net/manual/en/function.unserialize.php)
* [unset "Annulla l'impostazione di una determinata variabile"](http://www.php.net/manual/en/function.unset.php)
* [var_dump "Scarica informazioni su una variabile"](http://www.php.net/manual/en/function.var-dump.php)
* [var_export "Emette o restituisce una rappresentazione di stringa analizzabile di una variabile"](http://www.php.net/manual/en/function.var-export.php)
# FILES in PHP

Con PHP e' possibile accedere e manipolare i file che risiedono nel disco del server.

In particolare e' possibile:

* Creare, scrivere e leggere un file
* Fare l'upload di un file
* Azioni su files
  1. Creazione o apertura - fopen
  2. Scrittura / lettura - fwrite, fread, fgets
  3. Chiusura - fclose

---

## La funzione fopen

`handler = fopen(filename, modalita')`

permette di aprire un file. Se il file non esiste, lo crea. Come
argomenti ha il nome del file e la modalita' di apertura.

Restituisce un numero identificativo del file chiamato
filehandler.

---

## fopen: modalita di apertura file

* **Lettura**: 'r'
  * Apre un file solo per la lettura.
  * Il puntatore di inizio lettura è all'inizio del file.
  * 'r+' apre in lettura e scrittura.
* **Scrittura**: 'w'
  * Apre un file solo per la scrittura.
  * I dati del file vengono cancellati.
  * Il puntatore di scrittura viene posizionato all'inizio del file.
  * 'w+' apre in lettura e scrittura.
* **Aggiunta**: 'a'
  * Apre un file in scrittura, ma i dati vengono preservati e la scrittura inizia al termine del file.
  * Il puntatore di scrittura è alla fine del file.
  * 'a+' apre in lettura e scrittura.

---

```php
<?php
$myFile = "testFile.txt";
$MyFileHandler = fopen($myfile, 'w') ;
fclose($MyFileHandler );
?>
```

---

## Scrivere su un file

La funzione che permette di scrivere su un file e' ```fwrite(filehandler,stringa)```

Il file va preventivamente aperto in scrittura e il file handler risultante deve essere il primo argomento della funzione.

## Chiudere un file

Dopo l'apertura e la scrittura o lettura di un file, il file va sempre chiuso.

La funzione per chiudere I file e' ```fclose(filehandler)```

---

### Esempio: scrivere su un file

```php
<?php
$myFile = "testFile.txt";
$fh = fopen($myFile, 'w');
$frase1 = "scrivo questa stringa e vado a capo\n";
fwrite($fh, $frase1);
$frase2 = "scrivo una seconda frase e vado a capo\n";
fwrite($fh, $frase2);
fclose($fh); ?>
```

### Esempio: aggiungere ad un file

```php
<?php
$myFile = "testFile.txt";
$fh = fopen($myFile, 'a');
$frase1 = "scrivo questa nuova frase\n";
fwrite($fh, frase1);
$frase2 = "altra nuova frase\n";
fwrite($fh, $frase2);
fclose($fh); ?>
```

---

## Leggere un file

La lettura di un file (deve preventivamente essere aperto in lettura) avviene principalmente con due funzioni:

* `fread(filehandler, integer)` oppure
* `fgets(filehandler)`

L'intero indica quanti caratteri leggere dal puntatore di inizio lettura. In fgets e' opzionale in quanto legge l'intera riga.

Per leggere l'intero file occorre indicare l'intera lunghezza del file, che si puo' ottenere con la funzione `filesize(nomefile)`

### Esempio: Leggere un file con fread

```php
<?php
$myFile = "testFile.txt";
$fh = fopen($myFile, 'r');
$leggo = fread($fh, 5);
fclose($fh);
echo $leggo;
?>
```

---

## Esempio: Leggere un intero file con fread

```php
<?php
$myFile = "testFile.txt";
$fh = fopen($myFile, 'r');
$leggo = fread($fh, filesize($myfile));
fclose($fh);
echo $leggo;
?>
```

## Esempio: Leggere un file con fgets

```php
<?php
$file = fopen("testFile.txt","r");
while (!feof($file))
  {
    echo fgets($file);
  }
fclose($file);
?>
```

---

## Per leggere tutto il file possiamo anche usare funzione file_get_contents()

```php
$testo = file_get_contents("prova.txt");

echo $testo;
```

## La funzione file() permette di caricare un file in un array

La funzione file("nome_file") restituisce un array con gli elementi uguali ad ogni riga del file di testo.

```php
<?php
$myfilename="miofile.txt";
$myarray=file($myfilename);
foreach ($myarray as $item)
  echo $item;
fclose($fh); ?>
```

---

## Eliminare un file

Un file si cancella con la funzione ```unlink(nomefile)```

```php
<? php
$myFile = "testFile.txt";
unlink($myFile);
?>
```

## Upload di file sul server

### il form HTML

* settare la proprietà enctype

```php
<form enctype="multipart/form-data" action="uploader.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
<label for="uploadedfile">Scegli un file da caricare:</label>
<input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File" />
</form>
```

---

### il file che effettua l'upload

* All'esecuzione di `uploader.php` il file è già accessibile, si trova in una locazione temporanea nel server.
* Possiamo accedere al file caricato attraverso l'array globale ```$_FILES```.

* ```$_FILES['uploadedfile']['name']``` - name contiene il path original del file caricato
* ```$_FILES['uploadedfile']['tmp_name']``` - tmp_name contiene il path del file temporaneo sul server.

---

```php
<?php
// Cartella dove voglio salvare i file caricati

$target_path = "uploads/";
$target_path = $target_path.basename( $_FILES['uploadedfile']['name']);

// Costruisco il path finale

if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
echo "Il file ".basename( $_FILES['uploadedfile']['name'])."e stato caricato";
}
else { 
    echo "errore nel caricamento del file, riprova!";
}
?>
```


## PROGRAMMAZIONE

Una pagina PHP è una normale pagina HTML nel cui interno è possibile inserire del codice PHP.
Il codice PHP è definito come linguaggio di scripting "inline", perché viene inserito direttamente all'interno delle pagine HTML. Per fare ciò il codice PHP deve essere racchiuso tra due speciali tag, il tag <?php (tag di apertura) e il tag ?> (tag di chiusura). Del tag di apertura esistono anche versioni "brevi", per abilitare le quali bisogna agire sul file di configurazione php.ini alle voci short_open_tag e asp_tags; il loro uso è tuttavia sconsigliato dagli stessi sviluppatori di PHP in quanto non essendo attivi di default riducono la portabilità del codice.
Es.:
```
   <?php
       echo "pippo";
   ?>
short_open_tag
   <?
       echo "pippo";
   ?>
asp_tags
   <%
       echo "pippo";
   %>

```
Tutto ciò che è inserito tra questi due elementi viene interpretato dal sistema come sintassi PHP e viene quindi interpretato dal motore PHP prima di essere inviato al client.
Il codice php può anche essere incluso in tag <script>, ad esempio
```
  <script language="php">
       echo "pippo";
  </script>

```

Ecco un esempio pratico per inviare un output di testo:
<?php echo " Testo da stampare "; ?>
Oltre al comando echo esiste anche però il comando print:
<?php print " Testo da stampare "; ?>
Questi due comandi hanno la stessa funzione, ma sono però differenti per un particolare, spesso trascurabile: a differenza di echo, print non può accettare più di un argomento.
Non si tratta, tuttavia, di funzioni, ma di strutture basilari del linguaggio. Possono, dunque, essere scritte con o senza parentesi:
```
 echo("Hello World");

```
produce lo stesso risultato di
echo "Hello World";
Si noti che alla fine dell'istruzione, questa viene dichiarata conclusa attraverso un punto e virgola. In mancanza di questo, il parser PHP restituirà un errore alla riga successiva.

echo presenta inoltre una sintassi abbreviata che deve seguire immediatamente un tag di apertura PHP e funziona solo se la direttiva short_open_tag del php.ini è impostata su On. Ad esempio:
La variabile n vale <?=$n?>
Ecco un semplice applicativo PHP che stamperà sullo schermo la frase: Hello world:
<?php
  echo "<p>Hello world</p>";
?>
In questo esempio l'istruzione echo produrrà come output la stringa in linguaggio HTML
 <p>Hello world</p>
che verrà inviata al browser e quindi interpretata visivamente come un paragrafo contenente le parole Hello world

All'interno dei tag <?php e ?> è possibile inserire dei commenti al codice, ovvero porzioni di testo opportunamente marcate che verranno ignorate dal motore PHP durante il parsing degli script.
Un commento ha una doppia valenza:
1. può servire per non eseguire una parte di codice che però potrebbe essere necessario riprendere successivamente (ad esempio per dei test); 
2. rende più leggibile il sorgente da parte di altri utenti che eventualmente debbano variare lo script PHP (utile soprattutto nei casi di collaborazione). 
PHP supporta i commenti sia stile C che stile shell (Perl).
Il commento a linea singola quindi viene pertanto interpretato sia con // che con # anteposti alla parte di scripting da commentare.
```
echo "questa riga viene eseguta";
// echo "pippo";
# echo "pluto";
echo "anche questa"; //questo codice è ignorato echo ("anche questo")
```
In questo caso non verranno eseguite la seconda e la terza riga e la seconda parte della quarta (dal commento in poi).


È importante sottolineare che se i caratteri di commento non sono posti a inizio riga commentano solo tutto quello che si trova sulla stessa riga a destra del commento; pertanto occorre stare attenti alla sintassi per non incappare in errori. Ad esempio è corretto:
<?php 
    echo "pippo"; // Scrivo pippo 
?>
Ma attenti a scrivere:
    <?php echo "pippo"; // Scrivo pippo ?>
In apparenza questi due esempi potrebbero sembrare uguali ma nel secondo caso la chiusura del tag PHP è posta sulla stessa riga a destra del commento, pertanto il linguaggio non interpreterà la chiusura del tag <?php e segnalerà un errore di sintassi.
È possibile commentare anche più di una riga di codice per volta utilizzando /* testo */. Tutto quello che si trova tra /* e */ risulta essere un commento.
echo "questo viene eseguito"; /*  
Linea 1 di commento
Linea 2   di commento
*/
echo /* "questo no" */ "anche questo" ;
Occorre fare attenzione nel non annidare i commenti di stile C, situazione che si presenta quando si commentano larghi blocchi di codice.
     /*
     echo 'Questo è il primo commento'; /* Questo commento dà errore */
     */
Tutta la parte in grassetto rappresenta un unico commento per cui */ nella riga successiva genererà un errore 



Possiamo pensare ad una variabile come una scatola nella quale immagazzinare le informazioni e da cui possiamo ottenerle quando è necessario.

Indice
1 Lavorare con le variabili 
1.1 Variabili per valore e per riferimento 
1.2 Costanti 
2 Tipi di dati 
2.1 Calcolo multibase 
2.2 Stringhe 

Lavorare con le variabili
In PHP le variabili sono identificate dal simbolo $ che precede il nome della variabile stessa. È necessario tuttavia che il primo carattere dopo il $ non sia un numero o un carattere speciale, ma sia una lettera o un carattere underscore (_).
Molti linguaggi di programmazione richiedono che le variabili usate nel corso del programma siano dichiarate. Il linguaggio PHP è un linguaggio chiamato a tipizzazione debole , che significa invece che non richiede alcuna dichiarazione di variabile: per il motore PHP, infatti, una variabile è tale dalla prima riga nella quale se ne fa uso.
L'istruzione fondamentale che è possibile eseguire con una variabile è l'assegnazione, che imposta (assegna) il valore contenuto dalla variabile. La sintassi è
$nome_var = valore
dove valore è un'espressione valida per PHP (per espressione si intende una sequenza di dati, operatori e/o variabili che restituisca un valore). Sono ad esempio espressioni
3 //restituisce 3
3 + $var //restituisce il valore di $var sommato di 3.
Per fare riferimento ad una variabile e al suo valore sarà necessario semplicemente riferirsi al nome; si noti che PHP è case-sensitive, quindi $var e $Var sono due variabili differenti. Questo script, ad esempio, stampa il valore di una variabile:
<?php
 $variabile = "valore della variabile";
 echo "$variabile";
?>
Da notare che l'istruzione echo non stampa $variabile ma il valore della variabile $variabile; sarebbe equivalente scrivere
echo $variabile;
Un'istruzione, invece, come
echo '$variabile';
stamperebbe $variabile (si notino gli apici e non le virgolette doppie).
- Variabili per valore e per riferimento
Le variabili PHP sono solitamente passate per valore: quando una variabile viene assegnata ad un'altra in realtà viene assegnato ad una variabile una copia del valore dell'altra, ma le due variabili identificano comunque due celle di memoria differenti. Ad esempio:
$var1 = 3;
$var2 = $var1 //ora $var2 contiene il valore 3
$var2 = 4 //in questo caso non cambia il valore di $var1 ma solo quello di $var2
Talvolta, soprattutto per quanto riguarda l'uso di funzioni, è comodo aver due variabili che puntino alla stessa cella di memoria. Per fare ciò si assegnano le variabili per riferimento usando la sintassi:
$var1 = &$var2
Ad esempio
$var1 = 3;
$var2 = '''&'''$var1 //ora $var2 e $var1 puntano alla stessa cella di memoria
$var2 = 4 //ora $var1 e $var2 contengono entrambe il valore 4
- Costanti
Può essere comodo durante la programmazione definire valori costanti riutilizzabili nel codice. La differenza sostanziale tra costanti e varibili sta nel fatto che le prime, a differenza delle seconde, non possono essere modificate. Per definire una costante si usa la sintassi:
define("nome_costante", valore);
e per richiamarle si usa semplicemente il loro nome:
echo nome_costante;
Esistono alcune costanti predefinite, che sono valide cioè in tutti gli script:
__FILE__: restituisce il percorso completo e il nome del file (ad esempio /var/www/html/index.php su sistemi Linux) 
__LINE__: restituisce il numero di riga in cui si trova la costante 
__FUNCTION__ e __CLASS__: restituiscono rispettivamente il nome della funzione e della classe in cui la costante è richiamata. 
- Tipi di dati
PHP è a tipizzazione debole anche perché converte automaticamente il tipo di dati contenuto nella variabile a seconda del contesto (questo è importante quando si usano gli operatori).
Nonostante ciò, il concetto di tipo di dato esiste in PHP: ogni variabile è di un determinato tipo a seconda del valore che contiene in quel momento. Principalmente i tipi di dato sono:
Nome
Descrizione
Esempio
Numero intero (int) o a virgola mobile (float)
un numero razionale o intero
$a = 3; $b = -12.5;
Stringa (string)
sequenza alfanumerica (testo); durante l'assegnazione deve essere delimitata da due virgolette (") o apici (').
$a = "testo"; $b = '"I promessi sposi" è un romanzo di A. Manzoni';
Booleano (boolean)
può assumere solo i valori true (vero) o false (falso)
$a = true; $b = (3 == 5);
Array
tipo di dato complesso, verrà trattato più avanti
Null
indica l'assenza di un valore; serve soprattutto ad annullare una variabile
$a = null;
Di fronte a diversi tipi di dato, il motore PHP può trovarsi in diverse situazioni e si comporta in maniere differenti:
se si aspetta un valore numerico intero e viene fornito un numero a virgola mobile PHP tronca la parte decimale, restituendo solo la parte intera 
se si aspetta un valore numerico e viene fornita una stringa, PHP elimina spazi e lettere di troppo utilizzando soltanto i numeri contenuti in tale stringa 
se si aspetta un valore numerico e viene fornito un valore booleano viene restituito 1 se il valore è TRUE, 0 se il valore è FALSE 
se si aspetta un numero e viene fornito un array restituisce un numero pari al numero di elementi contenuti dall'array 
se si aspetta una stringa e viene fornito un numero questo viene convertito in una stringa contentente esattamente il numero stesso 
se si aspetta un valore stringa e viene fornito un valore booleano viene restituito 1 se il valore è TRUE, una stringa vuota se è FALSE 
se si aspetta una stringa e viene fornito un array restituisce una stringa contenente il valore array 
se si aspetta un valore booleano e viene fornito un numero PHP restituisce FALSE se il numero è uguale a 0, TRUE se è il numero è diverso da 0 (di solito 1) 
se si aspetta un valore booleano e viene fornita una stringa PHP restituisce FALSE se la stringa è vuota o contiene il valore 0; restituisce TRUE negli altri casi 
se si aspetta un valore booleano e viene fornita un array PHP restituisce FALSE se l'array è vuoto , TRUE negli altri casi 
il valore null viene trattato come un valore booleano FALSE 
Esistono tuttavia numerose funzioni di conversione per trasformare un tipo di dato in un altro, che consistono nell'anteporre all'espressione in questione il nome del tipo di dato che si vuole ottenere tra parentesi. Ad esempio:
(int)(3.45 + 7.3)
restituisce 10, in quanto viene convertito un numero float in un intero secondo le regole di conversione. Allo stesso modo
(boolean)("questa è un'espressione stringa")
restituisce TRUE
- Calcolo multibase
Oltre al sistema decimale, PHP può lavorare con i sistemi di numerazione in base otto e sedici. Per inizializzare una variabile in base otto, il numero deve iniziare con uno 0 (es 01247); i numeri in base sedici devono invece iniziare con 0x (es 0xf56b).
- Stringhe
Meritano particolare attenzione le stringhe, soprattutto nell'analisi dei caratteri di commutazioni.
Una stringa in PHP deve essere delimitata da apici o da apici doppi; bisogna tuttavia chiudere una stringa con la stessa modalità con cui si è aperta:
"Questa non è una stringa valida'
'Questa lo è'
Può essere necessario in alcuni casi usare carattere particolari; ad esempio può essere necessario inserire un apice in una stringa delimitata da apici singoli. In questo caso si usano i caratteri di commutazione (o sequenze di escape). I principali sono:
\'
Singolo apice (necessario solo se la stringa è racchiusa da apici singoli)
\"
Doppio apice (necessario solo se la stringa è racchiusa da apici doppi)
\\
Backslash
\n
New line (ritorno a capo)
\r
Ritorno del carrello
\t
Tabulazione orizzontale
\v
Tabulazione verticale (disponibile nelle versioni di PHP superiori alla 5.2.5)
\f
form feed (disponibile nelle versioni di PHP superiori alla 5.2.5)
\$
Segno del dollaro
\x00 - \xFF
Carattere esadecimale
Nota: nel caso di stringhe racchiuse da apici singoli l'unica sequenza di escape ammessa è la prima (\') 

Nel linguaggio PHP affianco ai classici operatori matematici, booleani e logici sono disponibili anche gli operatori unari di incremento e decremento e un operatore ternario. Gli operatori principali sono:
matematici (restituiscono e richiedono valori numerici) 
+ somma algebrica 
- sottrazione o negazione del numero 
* Moltiplicazione 
/ divisione 
% modulo (resto della divisione intera) 
stringa (restituiscono una stringa) 
. (punto) concatena due stringhe 
Gli operatori visti finora hanno inoltre una sintassi particolare nel caso di espressioni come ad esempio
$a = $a + 3;
$b = $b.' stringa';
Queste espressioni, infatti, nelle quali compare la stessa variabile ambo sia a destra che a sinistra dell'uguale, possono essere riassunte in
$a += 3;
$b .= ' stringa';
booleani o di confronto (restituiscono un valore boolean) 
=== identicamente uguale (anche del medesimo tipo) 
== uguale a 
!= diverso da 
> maggiore di 
< minore di 
=> maggiore o uguale a 
<= minore o uguale a 
logici (restituiscono e operano su boolean) 
! corrisponde alla negazione logica ed è un operatore unario (necessita di un solo operando). Restituisce false se l'operando è true, true se viceversa. 
and o && corrisponde alla congiunzione logica (et). Restituisce true solo se entrambi gli operandi sono veri. 
or o || corrisponde disgiunzione inclusiva logica (vel). Restituisce true anche se uno sole degli operandi è vero. 
xor corrisponde alla disgiunzione esclusiva logica (out). Restituisce true solo se uno dei due valori è true e l'altro è false; 
due operatori molto importanti e comodi in PHP sono gli operatori chiamati di incremento e di decremento ++ e --, che restituiscono un valore numerico e aumentano o diminuiscono il valore della variabile di una unità. È più facile capire il loro funzionamento con un esempio: 
$v1 = $v2++; //assegna a $v1 il valore di $v2 e poi incrementa $v2 di 1
$v1 = $v2-- //assegna a $v1 il valore di $v2 e poi decrementa $v2 di 1
$v1 = ++$v2; //incrementa $v2 di 1 e poi assegna a $v1 il valore di $v2 
$v1 = --$v2 //decrementa $v2 di 1 e poi assegna a $v1 il valore di $v2 
un altro operatore molto comodo in PHP è l'operatore ternario ? : la cui sintassi è 
condizione ? espr1 : espr2
Quando il motore PHP legge questo operatore valuta il valore di condizione: se è vera, restituisce il valore espr1, altrimenti il valore espr2. Un esempio potrebbe rendere più chiaro il tutto:
$var = ($a > $b ? 'a maggiore di b' : 'a minore di b');
Il valore di $var sarà quindi dipendente dal valore booleano dell'espressione a > $b
L'operatore ternario può essere usato anche per determinare il valore di un parametro da passare ad una funzione.
Ad esempio:
function prova( $valore ) {
   echo $valore;
} 

prova( true  ? "prova 1 " : "prova 2" );
prova( false ? "prova 1 " : "prova 2" );
Il codice sopra riportato darà come output:
prova 1 prova 2
Gli array (o vettori) sono delle strutture dati complesse che risultano molto comode per la codifica di particolari algoritmi.
Possiamo pensare agli array come a delle liste di elementi nelle quali ciascun elemento ha un valore e un indice (o chiave) numerico o alfanumerico che lo identifica nella lista.
Gli array possono essere semplici o associativi: nel primo caso ciascun elemento della lista è identificato unicamente da un indice numerico; nel secondo caso ogni valore ha un indice numerico e uno alfanumerico, che può quindi memorizzare altri dati particolari.
In PHP non esistono matrici multidimensionali ma queste possono essere emulate creando strutture (anche molto complesse) con array di array, dal momento che ciascun elemento di un array può a sua volta essere un array:
$valore = array();
$riga = 2;
$colonna = 3;
$nome = 'Pippo';
 
$valore[$riga][$colonna][$nome] = 10;
Per inizializzare una variabile come array occorre dichiarare la variabile come tale e si utilizza la seguente notazione:
$array = array();
Per fare riferimento ad un elemento dell'array si usa la sintassi
$array[indice]
dove indice è un numero oppure, come spiegato sopra, una chiave alfanumerica.
Per aggiungere all'array un elemento con un indice n è sufficiente fare riferimento all'elemento stesso, come nell'esempio seguente:
$array = array();
$array[n] = "prova";
Per inserire automaticamente un elemento alla fine della lista si usa invece la sintassi
$array[] = valore;
L'indice assegnato così all'elemento appena inserito è pari all'elemento maggiore incrementato di uno. Se l'array è vuoto, viene assegnato indice 0.
$array = array();
$array[] = "prova1";
$array[] = "prova2";
$array[] = "prova3";
 
echo $array[0];
echo $array[1];
echo $array[2];
Questo semplice spezzone di codice restituirà
prova1prova2prova3
Se vogliamo indicare la posizione in cui inserirlo, oppure la chiave a cui dovrà essere associato, dovremo inserire il valore usando la sintassi seguente:
$array = array();
$array[1] = "prova 1";
$array["prova"] = "prova 2";
Ovviamente se un elemento è già presente a tale indice o chiave questo verrà sovrascritto.
È possibile assegnare dei valori all'array già in fase di dichiarazione, passandoli come parametri alla funzione array() che si occupa appunto di creare un nuovo array.
$array = array( "prova1", "prova2", "prova3" );
echo $array[0];
echo $array[1];
echo $array[2];
Questo spezzone di codice restituirà
prova1prova2prova3
proprio come nell'esempio fatto sopra.

Indice
[nascondi]
1 Funzioni utili 
1.1 print_r 
1.2 count 
1.3 implode ed explode 
1.4 foreach 
1.5 Altre funzioni 
//<![CDATA[
if (window.showTocToggle) { var tocShowText = "mostra"; var tocHideText = "nascondi"; showTocToggle(); } 
//]]>- Funzioni utili
- print_r
print_r è una funzione molto utile in php, non solo per gli array, ma anche per molti altri tipi di oggetto. Nel caso degli array, comunque, è funzionale perché consente di stampare il contenuto degli stessi in modo molto utile per eseguire, ad esempio, un veloce debug.
Ad esempio
$array = array( 100, 200, 300 );
print_r( $array );
restituirà il seguente output:
array(
   [0] => 100,
   [1] => 200,
   [2] => 300
 )
- count
La funzione count, come suggerisce il nome, restituisce il numero di elementi contenuti nell'array.
$array = array( 1, 2, 3, 4 );
echo count( $array );
avrà come output
4
- implode ed explode
Queste due funzioni lavorano con le stringhe e gli array. La sintassi è:
implode (collante, array)
explode (delimitatore, stringa)
La prima restituisce una stringa ottenuta concatenando in ordine tutti gli elementi di array inframezzandoli dalla stringa collante.
La seconda restituisce un array ottenuto separando stringa utilizzando delimitatore come separatore.
Ad esempio:
$arr = array('a','b','c');
$stringa = implode(":", $arr); //restituisce a:b:c
- foreach
Questa non è proprio una funzione, ma una struttura di controllo. Funziona così:
$arr = array('a','b','c');
foreach($arr as $variabile_chiave=>$variabile_contenuto)
{
 // istruzioni
}
Esempio:
$arr = array('a','b','c');
foreach($arr as $valore)
{
 echo $valore;
}
oppure, se si vuole visualizzare anche la chiave dell'array si fà così:
$arr = array('a'=>'lettera 1','b'=>'lettera 2','c'=>'lettera 3');
foreach($arr as $key=>$valore)
{
 echo "La chiave dell'array ".$key." è uguale a ".$valore.".<br>";
}
Il primo esempio restituirà abc, il secondo La chiave dell'array a è uguale a lettera 1.
La chiave dell'array b è uguale a lettera 2.
La chiave dell'array c è uguale a lettera 3.

CONDIZIONI

La condizione, o selezione, è una struttura che permette di eseguire istruzioni differenti in base ad una condizione indicata all'inizio.
- Selezione binaria
La selezione binaria consente in una scelta tra due possibilità: vero o falso.
Questo tipo di selezione si basa sul valore booleano di un'espressione indicata all'inizio della struttura ed esegue il primo blocco indicato se la condizione è vera, altrimenti esegue l'eventuale secondo blocco.
In PHP questa condizione si accede tramite il costrutto if... then... else che funzionano esattamente come nel linguaggio C, con l'unica differenza che else if si scrive tutto attaccato: elseif. Ad esempio:
<?php
$x = 10;
$y = 10;
if ($x == $y) {
 print "\$x e' uguale a \$y: $x\n";
}
elseif ($x > $y) {
 print "\$x e' maggiore di \$y: $x > $y\n";
}
else {
 print "\$x e' minore di \$y: $x < $y\n";
}
?>
Il risultato sarà:
$x e' uguale a $y: 10
- Selezione multipla
La selezione multipla consiste in una scelta tra due o più possibilità in base al valore di una espressione valutata inzialmente; si esprime con il costrutto switch... case, che funziona esattamente come nel linguaggio C.
Il costrutto esegue il confronto dell'espressione passata a switch con tutti i valori case ed il confronto si interrompe quando viene incontrata l'istruzione break.
<?php
$x = 5;
switch ($x) {
 case 0:
  print "\$x e' uguale a 0\n";
  break;
 case 1:
  print "\$x e' uguale a 1\n";
  break;
 case 2:
  print "\$x e' uguale a 2\n";
  break;
 case 3:
 case 4:
  print "\$x e' uguale a 3 oppure a 4\n";
  break;
 default:
  print "\$x e' minore di 0 o maggiore di 4\n";
  break;
}
?>
Il risultato sarà:
$x e' minore di 0 o maggiore di 4
CICLO


Il ciclo (o iterazione) è una struttura di controllo (come la selezione) che permette l'esecuzione di una sequenza di una o più istruzioni fino al verificarsi di una data condizione.
In PHP, questi vengono gestiti esattamente come nel linguaggio C. Vedi C/Blocchi e funzioni/Cicli.
Un tipo particolare di ciclo, non presente in C e nei linguaggi derivati, è il ciclo foreach, che si presta ad essere usato in molte situazioni.
La sintassi tipica dell'istruzione è questa:
foreach( $variabile_su_cui_iterare as $valore ) {
    istruzioni
}
Tipicamente $variabile_su_cui_iterare è un array. In questo caso il ciclo scorrerà tutti gli elementi dell'array, assegnando di volta in volta il loro valore alla variabile $valore, che potrà essere usata all'interno del corpo del ciclo.
Se dovesse essere necessario, per qualche ragione, conoscere anche la chiave dell'array a cui tale oggetto è associato, è possibile usare la sintassi
foreach( $variabile_su_cui_iterare as $chiave=>$valore ) { 
    ''istruzioni''
}
Anche se foreach è tipicamente usato per scorrere tutti gli elementi di un array può essere usato anche per scorrere tutti membri pubblici, o comunque accessibili, di una classe. 



FUNZIONI

Una funzione è un blocco di codice che può richiedere uno o più parametri in ingresso e può fornire un valore di uscita.
PHP mette a disposizione numerose funzioni predefinite, di cui non si ha sottomano il codice ma risultano molto utili o talvolta indispensabili nella programmazione delle nostre applicazioni server.
In PHP la maggior parte delle funzioni restituisce un valore anche quando ciò potrebbe non essere ovvio: spesso, ad esempio, le funzioni restituiscono un valore boolean che indica l'esito della sua esecuzione.
Questo elenco mostra solo le principali funzioni che vi capiterà di utilizzare programmando in PHP. Per l'elenco completo, consulta le referenze ufficiali di PHP

1 Usare le funzioni 
2 Funzioni di stringa 
3 Funzioni numeriche 
4 Funzioni per data e ora 
5 Altre funzioni utili 
//<![CDATA[
if (window.showTocToggle) { var tocShowText = "mostra"; var tocHideText = "nascondi"; showTocToggle(); } 
//]]>- Usare le funzioni
Per utilizzare una funzione non bisogna fare altro che richiamarla (o invocarla). Se esiste ad esempio una funzione abs sarà sufficiente usarla in questa maniera:
$a = abs($b);
$c = 4 * abs(-65);
Nel momento in cui ci riferiamo alla funzione si dice che la stiamo appunto richiamando.
- Funzioni di stringa
strlen 
 strlen(stringa)
Restituisce il numero di caratteri di una stringa 
strstr 
strstr(stringa1, stringa2)
Restituisce la parte di stringa1 che si trova dopo la prima occorrenza di stringa2 in stringa1. Se non viene trovata alcuna occorrenza, la funzione restituisce false. Ad esempio: 
 strstr("it.wikibooks.org", ".")
restituisce ".wikibooks.org" 
strpos 
strpos(stringa1, stringa2)
Restituisce la posizione della prima istanza di stringa2 in stringa1. Si noti che il conteggio dei caratteri avviene a partire da 0. Ad esempio: 
strpos("it.wikibooks.org", ".")
restituisce 2. Se si vuole cercare il carattere successivo si può usare questo metodo: 
strpos(strstr("it.wikibooks.org", "."), ".")
chr e ord 
chr(numero)
ord(carattere)
Queste due funzioni restituiscono rispettivamente il carattere corrispondente al carattere numero nella tabella ASCII e la posizioni di carattere sempre nella tabella ASCII. Le due funzioni sono complementari. 
- Funzioni numeriche
abs 
abs(numero)
Restituisce il valore assoluto di numero 
pi 
pi()
Restituisce un valore approssimato di Pi greco 
pow 
 pow (base, esponente)
Restituisce base elevato alla esponente. L'esponte fornito deve essere positivo 
rand 
 rand(min, max)
Restituisce un numero casuale compreso tra min e max (inclusi) 
round, ceil, floor 
round(numero, n)
ceil(numero)
floor(numero)
Restituiscono il valore di numero arrotondato rispettivamente di n posizioni decimali, all'unità per eccesso e all'unità per difetto 
number_format 
number_format(numero, n, sep_decimali, sep_migliaia)
Restituisce una stringa contenente un valore formattato di numero in base ai parametri passati. Accetta uno, due o quattro parametri.
Se ne viene passato solo uno, viene restituito il numero senza decimali usando la virgola come separatore di migliaia
Se vengono passati due parametri, viene restituito il numero formattato con n cifre decimali, usando il punto come separatore decimale e una virgola come separatore di migliaia.
Se sono passati tutti i parametri, viene restituito il numero con n cifre decimali, usando sep_decimali come separatore decimale e sep_migliaia come separatore di migliaia. 
base_convert 
base_convert(numero, da_base, a_base)
Converte una stringa contente numero espresso nella base da_base in una stringa contente il corrispondente nella base a_base. Ad esempio:
base_convert('f',16,10);
restituisce 15. 
- Funzioni per data e ora
time 
time()
La principale funzione di data-ora è time che restituisce l'ora corrente del server in formato Unix Timestamp. Il formato Unix Timestamp indica il numero di secondi passati dalla cosidetta Unix Epoch (1 gennaio 1970 alle ore 00:00:00 GMT) ed è usato da PHP per gestire le date. 
date 
date(formato, ora)
Una volta ottenuto un valore di data valido (ad esempio tramite la funzione time o da un database MySql) è possibile formattarlo usando la funzione date che accetta un parametro obbligatorio, la stringa formato, e un parametro facoltativo ora che specifica la marcatura temporale da formattare e restituisce una stringa. 
Per formattare una data può essere comodo usare le costanti predefinite di PHP per la formattazione delle date come DATE_COOKIE, che formatta le date secondo il metodo usato nei cookie HTML (es. Monday, 15-Aug-05 15:52:01 UTC) (si veda qui· l'elenco completo) 
Per ottenere un formato personalizzato, nella stringa è possibile inserire i seguenti parametri (si ricorda che l'output può variare in base alle impostazioni di lingua del server): 
Carattere
Descrizione
Esempio
Giorni
d
Giorno del mese, senza zeri aggiuntivi
1 - 31
j
Giorno del mese, con zeri aggiuntivi
01 - 31
D
Giorno della settimana in formato breve (tre lettere)
Mon - Sat
l (L minuscola)
Giorno della settimana in formato completo
Monday - Saturday
S
Suffisso del giorno del mese per i numeri ordinali inglesi (funziona bene insieme a d)
st, nd, rd, th
Mesi
n
Numero del mese, senza zeri aggiuntivi
1 - 12
m
Numero del mese, con zeri aggiuntivi
01 - 12
F
Nome del mese completo
January - December
Anni
y
Numero dell'anno in due cifre
92, 01
Y
Numero dell'anno in quattro cifre
1992, 2001
L
Restituisce "1" se l'anno è bisestile, "0" altrimenti

Ore
g / G
Ora in formato 12/24 ore, senza zeri aggiuntivi
1 - 12, 0 - 23
h / H
Ora in formato 12/24 ore, con zeri aggiuntivi
01 - 12, 00 - 23
i / s
Minuti/secondi, con zeri aggiuntivi
00 - 59
Altro
U
Secondi dalla Unix Epoch (come time)

È possibile ottenere inoltre qui l'elenco completo. I valori non predefiniti saranno usati tali quali; è possibile inoltre evitare i caratteri speciali siano valutati è possibile usare il carattere di commutazione "\" davanti alla lettera. In questo caso si faccia però attenzion a commutare il carattere "\" nel caso le sequenze non corrispondano ad altri caratteri di commutazione. Ad esempio: 
date("l \\t\h\e jS") //è necessario commutare "\" perché \t è la tabulazione
restituisce, ad esempio, Sunday the 29th. 
mktime 
mktime(ore, minuti, secondi, mese, giorno, anno) </source>
Restituisce una data in un formato valido per PHP partendo dai valori passati come parametri. L'anno può essere espresso con 2 o 4 cifre.
L'uso di questa funzione permette di creare facilmente date da formattare. Ad esempio: 
echo(date("d F Y", mktime(0,0,0,30,07,1992));
restituisce 
30 luglio 1992
- Altre funzioni utili
include e include_once 
include(file)
include_once(file)
Queste due funzioni risultano molto utili nella programmazione di applicazione complesse, in quanto permettono di includere nella pagina PHP un altro file esterno.
Quando incontra queste funzioni, il motore PHP:
1. chiude i tag <?php ?> entrando quindi in modalità normale 
2. inserisce ed analizza il testo del file file; per inserire codice PHP sarà quindi necessario inserire nuovamente i tag <?php e ?> 
3. riapre il tag <?php 
In questo modo è possibile creare applicazione modulari inserendo nel file che verrà incluso le nostre funzioni personalizzate (che vedremo nel prossimo modulo.
Si faccià attenzione se si inserisce codice PHP nei file da includere a salvarli con estensione .php (soprattutto se contengono informazioni sensibili come password o dati personali) altrimenti un eventuale utente malintenzionati potrebbe leggerne il contenuto, in quanto il codice PHP non verrebbe prima letto dal server.
La funzione include_once si differenzia da include in quanto include il file solo se esso non è già stato incluso nella pagina.

FUNZIONI PERSONALIZZATE 
Definire una funzione
La definizione di una nuova funzione in PHP è la seguente:
 function nome_funzione ($arg1, $arg2, ...)  {
  //istruzioni
 }
Dove $arg1, $arg2 sono eventuali variabili che assumeranno i valori presi come parametri.
- Impostare un valore di ritorno
In una funzione personalizzata per impostare il valore restituito dalla funzione si usa l'istruzione return. La sua sintassi è
 return espr;
Quando il motore PHP incontra questa funzione restituisce il valore di espr e interrompe l'esecuzione del blocco della funzione tra parentesi.
Vediamo adesso un esempio che fa uso del comando return. Vogliamo realizzare un convertitore euro -> lire.
<?php
// 15 euro
$valuta = 15;
 
// definizione della funzione "converti"
function converti($euro)
{
    // effettuo la conversione
    $lire = $euro * 1936.27;
 
    // restituisco il valore calcolato
    return $lire;
}
 
// chiamo la funzione converti. Questa volta dobbiamo usare una
// variabile per raccogliere il valore restituito dalla funzione!
$vecchio_conio = converti($valuta);
echo "$valuta euro equivalgono a $vecchio_conio lire";
?>
Analizziamo la funzione "converti". Quando viene invocata riceve un parametro (la quantità di euro da convertire in lire) che viene memorizzata nella variabile $euro. La prima istruzione effettua la conversione vera e propria. Per far si che la funzione restituisca il risultato calcolato viene usato il comando return affiancato dalla variabile da restituire $lire.
Per utilizzare la funzione converti dovremo quindi specificare anche la variabile che raccoglierà il risultato restituito da tale funzione. Nel nostro esempio sarà la variabile $vecchio_conio a conservare tale valore.
Anche se il comando return è in grado di restituire una sola variabile è possibile far si che una funzione restituisca anche più di un valore attraverso un semplice espediente. E' sufficiente infatti impacchettare tutti i valori da restituire all'interno di un array e poi usare il comando return proprio con questo array.
- Usare i parametri
Una volta definita una funzione è possibile lavorare sui parametri indicati tra parentesi, che possono essere passati per valore o per riferimento, allo stesso modo con le variabili. Ad esempio:
 function prova (&$param1, $param2) {
  &$param1 = $param2 + 5;
 } 
 
 prova($var1, 3);
Dopo l'esecuzione della funzione la variabile $var1 conterrà così il valore 8. Si faccia ovviamente attenzione a passare come parametro una variabile e non un'espressione, perché altrimenti non è possibilie effettuare il passaggio per riferimento.
Si noti che una funzione personalizzata deve essere invocata necessariamente dopo la sua dichiarazione. Ad esempio:
 $var1 = funzione_esempio();
 function funzione_esempio() {
  return "ciao!";
 }
In questo caso il motore PHP restituirà un errore, in quanto la lettura dello script avviene in sequenza e la funzione funzione_esempio non è ancora stata dichiarata nel momento in cui viene chiamata.
- Parametri predefiniti
È possibile inoltre prevedere che l'utente non passi alcun valore nel chiamare la funzione ed impostare dei valori predefiniti che deve assumere il parametro nel caso non venga specificato. Ad esempio:
 function predef ($arg1, $arg2 = 10) {
  return $arg1 + $arg2  ;
 }
 echo predef(23); //restituisce 33

VARIABILI GLOBALI

Le variabili globali nascono e muoiono con una sessione di lavoro. Possono essere memorizzate sul server o sul client: in questo secondo caso utilizzano i cookies.
Per far sì che una variabile diventi globale occorre utilizzare la funzione register che ne permette la registrazione. Così operando, mentre le normali variabili globali delle form	 vengono registrate automaticamente, sarà possibile utilizzare altre variabili che avranno validità per l'interala durata della sessione.
PHP utilizza degli array associativi per diverse variabili globali. I più importanti sono $_POST e $_GET. Seppure a partire dalla versione 4.3 PHP permette di utilizzare automaticamente le variabili passate dalle form, questi due array consentono di recepire le variabili passate attraverso le form sia con il metodo GET sia con il metodo POST.
Per quando riguarda le altre variabili globali, da utilizzare all'interno di uno script PHP, vale una regola che potremmo considerare inversa alle regole di scope di C e dei principali linguaggi: se all'interno di una pagina o di una funzione voglio utilizzare la variabile $userid è opportuno che utilizzi prima la notazione global $userid. Operando in questo modo la variabile globale acquista visibilità all'interno della funzione.
-- $GLOBALS
L'array associativo $GLOBALS contiene i riferimenti a tutte le variabili locali visibili dalla root. È una variabile superglobale: ovvero non hai bisogno di scrivere global $GLOBALS all'interno di una funzione per poterla usare.
$GLOBALS contiene i riferimenti a:
_GET 
_POST 
_SERVER 
_COOKIE 
_SESSION 
_FILES 
_ENV 
_REQUEST 
GLOBALS 
Si noti che $GLOBALS è ricorsivo, ovvero contiene se stesso all'infinito. Tecnicamente infatti è corretto chiamare una variabile anche in questo modo: $GLOBALS["GLOBALS"]["GLOBALS"]['nomevar']. Chiaramente però non sarebbe né logico, né utile ad alcun fine
--- $GET

$_GET (o $HTTP_GET_VARS se la versione di PHP è inferiore alla 4.1.0) rappresenta un array associativo di variabili passate tramite barra degli indirizzi; alle coppie di chiavi e valori nell'array corrispondono le coppie di nomi e valori nella querystring.
In molte forme $_GET può essere simile a $_POST, ma la querystring non può superare i 255 caratteri; inoltre è poco sicuro in quanto è molto facile per un utente malintenzionato appendere valori alla querystring senza che vengano effettuati controlli precedenti. Una tecnica eventuale è quella di passare i valori crittandoli tramite la funzione md5, un algoritmo di criptazione univoco e non retroversibile.
Utilizzo
Si può chiamare una pagina passandole variabili tramite $_GET da un form HTML, a patto che la proprietà html del form in questione sia impostata a GET (es. <form action="pagina.html" method="get">). In questo caso le coppie di nomi-valori saranno dati dai nomi dei campi form e dai rispettivi valori.
È possibile anche chiamare una pagina passandogli variabili per indirizzo semplicemente chiamando la pagina e accodando al nome ?, seguito dalle variabili in ordine chiave=valore e suddivise da una &.
www.sito.com/chk.php?var1=valore1&var2=valore2
In questo caso avremmo un array che avrà per chiavi var1 e var2 e per valori rispettivamente valore1 e valore2.
Esempi
In un Forum
Un classico utilizzo dell'array superglobale $_GET è quello della visualizzazione di un particolare thread di un forum.
In questo caso sarà necessario predisporre una pagina ad esempio showThread.php che, letto un valore passato come ID, restituisca il thread corrispondente.
Per fare riferimento, ad esempio, al thread con id 23, si potrà usare la notazione
www.forumTestWiki.it/showThread.php?id=23
In queste situazioni l'utilizzo di GET risulta comodo, in quanto:
1. non c'è alcun problema di sicurezza (l'ID del thread non è un dato sensibile) 
2. un utente può creare un segnalibro alla pagina in modo che, poiché contiente nella URL l'ID del thread, questo sarà caricato automaticamente. 
Per un login
È possibile anche utilizzare la querystring per un sistema di login, ma questo metodo è decisamente carente in fatto di sicurezza, poiché i dati come nome utente e password sarebbero palesemente visualizzabili a schermo. 


--- POST

$_POST (o $HTTP_POST_VARS se la versione PHP è inferiore alla 4.1.0) è una delle variabili predefinite di sistema.
In sostanza è un array associativo di chiavi e valori i cui elementi sono rappresentati da tutti i campi passati allo script da un form con method impostato a POST e dai rispettivi valori; il suo funzionamento è quindi simile a $_GET ma i valori non sono passati nella querystring ma tramite il response HTTP.
Utilizzo
È possibile accedere agli elementi di questo array iterando su di essi con un ciclo foreach oppure reperire il singolo valore di un elemento se ne conosciamo la chiave, ad esempio:
$_POST[chiave]
L'accesso alle variabili potrà essere fatto anche come array semplice: $_POST[0] - purché ci si ricordi a cosa corrisponde nel form chiamante.
Ad esempio, supponiamo che in una determinata pagina vi sia un form con il metodo POST e due campi di input, uno chiamato userid (name="userid") ed uno chiamato pwd.
La pagina che verrà chiamata dalla form potrà accedere al valore delle variabili attraverso l'array associativo $_POST: cioè, $_POST["userid"] ci permetterà di accedere al valore della stringa scritta nel campo corrispondente, e lo stesso per quanto riguarda il campo pwd. L'accesso alle variabili potrà essere fatto anche come array semplice: $_POST[0], anche se questo metodo rende il codice più oscuro.
Nelle versioni a partire dalla 4.3 l'uso delle variabili globali nelle form è stato gestito in maniera automatica; ad esempio, se la form chiamante ha un campo chiamato userid, la pagina chiamata potrà utilizzare direttamente la variabile $userid ed in essa si troverà il valore corrispondente. Questo utilizzo è tuttavia sconsigliato soprattutto per motivi di sicurezza.
Esempi
Un esempio è quello di un form per un login contente un campo id e un campo pwd e con METHOD="POST"
Nella pagina di arrivo del modulo sarà quindi possibile eseguire una query al database contenente gli userID e le password, così da verificare se esiste o meno un utente con tali caratteristiche. 




--- $SESSION
Cos'è
$_SESSION rappresenta un array associativo contenente le variabili attive e valorizzate per la sessione in corso.
Per sessione si intende l'arco di tempo dal momento in cui un client esegue la prima request al vostro server fino al momento in cui il server invia la sua ultima risposta al client.
Il protocollo HTTP è infatti stateless, non permette cioè il controllo dello stato (le variabili della pagina, i suoi contenuti) tra una richiesta e l'altra al server.
Per gestire le sessioni il motore PHP registra sul server un array associativo che può essere letto dalle pagine della sessione e che è associato ad un ID univoco sul server stesso; per quanto riguarda il client, crea sul computer dell'utente un cookie contenente lo stesso ID alfanumerico. Quando avviene così la chiamata HTTP, il server può verificare sul computer dell'utente la presenza di un cookie contenente un ID valido sul server e associare quindi ad esso i dati della sessione. In questo modo esisterà sempre un collegamento univoco tra server e client.
Nel caso l'utente abbia disabilitato i cookie, PHP consente al client di inviare l'ID della sessione appendendolo alla stringa di query oppure ai parametri di un form.
Gestione delle sessioni
La prima operazione che deve essere eseguita è quella di attivare il collegamento tra server e client e inizializzare quindi la sessione. Per fare ciò PHP mette a disposizione la funzione
session_start();
Si noti che è necessario inserire questa funzione in tutte le pagine che devono avere accesso alle variabili di sessione.
Esse sono contenute nell'array associativo $_SESSION e risulta molto facile impostare o ottenere il valore di una variabile di sessione:
$_SESSION[chiave] = valore;
imposta una variabile di sessione chiave dal valore valore.
Per richiamare una variabile basta usare la notazione:
$_SESSION[chiave]
che restituisce il valore della variabile di sessione chiave.
PHP mette inoltre a disposizione alcune funzioni relative alla sessione, come il nome, l'ID, eccetera. Sono:
session_name() //restituisce il nome della sessione
session_id() //restituisce l'ID
session_encode() //restituisce le variabili di sessione nella forma chiave|valore





----- $_COOKIE
$_COOKIE (o $HTTP_COOKIE_VARS se si usa una versione di PHP precedente alla 4.1.0) è un array associativo contente tutti i cookie relativi al sito in questione.
I cookie sono dei piccoli file di testo che i siti web utilizzano per immagazzinare anche temporaneamente delle informazioni collegate all'utente in questione.
Un classico esempio di utilizzo dei cookie è quello di memorizzare sul computer dell'utente ad es.
[modifica] Utilizzo
Per impostare un cookie è possibile usare la funzione
setcookie(nome, valore, scadenza, percorso, dominio, sicuro);
dove nome e valore sono il nome e il valore del cookie.
Per specificare la scadenza in Unix Timestamp, è possibile usare la funzione time() sommando ad essa ad esempio 60*60*24; in questo modo il cookie scadrà dopo un giorno da quando è stato creato.
Per una descrizione più approfondita dei cookie e dei parametri, si veda questa pagina su Wikipedia
Per accedere ad un cookie memorizzato in precendenza dal nostro sito è possibile usare la notazione:
$_COOKIE[nome]

--- $_SERVER
$_SERVER (o $HTTP_SERVER_VARS se la versione PHP è inferiore alla 4.1.0) è una delle variabili globali predefinite di sistema.
In sostanza è un array associativo di chiavi e valori i cui elementi sono rappresentati da informazioni riguardanti il lato server, il lato client e la connessione tra di essi.
[modifica] Utilizzo
È possibile accedere agli elementi di questo array iterando su di essi con un ciclo foreach oppure reperire il singolo valore di un elemento se ne conosciamo la chiave. Nell'esempio seguente viene stampato l'indirizzo IP dell'utente:
 $ip = $_SERVER["REMOTE_ADDR"];
 print "Il tuo ip è $ip";
Si noti che alcune chiavi restituiscono o meno un valore a seconda dello stato del server e del client.
Ecco l'elenco delle chiavi in ordine alfabetico:
argc il numero degli argomenti passati da linea di comando. 
argv l'array degli argomenti passati da linea di comando. 
AUTH_TYPE tipo di autenticazione. 
DOCUMENT_ROOT la cartella radice dello script definita nel file di configrazione del server. 
GATEWAY_INTERFACE la versione delle specifiche CGI usate dal server. 
HTTP_ACCEPT 
HTTP_ACCEPT_CHARSET tipo di carattere accettato. 
HTTP_ACCEPT_ENCODING il tipo di encoding accettato. 
HTTP_ACCEPT_LANGUAGE la lingua accettata, ad es. 'it'. 
HTTP_CONNECTION 
HTTP_HOST 
HTTP_REFERER se ne esiste uno contiene l'indirizzo della pagina precedente a quella attuale, utile per sapere da dove arriva chi accede al nostro sito. 
HTTP_USER_AGENT informazioni sul sistema operativo e browser del client, ad es. 
Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)
sono le informazioni lasciate dal bot di Google e 
Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.7.10) Gecko/20050716 Firefox/1.0.6 
per un utente che usa un sistema Linux e Mozilla Firefox 
PATH_TRANSLATED 
QUERY_STRING la querystring appesa, ottenibile anche con $_GET 
REMOTE_ADDR l'indirizzo IP del client. 
REMOTE_HOST 
REMOTE_PORT la porta usata dall'utente per effettuare la connessione. 
REQUEST_METHOD il tipo di richiesta fatto per accedere alla pagina, ad esempio 'GET' o 'POST'. 
REQUEST_TIME il timestamp all'inizio della richiesta (solo dalla versione 5.1.0 di PHP) 
REQUEST_URI la URI usata per accedere questa pagina. 
SERVER_ADMIN l'amministratore del server dal file di configurazione del server. 
SERVER_NAME il nome dell' host dove lo script viene eseguito. 
SERVER_PORT la porta usata dal server. 
SERVER_PROTOCOL il nome e la versione del protocollo tramite il quale è stata richiesta la pagina ad esempio 'HTTP/1.1'. 
SERVER_SIGNATURE la firma del server contenente versione e host name. 
SERVER_SOFTWARE la stringa di identificazione del server. 
SCRIPT_FILENAME il percorso assoluto dello script in esecuzione. 
SCRIPT_NAME il nome del file 














FILE
PHP mette a disposizione numerose funzioni per leggere e/o modificare i file presenti sul server.
Esiste inoltre la possibilità di effettuare l'upload dei file dell'utente sul server stesso.

Indice
[nascondi]
1 Aprire e chiudere i file 
2 Leggere e scrivere un file 
2.1 Creare un contatore visite 
3 Altre funzioni 
4 Caricare file sul server 
//<![CDATA[
if (window.showTocToggle) { var tocShowText = "mostra"; var tocHideText = "nascondi"; showTocToggle(); } 
//]]>[modifica] Aprire e chiudere i file
Per prima cosa, quando lavoriamo con un file, dobbiamo aprirlo usando la funzione fopen la cui sintassi è:
fopen(nomefile, modalità);
dove nomefile è l'indirizzo del file sul server oppure in Internet e modalità è una stringa che specifica il modo con cui si apre il file. La funzione restituisce un puntatore univoco al file aperto che servirà successivamente per eseguire le funzione legate alla lettura e alla scrittura del file.
La modalità può essere:
Modalità
Descrizione
r
Apre il file in modalità di sola lettura
r+
Apre il file in modalità di lettura e scrittura
w
Apre il file in modalità di sola scrittura cancellando il contenuto esistente. Se il file non esiste, PHP tenta di crearlo.
w+
Apre il file in modalità di scrittura e lettura cancellando il contenuto esistente. Se il file non esiste, PHP tenta di crearlo.
a
Apre il file in modalità di sola scrittura posizionando il puntatore alla fine del file per l'inserimento. Se il file non esiste, PHP tenta di crearlo.
a+
Apre il file in modalità di scrittura e lettura posizionando il puntatore alla fine del file per l'inserimento. Se il file non esiste, PHP tenta di crearlo.
Ad esempio:
$fp = fopen('/var/www/contatore.txt','w+');
$fp2 = fopen('./contatore.txt','w+');
$fp3 = fopen('http://esempio.it/file.txt','r');
Per indicare la directory corrente, si usa un punto (.). Per salire di un livello nella gerarchia, se ne usano due (..). Ad esempio:
$fp = fopen('./contatore.txt','w+');
Se il server è su sistem Windows, che usano le barre retroverse, sarà necessario commutarle:
$fp = fopen('C:\\data\\file.txt');
Per chiudere un file già aperto usiamo semplicemente la funzione
fclose(puntatore);
[modifica] Leggere e scrivere un file
Per leggere un file si usa la funzione fread la cui sintassi è:
fread(handle, lunghezza)
e legge lunghezza byte dal file aperto identificato dal puntatore handle; dopodiché, sposta il puntatore del file di lunghezza byte in avanti.

Ad esempio:
$fp = fopen("file.txt", "r");
$contenuto = fread($fp, 10);
$cont2= fread($fp, 40);
Con questo breve spezzone, $contenuto conterrà i primi dieci byte del file e $cont2 i byte dall'undicesimo al cinquantesimo.,
Un'altra funzione utile è fgets, che funziona come fread, con la differenza che interrompe la lettura dei dati anche quando incontra un carattere EOF (fine del file) o EOL (fine della riga); questo è utile nell'ambito della lettura di stream input/output.
Per scrivere su un file aperto in modalità di scrittura è possibile usare la funzione fwrite la cui sintassi è:
fwrite(handle, stringa, n);
e scrive sul file aperto e identificato da handle i primi n byte di stringa. Se stringa è minore di n byte, viene scritto il suo contenuto per intero. La funzione restituisce -1 in caso di errore.
[modifica] Creare un contatore visite
Viste queste due semplici funzioni, possiamo ora creare un semplice contatore di visite nel nostro sito. Per evitare che il conteggio aumenti ad ogni reload della pagina, useremo delle variabili di sessione per verificare così se l'utente stava già visitando il sito prima di caricare la pagina.
session_start();
if ($_SESSION['entrato'] == false) {
 //incrementa le visite se è la prima volta che l'utente accede al sito in questa sessione
 $_SESSION['entrato'] = true;
 $fp = fopen("contatore.txt", "r+");
 
 if (!$fp) {
  //se il file non è stato aperto correttamente
   echo "Errore nell'apertura del file";
   exit; //esce dallo script PHP
 }
 
 $visite = (int) fread($fp, 10);
 $visite++;
 echo "Questo sito ha avuto $visite visite!";
 fwrite($fp, $visite);
 fclose($fp);
}
[modifica] Altre funzioni
Per la lettura dei file esiste anche la funzione file la cui sintassi è:
file(nomefile)
e restituisce l'intero contenuto del file nomefile in un array in cui ciascun elemento è una riga contenente anche il carattere di ritorno a capo. Ad esempio:
$cont = implode("", file("file.txt"));
unisce tutte le riga restituendo quindi l'intero contenuto del file.
Per eliminare i caratteri di ritorno a capo è possibile usare la funzione trim che restituisce la stringa passata come argomento eliminando gli spazi bianchi agli estremi.
Per leggere un file e metterlo in una stringa basta fare
$contenuto=file_get_contents("nomedelfile");
Per contare le righe di un file si usa:
$righe=count(file("miofile"));
Può risultare inoltre utile la funzione stat la cui sintassi è:
stat(nome)
e restituisce un array associativo contenente alcune informazione sul file nome. Tra le chiavi dell'array vi sono:
Chiave
Descrizione
Dev
Numero del dispositivo
uid e gid
ID dell'utente e del gruppo proprietario
size
Dimensioni in byte
atime e mtime
Data dell'ultimo accesso e dell'ultima modifica
basename(file) restituisce invece il nome del file passato come argomento:
echo basename('/home/gianni/documento.odt'); //restituisce documento.odt
[modifica] Caricare file sul server
PHP mette anche a disposizione, se configurato correttamente, la possibilità di caricare sul server dei file forniti dall'utente. Questo è possibile usando un form HTML che abbiamo metodo POST, enctype="multipart/form-data" e che abbia tra i suoi campi un input con type="file". Prendiamo ad esempio questo spezzone di codice:
<form method="post" enctype="multipart/form-data" action="caricafile.php">
Selezionare il file da caricare: <input type="file" name="file1" />
<input type="submit" value="carica" />
Nel file di destinazione avremo a destinazione un array $_FILES che conterrà le informazioni sui file caricati per ora in una directory temporanea sul server:
echo "Nome temporaneo del file sul server, assegnato da PHP: ".$_FILES['file1']['tmp_name']; //per esempio /tmp/php-234
echo "<br/>Nome del file sul disco rigido dell'utente: ".$_FILES['file1']['name']; //ad esempio C:\image.png
echo "<br/>Dimensione del file: ".$_FILES['file1']['size']; //ad esempio 2000
echo "<br/>Tipo di file (se fornito dal browser): ".$_FILES['file1']['type']; //per esempio, image/png
Si noti che il percorso del file sul server viene assegnato temporaneamente da PHP in una directory impostata nel file di configurazione di PHP.
Per poi copiare definitivamente il file sul server (quello temporaneo viene poi eliminato da PHP alla fine della sessione), usiamo la funzione move_uploaded_file:
$source = $_FILES['file1']['name'];
$dest = basename($_FILES['file1']['tmp_name']);
move_uploaded_file($source, "archivio/".$dest); //salva il file in una cartella apposita
ESPRESSIONI REGOLARI
Le espressioni regolari sono uno strumento molto potente, che consente complesse elaborazioni testuali.
In questa sede ci limiteremo ad illustrare il funzionamento delle regex su PHP senza però spiegare effettivamente come si scrivono le regular expressions (cosa infatti non semplice e di certo impossibile da fare in una pagina).
Per le espressioni regolari sono stati scritti varie funzioni, quelle più famose sono la coppia _ereg e il package PCRE (acronimo di "Perl Compatible Regular Expressions" ovvero Regex compatibili con Perl). Le prime tuttavia non hanno le stesse funzionalità avanzate del package PCRE, pertanto analizzeremo queste ultime in particolare (se però si vuole avere una visione anche sulle prima, basta visitare questo link).

Indice
[nascondi]
1 PCRE 
1.1 Ottenere dei dati 
1.2 Sostituire dei dati con degli altri (replace) 
1.3 Modificatori 
1.4 Particolarità 
2 Bibliografia 
3 Collegamenti esterni 
//<![CDATA[
if (window.showTocToggle) { var tocShowText = "mostra"; var tocHideText = "nascondi"; showTocToggle(); } 
//]]>[modifica] PCRE
Questa libreria è un porting in PHP di un'altra molto utilizzata e diffusa, scritta per Perl. Essa viene anche chiamata colloquialmente preg_match.
[modifica] Ottenere dei dati
Vediamo un esempio di come si utilizza una regex in PHP:
<?php
$regex = "/\[\[[Ii]m(?:age|magine):(.*?)\]\]/";
$testo = "[[Immagine:Ciao.jpg]], [[image:hello.jpg]], image:hello.jpg";
preg_match($regex, $testo, $risultato);
print_r($risultato)
?>
Se proviamo ad eseguire questo script, otterremo come risultato:
Array
(
    [0] => [[Immagine:Ciao.jpg]]
    [1] => Ciao.jpg
)
La regex utilizzata serve per trovare tutte le immagini in markup wiki; in particolare restituisce il suo nome reale (ovvero, senza il namespace immagine).
In PHP una regex deve essere definita in una stringa di testo che inizia e finisce con "/" per far capire al motore che quella è una regex e non testo qualunque. La funzione preg_match prende il primo parametro (la regex), lo confronta col secondo (il testo) e assegna il risultato alla variabile indicata come terzo parameetro (nel nostro caso $risultato , che noi mostriamo con la funzione print_r).
La variabile di risultato conterrà il testo associato dall'intera regex e l'evenutale testo dei cosidetti backreference indicati tra le parentesi (nel nostro caso rispettivamente $risultato[0] e $risultato[1]). La prima parentesi non viene restituita come backreference solo perché è stato utilizzato il modificatore ?: che indica al motore delle regex di non contare quelle determinate parentesi per le backreference (ciò serve per rendere la regex più veloce).
Perché, però, non prende anche image:hello? Perché preg_match restituisce solo la prima occorrenza, per ottenerle tutte bisogna usare preg_match_all:
<?php
$regex = "/\[\[[Ii]m(?:age|magine):(.*?)\]\]/";
$testo = "[[Immagine:Ciao.jpg]], [[image:hello.jpg]], image:hello.jpg";
preg_match_all($regex, $testo, $risultato);
print_r($risultato);
?>
Risultato:
Array
(
    [0] => Array
        (
            [0] => [[Immagine:Ciao.jpg]]
            [1] => [[image:hello.jpg]]
        )

    [1] => Array
        (
            [0] => Ciao.jpg
            [1] => hello.jpg
        )

)
In questo modo abbiamo quindi sia "il pezzo di codice" che volevamo passare al parser che il risultato nello specifico.
Abbiamo quindi due array annidati dentro un altro, pertanto per accedere al primo basterà usare $risultato[0], mentre $risultato[1] per il secondo. Per accedere invece, per esempio, a Ciao.jpg, basterebbe utilizzare $risultato[1][0].
[modifica] Sostituire dei dati con degli altri (replace)
Poniamo per esempio di dover cambiare tutti le stringhe di wikicodice [[Image:x]] con [[Immagine:x]] per ovviare a degli ipotetici problemi tecnici del motore wiki.
<?php
$testo = "[[image:ciao.png]], [[Image:CIAO.jpeg]]";
$regex = "/\[\[[Ii]mage:(.*?)\]\]/";
$regex2 = "[[Immagine:\\1]]";
$risultato = preg_replace($regex, $regex2, $testo);
print $risultato;
?>
Il risultato di questo script è:
[[Immagine:ciao.png]], [[Immagine:CIAO.jpeg]]
In questo modo abbiamo definito una prima regex per ottenere le sottostringhe e poi una seconda per indicare con cosa sostituire il testo associato dalla prima. Dato che la seconda è una stringa e la backslash (\) è un carattere speciale in PHP, bisogna farne l'escape(aggiungendo quindi un'altra backslash) per ottenere un backreference (riferimento all'indietro, ovvero andare a prendere la parentesi identificata dal numero).
Attenzione:
1. preg_replace restituisce un valore tramite assegnamento (ovvero, dovete usare la sintassi $variabile = preg_replace();) al contrario di quanto faceva preg_match[_all]) 
2. Questa regex non è la migliore in quanto il tutto potrebbe essere fatto semplicemente sostituendo "/\[\[[Ii]mage:/" con "[[Immagine". La parte superflua è stata tuttavia inserita ad esclusiva finalità didattica (per spiegare come usare le backreference correttamente). 
[modifica] Modificatori
Modificatore
Descrizione
i
Rende le regex case-insensitive.
m
Permette la modalità multi-riga, così ^ si ancora all'inizio di ogni frase e $ alla fine sempre di ogni frase.
s
Permette la modalità mono-riga, così ^ si ancora all'inizio del testo e $ alla fine (di tutto il testo). Il metacarattere "." può essere utilizzato per "prendere" anche gli a-capo.
x
Modalità estesa, gli spazi dentro la regex fuori da espressioni vengono ignorati, permette inoltre di commentare le regex con #.
e
La stringa (la $regex2 usata sopra) usata in preg_replace viene elaborata come codice PHP.
A
Àncora la regex per forza all'inizio del testo.
D
Il carattere $ ancora solo a fine testo.
u
Modalità unicode.
I modificatori servono a modificare il comportamento del motore di regex utilizzato. Per esempio, la regex usata sopra per "italianizzare" tutte le immagini, diventerebbe:
<?php
$testo = "[[image:ciao.png]], [[Image:CIAO.jpeg]]";
$regex = "/\[\[image:(.*?)\]\]/i";
$regex2 = "[[Immagine:\\1]]";
$risultato = preg_replace($regex, $regex2, $testo);
print $risultato;
?>
Con risultato: [[Immagine:ciao.png]], [[Immagine:CIAO.jpeg]]
Come si può vedere, il risultato è identico sebbene l'espressione regolare non sia la stessa (notare in particolare la i dopo l'ultimo slash - / - della regex).
[modifica] Particolarità
Le backreference (quelle di solito identificate come \1 o \\1 in php) possono anche essere richiamate con $1 (sostituendo l'1 al numero desiderato) come si fa in Perl.
[modifica] 


CONNESSIONE AI DB (MYSQL)

PHP, come già specificato, può accedere a database. Il tipo di database più utilizzato sul web è MySQL.
[modifica] Connessione ad un server mysql e selezione del database
Per la connessione al server, PHP ha una funzione specifica: mysql_connect(), la cui sintassi è: mysql_connect(host_db, username, password);
Esempio:
<?php
     mysql_connect("localhost","tuousername","tuapassword") 
     or die("Errore nella connessione MySQL");
?>
Con questo codice, PHP tenta la connessione a localhost con l'username e la password forniti, in caso di fallimento, stampa il messaggio di errore.
Con questa funzione il PHP si connetterà a MySQL e sarà pronto per lavorare. Per selezionare il database su cui dobbiamo eseguire le nostre query abbiamo la funzione mysql_select_db: mysql_select_db(nomedb, [puntatore]);
Esempio:
<?php
     $db = mysql_connect("localhost", "tuousername", "tuapassword") 
         or die("Errore nella connessione MySQL");
     mysql_select_db("test", $db) or die("Database inesistente");
?>
Adesso PHP tenta la connessione al database test dal server localhost al quale ci siamo connessi prima. Nel caso il database non esistesse o in caso di errore, verrebbe inviato il messaggio "Database inesistente". Come potete vedere, in questo caso la funzione mysql_connect() è stata assegnata alla variabile $db, che in questo caso diventa un puntatore di risorse. In questo modo, possiamo aprire più connessioni contemporanee assegnate a diversi puntatori.
[modifica] Esecuzione di query
Dopo aver aperto il database, possiamo eseguire delle operazioni con i dati presenti al suo interno (vedi MySQL), come la creazione o eliminazione di tabelle o inserimento e richiesta di dati. Per inviare comandi MySQL al server si utilizza la funzione mysql_query():
<?php
     $db = mysql_connect("localhost", "tuousername", "tuapassword") 
         or die("Errore nella connessione MySQL");
     mysql_select_db("test", $db) or die("Database inesistente");
     if (mysql_query("SELECT * FROM registrati",$db)) {
         echo "Query eseguita con successo";
     } else {
         echo "Errore nell'esecuzione della query: ".mysql_error();
     }
?>
Questo codice, recupera tutti i record della tabella registrati del database test sul server localhost. In caso di errore verrà visualizzato un messaggio contenente la descrizione dell'errore. È utile inserire la funzione mysql_query sempre in un puntatore (diverso da quello del database), per l'utilizzo dei dati
[modifica] Funzioni PHP - MySQL
Nel caso in cui avessimo bisogno di prendere dei dati da un database dovremo utilizzare la funzione mysql_fetch_array() che crea un array con indice, i nomi delle colonne del database e come dati il primo dell'elenco dei risultati della query. Supponiamo di avere una tabella così strutturata:
Nome
Cognome
Data_nascita
Città
Tizio
Rossi
20/11/1957
Milano
Caio
Bianchi
12/03/1985
Roma
Sempronio
Verdi
08/06/1967
Napoli
Con questo codice:
<?php
     $db = mysql_connect("localhost", "tuousername", "tuapassword") 
         or die("Errore nella connessione MySQL");
     mysql_select_db("test", $db) or die("Database inesistente");
     $query = mysql_query("SELECT * FROM registrati",$db);
     $risultato = mysql_fetch_array($query);
?>
verrà creato un array $risultato contenente solo una riga della tabella strutturato così:
$risultato['Nome'] = "Tizio" 
$risultato['Cognome'] = "Rossi". 
$risultato['Data_nascita'] = "20/11/1957". 
$risultato['Città'] = "Milano". 
Per vedere tutte le righe della tabella, bisogna fare così:
<?php
     $db = mysql_connect("localhost", "tuousername", "tuapassword") 
         or die("Errore nella connessione MySQL");
     mysql_select_db("test", $db) or die("Database inesistente");
     $query = mysql_query("SELECT * FROM registrati",$db);
     while($riga = mysql_fetch_array($query))
     {
      $risultato[]=$riga;
     }
?>
e allora la variabile $risultato sarà:
$risultato[0] 
$risultato[0]['Nome'] = "Tizio" 
$risultato[0]['Cognome'] = "Rossi". 
$risultato[0]['Data_nascita'] = "20/11/1957". 
$risultato[0]['Città'] = "Milano". 
$risultato[1] 
$risultato[1]['Nome'] = "Caio" 
$risultato[1]['Cognome'] = "Bianchi". 
$risultato[1]['Data_nascita'] = "12/03/1985". 
$risultato[1]['Città'] = "Roma". 
$risultato[2] 
$risultato[2]['Nome'] = "Sempronio" 
$risultato[2]['Cognome'] = "Verdi". 
$risultato[2]['Data_nascita'] = "08/06/1967". 
$risultato[2]['Città'] = "Napoli". 
ACCESSO DB
L'accesso al database può essere effettuato con due funzioni simili: mysql_connect e mysql_pconnect. La differenza saliente fra le due è che la seconda, rispetto alla prima, crea una connessione di tipo permanente. Una connessione permanente viene aperta e tenuta sempre in vita, mentre una non permanente viene svegliata soltanto nel momento in cui devono essere inviate query string e ricevuti dataset.
Le funzioni di connect accettano quattro parametri:
hostname[:port] (string): il nome dell'host (o il relativo IP) eventualmente seguito dal numero di porta su cui risponde il server MySQL 
username (string): l'utente MySQL 
password (string): la password definita per l'utente specificato 
new_connect_flag (boolean): se questo parametro è impostato 'true' si intende che, nella situazione in si esegua una connect con parametri già utilizzati precedentemente nello script, verrà creato un nuovo identificatore di risorsa, invece di ritornare quello creato precedentemente. 
Importante:
1. utilizzate con diligenza la mysql_pconnect in quanto, se dimenticare di chiudere la connessione, questa rimarrà aperta anche dopo che lo script ha terminato la sua esecuzione 
2. non utilizzare il parametro new_connection_flag se non è estremamente necessario in quanto i server MySQL sono di solito configurati per gestire circa 30-100 connessioni 
Entrambe le funzioni ritornano un intero che definisce la risorsa (resource identifier). Questo valore dovrebbe essere salvato in una variabile e passato a tutte le funzioni che lo richiedano come parametro. Di fatto il parametro è opzionale in quanto il modulo per MySQL di PHP tiene traccia dei parametri di connessione utilizzati (se si aprono più connessioni memorizza i più recenti) ed esegue le operazioni necessarie per tenere aperta una connessione ad ogni invio di query.
Una volta aperta la connessione è possibile, ma non necessario, scegliere il database da utilizzare chiamando la funzione mysql_select_db, pseudonimo della query "USE DATABASE my_little_db".
Per i programmatori più esperti e negli ambiti di applicazioni a carattere enterprise, un consiglio è quello di utilizzare uno stereotipo poco in voga ma veramente utile. È necessario creare un file di init seguendo l'esempio
[DB_MASTER_CONFIG]
host = mysqlsrv.dominio.it:3306
usr  = root
pwd  = pwd_for_root
db   = application_db
Inserite nel vostro script (preferibilmente nel file delle configurazioni, come è consono per applicazioni di grosse dimensioni) il seguente segmento di codice
$DBCONF = parse_ini_file('/my_path/my_init_file.ini') ;
$host = $DBCONF['host'] ;
$usr  = $DBCONF['usr'] ;
$pwd  = $DBCONF['pwd'] ;
$db   = $DBCONF['db'] ;
$link_id = mysql_connect( $host, $usr, $pwd )
  or die("Errore nella connessione al mysql server");
mysql_select_db( $db, $link_id )
  or die("Errore nella selezione del db: ".mysql_error($link_id)) ;
L'invio di una query MySQL 
in PHP avviene tramite la funzione mysql_query la cui sintassi è:
mysql_query(query, connessione)
dove query è una stringa contenente il testo della query MySQL da eseguire e connessione è un puntatore di risorsa aperta con la funzione mysql_connect e connessa ad un database. A seconda del tipo di query inviata al database, la funzione mysql_query restituisce valori differenti:
se la query è di inserimento restituisce un puntatore al fieldset ottenuto dall'esecuzione della query (ad esempio una query come "SELECT * FROM registrati" dell'esempio precedente) 
negli altri casi la query restituisce un valore boolean che indica l'esito positivo o meno della query 
Nell'invio di una query è necessario, se non viene già fatto dal server MySql, convertire i caratteri come gli apostrofi con la loro commutazione \', in quanto potrebbero dare problemi per quanto riguarda l'invio di stringhe alfanumeriche, tramite la funzione addslashes, la cui sintassi è
addslashes(stringa_da_commutare)
e restituisce la stringa stessa con i caratteri speciali commutati. La sua funzione inversa è
stripslashes(stringa_già_commutata)
È consigliabile inoltre prevedere controlli per evitare intrusioni indesiderate da parte di hacker, evitando ad esempio che eventuali campi di input (per esempio nome utente o password) contengano spazi, i quali permetterebbero l'esecuzione di JOIN o query multiple. 
RISULTATO QUERY 

Una volta ottenuto il puntatore al risultato della query tramite la funzione mysql_query è possibile procedere all'uso del result-set. Per fare ciò PHP mette a disposizione numerose funzioni:
la più usata è mysql_fetch_array(risultato, tipo_array) che restituisce l'i-esimo record del fielset e incrementa di uno l'indice, dove risultato è un puntatore di fieldset MySQL. In base al parametro tipo_array la funzione restituisce valori differenti: 
MYSQL_ASSOC: il risultato della funzione è un array associativo che ha per chiavi i nomi dei campi e per valori i dati contenuti nel record 
MYSQL_NUM: il risultato della funzione è un array associativo che ha per chiavi dei numeri interi e per valori i dati contenuti nel record 
MYSQL_BOTH: il risultato della funzione è un array associativo che ha per chiavi sia i nomi sia gli indici numerici dei campi e per valori i dati contenuti nel record. 
Per iterare su tutti gli elementi è sufficiente usare un ciclo while: 
 //da notare l'uguale di assegnazione e non di confronto
 //che assegna a $r ad ogni iterazione il valore restituito dalla funzione...
 while ($r = mysql_fetch_array($risultato, MYSQL_BOTH) { 
 //stampa ad esempio i valori di una ipotetica tabella utenti sulla pagina
 echo $r['nome_utente']."<br/>;";
 echo $r['data_iscrizione']."<hr/>";
 }
Infatti quando finiscono i record del fieldset la funzione mysql_fetch_array restituisce un array vuoto, che viene assegnato alla variabile $r. Per le regole di conversione, un array vuoto viene convertito in boolean in FALSE. Negli altri casi, l'array sarà non vuoto e la variabile $r verrà convertita in TRUE. 
mysql_num_rows(risultato) restituisce il numero di righe restituite dalla query identificata da risultato. È utilizzato frequentemente per verificare durante un login l'esistenza di un determinato utente con una precisa password. Ad esempio: 
 <?php
 //presuppone il collegamento ad un database contentente nomi utente e password
 if (isset[$_POST['uid']) { //verifica che il form abbia inviato dei valori
  //è meglio memorizzare le password crittandole,
  //in modo che siano più sicure, tramite la funzione md5
  $q = "SELECT * FROM utenti WHERE uid = '";
  $q .=  $_POST['uid']."' AND pwd = '".md5($_POST['pwd'])."'";
  $ris = mysql_query($q, $conn);
  if (mysql_num_rows($ris) == 1) { //verifica che esista l'utente
   //imposta alcune variabili di sessione
   $_SESSION['logged'] = true;
   $_SESSION['uid'] = $_POST['uid']
   ''...ecc...''
  } else {
  ?>
   Nome utente o password scorretti. &lt;a href="login.php"&gt;Ritorna&lt;/a&gt;
  <?php
  }
 }else{
  ?>
   <form method="post" action="login.php">
   ''...qui i campi uid e pwd...''
  </form>
  <?php
 }
 ?>
mysql_insert_id(database) restituisce l'ultimo valore auto-incrementato dal database (es. campi ID) 
mysql_data_seek(risultato, posizione) sposta il puntatore del fieldset risultato al record di posizione posizione (partendo da 0) 
# PHP: OOP


## cosa sono gli oggetti

*codice raggruppato che fa riferimento ad un unico tema*

* astrazione delle strutture di codice
  * attributi
  * funzioni (metodi)

ad un livello base, con poche informazioni utilizziamo gli **array** per aggregare le nostre informazioni

gli **oggetti** servono per organizzare e mantenere il codice

* aggiungono chiarezza, riducendo la complessità
* regole semplici e interazione complessa
* lasciano maggior spazio ai dati
* permettono la modularizzazione e la riusabilità del codice

---

## Oggetti

Una classe è un modello utilizzato per creare oggetti. Per definirne uno viene utilizzata la parola chiave class, seguita da un nome e da un blocco di codice. 

La convenzione di denominazione per le classi è maiuscola, il che significa che ogni parola dovrebbe essere inizialmente in maiuscolo.

Il corpo della classe può contenere proprietà e metodi. Le proprietà sono variabili che mantengono lo stato dell'oggetto, mentre i metodi sono funzioni che definiscono ciò che l'oggetto può fare. 

Le proprietà sono anche conosciute come campi o attributi in altre lingue. In PHP, devono avere un livello di accesso esplicito specificato. Di seguito viene utilizzato il livello di accesso public, che consente l'accesso illimitato alla proprietà.

```php
class Rettangolo
{
  public $x, $y;
  function newArea($a, $b) { return $a * $b; }
}

```

---

Per accedere ai membri dall'interno della classe, viene utilizzata la pseudo variabile $this insieme all'operatore a freccia singola (`->`). La variabile `$this` è un riferimento all'istanza corrente della classe e può essere utilizzata solo all'interno di un contesto di oggetti. Senza di essa, `$x` e `$y` sarebbero visti solo come variabili locali.

---
## Istanziare  un oggetto

Per utilizzare i membri di una classe dall'esterno della classe che la racchiude, è necessario prima creare un oggetto della classe. Questo viene fatto usando la parola chiave `new`, che crea un nuovo oggetto o istanza.
$r = new Rettangolo(); // oggetto istanziato
L'oggetto contiene il proprio insieme di proprietà, che possono contenere valori diversi da quelli di altre istanze della classe. Come per le funzioni, gli oggetti di una classe possono essere creati anche se la definizione della classe appare più in basso nel file di script.

```php
$r = new ClasseDemo(); // ok
classe ClasseDemo {};
```

---

## Accesso ai membri dell'oggetto
Per accedere ai membri che appartengono a un oggetto, è necessario l'operatore freccia singola (`->`). Può essere utilizzato per chiamare metodi o assegnare valori a proprietà.

```php
$r->x = 5;
$r->y = 10;
$r->getArea(); // 50
```

Un altro modo per inizializzare le proprietà consiste nell'utilizzare i valori delle proprietà iniziali.

---

## Valori iniziali delle proprietà

Se una proprietà deve avere un valore iniziale, un modo semplice consiste nell'assegnare la proprietà nello stesso momento in cui viene dichiarata. Questo valore iniziale viene quindi impostato al momento della creazione dell'oggetto. Deve essere un'espressione costante. Non può, ad esempio, essere una variabile o un'espressione matematica.

```php

class Rettangolo
{
  public $x = 5, $y = 10;
}
```

---

## Costruttore
Una classe può avere un costruttore, che è un metodo speciale utilizzato per inizializzare (costruire) l'oggetto. Questo metodo fornisce un modo per inizializzare le proprietà, che non è limitato alle espressioni costanti. In PHP, il costruttore inizia con due caratteri di sottolineatura seguiti dalla parola costrutto. Metodi come questi sono conosciuti come metodi magici.
```php
class Rettangolo
{
   public $x, $y;
   function __construct()
   {
     $this->x = 5;
     $this->y = 10;
     echo "Costruito";
} }
```

Quando viene creata una nuova istanza di questa classe, viene chiamato il costruttore, che in questo esempio imposta le proprietà sui valori specificati. 

Si noti che tutti i valori di proprietà iniziali vengono impostati prima dell'esecuzione del costruttore.
`$r = new Rettangolo(); // "Costruito"`

Poiché questo costruttore non accetta argomenti, le parentesi possono essere opzionalmente omesse.
`$r = new Rettangolo; // "Costruito"`

---

Proprio come qualsiasi altro metodo, il costruttore può avere un elenco di parametri. Può essere utilizzato per impostare i valori delle proprietà sugli argomenti passati al momento della creazione dell'oggetto.
```php
class Rettangolo
{
   public $x, $y;
   function __construct($x, $y)
   {
     $this->x = $x;
     $this->y = $y;
   }
}

$r = new Rettangolo(5,10);
```

---

## Distruttore

Oltre al costruttore, le classi possono avere anche un distruttore. Questo metodo magico inizia con due trattini bassi seguiti dalla parola distruzione. Viene chiamato non appena non ci sono più riferimenti all'oggetto, prima che l'oggetto venga distrutto dal Garbage Collector di PHP.

```php
class Rettangolo
{
// ...
   function __destruct() { echo "Distrutto"; }
}
```

Per testare il distruttore, la funzione unset può rimuovere manualmente tutti i riferimenti all'oggetto.
`unset($r); // "Distrutto"`


---

Se non definirete un costruttore e un distruttore per la vostra classe
(oggetto), PHP li rimpiazzerà con dei metodi propri di default.

Il costruttore verrà chiamato automaticamente da PHP, ogni volta che verrà
creato un oggetto (istanza), mentre il distruttore sarà chiamato quando l'oggetto
verrà distrutto, ossia quando non esiste più alcun riferimento all'oggetto oppure
alla fine dello script.

---

## Confronto di oggetti

Quando si utilizza l'operatore "uguale a" (`==`) sugli oggetti, questi oggetti sono considerati uguali se gli oggetti sono istanze della stessa classe e le loro proprietà hanno gli stessi valori e tipi. Al contrario, l'operatore "strettamente uguale a" (`===`) restituisce true solo se le variabili si riferiscono alla stessa istanza della stessa classe.

---


## Modificatori di accesso

* **public** - I membri (attributi o metodi) della classe dichiarati public, possono essere utilizzati sia all'interno che all'esterno della classe (`$this->membro` oppure `$oggetto->membro`)
* **private** - I membri dichiarati private, possono essere utilizzati solo all interno della classe ($this->membro)
* **protected** - I membri dichiarati protected, possono essere utilizzati solo all'interno delle classi madri e derivate ($this->membro), questo modificatore implica l'ereditarietà

---

## getter e setter

In Php sono disponibili i metodi magici `__get and __set`

```php
<?php
class ContoBancario {
    private $saldo;

    public function __get($nomeAttributo) {
        return $this->$nomeAttributo;
    }

    public function __set($nomeAttributo, $value) {
        if ( isset($value) ) $this->$nomeAttributo = $value;
    }
}
$mioConto = new ContoBancario();
$mioConto->saldo = 1000;//setter
echo $mioConto->saldo;//getter

```

---


### Utilizzo delle costanti globali

Con le costanti globali è necessario omettere il simbolo del dollaro $ durante la dichiarazione.

I nomi delle costanti in PHP 5 sono sempre Case Sensitive, ed è buona norma scriverle tutte in maiuscolo per distinguerle immediatamente come costanti, ma non è obbligatorio.

---

### test.php

```php
require once("Taglie.php");

echo Taglie::XL . "";

Taglie::mostraTaglia();

```

---

### autoloader delle classi

```php

function includeClassFile($class) {
    $file = "include/" . strtolower( trim( $class ) ) . ".php";
    if (file_exists($file)
    {
        include $file;
        return true;
    }
    return false;
}

spl_autoload_register('includeClassFile');
```# Costrutti di controllo

Costrutti di controllo di flusso delle istruzioni

## Sequenza

Elenco di istruzioni fra parentesi graffe

```php
{ 
    <statement> 
    ... 
    <statement> 
}
```

---

## Alternativa - condizione - selezione 

Scelta fra due o più vie alternative (una sì e le altre no)
```php
if (<espressione>){
    //<statement>
    } //if

if (<espressione>){
    //<statement>
    } //if ... else
else 
    //<statement>

if (<espressione>){
    //<statement>
    } //else if
elseif (<espressione>){
    //<statement>
    } 
else 
    //<statement>
```

---

### Attenzione

Nell’utilizzo di istruzioni ‘if/else’ in una funzione o in una classe, si pensa spesso che ‘else’ debba essere necessariamente usato per potenziali risultati.

Ma se il risultato è la restituzione di un valore, ‘else’ non è necessario, perché ‘return’ terminerà la funzione, rendendo ‘else’ inutile.

```php
    <?php
    function test($a)
    {
        if ($a) {
            return true;
        } else {
            return false;
        }
    }
    
    // contro
    
    function test($a)
    {
        if ($a) {
            return true;
        }
        return false;    // else non è necessario
    }

*   [Costrutti if](http://php.net/control-structures.if)
```

---

### Istruzioni switch

Le istruzioni switch sono un ottimo modo per evitare di scrivere infiniti if ed elseif, ma ci sono un paio di cose a cui prestare attenzione:

*   Le istruzioni switch confrontano solo i valori, non il tipo (equivalente a ‘==’)
*   Iterano caso dopo caso finché non viene trovata una corrispondenza. Se non viene trovata, viene eseguita quella di default (se definita)
*   Senza un ‘break’, continueranno a implementare ogni caso finché non raggiungono un break/return
*   In una funzione, l’utilizzo di ‘return’ elimina la necessità per un ‘break’, perché esso termina la funzione

---

```php
    <?php
    $answer = test(2);    
    
    
    function test($a)
    {
        switch ($a) {
            case 1:
                // codice...
                break; // break viene usato per terminare l'istruzione switch
    // sia il codice del 'case 2', sia quello del 'case 3' saranno implementati
            case 2:
                // codice...         
                // senza un break, il confronto continua fino al caso 3
            case 3:
                // codice...
                return $result;    // in una funzione, 'return' termina la funzione
            default:
                // codice...
                return $error;
        }
    }
```

---

## switch

Ha una sintassi articolata:

```php 
switch (<espressione>){
    case <valore1>:
    <statement>...<statement>
    break;

    case <valore2>:
    <statement>...<statement>
    break;
    ... altri case ...
    
    case <valoreN>:
    <statement>...<statement>
    break;
    
    default:
    <statement>...<statement>
    break;
}
```

---

## Iterazione - ripetizione - loop

Costrutti per la esecuzione ripetuta di istruzioni

### while
`while (<espressione>) <statement>`

### do while
`do <statement> while (<espressione>)`

---

### for
`for (<espressione1>;<espressione2>;<espressione3>) <statement>`


### foreach

* sintassi 1

`foreach (<array_expression> as <variabile>) <statement>`

* sintassi 2

`foreach (<array_expression> as <variabileK> => <variabileV>)<statement>`

---

controllo di cicli e selezioni

### break

Interrompe l'esecuzione del costrutto in cui è inserito, tipica applicazione è all'interno dello
switch come visto in precedenza. Può essere utilizzato anche all'interno di for, foreach,
while, do-while, in tal caso interrrompe forzatamente la ripetizione.

### continue

Salta cioè che segue all'interno del costrutto ciclico in cui è inserito, senza però interrompere necessariamente la ripetizione

### return

`return <espressione>`

Interrompe l'esecuzione del metodo corrente e restituisce all'ambiente chiamante il valore
ottenuto valutando l'espressione.

Si rimanda al [manuale php](http://www.php.net/manual/en/language.control-structures.php) per gli approfondimenti

---

## Operatore `null coalescing`

L'operatore `null coalescing (??)` è stato aggiunto in PHP 7 come scorciatoia per il caso comune di utilizzo di un ternario con `isset`. Restituisce il suo primo operando se esiste e non è nullo; in caso contrario, restituisce il suo secondo operando.

```php
$x = null;
$nome = $x ?? 'sconosciuto'; // "sconosciuto"
```

Questa istruzione è equivalente alla seguente operazione ternaria, che utilizza il costrutto isset.

`$nome = oggetto($x) ? $x : 'sconosciuto';`# Corso PHP

---

## PHP Overview

* Cos'è PHP, a cosa serve
* La storia di PHP
* Perchè scegliere PHP

---

## Installazione

* Installare un Web Server (Apache, Nginx, ...)
* Modificare la document root
* Abilitare PHP
* Configurare PHP
* Installare e configurare MySQL
* Le principali istruzioni MySQL
* Text editor, IDE

---

## Primi passi

* Incorporare codice PHP in una pagina
* Mandare in output testo dinamico (generato lato server)
* Conoscere gli operatori principali
* Inserire commenti al codice

---

## Tipi di dato

* Variabili
* Costanti
* Numeri: Integers
* Numeri: Floating points
* Booleans
* NULL e empty
* Stringhe
* Arrays
* Associative arrays
* Funzioni per String 
* Funzioni per Array 
* Type juggling e type casting (conversioni di tipo)

---

## Strutture di controllo - Espressioni Logiche

* If statements
* Else e elseif statements
* Switch statements
* Operatore ternario (if su una riga)
* Operatori logici

---

## Strutture di controllo - Loops

* While e do-while loops
* For loops
* Foreach loops
* Continue
* Break
* Scorrere gli array

---

## Funzioni definite dagli utenti

* Definire funzioni
* Function arguments
* Ritornare valori da una function
* Scope e global variables
* Settare valori di default per gli argomenti 

---

## Debugging

* Problemi comuni
* Warnings e tipi di errore in PHP
* Il costrutto try - catch
* Debugging e troubleshooting

---

## Pagine web dinamiche con PHP

* Links e URLs
* Usare valori inviati via GET
* Codificare per HTML
* Including e requiring files
* Modificare headers
* Page redirection
* Output buffering

---

## Lavorare con Forms e Form Data

* Creare form html per inviare dati al server
* Gestire le form submissions
* Processare i valori del form html
* Validare i valori del form
* Problemi con la validazione
* Mostrare validazione errori
* Funzioni custom per la validazione 
* Single-page form con validazione

---

## Persistenza con Cookies e Sessions

* Lavorare con cookies
* Settare valori dei cookies 
* Leggere valori dei cookies 
* Resettare valori dei cookies 
* Lavorare con le sessioni

---

## Recap MySQL Base

* Intro MySQL 
* Creare database
* Creare tabelle e viste
* Popolare database MySQL 
* CRUD in MySQL
* Gestire le tabelle relazionali

---

## Usare PHP per accedere a MySQL

* Database APIs in PHP
* Connettere MySQL con PHP
* Ricevere dati da MySQL
* Lavorare con i dati
* Creare record con PHP
* Aggiornare ed eliminare record con PHP
* Prevenire le SQL injection
* Tecniche di filtro ed escaping strings per MySQL
* Introduzione ai prepared statements

---

## OOP in Php

* Programmare ad Oggetti
* Modificatori di accesso
* Metodi Getters e Setters
* Oggetti e costanti
* Utilizzo delle costanti globali
* Oggetti ed Ereditarietà
* Polimorfismo
* Classi astratte
* Interfacce
* Il namespace
* Il caricamento automatico delle classi autoload
* Gestire le dipendenze con composer e packagist
# Php PDO: PHP Data Object 

La classe PDO è stata introdotta a partire dalla versione 5.1 di PHP e permette la connessione a diversi DBMS (MySQL, SQLite, PostgreSQL, Oracle, ...).

Si tratta di un'astrazione del concetto di connessione, potremmo definirlo un wrapper.

Con l'estensione PDO possiamo usare diversi metodi per interagire col database.

---

## Effettuare la connessione

PDO supporta solo la programmazione OOP. Per effettuare la connessione occorre creare una nuova istanza della classe PDO.

```php

// database connection
try{
	$DB = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
}
catch(PDOException $e) {
	echo "Impossibile connettersi: ". $e->getMessage();
}
```

---

## Effettuare una richiesta

```php
//select
$sql = "SELECT titolo FROM libri ORDER BY titolo";
$query = $DB->query($sql);

```

---

## Ricevere i dati: Php PDO Fetch methods

Php PDO dispone dei metodi **PDO::fetch()**, sono generalmente utilizzati per ricevere dati dal database.

* PDO::FETCH_ASSOC

```php
/*Prove di PDO::fetch*/¶
$stmt = $DB->prepare("SELECT nome, cognome FROM studenti");
$stmt->execute();
echo ("PDO::FETCH_ASSOC: ");
echo ("Ritorna la riga successiva come array indicizzato per  nome colonna\n");
$result = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($result);
echo ("\n");
```  
 
```php
    // Fetch using associative array.
    //Analogo al deprecato mysql_fetch_assoc
    $query->setFetchMode(PDO::FETCH_ASSOC);
    while($result = $query->fetch()){
    print_r($result);
}
```

---

* PDO::FETCH_NUM

```php 
    // Fetch as numeric array.
    $query->setFetchMode(PDO::FETCH_NUM);
    while($result = $query->fetch()){
    print_r($result);
}
```

---

* PDO::FETCH_BOTH

```php
    // Fetch as associative array and numeric array both.
    //Analogo al deprecato mysql_fetch_array 
    $query->setFetchMode(PDO::FETCH_BOTH);
    while($result = $query->fetch()){
    print_r($result);
}
```

```php
echo ("PDO::FETCH_BOTH: ");
echo ("Ritorna la riga successiva come array indicizzato per  nome e numero di colonna\n");
$result = $stmt->fetch(PDO::FETCH_BOTH);
print_r($result);
echo ("\n");
```

---

* PDO::FETCH_OBJ 

```php
    // Fetch as object.
    //Analogo al deprecato mysql_fetch_obj 
    $query->setFetchMode(PDO::FETCH_OBJ);
    while($result = $query->fetch()){
    print_r($result);
}
```

```php
echo ("PDO::FETCH_OBJ: ");
echo ("Ritorna la riga successiva come oggetto anonimo con i nomi delle colonne come proprietà \n");
$result = $stmt->fetch(PDO::FETCH_OBJ);
print $result->name;
echo ("\n");
```

---

* PDO::FETCH_LAZY
```php
echo ("PDO::FETCH_LAZY: ");
echo ("Ritorna la riga successiva come oggetto anonimo con i nomi delle colonne come proprietà \n");
$result = $stmt->fetch(PDO::FETCH_LAZY);
print_r($result);
echo ("\n");
```

* PDO::FETCH_BOUND 

---

* PDO::FETCH_CLASS 

```php
try{
	$result =  $con->query("SELECT * FROM studenti");
		
		$result->setFetchMode(PDO::FETCH_CLASS , "Studente");
		
	while($studente = $result->fetch()){
		
		echo "ID : $studente->id Nome : $studente->nome   Matricola: $studente->matricola <br>";
		
	}
	
}
```

---

* PDO::FETCH_INTO 

```php
<?php

$sql_server = "localhost";
$sql_db = "test";
$sql_user = "root";
$sql_pass = "";

$pdo = new PDO("mysql:host=$sql_server;dbname=$sql_db", $sql_user, $sql_pass);

$sql = 'SELECT firstName, lastName FROM users';

$stmtA = $pdo->query($sql);
$stmtA->setFetchMode(PDO::FETCH_CLASS, 'Person');

$objA = $stmtA->fetch();
var_dump($objA);

//first create the object we will fetch into
$objC = new Person;
$objC->firstName = "firstName";
$objC->lastName = "lastName";

$stmtC = $pdo->query($sql);
$stmtC->setFetchMode(PDO::FETCH_INTO, $objC);

$objC = $stmtC->fetch(); // here objC will be updated
var_dump($objC);


class Person{
    public $firstName;
    public $lastName;
}
```

---

* PDO::FETCH_NAMED

```php
$data = $pdo->query("SELECT * FROM users, companies WHERE users.name=username")
            ->fetch(PDO::FETCH_NAMED);
/*
array(3) {
  ["name"]=> array(2) {
    [0]=> string(4) "John"
    [1]=> string(10) "ACME, Inc."
  }
  ["sex"]      => string(4) "male"
  ["username"] => string(4) "John"
}
```

* ... [ed altri ancora](https://phpdelusions.net/pdo/fetch_modes)! 

---

### Esempio di connessione al database mysql con PDO e opzioni

```php
$host = '127.0.0.1';
$db   = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
```

---

## Esempio - CRUD su tabella studente con PDO

Crea il file di connessione **connection.php**

```php
try {
$con = new PDO("mysql:host=localhost;dbname=ITS2017","root","");

}catch(PDOException $e){
	
	echo $e->getMessage();
}
```

---

### Esempio - CRUD su tabella studente con PDO - PDO::FETCH_CLASS

```php

class Studente {
	
	public $id;
	public $nome;
	public $matricola;

}


include("connection.php");

try{
	$result =  $con->query("SELECT * FROM studenti");
		
		$result->setFetchMode(PDO::FETCH_CLASS , "Studente");
		
	while($studente = $result->fetch()){
		
		echo "ID : $studente->id Nome : $studente->nome   Matricola: $studente->matricola <br>";
		
	}
	
}
catch(PDOException $ex){
	echo $ex->getMessage();
}
```

---

### Esempio - CRUD su tabella studente con PDO - CREATE

```php
include("connection.php");

try{
	$stmt =  $con->prepare("INSERT INTO studenti (nome,matricola) VALUES(:nome , :matricola)");
	
	$nome = "Studente";
	$matricola = "123456789";
	
	$stmt->bindParam(":nome" , $nome , PDO::PARAM_STR);
	$stmt->bindParam(":matricola" , $matricola , PDO::PARAM_STR);
	
	if($stmt->execute()){
		
		echo "Inserita la riga con id : " . $con->lastInsertId();
		
	}
	
	
}
catch(PDOException $ex){
	echo $ex->getMessage();
}
```

---

### Esempio - CRUD su tabella studente con PDO - RETRIEVE

```php
include("connection.php");

try{
	$result =  $con->query("SELECT * FROM studenti");
		
		$studenti = $result->fetchAll();
		
	foreach($studenti as $studente){
		
		echo "Name : $studente[name]   Matricola: $studente[matricola] <br>";
		
	}
	echo "Numero di righe ritornate: " . count($studenti);
	
	
}
catch(PDOException $ex){
	echo $ex->getMessage();
}
```

---

### Esempio - CRUD su tabella studente con PDO - UPDATE
```php

include("connection.php");

try{
	$stmt =  $con->prepare("UPDATE studenti SET nome=:nome , matricola=:matricola WHERE id=:id");
	
	$nome = "StudenteTest";
	$matricola = "987654321";
	$id = 1;
	
	$stmt->bindParam(":nome" , $nome , PDO::PARAM_STR);
	$stmt->bindParam(":matricola" , $matricola , PDO::PARAM_STR);
	$stmt->bindParam(":id" , $id , PDO::PARAM_INT);
	
	 if($stmt->execute()){
		 
		 echo "Aggiornati ".$stmt->rowCount() . " record della tabella studenti!!";
		 
	 }
	
	
}
catch(PDOException $ex){
	echo $ex->getMessage();
}
```

---

### Esempio - CRUD su tabella studente con PDO - DELETE
```php

include("connection.php");

try{
	$stmt =  $con->prepare("DELETE FROM studenti WHERE id=:id");
	
	$id = 1;
	
	$stmt->bindParam(":id" , $id , PDO::PARAM_INT);
	
	 if($stmt->execute()){
		 
		 echo $stmt->rowCount() . " Studente eliminato!!";
		 
	 }
	
	
}
catch(PDOException $ex){
	echo $ex->getMessage();
}
```

---

### Esempio - CRUD su tabella studente con PDO - prepared statements
```php

class Studente {
	
	public $id;
	public $nome;
	public $matricola;

}


include("connection.php");

try{
	$stmt =  $con->prepare("SELECT * FROM studenti WHERE id=:id");
	
	//1 previeni SQL Injection
	$id = "2; DELETE FROM studenti WHERE id='1'";
	
	//2 previeni SQL Injection
	$stmt->bindParam(":id" , $id , PDO::PARAM_INT);
	
	$stmt->execute();
		
		$stmt->setFetchMode(PDO::FETCH_CLASS , "Studente");
		
	while($student = $stmt->fetch()){
		
		echo "ID : $student->id Nome : $student->nome   Matricola: $student->matricola <br>";
		
	}
	
}
catch(PDOException $ex){
	echo $ex->getMessage();
}


```# static keyword

---

La parola chiave static può essere utilizzata per dichiarare proprietà e metodi a cui è possibile accedere senza dover creare un'istanza della classe. I membri statici (classe) esistono solo in una copia, che appartiene alla classe stessa, mentre i membri di istanza (non statici) vengono creati come nuove copie per ogni nuovo oggetto.





```php
class Cerchio
{
  // Membri dell'istanza (uno per oggetto)
  public $r = 10;
  function getArea() {}
  // Membri statici/di classe (solo una copia)
  static $PI_GRECO = 3.14;
  static function calcolaArea($a) {}
}
```

I metodi statici non possono utilizzare i membri dell'istanza poiché questi metodi non fanno parte di un'istanza. Tuttavia, possono utilizzare altri membri statici.

---

## Fare riferimento a membri statici

A differenza dei membri dell'istanza, non è possibile accedere ai membri statici utilizzando `l'operatore freccia singola (->)`. Invece, per fare riferimento a membri statici all'interno di una classe, al membro deve essere preceduta la parola chiave `self` seguita dall'operatore di risoluzione dell'ambito (`::`). La parola chiave `self` è un alias per il nome della classe, quindi in alternativa è possibile utilizzare il nome effettivo della classe.

```php
static function calcolaArea($a)
{
    return self::$PI_GRECO * $a * $a;     // ok
    return Cerchio::$PI_GRECO * $a * $a; // in alternativa si può usare il nome della classe
}
```

---


La stessa sintassi viene utilizzata per accedere ai membri statici da un metodo di istanza.
Si noti che, contrariamente ai metodi statici, i metodi di istanza possono utilizzare membri sia statici che di istanza.

```php
function getArea()
{
    return self::calcolaArea($this->$r);
}
```

---


Per accedere ai membri statici dall'esterno della classe, è necessario utilizzare il nome della classe, seguito dall'operatore di risoluzione dell'ambito (::).

```php

class Cerchio
{
    static $PI_GRECO = 3.14;
  static function calcolaArea($a)
  {
      return self::$PI_GRECO * $a * $a;
  }
}
echo Cerchio::$PI_GRECO; // "3.14"
echo Cerchio::calcolaArea(10); // "314"
```

I membri statici possono essere utilizzati senza dover creare un'istanza della classe. 
Pertanto, i metodi dovrebbero essere dichiarati statici se eseguono una funzione generica indipendentemente dalle variabili di istanza. 
Allo stesso modo, le proprietà dovrebbero essere dichiarate statiche se è necessaria solo una singola istanza della variabile all'interno del programma.
Per esempio per attribuire un numero di matricola univoco a ciascun oggetto.

---

## Variabili static

Le variabili locali possono essere dichiarate statiche per fare in modo che la funzione ricordi il suo valore. Tale variabile statica esiste solo nell'ambito della funzione locale, ma non perde il suo valore al termine della funzione. Questo può essere utilizzato per contare il numero di volte in cui viene chiamata una funzione, ad esempio.

```php
function contatoreStatico()
{
    static $val = 0;
  echo $val++;
}
contatoreStatico(); // "0"
contatoreStatico(); // "1"
contatoreStatico(); // "2"
```

---


Il valore iniziale assegnato a una variabile statica viene impostato una sola volta. Le proprietà statiche possono essere inizializzate solo con una costante; ma **NON** con un'espressione, con un'altra variabile o con un valore restituito da una funzione.

La parola chiave self è un alias per il nome della classe della classe che la racchiude. Ciò significa che la parola chiave fa riferimento alla sua classe che la racchiude anche quando viene chiamata dal contesto di una classe figlia.

```php
class ClasseBase
{
    protected static $val = 'classe base';
  public static function getVal()
  {
      return self::$val;
  }
}
class ClasseDerivata extends ClasseBase
{
    protected static $val = 'classe derivata (figlia)';
}
echo ClasseDerivata::getVal(); // "classe base"
```

---


Per ottenere il riferimento alla classe per valutare la classe chiamante effettiva, è necessario utilizzare la parola chiave static invece della parola chiave self. Questa funzionalità è denominata `late static bindings` ed è stata aggiunta in PHP 5.3.

```php
class ClasseBase
{
  protected static $val = 'classe base';
  public static function getLateStaticBinding()
  {
    return static::$val;
  }
}
```

```php
class ClasseDerivata extends ClasseBase
{
  protected static $val = 'classe derivata (figlia)';
}
echo ClasseDerivata::getLateStaticBinding(); // "classe derivata (figlia)"
```
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
# FUNZIONI DI DATA E ORA

* `string date ( string formato [, int timestamp] )`

Restituisce una stringa formattata in accordo con il formato della stringa usato nell' intero
timestamp o nell'attuale orario locale se timestamp non è assegnato.

I seguenti caratteri sono utilizzati nella stringa formato:

char|significato
---|---
a|"am" o "pm"
A|"AM" o "PM"
d|giorno del mese, 2 cifre senza tralasciare gli zero; i.e. "01" a "31"
D|giorno della settimana, testuale, 3 lettere; i.e. "Fri"
F|mese, testuale, long; i.e. "January"
g|ora, formato a 12-ore senza eventuali zero; i.e. "1" a "12"
G|ora, formato a 24-ore senza eventuali zero; i.e. "0" a "23"
h|ora, formato a 12-ore; i.e. "01" a "12"
H|ora, formato a 24-ore; i.e. "00" a "23"
i|minuti; i.e. "00" a "59"
I (i maiusc.)|"1" se c'è l'ora legale, "0" altrimenti.
j|giorno del mese senza eventuali zero; i.e. "1" a "31"
l ('L' minusc.)|giorno della settimana, testuale, long; i.e. "Friday"
L|valore booleano per stabilire se è un anno bisestile; i.e. "0" o "1"
m|mese; i.e. "01" a "12"
M|mese, testuale, 3 lettere; i.e. "Jan"
n|mese senza eventuali zero; i.e. "1" a "12"
s|secondi; i.e. "00" a "59"
t|numero di giorni del mese dato; i.e. "28" a "31"
w|giorno della settimana, numerico, i.e. "0" (Domenica) a "6" (Sabato)
Y|anno, 4 cifre; i.e. "1999"
y|anno, 2 cifre; i.e. "99"
z|giorno dell'anno; i.e. "0" a "365"

```php

$today = date("F j, Y, g:i a");
$today = date("m.d.y");
$today = date("j, n, Y");
$today = date("Ymd");
$today = date('h-i-s, j-m-y, it is w Day z ');
$today = date('\i\t \i\s \t\h\e jS \d\a\y.');
$today = date("D M j G:i:s T Y");
$today = date('H:m:s \m \i\s\ \m\o\n\t\h');
$today = date("H:i:s");

```

* `string setlocale ( mixed category, array locale )`

```php
<?php
/* Impostazioni locali in italiano */
setlocale(LC_ALL, 'it');
/* Visualizza: venerdì 22 dicembre 1978 */


echo strftime("%A %d %B %Y", mktime(0, 0, 0, 12, 22, 1978)); 

?>

```


* `int mktime ( int hour, int minute, int second, int month, int day, int year [, int is_dst])`

Restituisce la UNIX timestamp per una data

## string strftime ( string format [, int timestamp] )
Le seguenti sequenze di caratteri sono utilizzate nella stringa del formato:
* %a - Nome del giorno della settimana abbreviato in accordo con i parametri locali lun
* %A - Nome completo del giorno della settimana in accordo con i parametri locali lunedì
* %b - Nome del mese abbreviato in accordo con i parametri locali giu
* %B - Nome completo del mese in accordo con i parametri locali giugno
* %c - Rappresentazione preferita di data e orario per le attuali impostazioni locali
* %d - giorno del mese come numero decimale (intervallo tra 01 e 31) 19
* %H - ora come numero decimale usando il sistema a 24 ore (intervallo tra 00 e 23) 11
* %I - ora come numero decimale usando il sistema a 12 ore (intervallo tra 01 e 12) 11
* %j - giorno dell'anno come numero decimale (intervallo tra 001 e 366) 170
* %m - mese come numero decimale (intervallo tra 01 e 12) 06
* %M - minuto come numero decimale 16
* %n - carattere di nuova linea ‘a capo’
* %S - secondi come numero decimale 32
* %U - numero della settimana dell'anno in corso come numero decimale, iniziando dalla
    prima Domenica come primo giorno della prima settimana 25
* %W - numero della settimana dell'attuale anno come numero decimale, partendo con il
    primo Lunedì come primo giorno della prima settimana 
* %w - giorno della settimana come decimale, dove la Domenica è 0 1
* %x - visualizzazione della data preferita dalle impostazioni del sistema locale senza orario
* %X - visualizzazione dell'orario preferito dalle impostazioni del sistema locale senza data
* %y - anno come numero decimale senza secolo (intervallo tra 00 e 99) 06
* %Y - anno come numero decimale incluso il secolo 2006
* %Z - fuso orario o abbreviazione ora solare Europa occidentale
*  %% - il carattere `%' %

Per avere il giorno della settimana come decimale, dove Lunedì = 0 e Domenica = 6 si può usare la
seguente espressione (strftime ("%w") + 6) % 7

Questo numero è utilizzabile anche come indice di un array di nomi di giorni ove, per esempio
Array ([0] => Lunedì, [1] => Martedì, … [6] = Domenica)

---

## Elenco funzioni


* [checkdate() "Convalida una data gregoriana"](http://php.net/manual/en/function.checkdate.php)
* [date_default_timezone_get() "Restituisce il fuso orario predefinito"](http://php.net/manual/en/function.date-default-timezone-get.php)
* [date_default_timezone_set() "Imposta il fuso orario predefinito"](http://php.net/manual/en/function.date-default-timezone-set.php)
* [date_sunrise() "Restituisce l'ora dell'alba per un dato giorno/località"](http://php.net/manual/en/function.date-sunrise.php)
* [date_sunset() "Restituisce l'ora del tramonto per un dato giorno/località"](http://php.net/manual/en/function.date-sunset.php)
* [date() "Formatta una data/ora locale"](http://php.net/manual/en/function.date.php)
* [getdate() "Restituisce un array che contiene informazioni su data e ora per un timestamp Unix"](http://php.net/manual/en/function.getdate.php)
* [gettimeofday() "Restituisce un array che contiene informazioni sull'ora corrente"](http://php.net/manual/en/function.gettimeofday.php)
* [gmdate() "Formatta una data/ora GMT/UTC"](http://php.net/manual/en/function.gmdate.php)
* [gmmktime() "Restituisce il timestamp Unix per una data GMT"](http://php.net/manual/en/function.gmmktime.php)
* [gmstrftime() "Formatta un'ora/data GMT/UTC in base alle impostazioni locali"](http://php.net/manual/en/function.gmstrftime.php)
* [idate() "Formatta un'ora/data locale come numero intero"](http://php.net/manual/en/function.idate.php)
* [localtime() "Restituisce un array che contiene i componenti temporali di un timestamp Unix"](http://php.net/manual/en/function.localtime.php)
* [microtime() "Restituisce i microsecondi per l'ora corrente"](http://php.net/manual/en/function.microtime.php)
* [mktime() "Restituisce il timestamp Unix per una data"](http://php.net/manual/en/function.mktime.php)
* [strftime() "Formatta un'ora/data locale in base alle impostazioni locali"](http://php.net/manual/en/function.strftime.php)
* [strptime() "Analizza una data/ora generata con strftime()"](http://php.net/manual/en/function.strftime.php)
* [strtotime() "Analizza una data o un orario testuale inglese in un timestamp Unix"](http://php.net/manual/en/function.strtotime.php)
* [time() "Restituisce l'ora corrente come timestamp Unix"](http://php.net/manual/en/function.time.php)
# La connessione php-MySQL con MySQLi

## La classe MySQLi

Gli oggetti di questa classe hanno il compito di rappresentare la connessione fra php e un database MySQL.

* l'estensione MySQLi (MySQL Improved Extension)  è una estensione 'migliorata' rispetto alla precedente 'MySQL Extention'.
* Fornisce strumenti di accesso a DataBase ad alto livello, senza cioè dover implementare il protocollo di comunicazione fra client (php) e server (MySQL).
* MySQLi offre strumenti orientati allo sviluppo ad oggetti che invece erano assenti nella precedente.
* MySQLi offre anche delle funzioni di tipo procedurale, pertanto nelle pagine di manuale si trovano sempre doppia indicazione:
  * object oriented syle:
    * l'implementazione orientata agli oggetti
  * procedural style:
    * l'implementazione procedurale che qui tralasciamo.

---

### Connessione al database

La funzione di connessione è associata all'istanza dell'oggetto, quindi è compito del costruttore della classe l'attivazione della connessione  ( vedi <http://it.php.net/manual/en/mysqli.construct.php> ).

**Il costruttore ha dunque bisogno di quattro informazioni basilari:**

* host
  * in cui risiede il server MySQL a cui connettersi
* username
* password
* database identifier

che devono essere passate come parametro all'istanziazione dell'oggetto.

---

#### La connessione php-MySQL con MySQLi

Esempio:
`$db=new MySQLi('localhost','root','','ilmiodb');`

I quattro parametri sono stringhe, nell'esempio si indica che il server mysql
risiede sullo stesso host del server web-php, le credenziali di accesso sono per utente root
privo di password e il database ha identificatore 'ilmiodb'.

L'applicazione php viene eseguita dal server web, per accedere a un database deve
essere attivata una connessione con il server MySql.

---

## MySqli procedurale

* mysqli_connect()
* mysqli_connect_errno()
* mysqli_connect_error()
* mysqli_query()
* mysqli_fetch_row(),
  * Risultati in un array standard
  * Le chiavi sono interi
* mysqli_fetch_assoc(),
  * Risultati in un array associativo
  * Le chiavi sono i nomi delle colonne
* mysqli_fetch_array(),
  * Risultati in un array standard e associativo
* Le chiavi sono: MYSQL_NUM, MYSQL_ASSOC, MYSQL_BOTH
* mysqli_free_result()
* mysqli_close()

---

### La funzione mysqli_insert_id() ritorna l’ultimo id inserito

* `$id = mysqli_insert_id($connessione);`

---

### Classe di connessione personalizzata

In base a quanto visto l'istanza di un oggetto di classe MySQLi produce la connessione al database.

In una applicazione web tipicamente sono presenti molti script php ognuno dei
quali avrà necessità di accedere al database, pertanto in ognuno verrà istanziato un
oggetto per la connessione fornendo ogni volta i parametri adeguati.

Punto debole di questa situazione è che se c'è bisogno di modificare un parametro di
connessione (ad esempio la password) sarà necessario effettuare la modifica in tutte le
occasioni in cui è prevista la connessione. Per questo motivo invece che specificare i
parametri ad ogni esigenza di istanza di connessione può essere più efficace definire
una propria classe di connessione che estende MySQLi su cui si ridefinisce il costruttore
con i parametri impostati, ad esempio:

```php

//file ConnessioneDb.php
class ConnessioneDb extends MySQLi{
    function __construct() {
    parent::__construct('localhost','root','','ilmiodb');
    }
}

```

---

I vari script dell'applicazione potranno ottenere la connessione istanziando un oggetto di classe ConnessioneDb senza specificare parametri. Qualora uno dei parametri dovesse essere modificato andrà ritoccato il solo costruttore della classe ConnessioneDb e tutti gli script dell'applicazione saranno implicitamente aggiornati.

---

#### Query

Il metodo query consente l'invio al dbms di un comando, con la conseguente esecuzione e
ottenimento del risultato.

`mixed query ( string $query [, int $resultmode = MYSQLI_STORE_RESULT ] )`

Il parametro stringa $query rappresenta il comando da inviare al dbms, sarà in generale
un comando SQL.
Il secondo parametro opzionale al momento lo tralasciamo (assumerà quindi il suo valore
di default)
Il valore di ritorno del metodo sarà:

* in caso di fallimento della query viene restituito il valore false
* in caso di successo della query viene restituito:
* se la query è del tipo SELECT, SHOW, DESCRIBE, EXPLAIN un oggetto di classe MySQLi_Result
* negli altri casi valore true

Si rimanda al paragrafo seguente il dettaglio sulla classe mysqli_result

---

**Esempio di uso:**

```php
$db=new ConnessioneDb();
$ris = $db->query("SELECT * FROM rubrica");
```

### La classe MySQLi_Result

Un oggetto di questa classe rappresenta la tabella risultato ottenuta da una query. Su
questa tabella l'oggetto tiene un riferimento (cursore) ad una particolare riga, che
chiamiamo riga corrente. All'istanza dell'oggetto la riga corrente è la prima.

La riga indirizzata dal cursore può essere accessibile con più di una modalità, qui per ora ne prendiamo in esame una.

---

#### Metodo fetch_assoc()

Questo metodo restituisce la riga corrente del risultato come array associativo in cui le chiavi sono costituite dagli identificatori di colonna della tabella risultato.

Inoltre il cursore viene spostato alla riga seguente (se disponibile).
Se il cursore è a fine tabella il metodo retituisce NULL.

**Esempio**

```php
$db=new ConnessioneDb();
$ris = $db->query("SELECT * FROM rubrica");
$riga = $ris->fetch_assoc();
// $riga è un array che contiene:
// 'nome'=>'Mario', 'cognome'=>'Rossi', 'telefono'=>'0512345678'

```

---

Frequentemente si ha interesse a scandire l'intera tabella risultato, pertanto questa
istruzione viene inserita in un ciclo controllato dal confronto con il valore NULL che indica il raggiungimento di fine tabella.

**Esempio**

```php
while ( ($riga=$ris->fetch_assoc()) !== NULL ) {
// elaboro $riga secondo la finalità specifica dell'applicazione
}
```

---

**Attributo num_rows**

Questo attributo contiene il numero di righe della tabella risultato

Esempio: visualizzazione dei dati di una tabella

Ecco un esempio di come possa essere eseguita la connessione, query e visualizzazione dei dati del risultato.

```php
require_once "ConnessioneDb.php";
$db=new ConnessioneDb();
$ris = $db->query("SELECT * FROM rubrica");
echo "La rubrica contiene {$ris->num_rows} contatti<br>\n";
while ( ($riga=$ris->fetch_assoc())!=NULL) {
echo "{$riga['nome']} {$riga['cognome']} {$riga['telefono']}
<br>\n";
}
```

---

## SQL Injection

Per evitare SQL injections:

* Backslash davanti agli apici
  * addslashes($stringa_da_escapare)
* Magic Quotes
  * Sono state aggiunte automaticamente sui dati inviati via GET, POST, COOKIE in PHP 3, poi rimossi in PHP 5.4
* Usa la funzione real_escape_string:
  * mysqli_real_escape_string($conn,$stringa_da_escapare)

```php
function get_post($conn, $var)
{
  return $conn->real_escape_string($_POST[$var]);
}
```

---

## Prepared statements in PHP

* INSERT INTO Studenti (nome, cognome, data) values(?,?,?);
* Prepari lo statement una sola volta e successivamente lo usi iniettando solo i dati
* È anche un modo per prevenire SQL Injections

```php
//1) scrivo la query parametrica
 $query = "SELECT nome, cognome ";
 $query .= "FROM Studenti ";
 $query .= "WHERE username = ? AND password = ? ";
//2) preparo lo statement per il database
 $statement = mysqli_prepare($connessione, $query);
//3) collego i parametri da bindare
 mysqli_stmt_bind_param($statement, 'ss', $username, $password);
//4) eseguo lo statement
 mysqli_stmt_execute($statement);
//5) collego i risultati alle variabili da usare
 mysqli_stmt_bind_result($statement, $nome, $cognome);
//6) ottengo i risultati
 mysqli_stmt_fetch($statement);
//7) chiudo lo statement
 mysqli_stmt_close($statement);

```

---

### Gestione degli errori

```php
$db=new ConnessioneDb();
$ris = $db->query("SELECT * FROM rubrica");
```

* Se per qualche motivo fallisce la connessione non ha senso tentare di eseguire una
query.

* Se fallisce l'esecuzione di una query non ha senso trattare il risultato.

---

#### Errore di connessione

La classe MySQLi rende disponibile l'attributo **connect_error** che contiene:

* in caso di successo nella connessione il valore NULL
* in caso di errore una stringa con messaggio che descrive l'errore riconosciuto

```php
$db=new ConnessioneDb();
if ($db->connect_error){
//connect_error non ha valore null, quindi c'è stato errore di
connessione
die('Connection failed: '.$db->connect_error);
}
```

Il metodo die() che interrompe l'esecuzione dello script: in assenza di connessione non ha senso proseguire.

---

#### Errore su query

La classe MySQLi rende disponibile l'attributo **error**
In modo simile a quanto visto prima questo attributo riporta informazioni su condizioni di errore, in particolare si riferisce all'esito della più recente esecuzione di un metodo della classe (che non sia il costruttore).

L'atttributo contiene:

* in caso di successo una stringa vuota
* in caso di errore una stringa con messaggio che descrive l'errore riconosciuto

Quindi ecco una possibile applicazione:

```php
$ris = $db->query("SELECT * FROM rubrica");
if ($db->error){
//error non ha stringa vuota, quindi c'è stato errore di query
die('Query failed: '.$db->error);
}

```

Anche in questo caso il riconoscimento dell'errore viene trattato interrompendo lo script.

---

#### Classe di connessione con gestione dell'errore

Nella maggior parte delle applicazioni che prevedono l'accesso a database si ripetono in vari punti le istruzioni di connessione e/o esecuzione di query, per ognuna di queste è bene effettuare la verifica.

Possiamo quindi pensare di portare la verifica all'interno della classe di gestione della connessione e di fatto liberare l'applicazione dall'onere di effettuare la verifica ogni volta.

```php
class ConnessioneDb extends MySQLi{
    function __construct() {
    parent::__construct('localhost','root','','rubrica');
        if ($this->connect_error){
        die('Connection failed: '.$this->connect_error);
        }
    }
    function query($query) {
    $ris=parent::query($query);
        if ($this->error){
        die('Query failed: '.$this->error." query='$query'");
        }
    return $ris;
    }
}
```
# FUNZIONI MATEMATICHE

* `number abs ( mixed numero )`
Restituisce il valore assoluto di un numero.

* `mixed max ( number arg1, number arg2 [, number ...] )`

* `mixed max ( array numbers [, array ...] )`

* `max() `
restituisce il numericamente più grande dei valori dati come parametro.

* `mixed min ( number arg1, number arg2 [, number ...] )`

* `mixed min ( array numbers [, array ...] )`

* `min() restituisce il numericamente più piccolo dei valori dati come parametro.`

* `float pow ( float base, float esp )`

---

Restituisce base elevato alla potenza di esp. Se possibile, questa funzione restituisce un integer.
Nota: Il PHP non può gestire valori negativi per bases.

* `int rand ( [int min, int max] )`

Se chiamata senza i parametri opzionali min, max, rand() restituisce un valore pseudo casuale
compreso fra 0 e RAND_MAX. Se ad esempio si desidera un numero casuale compreso fra 5 e 15
(inclusi) usare rand (5, 15).

* `double round ( double val [, int precisione] )`
Restituisce il valore arrotondato di val con la precisione specificata (numero di cifre dopo il punto
decimale). precisione può anche essere negativa o zero (predefinito).

---

## Elenco funzioni


* [abs() "Restituisce il valore assoluto di un numero"](http://php.net/manual/en/function.abs.php)
* [acos() "Restituisce l'arcocoseno di un numero"](http://php.net/manual/en/function.acos.php)
* [acosh() "Restituisce l'inverso del coseno iperbolico di un numero "](http://php.net/manual/en/function.acosh.php)
* [asin() "Restituisce l'arcoseno di un numero"](http://php.net/manual/en/function.asin.php)
* [asinh() "Restituisce l'inverso del seno iperbolico di un numero"](http://php.net/manual/en/function.asinh.php)
* [atan() "Restituisce l'arcotangente di un numero come valore numerico compreso tra -PI/2 e PI/2 radianti"](http://php.net/manual/en/function.atan.php)
* [atan2() "Restituisce l'angolo theta di un punto (x,y) come valore numerico compreso tra -PI e PI radianti"](http://php.net/manual/en/function.atan2.php)
* [atanh() "Restituisce la tangente iperbolica inversa di un numero"](http://php.net/manual/en/function.atanh.php)
* [base_convert() "Converte un numero da una base all'altra"](http://php.net/manual/en/function.base-convert.php)
* [bindec() "Converte un numero binario in un numero decimale"](http://php.net/manual/en/function.bindec.php)
* [ceil() "Restituisce il valore di un numero arrotondato per eccesso all'intero più vicino"](http://php.net/manual/en/function.ceil.php)
* [cos() "Restituisce il coseno di un numero"](http://php.net/manual/en/function.cos.php)
* [cosh() "Restituisce il coseno iperbolico di un numero"](http://php.net/manual/en/function.cosh.php)

---

## Elenco funzioni 2

* [decbin() "Converte un numero decimale in un numero binario"](http://php.net/manual/en/function.decbin.php)
* [dechex() "Converte un numero decimale in un numero esadecimale"](http://php.net/manual/en/function.dechex.php)
* [decoct() "Converte un numero decimale in un numero ottale"](http://php.net/manual/en/function.decoct.php)
* [deg2rad() "Converte un grado in un numero in radianti"](http://php.net/manual/en/function.deg2rad.php)
* [exp() "Restituisce il valore di E"](http://php.net/manual/en/function.exp.php)
* [expm1() "Restituisce il valore di E"](http://php.net/manual/en/function.expm1.php)
* [floor() "Restituisce il valore di un numero arrotondato per difetto all'intero più vicino"](http://php.net/manual/en/function.floor.php)
* [fmod() "Restituisce il resto (modulo) della divisione degli argomenti"](http://php.net/manual/en/function.fmod.php)
* [getrandmax() "Restituisce il numero massimo casuale che può essere restituito da una chiamata alla funzione rand()"](http://php.net/manual/en/function.rand.php)
* [hexdec() "Converte un numero esadecimale in un numero decimale"](http://php.net/manual/en/function.hexdec.php)
* [hypot() "Restituisce la lunghezza dell'ipotenusa di un triangolo rettangolo"](http://php.net/manual/en/function.hypot.php)
* [is_finite() "Restituisce true se un valore è un numero finito"](http://php.net/manual/en/function.is-finite.php)
* [is_infinite() "Restituisce true se un valore è un numero infinito"](http://php.net/manual/en/function.is-infinite.php)
* [is_nan() "Restituisce true se un valore non è un numero"](http://php.net/manual/en/function.is-nan.php)
* [lcg_value() "Restituisce un numero pseudo casuale nell'intervallo di (0,1)>](http://php.net/manual/en/function.lcg-value.php)
* [log() "Restituisce il logaritmo naturale (in base E) di un numero"](http://php.net/manual/en/function.log.php)
* [log10() "Restituisce il logaritmo in base 10 di un numero"](http://php.net/manual/en/function.log10.php)
* [log1p() "Restituisce log(1+numero)>](http://php.net/manual/en/function.log.php)

---

## Elenco funzioni 3

* [addcslashes() - "Restituisce una stringa con barre rovesciate davanti ai caratteri specificati"](http://php.net/manual/en/function.addcslashes.php)
* [addslashes() - "Restituisce una stringa con barre rovesciate davanti a caratteri predefiniti"](http://php.net/manual/en/function.addslashes.php)
* [bin2hex() - "Converte una stringa di caratteri ASCII in valori esadecimali"](http://php.net/manual/en/function.bin2hex.php)
* [chop() - "Alias di rtrim()"](http://php.net/manual/en/function.rtrim.php)
* [chr() - "Restituisce un carattere da un valore ASCII specificato"](http://php.net/manual/en/function.chr.php)
* [chunk_split() - "Divide una stringa in una serie di parti più piccole"](http://php.net/manual/en/function.chunk-split.php)
* [convert_cyr_string() - "Converte una stringa da un set di caratteri cirillici a un altro"](http://php.net/manual/en/function.convert-cyr-string.php)
* [convert_uudecode() - "Decodifica una stringa uuencoded"](http://php.net/manual/en/function.convert-uudecode.php)
* [convert_uuencode() - "Codifica una stringa usando l'algoritmo uuencode"](http://php.net/manual/en/function.convert-uuencode.php)
* [count_chars() - "Restituisce quante volte un carattere ASCII ricorre all'interno di una stringa e restituisce le informazioni"](http://php.net/manual/en/function.count-chars.php)
* [crc32() - "Calcola un CRC a 32 bit per una stringa"](http://php.net/manual/en/function.crc32.php)
* [crypt() - "Crittografia stringa unidirezionale (hashing)"](http://php.net/manual/en/function.crypt.php)
# FUNZIONI PER LA GESTIONE DI FILE E DEL FILESYSTEM

* `resource fopen ( string filename, string mode [, bool use_include_path [, resource zcontext]] )`

La funzione fopen() apre un collegamneto tra una risorsa, indicata dal parametro filename, ed un
flusso.

---

* `bool fclose ( resource handle )`

Chiude il file puntato da handle.

---

* `bool feof ( resource handle )`

Restituisce TRUE se il puntatore al file ha raggiunto la fine del file (EOF) o si è verificato un errore
(anche in caso di timeout del socket); altrimenti restituisce FALSE.

---

* `string fgetc ( resource handle )`

Restituisce una stringa contenente un singolo carattere letto dal file puntato da handle. Restituisce
FALSE alla fine del file (EOF).

---

* `string fgets ( resource handle, int length )`

Restituisce una stringa di length - 1 byte letti dal file puntato da handle. 

La lettura termina quando
sono stati letti length - 1 byte, oppure si incontra il carattere di newline, oppure alla fine del file (EOF) qualora giunga prima. 
Se non si specifica length, si assume come default 1k, o 1024 byte.

---

* `bool file_exists ( string filename )`
Restituisce TRUE se il file o la directory specificata da filename esiste; FALSE altrimenti.

---

* `array file ( string filename [, int use_include_path [, resource context]] )`
Identica a readfile(), eccetto per il fatto che file() restituisce il file in un vettore. Ogni elemento del
vettore corrisponde ad una riga del file, con il carattere di newline ancora inserito. Se la funzione
non riesce restituisce FALSE. (nota di Simone: apre e chiude il file automaticamente)

---

* `int fwrite ( resource handle, string string [, int length] )`
fwrite() scrive il contenuto di string nel flusso del file puntato da handle. Se l'argomento length è
specificato la scrittura si arresterà dopo aver scritto length byte o alla fine di string se si verificasse
prima. fwrite() returns the number of bytes written, or FALSE on error.


---

## Elenco funzioni

* [basename() Restituisce il componente del nome file di un percorso](http://php.net/manual/en/function.basename.php)
* [chgrp() Cambia il gruppo di file](http://php.net/manual/en/function.chgrp.php)
* [chmod() Cambia la modalità del file](http://php.net/manual/en/function.chmod.php)
* [chown() Cambia il proprietario del file](http://php.net/manual/en/function.chown.php)
* [clearstatcache() Cancella la cache dello stato del file](http://php.net/manual/en/function.clearstatcache.php)
* [copy() Copia un file](http://php.net/manual/en/function.copy.php)
* [delete() Elimina un file](http://php.net/manual/en/function.delete.php)
* [dirname() Restituisce il componente del nome della directory di un percorso](http://php.net/manual/en/function.dirname.php)
* [disk_free_space() Restituisce lo spazio libero di una directory](http://php.net/manual/en/function.disk-free-space.php)
* [disk_total_space() Restituisce la dimensione totale di una directory](http://php.net/manual/en/function.disk-total-space.php)
* [diskfreespace() Alias di disk_free_space()](http://php.net/manual/en/function.disk-free-space.php)
* [fclose() Chiude un file aperto](http://php.net/manual/en/function.fclose.php)
* [feof() Verifica la fine del file su un file aperto](http://php.net/manual/en/function.feof.php)
* [fflush() Scarica l'output bufferizzato in un file aperto](http://php.net/manual/en/function.fflush.php)
* [fgetc() Restituisce un carattere da un file aperto](http://php.net/manual/en/function.fgetc.php)
* [fgetcsv() Analizza una riga da un file aperto, controllando](http://php.net/manual/en/function.fgetcsv.php)
* [fgets() Restituisce una riga da un file aperto](http://php.net/manual/en/function.fgets.php)
* [fgetss() Restituisce una riga, con i tag HTML e PHP rimossi, da un file aperto](http://php.net/manual/en/function.fgetss.php)

---

## Elenco funzioni 2

* [file() Legge un file in un array](http://php.net/manual/en/function.file.php)
* [file_exists() Controlla se esiste o meno un file o una directory](http://php.net/manual/en/function.file-exists.php)
* [file_get_contents() Legge un file in una stringa](http://php.net/manual/en/function.file-get-contents.php)
* [file_put_contents Scrive una stringa in un file](http://php.net/manual/en/function.file-put-contents.php)
* [fileatime() Restituisce l'ora dell'ultimo accesso a un file](http://php.net/manual/en/function.fileatime.php)
* [filectime() Restituisce l'ora dell'ultima modifica di un file](http://php.net/manual/en/function.filectime.php)
* [filegroup() Restituisce l'ID gruppo di un file](http://php.net/manual/en/function.filegroup.php)
* [fileinode() Restituisce il numero di inode di un file](http://php.net/manual/en/function.fileinode.php)
* [filemtime() Restituisce l'ora dell'ultima modifica di un file](http://php.net/manual/en/function.filemtime.php)
* [fileowner() Restituisce l'ID utente (proprietario) di un file](http://php.net/manual/en/function.fileowner.php)
* [fileperms() Restituisce i permessi di un file](http://php.net/manual/en/function.fileperms.php)
* [filesize() Restituisce la dimensione del file](http://php.net/manual/en/function.filesize.php)
* [filetype() Restituisce il tipo di file](http://php.net/manual/en/function.filetype.php)
* [flock() Blocca o rilascia un file](http://php.net/manual/en/function.flock.php)
* [fnmatch() Corrisponde a un nome file o una stringa rispetto a uno schema specificato](http://php.net/manual/en/function.fnmatch.php)
* [fopen() Apre un file o un URL](http://php.net/manual/en/function.fopen.php)
* [fpassthru() Legge da un file aperto, fino a EOF, e scrive il risultato nel buffer di output](http://php.net/manual/en/function.fpassthru.php)
* [fputcsv() Formatta una riga come CSV e la scrive in un file aperto](http://php.net/manual/en/function.fputcsv.php)
* [fputs() Alias di fwrite()](http://php.net/manual/en/function.fwrite.php)

---

## Elenco funzioni 3

* [fread() Legge da un file aperto](http://php.net/manual/en/function.fread.php)
* [fscanf() Analizza l'input da un file aperto secondo un formato specificato](http://php.net/manual/en/function.fscanf.php)
* [fseek() Cerca in un file aperto](http://php.net/manual/en/function.fseek.php)
* [fstat() Restituisce informazioni su un file aperto](http://php.net/manual/en/function.fstat.php)
* [ftell() Restituisce la posizione corrente in un file aperto](http://php.net/manual/en/function.ftell.php)
* [ftruncate() Tronca un file aperto a una lunghezza specificata](http://php.net/manual/en/function.ftruncate.php)
* [fwrite() Scrive su un file aperto](http://php.net/manual/en/function.fwrite.php)
* [glob() Restituisce un array di nomi di file/directory che corrispondono a uno schema specificato](http://php.net/manual/en/function.glob.php)
* [is_dir() Controlla se un file è una directory](http://php.net/manual/en/function.is-dir.php)
* [is_executable() Controlla se un file è eseguibile](http://php.net/manual/en/function.is-executable.php)
* [is_file() Controlla se un file è un file normale](http://php.net/manual/en/function.is-file.php)
* [is_link() Controlla se un file è un collegamento](http://php.net/manual/en/function.is-link.php)
* [is_readable() Controlla se un file è leggibile](http://php.net/manual/en/function.is-readable.php)
* [is_uploaded_file() Controlla se un file è stato caricato tramite HTTP POST](http://php.net/manual/en/function.is-uploaded-file.php)
* [is_writable() Controlla se un file è scrivibile](http://php.net/manual/en/function.is-writable.php)
* [is_writeable() Alias di is_writable()](http://php.net/manual/en/function.is-writable.php)

---

## Elenco funzioni 4

* [link() Crea un collegamento reale](http://php.net/manual/en/function.link.php)
* [linkinfo() Restituisce informazioni su un collegamento reale](http://php.net/manual/en/function.linkinfo.php)
* [lstat() Restituisce informazioni su un file o un collegamento simbolico](http://php.net/manual/en/function.lstat.php)
* [mkdir() Crea una directory](http://php.net/manual/en/function.mkdir.php)
* [move_uploaded_file() Sposta un file caricato in una nuova posizione](http://php.net/manual/en/function.move-uploaded-file.php)
* [parse_ini_file() Analizza un file di configurazione](http://php.net/manual/en/function.parse-ini-file.php)
* [pathinfo() Restituisce informazioni sul percorso di un file](http://php.net/manual/en/function.pathinfo.php)
* [pclose() Chiude una pipe aperta da popen()](http://php.net/manual/en/function.popen.php)
* [popen() Apre una pipe](http://php.net/manual/en/function.popen.php)
* [readfile() Legge un file e lo scrive nel buffer di output](http://php.net/manual/en/function.readfile.php)
* [readlink() Restituisce la destinazione di un collegamento simbolico](http://php.net/manual/en/function.readlink.php)
* [realpath() Restituisce il percorso assoluto](http://php.net/manual/en/function.realpath.php)
* [rename() Rinomina un file o una directory](http://php.net/manual/en/function.rename.php)
* [rewind() Riavvolge un puntatore di file](http://php.net/manual/en/function.rewind.php)
* [rmdir() Rimuove una directory vuota](http://php.net/manual/en/function.rmdir.php)
* [set_file_buffer() Imposta la dimensione del buffer di un file aperto](http://php.net/manual/en/function.set-file-buffer.php)
* [stat() Restituisce informazioni su un file](http://php.net/manual/en/function.stat.php)
* [symlink() Crea un collegamento simbolico](http://php.net/manual/en/function.symlink.php)
* [tempnam() Crea un unico file temporaneo](http://php.net/manual/en/function.tempnam.php)
* [tmpfile() Crea un unico file temporaneo](http://php.net/manual/en/function.tmpfile.php)
* [touch() Imposta l'ora di accesso e modifica di un file](http://php.net/manual/en/function.touch.php)
* [umask() Modifica i permessi dei file per i file](http://php.net/manual/en/function.umask.php)
* [unlink() Elimina un file](http://php.net/manual/en/function.unlink.php)
# Polimorfismo

Il Polimorfismo è la capacità di utilizzare un unico metodo in grado di
comportarsi in modo specifico quando applicato a tipi di dato differenti.

Questo è reso possibile grazie all'ereditarietà, che consente alle sottoclassi di ridefinire i metodi ereditati dalla classe base.

Il linguaggio può identificare una qualunque istanza della sottoclasse,
come un'istanza della classe base, poiché per il principio dell'ereditarietà, ogni sottoclasse possiede per natura tutte le proprietà della classe base (attributi e metodi).

---

In informatica, il termine polimorfismo (dal greco `πολυμορφος` composto dai termini `πολυ` molto e `μορφή` forma quindi "**avere molte forme**") viene usato in senso generico per riferirsi a espressioni che possono rappresentare valori di diversi tipi (dette espressioni polimorfiche). In un linguaggio non tipizzato, tutte le espressioni sono intrinsecamente polimorfiche.

Il termine viene associato a due significati specifici:

* nel contesto della **programmazione orientata agli oggetti**, si riferisce al fatto che un'espressione il cui tipo sia descritto da una classe A può assumere valori di un qualunque tipo descritto da una classe B sottoclasse di A (polimorfismo per inclusione);
* nel contesto della **programmazione generica**, si riferisce al fatto che il codice del programma può ricevere un tipo come parametro invece che conoscerlo a priori (polimorfismo parametrico).

* [polimorfismo su wikipedia](https://it.wikipedia.org/wiki/Polimorfismo_(informatica))  

---

## Polimorfismo per inclusione
Solitamente è legato alle relazioni di eredità tra classi, che garantisce che tali oggetti, pur di tipo differente, abbiano una stessa interfaccia: nei linguaggi ad oggetti tipizzati, le istanze di una sottoclasse possono essere utilizzate al posto di istanze della superclasse (polimorfismo per inclusione). 

## Polimorfismo parametrico
Un altro meccanismo spesso disponibile nei linguaggi tipizzati è il polimorfismo parametrico: in determinati contesti, è possibile definire delle variabili dal tipo parametrizzato, che viene poi specificato durante l'uso effettivo. Esempi di polimorfismo parametrico sono i template del C++ e i generics del Java.



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