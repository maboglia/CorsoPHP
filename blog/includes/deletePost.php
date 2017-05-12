<?php

if (!$_SESSION['admin']) die("Ehi tu!! Non puoi eliminare!");

$id = mysqli_real_escape_string($DB->link,$_REQUEST['id_post']);
$query = "delete from posts where id = $id";

$DB->delete($query);

