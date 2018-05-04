<head>
	<style type="text/css">
		.red{
			background-color: red;
		}
		.blue{
			background-color: blue;
		}
			

	</style>

</head>


<?php if ($_GET["producer"]=="Derrick_May") {
echo "<body class='red'>";	
} 
else{
echo "<body class='blue'>";	

}
?>
		
<a href="?">Home</a> 
<a href="?producer=Derrick_May">Derrick May</a> 
<a href="?producer=Floating_Point">Floating Points</a> 

<?php 
//un commento su una linea

/*

commento su più linee...
L'argomento di oggi è la costante!!
*/

define("SALUTO","buongiorno");
echo SALUTO;
echo $_SERVER["REMOTE_ADDR"];
echo $_SERVER["SERVER_ADDR"];
//ip 172.20.208.250
foreach ($_SERVER as $key => $value) {
//	echo $key.": ".$value."<br>";
}
if (isset($_GET["producer"])) {
$producer = $_GET["producer"];
}
else{
	$producer="";
}
if ($producer=="spacca tutto"&&$_GET["login"]==12345) {
	echo "area riservata";
	include "areariservata.php";
}
echo "<h1>".$producer."</h1>";
switch ($producer) {
	case 'Derrick_May':
		include "derrick.html";
		break;
	case 'Floating_Point':
		include "floating.html";
		break;
	
	default:
		include "house.html";
		break;
}
?>
</body>