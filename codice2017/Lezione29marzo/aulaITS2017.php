<?php 

include 'contenitoreStudenti.php';
include 'header.php';

 ?>
<div class="container">


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


		<?php foreach ($elencoStudenti as $studente) : ?>
		<?php ++$i; ?>
		<div class="panel col-md-2">
			<div><?= $studente->nome ?></div>
			<div><?= $studente->cognome ?></div>
			<div><!--<?= $studente->email ?>--></div>
		</div>
	<?php endforeach; ?>



<?php endif; ?>


</div>


<?php include 'footer.php'; ?>