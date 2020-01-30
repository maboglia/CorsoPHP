<?php 

class students extends Controller{

    public function index($nome = '')
    {

            $Studente = $this->model('Studente');
            $Studente->nome = $nome;
            $Studente->cognome = "madlena";
            $Studente2 = $this->model('Studente');
            $Studente2->nome = "david";
            $Studente2->cognome = "dolce";

            $Studenti= [$Studente,$Studente2];
            
            $this->view('students/index', ['Studenti'=>$Studenti]);

    }
    public function pippe()
    {
        echo "ciao ciao";
        //$this->view('home/pippo');        
    }
}