<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
<form action="" method="post">
    <input type="text" name="domanda">
    <input type="submit" value="Invia">
</form>


<table>
    <tr><th>#</th><th>Domanda</th><th>Valutazione</th></tr>


    <?php

        $file = fopen("domande/domande.txt", "a+");

        if(isset($_POST['domanda'])) {
            $_SESSION['elenco_domande'][] = $_POST['domanda'];
            #fwrite($file, $_POST['domanda']."\r\n");
        }
        if(isset($_GET['voto'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
            $file_esterno = fopen("valutazione".$ip.".txt","w");
            fwrite($file_esterno, $_GET['voto']."\t".$_GET['domanda']."\r\n");
            fclose($file_esterno);
        }


        $righe = file("domande/domande.txt");
        $i = 0;

        foreach ($righe as $riga){
            if(trim($riga) != '') {
                $i++;
                echo "<tr><td>$i</td><td>$riga</td><td><a href='?voto=$i&domanda=$riga'>vota</a></td></tr>";
            }

        }

        fclose($file);
    ?>


</table>
    </body>
</html>