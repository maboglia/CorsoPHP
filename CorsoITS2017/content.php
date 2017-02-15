

<?php 
//error_reporting(E_ALL);
error_reporting(0);

/*	$saluto = "ciao";

	echo "il mio saluto è $saluto";
	echo 'il mio saluto è {$saluto}';*/

	//echo $_GET['pagina'];

	//$a = $_GET['pagina'];




	//qui ricevo la variabile passata via GET
	switch($_GET['pagina']){

		 case "uno":
			//phpinfo();
			echo $_SERVER['SCRIPT_FILENAME'];
			echo '<br>';
			echo $_SERVER['REMOTE_HOST'];
			echo '<br>';
			echo $_SERVER['REMOTE_USER'];

			$lunghezza = count($_SERVER);

			foreach ($_SERVER as $key => $value) {
				echo $key
					." "
					.$value
					."<br>";


			}


			for ($i=9; $i >= 0; $i--) { 
				echo $studenti[$i]."<br>";
			}

			foreach ($studenti as $studenteChiave => $studenteValore ) {
				echo $studenteChiave.": ".$studenteValore['nome']."<br>";
			}



		break;

		case "due":
			echo "<h1>Corso php</h1>";
			echo "<h2>Elementi del linguaggio</h2>";

				if ($_GET['argomento'] == 'variabili' ) include 'variabili.php';
				if ($_GET['argomento'] == 'cicli') include 'cicliWhile.php';
				if ($_GET['argomento'] == 'array') include 'array.php';
				if ($_GET['argomento'] ==  'array_associativi') include 'array_associativi.php';
				if ($_GET['argomento'] == 'condizioni') include 'condizioni.php';


		break;
		
		case "tre":
			
			//shuffle($studenti);

			for ($i=0; $i < count($studenti) ; $i++) { 
				echo $studenti[$i][0]."<br>";
			}

			/*echo $studenti[0].
					$studenti[1].
					$studenti[2];*/
		break;
		
		case "giochi":

			//include "giochi_lanciaDadi.php";
			include "giochi_lanciaDadiPost.php";
		break;

		default:
			echo "mi dispiace non posso mostrarti queste informazioni segretissime";
			echo "ti trovi nella home";
	}


 ?>


		
		
		<?php     //$saluto  = " mondo";           ?>
		<?php     //echo $saluto;     ?>
		<?php 	//echo (3 + 2);  ?>
	