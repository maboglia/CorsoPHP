### Le Migration in Laravel: Gestire il Database in Modo Pulito

Le **migration** in Laravel sono uno strumento potente che ti consente di gestire la struttura del database in modo versionato e programmatico. Piuttosto che modificare manualmente le tabelle del database, puoi scrivere script che descrivono le modifiche e lasciar fare a Laravel il resto. Questo approccio facilita la collaborazione tra più sviluppatori e garantisce che tutti abbiano la stessa versione del database.

---

### 1. **Creazione di una Migration**

Puoi creare una migration utilizzando il comando **Artisan**. Da terminale, puoi eseguire:

```bash
php artisan make:migration create_users_table
```

Questo comando creerà un file di migration all'interno della cartella `database/migrations`, il cui nome inizierà con un timestamp per tracciare l'ordine delle migration. Il file avrà una struttura simile a questa:

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
```

#### Metodi principali:
- **`up()`**: definisce le modifiche che verranno applicate al database quando la migration verrà eseguita.
- **`down()`**: contiene le istruzioni per annullare le modifiche fatte da `up()`.

---

### 2. **Eseguire una Migration**

Una volta creata la migration, puoi applicarla al tuo database utilizzando il comando:

```bash
php artisan migrate
```

Questo comando eseguirà tutte le migration che non sono ancora state eseguite, creando o modificando le tabelle del database secondo le istruzioni presenti nelle migration.

---

### 3. **Rollback e Modifica delle Migration**

Se vuoi annullare una migration o un gruppo di migration, puoi utilizzare il comando **rollback**:

```bash
php artisan migrate:rollback
```

Questo comando eseguirà il metodo `down()` di tutte le migration più recenti, annullando le modifiche fatte.

Se desideri tornare indietro di un numero specifico di passaggi, puoi usare l'opzione `--step`:

```bash
php artisan migrate:rollback --step=2
```

Questo rollbackerà le ultime 2 migration.

---

### 4. **Schema Builder: Metodi Utili**

Laravel offre il **Schema Builder**, una API fluida che facilita la manipolazione delle tabelle nel database. Alcuni dei metodi più comuni per la definizione delle tabelle includono:

- **Colonne comuni**:
  - `$table->id();`: Crea una colonna incrementale primaria (spesso chiamata `id`).
  - `$table->string('nome');`: Crea una colonna `VARCHAR`.
  - `$table->text('descrizione');`: Crea una colonna `TEXT`.
  - `$table->integer('quantita');`: Crea una colonna `INT`.
  - `$table->boolean('attivo');`: Crea una colonna `BOOLEAN`.
  - `$table->timestamps();`: Crea le colonne `created_at` e `updated_at`.

- **Modificare le tabelle**:
  - **Aggiungere una colonna**:
    ```php
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->nullable();
    });
    ```

  - **Rimuovere una colonna**:
    ```php
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('phone');
    });
    ```

---

### 5. **Chiavi e Relazioni**

Laravel semplifica anche la definizione di chiavi primarie, esterne e relazioni tra tabelle.

#### Chiave primaria

Per impostare una colonna come chiave primaria:

```php
$table->id(); // Crea una colonna 'id' incrementale che è una chiave primaria.
```

#### Chiavi esterne (Foreign Keys)

Per definire una relazione tra tabelle, puoi utilizzare il metodo `foreign()`:

```php
Schema::table('posts', function (Blueprint $table) {
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
});
```

Questo esempio crea una colonna `user_id` che è una chiave esterna per la tabella `users`. Il metodo `onDelete('cascade')` assicura che, se un utente viene cancellato, tutti i suoi post verranno eliminati.

---

### 6. **Evoluzione del Database: Refresh e Reset**

Durante lo sviluppo, potresti voler **resettare** il database completamente o **aggiornarlo** con tutte le migration da zero. Ecco alcuni comandi utili:

- **Refresh**:
  Questo comando fa il rollback di tutte le migration e le riesegue, mantenendo la base dati aggiornata:

  ```bash
  php artisan migrate:refresh
  ```

- **Reset**:
  Il reset annulla tutte le migration senza rieseguirle:

  ```bash
  php artisan migrate:reset
  ```

---

### 7. **Seeder: Popolare il Database**

Oltre alle migration, Laravel offre i **Seeder** per popolare il database con dati iniziali o di prova. Puoi creare un Seeder con il comando:

```bash
php artisan make:seeder UsersTableSeeder
```

Questo creerà un file di seeder in `database/seeders/`. Nel file, puoi definire i dati da inserire nella tabella:

```php
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);
    }
}
```

Per eseguire il seeder, usa:

```bash
php artisan db:seed --class=UsersTableSeeder
```

Puoi anche eseguire tutti i seeder definiti usando il comando:

```bash
php artisan db:seed
```

---

### 8. **Faker e Factory**

- (Vedi sotto scheda sulle factory)

Laravel offre anche un potente strumento per generare dati finti attraverso le **Factory**. Queste possono essere utilizzate insieme ai seeder per popolare il database con dati realistici durante lo sviluppo e i test.

Puoi creare una Factory per un modello con il comando:

```bash
php artisan make:factory UserFactory --model=User
```

Nel file della factory generato (`database/factories/UserFactory.php`), puoi definire come devono essere generati i dati:

```php
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
    ];
});
```

Puoi utilizzare le factory nei tuoi seeder per creare dati in blocco:

```php
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(50)->create();
    }
}
```

---

### Conclusione

Le migration di Laravel semplificano la gestione e l'evoluzione della struttura del database, rendendo il processo più sicuro e riproducibile. Con l'integrazione delle factory e dei seeder, è facile popolare il database con dati di prova, migliorando la fase di sviluppo e test dell'applicazione.

---

### factory

In Laravel, una **factory** è uno strumento che semplifica la generazione di dati fittizi per i test e per il riempimento del database (seeding). Grazie alle factory, puoi creare istanze di modelli con dati casuali o predefiniti, risparmiando tempo e mantenendo il codice pulito.

Ecco come funziona una factory in Laravel:

1. **Creazione di una Factory**:
   Per creare una nuova factory, puoi usare il comando Artisan:

   ```bash
   php artisan make:factory NomeModelloFactory
   ```

   Questo genererà un file di factory nella cartella `database/factories`. Se il modello esiste già, puoi specificarlo con il parametro `--model`, così:

   ```bash
   php artisan make:factory NomeModelloFactory --model=NomeModello
   ```

2. **Definizione della Factory**:
   Nel file generato, troverai il metodo `definition()`, dove puoi definire i campi e i loro valori fittizi. Laravel usa la libreria **Faker** per generare dati casuali (come nomi, email, numeri, ecc.). Ecco un esempio di factory per un modello `User`:

   ```php
   use Illuminate\Database\Eloquent\Factories\Factory;

   class UserFactory extends Factory
   {
       protected $model = \App\Models\User::class;

       public function definition()
       {
           return [
               'name' => $this->faker->name,
               'email' => $this->faker->unique()->safeEmail,
               'password' => bcrypt('password'),
               'remember_token' => Str::random(10),
           ];
       }
   }
   ```

3. **Utilizzo della Factory**:
   Una volta definita la factory, puoi utilizzarla per creare istanze del modello:

   - **Creare una singola istanza senza salvarla nel database**:

     ```php
     $user = User::factory()->make();
     ```

   - **Creare una singola istanza e salvarla nel database**:

     ```php
     $user = User::factory()->create();
     ```

   - **Creare più istanze e salvarle nel database**:

     ```php
     $users = User::factory()->count(5)->create();
     ```

4. **Factory States**:
   Le **states** sono configurazioni alternative di una factory. Ad esempio, se vuoi creare utenti con ruoli specifici (es. admin), puoi definire uno state nella factory:

   ```php
   public function admin()
   {
       return $this->state([
           'role' => 'admin',
       ]);
   }
   ```

   Poi puoi applicare questo state quando crei un'istanza:

   ```php
   $adminUser = User::factory()->admin()->create();
   ```

5. **Seeding**:
   Puoi usare le factory anche per popolare il database in fase di seeding. Apri il seeder (`DatabaseSeeder.php`) e usa la factory:

   ```php
   public function run()
   {
       User::factory()->count(50)->create();
   }
   ```

   Infine, puoi lanciare i seeder con:

   ```bash
   php artisan db:seed
   ```

Le factory rendono il testing e il seeding molto più efficienti, specialmente nei progetti in cui è necessario generare molti dati.
