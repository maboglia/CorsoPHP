<?php $title = "Corso Backend ITS 2017 Php Programming"; ?>

<?php  
function creaHeader($parola='')
{
	for ($i = 1 ; $i < 7 ; $i++){
		echo "<h".$i.">$parola</h".$i.">";           

	}
}; 
?>

<?php include 'header.php' ?>


<div id="testata">
	<h1><?php echo $title; ?></h1>
</div>

<div id="menu">
	<?php include 'menu.php' ?>
</div>

<div id="container">
	
	<?php include 'content.php' ?>

</div>

<?php include 'footer.php' ?>
