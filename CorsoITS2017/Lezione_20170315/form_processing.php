<?php include 'headers.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form processing</title>
</head>
<body>
	<?php
/*		if (     isset($_POST['username'])    )
			$username = $_POST['username'];
		else
			$username = "";

		if (isset($_POST['password']))
			$password = $_POST['password'];
		else
			$password = "";
*/

if (isset($_POST['submit'])){
		//operatore ternario
	$username =  isset($_POST['username']) ? $_POST['username'] : ""; 
	$password =  isset($_POST['password']) ? $_POST['password'] : ""; 

	$loginPage = "form.php";
	$stringa = "";

	if ( trim($username) == "mauro" && $password == "123"){
		$stringa = "Benvenuto ". $username;
		$_SESSION['username'] = $username;

	} else {
		/*
		$stringa = "username e password errati"
		 .", ritorna al "
		 ."<a href='"
		 .$loginPage
		 ."'>"
		 ."login"
		 ."</a>.";
		 */
		 redirect("form.php");
	}

	echo $stringa;

	echo $_SESSION['username'];
}
	  ?>

</body>
</html>