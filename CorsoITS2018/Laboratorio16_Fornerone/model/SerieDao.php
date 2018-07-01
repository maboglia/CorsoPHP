<?php

	include_once "Connessione.php";

	class SerieDao{


		public $connessione;
		public function __construct(){
			$conn = new Connessione();

			$this->connessione = $conn->getConnessione();

		}

		public function inserisciSerie($serie) {
			$serie = $this->connessione->real_escape_string($serie);
			$querySQL = "INSERT INTO serie_tv (nome) VALUES ('$serie')";
			$risultato = $this->connessione->query($querySQL);
			echo "Inserimento riuscito!";
		}

		public function eliminaSerie($id_serie) {
			$id_serie = $this->connessione->real_escape_string($id_serie);
			$querySQL = "DELETE FROM serie_tv where id_serie_tv = $id_serie";
			$risultato = $this->connessione->query($querySQL);
			echo "Record eliminato!<br><br>";
		}

		public function modificaSerie($id_serie, $nome_serie) {
			$id_serie = $this->connessione->real_escape_string($id_serie);
			$querySQL = "UPDATE serie_tv SET nome = '$nome_serie' WHERE id_serie_tv = $id_serie";
			$risultato = $this->connessione->query($querySQL);
			echo "Record modificato!<br><br>";
		}

		public function getAll(){
			$querySQL = "SELECT * from serie_tv";

			$risultato = $this->connessione->query($querySQL) or die("errore nella query:" . $conn->error);
			if($risultato!=NULL) {
				return $risultato;
			}
		}
	}

?>