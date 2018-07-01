


<form action="" method="post">
	
	<input type="text" name="username" placeholder="username">
	<br>
	<input type="password" name="password" placeholder="password">
	<br>
	<input type="submit" value="Login">

</form>


<?php 
include "verifica.php";

$user=$_POST['username'];
$passw=$_POST['password'];
$v=verifica();
if ($v==0) {
		header("Refresh:0");
	}	else {
		header('Location: elenco_squadre.php')

	}
	
 ?>

