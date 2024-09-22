### Corso PHP: Programma Dettagliato con Ore

**Introduzione:**  
Questo corso di PHP ha l'obiettivo di formare gli studenti su tutti gli aspetti fondamentali della programmazione web con PHP. Attraverso una combinazione di teoria ed esercitazioni pratiche, copriremo argomenti che spaziano dai costrutti base del linguaggio alla programmazione orientata agli oggetti, alla gestione dei dati e all'interazione con il web. Verranno fornite le competenze necessarie per sviluppare applicazioni web dinamiche e sicure, utilizzando anche strumenti avanzati come Composer, PHPUnit, e PDO.

---

### **1. Costrutti del linguaggio** (12 ore)

#### **Variabili, tipi di dati** (4 ore)

Introduzione alla dichiarazione e utilizzo delle variabili. Analisi dei principali tipi di dati in PHP (stringhe, numeri, booleani, array, oggetti), differenze tra tipi primitivi e compositi, e gestione della memoria.

**Esempio:**

```php
<?php
$nome = "Alice";  // Variabile stringa
$eta = 25;        // Variabile numerica intera
$prezzo = 19.99;  // Variabile numerica float
$isAdmin = true;  // Variabile booleana
?>
```

#### **Operatori, espressioni** (4 ore)

Utilizzo di operatori aritmetici, di confronto e logici. Creazione di espressioni complesse e manipolazione dei dati attraverso l'uso degli operatori.

**Esempio:**

```php
<?php
$a = 10;
$b = 5;
$somma = $a + $b;  // Operatore aritmetico
$isGreater = $a > $b;  // Operatore di confronto
$isValid = ($a > $b) && ($b > 0);  // Operatore logico
?>
```

#### **Condizioni, cicli iterativi** (4 ore)

Approfondimento sull'uso delle strutture condizionali `if`, `else`, `elseif`, e dei cicli iterativi `for`, `while`, `foreach` per la gestione dei flussi logici nel codice.

**Esempio:**

```php
<?php
$numero = 10;
if ($numero > 0) {
    echo "Il numero è positivo.";
} else {
    echo "Il numero è negativo o zero.";
}
?>
```

---

### **2. Manipolazione stringhe e array, Funzioni** (8 ore)

#### **Manipolazione di stringhe e array**

Utilizzo delle funzioni built-in di PHP per la gestione delle stringhe e degli array. Funzioni di base per concatenare, suddividere, e manipolare stringhe, e strumenti per ordinare e filtrare array.

**Esempio:**

```php
<?php
$stringa = "Ciao, mondo!";
echo strtoupper($stringa);  // Converti in maiuscolo

$array = [1, 2, 3, 4, 5];
array_push($array, 6);  // Aggiungi un elemento all'array
?>
```

#### **Funzioni**

Creazione di funzioni personalizzate, passaggio di parametri, ritorno di valori, e scope delle variabili all'interno di una funzione.

**Esempio:**

```php
<?php
function somma($a, $b) {
    return $a + $b;
}

echo somma(5, 10);  // Restituisce 15
?>
```

---

### **3. Programmazione ad oggetti in PHP** (8 ore)

Approfondimento della programmazione orientata agli oggetti (OOP) in PHP. Creazione di classi, proprietà, metodi, ereditarietà, e polimorfismo. Introduzione ai principi SOLID per la scrittura di codice ben strutturato.

**Esempio:**

```php
<?php
class Automobile {
    public $marca;
    public $modello;

    public function __construct($marca, $modello) {
        $this->marca = $marca;
        $this->modello = $modello;
    }

    public function descrizione() {
        return "Auto: $this->marca, Modello: $this->modello";
    }
}

$auto = new Automobile("Toyota", "Corolla");
echo $auto->descrizione();
?>
```

---

### **4. Gestione degli errori e delle eccezioni** (4 ore)

Introduzione agli errori in PHP e loro gestione. Uso di `try`, `catch`, `throw` per gestire le eccezioni. Differenza tra errori fatali, avvisi, e notifiche.

