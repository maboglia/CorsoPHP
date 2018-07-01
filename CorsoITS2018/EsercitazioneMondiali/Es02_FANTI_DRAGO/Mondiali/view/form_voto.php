<?php 
include "controller/elenco_squadre.php";	

 ?>
<form method="post" action="index.php?page=ricevi_voti">
	<br>
	Prima squadra: <select name="sqdr1">
		
			<?php
				for ($i=0;$i<sizeof($elenco);$i++){
						echo "<option value='".$elencoID[$i]."'>".$elenco[$i]."</option>";
					}
					
				?>"
		</select><br>

		
	Seconda squadra:  <select name="sqdr2">
		
			<?php
				for ($i=0;$i<sizeof($elenco);$i++){
						echo "<option value='".$elencoID[$i]."'>".$elenco[$i]."</option>";
					}
					
				?>"
		</select><br>

	Terza squadra:  <select name="sqdr3">
		
			<?php
				for ($i=0;$i<sizeof($elenco);$i++){
						echo "<option value='".$elencoID[$i]."'>".$elenco[$i]."</option>";
					}
					
				?>"
		</select><br>

	Quarta squadra:  <select name="sqdr4">
		
			<?php
				for ($i=0;$i<sizeof($elenco);$i++){
						echo "<option value='".$elencoID[$i]."'>".$elenco[$i]."</option>";
					}
					
				?>"
		</select><br>

	<input type="submit" name="Invia il voto">

</form>
