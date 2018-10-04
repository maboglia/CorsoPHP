<?php  

$DB_host     = 'localhost';
$DB_user     = 'root';
$DB_password = '';
$DB_name     = 'mondiale';

$link = mysql_connect($DB_host, $DB_user, $DB_password);
if (!$link) {
	die ('Non riesco a connettermi: ' . mysql_error());
}

$db_selected = mysql_select_db($DB_name, $link);
if (!$db_selected) {
	die ("Errore nella selezione del database: " . mysql_error());
}	
?>