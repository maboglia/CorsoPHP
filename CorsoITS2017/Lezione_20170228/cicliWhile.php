<?php 

	/* loop, cicli, strutture del linguaggio
	while (espressione)
		statement;

	*/
		$count = 0;

		while ($count <= 10) {
			if ($count % 2 == 0)
				echo $count;
//			$count = $count + 2  ;
			$count += 1;
		}


		$count = 0;
		echo "<table >";

		while ($count <= 10) {
			if ($count % 2 == 0)
			echo "<tr style='background-color:red'><td>".$count."</td><td>".($count * 2)."</td></tr>";
			else			
			echo "<tr style='background-color:#000000; color: #ffffff'><td>".$count."</td><td>".($count * 2)."</td></tr>";

			
			$count += 1;
		}

		echo "</table>";


 ?>