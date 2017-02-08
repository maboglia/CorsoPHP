<?php 

	$menu_orizzontale = [
		''	=> 'Home Page',
		'uno' =>'PhpInfo',
		'due' =>'Corso Php',
		'tre' =>'Studenti',
		'giochi' =>'Giochi',
		'http://www.php.net' => 'Php.net',
		'http://github.com/maboglia/ITS2017' => 'github',

	];
	foreach ($menu_orizzontale as $key => $value) {
		if (substr($key, 0,4) == 'http')
		echo "<a href=\"{$key}\" target='_blank' >{$value}</a>     ";
		else
		echo "<a href=\"?pagina={$key}\" >{$value}</a>     ";
	}



 ?>	
