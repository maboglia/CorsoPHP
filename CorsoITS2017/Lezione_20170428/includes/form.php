<?php

if (isset($_POST['btnInsert'])){
    $titolo = mysqli_real_escape_string($DB->link,$_POST['titolo']);
    $testo = mysqli_real_escape_string($DB->link,$_POST['testo']);
    $cat = mysqli_real_escape_string($DB->link,$_POST['id_cat']);
//    $autore = mysqli_real_escape_string($DB->link,$_POST['autore']);
    
    //per l'immagine
//    $img = $_FILES['image']['name'];
//    $img_tmp = $_FILES['image']['tmp_ name'];
    
    if ($titolo=='' || $testo==''){
        echo "<h1>inserisci titolo e testo</h1>";
    }
    else{
        echo $query="INSERT INTO posts (titolo, testo, id_categoria) values ('$titolo', '$testo', $cat) ";
        $DB->insert($query);
    }
    
    
}


if (isset($_POST['btnUpdate'])){
    $titolo = mysqli_real_escape_string($DB->link,$_POST['titolo']);
    $testo = mysqli_real_escape_string($DB->link,$_POST['testo']);
    $cat = mysqli_real_escape_string($DB->link,$_POST['id_cat']);
    $id = mysqli_real_escape_string($DB->link,$_POST['id_post']);
//    $autore = mysqli_real_escape_string($DB->link,$_POST['autore']);
    
    //per l'immagine
//    $img = $_FILES['image']['name'];
//    $img_tmp = $_FILES['image']['tmp_ name'];
    
    if ($titolo=='' || $testo==''){
        echo "<h1>inserisci titolo e testo</h1>";
    }
    else{
        echo $query="UPDATE posts set titolo='$titolo', testo='$testo', id_categoria=$cat where id=$id ";
        $DB->update($query);
    }
    
    
}



$id = isset($_REQUEST['id_post']) ? $_REQUEST['id_post'] : false;

if ($id) {
    $query = "SELECT * FROM posts where id = $id";

    $posts = $DB->select($query);
}
?>


<div class="blog-header">
    <h1 class="blog-title"><?= TITOLO ?></h1>
    <p class="lead blog-description"><?= SOTTOTITOLO ?></p>
</div>

<div class="row">

    <div class="col-sm-8 blog-main">


        <?php if(isset($posts)) $row = mysqli_fetch_array($posts); ?> 
        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>?view=insert">
            <input type="hidden" name="id_post" value="<?=isset($row)? $row['id']:'' ?>"/>
            <div class="form-group">
                <label for="titolo">titolo</label>
                <input type="titolo" class="form-control" id="titolo" placeholder="titolo" name="titolo" value="<?=isset($row)? $row['titolo']:'' ?>"/>
            </div>
            <div class="form-group">
                <label for="testo">testo</label>
                <textarea class="form-control" name="testo" placeholder="testo"><?=isset($row)? $row['testo']:'' ?></textarea>
            </div>
            <div class="form-group">
                <label for="img">immagine</label>
                <input type="file" id="img">
                <p class="help-block">Carica una immagine dal tuo archivio.</p>
            </div>
            <div class="form-group">
                <select name="id_cat">
                    <option value="1">PHP</option>
                    <option value="2">JAVA</option>
                </select> 
            </div>
            <?php if (isset($row)): ?>
            <button type="submit" name="btnUpdate" class="btn btn-default">Modifica</button>
            <?php else : ?>
            <button type="submit" name="btnInsert" class="btn btn-default">Inserisci</button>
            <?php endif; ?>
            
        </form>
        <?php ?>

    </div><!-- /.blog-main -->