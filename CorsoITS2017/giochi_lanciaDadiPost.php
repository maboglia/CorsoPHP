<?php 


	$numeroGiocate = 0 + $_POST['lanci'];
	$numeroSuccessi = 0 + $_POST['successi'];


			$numeroGiocate++;
			$gioco = "elaborazione statistica sul calcolo delle probabilità";
			echo "<h1>".$gioco."</h1>";

			$dado1 = rand(1,6);
			$dado2 = rand(1,6);

			echo "<img src='img/dadi/{$dado1}.png' alt='dado estratto {$dado1}' />"; 
			echo "<img src='img/dadi/{$dado2}.png' alt='dado estratto {$dado2}' />"; 
			//echo " dado 2 ". $dado2; 
			$successi = array(); 

				if ($dado1 == $dado2){
					$successi[] = $dado1;
					$numeroSuccessi++;

					echo "<h1>hai vinto</h1>";

				}
			echo "numero lanci: ". $numeroGiocate;
			echo "<br/>";
			echo "numero successi: ".$numeroSuccessi;	
			echo "<br/>";
			echo "percentuale: ". round($numeroSuccessi / $numeroGiocate, 2) * 100 . "%";

			?>
			<form method="post" action="?pagina=giochi">

				<input type="hidden" name="lanci" value="<?php echo $numeroGiocate ?>" />
				<input type="hidden" name="successi" value="<?php echo $numeroSuccessi ?>" />
				<input type="submit" value="ritenta" />
				
			</form>


			<?php

			//echo "<a href='?pagina=giochi&lanci={$numeroGiocate}&successi={$numeroSuccessi}'>ritenta</a>";

	




 ?>