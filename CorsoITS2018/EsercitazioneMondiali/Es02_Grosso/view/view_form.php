<?php
if (isset($_GET["sessione"]) && $_GET["sessione"]=="distruggi") {
	unset($_SESSION["isLogged"]);
}
 if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']==true) { // utente loggato: mostro LOGOUT
?>
<h1><a href="<?="?pagina=p1&sessione=distruggi"?>">logout</a></h1>
<?php }//qui si chiude IF
else{ ?>

<form action="index.php?pagina=p2" method="post">
	<input type="text" name="username" placeholder="username"><br>
	<input type="password" name="password" placeholder="password"><br>
	<input type="submit" value="Login"><br>
</form>

<?php } //qui si chiude ELSE ?>