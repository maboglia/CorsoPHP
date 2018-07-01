<?php

  header("Location: config.php");

  $query = "select * from squadre;";
  $result = mysqli_query($mySQLconn, $query);
//inserendo elenco squadre in array
    while($tmp = mysqli_fetch_array($result)){
      $squadre[] = $tmp['nome'];
    }
