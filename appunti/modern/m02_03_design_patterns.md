## Scheda pratica (Corso PHP)

# 2.3 Design Pattern essenziali in PHP

## Repository, Factory, Strategy, Facade (con esempi da corso)

Obiettivo: imparare i pattern fondamentali usati in progetti PHP reali (Laravel/Symfony-style) per scrivere codice **pulito, estendibile e manutenibile**.

---

# 1) Concetto chiave: cos’è un Design Pattern?

Un Design Pattern è una soluzione standard a un problema ricorrente.

📌 In pratica: sono “modelli di progettazione” che evitano:

* classi gigantesche
* codice duplicato
* dipendenze rigide
* modifiche a catena quando cambia un requisito

---

# 2) Repository Pattern (accesso ai dati pulito)

## Problema

Se metti query SQL dentro Controller o Service, ottieni caos:

* codice sporco
* difficile testare
* difficile cambiare DB

---

## Soluzione: Repository

Il Repository incapsula l’accesso ai dati (DB, JSON, API).

### Interfaccia

```php
<?php
declare(strict_types=1);

interface StudenteRepositoryInterface {
    public function findById(int $id): ?StudenteDTO;
    public function findAll(): array;
    public function save(StudenteDTO $dto): void;
}
```

### Implementazione MySQL (PDO)

```php
class StudenteRepositoryPDO implements StudenteRepositoryInterface {

    public function __construct(private PDO $pdo) {}

    public function findById(int $id): ?StudenteDTO {
        $stmt = $this->pdo->prepare("SELECT * FROM studenti WHERE id = ?");
        $stmt->execute([$id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new StudenteDTO(
            (int)$row["id"],
            $row["nome"],
            $row["email"]
        );
    }

    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM studenti");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            $result[] = new StudenteDTO(
                (int)$row["id"],
                $row["nome"],
                $row["email"]
            );
        }
        return $result;
    }

    public function save(StudenteDTO $dto): void {
        $stmt = $this->pdo->prepare(
            "INSERT INTO studenti(nome, email) VALUES(?, ?)"
        );
        $stmt->execute([$dto->nome, $dto->email]);
    }
}
```

---

## Service che usa Repository (pulito)

```php
class StudenteService {

    public function __construct(
        private StudenteRepositoryInterface $repo
    ) {}

    public function getStudente(int $id): ?StudenteDTO {
        return $this->repo->findById($id);
    }
}
```

✅ Controller e Service non conoscono SQL
✅ il DB può cambiare senza cambiare il resto del progetto

---

# 3) Factory Pattern (creazione oggetti centralizzata)

## Problema

Se istanzi oggetti in giro per il codice, diventa ingestibile:

```php
$mailer = new Mailer("smtp.test.it", 587, true);
```

Ripetuto ovunque = disastro.

---

## Soluzione: Factory

Una Factory crea oggetti complessi per te.

### Esempio: ConnectionFactory per PDO

```php
class ConnectionFactory {

    public static function createPDO(): PDO {
        $host = "localhost";
        $db = "scuola";
        $user = "root";
        $pass = "root";

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}
```

Uso:

```php
$pdo = ConnectionFactory::createPDO();
$repo = new StudenteRepositoryPDO($pdo);
```

---

## Vantaggio reale

* centralizzi configurazione
* cambi DB in un solo punto
* riutilizzi codice
* utile in CLI e Web

---

# 4) Strategy Pattern (comportamenti intercambiabili)

## Problema

Hai tante condizioni `if/else` per gestire comportamenti diversi:

```php
if ($tipo === "pdf") { ... }
else if ($tipo === "csv") { ... }
else if ($tipo === "json") { ... }
```

Se aggiungi un tipo, devi modificare il codice → violi il principio OCP.

---

## Soluzione: Strategy

Definisci una strategia (interfaccia) e tante implementazioni.

---

### Interfaccia Strategy

```php
interface ExportStrategyInterface {
    public function export(array $dati): string;
}
```

### Strategia CSV

```php
class CsvExportStrategy implements ExportStrategyInterface {

    public function export(array $dati): string {
        $out = "";

        foreach ($dati as $row) {
            $out .= implode(";", $row) . "\n";
        }

        return $out;
    }
}
```

### Strategia JSON

```php
class JsonExportStrategy implements ExportStrategyInterface {

    public function export(array $dati): string {
        return json_encode($dati, JSON_PRETTY_PRINT);
    }
}
```

