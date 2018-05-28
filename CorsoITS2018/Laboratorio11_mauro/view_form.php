<?php 

if(isset($_GET['sessione']) && $_GET['sessione']=="distruggi") 
	unset($_SESSION['isLogged']);

if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true){//l'utente è loggato, qui mostro il pulsante di logout

 ?>

<h1><a href="?pagina=p1&sessione=distruggi">logout</a></h1>

<?php } //qui si chiude l'if

else 
	{ //qui l'utente non è loggato, quindi gli mostro il form
		?>



<form 
	action="index.php?pagina=p2" 
	method="post">
	
	<input type="text" name="username" placeholder="username">
	<br>
	<input type="password" name="password" placeholder="password">
	<br>
	<input type="submit" value="Login">

</form>


<?php }//qui si chiude l'else ?>