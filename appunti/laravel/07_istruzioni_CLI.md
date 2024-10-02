Laravel offre una potente interfaccia a riga di comando (CLI) tramite il comando **Artisan**. Artisan è lo strumento principale per interagire con Laravel e semplifica numerosi compiti durante lo sviluppo. Ecco una panoramica dei principali comandi della CLI di Laravel.

---

### 1. **Comandi per la Gestione delle Migration**

- **Creare una migration**:
  ```bash
  php artisan make:migration nome_migration
  ```
  Crea una nuova migration nella cartella `database/migrations`.

- **Eseguire tutte le migration**:
  ```bash
  php artisan migrate
  ```
  Applica tutte le migration al database.

- **Eseguire il rollback delle migration**:
  ```bash
  php artisan migrate:rollback
  ```
  Annulla l'ultima operazione di migration eseguita.

- **Resettare tutte le migration**:
  ```bash
  php artisan migrate:reset
  ```
  Annulla tutte le migration, eliminando tutte le modifiche fatte.

- **Refresh delle migration**:
  ```bash
  php artisan migrate:refresh
  ```
  Esegue il rollback e poi ripete tutte le migration, utile per ripristinare e aggiornare il database.

---

### 2. **Comandi per i Seeder**

- **Creare un seeder**:
  ```bash
  php artisan make:seeder NomeSeeder
  ```
  Crea un file di seeder in `database/seeders`.

- **Eseguire i seeder**:
  ```bash
  php artisan db:seed
  ```
  Esegue tutti i seeder definiti.

- **Eseguire un seeder specifico**:
  ```bash
  php artisan db:seed --class=NomeSeeder
  ```
  Esegue solo il seeder specificato.

---

### 3. **Comandi per i Model**

- **Creare un model**:
  ```bash
  php artisan make:model NomeModello
  ```
  Crea un modello nella cartella `app/Models`.

- **Creare un model con migrazione e controller associati**:
  ```bash
  php artisan make:model NomeModello -mc
  ```
  Crea un modello con la relativa migration e un controller.

---

### 4. **Comandi per i Controller**

- **Creare un controller**:
  ```bash
  php artisan make:controller NomeController
  ```
  Crea un controller nella cartella `app/Http/Controllers`.

- **Creare un controller di tipo Resource**:
  ```bash
  php artisan make:controller NomeController --resource
  ```
  Genera automaticamente un controller con i metodi CRUD (create, read, update, delete).

---

### 5. **Comandi per le View**

- **Creare una View** (nota: Laravel non ha un comando CLI per creare view, le view vengono create manualmente):
  Le view sono create manualmente all'interno della cartella `resources/views`.

---

### 6. **Comandi per la Cache**

- **Pulire la cache dell'applicazione**:
  ```bash
  php artisan cache:clear
  ```
  Pulisce la cache di Laravel.

- **Pulire la cache delle route**:
  ```bash
  php artisan route:clear
  ```
  Rimuove la cache delle route.

- **Pulire la cache delle view**:
  ```bash
  php artisan view:clear
  ```
  Pulisce la cache delle view compilate.

---

### 7. **Comandi per le Route**

- **Visualizzare le route registrate**:
  ```bash
  php artisan route:list
  ```
  Mostra l'elenco delle route definite nell'applicazione.

---

### 8. **Comandi per il Server**

- **Avviare il server locale**:
  ```bash
  php artisan serve
  ```
  Avvia un server di sviluppo locale sulla porta predefinita (8000). Puoi specificare una porta con `--port=8080`.

---

### 9. **Comandi per la Configurazione**

- **Pulire la cache della configurazione**:
  ```bash
  php artisan config:clear
  ```
  Rimuove la cache della configurazione dell'applicazione.

- **Cache delle configurazioni**:
  ```bash
  php artisan config:cache
  ```
  Memorizza in cache le configurazioni per migliorare le prestazioni.

---

### 10. **Comandi per le Queue**

- **Avviare un worker per le code**:
  ```bash
  php artisan queue:work
  ```
  Avvia un worker che processa le code.

- **Elaborare le code manualmente**:
  ```bash
  php artisan queue:listen
  ```
  Ascolta le code per elaborare i job in tempo reale.

---

### 11. **Comandi per la Documentazione**

- **Ottenere aiuto per un comando**:
  ```bash
  php artisan help nome_comando
  ```
  Mostra informazioni dettagliate su un comando Artisan specifico.

---

### 12. **Comandi per i Test**

- **Eseguire i test**:
  ```bash
  php artisan test
  ```
  Esegue i test definiti nella cartella `tests/`.

---

### 13. **Comandi Personalizzati**

- **Creare un comando personalizzato**:
  ```bash
  php artisan make:command NomeComando
  ```
  Crea un comando personalizzato che può essere utilizzato con Artisan.

---

### 14. **Tinker: Interfaccia Interattiva**

- **Avviare Tinker**:
  ```bash
  php artisan tinker
  ```
  Apre un REPL interattivo per interagire con l'applicazione e testare le funzionalità a runtime.

---

### 15. **Comandi per le Sessioni**

- **Pulire le sessioni**:
  ```bash
  php artisan session:clear
  ```
  Rimuove tutte le sessioni archiviate.

---

### Conclusione

Questi comandi sono solo un'anteprima delle possibilità offerte da Artisan, che è uno degli strumenti più potenti in Laravel. Essere abili nell'usare Artisan ti permette di sviluppare e mantenere applicazioni Laravel in modo efficiente, ottimizzando il flusso di lavoro e riducendo gli errori umani.