<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Studente
 *
 * @author docente
 */
class Studente {
    public $id;
    public $nome;
    public $cognome;
    public $matricola;
    public $data_nascita;
    public $email;
    public $eta=10;
    
    public function __construct() {
        echo "studente costruito";
    }
}
