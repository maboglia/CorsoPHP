<?php 

include 'studenti_db_3.php';

//qui apro la tabella
echo "<table class='table table-striped'>";
	echo "<tr>";

	echo "<th class='cella_intestazione'>nome</th>";
	echo "<th class='cella_intestazione'>cognome</th>";
	echo "<th class='cella_intestazione'>anno</th>";
	echo "<th class='cella_intestazione'>età</th>";


	//qui chiudo la riga dello studente
	echo "</tr>";
//echo "Hello, World!" 
for ($i=0; $i < count($studenti); $i++) { 


	//per ogni studente
	//mi ritorna un array di 3 posizioni:
	// $studenti[$i] rappresenta lo studente corrente dell'array $studenti
	// $studenti[$i][0] ritorna il cognome
	// $studenti[$i][1] ritorna il nome
	// $studenti[$i][2] ritorna l'anno

	//estraggo l'anno (è il terzo valore dell'array)
	$anno = $studenti[$i][2];
	//calcolo l'età
	$eta = date("Y") - $anno;

	//stampo a video la riga dello studente
	echo "<tr>";

	$cognome= $studenti[$i][0];
	$nome= $studenti[$i][1];


	echo "<td class='cella'>".  $cognome . "</td>";
	echo "<td class='cella'>".  $nome . "</td>";
	echo "<td class='cella'>" . $anno . "</td>";
	echo "<td class='cella'>". $eta . "</td>";


	//qui chiudo la riga dello studente
	echo "</tr>";
}
//qui chiudo la tabella
echo "</table>";

?>