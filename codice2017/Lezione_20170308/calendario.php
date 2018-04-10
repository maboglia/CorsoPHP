<html>
<head>
	<title></title>

<style type="text/css">

td {border:1px solid blue;}

</style>

</head>
<body>
<?php 

$calendario  = [
					["","LUNEDI","MARTEDI","MERCOLEDI","GIOVEDI","VENERDI","SABATO","DOMENICA" ],
					["mattino","","","","","","","" ],
					["pomeriggio","","","PHP Programming","","","","" ],
					["sera","","","","","","","" ],
	];






 ?>

<table>

	<?php 
	for ($i=0; $i < count($calendario); $i++) { 
		//stampo la riga  tr

	?>

		<tr>
			<?php 
				for ($j=0; $j < count($calendario[$i]); $j++) { 
			?>
					<td><?= $calendario[$i][$j]?></td>
			<?php
				}
			?>	

		</tr>

	<?php
	}

	 ?>

</table>



</body>
</html>