<?php 

$conn = new mysqli("localhost", "root", "","mondiale");

 if ($conn->connect_error) {
    die('Connect Error: ' . $conn->connect_error);
}

 ?>
