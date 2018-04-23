<?php 
include 'config.php';
include 'testata.php';
include 'menu.php';
?>

	
<h1><?php echo TITOLO_CORSO ?></h1>
<h2><?php echo  date("d/m/Y H:i:s") ?></h2>

<?php 


if (   isset($_GET['pagina'])   )
	{
		switch ($_GET['pagina']) {
			case 'uno':
				include 'pagina_uno.php';
				break;
			case 'due':
				include 'pagina_due.php';
				break;
			case 'elenco_studenti':
				include 'elenco_studenti.php';
				break;
			
			default:
				echo "pagina temporaneamente non disponibile...";
				break;
		}


	}


else
	echo "home page";




 ?>





<?php include 'footer.php'; ?>