<?php
include './includes/header.php';
?>

<div class="container">

<?php

//switch viste
$vista = (isset($_REQUEST['view'])) ? $_REQUEST['view'] : 'home';

//main content
switch ($vista) {
    case 'single':
        include './includes/single_post.php';
        break;

    case 'insert':
        include './includes/form.php';
        
        break;
    case 'delete':
        include './includes/eliminaPost.php';
        break;
    case 'new_cat':
        echo 'todo: new_cat';
        break;

    case 'nopost':
        echo 'Non ci sono post con questo id';
    default:
        include './includes/content.php';
        break;
}
//sidebar
include './includes/sidebar.php';
?>

</div>

    <?php
    include './includes/footer.php';





    