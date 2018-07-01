<?php
    include "carica_squadre.php";

    if ($_SESSION['isLogged'] == true) {
      foreach ($squadre as $squadra) {
?>
          <table>
            <th><a href="#"><?= $squadra; ?></a><br></th>
          </table>
<?php
      }
    }
    else {
      echo "devi accedere alla pagina di login per votare la tua squadra!";
    }
?>
