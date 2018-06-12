<?php 

$mysqlConnessione = new mysqli("localhost", "root", "","php2018");

 if (mysqli_connect_errno()){
 	echo "c'è stato un problema con la connessione:" . mysqli_connect_error();
 }







 ?>