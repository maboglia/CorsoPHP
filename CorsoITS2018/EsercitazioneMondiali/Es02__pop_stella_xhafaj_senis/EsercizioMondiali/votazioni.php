<?php
  session_start();
  include "connessione.php";

  $prima=$_POST['prima'];
  $seconda=$_POST['seconda'];
  $terza=$_POST['terza'];
  $quarta=$_POST['quarta'];
  $id = $_SESSION['id'];

  $querySQL = "select * from voti where idStud=" . $id ."";
  $risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);
  $ris = mysqli_num_rows($risultato);
  	if ($ris == 0){
  $querySQLprimo = "INSERT INTO voti (idStud, idSquad, posizione) VALUES ('" . $id . "', " . $prima ." ,1)";
  $risultatoprimo = $conn->query($querySQLprimo) or die("errore nella query:" . $conn->error);

  $querySQLsecondo = "INSERT INTO voti (idStud, idSquad, posizione) VALUES ('" . $id . "', " . $seconda ." , 2)";
  $risultatoSecondo = $conn->query($querySQLsecondo) or die("errore nella query:" . $conn->error);

  $querySQLterzo = "INSERT INTO voti (idStud, idSquad, posizione) VALUES ('" . $id . "', " . $terza ." , 3)";
  $risultatoTerzo = $conn->query($querySQLterzo) or die("errore nella query:" . $conn->error);

  $querySQLquarto = "INSERT INTO voti (idStud, idSquad, posizione) VALUES ('" . $id . "', " . $quarta ." , 4)";
  $risultatoQuarto= $conn->query($querySQLquarto) or die("errore nella query:" . $conn->error);
}
else{
  echo "hai gia votato! non puoi votare più volte <br><br>";
}
echo "RISULTATI VOTAZIONI:<br><br>";
echo "campioni Russia 2018<br><br>";

$querySQL = "SELECT nomeSquadra, COUNT(posizione) maximum, bandiera  from voti inner join squadre on idsquad=idSquadra where posizione=1 group by nomeSquadra  ORDER BY maximum DESC LIMIT 1";
$risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);
echo "<table>";

while($row = $risultato->fetch_array(MYSQLI_NUM)){
  $nome = $row[0];
  $votazioni = $row[1];
  $bandiera = "<img src= '"  . $row[2] . "' width=60px height=40px alt='img'>";
    
  echo "<tr><td>".$bandiera."</td><td>". $nome ."</td>"."<td>".$votazioni."</td></tr>" ;
  }
echo "</table>";
echo "<br><br>";

echo "secondi classificati Russia 2018<br><br>";

$querySQL = "SELECT nomeSquadra, COUNT(posizione) maximum, bandiera  from voti inner join squadre on idsquad=idSquadra where posizione=2 group by nomeSquadra  ORDER BY maximum DESC LIMIT 1";
$risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);

echo "<table>";

while($row = $risultato->fetch_array(MYSQLI_NUM)){
  $nome = $row[0];
  $votazioni = $row[1];
  $bandiera = "<img src= '"  . $row[2] . "' width=60px height=40px alt='img'>";
    
  echo "<tr><td>".$bandiera."</td><td>". $nome ."</td>"."<td>".$votazioni."</td></tr>" ;

  }
echo "</table>";
echo "<br><br>";

echo "terzo posto Russia 2018<br><br>";

$querySQL = "SELECT nomeSquadra, COUNT(posizione) maximum, bandiera  from voti inner join squadre on idsquad=idSquadra where posizione=3 group by nomeSquadra  ORDER BY maximum DESC LIMIT 1";
$risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);

echo "<table>";

while($row = $risultato->fetch_array(MYSQLI_NUM)){
  $nome = $row[0];
  $votazioni = $row[1];
  $bandiera = "<img src= '"  . $row[2] . "' width=60px height=40px alt='img'>";
    
  echo "<tr><td>".$bandiera."</td><td>". $nome ."</td>"."<td>".$votazioni."</td></tr>" ;

  }

echo "</table>";
echo "<br><br>";

echo "quarto posto Russia 2018<br><br>";

$querySQL = "SELECT nomeSquadra, COUNT(posizione) maximum, bandiera  from voti inner join squadre on idsquad=idSquadra where posizione=4 group by nomeSquadra  ORDER BY maximum DESC LIMIT 1";
$risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);

echo "<table>";

while($row = $risultato->fetch_array(MYSQLI_NUM)){
  $nome = $row[0];
  $votazioni = $row[1];
  $bandiera = "<img src= '"  . $row[2] . "' width=60px height=40px alt='img'>";
    
  echo "<tr><td>".$bandiera."</td><td>". $nome ."</td>"."<td>".$votazioni."</td></tr>" ;
  }
echo "</table>";
echo "<br><br>";

 ?>
