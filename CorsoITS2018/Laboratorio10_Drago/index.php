<?php
// devo far partire la sessione in cima alla pagina
session_start();
?>

<?php include "view/view_form.php" ?>

<?php include "controller/todo_controller.php" ?>

<?php if(isset($_GET["delete"]))
        include "controller/delete_controller.php";
      else
      {
        echo "qualcosa";
      }
?>


<?php 
    
    //sort($_SESSION["todo"]);

 ?>

<?php include "view/view_elenco.php" ?>
















