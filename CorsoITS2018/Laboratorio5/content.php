<?php 

$pagina = (isset($_GET['p']))? $_GET['p'] : "Home";
switch ($pagina) {
	case 'Rosa':
		echo "Rosa";
		include 'rosa.php';
		break;
	case 'Bacheca':
		echo "Bacheca";
		break;
	case 'Dettaglio':
		echo "Dettaglio";
		include 'dettaglio.php';
		break;
	case 'Home':
		echo "Home";
		break;
	default:
		echo "Ciaone";
		break;
}

 ?>