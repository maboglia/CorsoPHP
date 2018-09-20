<?php

function stampaelenco()
{
  foreach ($_SESSION['valutazioni'] as $key => $value) {
    echo  $value['serie']. $value['voto']. "<br>";
  }
}
function leggiJson($file){
  $modificato = json_decode($file, true);
  $show=($modificato[0]["show"]);
  foreach ($show as $key => $value) {
    if ($key=="image") {
      //  echo $key. ": ".$value."<br>";
        //var_dump($value);
        // echo"<img src= '".$value['medium']."'>";
        return $value['medium'];
    }
  }
}

 ?>
