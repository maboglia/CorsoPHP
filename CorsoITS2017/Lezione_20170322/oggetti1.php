<?php 

class HelloWorld
{
    // property declaration
    public $var = 'Hello, World!';

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}

class CiaoMondo
{
    // property declaration
    public $var = 'Ciao, Mondo!';

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}


$mioSaluto = new HelloWorld();
$tuoSaluto = new CiaoMondo();

print_r($mioSaluto);

echo $mioSaluto->displayVar(); 
echo $tuoSaluto->displayVar(); 






 ?>