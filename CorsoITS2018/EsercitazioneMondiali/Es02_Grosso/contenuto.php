<?php 
if (isset($_GET['pagina']))
	{
		switch ($_GET['pagina']) {
			case 'p1':
				//vista per inserire le credenziali
				include 'view/view_form.php';
				break;
			case 'p2':
				//controllo le credenziali e mostro una vista all'utente, rilascio cookie di log
				include 'view/view_messaggio.php';
				break;
			case 'p3':
				//controllo se l'utente è loggato e gli mostro info riservate
				include 'view/view_area_riservata.php';
				break;
			
			default:
				echo "<h1>Pagina non disponibile</h1>";
				break;
		}

	}

 ?>