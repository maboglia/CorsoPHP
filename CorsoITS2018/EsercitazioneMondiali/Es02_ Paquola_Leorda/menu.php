<style type="text/css">
	.selezionato{color:red;}
</style>
<header>
<a href="?pagina=home" class=" <?= ($_GET['pagina'] == 'home')? 'selezionato' : 'noSelect' ?> ">home</a>
<a href="?pagina=login" class=" <?= ($_GET['pagina'] == 'login')? 'selezionato' : 'noSelect' ?> ">login</a>
<a href="?pagina=elenco" class=" <?= ($_GET['pagina'] == 'elenco')? 'selezionato' : 'noSelect' ?> ">elenco squadre</a>
</header>
