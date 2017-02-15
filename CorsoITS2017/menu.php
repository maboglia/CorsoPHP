<?php 

	foreach ($menu_orizzontale as $key => $value) {
		if (substr($key, 0,4) == 'http')
		echo "<a href=\"{$key}\" target='_blank' >{$value}</a>     ";
		else
		echo "<a href=\"?pagina={$key}\" >{$value}</a>     ";
	}



 ?>	
