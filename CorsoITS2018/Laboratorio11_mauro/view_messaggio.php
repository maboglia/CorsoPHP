<?php 

function controllaLogin($username, $password)
{
	if($username == USER && $password == PASSW) {
			return true;
		}
		return false;
}


if (isset($_POST['username']) && isset($_POST['password'])){

	$username = $_POST['username']; 
	$password = $_POST['password']; 
	$_SESSION['isLogged'] = controllaLogin($username, $password);
} 



if (	isset($_SESSION['isLogged']) 
		&& 
		$_SESSION['isLogged'] == true
	)
	echo "SEI LOGGATO!";

else
	{
		echo "devi fare il login";
	}




 ?>