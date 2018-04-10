<?php 
  //includo la classe auutomobile
    include 'Automobile.php';

  //genero 100 oggetti di tipo automobile

//    include 'main.php';
    //include 'auto100.api.php';
    include 'auto200.api.php';
    //include la testata di pagina
    include 'header.php' 

?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Concessionario auto da mauro &amp; rosa</h1>
 
     </div>
    <table class="table table-hover">
          <tr>
            <th>marca</th>
            <th>modello</th>
            <th>cilindrata</th>
            <th>colore</th>
          </tr>

      <?php foreach ($concessionario as $auto) : ?>
        
          <tr>
            <td><?= $auto->marca ?></td>
            <td><?= $auto->modello ?></td>
            <td><?= $auto->cilindrata ?></td>
            <td><?= $auto->colore ?></td>
          </tr>

      <?php endforeach; ?>


    </table>


    </div> <!-- /container -->

<?php include 'footer.php' ?>
