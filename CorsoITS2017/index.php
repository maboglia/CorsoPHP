<?php $title = "Corso Backend ITS 2017 Php Programming"; ?>
		
<?php  
		function creaHeader($parola='')
		   {
			for ($i = 1 ; $i < 7 ; $i++){
				echo "<h".$i.">$parola</h".$i.">";           
				
			}
		   }; 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>

		<style type="text/css">
		
			#testata {background-color: red; border: 5px solid #00EE00; }
			#menu {background-color: yellow; border: 5px solid #666666; padding: 5px;}
			#menu a {text-decoration: none; color:black;font-size: 1.2em; }
			#menu a:hover {text-decoration: underline; color:red;}
			#container {border: 1px solid #CCC; }
			div {padding: 5px;}
			#container h1 {color:red;}
			#testata h1 {color:darkblue;}
			h2 {color:green;border: 1px solid #CCC;}
			h3 {color:brown;}
			h4 {color:black;}
			h5 {color:blue;}
			h6 {color:purple;}
		</style>

	</head>
		
	<body>

		<div id="testata">
			<h1><?php echo $title; ?></h1>
		</div>

		<div id="menu">
			<a href="?">Home Page</a> 
			<a href="?pagina=uno">PhpInfo</a> 
			<a href="?pagina=due">Corso Php è bellissimo</a> 
			<a href="?pagina=tre">Studenti</a> 
			<a href="?pagina=giochi">Giochi</a> 
			<!-- link assoluto  -->
			<a href="http://www.php.net" target="_blank">Php.net</a> 
		</div>

		<div id="container">
			




<?php 
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

	$numeroGiocate = 0;

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
			$numeroGiocate++;
			$gioco = "elaborazione statistica sul calcolo delle probabilità";
			echo "<h1>".$gioco."</h1>";

			$dado1 = rand(1,6);
			$dado2 = rand(1,6);

			echo "dado 1 ". $dado1; 
			echo " dado 2 ". $dado2; 
			$successi = array(); 
				if ($dado1 == $dado2){
					$successi[] = $dado1;
					echo "<h1>hai vinto</h1>";

				}
			echo "numero lanci: ". $numeroGiocate;
			echo "<br/>";
			echo "numero successi: ".count($successi);	
			echo "<br/>";
			echo "percentuale: ". $numeroGiocate / count($successi);
			
		}
		else{
			echo "mi dispiace non posso mostrarti queste informazioni segretissime";
		}

	}


 ?>


		
		
		<?php     //$saluto  = " mondo";           ?>
		<?php     //echo $saluto;     ?>
		<?php 	//echo (3 + 2);  ?>
	
		</div>
	</body>

</html>

