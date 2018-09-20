<form method="post">
	<input type="text" name="serie">
	<input type="submit" name="submit" value="cerca">
</form>
<?php 
	$serie=isset($_POST['serie'])? $_POST['serie'] : "";
	//$serie=$_POST['serie']?? "";
	$url="http://api.tvmaze.com/search/shows?q=";
	$file=file_get_contents($url.$serie);
	$modificato=json_decode($file, true);
	$show=($modificato[0]["show"]);
	foreach ($show as $key => $value) {
		if ($key=="image") {
			//echo $key." : ".$value."<br>";
			//var_dump($value);
			echo "<img src='".$value['medium']."' >";
		}
	}
	//echo ($file);

 ?>