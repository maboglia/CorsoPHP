<?php 
try {
	$conn = new PDO("mysql:host=localhost;dbname=ITS2017", "root", "");
	if($conn){
		echo "sei connesso";
	}

	
} catch (PDOException $e) {
		echo $e->getMessage();
}
	 ?>
