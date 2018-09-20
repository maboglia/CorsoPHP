<?php

class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
            
    public $link;
            
    function __construct() {
        $this->connetti();
    }

    public function connetti() {
        $this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
    }
    
    public function select($query) {
        
        $result = mysqli_query($this->link, $query);
        if ($result->num_rows > 0){
            return $result;
        } else            
            return false;
        
    }
        public function insert($query) {
        
        $insert = $this->link->query($query);
        
        if($insert){
            header('Location: index.php?messaggio=PostInserito');
        } else {
            echo "Post non inserito ". mysqli_error($this->link);
        }
        
    }
    
        public function update($query) {
        
        $insert = $this->link->query($query);
        
        if($insert){
            header('Location: index.php?messaggio=PostAggiornato');
        } else {
            echo "Post non Aggiornato";
        }
        
    }
    
        public function delete($query) {
        
        $insert = $this->link->query($query);
        
        if($insert){
            header('Location: index.php?messaggio=PostEliminato');
        } else {
            echo "Post non Eliminato";
        }
        
    }
    

    
}


