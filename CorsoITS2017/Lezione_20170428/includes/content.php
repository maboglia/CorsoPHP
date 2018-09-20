<?php
 $categoria = isset($_REQUEST['id_cat']) ? $_REQUEST['id_cat'] : false;

if ($categoria)
    $query = "SELECT * FROM posts where id_categoria = $categoria";
else
    $query = "SELECT * FROM posts";

$posts = $DB->select($query);
?>


<div class="blog-header">
    <h1 class="blog-title"><?= TITOLO ?></h1>
    <p class="lead blog-description"><?= SOTTOTITOLO ?></p>
</div>

<div class="row">

    <div class="col-sm-8 blog-main">


<?php while ($row = mysqli_fetch_array($posts)) : ?> 

            <div class="blog-post">
                <h2 class="blog-post-title"><?= $row['titolo'] ?></h2>

                <p class="blog-post-meta"><?= $row['data_post'] ?> by <a href="#">Mauro</a></p>

                <p><?= substr($row['testo'], 0, 200) ?></p>
                <a class="btn btn-primary" href="?view=single&id=<?= $row['id'] ?>">Leggi tutto</a> 
                <a class="btn btn-warning" href="?view=insert&id_post=<?= $row['id'] ?>">Modifica</a> 
                <a class="btn btn-danger" href="?view=delete&id_post=<?= $row['id'] ?>">Elimina</a> 
                <a class="btn btn-danger" onclick="eliminaAjax(<?= $row['id'] ?>)">Elimina Ajax</a> 
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