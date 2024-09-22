# PHP

<!-- TOC -->autoauto- [PHP](#php)auto    - [Individuare il sistema operativo del web server](#individuare-il-sistema-operativo-del-web-server)auto    - [Upload di immagini](#upload-di-immagini)auto    - [Creare una form per scrivere file di testo](#creare-una-form-per-scrivere-file-di-testo)auto    - [Generare un file captcha](#generare-un-file-captcha)auto    - [Windows set variabile ambiente php](#windows-set-variabile-ambiente-php)auto    - [Passaggio di parametri per riferimento](#passaggio-di-parametri-per-riferimento)auto    - [Utilizzo dei parametri default in una funzione](#utilizzo-dei-parametri-default-in-una-funzione)auto    - [tips_ioprogrammo PHP](#tips_ioprogrammo-php)auto        - [SCRIVERE IN UN FILE DI TESTO E PERMETTERNE IL DOWNLOAD](#scrivere-in-un-file-di-testo-e-permetterne-il-download)auto        - [VISUALIZZARE UN MENU SELECT CON I DATI DI UN ARRAY](#visualizzare-un-menu-select-con-i-dati-di-un-array)auto        - [SCEGLIERE UN COLORE HTML IN MANIERA RANDOM](#scegliere-un-colore-html-in-maniera-random)auto        - [REDIRIGERE UNA PAGINA SENZA USARE I META HTML](#redirigere-una-pagina-senza-usare-i-meta-html)auto        - [DISTRUGGERE UNA DIRECTORY E IL SUO CONTENUTO](#distruggere-una-directory-e-il-suo-contenuto)auto        - [LEGGERE IN MODO SEMPLICE UN FILE XML](#leggere-in-modo-semplice-un-file-xml)autoauto<!-- /TOC -->

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

## Upload di immagini

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
case 12: $numeroRandom = 'C'; break;
case 13: $numeroRandom = 'D'; break;
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
```