<?php
$query = "SELECT * FROM categorie order by categoria";

$elencocategorie = $DB->select($query);
?>
<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    <div class="sidebar-module">
        <h4>Argomenti del blog</h4>
        <ol class="list-unstyled">

            <?php while ($row = mysqli_fetch_array($elencocategorie)) : ?>                
                <li><a href="index.php?id_cat=<?= $row['id_categoria'] ?>"><?= $row['categoria'] ?></a></li>
            <?php endwhile; ?>

        </ol>
    </div>
</div><!-- /.blog-sidebar -->

