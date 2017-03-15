<!DOCTYPE html>
<html>
<head>
	<title>calendario</title>
	<style type="text/css">
		.box {
			width: 50px; 
			height: 50px; 
			float: left;
			border:1px solid black;
		}
		.clear{clear:left;}
		.red{background-color: red;}
	</style>
</head>
<body>

<?php 

	$orelezione = 4;
	$totaleore = 110;
	$lezioneOggi = 10;
	$num_lezioni = $totaleore / $orelezione;

	for ($i=0, $e=1; $i < $num_lezioni; $i++, $e++) { 
		
		$classe = ($e<=$lezioneOggi)?"red":"";
		
		echo "<div class='box {$classe}'>$e</div>";
		
		if($e%6==0) echo "<div class='clear'></div>";

	}

 ?>



</body>
</html>