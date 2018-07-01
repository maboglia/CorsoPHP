<?php 

$conn = new mysqli("localhost", "persona", "ciao", "mondiali");

 if ($conn->connect_error) {
    die('Connect Error: ' . $conn->connect_error);
}

?>