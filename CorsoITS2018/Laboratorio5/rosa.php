<ul class="list-group col-md-4">
<?php 
$i=0;

foreach ($giocatori as $giocatore) {
	echo "<li class='list-group-item'><a href='?p=Dettaglio&player=".$i."'>".$giocatore."</a></li>";
	$i++;
}
 ?>
	
</ul>