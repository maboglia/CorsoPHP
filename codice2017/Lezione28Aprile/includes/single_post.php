<?php


$query = "SELECT * FROM posts where id=".$_REQUEST['id'];

$posts = $DB->select($query);

if (!$posts)
    header('Location: index.php?view=nopost');


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

                <p><?= ($row['testo']) ?></p>

            </div><!-- /.blog-post -->

        <?php endwhile; ?>

        <nav>
            <ul class="pager">
                <li><a href="#">Previous</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </nav>

    </div><!-- /.blog-main -->
