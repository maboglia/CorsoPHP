<?php
  include "connessione.php";

  $prima=$_POST['prima'];
  $seconda=$_POST['seconda'];
  $terza=$_POST['terza'];
  $quarta=$_POST['quarta'];
  $id = $_SESSION['id'];
  
  $querySQLprimo = "INSERT INTO voti (idStud, idSquad, posizione) VALUES (" . $id . ", " . $prima ." , 1)";
  $risultatoprimo = $conn->query($querySQL) or die("errore nella query:" . $conn->error);

  $querySQLsecondo = "INSERT INTO voti (idStud, idSquad, posizione) VALUES (" . $id . ", " . $seconda ." , 2)";
  $risultatoSecondo = $conn->query($querySQL) or die("errore nella query:" . $conn->error);

  $querySQLterzo = "INSERT INTO voti (idStud, idSquad, posizione) VALUES (" . $id . ", " . $terza ." , 3)";
  $risultatoTerzo = $conn->query($querySQL) or die("errore nella query:" . $conn->error);

  $querySQLquarto = "INSERT INTO voti (idStud, idSquad, posizione) VALUES (" . $id . ", " . $quarta ." , 4)";
  $risultatoQuarto= $conn->query($querySQL) or die("errore nella query:" . $conn->error);



 ?>
