
## static keyword

Prendiamo un esame un'ipotetica ipotetica classe "Colore", che avrà una serie di colori di base.

### Colore.php

```php
<?php
class Colore{
static $rosso = "#FF0000";
static $verde = "#00FF00";
static $blu = "#0000FF";
/*.. altri attributi*/

public function Colore()
{ /* codice costruttore */ }

/*... altri metodi*/

static public function stampaColore($colore){
echo "<font color='" . Colore::${$colore} . "'>Il valore esadecimale
del colore $colore è : ";
echo Colore::${$colore} . "</font><br />\n";
}
}
?>
```


### test.php
```php
<?php
require_once("Colore.php");

/* Per utilizzare i tre membri statici della classe Colore è sufficiente specificare il nome della classe seguito dai doppi due punti e il nome del membro
 */

echo "<font color='" . Colore::$rosso . "'>Il valore esadecimale del colore rosso è : ". Colore::$rosso . "</font><br />\n";
echo "<font color='" . Colore::$verde . "'>Il valore esadecimale del colore verde è : ". Colore::$verde . "</font><br />\n";
echo "<font color='" . Colore::$blu . "'>Il valore esadecimale del colore blu è : ".     Colore::$blu   . "</font><br />\n";
?>
```

### test.php
```php
<?php
require once("Colore.php");

Colore::stampaColore("rosso");
Colore::$rosso = "#C11C1C"; // Rosso più scuro
Colore::stampaColore("rosso");
?>
```

### Self


```php
<?php
class Colore
{
    static $rosso = "#FF0000";
// ...
static public function stampaColore($colore)
{

/* Per accedere ai membri statici dall'interno interno della classe, $this non è adeguato, si usa il costrutto self */

self::$rosso = "#FF0000";
echo "<font color='" . Colore::${$colore} . "'>Il
valore esadecimale del colore $colore è : ";
echo Colore::${$colore} . "</font><br />\n";
}
}
?>
```