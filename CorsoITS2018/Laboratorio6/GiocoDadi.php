<?php session_start() ?>
<style type="text/css">
	.dado{width: 100px;height: 100px; border: 1px solid #ccc;}
	.dado img {width: 100px;height: 100px;}
</style>

<?php 
//phpinfo();
//$_SESSION['giocate'] = 0;
//$_SESSION['contatore'] = 0;


function verifica($d1, $d2)
{

//global $_SESSION['contatore'];
	
	if ($d1+$d2==7){
		$_SESSION['contatore']++;
		return true;
	}
	return false;
}

// $casuale1 = rand();
// $casuale2 = rand(0,1);
	# code...
function lanciaDadi()
{
	//global $_SESSION['giocate'];
	$_SESSION['giocate']++;
	$dado1 = rand(1,6);
	$dado2 = rand(1,6);
	$vittoria = verifica($dado1, $dado2);
	mostraDadi($dado1, $dado2);
	return $vittoria;
}


echo "<hr>";

if (lanciaDadi())
{echo "hai vinto!!!!!!!!";}

echo "<hr>";

// echo '$casuale1: '.$casuale1;
// echo '<br>';
// echo '$casuale2: '.$casuale2;
// echo '<br>';
function mostraDadi($d1,$d2)
{
echo "<img class='dado' src='img/dado{$d1}.svg.png'>";
echo "<img class='dado' src='img/dado{$d2}.svg.png'>";
}



echo "<hr>";
echo "hai giocato: ".$_SESSION['giocate']." volte";
echo "<hr>";
echo "hai vinto: ".$_SESSION['contatore']." volte";
echo "<hr>";
echo "percentuale successo: ".(($_SESSION['contatore']/$_SESSION['giocate'])*100)."%";

 ?>