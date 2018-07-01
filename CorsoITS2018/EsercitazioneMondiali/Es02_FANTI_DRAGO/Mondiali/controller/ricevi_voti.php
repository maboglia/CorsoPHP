<?php 
include 'connectionDB.php';

$_SESSION['idLog'];

$ip = $_SERVER["REMOTE_ADDR"];
$idSqdr1= $_REQUEST['sqdr1'];
$idSqdr2= $_REQUEST['sqdr2'];
$idSqdr3= $_REQUEST['sqdr3'];
$idSqdr4= $_REQUEST['sqdr4'];

// echo $ip;

$querySQL1 = "SELECT COUNT(voti.id_studente) as id FROM voti WHERE voti.id_studente='".$_SESSION['idLog']."'";

$querySQL2 = "SELECT COUNT(voti.ip) as ip FROM voti WHERE voti.ip='".$ip."'";

$queryIns=array();
$queryIns[] = "INSERT INTO `voti` (`id_studente`, `id_squadra`, `posizione`, `ip`) VALUES ('".$_SESSION['idLog']."','".$idSqdr1."','1','".$ip."')";
$queryIns[] = "INSERT INTO `voti` (`id_studente`, `id_squadra`, `posizione`, `ip`) VALUES ('".$_SESSION['idLog']."','".$idSqdr2."','1','".$ip."')";
$queryIns[] = "INSERT INTO `voti` (`id_studente`, `id_squadra`, `posizione`, `ip`) VALUES ('".$_SESSION['idLog']."','".$idSqdr3."','1','".$ip."')";
$queryIns[] = "INSERT INTO `voti` (`id_studente`, `id_squadra`, `posizione`, `ip`) VALUES ('".$_SESSION['idLog']."','".$idSqdr4."','1','".$ip."')";

$risultato1 = mysqli_query($mysqlConnessione, $querySQL1) or die("errore nella query:".mysqli_error());
$risultato2 = mysqli_query($mysqlConnessione, $querySQL2) or die("errore nella query:".mysqli_error());

$contatoreID=mysqli_fetch_array($risultato1);
$contatoreIP=mysqli_fetch_array($risultato2);

for($i=0;$i<4;$i++)
{
if($contatoreID['id']=="4" || $contatoreIP['ip']=="4")
	{
		echo "<br> Hai gia votato 4 volte!";
		$i=5;
	}
else
	{
		mysqli_query($mysqlConnessione,$queryIns[$i]);
		
	}
}
//header('Location: http://localhost:8080/Mondiali/index.php?page=elencoSquadre');


 ?>