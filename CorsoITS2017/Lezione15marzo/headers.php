<?php 
	function redirect($pagina)
	{
		header("Location: " . $pagina);
		exit;
	}

	function esiste($value)
	{
		return isset($value) && $value !== "";
	}



?>
