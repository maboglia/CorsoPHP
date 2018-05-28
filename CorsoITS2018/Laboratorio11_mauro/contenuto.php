
<?php 
	//apertura if
	if (isset($_GET['pagina']))
	{
		//apertura switch - qui sto facendo il routing
		switch ($_GET['pagina']) {
			case 'p1':
				//qui mostro la vista per inserire le credenziali
				include 'view_form.php';
				break;
			case 'p2':
				//in questo caso controllo le credenziali e mostro una vista all'utente
				include 'view_messaggio.php';
				break;
			case 'p3':
				//qui controllo se l'utente è loggato e gli mostro info riservate
				include 'view_area_riservata.php';
				break;
			
			default:
				echo "<h1>".
					"pagina non disponibile".
					"</h1>";
				break;
		}
		//chiusura switch
	}
	//chiusura dell if


 ?>