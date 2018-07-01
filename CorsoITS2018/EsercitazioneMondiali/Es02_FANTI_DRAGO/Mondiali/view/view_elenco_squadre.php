<?php 
	include 'controller/elenco_squadre.php';
	$due=0;
	echo "<table>";
		echo "<tr><td>Ottavi di finale</td></tr>";
	foreach ($elenco as $squadra){

		if($due!=1)
			echo "<tr>";
		echo "<td>".$squadra."</td>";
		$due++;
		if($due==2){
			echo "</tr>";
			$due=0;
		}

	}
	echo "</table>";

 ?>