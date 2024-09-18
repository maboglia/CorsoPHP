



```php
<?php

    //1
    // include '../src/forme/Triangolo.php';
    // include '../src/forme/Articolo.php';

//2
// spl_autoload_register(function ($class)  {

//     $file = str_replace('\\', '/',$class) . '.php';
//     $path = __DIR__.'/../' . str_replace('App', 'src',  $file) ;

//     require_once($path);
// });


//3
require_once __DIR__.'/../vendor/autoload.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);


use App\forme\Triangolo;
use App\models\Articolo;


$t1 = new Triangolo(5,10);

var_dump($t1);
var_dump($t1->getArea());

$article = new Articolo();
var_dump($article);
var_dump($article->print());

```