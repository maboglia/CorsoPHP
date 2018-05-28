<?php session_start() ?>

<ul>
    <?php foreach($_SESSION["todo"] as $todo):?>  <!-- equivalente del forEach (alternative syntax) -->
        <li>
        <a href="?delete=<?=$todo?>">
            <?=$todo?> <!-- equivalente dell'echo -->
        </li>

    <!-- foreach ($_SESSION["todos"] as $todo) {
        
        echo "<li>" . $todo . "</li>";
        echo "<br>";
    } -->

    <?php endforeach;?>
</ul>

