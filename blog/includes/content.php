<?php
$categoria = isset($_REQUEST['id_cat']) ? $_REQUEST['id_cat'] : false;
$paginazione = isset($_REQUEST['start']) ? $_REQUEST['start'] : 1;
$start = $paginazione ?  ($paginazione - 1) * MAX_POST_PAGE : 0;

$order = " order by data_post desc ";
$limite = " limit $start ,".MAX_POST_PAGE."  ";

$query =  "SELECT * FROM posts ";

if ($categoria)
    $query .= " where id_categoria = $categoria ";

$numero_post = $DB->numRecord($query);

$query .= $order;

$query .= $limite;

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
    
<?php if($numero_post > 10) :?>    
        <nav>
            <ul class="pager">
                
            <?php if($start > 0) :?>    
                <li><a href="<?php 
                    $prev= $paginazione - 1; 

                    echo $_SERVER['PHP_SELF'].
                        "?id_cat=".$categoria."&start=".$prev
                         ?>">Previous</a></li>
            <?php endif; ?>
            
            <?php if( ( $numero_post - $start - MAX_POST_PAGE ) > 0  ) :?>    
                
                <li>
                    <a onclick="salutamm('<?= $numero_post?>')" href="<?php 
                    $next= $paginazione + 1; 

                    echo $_SERVER['PHP_SELF'].
                        "?id_cat=".$categoria."&start=".$next
                         ?>">Next</a>
                </li>
            <?php endif; ?>

            </ul>
        </nav>
<?php endif; ?>
    
    </div><!-- /.blog-main -->