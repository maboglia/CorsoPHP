<?php 

	if(isset($_GET['page']))
	{

		switch ($_GET['page']) {
			case 'p1':
				//Form di log in
				include 'view/login_utente.php';
				break;			
			case 'checkLogin':
				include 'controller/verifica_studente.php';
				break;
			case 'elencoSquadre':
				include 'view/view_elenco_squadre.php';
				break;
			case 'logOut':
				include 'controller/logOut.php';
				break;
			case 'formVoto':
				include 'view/form_voto.php';
				break;
			case 'ricevi_voti':
				include 'ricevi_voti.php';
				break;
			default:
				echo "<h1>Page not found</>";
				break;
		}
	}
