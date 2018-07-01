<?php
session_start();

$db = new mysqli("localhost", "root", "", "mondiali");

if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    die();
}

$username = $_POST["nome"];
$password = sha1($_POST["password"]);
$sql = "SELECT * FROM studenti WHERE nome = ? AND password = ?";

$statement = $db->prepare($sql);
$statement->bind_param("ss",$username,$password);
$statement->execute();

$result = $statement->get_result();

if($result->num_rows>0){
    $_SESSION['loggato'] = true;
    header('Location: http://localhost/ProgettoPollMondiali/squadre.php');
}
else{
    echo "Errore";
    header('Location: http://localhost/ProgettoPollMondiali/index.php');
}

?>