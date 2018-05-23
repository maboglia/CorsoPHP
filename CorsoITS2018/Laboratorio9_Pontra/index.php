<?php
// devo far partire la sessione in cima alla pagina
session_start();
?>

<?php

$todoItem = (isset ($_REQUEST["todoText"])) ? $_REQUEST["todoText"] : "" ;

if(trim($todoItem)!="") {//trim toglie gli spazi vuoti


$_SESSION["todos"][] = $todoItem;
}
else {echo "caratteere non valido";}
?>

<ul>
    <?php foreach($_SESSION["todos"] as $todo):?>  <!-- equivalente del forEach (alternative syntax) -->
        <li>
            <?=$todo?> <!-- equivalente dell'echo -->
        </li>

    <!-- foreach ($_SESSION["todos"] as $todo) {
        
        echo "<li>" . $todo . "</li>";
        echo "<br>";
    } -->

    <?php endforeach;?>
</ul>















