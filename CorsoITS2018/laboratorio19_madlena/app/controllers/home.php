<?php 

class Home extends Controller{

    public function index($nome = '')
    {

            $Studente = $this->model('Studente');
            $Studente->nome = $nome;
            $Studente->cognome = "madlena";
            
            $this->view('home/index', ['nome'=>$Studente->nome,"oggetto"=>$Studente]);

    }
    public function pippe()
    {
        echo "ciao ciao";
        //$this->view('home/pippo');        
    }
}