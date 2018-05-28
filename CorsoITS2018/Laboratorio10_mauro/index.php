<?php
// devo far partire la sessione in cima alla pagina
session_start();

if (isset($_GET['session'])){

    unset($_SESSION['todos']);

}
/*
if (isset($_GET['pagina']))
echo "è passato via GET";
if (isset($_POST['pagina']))
echo "è passato via POST";
if (isset($_REQUEST['pagina']))
echo "è passato via REQUEST";
*/

foreach ($_SERVER as $key => $value) {
    if (is_array($value))
        foreach ($value as $cosadafare) {
            echo $cosadafare."<br>";
        }
    echo $key . ": " . $value;

    echo "<br>";
}

?>

<form action="" method="POST">
    <input type="text" name="todoText" placeholder="scrivi qualcosa">
    <input type="text" name="pagina" placeholder="scrivi qualcosa">
    <input type="submit" value="Inserisci">
</form>

<a class="btn btn-primary" href="?session=destroy">Reset</a>

<a class="btn btn-primary" href="?<?= $_SERVER['QUERY_STRING']?>">Test GET</a>


<?php

$todoItem = (isset ($_REQUEST["todoText"])) ? $_REQUEST["todoText"] : "" ;

$_SESSION["todos"][] = $todoItem;
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















