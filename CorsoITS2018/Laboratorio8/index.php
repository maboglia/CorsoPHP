<?php 

	$automobile = [
		//qui un array che rappresenta una automobile
		//el 0
		["marca"=>"audi",
		"modello"=>"A8",
		"cilindrata"=>"3000"],
		//elemento 1		
		["marca"=>"porsche",
		"modello"=>"911",
		"cilindrata"=>"4200"],

	];
header("Content-Type: image/jpeg");
	//echo json_encode($automobile);
echo file_get_contents("p1.jpg");


 ?>