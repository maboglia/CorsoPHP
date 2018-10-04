<?php 


//Funzione spostata in config.php
/*function controllaLogin($username,$password)
{
	if($username == USER && $password == PASSW)
		return true;
	return false;
}*/

// Login migliorato con controllo base di Username e PassWord

if(isset($_SESSION['isLogged']) && $_SESSION['isLogged']==true){
	echo "<h2>Sei Loggato</h2>";
}
else{


if (isset($_POST['username']) && isset($_POST['password'])) {
	
	$username =$_POST['username'];
	$password =$_POST['password'];
	$logged = controllaLogin($username,$password);
	if ($logged) {
	$_SESSION['isLogged']=$logged;
	echo "<h2>Sei Loggato</h2>";	
	}else{echo"username o passw non corretti";}
}
else 
	echo "devi fare login";

}


?>