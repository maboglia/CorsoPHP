<?php 
	include 'connectionDB.php';

	//Query di inserimento dati nella tabella allenatori
	$nickname = str_replace("'","''",$_POST['username']);
	$password = str_replace("'","''",$_POST['password']);


		$querySQL = "SELECT * FROM `studenti` WHERE nome = '"
				.$nickname."' AND password = '"
				.$password."'";
		$check =mysqli_query($mysqlConnessione, $querySQL) or die("errore nella query:" . mysqli_error());
		$arrayQuery=mysqli_fetch_array($check);
		if(is_array($arrayQuery)){
			$_SESSION['isLogged']=True;
			$_SESSION['idLog'] = $arrayQuery['id_studente'];
			//echo $_SESSION['idLog'];
			header('Location: '.PATH."elencoSquadre");
		}
		else{
			$_SESSION['isLogged']=False;
			echo "Errore, password o username non valido";
		}
	
	


 ?>