<style type="text/css">
	.foto{width: 140px;height: 100px;margin:1em;}


</style>


<?php

	for ($i=1; $i <= 9 ; $i++) {
		$rand= rand(1,9);
		echo "<img class='foto' src='img/p{$rand}.jpg'>";

		if($i%3==0)
			echo "<br/>";
	}





 ?>
