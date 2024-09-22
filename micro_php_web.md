### Corso PHP: Programma e Introduzione

**Introduzione:**
Il linguaggio PHP (Hypertext Preprocessor) è uno degli strumenti più utilizzati per lo sviluppo di applicazioni web dinamiche. La sua sintassi è semplice e adatta sia a chi inizia a programmare, sia a sviluppatori esperti. Questo corso mira a fornire una solida base nella programmazione con PHP, esplorando concetti chiave come i costrutti del linguaggio, la gestione dei dati, la programmazione ad oggetti, la gestione di file e database, fino alla costruzione di applicazioni web complesse.

### Programma del corso

---

#### **1. Programmazione e PHP**

- Introduzione alla programmazione e al PHP
- Installazione e configurazione dell’ambiente di sviluppo
- Differenze tra linguaggi lato server e lato client

   **Esempio:**

   ```php
   <?php
   echo "Ciao, mondo!"; // Il primo programma in PHP
   ?>
   ```

---

#### **2. Costrutti del linguaggio**

- Variabili, tipi di dati, operatori, ed espressioni
- Uso delle costanti e gestione delle espressioni

   **Esempio:**

   ```php
   <?php
   $numero = 10;
   $somma = $numero + 5;
   echo "La somma è: $somma";
   ?>
   ```

---

#### **3. Condizioni, cicli iterativi, gestione stringhe, array e funzioni**

- Condizionali `if`, `else`, `switch`
- Cicli `for`, `while`, `foreach`
- Manipolazione di stringhe e array
- Creazione e utilizzo di funzioni

   **Esempio:**

   ```php
   <?php
   $nome = "Giovanni";
   if ($nome == "Giovanni") {
       echo "Benvenuto Giovanni!";
   }
   ?>
   ```

---

#### **4. Programmazione ad oggetti in PHP**

- Creazione di classi e oggetti
- Ereditarietà e polimorfismo
- Metodi e proprietà

   **Esempio:**

   ```php
   <?php
   class Persona {
       public $nome;
       public function __construct($nome) {
           $this->nome = $nome;
       }
       public function saluta() {
           return "Ciao, " . $this->nome;
       }
   }

   $persona = new Persona("Luca");
   echo $persona->saluta();
   ?>
   ```

---

#### **5. Gestione degli errori e delle eccezioni**

- Introduzione al concetto di errore ed eccezione
- Uso di `try`, `catch`, `finally` per gestire eccezioni

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

#### **6. Programmazione per il web**

- Gestione dei dati in GET e POST
- Creazione di form e upload di file
- Utilizzo di Cookie e Sessioni
- Introduzione alle Web API REST e uso del formato JSON

   **Esempio:**

   ```php
   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $nome = $_POST["nome"];
       echo "Nome inserito: $nome";
   }
   ?>
   <form method="POST">
       Nome: <input type="text" name="nome">
       <input type="submit" value="Invia">
   </form>
   ```

---

#### **7. Accesso ai dati**

- Gestione dei file: apertura, lettura e scrittura
- Connessione ai database con PDO (PHP Data Objects)
- Esecuzione di query SQL e gestione dei risultati

   **Esempio:**

   ```php
   <?php
   $dsn = 'mysql:host=localhost;dbname=test';
   $username = 'root';
   $password = '';
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query("SELECT * FROM utenti");
   foreach ($stmt as $row) {
       echo $row['nome'] . "<br>";
   }
   ?>
   ```

---

#### **8. Gestione dei progetti in PHP**

- Autoloading delle classi con Composer
- Introduzione ai test automatici con PHPUnit
- Architettura MVC (Model-View-Controller) con esempi pratici

   **Esempio:**

   ```php
   // Autoload delle classi con Composer
   require 'vendor/autoload.php';
   ```

---

#### **9. Preparazione all'esame finale**

- Ripasso generale degli argomenti trattati
- Esercitazioni pratiche su tutti gli argomenti del corso

---

Questo programma ti fornirà una visione completa delle principali funzionalità e delle best practices per lo sviluppo di applicazioni web dinamiche con PHP.
