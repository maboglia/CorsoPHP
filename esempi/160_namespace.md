
## class Articolo

```php
<?php

namespace App\models;

class Articolo {
    
    public function print() :void {
        echo 'funge';
    }

}

```


## class Triangolo

```php
<?php

namespace App\forme;

class Triangolo{

    public function __construct(private float $b, private float $h){
        // $this->b = $b;
        //$this->h = $h;
    }

    function getArea() : float {
        return ($this->b*$this->h)/2;
    }

}
```


```php

<?php

//1 include/require
// include '../src/forme/Triangolo.php';
// include '../src/forme/Articolo.php';

//2 spla_autoloac
// spl_autoload_register(function ($class)  {

//     $file = str_replace('\\', '/',$class) . '.php';
//     $path = __DIR__.'/../' . str_replace('App', 'src',  $file) ;

//     require_once($path);
// });


//3 composer
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

## composer autoload

```json
{
    "name": "corso-php",
    "description": "corso php",
    "type": "project",
    "license": "mit",
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
    "authors": [
        {
            "name": "maboglia",
            "email": "mauro.bogliaccino@gmail.com"
        }
    ],
    "require": {}
}
```