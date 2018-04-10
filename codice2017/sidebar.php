<h2>menu</h2>

<?php 

	if (         isset($_GET['pagina'])           ) 
		$miaPagina = $_GET['pagina'];
	else
		$miaPagina = "home";

	switch ($miaPagina) {
		case 'studenti':
			//echo "qui metto elenco studenti";

			echo "<ul>";
				foreach ($studenti as $studente) {

					echo "<li>"
						."<a href='#' title=''>"
						.$studente['nome']
						." "
						.$studente['cognome']
						."</a>"
						."</li>";
				}
			echo "</ul>";

			break;
		
		case 'due':
			echo "<ul>";
			foreach ($pagine as $key => $value) {
				echo "<li><a href=\"$value\">$key</a></li>";
			}
			echo "</ul>";	
			break;
		
		default:
			echo 'valore di default per la variabile $miaPagina';
			echo "<br>";
			echo "valore di default per la variabile $miaPagina";
			break;
	}







 ?>