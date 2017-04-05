<?php 

include 'contenitoreStudenti.php';
include 'header.php';

 ?>
<div class="container">


<?php if (isset($_GET['queryDB'])) : ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>query</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($elencoStudenti as $studente) : ?>
		<tr>
			<td>insert into studenti (nome, cognome, email ) values ('<?= $studente->nome ?>', '<?= $studente->cognome ?>','<?= $studente->email ?>');</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<?php endif; ?>


<?php if (isset($_GET['list'])) : ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Cognome</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($elencoStudenti as $studente) : ?>
		<tr>
			<td><?= $studente->nome ?></td>
			<td><?= $studente->cognome ?></td>
			<td><?= $studente->email ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<?php endif; ?>

<?php if (isset($_GET['grid'])) : ?>


		<?php $i=1;$c=0; for($j=0;$j<count($elencoStudenti);$j++) : ?>
		<?php ++$i; if($i==5+$c){?>
			<div class="panel col-md-2"></div>
		<?php $j--; $c+=6;} else{ ?>
		<div class="panel col-md-2">
			<div><?= $elencoStudenti[$j]->nome ?></div>
			<div><?= $elencoStudenti[$j]->cognome ?></div>
			<div><!--<?= $elencoStudenti[$j]->email ?>--></div>
		</div>
		<?php  }?>
	<?php endfor; ?>



<?php endif; ?>


</div>


<?php include 'footer.php'; ?>