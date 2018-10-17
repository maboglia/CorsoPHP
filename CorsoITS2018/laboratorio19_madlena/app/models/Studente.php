<?php
    class Studente{
        public $nome;
        public $cognome;
        public function __construct()
        {
          echo "studente costruito";
        }
        public function __toString()
        {
            return "scheda: ". $this->nome.' '.$this->cognome;
        }
    }

     