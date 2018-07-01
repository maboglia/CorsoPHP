<?php
include "Connessione.php";
	$querySQL = "SELECT * from squadre";
  $risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);

echo "<table>";

  while($row = $risultato->fetch_array(MYSQLI_NUM)){
    $nome = $row[1];
    $bandiera = "<img src= '"  . $row[2] . "' width=150px height=100px alt='img'>";
    echo "<tr><td>".$nome."</td><td>".$bandiera."</td></tr>" ;

    }
echo "</table>";
 ?>
 <form action="votazioni.php" method="post">
 prima classificata<select name="prima">
   <?php
   include "Connessione.php";
   	$querySQL = "SELECT * from squadre";
     $risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);
    while($row = $risultato->fetch_array(MYSQLI_NUM)){
      $id= $row[0];
      $nome= $row[1];
      echo "prima classificata <option value=". $id .">". $nome . "</option>";
    }
    echo "</select>";
    echo "<br><br>";
    ?>

  		seconda classificata<select name="seconda">
         <?php
         include "Connessione.php";
         	$querySQL = "SELECT * from squadre";
           $risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);
          while($row = $risultato->fetch_array(MYSQLI_NUM)){
            $id= $row[0];
            $nome= $row[1];
            echo "<option value=". $id .">". $nome . "</option>";
          }
          echo "</select>";
          echo "<br><br>";
          ?>


          terza classificata<select name="terza">
            <?php
            include "Connessione.php";
            	$querySQL = "SELECT * from squadre";
              $risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);
             while($row = $risultato->fetch_array(MYSQLI_NUM)){
               $id= $row[0];
               $nome= $row[1];
               echo "<option value=". $id .">". $nome . "</option>";
             }
             echo "</select>";
             echo "<br><br>";
             ?>
             quarta classificata<select name="quarta">
               <?php
               include "Connessione.php";
               	$querySQL = "SELECT * from squadre";
                 $risultato = $conn->query($querySQL) or die("errore nella query:" . $conn->error);
                while($row = $risultato->fetch_array(MYSQLI_NUM)){
                  $id= $row[0];
                  $nome= $row[1];
                  echo "<option value=". $id .">". $nome . "</option>";
                }
                echo "</select>";
                echo "<br><br>";
                ?>
                <input type="submit" name="invia votazioni">
                 </form>
