<?php 
/*
config.php(titolo,credenziali) (model)
	testata.php	
	menu.php	
	contenuto.php (controller) [businnes logic]
		view_form (views) [presentation logic]
		view_messaggio (views)
		view_area_riservata (views)
	piedipagina.php
*/
include 'controller/Connessione.php';

include 'controller/config.php';

include 'view/testata.php';	

//include 'view/view_form.php';

include 'menu.php';	

include 'contenuto.php';

include 'view/piedipagina.php';



 ?>