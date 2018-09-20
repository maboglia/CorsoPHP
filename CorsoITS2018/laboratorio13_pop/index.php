<?php
session_start();
include "funzioni.inc.php";
include "Serie.php";
 ?>
<form method="post">
<input type="text" name="serie">
<select name="voto">
  <option value="">dai un voto alla serie</option>
<?php
for ($i=1; $i <=5 ; $i++) {
  ?>
<option value="<?=$i?>"><?=$i?></option>
  <?php
}

 ?>

</select>

<input type="submit" name="submit" value="cerca">
</form>

<?php
//$serie=$_POST['serie']??"";
$serie=isset($_POST['serie'])?$_POST['serie']:"";
$valutazione=(isset($_POST['voto']) && !empty($_POST['voto']))?$_POST['voto']:"";
$url="https://api.tvmaze.com/search/shows?q=";
$file= file_get_contents($url.$serie);
$_SESSION['valutazioni'][]=array('serie' => $serie,'voto'=>$valutazione );

if ($serie!="") {
$locandina=leggiJson($file);
}
$_SESSION['serie_tv'][]=new Serie($serie,$valutazione,$locandina);
foreach ($_SESSION['serie_tv'] as $oggettoSerie) {
  if (is_object($oggettoSerie)) {
    echo ($oggettoSerie->getNomeSerie());
    echo (Serie::accapocchia());
  }
}


//stampaelenco();


// echo($file)

 ?>
