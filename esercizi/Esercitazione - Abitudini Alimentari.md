# Esercitazione: Crea un'App per Tracciare le Abitudini Alimentari

**Obiettivi dell'esercitazione:**
In questa esercitazione, svilupperai un'applicazione web in PHP 8 utilizzando il pattern MVC, la programmazione orientata agli oggetti (OOP), namespace, file upload, sessioni, REST API, MySQL, e PDO. L'app sarà progettata per permettere agli utenti di registrare e monitorare le loro abitudini alimentari quotidiane.

---

### Funzionalità richieste

1. **Registrazione e Login:**
   - Gli utenti devono potersi registrare e fare login per accedere al proprio profilo e monitorare le abitudini alimentari.
   - Le credenziali devono essere memorizzate in modo sicuro utilizzando una password hashata.

2. **Gestione delle Sessioni:**
   - Gestisci le sessioni per mantenere gli utenti autenticati e garantire che solo gli utenti loggati possano accedere ai dati personali.

3. **Tracciamento dei Pasti:**
   - Gli utenti devono poter aggiungere, modificare e visualizzare i pasti consumati durante la giornata.
   - Ogni pasto deve contenere: nome, data, orario, calorie, categoria (colazione, pranzo, cena, spuntino).

4. **File Upload per Immagini dei Pasti:**
   - Gli utenti devono poter caricare immagini dei pasti consumati.

5. **REST API:**
   - Crea una REST API che permetta di:
     - Recuperare l'elenco dei pasti in formato JSON.
     - Aggiungere, modificare e cancellare i pasti tramite richieste HTTP.

6. **Dashboard Statistiche:**
   - Implementa una dashboard che mostri statistiche sugli alimenti consumati, come il numero di pasti registrati e l’apporto calorico totale giornaliero.

7. **Gestione Utenti:**
   - Crea un modulo per gestire il profilo utente (nome, email, obiettivi nutrizionali, ecc.).

---

### Requisiti Tecnici

- **PHP 8:**
  Utilizza le ultime funzionalità di PHP 8, inclusi i *named arguments*, *union types*, e il supporto per *match*.

- **MVC (Model-View-Controller):**
  Implementa l'architettura MVC per separare la logica di business (Model), la gestione delle richieste (Controller), e l’interfaccia utente (View).

- **OOP e Namespace:**
  Organizza il codice utilizzando la programmazione orientata agli oggetti, con classi per gestire utenti, pasti, sessioni, e database. Utilizza namespace per strutturare meglio il codice.

- **File Upload:**
  Gestisci il caricamento delle immagini dei pasti, salvandole in una directory del server e memorizzando il percorso nel database.

- **REST API:**
  Implementa una REST API che consenta operazioni CRUD sui pasti, ritornando le informazioni in formato JSON.

- **Sessioni:**
  Usa sessioni per gestire l’autenticazione dell'utente e proteggerne i dati.

- **MySQL e PDO:**
  Utilizza MySQL per il database e PDO per interagire con esso in modo sicuro. Implementa operazioni di prepared statements per prevenire SQL injection.

---

### Struttura del Progetto

1. **Directory Principale del Progetto:**
   - `/app` — Contiene i controller, modelli e le viste.
   - `/public` — Contiene i file pubblici come index.php, file CSS, immagini, e file caricati.
   - `/config` — Configurazione del database e impostazioni generali.
   - `/vendor` — Composer dependencies.

2. **Modelli OOP:**
   - **User:** Gestisce la registrazione, login, e aggiornamento del profilo utente.
   - **Meal:** Gestisce l’aggiunta, modifica, cancellazione e recupero dei pasti.
   - **Session:** Gestisce l’autenticazione dell’utente e le sessioni attive.

3. **Controller:**
   - **UserController:** Gestisce le operazioni legate agli utenti (registrazione, login, gestione profilo).
   - **MealController:** Gestisce le operazioni legate ai pasti (aggiunta, visualizzazione, modifica, cancellazione).
   - **ApiController:** Gestisce le richieste REST per l’API.

4. **Views (HTML e PHP):**
   - **User Views:** Pagine per la registrazione, login, e gestione del profilo.
   - **Meal Views:** Pagine per visualizzare i pasti, aggiungere nuovi pasti, e dashboard con statistiche.

---

### Database MySQL

**Tabella `users`:**

```sql
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Tabella `meals`:**

```sql
CREATE TABLE `meals` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `date` DATE NOT NULL,
  `time` TIME NOT NULL,
  `calories` INT NOT NULL,
  `category` ENUM('colazione', 'pranzo', 'cena', 'spuntino') NOT NULL,
  `image` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);
```

**Dati Fake per `users`:**

```sql
INSERT INTO `users` (`name`, `email`, `password`)
VALUES 
('Mario Rossi', 'mario@example.com', '$2y$10$E4Uz9sdfKlf...'),
('Luigi Bianchi', 'luigi@example.com', '$2y$10$4lksdJf93L...'),
('Anna Verdi', 'anna@example.com', '$2y$10$asdf89KfA...');
```

**Dati Fake per `meals`:**

```sql
INSERT INTO `meals` (`user_id`, `name`, `date`, `time`, `calories`, `category`, `image`)
VALUES 
(1, 'Pasta al Pesto', '2023-09-01', '13:00', 550, 'pranzo', 'uploads/pasta.jpg'),
(2, 'Insalata di Pollo', '2023-09-01', '19:30', 300, 'cena', 'uploads/insalata.jpg'),
(3, 'Cornetto e Caffè', '2023-09-02', '08:30', 250, 'colazione', 'uploads/cornetto.jpg');
```

---

### Passaggi dell'Esercitazione

1. **Imposta il Database:**
   - Crea il database MySQL e le tabelle con i dati fake forniti.

2. **Configurazione del Progetto:**
   - Configura l'ambiente di sviluppo, inclusi file di configurazione per database, autoloading con Composer, e gestione degli errori.

3. **Implementazione del Modello (Model):**
   - Crea le classi `User` e `Meal` che interagiscono con il database tramite PDO per gestire utenti e pasti.

4. **Creazione del Controller:**
   - Crea `UserController` per registrazione/login e `MealController` per la gestione dei pasti. Implementa anche `ApiController` per la gestione delle API REST.

5. **Gestione delle Viste (View):**
   - Crea le pagine HTML per login, registrazione, aggiunta di pasti e visualizzazione delle statistiche.

6. **File Upload:**
   - Implementa la funzionalità di caricamento delle immagini dei pasti.

7. **REST API:**
   - Implementa un'API che permetta di aggiungere, modificare, cancellare e ottenere pasti tramite richieste HTTP in formato JSON.

8. **Sessioni e Sicurezza:**
   - Usa sessioni per mantenere gli utenti loggati e implementa la protezione delle pagine sensibili (come la gestione dei pasti).

---

### Conclusione

Al termine dell'esercitazione, l'utente dovrebbe aver sviluppato un'applicazione completa per il tracciamento delle abitudini alimentari, con la possibilità di gestire utenti, pasti, file upload e fornire un'interfaccia REST API.
