
<?php 
include 'testata.php';
include 'menu.php';


if (   isset($_GET['pagina'])   )
	{
		switch ($_GET['pagina']) {
			case 'uno':
				include 'pagina_uno.php';
				break;
			case 'due':
				include 'pagina_due.php';
				break;
			
			default:
				echo "pagina temporaneamente non disponibile...";
				break;
		}


	}


else
	echo "home page";



include 'footer.php';


 ?>