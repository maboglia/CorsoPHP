<?php
$servername = "localhost";
$username = "End";
$password = "its2018!";
$database = "mondiali";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


if(!IsSet($_SESSION['logged'])){

$Username = @$_POST['Username'];
$Password = @$_POST['Password'];


if((!strlen($username) == 0) and (!strlen($password) == 0)){

$strSQL = "SELECT 'nome','Password' FROM studenti WHERE nome = '".$Username."' AND password = MD5('".$Password."')";
        $result = $conn->query($strSQL);
    }
     //header('Location: mosta_form_voto.php');
}

?>