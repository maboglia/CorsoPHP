      <div class="blog-header">
        <h1 class="blog-title">The PHP Programming Blog</h1>
        <p class="lead blog-description">The PHP Programming official .</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">


            <?php while ($row = mysqli_fetch_array($posts)) : ?> 


            
            
          <div class="blog-post">
            <h2 class="blog-post-title"><?=$row['titolo']?></h2>
            <p class="blog-post-meta"><?=  formattaData($row['data_post'])?> by <a href="#">Mauro</a></p>

            <p><?= htmlspecialchars(substr($row['testo'],0,120))?></p>
            <p><a href="index.php?id_post=<?=$row['id']?>" class="btn btn-primary" >Leggi tutto</a></p>
            <hr>
            
          </div><!-- /.blog-post -->

          <?php endwhile;?>

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->