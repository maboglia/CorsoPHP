<?php 

$mysqlConnessione = new mysqli("localhost", "root", "","mondiale");
 if (mysqli_connect_errno()){
 	echo "c'è stato un problema con la connessione:" . mysqli_connect_error();
 }



 ?>