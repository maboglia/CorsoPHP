
<?php 
    include 'Automobile.php';
    include 'main.php';
    include 'header.php' 

?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Concessionario auto da mauro & rosa</h1>
 
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