---

### Context (classe che usa la Strategy)

```php
class ExportService {

    public function __construct(
        private ExportStrategyInterface $strategy
    ) {}

    public function esporta(array $dati): string {
        return $this->strategy->export($dati);
    }
}
```

Uso:

```php
$dati = [
    ["id" => 1, "nome" => "Mario"],
    ["id" => 2, "nome" => "Anna"]
];

$service = new ExportService(new JsonExportStrategy());
echo $service->esporta($dati);

$service2 = new ExportService(new CsvExportStrategy());
echo $service2->esporta($dati);
```

✅ aggiungere una nuova export strategy non richiede modifiche al service
✅ codice pulito e scalabile

---

# 5) Facade Pattern (interfaccia semplice a sistema complesso)

## Problema

Alcuni sottosistemi richiedono troppi passaggi:

* validazione
* repository
* log
* invio mail
* generazione token

Se li gestisci nel Controller → Controller diventa enorme.

---

## Soluzione: Facade

Una Facade offre un punto unico di accesso semplice.

---

### Esempio: Registrazione utente senza Facade (brutto)

```php
$validator->check($data);
$userRepo->save($user);
$logService->info("utente creato");
$mailService->sendWelcomeMail($user);
$tokenService->generateToken($user);
```

---

### Con Facade (pulito)

```php
$registrazioneFacade->registraUtente($data);
```

---

### Implementazione Facade

```php
class RegistrazioneFacade {

    public function __construct(
        private ValidatorService $validator,
        private UtenteRepositoryInterface $repo,
        private MailService $mail,
        private LogService $log
    ) {}

    public function registraUtente(array $data): void {

        $this->validator->validaRegistrazione($data);

        $utente = new UtenteDTO(
            id: 0,
            username: $data["username"],
            email: $data["email"]
        );

        $this->repo->save($utente);

        $this->log->info("Creato utente: " . $utente->username);

        $this->mail->sendWelcomeMail($utente->email);
    }
}
```

---

## Uso in Controller (perfetto)

```php
class UtenteController {

    public function __construct(
        private RegistrazioneFacade $facade
    ) {}

    public function registra(): void {
        $data = $_POST;
        $this->facade->registraUtente($data);
        echo "Registrazione completata!";
    }
}
```

✅ Controller minimal
✅ logica organizzata
✅ più facile da testare

---

# 6) Schema mentale da ricordare (in 10 secondi)

### Repository

👉 “dove prendo/salvo i dati”

### Factory

👉 “come creo oggetti complessi”

### Strategy

👉 “come cambio comportamento senza if/else”

### Facade

👉 “come semplifico un sistema complesso”

---

# 7) Mini esercitazione completa (da corso)

## Obiettivo

Sistema esportazione studenti + repository + factory.

### Specifiche

* Repository per leggere studenti
* Strategy per esportazione CSV o JSON
* Facade per fornire un metodo unico `esportaStudenti()`
* Factory per creare PDO

---

### Facade finale (core dell’esercizio)

```php
class ExportStudentiFacade {

    public function __construct(
        private StudenteRepositoryInterface $repo,
        private ExportStrategyInterface $strategy
    ) {}

    public function esportaStudenti(): string {
        $studenti = $this->repo->findAll();

        $dati = [];
        foreach ($studenti as $s) {
            $dati[] = [
                "id" => $s->id,
                "nome" => $s->nome,
                "email" => $s->email
            ];
        }

        return $this->strategy->export($dati);
    }
}
```

Uso:

```php
$pdo = ConnectionFactory::createPDO();
$repo = new StudenteRepositoryPDO($pdo);

$strategy = new JsonExportStrategy();
// oppure CsvExportStrategy

$facade = new ExportStudentiFacade($repo, $strategy);

echo $facade->esportaStudenti();
```

---

# 8) Checklist finale (da ricordare)

✅ Repository: SQL fuori dal Service
✅ Factory: oggetti complessi creati in un punto solo
✅ Strategy: eliminare catene if/else
✅ Facade: Controller pulito, API semplici
✅ tutti i pattern aumentano testabilità e manutenzione

---

# 9) Quiz rapido (fine lezione)

1. Repository serve a separare cosa?
2. Factory è utile soprattutto quando?
3. Strategy sostituisce quale antipattern tipico?
4. Facade semplifica cosa?
5. Quale pattern useresti per cambiare esportazione PDF/CSV/JSON senza modificare il codice esistente?
