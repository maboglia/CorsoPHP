<!DOCTYPE html>
<html>
<head>
	<title>Form per invio dati</title>
</head>
<body>

<?php if(!$_SESSION['username']) : ?>

<form method="post" action="form_processing.php">
	
Nome utente: <input type="text" name="username" value="" /><br/>
Password: <input type="password" name="password" value=""  /><br/>
<input type="submit" name="submit" value="Fai login" />
</form>

<?php endif; ?>

ciao <?= $_SESSION['username'] ?>




</body>
</html>