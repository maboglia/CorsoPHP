<?php 

	//condizioni in php: 3 costrutti

	//if, if...else, if ... elseif ... else


	$count = -1;


	if ($count > 0){
		echo "è maggiore di zero";
	}

	elseif ($count < 0){
		echo "è minore di zero";
	}

	else {
		echo "è uguale a zero";
	}


	//switch case

	switch ($count) {
		case 0:
			echo "è uguale a zero";
			break;
		
		default:
			echo "è diverso da zero";
			break;
	}

	//operatore ternario

	echo "il valore è ";
	$valoreCount =  ($count > 0) ? "è maggiore di zero" : "minore o uguale a zero";
	echo $valoreCount;




 ?>