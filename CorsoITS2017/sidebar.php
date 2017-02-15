<h2>menu</h2>

<?php 

	switch ($_GET['pagina']) {
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
			break;
		
		default:
			# code...
			break;
	}







 ?>