**Esempio:**

```php
<?php
try {
    $numero = 10 / 0;
} catch (Exception $e) {
    echo "Errore: " . $e->getMessage();
}
?>
```

---

### **5. Programmazione per il web** (16 ore)

#### **Creazione di API in PHP** (4 ore)

Creazione di semplici API RESTful in PHP, gestione delle richieste HTTP (GET, POST, PUT, DELETE) e invio di risposte in formato JSON.

**Esempio:**

```php
<?php
header("Content-Type: application/json");
$data = ["nome" => "Mario", "cognome" => "Rossi"];
echo json_encode($data);
?>
```

#### **Passaggio di dati e upload di file tramite form** (4 ore)

Gestione dei dati inviati tramite form in POST e GET. Creazione di form con supporto per il caricamento di file.

**Esempio:**

```php
<form method="post" enctype="multipart/form-data">
    Seleziona file: <input type="file" name="fileToUpload">
    <input type="submit" value="Upload">
</form>
```

#### **Utilizzo di Cookie e Sessioni** (4 ore)

Uso dei cookie e delle sessioni per mantenere lo stato dell'utente tra le richieste. Creazione e manipolazione di dati persistenti attraverso sessioni sicure.

**Esempio:**

```php
<?php
session_start();
$_SESSION['utente'] = "Mario";
echo "Sessione avviata per: " . $_SESSION['utente'];
?>
```

#### **Web API REST in JSON** (4 ore)

Approfondimento delle API REST. Utilizzo di PHP per creare servizi che inviano e ricevono dati in formato JSON e interagiscono con il frontend.

**Esempio:**

```php
<?php
$data = ["stato" => "success", "messaggio" => "Richiesta ricevuta"];
echo json_encode($data);
?>
```

---

### **6. Accesso ai dati** (16 ore)

#### **Gestione dei file** (8 ore)

Creazione, lettura, scrittura e manipolazione di file in PHP. Tecniche di lettura di file CSV o JSON e memorizzazione dei dati su disco.

**Esempio:**

```php
<?php
$file = fopen("dati.txt", "r");
while (!feof($file)) {
    echo fgets($file);
}
fclose($file);
?>
```

#### **Accesso ai database (utilizzo di PDO)** (8 ore)

Connessione a database relazionali utilizzando PDO. Esecuzione di query SQL e gestione dei risultati. Protezione dalle SQL injection con prepared statements.

**Esempio:**

```php
<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$stmt = $pdo->prepare("SELECT * FROM utenti WHERE id = :id");
$stmt->execute(['id' => 1]);
$utente = $stmt->fetch();
echo $utente['nome'];
?>
```

---

### **7. Gestione dei progetti in PHP** (8 ore)

#### **Autoloading delle classi e utilizzo di Composer** (4 ore)

Utilizzo di Composer per gestire le dipendenze e implementare l'autoloading delle classi in progetti PHP di grandi dimensioni.

**Esempio:**

```php
// composer.json
{
    "require": {
        "monolog/monolog": "^2.0"
    }
}
```

#### **Unit Test con PHPUnit** (4 ore)

Introduzione ai test unitari con PHPUnit. Creazione di test per verificare il comportamento delle singole parti di un’applicazione.

**Esempio:**

```php
use PHPUnit\Framework\TestCase;

class SommaTest extends TestCase {
    public function testSomma() {
        $this->assertEquals(4, somma(2, 2));
    }
}
?>
```

---

### **8. Preparazione all'esame finale** (8 ore)

#### **Ripasso generale ed esercitazioni sugli argomenti del corso**

Revisione completa dei principali argomenti trattati nel corso. Esercitazioni pratiche per consolidare le competenze acquisite e prepararsi all'esame finale.

---

Questo programma fornisce una preparazione completa per diventare esperti nello sviluppo web con PHP, affrontando ogni aspetto con un giusto equilibrio tra teoria e pratica.
