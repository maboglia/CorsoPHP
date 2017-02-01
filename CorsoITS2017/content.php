

<?php 
//error_reporting(E_ALL);
error_reporting(0);

/*	$saluto = "ciao";

	echo "il mio saluto è $saluto";
	echo 'il mio saluto è {$saluto}';*/

	//echo $_GET['pagina'];

	//$a = $_GET['pagina'];


	$studenti = array(
		"stefano",
		"simone",
		"lorenzo",	
		"rosa",	
		"danilo",	
	);	


	//qui ricevo la variabile passata via GET
	if($_GET['pagina']){

		if ($_GET['pagina'] == "uno"){
			phpinfo();		
		}
		else if ($_GET['pagina'] == "due"){
			echo "<h1>benvenuto nel corso php</h1>";

			creaHeader("hello world");

			echo "<ul>";
			echo "<li><a href='variabili.php'>variabili</a></li>";	
			echo "<li><a href=\"array.php\">array</a></li>";	
			echo "</ul>";	
		}
		elseif ($_GET['pagina'] == "tre") {
			
			shuffle($studenti);

			for ($i=0; $i < count($studenti) ; $i++) { 
				echo $studenti[$i]."<br>";
			}

			/*echo $studenti[0].
					$studenti[1].
					$studenti[2];*/
		}
		else if($_GET['pagina'] == "giochi"){

			//include "giochi_lanciaDadi.php";
			include "giochi_lanciaDadiPost.php";
		}
		else{
			echo "mi dispiace non posso mostrarti queste informazioni segretissime";
		}

	}
	else echo "ti trovi nella home";


 ?>


		
		
		<?php     //$saluto  = " mondo";           ?>
		<?php     //echo $saluto;     ?>
		<?php 	//echo (3 + 2);  ?>
	