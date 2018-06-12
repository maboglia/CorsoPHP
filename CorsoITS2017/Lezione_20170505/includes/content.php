<?php
$categoria = isset($_REQUEST['id_cat']) ? $_REQUEST['id_cat'] : false;

$order = " order by data_post desc ";

if ($categoria)
    $query = "SELECT * FROM posts where id_categoria = $categoria  $order";
else
    $query = "SELECT * FROM posts $order";

$posts = $DB->select($query);
?>


    <div class="col-sm-8 blog-main">


<?php while ($row = mysqli_fetch_array($posts)) : ?> 

    <div class="blog-post">
        <h2 class="blog-post-title"><?= $row['titolo'] ?></h2>
        <p class="blog-post-meta"><?= formattaData($row['data_post']) ?> by <a href="#">Mauro</a></p>

        <p><?= htmlspecialchars(substr($row['testo'], 0, 150)) ?> ... </p>
        <p>
            <a href="?view=single&id_post=<?= $row['id'] ?>" class="btn btn-primary">Leggi tutto</a>
            <a href="?view=modifica&id_post=<?= $row['id'] ?>" class="btn btn-warning">Modifica</a>
            <a href="?view=elimina&id_post=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
        </p>
        <hr>

    </div><!-- /.blog-post -->

<?php endwhile; ?>
        <nav>
            <ul class="pager">
                <li><a href="#">Previous</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </nav>

    </div><!-- /.blog-main -->