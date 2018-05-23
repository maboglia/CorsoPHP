<?php  
$posizione = array_search( $_REQUEST["delete"], $_SESSION["todo"]);
var_dump($posizione) ;
if(isset($posizione)&&$posizione>=0)
{
	
	unset($_SESSION["todo"][$posizione]);
	header("Location: index.php");
}

?>