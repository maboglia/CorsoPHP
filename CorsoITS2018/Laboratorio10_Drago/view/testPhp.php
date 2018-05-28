<?php session_start() ?>
<form action="" method="POST">
    <input type="submit" value="Cancella">
</form>
<?php 
	if($_POST['Cancella']=="Cancella")
		unset($_SESSION['todo']);
 ?>
<?php 
	$path="../files/prova.txt";
	$mioFile = fopen($path, "a")

 ?>

<?php 
	$fileLetto=file($path);

	if(!in_array($_SERVER['REMOTE_ADDR']."\r\n", $fileLetto))
	{
		fwrite($mioFile, $_SERVER['REMOTE_ADDR']."\r\n");
		foreach ($_SESSION['todo'] as $key => $value) {
		echo $key.": ".$value;
		fwrite($mioFile, $value."\r\n");
		}
		fclose($mioFile);
	}

?>
<h1>Qui inizia il file di "log"</h1>
<a href=<?="$path"?>>Scarica file di testo</a>
<br>
<?php
	//Si chiude il collegamento al file
	
	//echo file_get_contents(nl2br($path));
	$fileLetto=file($path);
	echo is_array($fileLetto);
	$contatore=0;
	foreach ($fileLetto as $value) {
		$contatore++;
		echo "<h2>".$value."</h2>";
// 		if ($contatore%2==0) {
// 		echo "<h2>".$value."</h2>";
// }
	}

 ?>