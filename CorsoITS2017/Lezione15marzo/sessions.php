<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		sessioni
	</title>
</head>
<body>


<?php $nome = $_SESSION['nome'] = "mauro"; 

	echo $nome;
?>

</body>
</html>