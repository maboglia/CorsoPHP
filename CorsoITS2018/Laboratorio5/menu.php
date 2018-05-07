<nav>
	<!-- <a href="index.php">Home</a>
	<a href="index.php?p=Rosa">Rosa</a>
	<a href="index.php?p=Bacheca">Bacheca</a>
	<a href="index.php?p=Dettaglio">Dettaglio</a>
	 -->
	 <?php 
	 	foreach ($pagine as $pagina) {
	 			echo "<a href='index.php?p=$pagina'>$pagina</a> ";
	 		}
	  ?>
</nav>