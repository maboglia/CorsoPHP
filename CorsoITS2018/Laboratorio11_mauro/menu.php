<style>
	.selezionato{color:red;}
</style>

<a href="?pagina=p1" class="<?= 
	($_GET['pagina']=='p1')? 
	'selezionato': 
	''
	?>">p1</a> 
<a href="?pagina=p2" class="<?= 
	($_GET['pagina']=='p2')? 
	'selezionato': 
	''
	?>">p2</a> 
<a href="?pagina=p3" class="<?= 
	($_GET['pagina']=='p3')? 
	'selezionato': 
	''
	?>">p3</a> 
