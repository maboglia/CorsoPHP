<style type="text/css">
	.selezionato{
		color:green;
	}
</style>
<?php 
	if(isset($_SESSION["isLogged"]) and $_SESSION["isLogged"]==True){
?>
		<a href="?page=logOut" class="<?= ($_GET['page']=='logOut')? 'selezionato' : '' ?>">Log out</a>		
		<a href="?page=formVoto" class="<?= ($_GET['page']=='formVoto')? 'selezionato' : '' ?>">Vota squadre</a>		
		<a href="?page=elencoSquadre" class="<?= ($_GET['page']=='logOut')? 'selezionato' : '' ?>">Mostra squadre</a>	
		<a href="?page=squadra" class="<?= ($_GET['page']=='logOut')? 'selezionato' : '' ?>">Mostra risultati attuali</a>
<?php
	}
	else{


 ?>
<a href="?page=p1" class="<?= ($_GET['page']=='p1')? 'selezionato' : '' ?>">Login</a>
<?php } ?>