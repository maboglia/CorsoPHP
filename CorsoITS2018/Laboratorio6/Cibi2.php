<?php session_start() ?>
<style type="text/css">
	.foto{width: 640px;height: 480px;margin:1em;}


</style>


<?php 
$immagini = [
['p1.jpg',"PIZZA"],
['p2.jpg',"pROFITTEROL"],
['p3.jpg',"sUSHI"],
['p4.jpg',"bistecca"],
];



function incrementa()
{
	global $immagini;
	$_SESSION['contatore']++;
	if ($_SESSION['contatore']>=count($immagini))
		$_SESSION['contatore']=0;
	
}
incrementa();
echo $rand=$_SESSION['contatore'];


		echo "<h1>".$immagini[$rand][1]."</h1>";
		echo "<img class='foto' src='img/".$immagini[$rand][0]."'>";
		



 ?>

 <a href="<?php echo $_SERVER['PHP_SELF']?>">next</a>