<?php
	if (isset($_GET['pagina']))
	{
		switch ($_GET['pagina']) {
			case 'home':
				include 'view/home.php';
				break;
			case 'login':
			//controllo credenziali ed eventuale feedback
				include 'view/login.php';
				break;
			case 'elenco':
				include 'view/elenco_squadre.php';
				break;
			default:
				echo " <h1> Pagina non disponibile <h1> ";
				break;
			}
	}
 ?>
