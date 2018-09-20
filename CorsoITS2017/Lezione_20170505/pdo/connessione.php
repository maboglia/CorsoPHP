<?php
include_once 'includes/config.php';

try {
    $connessione = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $eccezione) {
    echo $eccezione->getMessage();
} finally {
    
}

echo 'ciao';


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

