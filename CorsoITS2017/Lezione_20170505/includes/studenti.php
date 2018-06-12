<?php
include 'classes/Studente.php';
//includo la connessione pdo
include 'pdo/connessione.php';

try {
    $filename= "elenco_studenti.txt";
    $miofile = fopen($filename, "w+");
    //passo la query e ottengo il resultset
    $result = $connessione->query('SELECT * from studenti order by cognome');
    //carico il mio resultset nell'array $studenti
    
    $result->setFetchMode(PDO::FETCH_CLASS, "Studente");

    while( $studente = $result->fetch() ){
        $msg = "Nome " . $studente->nome . $studente->cognome . "\n";
        fwrite(  $miofile  , $msg) ;  
        
    }
    
    $file = fread($miofile, filesize($filename));
    

    $testo = file_get_contents($filename);

    echo $testo;

//    $studenti = $result->fetchAll();
//    
//    
//    //con un ciclo scorro gli oggetti
//    foreach ($studenti as $studente) {
//        echo $studente['nome']." ".$studente['cognome']."<br/>";
//    }
//    
    fclose($miofile);
  
    
} catch (PDOException $exc) {
    echo $exc->getTraceAsString();
} 


