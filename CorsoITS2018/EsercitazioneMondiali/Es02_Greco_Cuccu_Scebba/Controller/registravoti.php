<?php

$db = new mysqli("localhost", "root", "", "mondiali");

if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    die();
}

$team = $_POST["id_squadra"];
$student = $_POST["id_studente"];
$result = $db->query("SELECT id FROM voti WHERE id_squadra = '  '");

if($result->num_rows == 0) {
    $sql = "UPDATE voti SET voto = voto+1 WHERE id_studente = ? AND id_squadra = ?";
    $statement = $db->prepare($sql);
    $statement->bind_param("ss",$student,$team);
    $statement->execute();
} else {
    $sql = "INSERT voti SET voto = voto+1 WHERE id_studente = ? AND id_squadra = ?";
    $statement = $db->prepare($sql);
    $statement->bind_param("ss",$student,$team);
    $statement->execute();
}



?>